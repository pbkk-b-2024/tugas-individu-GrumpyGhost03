<?php

// database/migrations/xxxx_xx_xx_xxxxxx_create_car_service_appointments_table.php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCarServiceAppointmentsTable extends Migration
{
    public function up()
    {
        Schema::create('car_service_appointments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('car_id')->constrained('cars')->onDelete('cascade'); // Ensure car is deleted if appointment is deleted
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade'); // Ensure user is deleted if appointment is deleted
            $table->foreignId('service_id')->constrained('services')->onDelete('cascade'); // Ensure service is deleted if appointment is deleted
            $table->dateTime('appointment_date')->nullable(); // Allow null for validation
            $table->enum('status', ['Pending', 'Completed', 'Cancelled'])->default('Pending');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('car_service_appointments');
    }
}
