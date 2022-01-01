@extends('layout.master')
@section('judul')
Halaman Index
@endsection

@section('content')
<form action="/film" method="POST" enctype="multipart/form-data">
@csrf
<div class="form-group">
    <label>Judul Film</label>
    <input type="text" name="judul" class="form-control">
</div>
<div class="form-group">
    <label>Ringkasan</label>
    <textarea name="ringkasan" class="form-control" cols="30" rows="10"></textarea>
</div>
<div class="form-group">
    <label>Tahun Film</label>
    <input type="number" name="tahun" class="form-control">
</div>
<div class="form-group">
    <label>Genre Film</label>
    <select name="genre_id" class="form-control">
        <option value="">Pilih Genre</option>
        @foreach ($genre as $item)
            <option value="{{$item->id}}">{{$item->nama}}</option>
        @endforeach
    </select>
</div>
<div class="form-group">
    <label>Poster</label>
    <input type="file" name="poster" class="form-control">
</div>
<button type="submit" class="btn btn-primary">Submit</button>
</form>    
@endsection
