<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('event_categorical_data_keys', function (Blueprint $table) {
            $table->id();
            $table->integer('event_id')->nullable();
            $table->string('data_key', 256)->nullable();
            $table->tinyInteger('data_type')->nullable();
            $table->string('key_options', 1024)->nullable();
            $table->tinyInteger('status')->nullable();
            $table->tinyInteger('is_mandatory')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('event_categorical_data_keys');
    }
};
