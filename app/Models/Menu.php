<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    protected $table = 'menus';
    protected $fillable = [];
    protected $guarded = [];

    public function child()
    {
        return $this->hasMany(Menu::class, 'parent_id');
    }
    public function parent()
    {
        return $this->belongsTo(Menu::class, 'parent_id');
    }
    
    public function buildMenu($menu, $parentid = 0)
    {
        $result = null;
        foreach ($menu as $item) {
            if ($item->parent_id == $parentid) {
                $result .= "<li class='dd-item nested-list-item' data-order='{$item->position}' data-id='{$item->id}'>
            <div class='dd-handle nested-list-handle'>
            <span class='fa fa-plus'></span>
            </div>
            <div class='nested-list-content'>{$item->name}
                <a href='".url("menu/edit/{$item->id}")."'>Edit</a> |
                <a href='#' class='delete_toggle' rel='{$item->id}'>Delete</a>
            </div>
            ".$this->buildMenu($menu, $item->id) . "</li>";
            }
        }
        return $result ?  "\n<ol class=\"dd-list\">\n$result</ol>\n" : null;
    }
    // Getter for the HTML menu builder
    public function getHTML($items)
    {
        return $this->buildMenu($items);
    }
}
