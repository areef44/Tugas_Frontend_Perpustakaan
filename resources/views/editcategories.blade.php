@extends('layouts.template')

@section('title','Homepage')

@section('tambah')

  <div class="container py-5">
    <div class="row justify-content-center">
      <div class="col-8">
        <div class="card">
          @error('nama')
              <h1>{{$message}}</h1>
          @enderror
          <div class="card-body">
            <h3>Form Pengisian Category</h3>
            <form action={{ route('category.update',$categories["id"]) }} method="POST" enctype="multipart/form-data">
              @csrf
            <div class="form-group">
              <label for="">Categories: </label>
              <input type="text" name="category" class="form-control" placeholder="Masukan Nama Category" value={{ $categories['category'] }}>
            </div>

            <div>
              <label for="">Description: </label>
            </div>
            <div class="form-group">              
              <textarea name="description" id="" cols="70" rows="8" >{{ $categories['description']}}</textarea>
            </div>

            <div>
              <label for="">Pilih Thumbnail:</label><br>
              <input type="file" name="thumbnail" class="mb-4">
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