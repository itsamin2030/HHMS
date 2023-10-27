<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('prescriptions', function (Blueprint $table) {
            $table->id('pre_id');
            $table->date('pre_date');
            $table->unsignedBigInteger('doc_id');
            $table->unsignedBigInteger('pat_id');
            $table->string('note');
            $table->enum('statue',['request','ready','done']);
            $table->foreign('doc_id')->references('doc_id')->on('medicals');
            $table->foreign('pat_id')->references('pat_id')->on('patients');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('prescriptiones');
    }
};
