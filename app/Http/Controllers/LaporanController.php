<?php

namespace App\Http\Controllers;

use App\Models\BKM;
use App\Models\Pbkm;
use App\Models\Pbkmp;
use App\Models\Siswa;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Session;

class LaporanController extends Controller
{
    public function index()
    {
        return view('admin.laporan.index');
    }

    public function print()
    {
        $bulan = request()->get('bulan');
        $tahun = request()->get('tahun');
        $jenis = request()->get('jenis');
        if ($jenis == 1) {
            try {
                $data = Siswa::where('jenis', 'BKM')->whereYear('tanggal', $tahun)->whereMonth('tanggal', $bulan)->get()->map(function ($item) {
                    foreach (kbkm() as $k) {
                        $item[str_replace(' ', '', $k->nama)] = nilaibkm($item->id, $k->id);
                        $item[str_replace(' ', '', 'Bobot' . $k->nama)] = $k->bobot;
                        if ($k->tipe === 'COST') {
                            if (nilaibkm($item->id, $k->id) === 0) {
                                $item[str_replace(' ', '', 'Score' . $k->nama)] = 0;
                            } else {
                                $item[str_replace(' ', '', 'Score' . $k->nama)] = pow(1 / nilaibkm($item->id, $k->id), (float)$k->bobot);
                            }
                        } else {
                            $item[str_replace(' ', '', 'Score' . $k->nama)] = pow(nilaibkm($item->id, $k->id), (float)$k->bobot);
                        }
                    }

                    return $item;
                });
                $data = $data->map(function ($item) {
                    $scoreAttributes = collect($item->toArray())->filter(function ($value, $key) {
                        return strpos($key, 'Score') !== false;  // Mengecek apakah 'Score' ada dalam nama kunci
                    });
                    $item->si = $scoreAttributes->reduce(function ($carry, $item) {
                        return $carry * $item;  // Mengalikan nilai yang ada
                    }, 1);
                    return $item;
                });

                $sum_si = $data->sum('si');

                $data = $data->map(function ($item) use ($sum_si) {
                    $item->vi = $item->si / $sum_si;
                    return $item;
                })->sortByDesc('vi')->values();

                $pdf = Pdf::loadView('admin.laporan.pdf_hasilbkm', compact('data'))->setPaper('a4', 'landscape');;
                return $pdf->stream();
            } catch (\Throwable $th) {
                Session::flash('error', 'Nilai BKM tidak boleh 0');
                return back();
            }
        }
        if ($jenis == 2) {
            try {
                $data = Siswa::where('jenis', 'BKMP')->whereYear('tanggal', $tahun)->whereMonth('tanggal', $bulan)->get()->map(function ($item) {
                    foreach (kbkmp() as $k) {
                        $item[str_replace(' ', '', $k->nama)] = nilaibkmp($item->id, $k->id);
                        $item[str_replace(' ', '', 'Bobot' . $k->nama)] = $k->bobot;
                        if ($k->tipe === 'COST') {
                            if (nilaibkmp($item->id, $k->id) === 0) {
                                $item[str_replace(' ', '', 'Score' . $k->nama)] = 0;
                            } else {
                                $item[str_replace(' ', '', 'Score' . $k->nama)] = pow(1 / nilaibkmp($item->id, $k->id), (float)$k->bobot);
                            }
                        } else {
                            $item[str_replace(' ', '', 'Score' . $k->nama)] = pow(nilaibkmp($item->id, $k->id), (float)$k->bobot);
                        }
                    }

                    return $item;
                });
                $data = $data->map(function ($item) {
                    $scoreAttributes = collect($item->toArray())->filter(function ($value, $key) {
                        return strpos($key, 'Score') !== false;  // Mengecek apakah 'Score' ada dalam nama kunci
                    });
                    $item->si = $scoreAttributes->reduce(function ($carry, $item) {
                        return $carry * $item;  // Mengalikan nilai yang ada
                    }, 1);
                    return $item;
                })->sortByDesc('vi')->values();

                $sum_si = $data->sum('si');

                $data = $data->map(function ($item) use ($sum_si) {
                    $item->vi = $item->si / $sum_si;
                    return $item;
                });

                $pdf = Pdf::loadView('admin.laporan.pdf_hasilbkmp', compact('data'))->setPaper('a4', 'landscape');;
                return $pdf->stream();
            } catch (\Throwable $th) {
                Session::flash('error', 'Nilai BKMP tidak boleh 0');
                return back();
            }
        }
        if ($jenis == 3) {
            $data = Pbkm::whereYear('tanggal', $tahun)->whereMonth('tanggal', $bulan)->get();
            $pdf = Pdf::loadView('admin.laporan.pdf_penyerahanbkm', compact('data'))->setPaper('a4', 'landscape');;
            return $pdf->stream();
        }
        if ($jenis == 4) {
            $data = Pbkmp::whereYear('tanggal', $tahun)->whereMonth('tanggal', $bulan)->get();
            $pdf = Pdf::loadView('admin.laporan.pdf_penyerahanbkmp', compact('data'))->setPaper('a4', 'landscape');;
            return $pdf->stream();
        }
    }

