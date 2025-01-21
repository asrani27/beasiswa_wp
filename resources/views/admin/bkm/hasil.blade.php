@extends('layouts.app')
@push('css')

@endpush
@section('content')

<div class="row">
  <div class="col-md-12">
    <div class="box box-primary">
      <div class="box-header">
        <i class="ion ion-clipboard"></i>
        <h3 class="box-title">Data Rangking Weight Product BKM</h3>

        <div class="box-tools">

        </div>
      </div>
      <!-- /.box-header -->
      <div class="box-body table-responsive no-padding">
        <table class="table table-hover">
          <tbody>
            <tr>
              <th>Rangking</th>
              <th>Nama</th>
              <th>Hasil</th>
            </tr>
            @foreach ($data as $key => $item)
            <tr>
              <td>{{$key + 1}}</td>
              <td>{{$item->nama}}</td>
              <td>
                {{number_format($item->vi,3)}}
              </td>

            </tr>
            @endforeach

          </tbody>
        </table>
      </div>
      <!-- /.box-body -->
    </div>

    <!-- /.box -->
  </div>
</div>

@endsection
@push('js')

@endpush