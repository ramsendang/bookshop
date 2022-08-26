<?php

namespace App\Http\Controllers;
// use App\Http\Controllers\BookController;
use App\Models\Book;

use Illuminate\Http\Request;

class FrontBookController extends Controller
{
    public function index(){
        $book = Book::paginate(6);
        return view('front.book', compact('book'));
    }

    public function show(Book $book){
        return view('front.showbook',compact('book'));
    }
}
