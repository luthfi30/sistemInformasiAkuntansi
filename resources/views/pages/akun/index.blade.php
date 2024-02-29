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
                <thead>
                    <tr>
                        <th>No akun</th>
                        <th>Nama Akun</th>
                        <th>Keterangan</th>
                        <th width="180px">Aksi</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>No akun</th>
                        <th>Nama Akun</th>
                        <th>Keterangan</th>
                        <th>Aksi</th>

                    </tr>
                </tfoot>
                <tbody>
                    @forelse($datas as $data)

                    <tr>
                        <td>{{ $data->no_reff }}</td>
                        <td>{{ $data->nama_akuns }}</td>
                        <td>{{ $data->keterangan }}</td>
                        <td>
                            <a href="/akun/edit/{{ $data->no_reff }}">
                                <button class="btn btn-sm btn-warning">Update</button>
                            </a>
                            |

                            <a href="/akun/delete/{{ $data->no_reff }}">
                                <button class="btn btn-sm btn-danger">Delete</button>
                            </a>

                        </td>

                    </tr>

                    @empty
                    <tr>
                        <td colspan="6" class="text-center p-5">
                            Data Tidak tersedia
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>


@endsection