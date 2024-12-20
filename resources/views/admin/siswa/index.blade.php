@extends('layouts.app')
@push('css')
    
@endpush
@section('content')

<div class="row">
    <div class="col-md-12">
        <div class="box box-primary">
          <div class="box-header">
            <i class="ion ion-clipboard"></i><h3 class="box-title">Data Penerima Beasiswa</h3>

            <div class="box-tools">
              <a href="/data/siswa/create" class="btn btn-flat btn-sm btn-primary"><i class="fa fa-plus"></i> Tambah Data</a>
            </div>
          </div>
          <!-- /.box-header -->
          <div class="box-body table-responsive no-padding">
            <table class="table table-hover">
              <tbody><tr>
                <th>No</th>
                <th>NIS</th>
                <th>Nama siswa</th>
                <th>Tgl Lahir</th>
                <th>Alamat</th>
                <th>Telp</th>
                <th>Jenis</th>
                <th>Nomor BKM/BKMP</th>
                <th>Tanggal  BKM/BKMP</th>
                
                <th>Aksi</th>
              </tr>
              @foreach ($data as $key => $item)
              <tr>
                <td>{{$data->firstItem() + $key}}</td>
                <td>{{$item->nis}}</td>
                <td>{{$item->nama}}</td>
                <td>{{$item->tanggal_lahir}}</td>
                <td>{{$item->alamat}}</td>
                <td>{{$item->telp}}</td>
                <td>{{$item->jenis}}</td>
                <td>{{$item->nomor}}</td>
                <td>{{$item->tanggal}}</td>
                <td>
                  <a href="/data/siswa/edit/{{$item->id}}" class="btn btn-flat btn-sm btn-primary"><i class="fa fa-edit"></i> Edit</a>
                  <a href="/data/siswa/delete/{{$item->id}}" class="btn btn-flat btn-sm btn-primary" onclick="return confirm('Yakin ingin dihapus?');"><i class="fa fa-trash"></i> Delete</a>
                </td>
              </tr>
              @endforeach
            </tbody></table>
          </div>
          <!-- /.box-body -->
        </div>
        {{$data->links()}}
        <!-- /.box -->
      </div>
</div>

@endsection
@push('js')

@endpush
