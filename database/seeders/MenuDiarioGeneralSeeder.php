<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\MenuDiarioGeneral;
use Illuminate\Support\Facades\DB;
use JeroenZwart\CsvSeeder\CsvSeeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class MenuDiarioGeneralSeeder extends CsvSeeder
{
    /**
     * Run the database seeds.
     */
    public function __construct(){
        $this->file = '/database/seeds/menu_diario_general.csv';
        $this->truncate = false;
        $this->tablename = 'menu_diario_general';
    }
    public function run(): void
    {
        DB::disableQueryLog();
        parent::run();
    }
}
