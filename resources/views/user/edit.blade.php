@extends('layouts.global')
@section('title', 'Ubah User')

@section('content')
<section class="content-header">
    <h1>
      Ubah User
    </h1>
    <ol class="breadcrumb">
      <li><a href="{{url('home')}}"><i class="fa fa-dashboard"></i> Home</a></li>
      <li><a href="{{Route('user.index')}}">Data User</a></li>
      <li class="active">Ubah User</li>
    </ol>
  </section>
  <!-- Main content -->
  <section class="content">
   
    <div class="row">
      <div class="col-md-12">
        
        <div class="box box-primary">
            <!-- form start -->
            <form enctype="multipart/form-data" class="bg-white shadow-sm p-3"
            action="{{route('user.update', ['id'=>$user->id])}}" method="POST">
            @csrf
            <input type="hidden" value="PUT" name="_method">
              <div class="box-body">
                <div class="form-group">
                  <label for="name">Nama</label>
                  <input value="{{old('name') ? old('name') : $user->name}}" class="form-control {{$errors->first('name')
                    ? "is-invalid": ""}}" placeholder="Full Name" type="text" name="name"
                    id="name"/>
                    <div class="invalid-feedback">
                        {{$errors->first('name')}}
                    </div>

                </div>
                <div class="form-group">
                  <label for="email">Alamat Email</label>
                  <input value="{{old('email') ? old('email') : $user->email}}" class="form-control {{$errors->first('email')
                    ? "is-invalid": ""}}" placeholder="Email" type="email" name="email"
                    id="email"/>
                    <div class="invalid-feedback">
                        {{$errors->first('email')}}
                    </div>

                </div>
                <div class="form-group">
                  <label for="password">Password</label>
                  <input value="{{old('password')}}" class="form-control {{$errors->first('password')
                    ? "is-invalid": ""}}" placeholder="password" type="password" name="password"
                    id="password"/>
                    <div class="invalid-feedback">
                        {{$errors->first('password')}}
                    </div>
                </div>
                <div class="form-group">
                  <label for="foto">Foto</label>
                  <input value="{{old('foto')}}" class="form-control {{$errors->first('foto')
                    ? "is-invalid": ""}}" type="file" name="foto"
                    id="foto"/>
                    <div class="invalid-feedback">
                        {{$errors->first('foto')}}
                    </div>
                </div>
              </div>
              <!-- /.box-body -->

              <div class="box-footer">
                <button type="submit" class="btn btn-primary">ubah</button>
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
