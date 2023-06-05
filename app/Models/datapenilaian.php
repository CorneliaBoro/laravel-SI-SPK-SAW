<?php

namespace App\Models;

use App\Models\datakriteria;
use App\Models\dataalternatif;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class datapenilaian extends Model
{
    use HasFactory;
    protected $table = "datapenilaian";
    protected $guarded = [];

    public function kriteria()
    {
        return $this->belongsTo(datakriteria::class,'id_kriteria', 'id');
    }

    public function alternatif()
    {
        return $this->belongsTo(dataalternatif::class,'id_alternatif', 'id');
    }

    public function normalisasi()
    {
        $data = [];
        $totalsaw = [];
        $nilai =datapenilaian::all();
        $kriteria = datakriteria::all();
	    $alternatif = dataalternatif::all();
        foreach ($kriteria as $kriterias) {
            if ($this->id_kriteria == $kriterias->id) {
                $max = dataPenilaian::where('id_kriteria', $this->id_kriteria)
                    ->max('nilai');
                $min = dataPenilaian::where('id_kriteria', $this->id_kriteria)
                    ->min('nilai');
                if (!$this->nilai == 0.00) {
                    if ($kriterias->kategori == "Benefit") {
                        $hasil_normalisasi = round($this->nilai / $max, 2);
                    } else {
                        $hasil_normalisasi = round($min / $this->nilai, 2);
                    }
                } else {
                    $hasil_normalisasi = 0.00;
                }
                $hasil_saw = $kriterias->bobot * $hasil_normalisasi;

                if (!isset($totalsaw[$this->id_alternatif])) {
                    $totalsaw[$this->id_alternatif] = $hasil_saw;
                } else {
                    $totalsaw[$this->id_alternatif] += $hasil_saw;
                }

                $data[] = [
                    'id_alternatif' => $this->id_alternatif,
                    'nilai_alternatif' => $this->nilai,
                    'kriteria_id' => $this->id_kriteria,
                    'nilai_kategori' => ($kriterias->kategori == "Benefit") ? $max : $min,
                    'bobot_kriteria' => $kriterias->bobot,
                    'hasil_normalisasi' => $hasil_normalisasi,
                    'hasil_saw' => $hasil_saw
                ];

            }
        }
        return $data;
    }
}



