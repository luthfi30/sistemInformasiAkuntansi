@extends('layouts.master')

@section('content')

	<div class="container main">
        <div class="card-body">    
            <h1 class="h3 mb-2 text-gray-800">Laba Rugi</h1>
            <p class="mb-4">Di dalam akuntansi keuangan, Neraca atau laporan posisi keuangan adalah bagian dari laporan keuangan suatu
                 entitas yang dihasilkan pada suatu periode akuntansi yang menunjukkan posisi keuangan entitas tersebut pada akhir periode tersebut.</a>.</p>                  
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary pull-left">Laba Rugi  </h6>
                    
                    <h6 class="m-0 font-weight-bold text-primary pull-right"></h6>
                </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                          <tr>
                            <th class="text-center">pendapatan</th>
                            <th class="text-center" >Akun</th>
                            <th class="text-center" >Jumlah</th>
                         
                          </tr>
                          <?php $i = 1 ?>
                          @foreach($debet as $item)
                          <tr>
                              <td></td>
                            <td class="text-center">{{ $item->no_reff }}</td>
                            <td class="text-center" >{{ number_format($item->saldo) }}</td>
                           
                           
                          </tr>
                        @endforeach
                        <tr>
                            <th colspan="2" class="text-center" style="color: red">Total Pendapatan</th>
                            <th class="text-center" style="color: red">Rp. {{ number_format($total_debet, 0, ',', '.') }},-</th>
                        </tr>

                        <tr>
                            <th class="text-center">Beban</th>
                            <th class="text-center" >Akun</th>
                            <th class="text-center"  >Jumlah</th>
                         
                          </tr>

                          <?php $i = 1 ?>
                          @foreach($kredit as $item)
                          <tr>
                              <td></td>
                            <td class="text-center">{{ $item->no_reff }}</td>
                            <td class="text-center" >{{ number_format($item->saldo) }}</td>
                            
                           
                           
                          </tr>
                          
                        @endforeach
                        <tr>
                            <th colspan="2" class="text-center" style="color: red">Total Beban</th>
                            <th class="text-center"style="color: red">Rp. {{ number_format($total_kredit, 0, ',', '.') }},-</th>
                        </tr>
                        <tr>
                          <th colspan="2" class="text-center" style="color: red">Laba Rugi</th>
                          <th class="text-center" style="color: red">Rp. {{ number_format($hasil, 0, ',', '.') }},-</th>
                          
                        </tr>

                       

                    </table>

					</div>
				</div>
			</div>
		</div><!--/.row-->

	</div>	<!--/.main-->

@stop