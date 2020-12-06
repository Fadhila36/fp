@extends('layouts.global')
@section('title', 'Detail User')

@section('content')
<section class="content-header">
    <h1>
      Detail User
    </h1>
    <ol class="breadcrumb">
      <li><a href="{{url('home')}}"><i class="fa fa-dashboard"></i> Home</a></li>
      <li><a href="{{Route('user.index')}}">Data User</a></li>
      <li class="active">Detail User</li>
    </ol>
  </section>
  <!-- Main content -->
  <section class="content">
   
    <div class="row">
      <div class="col-md-12">
        
        <div class="box box-primary">
            <div class="box-body box-profile">
                @if($user->foto)
                    <img class="profile-user-img img-responsive"  src="{{asset('storage/'.$user->foto)}}" width="150px"/>
                @else
                    <img class="profile-user-img img-responsive img-circle" src="{{asset('storage/default.png')}}" alt="User profile picture">
                @endif
            <br>
                <ul class="list-group list-group-unbordered">
                    <li class="list-group-item">
                        <b>Nama Admin</b> <a class="pull-right">{{$user->name}}</a>
                    </li>
                    <li class="list-group-item">
                        <b>Email</b> <a class="pull-right">{{$user->email}}</a>
                    </li>
                    <li class="list-group-item">
                        <b>Tanggal Dibuat</b> <a class="pull-right">{{$user->created_at}}</a>
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

