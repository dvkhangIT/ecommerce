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
    Schema::create('brands', function (Blueprint $table) {
      $table->id();
      $table->text('logo');
      $table->string('name');
      $table->string('slug');
      $table->boolean('is_featured');
      $table->boolean('status');
      $table->timestamps();
    });
  }

  /**
   * Reverse the migrations.
   */
  public function down(): void
  {
    Schema::dropIfExists('brands');
  }
};
