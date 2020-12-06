@extends('layouts.global')
@section('title', 'Penilaian Kandidat')

@section('content')
<section class="content-header">
    <h1>
      Ubah Penilaian Kandidat
    </h1>
    <ol class="breadcrumb">
      <li><a href="{{url('home')}}"><i class="fa fa-dashboard"></i> Home</a></li>
      <li><a href="{{url('Nilai')}}">Data Penilaian Kandidat</a></li>
      <li class="active">Ubah Penilaian Kandidat</li>
    </ol>
  </section>
  <!-- Main content -->
  <section class="content">
   
    <div class="row">
      <div class="col-md-12">
        
        <div class="box box-primary">
            <div class="box-body">
                <form role="form" action="{{ route('nilai.update', ['id' => Request::segment(3)]) }}" method="POST">
                    
                                <!-- text input -->
                                @csrf
                                @if(!empty($kandidat))
                                <div class="form-group">
                                    <label for="mahasiswa">Nama Kandidat</label>
                                    <!-- <input type="hidden" name="mahasiswa_id" value="{{ $kandidat->id }}"> -->
                                    <input type="text" class="form-control" value="{{ $kandidat->nama }}" readonly>
                                </div>
                                <div class="form-group">
                                    @foreach($kandidat->nilai as $key => $value)
                                    <?php $krit = $kriteria[$key]; $krit_err = "kriteria_id[$krit->id]" ?>
                                    @if($krit->id == $value->kriteria_id)
                                    <label for="{{$krit->kode}}">{{ $krit->nama }}</label>
                                    <input type="hidden" name="id_nilai[{{ $value->id }}]" value="{{ $value->id }}">
                                    <input type="text" class="form-control" name="{{$krit_err}}" value="{{ $value->nilai }}">
                                    @elseif(empty($krit))
                                    <p>Fail</p>
                                    @endif
                                    @endforeach
                                </div>
                                @else
                                <div class="form-group text-center">
                                    Data Tidak Ditemukan
                                </div>
                                @endif
                    <div class="box-footer">
                        @if(!empty($kandidat))
                        <button type="submit" class="btn btn-primary">Ubah</button>
                        @else
                        <a href="{{ route('nilai') }}" class="btn btn-primary">
                            <i class="fas fa-arrow-left"></i>
                            Back
                        </a>
                        @endif 
                    </div>
                </form>
              <!-- /.box-body -->
            </div>
        </div>
        <!-- /.box -->
      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->
  </section>
@endsection
