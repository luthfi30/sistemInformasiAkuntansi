@extends('layouts.master')
@section('content')
<div class="card " style="width: 38rem; margin-left:230px">
    <div class="card-header">
        <strong>Tambah Transaksi</strong>
    </div>
    <div class="card-body ">
        <form action="/transaksi/store" method="POST">
            @csrf
            <div class="form-group">
                <label for="name" form-control-label>Tanggal Transaksi</label>
                <input type="date" required  name="tanggal_transaksi" value="{{old('tanggal_transaksi')}}" id="datepicker" class="form-control @error('name') is-invalid
                 @enderror" />
                @error('tanggal_transaksi') <div class="text-muted">{{$message}}</div> @enderror
            </div>

            <div class="form-group">
                <label for="name" form-control-label>Tanggal Input</label>
                <input type="date" required  name="tanggal_input" value="{{old('tanggal_input')}}" id="datepicker" class="form-control @error('name') is-invalid
                 @enderror" />
                @error('tanggal_input') <div class="text-muted">{{$message}}</div> @enderror
            </div>
            

            <div class="form-group">
                <label for="name" form-control-label>Nama Akun</label>  
                <select name="no_reff" required class="form-control @error('no_reff') is-invalid
                @enderror">
                    @foreach ($akun as $a)
                        <option value="{{$a->no_reff}}">{{$a->nama_akuns}}</option>
                    @endforeach
                </select>  
                 @error('no_reff')  <div class="text-muted">{{$message}}</div>   @enderror
            </div>

            <div class="form-group">
                <label for="name" form-control-label>Keterangan</label>
                <input type="text" required name="keterangan" value="{{old('keterangan')}}" class="form-control @error('name') is-invalid
                 @enderror" />
                @error('keterangan') <div class="text-muted">{{$message}}</div> @enderror
            </div>

            <div class="form-group">
                <label for="name"required form-control-label>Jenis Saldo</label>
                <select name="jenis_saldo" id="jenis_saldo" class="form-control">
                    <option value="Debit">Debit</option>
                    <option value="Kredit">Kredit</option>
                </select>
            </div>

            
            <div class="form-group">
                <label for="name" form-control-label>Saldo</label>
                <input type="number" required name="saldo" value="{{old('saldo')}}" class="form-control @error('saldo') is-invalid
                 @enderror" />
                @error('saldo') <div class="text-muted">{{$message}}</div> @enderror
            </div>

            <div class="form-group">
                <button class="btn btn-primary btn-block" type="submit">
                    Tambah Transaksi
                </button>
            </div>
        </form>
    </div>
</div>


@endsection