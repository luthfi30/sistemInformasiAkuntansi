@extends('layouts.master')
@section('content')
<div class="card " style="width: 38rem; margin-left:230px">
    <div class="card-header">
        <strong>Tambah Akun</strong>
    </div>
    <div class="card-body ">
        <form action="/akun/store" method="POST">
            @csrf
            <div class="form-group">
                <label for="name" form-control-label>Kode Akun</label>
                <input type="text" name="no_reff" value="{{old('no_reff')}}" class="form-control @error('name') is-invalid
                 @enderror" required />
                @error('no_reff') <div class="text-muted">{{$message}}</div> @enderror
            </div>

            <div class="form-group">
                <label for="name" form-control-label>Nama Akun</label>
                <input type="text" name="nama_akuns" value="{{old('nama_akuns')}}" required class="form-control @error('name') is-invalid
                 @enderror" />
                @error('nama_akuns') <div class="text-muted">{{$message}}</div> @enderror
            </div>

            <div class="form-group">
                <label for="name" form-control-label>Keterangan</label>
                <input type="text" name="keterangan" value="{{old('keterangan')}}" required class="form-control @error('name') is-invalid
                 @enderror" />
                @error('keterangan') <div class="text-muted">{{$message}}</div> @enderror
            </div>


            <div class="form-group">
                <button class="btn btn-primary btn-block" type="submit">
                    Tambah Akun
                </button>
            </div>
        </form>
    </div>
</div>
@endsection