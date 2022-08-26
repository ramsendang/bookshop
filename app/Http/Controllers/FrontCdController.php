<?php

namespace App\Http\Controllers;
use App\Models\Cd;

use Illuminate\Http\Request;

class FrontCdController extends Controller
{
    public function index(){
        $cd = Cd::paginate(6);
        return view('front.cd', compact('cd'));
    }

    public function show(Cd $cd){
        return view('front.showcd', compact('cd'));
    }
}
