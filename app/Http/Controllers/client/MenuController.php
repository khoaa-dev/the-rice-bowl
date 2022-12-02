<?php

namespace App\Http\Controllers\client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Menu;
use App\Models\MenuFood;
use App\Models\Food;
use App\Models\Restaurant;

class MenuController extends Controller
{
    public function index()
    {
        $foods = Food::all()->take(6);
        $menus = Menu::all()->take(6);
        $restaurant = Restaurant::findOrFail(1);
        foreach ($menus as $menu) {
            $menu->menuFoods = MenuFood::Where('menuId', $menu->id)->get();
            foreach ($menu->menuFoods as $mf) {
                $mf->food = Food::FindOrFail($mf->foodId);
            }
        }
        return view('client.pages.menu', compact('foods', 'menus', 'restaurant'));
    }
    
}
