<?php

namespace App\Http\Livewire;

use App\Models\Penyakit;
use Livewire\Component;

use Illuminate\Pagination\Paginator;
use Illuminate\Support\Collection;
use Illuminate\Pagination\LengthAwarePaginator;
use Livewire\WithPagination;

class Wirerule extends Component
{

    // use WithPagination;
    public function render()
    {
        return view('livewire.wirerule', [
            'data' => $this->resultData()
        ]);
    }

    public function resultData()
    {
        $allData = [];
        $penyakits = Penyakit::with('gejalas')->get();
        foreach ($penyakits as $keyP => $valueP) {
            $gejalas = $valueP->gejalas;
            // array_push($allData, $valueP->penyakit_nama . ' Jumlah Gejala ' . count($gejalas));
            for ($a = 0; $a < count($gejalas); $a++) {
                for ($b = 0; $b < $a; $b++) {
                    array_push($allData, 'IF ' . $gejalas[$a]->gejala_kode . ' AND ' . $gejalas[$b]->gejala_kode . ' THEN ' . $valueP->penyakit_nama);
                    for ($c = 0; $c < $b; $c++) {
                        array_push($allData, 'IF ' . $gejalas[$a]->gejala_kode . ' AND ' . $gejalas[$b]->gejala_kode . ' AND ' . $gejalas[$c]->gejala_kode . ' THEN ' . $valueP->penyakit_nama);
                        for ($d = 0; $d < $c; $d++) {
                            array_push($allData, 'IF ' . $gejalas[$a]->gejala_kode . ' AND ' . $gejalas[$b]->gejala_kode . ' AND ' . $gejalas[$c]->gejala_kode . ' AND ' . $gejalas[$d]->gejala_kode . ' THEN ' . $valueP->penyakit_nama);
                            for ($e = 0; $e < $d; $e++) {
                                array_push($allData, 'IF ' . $gejalas[$a]->gejala_kode . ' AND ' . $gejalas[$b]->gejala_kode . ' AND ' . $gejalas[$c]->gejala_kode . ' AND ' . $gejalas[$d]->gejala_kode . ' AND ' . $gejalas[$e]->gejala_kode . ' THEN ' . $valueP->penyakit_nama);
                                for ($f = 0; $f < $e; $f++) {
                                    array_push($allData, 'IF ' . $gejalas[$a]->gejala_kode . ' AND ' . $gejalas[$b]->gejala_kode . ' AND ' . $gejalas[$c]->gejala_kode . ' AND ' . $gejalas[$d]->gejala_kode . ' AND ' . $gejalas[$e]->gejala_kode . ' AND ' . $gejalas[$f]->gejala_kode . ' THEN ' . $valueP->penyakit_nama);
                                    for ($g = 0; $g < $f; $g++) {
                                        array_push($allData, 'IF ' . $gejalas[$a]->gejala_kode . ' AND ' . $gejalas[$b]->gejala_kode . ' AND ' . $gejalas[$c]->gejala_kode . ' AND ' . $gejalas[$d]->gejala_kode . ' AND ' . $gejalas[$e]->gejala_kode . ' AND ' . $gejalas[$f]->gejala_kode . ' AND ' . $gejalas[$g]->gejala_kode . ' THEN ' . $valueP->penyakit_nama);
                                        for ($h = 0; $h < $g; $h++) {
                                            array_push($allData, 'IF ' . $gejalas[$a]->gejala_kode . ' AND ' . $gejalas[$b]->gejala_kode . ' AND ' . $gejalas[$c]->gejala_kode . ' AND ' . $gejalas[$d]->gejala_kode . ' AND ' . $gejalas[$e]->gejala_kode . ' AND ' . $gejalas[$f]->gejala_kode . ' AND ' . $gejalas[$g]->gejala_kode . ' AND ' . $gejalas[$h]->gejala_kode . ' THEN ' . $valueP->penyakit_nama);
                                            for ($i = 0; $i < $h; $i++) {
                                                array_push($allData, 'IF ' . $gejalas[$a]->gejala_kode . ' AND ' . $gejalas[$b]->gejala_kode . ' AND ' . $gejalas[$c]->gejala_kode . ' AND ' . $gejalas[$d]->gejala_kode . ' AND ' . $gejalas[$e]->gejala_kode . ' AND ' . $gejalas[$f]->gejala_kode . ' AND ' . $gejalas[$g]->gejala_kode . ' AND ' . $gejalas[$h]->gejala_kode . ' AND ' . $gejalas[$i]->gejala_kode . ' THEN ' . $valueP->penyakit_nama);
                                                for ($j = 0; $j < $i; $j++) {
                                                    array_push($allData, 'IF ' . $gejalas[$a]->gejala_kode . ' AND ' . $gejalas[$b]->gejala_kode . ' AND ' . $gejalas[$c]->gejala_kode . ' AND ' . $gejalas[$d]->gejala_kode . ' AND ' . $gejalas[$e]->gejala_kode . ' AND ' . $gejalas[$f]->gejala_kode . ' AND ' . $gejalas[$g]->gejala_kode . ' AND ' . $gejalas[$h]->gejala_kode . ' AND ' . $gejalas[$i]->gejala_kode . ' AND ' . $gejalas[$j]->gejala_kode . ' THEN ' . $valueP->penyakit_nama);
                                                    for ($k = 0; $k < $j; $k++) {
                                                        array_push($allData, 'IF ' . $gejalas[$a]->gejala_kode . ' AND ' . $gejalas[$b]->gejala_kode . ' AND ' . $gejalas[$c]->gejala_kode . ' AND ' . $gejalas[$d]->gejala_kode . ' AND ' . $gejalas[$e]->gejala_kode . ' AND ' . $gejalas[$f]->gejala_kode . ' AND ' . $gejalas[$g]->gejala_kode . ' AND ' . $gejalas[$h]->gejala_kode . ' AND ' . $gejalas[$i]->gejala_kode . ' AND ' . $gejalas[$j]->gejala_kode . ' AND ' . $gejalas[$k]->gejala_kode . ' THEN ' . $valueP->penyakit_nama);
                                                        for ($l = 0; $l < $k; $l++) {
                                                            array_push($allData, 'IF ' . $gejalas[$a]->gejala_kode . ' AND ' . $gejalas[$b]->gejala_kode . ' AND ' . $gejalas[$c]->gejala_kode . ' AND ' . $gejalas[$d]->gejala_kode . ' AND ' . $gejalas[$e]->gejala_kode . ' AND ' . $gejalas[$f]->gejala_kode . ' AND ' . $gejalas[$g]->gejala_kode . ' AND ' . $gejalas[$h]->gejala_kode . ' AND ' . $gejalas[$i]->gejala_kode . ' AND ' . $gejalas[$j]->gejala_kode . ' AND ' . $gejalas[$k]->gejala_kode . ' AND ' . $gejalas[$l]->gejala_kode . ' THEN ' . $valueP->penyakit_nama);
                                                            for ($m = 0; $m < $l; $m++) {
                                                                array_push($allData, 'IF ' . $gejalas[$a]->gejala_kode . ' AND ' . $gejalas[$b]->gejala_kode . ' AND ' . $gejalas[$c]->gejala_kode . ' AND ' . $gejalas[$d]->gejala_kode . ' AND ' . $gejalas[$e]->gejala_kode . ' AND ' . $gejalas[$f]->gejala_kode . ' AND ' . $gejalas[$g]->gejala_kode . ' AND ' . $gejalas[$h]->gejala_kode . ' AND ' . $gejalas[$i]->gejala_kode . ' AND ' . $gejalas[$j]->gejala_kode . ' AND ' . $gejalas[$k]->gejala_kode . ' AND ' . $gejalas[$l]->gejala_kode . ' AND ' . $gejalas[$m]->gejala_kode . ' THEN ' . $valueP->penyakit_nama);
                                                                for ($n = 0; $n < $m; $n++) {
                                                                    array_push($allData, 'IF ' . $gejalas[$a]->gejala_kode . ' AND ' . $gejalas[$b]->gejala_kode . ' AND ' . $gejalas[$c]->gejala_kode . ' AND ' . $gejalas[$d]->gejala_kode . ' AND ' . $gejalas[$e]->gejala_kode . ' AND ' . $gejalas[$f]->gejala_kode . ' AND ' . $gejalas[$g]->gejala_kode . ' AND ' . $gejalas[$h]->gejala_kode . ' AND ' . $gejalas[$i]->gejala_kode . ' AND ' . $gejalas[$j]->gejala_kode . ' AND ' . $gejalas[$k]->gejala_kode . ' AND ' . $gejalas[$l]->gejala_kode . ' AND ' . $gejalas[$m]->gejala_kode . ' AND ' . $gejalas[$n]->gejala_kode . ' THEN ' . $valueP->penyakit_nama);
                                                                    for ($o = 0; $o < $n; $o++) {
                                                                        array_push($allData, 'IF ' . $gejalas[$a]->gejala_kode . ' AND ' . $gejalas[$b]->gejala_kode . ' AND ' . $gejalas[$c]->gejala_kode . ' AND ' . $gejalas[$d]->gejala_kode . ' AND ' . $gejalas[$e]->gejala_kode . ' AND ' . $gejalas[$f]->gejala_kode . ' AND ' . $gejalas[$g]->gejala_kode . ' AND ' . $gejalas[$h]->gejala_kode . ' AND ' . $gejalas[$i]->gejala_kode . ' AND ' . $gejalas[$j]->gejala_kode . ' AND ' . $gejalas[$k]->gejala_kode . ' AND ' . $gejalas[$l]->gejala_kode . ' AND ' . $gejalas[$m]->gejala_kode . ' AND ' . $gejalas[$n]->gejala_kode . ' AND ' . $gejalas[$o]->gejala_kode . ' THEN ' . $valueP->penyakit_nama);
                                                                    }
                                                                }
                                                            }
                                                        }
                                                    }
                                                }
                                            }
                                        }
                                    }
                                }
                            }
                        }
                    }
                }
            }
        }

        // return $allData;

        $data = $this->paginateCustom($allData);

        return $data;
    }

    public function paginateCustom($items, $perPage = 10, $page = null, $options = [])
    {
        $page = $page ?: (Paginator::resolveCurrentPage() ?: 1);
        $items = $items instanceof Collection ? $items : Collection::make($items);
        return new LengthAwarePaginator($items->forPage($page, $perPage), $items->count(), $perPage, $page, $options);
    }
}
