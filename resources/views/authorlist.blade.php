@extends('layouts.template')

@section('title','List Author')

@section('authors')

<div class="container">
    <a href={{ route('author.add') }}><button type="button">Tambah Authors</button></a>
    <table class="table">
        <thead>
            <tr>
            <th>No</th>
            <th>Nama</th>
            <th>Negara</th>
            <th>Tanggal Lahir</th>
            <th>Biodata</th>
            <th>Foto</th>
            <th>Action</th>
            </tr>
        </thead>
        <tbody>
             @foreach ($authors as $author)
            <tr>
               
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $author["name"] }}</td>
                    <td>{{ $author["country"] }}</td>
                    <td>{{ $author["birth_date"] }}</td>
                    <td>{{ $author["bio"] }}</td>
                    <td><img src="{{ $author["photo"]}}" width="50px" height="50px"></td>
                    <td>
                        <a href={{ route('author.edit',$author["id"]) }}><button>Edit</button></a>
                        <a href={{ route('author.destroy',$author["id"]) }}><button>Delete</button></a>
                    </td>
               
            </tr>
             @endforeach
        </tbody>
    </table>
</div>


@endsection
    