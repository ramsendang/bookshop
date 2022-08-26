@extends('layouts.app')
@section('title','Dashboard')
@section('content')
<div class="container ">
    <div class="row px-2 ">
        <div class="col-lg-3 col-sm-12 border shadow-lg my-2"> 
            <div class="row">
                <div class="col">
                    <h4 class="text-black text-catitalize py-2">Admin Pannel</h4>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <h5 class="text-black text-catitalize py-1">Menu</h5>
                </div>
            </div>
            <div class="row">
                <div class="col d-flex flex-column">
                    @can('manage_book')
                    <a href="/admin/book" class="btn btn-primary mb-1">Books</a>
                    @endcan
                    @can('manage_cd')
                    <a href="/admin/cd" class="btn btn-primary mb-1"> CD's</a>
                    @endcan
                    @can('is_admin')
                    <a href="/admin/user" class="btn btn-primary mb-1"> User's</a>
                    <a href="/admin/roles" class="btn btn-primary mb-1"> Roles</a>
                    <a href="/admin/abilities" class="btn btn-primary mb-1"> Abilities</a>
                    @endcan
                </div>
            </div>
        </div>
        <div class="col-lg-9 col-sm-12 border shadow-lg my-2" style="min-height:100vh">
            <div class="row w-100 h-100">
                <div class="col d-flex justify-content-center align-items-center">
                    <h2>Welcome {{Auth::user()->name}}</h2>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
