<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use JeroenZwart\CsvSeeder\CsvSeeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends CsvSeeder
{
    public function __construct(){
        $this->file = '/database/seeds/users.csv';
        $this->truncate = false;
        $this->tablename = 'users';
    }
    public function run(): void
    {
        DB::disableQueryLog();
        parent::run();
    }
}
