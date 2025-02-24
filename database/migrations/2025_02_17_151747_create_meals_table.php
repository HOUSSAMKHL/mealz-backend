<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('meals', function (Blueprint $table) {
            $table->id(); 
            $table->text('meal_img')->nullable();
            $table->string('meal_title', 50);
            $table->string('meal_description', 255);
            $table->string('meal_categorie', 50);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('meals');
    }
};
