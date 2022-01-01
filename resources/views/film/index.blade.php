@extends('layout.master')
@section('judul')
Halaman Index
@endsection

@section('content')
@auth    
<a href="/film/create" class="btn btn-primary my-2">Tambah Data</a>
@endauth

<div class="row">
    @forelse ($film as $item)
    <div class="col-3">
        <div class="card" style="width: 18rem;">
            <img src="{{asset('gambar/'. $item->poster)}}" class="card-img-top" alt="...">
            <div class="card-body">
              <span class="badge badge-info">{{$item->genre->nama}}</span>
              <h5>{{$item->judul}}</h5>
              {{-- <h3>{{DB::table('kritik')->where('film_id', $item->id)->select(DB::raw('AVG(point)'))->get()}}</h3> --}}
              <p class="card-text">{{Str::limit($item->ringkasan, 60)}}</p>
              @auth
              <form action="/film/{{$item->id}}" method="POST">
              @csrf
              @method('DELETE')
              <a href="/film/{{$item->id}}" class="btn btn-info btn-sm">Detail</a>
              <a href="/film/{{$item->id}}/edit" class="btn btn-warning btn-sm">Edit</a>
              <input type="submit" value="Delete" class="btn btn-danger btn-sm">
              </form>
              @endauth
              @guest
              <a href="/film/{{$item->id}}" class="btn btn-info btn-sm">Detail</a>
              @endguest

            </div>
          </div>
    </div>
    @empty
        <h4>Data Film Belum Ada</h4>
    @endforelse
</div>

@endsection
