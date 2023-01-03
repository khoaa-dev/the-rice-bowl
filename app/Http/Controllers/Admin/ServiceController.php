<?php

namespace App\Http\Controllers\Admin;
use App\Models\Service;
use App\Http\Controllers\Controller;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class ServiceController extends Controller {
    /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */

    public function index() {
        $data_all_services = Service::all();
        return view( 'admin.service.servicesList' )->with( 'data_all_services', $data_all_services );
    }

    /**
    * Show the form for creating a new resource.
    *
    * @return \Illuminate\Http\Response
    */

    public function create() {
        return view( 'admin.service.addService' );
    }

    /**
    * Store a newly created resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @return \Illuminate\Http\Response
    */

    public function store( Request $request ) {
        $service = new Service();
        $service->name =  $request->name;
        $service->detail =  $request->detail;
        $service->icon = 'null';
        $service->save();
        $request->session()->put( 'message', 'Add successful' );
        return Redirect::to( '/service' );
    }

    /**
    * Display the specified resource.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */

    public function show( $id ) {
        $service = Service::find( $id );
        $service->delete();
        return Redirect::to( '/service' );
    }

    /**
    * Show the form for editing the specified resource.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */

    public function edit( $id ) {
        $service = Service::find( $id );
        return view( 'admin.service.updateService' )->with( 'service', $service );
    }

    /**
    * Update the specified resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */

    public function update( Request $request, $id ) {
        $service = Service::find( $id );
        $service->name =  $request->name;
        $service->detail =  $request->detail;
        $service->save();
        $request->session()->put( 'message', 'Upadate successful' );
        return Redirect::to( '/service' );
    }

    /**
    * Remove the specified resource from storage.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */

    public function destroy( Request $request, $id ) {

    }
}