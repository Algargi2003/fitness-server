<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use JeroenZwart\CsvSeeder\CsvSeeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class RecetasMenuDiarioSeeder extends CsvSeeder
{
    public function __construct(){
        $this->file = '/database/seeds/recetas_menu_diario.csv';
        $this->truncate = false;
        $this->tablename = 'recetas_menu_diario';
    }
    public function run(): void
    {
        DB::disableQueryLog();
        parent::run();
    }
}
