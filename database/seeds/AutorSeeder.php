<?php
use Illuminate\Suport\Facades\DB;
use Illuminate\Database\Seeder;
use App\Autor;

class AutorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      factory(App\Autor::class, 10)->create();
    }
} 
