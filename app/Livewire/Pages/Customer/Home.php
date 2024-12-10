<?php

namespace App\Livewire\Pages\Customer;

use App\Livewire\Forms\SearchBookingForm;
use App\Models\Booking;
use App\Models\RoomType;
use Date;
use Livewire\Attributes\Layout;
use Livewire\Component;
use Livewire\WithPagination;
use Mary\Traits\Toast;
#[Layout("layouts.app")]
class Home extends Component
{
    use Toast;
    use WithPagination;
    public $roomCount = []; // Biến để lưu số lượng phòng đã nhập
    public array $selected_type_room = [];
    public SearchBookingForm $form;
    public function render()
    {
        // Gán giá trị cho biến $type_rooms
        $type_rooms = RoomType::simplePaginate(3);
        $this->form->start_date = Date::now();
        $this->form->end_date = $this->form->start_date->copy()->addDays(1);
        $formattedStartDate = $this->formatCustomDate($this->form->start_date);
        $formattedEndDate = $this->formatCustomDate($this->form->end_date);
        // Trả về view mà không cần phải truyền lại biến $type_rooms
        return view('livewire.pages.customer.home', compact("type_rooms", "formattedStartDate", "formattedEndDate"));
    }
    public function formatCustomDate($date)
    {
        $weekdays = [
            'Sunday' => 'CN',
            'Monday' => 'Th 2',
            'Tuesday' => 'Th 3',
            'Wednesday' => 'Th 4',
            'Thursday' => 'Th 5',
            'Friday' => 'Th 6',
            'Saturday' => 'Th 7',
        ];

        $dayOfWeek = $weekdays[$date->format('l')]; // Lấy ngày trong tuần
        $day = $date->format('j'); // Lấy ngày (1-31)
        $month = $date->format('n'); // Lấy tháng (1-12)
        $year = $date->format('y'); // Lấy 2 chữ số của năm

        return "{$dayOfWeek}, {$day} thg {$month}, {$year}";
    }
    public function selected($typeRoomId)
    {
        // Lấy số lượng phòng từ roomCount
        $roomCount = $this->roomCount[$typeRoomId] ?? 1; // Mặc định là 1 nếu không nhập

        // Tìm đối tượng RoomType tương ứng với ID
        $roomType = RoomType::find($typeRoomId);

        if ($roomType) {
            // Kiểm tra nếu đối tượng đã có trong mảng selected_type_room
            $existingIndex = collect($this->selected_type_room)->search(function ($item) use ($roomType) {
                return $item['room_type']['id'] === $roomType->id;
            });

            if ($existingIndex !== false) {
                // Cập nhật số lượng phòng và tổng giá nếu đã chọn
                $this->selected_type_room[$existingIndex]['count'] = $roomCount;
                $this->selected_type_room[$existingIndex]['total_price'] = $roomCount * $roomType->base_price;
            } else {
                // Thêm mới đối tượng RoomType và số lượng phòng vào mảng
                $this->selected_type_room[] = [
                    'room_type' => $roomType->toArray(),
                    'count' => $roomCount,
                    'total_price' => $roomCount * $roomType->base_price,
                ];
            }

            // Cập nhật tổng giá trị tổng cộng (nếu cần)
            $this->totalPrice = collect($this->selected_type_room)->sum('total_price');
        } else {
            // Nếu không tìm thấy RoomType, có thể gửi thông báo lỗi
            $this->addError('room_type', 'Room type not found!');
        }
    }

    public function redirectBookingPage()
    {
        session()->put("selected_type_room", $this->selected_type_room);
        session()->put("total_price", $this->getTotalPrice());
        // Chuyển hướng với dữ liệu đã lọc
        return redirect()->route("booking-info");
    }
    public function getTotalPrice()
    {
        $result = array_reduce(
            $this->selected_type_room,
            function ($carry, $i) {
                $carry += $i['total_price'];
                return $carry;
            },
            0,
        );
        return $result;
    }
    public function formatCurrencyVND($number)
    {
        if (!is_numeric($number)) {
            return 'Số không hợp lệ';
        }

        $formattedNumber = number_format(abs($number), 0, ',', '.');
        $result = $formattedNumber . ' ₫';

        // Xử lý số âm
        if ($number < 0) {
            $result = '-' . $result;
        }

        return $result;
    }
    public function deleteTypeRoomSelected($key)
    {
        unset($this->selected_type_room[$key]);
    }
    public function search()
    {

    }
}
