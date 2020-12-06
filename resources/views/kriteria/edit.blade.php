@extends('layouts.global')
@section('title', 'Ubah Kriteria')

@section('content')
<section class="content-header">
    <h1>
      Ubah Kriteria
    </h1>
    <ol class="breadcrumb">
      <li><a href="{{url('home')}}"><i class="fa fa-dashboard"></i> Home</a></li>
      <li><a href="{{Route('kriteria.index')}}">Data Kriteria</a></li>
      <li class="active">Ubah Kriteria</li>
    </ol>
  </section>
  <!-- Main content -->
  <section class="content">
   
    <div class="row">
      <div class="col-md-12">
        
        <div class="box box-primary">
            <!-- form start -->
            <form enctype="multipart/form-data" class="bg-white shadow-sm p-3"
            action="{{route('kriteria.update', ['id'=>$kriteria->id])}}" method="POST">
            @csrf
            <input type="hidden" value="PUT" name="_method">
              <div class="box-body">
                <div class="form-group">
                  <label for="nama">Nama Kriteria</label>
                  <input value="{{old('nama') ? old('nama') : $kriteria->nama}}" class="form-control {{$errors->first('nama')
                    ? "is-invalid": ""}}" placeholder="Nama Kriteria" type="text" name="nama"
                    id="nama"/>
                    <div class="invalid-feedback">
                        {{$errors->first('nama')}}
                    </div>
                </div>
                <div class="form-group">
                    <label for="atribut">Atribut</label>
                    <select name="atribut" class="form-control" id="atribut">
                        <option value=""></option>
                        <option value="benefit" {{$kriteria->atribut === "benefit" ? "selected" : ""}}>Benefit</option>
                        <option value="cost" {{$kriteria->atribut === "cost" ? "selected" : ""}}>Cost</option>
                    </select>
                    <div class="invalid-feedback">
                        {{$errors->first('atribut')}}
                    </div>
                </div>
                <div class="form-group">
                <label for="bobot">Bobot</label>
                <input value="{{old('bobot') ? old('bobot') : $kriteria->bobot}}" class="form-control {{$errors->first('bobot')
                    ? "is-invalid": ""}}" placeholder="Bobot" type="text" name="bobot"
                    id="bobot"/>
                    <div class="invalid-feedback">
                        {{$errors->first('bobot')}}
                    </div>
                </div>
                <div class="form-group">
                  <label for="keterangan">Keterangan</label>
                  <input value="{{old('keterangan') ? old('keterangan') : $kriteria->keterangan}}" class="form-control {{$errors->first('keterangan')
                      ? "is-invalid": ""}}" placeholder="Keterangan" type="text" name="keterangan"
                      id="keterangan"/>
                      <div class="invalid-feedback">
                          {{$errors->first('keterangan')}}
                      </div>
                  </div>
              </div>
              <!-- /.box-body -->

              <div class="box-footer">
                <button type="submit" class="btn btn-primary">Ubah</button>
              </div>
            </form>
          </div>
        <!-- /.box -->
      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->
  </section>
@endsection
