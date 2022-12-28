@extends('layouts.template')

@section('title','Homepage')

@section('content')

<a href={{ route('add') }}><button type="button">Tambah</button></a>
    <table class="table">
        <thead>
            <th>No</th>
            <th>Judul</th>
            <th>Penulis</th>
            <th>Kategori</th>
            <th>Penerbit</th>
            <th>Tahun Terbit</th>
            <th>Tahun Cetak</th>
            <th>Jumlah Halaman</th>
            <th>Rating</th>
            <th>Gambar</th>
            <th>Sinopsis</th>
            <th>Action</th>
        </thead>
        <tbody>
            @foreach ($books as $book)
            <tr>
                
                
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $book["title"] }}</td>
                    <td>{{ $book["authors"]['name'] }}</td>
                    <td>{{ $book["categories"]['category'] }}</td>
                    <td>{{ $book["publisher"] }}</td>
                    <td>{{ $book["released_date"] }}</td>
                    <td>{{ $book["print_date"] }}</td>
                    <td>{{ $book["pages_number"] }}</td>
                    <td>{{ $book["rating"] }}</td>
                    <td><img src="{{ $book["picture"]}}" width="50px" height="50px"></td>
                    <td>{{ $book["sinopsis"] }}</td>
                    <td>
                        <a href={{ route('edit',$book["id"]) }}><button>Edit</button></a>
                        <a href={{ route('destroy',$book["id"]) }}><button>hapus</button></a>
                    </td>
               
            </tr>
             @endforeach
        </tbody>
    </table>

@endsection
    

    