<?php

use App\Models\CheckOutForm;
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
        Schema::create('check_in_forms', function (Blueprint $table) {
            $table->id();
            $table->date("checkin_date");
            $table->date("expectedCheckoutDate");
            $table->double("total_amount");
            $table->enum("status", ["confirmed", "cancelled", "no-show"]);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('check_in_forms');
    }
};
