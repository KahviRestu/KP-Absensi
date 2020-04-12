@extends('layouts.master')

@section('content')
<div class="card shadow">
  <div class="card-header border-0">
    <div class="row">
      <div class="col-md-6">
          <h3 class="mb-0">Data Guru</h3>
      </div>
      <div class="col-md-6 text-right">                        
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalLong">Tambah Data</button>                            
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
          <th scope="col">Alamat</th>
          <th scope="col">JK</th>
          <th scope="col">Email</th>
          <th scope="col">Action</th>
        </tr>
      </thead>
      <tbody>
        @php
          $no = 1;  
        @endphp
        @foreach($guru as $g)
        <tr>
          <td>{{$no++}}</td>
          <td>{{$g->nip}}</td>
          <td>{{$g->nama}}</td>
          <td>{{$g->alamat}}</td>
          <td>{{$g->jk}}</td>
          <td>{{$g->email}}</td>
          <td>
              <button class="btn btn-primary btnInfo" type="button" data-id="{{$g->id}}" data-telp="{{$g->nomor_telp}}" id="btnInfo" data-nip="{{$g->nip}}" data-nama="{{$g->nama}}" data-alamat="{{$g->alamat}}" data-jk="{{$g->jk}}" data-email="{{$g->email}}" data-agama="{{$g->agama}}" data-tgl="{{$g->tgl_lahir}}" data-toggle="modal" data-target="#modal-default">
                  <i class="fa fa-info"></i>  
                  </button>                    
                  <button class="btn btn-warning btnEdit" type="button" data-id="{{$g->id}}" data-telp="{{$g->nomor_telp}}" data-nip="{{$g->nip}}" data-nama="{{$g->nama}}" data-alamat="{{$g->alamat}}" data-jk="{{$g->jk}}" data-email="{{$g->email}}" data-agama="{{$g->agama}}" data-tgl="{{$g->tgl_lahir}}" data-toggle="modal" data-target="#editModal"><i class="fa fa-edit"></i></button>
            <a href="/guru/hapus/{{$g->id}}" class="btn btn-danger table-action table-action-delete" onclick="return confirm('Yakin Mau di Hapus?')" data-toggle="tooltip" data-original-title="Delete Guru">
              <i class="fas fa-trash"></i>
            </a>                  
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>
  <div class="card-footer py-4">
    <nav aria-label="...">
      <ul class="pagination justify-content-end mb-0">
        <li class="page-item disabled">
          <a class="page-link" href="#" tabindex="-1">
            <i class="fas fa-angle-left"></i>
            <span class="sr-only">Previous</span>
          </a>
        </li>
        <li class="page-item active">
          <a class="page-link" href="#">1</a>
        </li>
        <li class="page-item">
          <a class="page-link" href="#">2 <span class="sr-only">(current)</span></a>
        </li>
        <li class="page-item"><a class="page-link" href="#">3</a></li>
        <li class="page-item">
          <a class="page-link" href="#">
            <i class="fas fa-angle-right"></i>
            <span class="sr-only">Next</span>
          </a>
        </li>
      </ul>
    </nav>
  </div>
</div>



