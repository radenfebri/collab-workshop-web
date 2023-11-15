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
        Schema::create('bukus', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('kategoribuku_id');
            $table->string('name');
            $table->string('slug');
            $table->longText('description');
            $table->string('original_price');
            $table->string('selling_price')->nullable();
            $table->text('cover');
            $table->string('qty');
            $table->tinyInteger('popular')->default('0');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bukus');
    }
};
