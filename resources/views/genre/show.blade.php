@extends('layout.master')
@section('judul')
Genre {{$genre->nama}}
@endsection

@section('content')

<h1>{{$genre->nama}}</h1>
<p>{{$genre->Desc}}</p>

<div class="row">
    @foreach ($genre->film as $item)
    <div class="col-6">
        <div class="card" style="width: 50rem;">
            <img src="{{asset('gambar/'. $item->poster)}}" class="card-img-top" alt="...">
            <div class="card-body">
              <span class="badge badge-info">{{$genre->nama}}</span>
              <h5>{{$item->judul}}</h5>
              <p class="card-text">{{Str::limit($item->ringkasan, 300)}}</p>
            </div>
          </div>
    </div>
    @endforeach
</div>



<a href="/genre" class="btn btn-secondary">Kembali</a>    

@endsection
