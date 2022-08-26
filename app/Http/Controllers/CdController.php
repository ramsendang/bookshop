<?php

namespace App\Http\Controllers;

use App\Models\Cd;
use Illuminate\Http\Request;

class CdController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cd = Cd::paginate(5);
        return view('admin.cd',compact('cd'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.addCd');
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
            'playlength' => 'required',
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

        Cd::create([
            'user_id' =>request('user_id'),
            'title' =>request('title'),
            'author' =>request('author'),
            'price' =>request('price'),
            'playlength' =>request('playlength'),
            'cover_image' => $fileNameToStore
        ]);

        return redirect('/admin/cd');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Cd  $cd
     * @return \Illuminate\Http\Response
     */
    public function show(Cd $cd)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Cd  $cd
     * @return \Illuminate\Http\Response
     */
    public function edit(Cd $cd)
    {
        return view('admin.editCd', compact('cd'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Cd  $cd
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Cd $cd)
    {
        $request->validate([
            'user_id' => 'required',
            'title' => 'required',
            'author' => 'required',
            'price' => 'required',
            'playlength' => 'required',
        ]);
        if($request->hasfile('cover_image')){
            $fileNameWithExt = $request->file('cover_image')->getClientOriginalName();
            $filename = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
            $extension = $request->file('cover_image')->getClientOriginalExtension();

            $fileNameToStore = $filename.'_'.time().'.'.$extension;

            $path = $request->file('cover_image')->storeAs('public/images/',$fileNameToStore);
        }

        $cd->user_id = request('user_id');
        $cd->title = request('title');
        $cd->author = request('author');
        $cd->price = request('price');
        $cd->playlength = request('playlength');
        if($request->hasfile('cover_image')){
            unlink("storage/images/".$cd->cover_image);
            $cd->cover_image = $fileNameToStore;
        }
        $cd->save();
        return redirect('/admin/cd');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Cd  $cd
     * @return \Illuminate\Http\Response
     */
    public function destroy(Cd $cd)
    {
        unlink("storage/images/".$cd->cover_image);
        $cd->delete();
        return redirect('/admin/cd');
    }
}
