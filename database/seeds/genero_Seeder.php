<?php
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use APP\modelo_Genero;
class genero_Seeder extends Seeder

{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
     
       $generosLibro = array
       (

           ( [  'nombre' => 'terror' ]),

            ( [  'nombre' => 'ciencia-ficcion' ]),

            ([ 'nombre' => 'misterio' ]),

            ([  'nombre' => 'historico'  ]),
    
            ( [ 'nombre' => 'autobiografia' ]),
        
            ( [ 'nombre' => 'romance' ]),
        
            ( [ 'nombre' => 'ciencia'  ])

        );
     
        foreach($generosLibro as $genero)
        {
            $genero['created_at'] = Carbon::now();
            DB::table('genres')->insert($genero);
            
            


        }


        
    }
}
