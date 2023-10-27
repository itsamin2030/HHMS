<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('appointments', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('pat_id');
            $table->enum('statue',['hold','rejected','confirmed']);
            $table->string('patStatue');
            $table->string('recommand');
            $table->foreign('pat_id')->references('pat_id')->on('patients');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('appointmentes');
    }
};
