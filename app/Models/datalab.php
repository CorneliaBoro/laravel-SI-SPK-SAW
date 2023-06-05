<?php

namespace App\Models;

use App\Models\datapraktikum;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class datalab extends Model
{
    use HasFactory;
    protected $table = "datalab";
    protected $fillable = ['namaprak','semester'];

    public function lab()
    {
        return $this->belongsTo(datapraktikum::class,'id_prak', 'id');
    }
}