<!-- Modal Add -->
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
              <label for="exampleInputEmail1">NIP</label>
              <input name="nip" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="NIP">
            </div>
            <div class="form-group">
              <label for="exampleInputEmail1">Nama</label>
              <input name="nama" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Nama"> 
            </div>
            <div class="form-group">
                <label for="exampleFormControlSelect1">Jenis Kelamin</label>
                <select name="jk" class="form-control" id="exampleFormControlSelect1">
                    <option value="L">Laki - laki</option>
                    <option value="P">Perempuan</option>
                </select>
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Agama</label>
                <input name="agama" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Agama">
            </div>
            <div class="form-group">
              <label for="exampleInputEmail1">Tanggal Lahir</label>
              <input name="tgl_lahir" type="date" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Tanggal Lahir">
          </div>
          <div class="form-group">
              <label for="exampleFormControlTextarea1">Alamat</label>
              <textarea name="alamat" class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
          </div>
          <div class="form-group">
              <label for="exampleFormControlTextarea1">Email</label>
              <input name="email" type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Email">
          </div>
          <div class="form-group">
              <label for="exampleFormControlTextarea1">No Telp</label>
              <input name="nomor_telp" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="No Telp">
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
          <form action="/guru/update" method="post">
            {{ csrf_field() }}
            <input type="hidden" name="id">
                  <div class="form-group">
                    <label for="exampleInputEmail1">NIP</label>
                    <input name="Enip" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="NIP">
                    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                  </div>
                  <div class="form-group">
                      <label for="exampleInputEmail1">Nama</label>
                      <input name="Enama" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Nama">
                      <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                      </div>
                  <div class="form-group">
                      <label for="exampleFormControlSelect1">Jenis Kelamin</label>
                      <select name="Ejk" class="form-control" id="exampleFormControlSelect1">
                          <option value="L">Laki - laki</option>
                          <option value="P">Perempuan</option>
                      </select>
                  </div>
                  <div class="form-group">
                      <label for="exampleInputEmail1">Agama</label>
                      <input name="Eagama" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Agama">
                      <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Tanggal Lahir</label>
                    <input name="Etgl_lahir" type="date" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Tanggal Lahir">
                    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                </div>
                <div class="form-group">
                    <label for="exampleFormControlTextarea1">Alamat</label>
                    <textarea name="Ealamat" class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                </div>
                <div class="form-group">
                    <label for="exampleFormControlTextarea1">Email</label>
                    <input name="Eemail" type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Email">
                    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                </div>
                <div class="form-group">
                    <label for="exampleFormControlTextarea1">No Telp</label>
                    <input name="Enomor_telp" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="No Telp">
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
  
  {{-- Modal Info --}}
  <div class="modal fade" id="modal-default" tabindex="-1" role="dialog" aria-labelledby="modal-default" aria-hidden="true">
    <div class="modal-dialog modal- modal-dialog-centered modal-" role="document">
        <div class="modal-content">
          
            <div class="modal-header">
                <h6 class="modal-title" id="modal-title-default">Info Data Guru</h6>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            
            <div class="modal-body ">
              
                <table>
                  <tr>
                    <td>NIP</td>
                    <td>:</td>
                    <td id="nip">11706095</td>
                  </tr>
                  <tr>
                    <td>Nama</td>
                    <td>:</td>
                    <td id="nama">Jamaludin</td>
                  </tr>
                  <tr>
                    <td>Jenis Kelamin</td>
                    <td>:</td>
                    <td id="jk">Laki - Laki</td>
                  </tr>
                  <tr>
                    <td>Agama</td>
                    <td>:</td>
                    <td id="agama">Islam</td>
                  </tr>
                  <tr>
                    <td>Tanggal Lahir</td>
                    <td>:</td>
                    <td id="tgl_lahir">14/09/2001</td>
                  </tr>
                  <tr>
                    <td>Alamat</td>
                    <td>:</td>
                    <td id="alamat">Jl.Curug Cilember Kp.Jogjogan Cisarua Bogor</td>
                  </tr>
                  <tr>
                    <td>Email</td>
                    <td>:</td>
                    <td id="email">jamal14262@gmail.com</td>
                  </tr>
                  <tr>
                    <td>No Telp</td>
                    <td class="pr-3">:</td>
                    <td id="nomor">085697319458</td>
                  </tr> 
                </table>
                
            </div>
            
            <div class="modal-footer">
                <button type="button" class="btn btn-link  ml-auto" data-dismiss="modal">Close</button> 
            </div>
            
        </div>

        
       
  @endsection
  @section('admin-js')
      <script>
        $(document).ready(function(){
          
          $('.btnEdit').click(function(){
            // Get Data
            var id = $(this).data('id');
            var nip = $(this).data('nip');
            var nama = $(this).data('nama');
            var jk = $(this).data('jk');
            var alamat = $(this).data('alamat');
            var agama = $(this).data('agama');
            var tgl = $(this).data('tgl');
            var email = $(this).data('email');
            var telp = $(this).data('telp');
            // Value Input
            $('input[name=Enip]').val(nip);
            $('input[name=Enama]').val(nama);
            $('input[name=Ejk]').val(jk);
            $('textarea[name=Ealamat]').val(alamat);
            $('input[name=Eagama]').val(agama);
            $('input[name=Etgl_lahir]').val(tgl);
            $('input[name=Eemail]').val(email);
            $('input[name=Enomor_telp]').val(telp);
            $('input[name=id]').val(id);
          });
        
        $('.btnInfo').click(function(){
          var id = $(this).data('id');
            var nip = $(this).data('nip');
            var nama = $(this).data('nama');
            var jk = $(this).data('jk');
            var alamat = $(this).data('alamat');
            var agama = $(this).data('agama');
            var tgl = $(this).data('tgl');
            var email = $(this).data('email');
            var telp = $(this).data('telp');
            // alert(jk);
            $('#nip').text(nip);
            $('#nama').text(nama);
            $('#jk').text(jk);
            $('#alamat').text(alamat);
            $('#agama').text(agama);
            $('#tgl_lahir').text(tgl);
            $('#email').text(email);
            $('#nomor').text(telp);
        });
  
      });

      $(document).ready( function () {
      $('#myTable').DataTable();      
      });
      </script>

@endsection
