<?php

use App\Models\BKM;
use App\Models\BKMP;
use App\Models\Siswa;
use App\Models\Kriteria;

function bkm()
{
    return Siswa::where('jenis', 'BKM')->get();
}

function nilaibkmp($siswa_id, $kriteria_id)
{
    $data =  BKMP::where('siswa_id', $siswa_id)->where('kriteria_id', $kriteria_id)->first();
    if ($data === null) {
        $result = 0;
    } else {
        $result = $data->nilai;
    }
    return $result;
}
function nilaibkm($siswa_id, $kriteria_id)
{
    $data =  BKM::where('siswa_id', $siswa_id)->where('kriteria_id', $kriteria_id)->first();
    if ($data === null) {
        $result = 0;
    } else {
        $result = $data->nilai;
    }
    return $result;
}

function bkmp()
{
    return Siswa::where('jenis', 'BKMP')->get();
}

function kbkm()
{
    return Kriteria::where('jenis', 'BKM')->get();
}
function kbkmp()
{
    return Kriteria::where('jenis', 'BKMP')->get();
}
