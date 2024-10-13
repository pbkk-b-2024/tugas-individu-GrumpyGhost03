<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateServicePartsTable extends Migration
{
    public function up()
    {
        Schema::create('service_parts', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('part_number')->unique();
            $table->decimal('price', 10, 2);
            $table->foreignId('service_id')->nullable()->constrained('services')->onDelete('cascade');
            $table->foreignId('maintenance_schedule_id')->nullable()->constrained('maintenance_schedules')->onDelete('cascade'); // Linked to maintenance schedules
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('service_parts');
    }
}
