<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateServiceRecordsTable extends Migration
{
    public function up()
    {
        Schema::create('service_records', function (Blueprint $table) {
            $table->id();
            $table->foreignId('service_id')->constrained('services');
            $table->foreignId('car_id')->constrained('cars');
            $table->foreignId('customer_id')->constrained('customers');  // Linked to customers
            $table->date('service_date');
            $table->decimal('service_price', 10, 2);  // Price for the service itself
            $table->decimal('parts_total_price', 10, 2)->default(0);  // Total price of all parts used
            $table->decimal('total_price', 10, 2)->virtualAs('service_price + parts_total_price'); // Total price of service and parts combined
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('service_records');
    }
}
