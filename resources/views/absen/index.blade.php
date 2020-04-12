@extends('layouts.master')

@section('content')
	<div class="card shadow">
		<div class="card-header border-0">
			<h3 class="float-left " style="padding-top:0.5%">Data Absen</h3>
			{{-- download excel --}}						
			<form class="" action="" method="get">
				<a href="/absen/cetak_pdf" class="btn btn-primary float-right" target="_blank">CETAK PDF</a>
			</form>
			{{-- <button type="button" class="btn btn-sm btn-primary float-right" data-toggle="modal" data-target="#exampleModalLong">Tambah Data</button>                             --}}
		</div>
		<div class="card-body">
			<div class="row">
				<div class="col-md-6">
					<form action="/absen/guru" method="post">
						@csrf 
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
	<!-- <a href="/pegawai/cetak_pdf" class="btn btn-primary" target="_blank">CETAK PDF</a> -->
	<table class="table align-items-center table-flush">
		<thead class="thead-light">
		<tr>
			<th scope="col">No</th>
			<th scope="col">NIP</th>
			<th scope="col">Nama</th>
			<th scope="col">Tanggal</th>
			<th scope="col">Keterangan</th>
			<th scope="col">Aksi</th>
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
			@else ($a->keterangan == 0)
				<td>Tidak Hadir</td>
			@endif	
			<td>
				<button class="btn btn-warning btnEdit" type="button" data-id="{{$a->id}}" data-telp="{{$a->tanggal}}" data-nip="{{$a->nip}}" data-nama="{{$a->nama}}" data-alamat="{{$a->keterangan}}"  data-toggle="modal" data-target="#editModal"><i class="fa fa-edit"></i></button>
			</td>
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
		  <form action="/guru/create" method="post">
			{{ csrf_field() }}
			  <div class="form-group">
				  <label for="exampleInputEmail1">Tanggal</label>
				  <input name="tanggal" type="date" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Tanggal Lahir">
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
				<div class="form-group">
					<label for="exampleInputEmail1">File</label>
					<input name="file" type="file" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Tanggal Lahir">
				  </div>
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


<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLongTitle">Edit Modal</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form action="" method="post">
            {{ csrf_field() }}
            <input type="hidden" name="id">
                  <div class="form-group">
                    <label for="exampleInputEmail1">NIP</label>
                    <input name="nip" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="NIP">
                    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                  </div>
                  <div class="form-group">
                      <label for="exampleInputEmail1">Nama</label>
                      <input name="nama" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Nama">
                      <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                      </div>
                  <div class="form-group">
                      <label for="exampleFormControlSelect1">Tanggal</label>
                      <select name="tanggal" class="form-control" id="exampleFormControlSelect1">
                          <option value="L">Laki - laki</option>
                          <option value="P">Perempuan</option>
                      </select>
                  </div>
                  <div class="form-group">
                      <label for="exampleInputEmail1">Keterangan</label>
                      <input name="keterangan" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Agama">
                      <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                  </div>                  
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Update changes</button>
        </div>
      </form>
      </div>
    </div>
  </div>
@endsection
<script>
	 $(document).ready(function(){
          
          $('.btnEdit').click(function(){
            // Get Data
            var id = $(this).data('id');
            var nip = $(this).data('nip');
            var nama = $(this).data('nama');
            var tanggal = $(this).data('tanggal');
            var keterangan = $(this).data('keterangan');
            
            // Value Input
            $('input[name=Enip]').val(nip);
            $('input[name=Enama]').val(nama);
            $('input[name=Etanggal]').val(tanggal);
            $('textarea[name=Eketerangan]').val(keterangan);            
            $('input[name=id]').val(id);
          });
      });
</script>