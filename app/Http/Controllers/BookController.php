<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $book = Book::Paginate(5);
        return view('admin.book',[
            'book' => $book
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.addbook');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required',
            'title' => 'required',
            'author' => 'required',
            'price' => 'required',
            'numpages' => 'required',
            'cover_image' => 'required'
        ]);
        if($request->hasfile('cover_image')){
            $fileNameWithExt = $request->file('cover_image')->getClientOriginalName();
            $filename = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
            $extension = $request->file('cover_image')->getClientOriginalExtension();

            $fileNameToStore = $filename.'_'.time().'.'.$extension;

            $path = $request->file('cover_image')->storeAs('public/images/',$fileNameToStore);
        }else{
            $fileNameToStore = 'noimage.jpg';
        }

        Book::create([
            'user_id' =>request('user_id'),
            'title' =>request('title'),
            'author' =>request('author'),
            'price' =>request('price'),
            'numpages' =>request('numpages'),
            'cover_image' => $fileNameToStore
        ]);
        return redirect('/admin/book');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function show(Book $book)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function edit(Book $book)
    {
        return view('admin.editBook', compact('book'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Book $book)
    {
        $request->validate([
            'user_id' => 'required',
            'title' => 'required',
            'author' => 'required',
            'price' => 'required',
            'numpages' => 'required',
        ]);
        if($request->hasfile('cover_image')){
            $fileNameWithExt = $request->file('cover_image')->getClientOriginalName();
            $filename = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
            $extension = $request->file('cover_image')->getClientOriginalExtension();

            $fileNameToStore = $filename.'_'.time().'.'.$extension;

            $path = $request->file('cover_image')->storeAs('public/images/',$fileNameToStore);
        }
        
        $book->user_id = request('user_id');
        $book->title = request('title');
        $book->author = request('author');
        $book->price = request('price');
        $book->numpages = request('numpages');
        if($request->hasfile('cover_image')){
            unlink("storage/images/".$book->cover_image);
            $book->cover_image = $fileNameToStore;
        }
        $book->save();
        return redirect('/admin/book');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function destroy(Book $book)
    {
        unlink("storage/images/".$book->cover_image);
        $book->delete();
        return redirect('/admin/book');
    }
}
