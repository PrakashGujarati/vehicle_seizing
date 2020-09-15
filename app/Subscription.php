<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subscription extends Model
{
     protected $table="subscriptions";

     protected $fillable = [
        'user_id', 'user_subscription_id','days','amount','payment_status','payment_mode','notes'];



    public function Username()
    {
    	return $this->belongsTo(User::class,'user_id');
    }
}
