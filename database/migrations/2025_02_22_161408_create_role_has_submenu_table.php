<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
  public function up(): void
  {
    Schema::create('role_has_submenu', function (Blueprint $table) {
      $table->id();
      $table->foreignId('role_id')
        ->references('id')
        ->on('roles')
        ->onDelete('cascade')
        ->onUpdate('cascade');
      $table->foreignId('submenu_id')
        ->references('id')
        ->on('submenus')
        ->onDelete('cascade')
        ->onUpdate('cascade');
      $table->index(['role_id', 'submenu_id']);
    });
  }

  public function down(): void
  {
    Schema::dropIfExists('role_has_submenu');
  }
};
