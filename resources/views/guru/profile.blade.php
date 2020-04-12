@extends('layouts.master')

@section('content')
<div class="row justify-content-center">
  <div class="col-md-6">
      <div class="card shadow h-100">
          <div class="card-header">
              <h5 class="m-0 pt-1 font-weight-bold">Profil</h5>
          </div>
          <div class="card-body">
              <form action=" {{ route('update-profil', Auth::user()->id) }} " method="post" enctype="multipart/form-data">
                  @method('patch')
                  @csrf                
                  <div class="form-group row">
                      <div class="col-sm-2"><label for="nip" class="col-form-label">NIP</label></div>
                      <div class="col-sm-10">
                          <input disabled type="text" class="form-control" id="nip" name="nip" value="{{ Auth::user()->nip }}">
                      </div>
                  </div>
                  <div class="form-group row">
                      <div class="col-sm-2"><label for="name" class="col-form-label">Nama</label></div>
                      <div class="col-sm-10">
                          <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ Auth::user()->name }}">
                          @error('name') <span class="invalid-feedback" role="alert">{{ $message }}</span> @enderror
                      </div>
                  </div>
                  <div class="form-group row justify-content-end">
                      <div class="col-sm-10">
                          <button type="submit" class="btn btn-primary btn-block">
                              Simpan
                          </button>
                      </div>
                  </div>
              </form>
          </div>
      </div>
  </div>
</div>
<script>
  $('document').ready(function(){
    $(".custom-file-input").on("change", function () {
        var fileName = $(this).val().split("\\").pop();
        $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
        readURL(this);
    });
  
    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
  
            reader.onload = function (e) {
                $('#image').attr('src', e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
        }
    }
  });
  </script>
@stop