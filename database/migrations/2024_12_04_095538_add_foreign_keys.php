<?php

use App\Models\Booking;
use App\Models\CheckInForm;
use App\Models\CheckOutForm;
use App\Models\Payment;
use App\Models\Room;
use App\Models\RoomType;
use App\Models\User;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table("bookings", function (Blueprint $table) {
            $table->foreignIdFor(User::class)->constrained();
            $table->foreignIdFor(RoomType::class)->constrained();
            $table->foreignIdFor(Payment::class)->constrained();
        });

        Schema::table("payments", function (Blueprint $table) {
            $table->foreignIdFor(Booking::class)->constrained();
        });

        Schema::table("rooms", function (Blueprint $table) {
            $table->foreignIdFor(RoomType::class)->constrained();
        });

        Schema::table("check_in_forms", function (Blueprint $table) {
            $table->foreignIdFor(User::class)->constrained();
            $table->foreignIdFor(CheckOutForm::class)->constrained();
        });

        Schema::table("check_in_details", function (Blueprint $table) {
            $table->foreignIdFor(CheckInForm::class)->constrained();
            $table->foreignIdFor(Room::class)->constrained();
        });

        Schema::table("check_out_details", function (Blueprint $table) {
            $table->foreignIdFor(Room::class)->constrained();
            $table->foreignIdFor(CheckOutForm::class)->constrained();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table("bookings", function (Blueprint $table) {
            $table->dropForeignIdFor(User::class);
            $table->dropForeignIdFor(RoomType::class);
            $table->dropForeignIdFor(Payment::class);
        });

        Schema::table("payments", function (Blueprint $table) {
            $table->dropForeignIdFor(Booking::class);
        });

        Schema::table("rooms", function (Blueprint $table) {
            $table->dropForeignIdFor(RoomType::class);
        });

        Schema::table("check_in_forms", function (Blueprint $table) {
            $table->dropForeignIdFor(User::class);
            $table->dropForeignIdFor(CheckOutForm::class);
        });

        Schema::table("check_in_details", function (Blueprint $table) {
            $table->dropForeignIdFor(CheckInForm::class);
            $table->dropForeignIdFor(Room::class);
        });

        Schema::table("check_out_details", function (Blueprint $table) {
            $table->dropForeignIdFor(Room::class)->constrained();
            $table->dropForeignIdFor(CheckOutForm::class)->constrained();
        });

    }
};
