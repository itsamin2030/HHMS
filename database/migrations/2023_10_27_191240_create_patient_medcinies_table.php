<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('patient_medcinies', function (Blueprint $table) {
            $table->unsignedBigInteger('pat_id');
            $table->unsignedBigInteger('med_id');
            $table->foreign('pat_id')->references('pat_id')->on('patients');
            $table->foreign('med_id')->references('med_id')->on('medcinies');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('patient_medcinies');
    }
};
