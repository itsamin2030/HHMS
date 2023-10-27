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
        Schema::create('medicals', function (Blueprint $table) {
            $table->bigIncrements('doc_id');
            $table->string('doc_name', 110);
            $table->string('doc_phone', 45);
            $table->string('doc_address', 110)->nullable();
            $table->string('doc_email', 110);
            $table->string('doc_password', 110);
            $table->string('doc_profile', 110)->nullable();
            $table->timestamps();
            $table->softDeletes($column = 'deleted_at', $precision = 0)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('medicals');
    }
};
