@extends('layout.master')
@section('judul')
Halaman Index
@endsection

@section('content')

<a href="/genre/create" class="btn btn-primary my-2">Tambah Data</a>

<div class="row">
  <table class="table">   
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Genre</th>
      <th scope="col">Deskripsi</th>
      <th scope="col">List Film</th>
      <th scope="col">Aksi</th>
    </tr>
  </thead>
  @forelse ($genre as $item)
    <tbody>
        <tr>
          <th scope="row">{{$item->id}}</th>
          <td>{{$item->nama}}</td>
          <td>{{$item->Desc}}</td>
          <td>
            <ul>
              @foreach ($item->film as $value)
                  <li>
                    {{$value->judul}}
                  </li>
              @endforeach
            </ul>
          </td>
          <td>
            <form action="/genre/{{$item->id}}" method="POST">
            @csrf
            @method('DELETE')
            <a href="/genre/{{$item->id}}" class="btn btn-info btn-sm">Detail</a>
            <a href="/genre/{{$item->id}}/edit" class="btn btn-warning btn-sm">Edit</a>
            <input type="submit" value="Delete" class="btn btn-danger btn-sm">
            </form>
          </td>
        </tr>
      </tbody>
    @empty
        <h4>Data Film Belum Ada</h4>
    @endforelse
  </table>
</div>

@endsection
