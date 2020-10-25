<?php

namespace App;
use App\HeadOffices;
use Illuminate\Database\Eloquent\Model;

class Office extends Model
{
    protected $table="offices";
    protected $fillable = ['head_office_id','branch_code','branch_address','city','manager_contact','branch_contact','gst','assigned_manager','manage_email','branch_email'];

    public function headOfficesname()
    {
    	return $this->belongsTo(HeadOffices::class,'head_office_id');
    }
}
 