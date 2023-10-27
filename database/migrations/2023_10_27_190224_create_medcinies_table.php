<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('medcinies', function (Blueprint $table) {
            $table->id('med_id');
            $table->string('med_name');
            $table->string('genName')->nullable();
            $table->unsignedBigInteger('med_cat');
            $table->foreign('med_cat')->references('med_cat_id')->on('medicine_categories');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('medcinies');
    }
};
