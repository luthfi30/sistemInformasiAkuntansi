@extends('layouts.master')
@section('content')


<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
    <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
</div>

<!-- Content Row -->
<div class="row">

    <!-- Earnings (Monthly) Card Example -->
    
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-primary shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                <a h href="/akun">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Total Akun</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $akun }}</div>
                    </div>
                  
                </a>
                </div>            
            </div>
        </div>
    </div>

    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-3 col-md-6 mb-4"  >
        <div class="card border-left-success shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Total Transaksi</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800"  href="/akun">{{ $transaksi }}</div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
    

    {{-- <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-info shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Tasks</div>
                        <div class="row no-gutters align-items-center">
                            <div class="col-auto">
                                <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">50%</div>
                            </div>
                            <div class="col">
                                <div class="progress progress-sm mr-2">
                                    <div class="progress-bar bg-info" role="progressbar" style="width: 50%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Pending Requests Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-warning shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Pending Requests</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">18</div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-comments fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div> --}}
</div>

<!-- Content Row -->
<div class="row">
<div class="container-fluid">
 
    
    
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Jurnal Umum</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Tanggal</th>
                            <th>Nama Akun</th>
                            {{-- <th>Keterangan</th> --}}
                            <th>No Reff</th>
                            <th>jenis saldo</th>
                            <th>Debet</th>
                            <th>Kredit</th>
                           
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th colspan="4" style="color:black" class="text-center">Jumlah Total</th>
                            <th colspan="1" style="color:black">Rp. {{ number_format($totalDebit ) }}</th>
                            <th colspan="1" style="color:black">Rp.{{ number_format($totalKredit)  }}</th>
                            <th></th>
                        </tr>
                        <tr>
                            @if($totalDebit != $totalKredit)
                            <th colspan="7" colspan="7" class="text-center bg-danger"
                                style=" color:white;font-wight:bolder;font-size:19px">Tidak Seimbang</th>
                            @endif
                            @if($totalDebit == $totalKredit)
                            <th colspan="7" class="text-center bg-success"
                                style=" color:white;font-wight:bolder;font-size:19px">
                                Seimbang</th>
                            @endif
                        </tr>
                    </tfoot>
    
                    <tbody>
    
                        @foreach($datas as $data)
                        @if($data->jenis_saldo == 'Debit')
    
                        <tr>
                            <td>{{ $data->tanggal_transaksi }}</td>
                            <td>{{ $data->akun->nama_akuns }}</td>
                            {{-- <td>{{ $data->keterangan }}</td> --}}
                            <td>{{ $data->no_reff }}</td>
                            <td>{{ $data->jenis_saldo }}</td>
                            <td>Rp .{{number_format($data->saldo)  }}</td>
                            <td>Rp.0</td>
                               
                        </tr>
                        @endif
                        @if($data->jenis_saldo == 'Kredit')
                        <tr>
                            <td>{{ $data->tanggal_transaksi }}</td>
                            <td class="text-right">{{ $data->akun->nama_akuns }}</td>
                            {{-- <td>{{ $data->keterangan }}</td> --}}
                            <td>{{ $data->no_reff }}</td>
                            <td>{{ $data->jenis_saldo }}</td>
                            <td>Rp.0</td>
                            <td>Rp .{{number_format($data->saldo)  }}</td>
                            
    
                            </td>
    
                        </tr>
                        @endif
    
    
                        @endforeach
                    </tbody>
    
                </table>
            </div>
        </div>
    </div>
    
    
   
</div>

<!-- Content Row -->
</div>



@endsection
