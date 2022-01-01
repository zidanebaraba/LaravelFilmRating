@extends('layout.master')
@section('judul')
Halaman Edit Film
@endsection

@section('content')
<form action="/film/{{$film->id}}" method="POST" enctype="multipart/form-data">
@csrf
@method('PUT')
<div class="form-group">
    <label>Judul Film</label>
    <input type="text" name="judul" class="form-control" value="{{$film->judul}}">
</div>
<div class="form-group">
    <label>Ringkasan</label>
    <textarea name="ringkasan" class="form-control" cols="30" rows="10" value="{{$film->ringkasan}}">{{$film->ringkasan}}</textarea>
</div>
<div class="form-group">
    <label>Tahun Film</label>
    <input type="number" name="tahun" class="form-control" value="{{$film->tahun}}">
</div>
<div class="form-group">
    <label>Genre Film</label>
    <select name="genre_id" class="form-control">
        <option value="">Pilih Genre</option>
        @foreach ($genre as $item)
        @if ($item->id === $film->genre_id)
            <option value="{{$item->id}}" selected>{{$item->nama}}</option>
        @else
        <option value="{{$item->id}}">{{$item->nama}}</option>
        @endif            
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
