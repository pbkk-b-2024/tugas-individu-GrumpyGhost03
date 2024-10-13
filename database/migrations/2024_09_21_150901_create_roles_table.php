<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRolesTable extends Migration
{
    public function up()
    {
        Schema::create('roles', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique();  // Role name (e.g., admin, customer, technician)
            $table->text('description')->nullable();  // Optional description of the role
            $table->integer('level')->default(1);  // Role hierarchy (admin = 1, technician = 2, customer = 3)
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('roles');
    }
}
