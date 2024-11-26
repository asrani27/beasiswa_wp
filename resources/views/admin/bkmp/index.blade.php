@extends('layouts.app')
@push('css')
    
@endpush
@section('content')

<div class="row">
    <div class="col-md-12">
        <div class="box box-primary">
          <div class="box-header">
            <i class="ion ion-clipboard"></i><h3 class="box-title">Data Nilai Kriteria BKMP</h3>

            <div class="box-tools">
              
            </div>
          </div>
          <!-- /.box-header -->
          <div class="box-body table-responsive no-padding">
            <table class="table table-hover">
              <tbody><tr>
                <th>No</th>
                <th>Nomor</th>
                <th>Tanggal</th>
                <th>Penerima</th>
                @foreach (kbkmp() as $item)
                <th>{{$item->nama}}</th>
                @endforeach
                
                <th>Aksi</th>
              </tr>
              @foreach (bkmp() as $key => $item)
              <tr>
                <td>{{1 + $key}}</td>
                <td>{{$item->nomor}}</td>
                <td>{{$item->tanggal}}</td>
                <td>{{$item->nama}}</td>

                <form method="POST" action="/data/bkmp">
                  @csrf
                  <input type="hidden" name="siswa_id" value="{{$item->id}}">
                @foreach (kbkmp() as $item_k)
                <td>
                  <input type="hidden" name="kriteria_id[]" value="{{$item_k->id}}">
                  <input type="text" name="nilai[]" value="{{number_format(nilaibkmp($item->id, $item_k->id))}}">
                </td>
                @endforeach
                <td>
                  <button type="submit" class="btn btn-flat btn-sm btn-primary"><i class="fa fa-edit"></i> Save Nilai</button>
                </td>
                </form>
              </tr>
              @endforeach
            </tbody></table>
          </div>
          <!-- /.box-body -->
        </div>
        
        <!-- /.box -->
      </div>
</div>

@endsection
@push('js')

@endpush
