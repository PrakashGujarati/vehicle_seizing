<?php

namespace App\Http\Controllers;
use DB;
use Illuminate\Http\Request;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class dbController extends Controller
{
     public function DBupdate()
    {


       DB::statement("ALTER TABLE `vehicles` ADD `finance_company_name` VARCHAR(255) NULL AFTER `create_type`");
        

    	Schema::dropIfExists('head_offices');
    		Schema::create('head_offices', function (Blueprint $table) {
	            $table->id();
	            $table->string('finance_company_name')->nullable();
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
    	

    	return "ok";


		
		    	
	}
}
