@extends('layouts.app')
@push('css')

@endpush
@section('content')

<div class="row">
  <div class="col-md-12">
    <div class="box box-primary">
      <div class="box-header">
        <i class="ion ion-clipboard"></i>
        <h3 class="box-title">Data Nilai Kriteria BKM</h3>

        <div class="box-tools">

        </div>
      </div>
      <!-- /.box-header -->
      <div class="box-body table-responsive no-padding">
        <table class="table table-hover">
          <tbody>
            <tr>
              <th>No</th>
              <th>Nomor</th>
              <th>Tanggal</th>
              <th>Penerima</th>
              @foreach (kbkm() as $item)
              <th>{{$item->nama}}</th>
              @endforeach

              <th>Aksi</th>
            </tr>
            @foreach (bkm() as $key => $item)
            <tr>
              <td>{{1 + $key}}</td>
              <td>{{$item->nomor}}</td>
              <td>{{$item->tanggal}}</td>
              <td>{{$item->nama}}</td>

              <form method="POST" action="/data/bkm">
                @csrf
                <input type="hidden" name="siswa_id" value="{{$item->id}}">
                @foreach (kbkm() as $item_k)
                <td>
                  <input type="hidden" name="kriteria_id[]" value="{{$item_k->id}}">
                  @if ($item_k->id == 1)
                  <select name="nilai[]" class="form-control" required>
                    <option value="">-pilih-</option>
                    <option value="1" {{number_format(nilaibkm($item->id, $item_k->id)) == '1' ?
                      'selected':''}}>1.000.000 - 2.000.000</option>
                    <option value="2" {{number_format(nilaibkm($item->id, $item_k->id)) == '2' ?
                      'selected':''}}>2.000.000 - 3.000.000</option>
                    <option value="3" {{number_format(nilaibkm($item->id, $item_k->id)) == '3' ?
                      'selected':''}}>3.000.000 - 4.000.000</option>
                  </select>
                  @endif
                  @if ($item_k->id == 2)
                  <select name="nilai[]" class="form-control" required>
                    <option value="">-pilih-</option>
                    <option value="1" {{number_format(nilaibkm($item->id, $item_k->id)) == '1' ? 'selected':''}}>1
                    </option>
                    <option value="2" {{number_format(nilaibkm($item->id, $item_k->id)) == '2' ? 'selected':''}}>2
                    </option>
                    <option value="3" {{number_format(nilaibkm($item->id, $item_k->id)) == '3' ? 'selected':''}}>3
                    </option>
                    <option value="4" {{number_format(nilaibkm($item->id, $item_k->id)) == '4' ? 'selected':''}}>4
                    </option>
                    <option value="5" {{number_format(nilaibkm($item->id, $item_k->id)) == '5' ? 'selected':''}}>5
                    </option>
                  </select>
                  @endif
                  @if ($item_k->id == 3)
                  <select name="nilai[]" class="form-control" required>
                    <option value="">-pilih-</option>
                    <option value="1" {{number_format(nilaibkm($item->id, $item_k->id)) == '1' ? 'selected':''}}>Rusak
                    </option>
                    <option value="2" {{number_format(nilaibkm($item->id, $item_k->id)) == '2' ? 'selected':''}}>Cukup
                      Baik</option>
                    <option value="3" {{number_format(nilaibkm($item->id, $item_k->id)) == '3' ? 'selected':''}}>Baik
                    </option>
                    <option value="4" {{number_format(nilaibkm($item->id, $item_k->id)) == '4' ? 'selected':''}}>Bagus
                    </option>
                    <option value="5" {{number_format(nilaibkm($item->id, $item_k->id)) == '5' ? 'selected':''}}>Sangat
                      Bagus</option>
                  </select>
                  @endif
                  @if ($item_k->id == 4)
                  <select name="nilai[]" class="form-control" required>
                    <option value="">-pilih-</option>
                    <option value="1" {{number_format(nilaibkm($item->id, $item_k->id)) == '1' ? 'selected':''}}>1
                    </option>
                    <option value="2" {{number_format(nilaibkm($item->id, $item_k->id)) == '2' ? 'selected':''}}>2
                    </option>
                    <option value="3" {{number_format(nilaibkm($item->id, $item_k->id)) == '3' ? 'selected':''}}>3
                    </option>
                    <option value="4" {{number_format(nilaibkm($item->id, $item_k->id)) == '4' ? 'selected':''}}>4
                    </option>
                    <option value="5" {{number_format(nilaibkm($item->id, $item_k->id)) == '5' ? 'selected':''}}>5
                    </option>
                  </select>
                  @endif

                  {{-- <input type="text" name="nilai[]" value="{{number_format(nilaibkm($item->id, $item_k->id))}}">
                  --}}
                </td>
                @endforeach
                <td>
                  <button type="submit" class="btn btn-flat btn-sm btn-primary"><i class="fa fa-edit"></i> Save
                    Nilai</button>
                </td>
              </form>
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