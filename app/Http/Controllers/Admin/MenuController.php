<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Food;
use App\Models\Menu;
use App\Models\MenuFood;
use App\Models\Service;
use Exception;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $menus = Menu::orderBy('id', 'DESC')->paginate(10);

        foreach ($menus as $menu) {
            $foods = array();
            $menuFoods = MenuFood::where('menuId', $menu->id)->get();
            foreach ($menuFoods as $menuFood) {
                $food = Food::find($menuFood->foodId);
                array_push($foods, $food->name);
            }

            $menu->foods = implode(', ', $foods);
        }

        return view('admin.menu.index')->with('menus', $menus);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // get all services
        $services = Service::all();

        // get all food
        $foods = Food::all();

        return view('admin.menu.create')->with('services', $services)->with('foods', $foods);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $menu = new Menu;
        $menu->name = $request->name;
        $menu->save();

        foreach ($request->foodIds as $foodId) {
            $menuFood = new MenuFood;
            $menuFood->menuId = (int)$menu->id;
            $menuFood->foodId = (int)$foodId;

            $menuFood->save();
        }

        return back()->with('status', 'Thêm mới thành công!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $menu = Menu::find($id);
        $foods = Food::all();

        $menuFoods = MenuFood::where('menuId', $id)->get();
        $foodIds = array();

        foreach ($menuFoods as $menuFood) {
            array_push($foodIds, $menuFood->foodId);
        }

        return view('admin.menu.edit')->with('menu', $menu)
            ->with('foodIds', $foodIds)
            ->with('foods', $foods);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $menu = Menu::find($id);
        $menu->name = $request->name;
        $menu->save();

        $menuFoods = MenuFood::where('menuId', $id)->get();
        $preFoodIds = array();
        foreach ($menuFoods as $menuFood) {
            array_push($preFoodIds, $menuFood->foodId);
            if (!in_array($menuFood->foodId, $request->foodIds)) {
                $menuFood->delete();
            }
        }

        foreach ($request->foodIds as $foodId) {
            if (!in_array($foodId, $preFoodIds)) {
                $menuFood = new MenuFood;
                $menuFood->menuId = (int)$id;
                $menuFood->foodId = (int)$foodId;

                $menuFood->save();
            }
        }

        return back()->with('status', 'Cập nhật thành công!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $menu = Menu::find($id);
        $menuFoods = MenuFood::where('menuId', $id)->get();
        foreach ($menuFoods as $menuFood) {
            $menuFood->delete();
        }

        try {
            $menu->delete();
        } catch (Exception $ex) {
            return back()->with('status', 'Không thể xóa thực đơn này!');
        }

        return back()->with('status', 'Xóa thực đơn thành công!');
    }
}
