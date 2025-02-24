<?php


use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('plans', function (Blueprint $table) {
            $table->id();
            $table->string('titre', 255);
            $table->date('start_date')->nullable();;
            $table->date('end_date')->nullable();;
            $table->decimal('price', 10, 2);
            $table->string('daysAvailable', 500)->nullable(); // Changed to string
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('plans');
    }
};
