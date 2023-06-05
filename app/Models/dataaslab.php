<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class dataaslab extends Model
{
    use HasFactory;
    protected $table = "dataaslab";
    protected $fillable = ['nim','nama','jenis_kelamin','ipk'];
}
