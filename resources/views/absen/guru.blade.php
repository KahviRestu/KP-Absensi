@extends('layouts.master')

@section('content')
<div class="container-fluid mt--9">
    <div class="row">
        <div class="col-md">
            <div class="card shadow">
                <div class="card-header bg-transparent">
                    <div class="row">
                        <div class="col-md-9">
                            <h3 class="mb-0 float-left">Absen Mahasiswa</h3>
                        </div>
                        <div class="col-md-3">
                            <a href="" class="badge badge-warning float-right">kembali</a>
                        </div>
                    </div>
                    <br>                   
                </div>  
                <div class="card-body">
                    <form action="/absen/postabsen" method="post">
                        @csrf              
                        <input type="hidden" name="tanggal" value="{{ $tgl }}">                    
                        <div class="row">
                            <div class="col-md">
                                <div class="table-responsive">
                                    <table class="table align-items-center table-flush">
                                    <thead class="thead-light">
                                    <tr>
                                        <th scope="col">No</th>
                                        <th scope="col">NIP</th>
                                        <th scope="col">Nama</th>
                                        <th scope="col">Jenis Kelamin</th>
                                        <th class="text-center" scope="col">Keterangan</th>
                                        <th></th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($guru as $item)
                                        <tr>
                                            <th scope="row">
                                                <div class="media align-items-center">
                                                <div class="media-body">
                                                    <span class="mb-0 text-sm">{{ $no++ }}</span>
                                                </div>
                                                </div>
                                            </th>
                                            <td scope="row">
                                                <div class="media align-items-center">
                                                <div class="media-body">
                                                    <span class="mb-0 text-sm">
                                                    {{ $item->nip }}
                                                    </span>
                                                </div>
                                                </div>
                                            </td>
                                            <td scope="row">
                                                <div class="media align-items-center">
                                                <div class="media-body">
                                                    <span class="mb-0 text-sm">
                                                    {{ $item->nama }}
                                                    </span>
                                                </div>
                                                </div>
                                            </td>
                                            <td scope="row">
                                                <div class="media align-items-center">
                                                <div class="media-body">
                                                    <span class="mb-0 text-sm">
                                                        @if ($item->jk == 'L')
                                                            Laki-laki
                                                        @else
                                                            Perempuan
                                                        @endif
                                                    </span>
                                                </div>
                                                </div>
                                            </td>
                                            <td scope="row">
                                                <select class="form-control form-control-sm check-class" name="absen[]" id="check-{{ $item->id }}">
                                                    <option value="{{$item->id}}-0">Tidak Hadir</option>
                                                    <option value="{{$item->id}}-1">Hadir</option>
                                                </select>
                                            </td>
                                        </tr>    
                                        @endforeach
                                    </tbody>
                                </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary btn-sm">Selesai</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection