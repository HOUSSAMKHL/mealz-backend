<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('clients', function (Blueprint $table) {
            $table->id();
            $table->string('full_name');
            $table->string('phone')->nullable();
            $table->string('adresse');
            $table->foreignId('plan_id')->constrained()->onDelete('cascade'); 
            $table->foreignId('order_id')->nullable()->constrained('orders')->onDelete('cascade'); // Ajout de la relation avec orders
            $table->timestamps();
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('clients');
    }
};
