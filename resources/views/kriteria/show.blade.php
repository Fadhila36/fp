@extends('layouts.global')
@section('title', 'Detail Kriteria')

@section('content')
<section class="content-header">
    <h1>
      Detail Kriteria
    </h1>
    <ol class="breadcrumb">
      <li><a href="{{url('home')}}"><i class="fa fa-dashboard"></i> Home</a></li>
      <li><a href="{{Route('kriteria.index')}}">Data Kriteria</a></li>
      <li class="active">Detail Kriteria</li>
    </ol>
  </section>
  <!-- Main content -->
  <section class="content">
   
    <div class="row">
      <div class="col-md-12">
        
        <div class="box box-primary">
            <div class="box-body box-profile">
                <ul class="list-group list-group-unbordered">
                    <li class="list-group-item">
                        <b>Nama Kriteria</b> <a class="pull-right">{{$kriteria->nama}}</a>
                    </li>
                    <li class="list-group-item">
                        <b>Atribut</b> <a class="pull-right">{{$kriteria->atribut}}</a>
                    </li>
                    <li class="list-group-item">
                        <b>Bobot</b> <a class="pull-right">{{$kriteria->bobot}}</a>
                    </li>
                    <li class="list-group-item">
                      <b>Keterangan</b> <a class="pull-right">{{$kriteria->keterangan}}</a>
                  </li>
                </ul>
            </div>
              <!-- /.box-body -->
          
        </div>
        <!-- /.box -->
      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->
  </section>
@endsection

