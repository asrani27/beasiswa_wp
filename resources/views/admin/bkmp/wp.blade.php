@extends('layouts.app')
@push('css')

@endpush
@section('content')

<div class="row">
  <div class="col-md-12">
    <div class="box box-primary">
      <div class="box-header">
        <i class="ion ion-clipboard"></i>
        <h3 class="box-title">Data Weight Product BKMP</h3>

        <div class="box-tools">

        </div>
      </div>
      <!-- /.box-header -->
      <div class="box-body table-responsive no-padding">
        <table class="table table-hover">
          <tbody>
            <tr>
              <th>No</th>
              <th>Nama</th>
              @foreach (kbkmp() as $key => $item)
              <th>{{$item->nama}} (K{{$key+1}})</th>
              @endforeach

              <th>NORMALISASI BOBOT</th>
              <th>Si</th>
              <th>NORMALISASI Si</th>
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

              <td style="vertical-align: top">Si =
                (<strong style="font-size: 16px">{{number_format(nilaibkm($item->id,
                  5))}}</strong>
                <sup>{{kbkm()[0]['bobot']}}</sup>)
                x
                (<strong style="font-size: 16px">{{number_format(nilaibkm($item->id,
                  6))}}</strong>
                <sup>{{kbkm()[1]['bobot']}}</sup>)
                x
                (<strong style="font-size: 16px">{{number_format(nilaibkm($item->id,
                  7))}}</strong>
                <sup>{{kbkm()[2]['bobot']}}</sup>)
                x
                (<strong style="font-size: 16px">{{number_format(nilaibkm($item->id,
                  8))}}</strong>
                <sup>{{kbkm()[3]['bobot']}}</sup>)
                <br />
                Si = {{number_format($item->ScorePenghasilanOrangTua,3)}} x
                {{number_format($item->ScoreJumlahTanggungan,3)}} x
                {{number_format($item->ScoreKondisiRumah,3)}} x {{number_format($item->ScoreKepemilikanAsset,3)}}
              </td>
              <td>
                {{number_format($item->si,3)}}
              </td>
              <td>
                Vi = {{number_format($item->si,3)}} / {{number_format($data->sum('si'),3)}}
              </td>
              <td>

                {{number_format($item->vi,3)}}
              </td>

            </tr>
            @endforeach
            <tr>
              <td></td>
              <td></td>
              <td></td>

              @foreach (kbkmp() as $item_k)
              <td></td>
              @endforeach
              <td>{{number_format($data->sum('si'),3)}}</td>
              <td></td>
            </tr>
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