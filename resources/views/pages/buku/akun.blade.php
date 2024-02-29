@extends('layouts.master')
@section('content')


<!-- Page Heading -->
{{-- {!! Form::open(['url' => '/buku/'.$akun->no_reff.'/cari', 'method' => 'get', 'class' => 'form-inline text-center']) !!}
                  <div class="form-group">
                    <label for="name">Bulan</label>
                    {!! Form::selectMonth('bulan', null, ['class' => 'form-control', 'placeholder' => '-- Bulan --']) !!}
                  </div>
                  <div class="form-group">
                    <label for="name">Tahun</label>
                    {!! Form::selectRange('tahun', 2018, 2050, null, ['class' => 'form-control', 'placeholder' => '-- Tahun --']) !!}
                    <div class="form-group">
                        <button type="submit" class="btn btn-default btn-md">Cari</button>
                    </div>
                  </div>
{!! Form::close() !!} --}}

<br><br>
<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Data Buku Besar {{ $akun->nama_akuns }}</h6>
        <h6 class="m-0 font-weight-bold text-primary">Total data {{ $totalbuku }}</h6>
        
    </div>
    
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Tanggal</th>                       
                        <th width="180px">Aksi</th>
                    </tr>
                </thead>
                 <tbody>
                    <?php $i = 1 ?>
                    @foreach($buku as $data)
                    <tr>
                      <td>{{ $i++ }}</td>
                      <td>{{ date('F Y', strtotime('1-'.$data->waktu)) }}</td>
                      <td>
                        <a href="{{ url('/buku/'.$akun->no_reff.'/'.date('Y-m-d', strtotime('1-'.$data->waktu))) }}" class="btn btn-info">
                          Detail
                        </a>
                      </td>
                    </tr>
                  @endforeach
                </tbody>

            </table>
        </div>
    </div>
</div>


@endsection