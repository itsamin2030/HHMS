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
        Schema::table('patients', function (Blueprint $table) {
            $table->unsignedTinyInteger('pat_age')->after('birth_year');
            $table->string('pat_nid')->after('pat_id');
            $table->dateTime('pat_admYear')->after('pat_age');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('patients', function (Blueprint $table) {
            $table->dropColumn('pat_age');
            $table->dropColumn('pat_admYear');
            $table->dropColumn('pat_nid');
        });
    }
};
