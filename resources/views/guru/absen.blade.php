@extends('layouts.master')

@section('content')
	<div class="card shadow">
		<div class="card-header border-0">
			<h3 class="float-left " style="padding-top:0.5%">Data Absen</h3>							
			<button type="button" class="btn btn-sm btn-primary float-right" data-toggle="modal" data-target="#exampleModalLong">Tambah Data</button>                            
		</div>
		<div class="card-body">
			<div class="row">				
				<div class="col-md-6">
					<form action="{{ route('absen.search') }}" method="get">
						<div class="form-group row">
							<div class="col-md-12 mx-auto ">
							<label for="tanggal" class="col-form-label">Pilih Tanggal Absen</label>
							<div class="input-group">
								<input type="date" class="form-control" name="tanggal" id="tanggal" value="{{ request('tanggal', date('Y-m-d')) }}">
								<div class="input-group-append">
									<button class="btn btn-outline-primary" type="submit">Cari</button>
								</div>
							</div>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>					

	<div class="table-responsive myTable" id="myTable">
	<table class="table align-items-center table-flush">
		<thead class="thead-light">
		<tr>
			<th scope="col">No</th>
			<th scope="col">NIP</th>
			<th scope="col">Nama</th>
			<th scope="col">Tanggal</th>
			<th scope="col">Keterangan</th>
		</tr>
		</thead>
		<tbody>
		@php
			$no =1;
		@endphp
		@foreach($absen as $a)
		<tr>
			<td>{{$no++}}</td>
			<td>{{$a->guru->nip}}</td>
			<td>{{$a->guru->nama}}</td>
			<td>{{$a->tanggal}}</td>
			@if($a->keterangan == 1)
				<td>Hadir</td>
			@elseif($a->keterangan == 0)
				<td>Tidak Hadir</td>
			@elseif($a->keterangan == 2)
				<td>Izin</td>
			@else($a->keterangan == 3)
				<td>Sakit</td>
			@endif	
		</tr>
		@endforeach
		</tbody>
	</table>
	</div>
	</div>
</div>

<div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
	<div class="modal-dialog" role="document">
	  <div class="modal-content">
		<div class="modal-header">
		  <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
		  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
			<span aria-hidden="true">&times;</span>
		  </button>
		</div>
		<div class="modal-body">
		  <form action="/guru/createabsen" method="post">
			{{ csrf_field() }}
			  <input type="hidden" name="id" value="{{$user}}">
			  <div class="form-group">
				  <label for="exampleInputEmail1">Tanggal</label>
				  <input name="tanggal" type="date" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Tanggal">
				</div>
				<div class="form-group">
					<label for="exampleFormControlSelect1">Keterangan</label>
					<select name="keterangan" class="form-control" id="exampleFormControlSelect1">
						<option value="0">Tidak Hadir</option>
						<option value="1">Hadir</option>
						<option value="2">Izin</option>
						<option value="3">Sakit</option>
					</select>
				</div>
				<!-- <div class="form-group">
					<label for="exampleInputEmail1">File</label>
					<input name="file" type="file" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Tanggal Lahir">
				  </div> -->
			</div>
		<div class="modal-footer">
		  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
		  <button type="submit" class="btn btn-primary">Save changes</button>
		</div>
		  </form>
	  </div>
	</div>
  </div>
  <!-- End Modal Add -->
@endsection