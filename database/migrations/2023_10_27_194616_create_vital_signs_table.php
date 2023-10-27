<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('vital_signs', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('pat_id');
            $table->integer('vsNum');
            $table->integer('vsNum2');
            $table->enum('type',['temp','pressure','pulse','respiration','suger']);
            $table->enum('userBy',['pat','doc']);
            $table->foreign('pat_id')->references('pat_id')->on('patients');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('vital_signs');
    }
};
