@extends('layouts.template')

@section('title','List Category')

@section('category')

<div class="container">
    <a href={{ route('category.add') }}><button type="button">Tambah Category</button></a>
    <table class="table">
        <thead>
            <tr>
            <th>No</th>
            <th>Kategori</th>
            <th>Description</th>
            <th>Thumbnail</th>
            <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($categories as $category)
            <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $category["category"] }}</td>
                    <td>{{ $category["description"] }}</td>
                    <td><img src="{{ $category["thumbnail"]}}" width="50px" height="50px"></td>
                    <td>
                        <a href={{ route('category.edit',$category["id"]) }}><button>Edit</button></a>
                        <a href={{ route('category.destroy',$category["id"]) }}><button>hapus</button></a>
                    </td>  
            </tr>
            @endforeach
        </tbody>
    </table>
</div>


@endsection
    