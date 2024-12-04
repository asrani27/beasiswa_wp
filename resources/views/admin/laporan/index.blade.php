@extends('layouts.app')
@push('css')
    
@endpush
@section('content')

<div class="row">
    <div class="col-md-12">
        <div class="box box-primary">
          <div class="box-header">
            <i class="ion ion-clipboard"></i><h3 class="box-title">Laporan</h3>

            <div class="box-tools">
              {{-- <a href="/data/pbkm/create" class="btn btn-flat btn-sm btn-primary"><i class="fa fa-plus"></i> Tambah Data</a> --}}
            </div>
          </div>
          <!-- /.box-header -->
          <div class="box-body table-responsive">
            <a href="/hasilbkm" class="btn btn-primary" target="_blank">Hasil BKM</a>
            <a href="/hasilbkmp" class="btn btn-primary" target="_blank">Hasil BKMP</a>
            <a href="/penyerahanbkm" class="btn btn-primary" target="_blank">Penyerahan BKMP</a>
            <a href="/penyerahanbkmp" class="btn btn-primary" target="_blank">Penyerahan BKMP</a>
          </div>
          <!-- /.box-body -->
        </div>
        
        <!-- /.box -->
      </div>
</div>

@endsection
@push('js')

@endpush
