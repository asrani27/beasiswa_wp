@extends('layouts.app')
@push('css')
<link rel="stylesheet" href="/assets/bower_components/select2/dist/css/select2.min.css">
@endpush
@section('content')

<div class="row">
    <div class="col-md-12">
        <a href="/data/kriteria" class="btn btn-flat btn-primary"><i class="fa fa-backward"></i> Kembali</a> <br /> <br />
    </div>
</div>

<div class="row">
    <div class="col-md-12">
        <div class="box box-primary">
            <div class="box-header">
                <i class="ion ion-clipboard"></i>
                <h3 class="box-title">Tambah Data</h3>
            </div>
            <!-- /.box-header -->
            <form class="form-horizontal" method="post" action="/data/kriteria/create">
                @csrf
                <div class="box-body">
                    <div class="form-group">
                        <label class="col-sm-2 control-label">Nama Kriteria</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="nama" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label">Bobot</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="bobot" required>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label class="col-sm-2 control-label">Tipe</label>
                        <div class="col-sm-10">
                            <select class="form-control select2" name="tipe" required>
                                <option value="">-pilih-</option>
                                <option value="BENEFIT">BENEFIT</option>
                                <option value="COST">COST</option>
                                
                            </select>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label class="col-sm-2 control-label">Jenis</label>
                        <div class="col-sm-10">
                            <select class="form-control select2" name="jenis" required>
                                <option value="">-pilih-</option>
                                <option value="BKM">BKM</option>
                                <option value="BKMP">BKMP</option>
                                
                            </select>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label class="col-sm-2 control-label">keterangan</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="keterangan" required>
                        </div>
                    </div>
                </div>
                <!-- /.box-body -->
                <div class="box-footer">
                    <button type="submit" class="btn btn-primary pull-right" ><i class="fa fa-save"></i> Simpan Data</button>
                </div>
                <!-- /.box-footer -->
            </form>
            <!-- /.box-body -->
        </div>
        <!-- /.box -->
    </div>
</div>
@endsection
@push('js')
<script src="/assets/bower_components/select2/dist/js/select2.full.min.js"></script>
<script>
    $(function () {
    //Initialize Select2 Elements
    $('.select2').select2()
    });
</script>
@endpush