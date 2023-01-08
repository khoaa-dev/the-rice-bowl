<?php

namespace App\Http\Controllers\Admin;

use App\Models\Service;
use App\Http\Controllers\Controller;
use App\Models\Menu;
use Exception;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        $data_all_services = Service::orderBy('id', 'DESC')->paginate(10);
        return view('admin.service.servicesList')->with('services', $data_all_services);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function create()
    {
        $menus = Menu::orderBy('name', 'ASC')->get();
        return view('admin.service.addService')->with('menus', $menus);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function store(Request $request)
    {
        $service = new Service();
        $service->name =  $request->name;
        $service->detail =  $request->detail;
        $service->icon = 'null';
        $service->save();
        $request->session()->put('message', 'Add successful');

        foreach ($request->menuIds as $menuId) {
            $menu = Menu::findOrFail($menuId);
            $menu->serviceId = $service->id;
            $menu->save();
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
        $service = Service::find($id);
        $service->delete();


        return Redirect::to('/service');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function edit($id)
    {
        $service = Service::find($id);
        $menus = Menu::where('serviceId', $id)->get();
        $menuIds = array();

        foreach ($menus as $menu) {
            array_push($menuIds, $menu->id);
        }

        $menus = Menu::orderBy('name', 'ASC')->get();

        return view('admin.service.updateService')
            ->with('service', $service)
            ->with('menus', $menus)
            ->with('menuIds', $menuIds);
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
        $service = Service::find($id);
        $service->name =  $request->name;
        $service->detail =  $request->detail;
        $service->save();
        $request->session()->put('message', 'Upadate successful');

        foreach ($request->menuIds as $menuId) {
            $menu = Menu::findOrFail($menuId);
            $menu->serviceId = $service->id;
            $menu->save();
        }

        return back()->with('status', 'Cập nhật thành công!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function destroy(Request $request, $id)
    {
        $service = Service::find($id);
        $menus = Menu::where('serviceId', $id)->get();

        foreach ($menus as $menu) {
            $menu->serviceId = 1;
            $menu->save();
        }

        try {
            $service->delete();
        } catch (Exception $ex) {
            return back()->with('status', 'Không thể xóa dịch vụ này!');
        }

        return back()->with('status', 'Xóa thành công!');
    }
}
