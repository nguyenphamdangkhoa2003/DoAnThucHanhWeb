<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create("room_types", function (Blueprint $table) {
            $table->id();
            $table->string("room_type_name");
            $table->string("description");
            $table->double("base_price");
            $table->string("level");
            $table->integer("children");
            $table->integer("adults");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
