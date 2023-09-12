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
        Schema::create('legal_cases', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->string('court')->nullable();
            $table->string('fields_of_law')->nullable();
            $table->string('status')->nullable();
            $table->string('case_type')->nullable();
            $table->string('case_matter')->nullable();
            $table->text('case_description')->nullable();
            $table->text('case_requests')->nullable();
            $table->longText('complaint')->nullable();

            $table->boolean('pending_protocol')->default(false);

            $table->foreign('user_id')->references('id')->on('users');

            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('legal_cases');
    }
};
