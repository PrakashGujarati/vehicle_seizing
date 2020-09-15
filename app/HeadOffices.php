<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HeadOffices extends Model
{
    protected $table="head_offices";

    protected $fillable = ['name','vendor_code','city','contact_person','address1','address2','contact','gst'];
    
}
