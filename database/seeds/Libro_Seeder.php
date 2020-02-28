<?php
use App\libro_Factory;
use Illuminate\Database\Seeder;
use Illuminate\Suport\Facades\DB;
class Libro_Seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Libro::class, 10)->create();
    }
}
