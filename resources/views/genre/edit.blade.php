@extends('layout.master')
@section('judul')
Halaman Edit Film
@endsection

@section('content')
<form action="/genre/{{$genre->id}}" method="POST">
@csrf
@method('PUT')
<div class="form-group">
    <label>Genre</label>
    <input type="text" name="genre" class="form-control" value="{{$genre->nama}}">
</div>
<div class="form-group">
    <label>Deskripsi</label>
    <textarea name="desc" class="form-control" cols="20" rows="10" value="{{$genre->Desc}}">{{$genre->Desc}}</textarea>
</div>
<button type="submit" class="btn btn-primary">Submit</button>
</form>    
@endsection
