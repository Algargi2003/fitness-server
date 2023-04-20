<?php

namespace Database\Seeders;

use App\Models\Ingrediente;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use JeroenZwart\CsvSeeder\CsvSeeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class IngredientesSeeder extends CsvSeeder
{
    public function __construct(){
        $this->file = '/database/seeds/ingredientes.csv';
        $this->truncate = false;
        $this->tablename = 'ingredientes';
    }
    public function run(): void
    {
        DB::disableQueryLog();
        parent::run();
    }
}
