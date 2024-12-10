<?php

namespace Database\Factories;

use App\Models\RoomType;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Image>
 */
class ImageFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'url' => "https://res.cloudinary.com/dff6pkxpt/image/upload/v1733565526/fxinxl8v5b0txx9wrtaf.jpg", // URL ảnh giả
            'public_image_id' => "fxinxl8v5b0txx9wrtaf", // ID công khai
            'user_id' => null, // Có thể null nếu không dùng
            'room_type_id' => RoomType::factory(), // Gắn với RoomType
            'banner_id' => null, // Có thể null nếu không dùng
        ];
    }
}
