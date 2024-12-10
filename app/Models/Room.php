<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Room extends Model
{
    protected $fillable = [
        "room_number",
        "room_type_id",
        "start_date",
        "end_date"
    ];

    public function room_type(): BelongsTo
    {
        return $this->belongsTo(RoomType::class);
    }

    public function is_available($startDate, $endDate): bool
    {
        // Kiểm tra nếu phòng không có ngày bắt đầu hoặc ngày kết thúc thì xem như không khả dụng
        if (empty($this->start_date) || empty($this->end_date)) {
            return false;
        }
        // Chuyển đổi ngày thành đối tượng Carbon để so sánh
        $roomStartDate = Carbon::parse($this->start_date);
        $roomEndDate = Carbon::parse($this->end_date);
        $inputStartDate = Carbon::parse($startDate);
        $inputEndDate = Carbon::parse($endDate);

        // Kiểm tra xem ngày truyền vào có nằm trong phạm vi hay không
        return $inputStartDate >= $roomStartDate && $inputEndDate <= $roomEndDate;
    }
}
