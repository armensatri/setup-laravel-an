<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
  public function up(): void
  {
    Schema::create('role_has_menu', function (Blueprint $table) {
      $table->id();
      $table->foreignId('role_id')
        ->references('id')
        ->on('roles')
        ->onDelete('cascade')
        ->onUpdate('cascade');
      $table->foreignId('menu_id')
        ->references('id')
        ->on('menus')
        ->onDelete('cascade')
        ->onUpdate('cascade');
      $table->index(['role_id', 'menu_id']);
    });
  }

  public function down(): void
  {
    Schema::dropIfExists('role_has_menu');
  }
};
