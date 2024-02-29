@extends('layouts.master')
@section('content')


<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">Transaksi</h1>
<p class="mb-4">suatu aktivitas perusahaan yang menimbulkan perubahan terhadap posisi harta keuangan perusahaan, 
    misalnya seperti menjual, membeli, membayar gaji, serta membayar berbagai macam biaya yang lainnya</a>.</p>


<a class="btn btn-facebook" href="/transaksi/create">
    Tambah Transaksi
</a>
<br><br>
<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Data Transaksi </h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Tanggal</th>
                        <th>Keterangan</th>
                        <th>No Reff</th>
                        <th>jenis saldo</th>
                        <th>Saldo</th>
                        
                        <th width="180px">Aksi</th>
                    </tr>
                </thead>
                             <tbody>

                    @foreach($datas as $data)
                   
                    <tr>
                        <td>{{ $data->tanggal_transaksi }}</td>
                        <td>{{ $data->keterangan }}</td>
                        <td>{{ $data->no_reff }}</td>
                        <td>{{ $data->jenis_saldo }}</td>
                        <td>Rp .{{number_format($data->saldo)  }}</td>
                   <td>
                            <a href="/transaksi/edit/{{ $data->id }}"> <button class="btn btn-sm btn-warning">
                                    Update</button>
                            </a>
                            |

                            <a href="/transaksi/delete/{{ $data->id}}">
                                <button class="btn btn-sm btn-danger">Delete</button>
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