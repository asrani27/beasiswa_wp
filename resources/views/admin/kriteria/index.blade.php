@extends('layouts.app')
@push('css')
    
@endpush
@section('content')

<div class="row">
    <div class="col-md-12">
        <div class="box box-primary">
          <div class="box-header">
            <i class="ion ion-clipboard"></i><h3 class="box-title">Data Kriteria</h3>

            <div class="box-tools">
              <a href="/data/kriteria/create" class="btn btn-flat btn-sm btn-primary"><i class="fa fa-plus"></i> Tambah Data</a>
            </div>
          </div>
          <!-- /.box-header -->
          <div class="box-body table-responsive no-padding">
            <table class="table table-hover">
              <tbody><tr>
                <th>No</th>
                <th>Nama kriteria</th>
                <th>Bobot</th>
                <th>Tipe</th>
                <th>keterangan</th>
                <th>Jenis</th>
                
                <th>Aksi</th>
              </tr>
              @foreach ($data as $key => $item)
              <tr>
                <td>{{$data->firstItem() + $key}}</td>
                <td>{{$item->nama}}</td>
                <td>{{$item->bobot}}</td>
                <td>{{$item->tipe}}</td>
                <td>{{$item->keterangan}}</td>
                <td>{{$item->jenis}}</td>
                <td>
                  <a href="/data/kriteria/edit/{{$item->id}}" class="btn btn-flat btn-sm btn-primary"><i class="fa fa-edit"></i> Edit</a>
                  <a href="/data/kriteria/delete/{{$item->id}}" class="btn btn-flat btn-sm btn-primary" onclick="return confirm('Yakin ingin dihapus?');"><i class="fa fa-trash"></i> Delete</a>
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
