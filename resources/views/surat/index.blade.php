@extends('layouts.master')
@section('content')
<div class="row">
    <div class="col">
        <div class="card shadow">
            <div class="card-header border-0">
                <div class="row">
                    <div class="col-md-6">
                        <h3 class="mb-0">Surat Izin</h3>
                    </div>
                    <div class="col-md-6 text-right">                        
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target=".bs-example-modal-lg">Buat Surat</button>
                    </div>
                </div>
            </div>
            <div class="table-responsive">
                <table class="table align-items-center table-flush">
                    <thead class="thead-light">
                        <tr>
                        <th scope="col">NO</th>
                        <th scope="col">NAMA</th>
                        <th scope="col">DARI</th>
                        <th scope="col">SAMPAI</th>
                        <th scope="col">SUBJEK</th>
                        <th>STATUS</th>
                        <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                      @php 
                        $a=1;
                      @endphp
                       @foreach ($surat as $item)
                          
                           <tr>
                              <td>{{$a++}}</td>
                              <td>{{$item->guru->nama}}</td>
                              <td>{{$item->dari}}</td>
                              <td>{{$item->sampai}}</td>
                              <td>{{$item->subjek}}</td>
                              @if ($item->status == 'pending')
                            <td>
                                <span class="badge badge-pill badge-warning">Pending</span>
                            </td>
                            @elseif ($item->status == 'Sukses')
                            <td>
                                <span class="badge badge-pill badge-success">Success</span>  
                            </td>
                            @else
                            <td>
                                <span class="badge badge-pill badge-danger">Danger</span>  
                            </td>
                            @endif         
                              <td>
                                <a href="" class="btn btn-danger table-action table-action-delete" onclick="return confirm('Yakin Mau di Hapus?')" data-toggle="tooltip" data-original-title="Delete Guru">
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
    </div>
</div>

<!-- Modal Add -->
<div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
  
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
          </button>
          <h4 class="modal-title" id="myModalLabel"></h4>
        </div>
        <div class="modal-body">
          <form action="/surat/create" method="post">
          {{ csrf_field() }}
          <div class="container">
            <div class="input-daterange datepicker row align-items-center">
              <div class="col">
                <div class="form-group">
                  <label for="exampleInputEmail1">Dari</label>
                  <input name="dari" type="date" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="22/12/2019"> 
                </div>
              </div>
              <div class="col">
                <div class="form-group">
                  <label for="exampleInputEmail1">Sampai</label>
                  <input name="sampai" type="date" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="23/12/2019"> 
                </div>
              </div>            
          </div>
          <div class="form-group">
            <label for="exampleInputEmail1">Subjek</label>
            <input name="subjek" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Subjek"> 
          </div>
          <div class="form-group">
            <label for="exampleInputEmail1">Pesan</label>
            <textarea name="pesan" class="form-control" id="exampleInputEmail1"  cols="30" rows="10"></textarea>
          </div>
          <div class="form-group">
            <label for="exampleInputEmail1">Bukti</label>
            <input name="bukti" type="file" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder=""> 
          </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-primary">Save changes</button>
        </div>
      </form>
      </div>
    </div>
  </div>  
      <!-- End Modal Add -->
@stop