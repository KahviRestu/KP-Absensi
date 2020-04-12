<!DOCTYPE html>
<html>
<head>
	<title>Membuat Laporan PDF Dengan DOMPDF Laravel</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
	<style type="text/css">
		table tr td,
		table tr th{
			font-size: 9pt;
		}
	</style>
	<table class="table align-items-center table-flush table table-bordered">
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
			@else ($a->keterangan == 0)
				<td>Tidak Hadir</td>
			@endif	
		</tr>
		@endforeach
		</tbody>
	</table>

</body>
</html>