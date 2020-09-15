<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVehiclesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vehicles', function (Blueprint $table) {
            $table->id();
            $table->string('agreement_no')->nullable();
            $table->string('prod_n')->nullable();
            $table->string('region_area')->nullable();
            $table->string('office')->nullable();
            $table->string('branch')->nullable();
            $table->string('customer_name')->nullable();
            $table->string('cycle')->nullable();
            $table->string('paymode')->nullable();
            $table->string('emi')->nullable();
            $table->string('tet')->nullable();
            $table->string('noi')->nullable();
            $table->string('allocation_month_grp')->nullable();
            $table->string('tenor_over')->nullable();
            $table->string('charges')->nullable();
            $table->string('gv')->nullable();
            $table->string('model')->nullable();
            $table->string('regd_num')->nullable();
            $table->string('chasis_num')->nullable();
            $table->string('engine_num')->nullable();
            $table->string('make')->nullable();
            $table->string('rrm_name_no')->nullable();
            $table->string('rrm_mail_id')->nullable();
            $table->string('coordinator_mail_id')->nullable();
            $table->string('letter_refernce')->nullable();
            $table->string('dispatch_date')->nullable();
            $table->string('letter_date')->nullable();
            $table->string('valid_date')->nullable();
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
        Schema::dropIfExists('vehicles');
    }
}
