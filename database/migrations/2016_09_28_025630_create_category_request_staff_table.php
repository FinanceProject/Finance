<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCategoryRequestStaffTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('category_request_staff', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('staff_id')->unsigned();
            $table->foreign('staff_id')->references('id')->on('staff')->onDelete('cascade');
            $table->integer('category_request_id')->unsigned();
            $table->foreign('category_request_id')->references('id')->on('category_requests')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
