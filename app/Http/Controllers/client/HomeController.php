<?php

namespace App\Http\Controllers\client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Restaurant;

class HomeController extends Controller
{
    public function index() {
        $restaurant = Restaurant::find(1);
        return view('pages.home', compact('restaurant'));
    }

    public function renderAboutPage() {
        return view('pages.about');
    }

    public function renderLoginPage() {
        return view('pages.auth.login');
    }
}
