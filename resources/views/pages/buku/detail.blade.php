@extends('layouts.master')

@section('content')

	<div class="container main">
		<div class="card-body">

            <!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">Buku Besar</h1>
<p class="mb-4">Buku besar adalah buku utama pencatatan transaksi keuangan yang mengkonsolidasikan 
    masukan dari semua jurnal akuntansi dan merupakan penggolongan rekening sejenis.</a>.</p>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary pull-left">Data Buku Besar {{ $akun->nama_akuns }}</h6>
           
            <h6 class="m-0 font-weight-bold text-primary pull-right">{{ $akun->no_reff  }} </h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
				    
                        

                        <thead>
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                          <tr>
                            <th class="text-center" colspan="3">Transaksi</th>
                            <th class="text-center" colspan="2">Saldo</th>
                          </tr>
                          <tr>
                            <th class="text-center">No</th>
                            <th class="text-center">Waktu Transaksi</th>
                            <th class="text-center">Keterangan</th>
                            <th class="text-center">Debet</th>
                            <th class="text-center">Kredit</th>
                          </tr>
                        </thead>
                        <tbody>
                        <?php $i = 1 ?>
                        @foreach($daftar_buku as $data)
                          <tr>
                            <td class="text-center">{{ $i++ }}</td>
                            <td class="text-center">{{ $data->tanggal_transaksi }}</td>
                            <td class="">{{ $data->keterangan }}</td>
                            <td>
                            @if($data->jenis_saldo === 'Debit')
                              Rp. {{ number_format($data->saldo, 0, ',', '.') }},-
                            @else
                              -
                            @endif
                            </td>
                            <td>
                            @if($data->jenis_saldo === 'Kredit')
                              Rp. {{ number_format($data->saldo, 0, ',', '.') }},-
                            @else
                              -
                            @endif
                            </td>
                          </tr>
                        @endforeach

                        <tr>
                          <th colspan="3" class="text-center">Jumlah</th>
                          <th class="text-center">Rp. {{ number_format($total_debet, 0, ',', '.') }},-</th>
                            <th class="text-center">Rp. {{ number_format($total_kredit, 0, ',', '.') }},-</th>
                        </tr>

                        <tr>
                            <th colspan="3" class="text-center">Saldo</th>
                            <th colspan="2" class="text-center">
                            @if( substr($akun->no_reff, 0, 1) === '1' ||  substr($akun->no_reff, 0, 1) === '4' )
                        
                            Rp. {{ number_format($total_debet - $total_kredit, 0, ',', '.') }},-
                            
                            @elseif( substr($akun->no_reff, 0, 1) === '2' ||  substr($akun->no_reff, 0, 1) === '3' || substr($akun->no_reff, 0, 1) === '5' )
                            
                            Rp. {{ number_format($total_kredit - $total_debet, 0, ',', '.') }},-
                            
                            @endif
                            </th>
                        </tr>
                    </tbody>
                        

                    </table>

					</div>
				</div>
			</div>
		</div><!--/.row-->

	</div>	<!--/.main-->
@stop