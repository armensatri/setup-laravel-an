<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
  public function up(): void
  {
    Schema::create('submenus', function (Blueprint $table) {
      $table->id();
      $table->foreignId('menu_id')
        ->references('id')
        ->on('menus')
        ->onDelete('cascade')
        ->onUpdate('cascade');
      $table->integer('ssm');
      $table->string('name')->unique();
      $table->string('slug')->unique();
      $table->string('url', 5)->unique();
      $table->string('route');
      $table->string('active');
      $table->string('routename');
      $table->string('image')->nullable();
      $table->boolean('is_active')->default(1);
      $table->text('description');
      $table->timestamps();
    });
  }

  /**
   * Reverse the migrations.
   */
  public function down(): void
  {
    Schema::dropIfExists('submenus');
  }
};
