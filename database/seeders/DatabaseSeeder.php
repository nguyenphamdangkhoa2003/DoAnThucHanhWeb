<?php

namespace Database\Seeders;

use App\Models\Image;
use App\Models\RoomType;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::create(
            [
                "email" => "admin@example.com",
                "name" => "Dương Nhất Thiên",
                "password" => "12345678",
                "role" => "admin",
                "phone" => fake()->phoneNumber,
                "address" => fake()->address,
            ]
        );
        Image::create(
            [
                "public_image_id" => "8d1249009c78480d4f773714179f8d8f_xiwwmw",
                "url" => "https://res.cloudinary.com/dff6pkxpt/image/upload/v1733554809/8d1249009c78480d4f773714179f8d8f_xiwwmw.jpg",
                "user_id" => 1,
            ]
        );
    }
}
