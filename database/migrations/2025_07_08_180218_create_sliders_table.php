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
    Schema::create('sliders', function (Blueprint $table) {
      $table->id();
      $table->text('banner')->nullable();
      $table->string('type')->nullable();
      $table->string('title')->nullable();
      $table->string('starting_price')->nullable();
      $table->string('btn_url')->nullable();
      $table->integer('serial')->nullable();
      $table->integer('status')->nullable();
      $table->timestamps();
    });
  }

  /**
   * Reverse the migrations.
   */
  public function down(): void
  {
    Schema::dropIfExists('sliders');
  }
};
