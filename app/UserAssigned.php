<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserAssigned extends Model
{
    protected $table="user_assigneds";

     protected $fillable = [
        'user_id', 'vehicle_id'];
}
