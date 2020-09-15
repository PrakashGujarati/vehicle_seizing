<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class RolePermissions extends Model
{
    use SoftDeletes;
     /**
     * The table associated with the model.
     *
     * @var string
     */
	protected $table = 'role_permissions';

    /**
     * set primary key of table
     *
     * @var integer
     */
    protected $primaryKey = 'id';

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = true;

    /**
     * fillable column name goes here
     *
     * @var array
     */
    protected $fillable = [
        'role_id',
        'permission_id',
        'status',
	];

	/**
     *  Define the relation between carmartshop and carmart.
     *
     */
    public function roles()
    {
        return $this->hasMany('App\Models\Role', 'id');
    }
    /**
     *  Define the relation between carmartshop and carmart.
     *
     */
    public function permission()
    {
        return $this->hasMany('App\Models\Permission', 'permission_id');
    }
}
