<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\RoomType>
 */
class RoomTypeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'room_type_name' => $this->faker->word(), // Tên loại phòng
            'description' => $this->faker->sentence(), // Mô tả
            'base_price' => $this->faker->randomFloat(2, 50, 500), // Giá cơ bản
            'children' => $this->faker->numberBetween(0, 2), // Số lượng trẻ em
            'adults' => $this->faker->numberBetween(1, 4), // Số lượng người lớn
        ];
    }
}
