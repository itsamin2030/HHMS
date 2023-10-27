<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('patients', function (Blueprint $table) {
            $table->bigIncrements('pat_id');
            $table->string('pat_name', 110);
            $table->string('pat_grName', 110);
            $table->string('pat_grPhone', 110);
            $table->enum('gender',['M', 'F']);
            $table->year('birth_year');
            $table->string('pat_symptoms', 110)->nullable();
            $table->string('pat_note', 110)->nullable();
            $table->double('longitude')->nullable();
            $table->double('latitude')->nullable();
            $table->enum('pat_statue',['Hold', 'Accepted', 'Rejected'])->default('Hold');
            $table->timestamps();
            $table->softDeletes($column = 'deleted_at', $precision = 0)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('patients');
    }
};
