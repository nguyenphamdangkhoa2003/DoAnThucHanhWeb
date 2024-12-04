<?php

use App\Models\CheckInForm;
use App\Models\Room;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('check_in_details', function (Blueprint $table) {
            $table->id();
            $table->double("price_for_night");
            $table->integer("number_of_night");
            $table->double("sub_total");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('check_in_details');
    }
};
