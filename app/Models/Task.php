<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Permission;
use SoftDeletes;

class Task extends Model
{
    protected $fillable = [];
    protected $guarded = [];
    
    public function permissions()
    {
        return $this->hasMany(Permission::class, 'task_id');
    }
}
