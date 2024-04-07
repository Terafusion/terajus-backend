<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('legal_pleadings', function (Blueprint $table) {
            $table->string('status')->nullable();
            $table->unsignedBigInteger('legal_pleading_type_id')->nullable();
            $table->foreign('legal_pleading_type_id')->references('id')->on('legal_pleading_types')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('legal_pleadings', function (Blueprint $table) {
            $table->dropColumn('legal_pleading_type_id');
            $table->dropColumn('status');
        });
    }
};
