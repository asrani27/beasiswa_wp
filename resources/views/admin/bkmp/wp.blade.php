@extends('layouts.app')
@push('css')
    
@endpush
@section('content')

<div class="row">
    <div class="col-md-12">
        <div class="box box-primary">
          <div class="box-header">
            <i class="ion ion-clipboard"></i><h3 class="box-title">Data Weight Product BKMP</h3>

            <div class="box-tools">
              
            </div>
          </div>
          <!-- /.box-header -->
          <div class="box-body table-responsive no-padding">
            <table class="table table-hover">
              <tbody><tr>
                <th>No</th>
                <th>Nama</th>
                @foreach (kbkmp() as $key => $item)
                <th>{{$item->nama}} (K{{$key+1}})</th>
                @endforeach
                
                <th>Si</th>
                <th>Vi</th>
              </tr>
              @foreach ($data as $key => $item)
              <tr>
                <td>A.{{1 + $key}}</td>
                <td>{{$item->nama}}</td>
                
                
                @foreach (kbkmp() as $item_k)
                <td>
                  {{number_format(nilaibkmp($item->id, $item_k->id))}}
                </td>
                @endforeach
                <td>
                  {{$item->si}}
                </td>
                <td>
                  
                  {{$item->vi}}
                </td>
                
              </tr>
              @endforeach
              <tr>
                <td></td>
                <td></td>

                @foreach (kbkmp() as $item_k)
                <td></td>
                @endforeach
                <td>{{$data->sum('si')}}</td>
                <td></td>
              </tr>
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
