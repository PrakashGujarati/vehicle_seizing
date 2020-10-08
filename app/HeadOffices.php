<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HeadOffices extends Model
{
    protected $table="head_offices";

    protected $fillable = ['finance_company_name','branch_code','branch_address','city','manager_contact','branch_contact','gst','assigned_manager','manage_email','branch_email'];
    
}
