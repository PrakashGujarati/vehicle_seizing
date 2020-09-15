<?php

namespace App;
use App\HeadOffices;
use Illuminate\Database\Eloquent\Model;

class Office extends Model
{
    protected $table="offices";
    protected $fillable = ['head_office_id','name','contact_person','contact','address1','city','branch_code','branch'];

    public function headOfficesname()
    {
    	return $this->belongsTo(HeadOffices::class,'head_office_id');
    }
}
 