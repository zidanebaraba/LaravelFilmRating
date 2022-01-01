@extends('layout.master')
@section('judul')
Halaman Index
@endsection

@section('content')
<form action="/genre" method="POST" enctype="multipart/form-data">
@csrf
<div class="form-group">
    <label>Nama Genre</label>
    <input type="text" name="genre" class="form-control">
</div>
<div class="form-group">
    <label>Deskripsi</label>
    <textarea name="desc" class="form-control" cols="30" rows="10"></textarea>
</div>
<button type="submit" class="btn btn-primary">Submit</button>
</form>    
@endsection
