<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BackButtonController extends Controller
{
    public function bookBack(){
        return redirect('/admin/book');
    }

    public function cdBack(){
        return redirect('/admin/cd');
    }

    public function roleBack(){
        return redirect('/admin/roles');
    }

    public function abilityBack(){
        return redirect('/admin/abilities');
    }

    public function asignRoleBack(){
        return redirect('/admin/user');
    }

    public function asignAbilityBack(){
        return redirect('/admin/roles');
    }
}
