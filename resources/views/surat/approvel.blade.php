@extends('layouts.master')
@section('content')
<div class="row">
    <div class="col">
        <div class="card shadow">
            <div class="card-header border-0">
                <div class="row">
                    <div class="col-md-6">
                        <h3 class="mb-0">Approvel</h3>
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
                            <th scope="col">STATUS</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                    @php 
                        $a=1;
                    @endphp
                    @foreach ($approvel as $item)                          
                        <tr>
                            <td>{{$a++}}</td>
                            <td>{{$item->guru->nama}}</td>
                            <td>{{$item->dari}}</td>
                            <td>{{$item->sampai}}</td>
                            <td>{{$item->subjek}}</td>

                            @if ($item->status == 'pending')
                            <td>
                                <span class="badge badge-pill badge-default">Pending</span>
                            </td>
                            @elseif ($item->status == 'Sukses')
                            <td>
                                <span class="badge badge-pill badge-success">Approved</span>  
                            </td>
                            @else
                            <td>
                                <span class="badge badge-pill badge-danger">Rejected</span>  
                            </td>
                            @endif         

                            @if ($item->status == 'pending')
                            <td> 
                                <a href="/approvel/{{$item->id}}/setuju" class="btn btn-sm btn-primary mr-0">                                    
                                <i class="fas fa-check"></i>                                    
                                </a>    
                                <a href="/approvel/{{$item->id}}/tolak" class="btn btn-sm btn-danger mr-0">                                    
                                <i class="fa fa-window-close"></i>                                    
                                </a>    
                                <a href="/approvel/{{$item->id}}/info" class="btn btn-sm btn-neutral mr-0">                                    
                                <i class="fas fa-ellipsis-h"></i>                                    
                                </a>  
                            </td>                                                                
                            @else
                            <td> 
                                <a href="/approvel/{{$item->id}}/info" class="btn btn-sm btn-neutral mr-0">                                    
                                    <i class="fas fa-ellipsis-h"></i>                                    
                                </a>  
                                </td>                                                                
                            @endif
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
@stop