@extends('layouts.global')
@section('title', 'Nilai Kandidat')

@section('content')
<section class="content-header">
    <h1>
      Nilai Kandidat
    </h1>
    <ol class="breadcrumb">
      <li><a href="{{url('home')}}"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active">Nilai Kandidat</li>
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
                    <th width="20vh">No</th>
                    <th>Nama</th>
                    @foreach($kriteria as $krit)
                    <th>{{$krit->nama}}</th>
                    @endforeach
                    <th width="100vh">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php $no = 1; ?>
                @if(!empty($kandidat))
                {{-- variable $kandidat berisi nilai dari setiap kriteria per mahasiswa --}}
                @foreach($kandidat as $kdt)
                <tr>
                    <td>{{$no++}}</td>
                    <td>{{$kdt->nama}}</td>
                    @if(count($kdt->nilai) == 0)
                    @foreach($kriteria as $krit)
                    <td><i>Tidak ada data</i></td>
                    @endforeach
                    @endif
                    @foreach($kdt->nilai as $nilai)
                    <td>{{$nilai->nilai}}</td>
                    @endforeach
                    <td class="text-center">
                        @if(count($kdt->nilai) == 0)
                        <a href="{{ route('nilai.tambah',['id' => $kdt->id]) }}" class="btn btn-sm btn-primary" data-toggle="tooltip" data-placement="bottom" title="tambah data"><i class="fa fa-plus"></i>
                        </a>
                        @else
                        <a href="{{ route('nilai.edit', ['id' => $kdt->id]) }}" class="btn btn-sm btn-warning" data-toggle="tooltip" data-placement="bottom" title="ubah data"><span class="glyphicon glyphicon-pencil"></span>
                        </a>
                        @endif
                    </td>
                </tr>
                @endforeach
                @endif
            </tbody>
            </table>
            <a href="{{url('perhitungan/calculate')}}" class="margin-bottom-2 btn btn-primary btn-sm btn-rounded btn-fw"><span class="glyphicon glyphicon-eye-open"></span> Perhitungan MWP</a>
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

