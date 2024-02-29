@extends('layouts.master')

@section('content')

<div class="container main">
		<div class="row">
			<div class="col-md-12">
				<div class="panel panel-default">
					<div class="panel-heading">
                        Buku Besar 
				    </div>
					<div class="panel-body">
                        <h4>Daftar Akun : <strong></strong> </h4>
					@foreach($buku as $data)						
						<div class="col-md-4" style="margin: 5px auto">
							<a href="/buku/{{ $data->no_reff }}" class="btn btn-primary btn-lg btn-block">{{ $data->nama_akuns }}</a>
						</div>
						
					@endforeach
					</div>
				</div>
			</div>
		</div><!--/.row-->

	</div>	<!--/.main-->

@endsection