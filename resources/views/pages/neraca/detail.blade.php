@extends('layouts.master')

@section('content')

	<div class="container main">
        <div class="card-body">    
            <h1 class="h3 mb-2 text-gray-800">Neraca</h1>
            <p class="mb-4">Di dalam akuntansi keuangan, Neraca atau laporan posisi keuangan adalah bagian dari laporan keuangan suatu
                 entitas yang dihasilkan pada suatu periode akuntansi yang menunjukkan posisi keuangan entitas tersebut pada akhir periode tersebut.</a>.</p>                  
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary pull-left">Neraca  </h6>
                    
                    <h6 class="m-0 font-weight-bold text-primary pull-right">Periode : {{ $periode }} </h6>
                </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                          <tr>
                            <th class="text-center" >No</th>
                            <th class="text-center" >Akun</th>
                            <th class="text-center" >Debet</th>
                            <th class="text-center" >Kredit</th>
                          </tr>
                          <?php $i = 1 ?>
                          @foreach($data as $item)
                          <tr>
                            <td class="text-center">{{ $i++ }}</td>
                            <td class="text-center">{{ $item['nama_akuns'] }}</td>
                            <td>
                              Rp. {{ number_format($item['Debit'], 0, ',', '.') }},-
                            </td>
                            <td>
                              Rp. {{ number_format($item['Kredit'], 0, ',', '.') }},-
                            </td>
                          </tr>
                        @endforeach
                        <tr>
                          <th colspan="2" class="text-center">Total</th>
                          <th class="text-center">Rp. {{ number_format($total_saldo_debet, 0, ',', '.') }},-</th>
                          <th class="text-center">Rp. {{ number_format($total_saldo_kredit, 0, ',', '.') }},-</th>
                        </tr>

                       

                    </table>

					</div>
				</div>
			</div>
		</div><!--/.row-->

	</div>	<!--/.main-->

@stop