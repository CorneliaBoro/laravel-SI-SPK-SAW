<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class datakriteria extends Model
{
    use HasFactory;
    protected $table = "datakriteria";
    protected $fillable = ['kode','kriteria','bobot'];

    // protected $primaryKey = 'kode';
    public $incrementing = false;

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            $lastData = static::orderBy('kode', 'desc')->first();
            if ($lastData) {
                $lastNumber = (int)substr($lastData->kode, 1);
                $model->kode = 'C' . str_pad($lastNumber + 1, 2, '0', STR_PAD_LEFT);
            } else {
                $model->kode = 'C01';
            }
        });
    }

    public function generateKode()
    {
        $lastData = static::orderBy('kode', 'desc')->first();
        if ($lastData) {
            $lastNumber = (int)substr($lastData->kode, 1);
            return 'C' . str_pad($lastNumber + 1, 2, '0', STR_PAD_LEFT);
        } else {
            return 'C01';
        }
    }

    public function datapenilaian()
    {
        return $this->hasMany(datapenilaian::class);
    }

    public function datasubkriteria()
    {
        return $this->hasMany(datasubkriteria::class);
    }
}
