@extends('layout.master')
@section('judul')
Halaman Update Profile
@endsection

@section('content')
<form action="/profile/{{$profile->id}}" method="POST">
@csrf
@method('PUT')
<div class="form-group">
    <label>Nama </label>
    <input type="text" class="form-control" value="{{$profile->user->name}}" disabled>
</div>
<div class="form-group">
    <label>Email User </label>
    <input type="text" class="form-control" value="{{$profile->user->email}}" disabled>
</div>
<div class="form-group">
    <label>Umur </label>
    <input type="text" name="umur" class="form-control" value="{{$profile->umur}}">
</div>
<div class="form-group">
    <label>Biodata</label>
    <textarea name="bio" class="form-control" cols="20" rows="10">{{$profile->bio}}</textarea>
</div>
<div class="form-group">
    <label>Alamat </label>
    <input type="text" name="alamat" class="form-control" value="{{$profile->alamat}}">
</div>
<button type="submit" class="btn btn-primary">Submit</button>
</form>    
@endsection
