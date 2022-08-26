<?php

namespace App\Http\Controllers;
use App\Models\Book;
use App\Models\Cd;

use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    public function index(){

        $latestbook = Book::latest('id')->take(2)->get();
        $book = Book::take(6)->get();
        $latestcd = Cd::latest('id')->take(2)->get();
        $cd = Cd::take(6)->get();
        return view('welcome',[
            'latestbook' => $latestbook,
            'book' => $book,
            'latestcd' => $latestcd,
            'cd' => $cd,
        ]);
    }
}
