@extends('layouts.global')
@section('title', 'Data User')

@section('content')
<section class="content-header">
    <h1>
      Data User
    </h1>
    <ol class="breadcrumb">
      <li><a href="{{url('home')}}"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active">Data User</li>
    </ol>
  </section>
  <!-- Main content -->
  <section class="content">
   
    <div class="row">
      <div class="col-md-12">
        
        <div class="box">
          <div class="box-body">
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Foto</th>
                        <th>Nama Pengguna</th>
                        <th>Tanggal Dibuat</th>
                        <th></th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($users as $no=>$user)
                        <tr>
                            <td>{{$no + 1}}</td>
                            <td>
                              @if($user->foto)
                                <img src="{{asset('storage/'.$user->foto)}}" width="50px"/>
                              @else
                                <img src="{{asset('storage/default.png')}}" width="50px"/>
                              @endif
                            </td>
                            <td>{{$user->name}}</td>
                            <td>{{$user->created_at}}</td>
                            <td>
                                <a  class="btn btn-info text-white btn-sm" href="{{route('user.show',$user->id)}}" data-toggle="tooltip" data-placement="bottom" title="lihat data"><span class="glyphicon glyphicon-eye-open"></span></a>
                                <a  class="btn btn-warning text-white btn-sm" href="{{route('user.edit',$user->id)}}" data-toggle="tooltip" data-placement="bottom" title="ubah data"><span class="glyphicon glyphicon-pencil"></span></a>
                                <form id="delete-form-{{ $user->id }}" action="{{ route('user.destroy',$user->id) }}" style="display: none;" method="POST">
                                    @csrf
                                    @method('DELETE')
                                </form>
                                <button data-toggle="tooltip" data-placement="bottom" title="hapus data" type="button" class="btn btn-danger text-white btn-sm" onclick="if(confirm('Apakah anda yakin ingin menghapus data ini?')){
                                    event.preventDefault();
                                    document.getElementById('delete-form-{{ $user->id }}').submit();
                                }else {
                                    event.preventDefault();
                                        }"><span class="glyphicon glyphicon-trash"></span></button>
                                
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
          
              <a href="{{ route('user.create') }}" class="margin-bottom-2 btn btn-primary btn-sm btn-rounded btn-fw"><i class="fa fa-plus"></i> Tambah Admin</a>
            
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
@push('javascript')
    <script>
        $(document).ready(function(){
            $('[data-toggle="tooltip"]').tooltip()
        });
    </script>
@endpush
