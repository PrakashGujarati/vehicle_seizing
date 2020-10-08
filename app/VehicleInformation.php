<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class VehicleInformation extends Model
{
    protected $table="vehicle_informations";

     protected $fillable = [
        'user_id', 'regd_num','longitude','latitude','image'];

    public function agentname()
    {
    	return $this->belongsTo(User::class,'user_id');
    }
}
