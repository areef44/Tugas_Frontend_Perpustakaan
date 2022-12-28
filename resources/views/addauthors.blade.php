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
            <h3>Form Pengisian Authors</h3>
            <form action={{ route('author.store') }} method="POST" enctype="multipart/form-data">
              @csrf
            <div class="form-group">
              <label for="">Nama: </label>
              <input type="text" name="name" class="form-control" placeholder="Masukan Nama Author">
            </div>

            <div class="form-group">
              <label for="">Negara: </label>
              <input type="text" name="country" class="form-control" placeholder="Masukan Nama Author">
            </div>

            <div class="form-group">
              <label for="">Tanggal Lahir: </label>
              <input type="date" name="birth_date" class="form-control" placeholder="Masukan Tahun Terbit">
            </div> 


            <div class="form-group">
              <label for="">Biodata: </label>
              <textarea name="bio" id="" cols="30" rows="10"></textarea>
            </div>
            
            <div>
              <label for="">Pilih Gambar:</label><br>
              <input type="file" name="photo" class="mb-4">
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