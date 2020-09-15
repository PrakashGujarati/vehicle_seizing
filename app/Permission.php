<?php


namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Permission extends Model
{
	use SoftDeletes;
     /**
     * The table associated with the model.
     *
     * @var string
     */
	protected $table = 'permissions';

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
        'name',
        'slug',
        'status',
	];

    public function rolePermission()
    {
        return $this->hasMany('App\Models\RolePermissions', 'permission_id');
    }
}
