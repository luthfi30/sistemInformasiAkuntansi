@extends('layouts.master')
@section('content')
<div class="card " >
    <div class="card-header">
        <strong>Tambah Transaksi</strong>
    </div>
    <div class="card-body ">
        <form action="/transaksi/store" method="POST">
            @csrf
            <section>
                <div class="panel panel-header">
                    <table class="table table-borderd">
                        <thead>
                            <tr>
                                <th>Tanggal</th>
                                <th>Keterangan</th>
                                <th>Akun</th>
                                <th>Jenis Saldo</th>
                                <th>Nominal</th>
                                <th> <a href="#" class="btn btn-warning addRow">+</a></th>
                            </tr>

                        </thead>
                        <tbody>
                            <tr>
                                <td>
                                    <input type="text" name="tanggal_transaksi[]" value="{{old('tanggal_transaksi')}}" id="datepicker" class="form-control @error('name') is-invalid
                                    @enderror" />
                   
                                </td>
                                <td>
                                    <input type="text" name="keterangan[]" value="{{old('keterangan')}}"  class="form-control @error('name') is-invalid
                                    @enderror" />
                   
                                </td>
                                <td>
                                    <select name="no_reff[]" required class="form-control @error('no_reff') is-invalid
                                    @enderror">
                                        @foreach ($akun as $a)
                                            <option value="{{$a->no_reff}}">{{$a->nama_akuns}}</option>
                                        @endforeach
                                    </select>  
                                     @error('no_reff')  <div class="text-muted">{{$message}}</div>   @enderror
                                </div>
                    
                   
                                </td>
                                <td>
                                    <select name="jenis_saldo[]" id="jenis_saldo" class="form-control">
                                        <option value="Debit">Debit</option>
                                        <option value="Kredit">Kredit</option>
                                    </select>
                    
                                </td>
                                <td>
                                    <input type="number" name="saldo[]" value="{{old('saldo')}}"  class="form-control @error('name') is-invalid
                                    @enderror" />
                   
                                </td>
                                <td>
                                    <a href="#" class="btn btn-danger remove">X</a>
                                </td>
                            </tr>
                        </tbody>
                        <tfoot>
                            <tr>
                                <td style="border: none"></td>
                                <td style="border: none"></td>
                                <td style="border: none"></td>
                                <td style="border: none"></td>
                                <td style="border: none"></td>
                                
                                <td>        
                                  
                                 <input type="submit" name="save" id="" value="Submit" class="btn btn-primary form-control">
                                </td>
                            </tr>
                        </tfoot>
                    </table>
                    
                </div>
            </section>

           
        </form>
    </div>
</div>

<script type="text/javascript">
    $('.addRow').on('click',function(){
        addRow();
    });
    function addRow(){
        var data='<tr>'+
            '<td> <input type="text" class="form-control name="tanggal_transaksi[]">  </td>'+
            '<td> <input type="text" class="form-control name="keterangan[]">  </td>'+
         
            '<td>'+                     
                '<select class="form-control  name="no_reff[]">'+
                    @foreach ($akun as $a)
                                '<option value="{{$a->no_reff}}">{{$a->nama_akuns}}</option>'+
                    @endforeach
                 '</select>'+                        

            '</td>'+

            '<td>'+                     
                '<select class="form-control  name="jenis_saldo[]">'+
                            '<option value="Debit">Debit</option>'+
                                '<option value="Kredit">Kredit</option>'+        
                 '</select>'+                        

            '</td>'+

            '<td> <input type="text" class="form-control name="saldo[]">   </td>'+
           
            '<td>  <a href="#" class="btn btn-danger remove">X</a> </td>'+
            '</tr>';
            $('tbody').append(data);
    };

    $('.remove').live('click',function(){
        var last=$('tbody tr').length;
        if(last==1){
            alert("baris terakhir tidak bisa di hapus")
        }else{
        $(this).parent().parent().remove();
        }
    });
</script>
@endsection