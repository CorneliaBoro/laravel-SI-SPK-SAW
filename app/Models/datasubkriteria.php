<?php

namespace App\Models;

use App\Models\datapenilaian;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class datasubkriteria extends Model
{
    use HasFactory;
    protected $table = "datasubkriteria";
    protected $guarded = [];
    
    public function datakriteria()
    {
        return $this->belongsTo(datakriteria::class);
    }

    public function datapenilaian()
    {
        return $this->hasMany(datapenilaian::class);
    }

}
