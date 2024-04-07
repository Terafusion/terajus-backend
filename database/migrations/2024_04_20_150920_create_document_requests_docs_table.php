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
        Schema::create('document_request_docs', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('document_request_id');
            $table->unsignedBigInteger('document_id')->nullable();
            $table->unsignedBigInteger('document_type_id')->nullable();
            $table->string('status')->nullable();
            $table->string('description')->nullable();

            $table->foreign('document_request_id')->references('id')->on('document_requests');
            $table->foreign('document_id')->references('id')->on('documents');
            $table->foreign('document_type_id')->references('id')->on('document_types');

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
        Schema::dropIfExists('document_requests_docs');
    }
};
