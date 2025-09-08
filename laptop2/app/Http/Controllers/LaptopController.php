<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Laptop;

class LaptopController extends Controller
{
    public function index(){
        $laptops = Laptop::latest()->get();
        return view('laptops.laptops', compact('laptops'));
    }
}
