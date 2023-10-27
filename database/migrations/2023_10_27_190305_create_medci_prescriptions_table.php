<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('medci_prescriptions', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('pre_id');
            $table->unsignedBigInteger('med_id');
            $table->string('dose');
            $table->string('itr');
            $table->string('durtion')->nullable();
            $table->string('note')->nullable();
            $table->foreign('pre_id')->references('pre_id')->on('prescriptions');
            $table->foreign('med_id')->references('med_id')->on('medcinies');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('medci_prescriptions');
    }
};
