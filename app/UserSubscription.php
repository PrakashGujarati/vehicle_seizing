<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserSubscription extends Model
{
      protected $table="user_subscriptions";

     protected $fillable = [
        'user_id', 'start_date','end_date'];
}
