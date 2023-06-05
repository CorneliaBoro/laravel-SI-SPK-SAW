<?php

namespace App\Models;

use App\Models\datalab;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class datapraktikum extends Model
{
    use HasFactory;
    protected $table = "datapraktikum";
    protected $fillable = ['namaprak','semester','dosen'];

    public function datapenilaian()
    {
        return $this->hasMany(datalab::class);
    }
}
