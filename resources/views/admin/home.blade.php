@extends('layouts.app')
@push('css')

@endpush
@section('content')

<div class="row">
  <div class="col-md-12">
      <div class="box box-primary">
        <div class="box-header">
          <i class="ion ion-clipboard"></i><h3 class="box-title">SELAMAT DATANG</h3>

          {{-- <div class="box-tools">
            <a href="/superadmin/kecamatan/create" class="btn btn-flat btn-sm btn-primary"><i class="fa fa-plus"></i> Tambah Data</a>
          </div> --}}
        </div>
        <!-- /.box-header -->
        <div class="box-body table-responsive text-center">
          <img src="/logo/mts.jpeg" width="7%">
          <h1>Aplikasi Seleksi Beasiswa <br/> Mts Al-Islamiyah “SMIP” 1946 </h1>
        </div>
        <!-- /.box-body -->
      </div>
      <!-- /.box -->
    </div>
</div>

@endsection
@push('js')

@endpush
