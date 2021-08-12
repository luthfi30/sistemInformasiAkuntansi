@extends('layouts.master')
@section('content')


<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">Daftar Tabel COA</h1>
<p class="mb-4">Chart of Account (CoA) adalah sebuah daftar dari akun-akun perusahaan yang digunakan untuk
    mengidentifikasi ataupun memperlancar proses pencatatan transaksi, baik itu pemasukkan maupun pengeluaran</a>.</p>


<a class="btn btn-facebook" href="/akun/create">
    Tambah Akun
</a>
<br><br>
<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Tabel Akun</h6>
    </div>
              <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                          <tr>
                            <th class="text-center" >No</th>
                            <th class="text-center" >Akun</th>   
                            <th class="text-center" >Tipe</th>                        
                            <th class="text-center" >Saldo</th>
                          
                          </tr>
                          <?php $i = 1 ?>
                          @foreach($data as $item)
                          <tr>
                            <td class="text-center">{{ $i++ }}</td>
                            <td class="text-center">{{ $item['nama_akuns'] }}</td>         
                            <td  class="text-center">{{ $item['keterangan'] }}</td>                                         
                            <td>
                              
                              Rp. {{ number_format($item['saldo'], 0, ',', '.') }},-
                            </td>
                          </tr>
                        @endforeach                     
                    </table>
					</div>
				</div>
            </div
@endsection