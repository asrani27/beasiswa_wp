@extends('layouts.app')
@push('css')

@endpush
@section('content')

<div class="row">
  <div class="col-md-12">
    <div class="box box-primary">
      <div class="box-header">
        <i class="ion ion-clipboard"></i>
        <h3 class="box-title">Laporan Periode</h3>

        <div class="box-tools">
          {{-- <a href="/data/pbkm/create" class="btn btn-flat btn-sm btn-primary"><i class="fa fa-plus"></i> Tambah
            Data</a> --}}
        </div>
      </div>
      <!-- /.box-header -->
      <div class="box-body table-responsive">
        <form method="get" action="/data/laporan/print" target="_blank">
          @csrf
          BULAN :
          <select class="form-control" name="bulan">
            <option value="01">Januari</option>
            <option value="02">Februari</option>
            <option value="03">Maret</option>
            <option value="04">April</option>
            <option value="05">Mei</option>
            <option value="06">Juni</option>
            <option value="07">Juli</option>
            <option value="08">Agustus</option>
            <option value="09">September</option>
            <option value="10">Oktober</option>
            <option value="11">November</option>
            <option value="12">Desember</option>
          </select>
          <br />
          TAHUN
          <select class="form-control" name="tahun">
            <option value="2024">2024</option>
            <option value="2025">2025</option>
          </select>
          <br />
          JENIS LAPORAN
          <select class="form-control" name="jenis">
            <option value="1">Hasil BKM</option>
            <option value="2">Hasil BKMP</option>
            <option value="3">Penyerahan BKM</option>
            <option value="4">Penyerahan BKMP</option>
          </select>
          <br />
          <button type="submit" class="btn btn-primary">PRINT</button>
        </form>

        {{-- <a href="/hasilbkm" class="btn btn-primary" target="_blank">Hasil BKM</a>
        <a href="/hasilbkmp" class="btn btn-primary" target="_blank">Hasil BKMP</a>
        <a href="/penyerahanbkm" class="btn btn-primary" target="_blank">Penyerahan BKM</a>
        <a href="/penyerahanbkmp" class="btn btn-primary" target="_blank">Penyerahan BKMP</a> --}}
      </div>
      <!-- /.box-body -->
    </div>

    <!-- /.box -->
  </div>
</div>

@endsection
@push('js')

@endpush