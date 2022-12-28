@extends('layouts.template')

@section('title','Homepage')

@section('editbooks')

  <div class="container py-5">
    <div class="row justify-content-center">
      <div class="col-8">
        <div class="card">
          @error('nama')
              <h1>{{$message}}</h1>
          @enderror
          <div class="card-body">
            <h3>Form Edit Buku</h3>
            <form action="{{route('update',$books['id'])}}" method="POST" enctype="multipart/form-data">
              
              @csrf
            <div class="form-group">
              <label for="">Judul: </label>
              <input type="text" name="title" class="form-control" value="{{ $books['title'] }}">
            </div>
            <div class="form-group">
              <label for="">Author: </label>
                <select name="id_authors" id="">
                @foreach($authors as $author )
                  <option value="{{ $author['id']}}">{{$author['name']}}</option>
                @endforeach
              </select>
            </div>
              <div class="form-group">
              <label for="">Kategori: </label>
               <select name="id_categories" id="">
                @foreach($categories as $category)
                  <option value="{{ $category['id']}}">{{$category['category']}}</option>
                @endforeach
              </select>
            </div>

            <div class="form-group">
              <label for="">Penerbit: </label>
              <input type="text" name="publisher" class="form-control" value={{ $books['publisher'] }}>
            </div>
            
            <div class="form-group">
              <label for="">Tahun Terbit: </label>
              <input type="date" name="released_date" class="form-control" value={{ $books['released_date']}}>
            </div>

             <div class="form-group">
              <label for="">Tahun Cetak: </label>
              <input type="date" name="print_date" class="form-control" value={{ $books['print_date']}} >
            </div>

            <div class="form-group">
              <label for="">Jumlah Halaman: </label>
              <input type="number" name="pages_number" class="form-control" value={{ $books['pages_number'] }}>
            </div>

             <div class="form-group">
              <label for="">Rating: </label>
              <input type="number" step=0.01 name="rating" class="form-control" value={{ $books['rating'] }}>
            </div> 

            <div>
              <label for="">Pilih Gambar:</label><br>
              <input type="file" name="picture" class="mb-4">
            </div>

              <div class="form-group">
              <label for="">Sinopsis: </label>
              </div>
              <div class="form-group">
              <textarea name="sinopsis" id="" cols="30" rows="10"> {{ $books['sinopsis'] }}</textarea>
            </div> 
            <button type="submit" class="btn btn-primary"><i class="fa fa-paper-plane" aria-hidden="true"></i> Send</button>
            <a class="btn btn-danger" href="" role="button" aria-expanded="false" aria-controls="collapseExample"><i class="fa fa-sign-out" aria-hidden="true"></i> Back</a>
          </form>
          </div>
        </div>
      </div>
    </div>

  </div>

@endsection