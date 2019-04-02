<?php

namespace App\Http\Controllers\Administrator;

use App\Models\Menu;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

class MenuController extends Controller
{
    public function Index()
    {
        $items 	= Menu::orderBy('position')->get();
        $menu 	= new Menu;
        $menu   = $menu->getHTML($items);
        $title  = "Manajemen Menu";

        $listTarget = [
            1 => '_blank',
            2=> '_self',
            3=> '_parent',
            4=> '_top',
            4=> 'framename',
        ];
        return view('administrator.menus.index', compact('items', 'menu', 'title', 'listTarget'));
    }

    public function getEdit($id)
    {
        $items = Menu::find($id);
        $title  = "Edit Menu";
        $menus  = Menu::all();
        $listTarget = [
            1 => '_blank',
            2=> '_self',
            3=> '_parent',
            4=> '_top',
            4=> 'framename',
        ];
        
        return view('administrator.menus.edit', compact('items', 'title', 'menus', 'listTarget'));
    }
    public function postEdit($id)
    {
        $item = Menu::find($id);
        $title = (Input::get('name', ''));
        $item->name 	= $title;
        $item->slug 	= str_slug($title);
        $item->url 		= Input::get('url', '');
        $item->parent_id = e(Input::get('parent_id'), 0);
        $item->class =  Input::get('class');
        $item->target =  Input::get('target');
        $item->group_id = 1;
        $item->save();
        return redirect()->route('menu.index')->with('message', 'Menu Berhasil ditambahkan');
    }
    // AJAX Reordering function
    public function postIndex()
    {
        $source       = e(Input::get('source'));
        $destination  = e(Input::get('destination', 0));

        $parent_id =  $destination ? $destination : 0;
        
        $item             = Menu::find($source);
        $item->parent_id  = $parent_id;
        $item->save();
        $ordering       = json_decode(Input::get('order'));
        $rootOrdering   = json_decode(Input::get('rootOrder'));
        if ($ordering) {
            foreach ($ordering as $order=>$item_id) {
                if ($itemToOrder = Menu::find($item_id)) {
                    $itemToOrder->position = $order;
                    $itemToOrder->save();
                }
            }
        } else {
            foreach ($rootOrdering as $order=>$item_id) {
                if ($itemToOrder = Menu::find($item_id)) {
                    $itemToOrder->position = $order;
                    $itemToOrder->save();
                }
            }
        }
        return 'ok ';
    }
    public function postNew()
    {
        $title = (Input::get('name', ''));

        $item = new Menu;
        $item->name 	= $title;
        $item->slug 	= str_slug($title);
        $item->url 		= Input::get('url', '');
        $item->position = Menu::max('position')+1;
        $item->parent_id = Input::get('parent_id');
        $item->class =  Input::get('class');
        $item->group_id = 1;
        $item->target = Input::get('target');

        $item->save();

        return redirect()->route('menu.index')->with('message', 'Menu Berhasil ditambahkan');
    }
    public function postDelete()
    {
        $id = Input::get('delete_id');
        // Find all items with the parent_id of this one and reset the parent_id to zero
        $items = Menu::where('parent_id', $id)->get()->each(function ($item) {
            $item->parent_id = 0;
            $item->save();
        });
        // Find and delete the item that the user requested to be deleted
        $item = Menu::find($id);
        $item->delete();
        return redirect()->route('menu.index')->with('message', 'Menu Berhasil dihapus');
    }
}
