<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Permission;
class Task extends Model
{
    protected $fillable = ['title', 'description'];

    public function permissions()
    {
        return $this->hasMany(Permission::class, 'task_id');
    }
}
