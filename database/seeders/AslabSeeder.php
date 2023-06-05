<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;



class AslabSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('aslab')->insert([
            'nim'=>'2118038',
            'nama'=>'Siti Mutiara',
            "jenis_kelamin"=>"Perempuan",
            "created_at"=>date('Y-m-d.H.i.s')
        ]);

        DB::table('aslab')->insert([
            'nim'=>'2118018',
            'nama'=>'Syalsia Fatiha',
            "jenis_kelamin"=>"Perempuan",
            "created_at"=>date('Y-m-d.H.i.s')
        ]);
    }
}
