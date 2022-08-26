@extends('layouts.back')
@section('title','Assign Ability')
@section('content')
<div class="row w-100">
    <div class="col">
        <div class="row p-2">
            <div class="col">
                <form action="/back/ability" method="get">
                @csrf
                    <button class="btn-primary">Back</button>
                </form>
            </div>
        </div>
        <div class="row p-2">
            <div class="col">
                <form action="/admin/role/assignAbility/{{$role->id}}" method="post">
                @csrf
                    <div class="form-group">
                        <label for="title">for {{$role->name}}</label>
                    </div>
                    <select name="ability">
                    @foreach($ability as $abilities)
                    <option value="{{$abilities->id}}">{{$abilities->name}}</option>
                    @endforeach
                    </select>
                    <button type="submit" class="btn btn-primary">Assign Abilities</button>
                </form>
            </div>
        </div>
    
    </div>
</div> 
@endsection