    public function penyerahanbkm()
    {
        $data = Pbkm::get();
        $pdf = Pdf::loadView('admin.laporan.pdf_penyerahanbkm', compact('data'))->setPaper('a4', 'landscape');;
        return $pdf->stream();
    }
    public function penyerahanbkmp()
    {
        $data = Pbkmp::get();
        $pdf = Pdf::loadView('admin.laporan.pdf_penyerahanbkmp', compact('data'))->setPaper('a4', 'landscape');;
        return $pdf->stream();
    }
    public function hasilbkm()
    {
        try {
            $data = Siswa::where('jenis', 'BKM')->get()->map(function ($item) {
                foreach (kbkm() as $k) {
                    $item[str_replace(' ', '', $k->nama)] = nilaibkm($item->id, $k->id);
                    $item[str_replace(' ', '', 'Bobot' . $k->nama)] = $k->bobot;
                    if ($k->tipe === 'COST') {
                        if (nilaibkm($item->id, $k->id) === 0) {
                            $item[str_replace(' ', '', 'Score' . $k->nama)] = 0;
                        } else {
                            $item[str_replace(' ', '', 'Score' . $k->nama)] = pow(1 / nilaibkm($item->id, $k->id), (float)$k->bobot);
                        }
                    } else {
                        $item[str_replace(' ', '', 'Score' . $k->nama)] = pow(nilaibkm($item->id, $k->id), (float)$k->bobot);
                    }
                }

                return $item;
            });
            $data = $data->map(function ($item) {
                $scoreAttributes = collect($item->toArray())->filter(function ($value, $key) {
                    return strpos($key, 'Score') !== false;  // Mengecek apakah 'Score' ada dalam nama kunci
                });
                $item->si = $scoreAttributes->reduce(function ($carry, $item) {
                    return $carry * $item;  // Mengalikan nilai yang ada
                }, 1);
                return $item;
            });

            $sum_si = $data->sum('si');

            $data = $data->map(function ($item) use ($sum_si) {
                $item->vi = $item->si / $sum_si;
                return $item;
            })->sortByDesc('vi')->values();

            $pdf = Pdf::loadView('admin.laporan.pdf_hasilbkm', compact('data'))->setPaper('a4', 'landscape');;
            return $pdf->stream();
        } catch (\Throwable $th) {
            Session::flash('error', 'Nilai BKM tidak boleh 0');
            return back();
        }
    }


    public function hasilbkmp()
    {
        try {
            $data = Siswa::where('jenis', 'BKMP')->get()->map(function ($item) {
                foreach (kbkmp() as $k) {
                    $item[str_replace(' ', '', $k->nama)] = nilaibkmp($item->id, $k->id);
                    $item[str_replace(' ', '', 'Bobot' . $k->nama)] = $k->bobot;
                    if ($k->tipe === 'COST') {
                        if (nilaibkmp($item->id, $k->id) === 0) {
                            $item[str_replace(' ', '', 'Score' . $k->nama)] = 0;
                        } else {
                            $item[str_replace(' ', '', 'Score' . $k->nama)] = pow(1 / nilaibkmp($item->id, $k->id), (float)$k->bobot);
                        }
                    } else {
                        $item[str_replace(' ', '', 'Score' . $k->nama)] = pow(nilaibkmp($item->id, $k->id), (float)$k->bobot);
                    }
                }

                return $item;
            });
            $data = $data->map(function ($item) {
                $scoreAttributes = collect($item->toArray())->filter(function ($value, $key) {
                    return strpos($key, 'Score') !== false;  // Mengecek apakah 'Score' ada dalam nama kunci
                });
                $item->si = $scoreAttributes->reduce(function ($carry, $item) {
                    return $carry * $item;  // Mengalikan nilai yang ada
                }, 1);
                return $item;
            })->sortByDesc('vi')->values();

            $sum_si = $data->sum('si');

            $data = $data->map(function ($item) use ($sum_si) {
                $item->vi = $item->si / $sum_si;
                return $item;
            });

            $pdf = Pdf::loadView('admin.laporan.pdf_hasilbkmp', compact('data'))->setPaper('a4', 'landscape');;
            return $pdf->stream();
        } catch (\Throwable $th) {
            Session::flash('error', 'Nilai BKMP tidak boleh 0');
            return back();
        }
    }
}
