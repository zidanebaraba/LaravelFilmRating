@extends('layout.master')
@section('judul')
Halaman Detail Film {{$film->judul}}
@endsection

@section('content')

<img src="{{asset('gambar/'. $film->poster)}}" alt="">
<h1>{{$film->judul}}</h1>
<p>{{$film->ringkasan}}</p>

<h1>Komentar</h1>

@foreach ($film->kritik as $item)
<div class="card">
    <div class="card-body">
      <h5>{{$item->user->name}}</h5>
      {{-- <textarea class="form-control" cols="20" rows="2" disabled >{{$item->isi}}</textarea> --}}
      <p class="card-text">{{$item->isi}}</p>
    </div>
  </div>
   
@endforeach

<form action="/kritik" method="POST" class="my-3">
    @csrf
    <div class="form-group">
        <label>Komentar / Kritik</label>
        <input type="hidden" name="film_id" value="{{$film->id}}">
        <textarea name="isi" class="form-control" cols="30" rows="10"></textarea>
    </div>

    @error('isi')
        <div class="alert alert-danger">{{$message}}</div>
    @enderror
    
    <div class="form-group">
        <label>Point</label>
        <select name="point" class="form-control">
            <option>Berikan Nilai Anda</option>
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
            <option value="5">5</option>
        </select>
    </div>

    @error('point')
        <div class="alert alert-danger">{{$message}}</div>
    @enderror

    <button type="submit" class="btn btn-primary">Submit</button>
    </form>  

<a href="/film" class="btn btn-secondary">Kembali</a>    

@endsection
