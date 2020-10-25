<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOfficesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('offices', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('head_office_id')->nullable();
            $table->unsignedBigInteger('branch_code')->nullable();
            $table->text('branch_address')->nullable();
            $table->string('branch_email')->nullable();
            $table->string('manage_email')->nullable();
            $table->string('manager_contact')->nullable();
            $table->string('branch_contact')->nullable();
            $table->string('assigned_manager')->nullable();
            $table->string('city')->nullable();
            $table->string('gst')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('offices');
    }
}
