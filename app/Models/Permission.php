<?php

namespace App\Models;

use App\Models\Role;

use Illuminate\Database\Eloquent\Model;
use SoftDeletes;

class Permission extends Model
{
    protected $fillable = [];
    protected $guarded = [];

    public function roles()
    {
        return $this->belongsToMany(Role::class, 'roles_permissions');
    }

    public function task()
    {
        return $this->belongsTo(Task::class);
    }
}
