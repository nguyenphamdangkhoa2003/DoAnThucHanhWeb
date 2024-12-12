<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\BookingDetail;
use App\Models\Payment;
use App\Models\RoomType;
use Auth;
class PaymentController extends Controller
{
    public function vnpay_payment()
    {// Lấy giá trị từ request
        $vnp_SecureHash = $_GET['vnp_SecureHash'];
        $inputData = array();
        foreach ($_GET as $key => $value) {
            if (substr($key, 0, 4) == "vnp_") {
                $inputData[$key] = $value;
            }
        }

        unset($inputData['vnp_SecureHash']);
        ksort($inputData);
        $i = 0;
        $hashData = "";
        foreach ($inputData as $key => $value) {
            if ($i == 1) {
                $hashData = $hashData . '&' . urlencode($key) . "=" . urlencode($value);
            } else {
                $hashData = $hashData . urlencode($key) . "=" . urlencode($value);
                $i = 1;
            }
        }

        $secureHash = hash_hmac('sha512', $hashData, "IQLL0IAY2R93XA22VBHYP3PJTO8WJI37");
        if ($secureHash == $vnp_SecureHash) {
            if ($_GET['vnp_ResponseCode'] == '00') {
                $booking_info = Booking::create([
                    "cus_name" => Auth::user()->name,
                    "cus_email" => Auth::user()->email,
                    "cus_phone" => Auth::user()->phone,
                    "cus_address" => Auth::user()->address,
                    "total_price" => session()->get("total_price"),
                    "user_id" => Auth::user()->id,
                    "status" => "pending",
                ]);
                $payment = Payment::create([
                    "payment_type" => $inputData["vnp_CardType"],
                    "amount" => session()->get("total_price"),
                    "payment_date" => \DateTime::createFromFormat('YmdHis', $inputData["vnp_PayDate"])->format('Y-m-d'),
                    "booking_id" => $booking_info->id,
                ]);
                $selected_type_room = session()->get("selected_type_room");
                foreach ($selected_type_room as $key => $value) {
                    $room_Type = RoomType::find($value["room_type"]["id"]);
                    $firstRoom = $room_Type->rooms()->first(); // Lấy phòng đầu tiên của loại phòng
                    $booking_dates = session()->get("booking_dates");
                    if ($firstRoom) { // Kiểm tra nếu có phòng
                        BookingDetail::create([
                            "quantity" => $value["count"],
                            "booking_id" => $booking_info->id,
                            "room_type_id" => $room_Type->id,
                            "room_id" => $firstRoom->id, // Thêm room_id nếu cần
                            "check_in" => $booking_dates["start_date"],
                            "check_out" => $booking_dates["end_date"],

                        ]);
                    }
                }

                session()->put('payment_data', [
                    'transaction_no' => $inputData["vnp_TransactionNo"],
                    'amount' => session()->get("total_price"),
                    'payment_type' => $inputData["vnp_CardType"],
                    'email' => Auth::user()->email,
                    'phone' => Auth::user()->phone,
                    'bank_code' => $inputData["vnp_BankCode"],
                    'order_info' => urldecode($inputData["vnp_OrderInfo"]),
                ]);

                // return redirect()->route('payment.success');
                return view("PaymentSuccess");
            } else {
                echo "GD Khong thanh cong";
            }
        } else {
            echo "Chu ky khong hop le";
        }


    }
}