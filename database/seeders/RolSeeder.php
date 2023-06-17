<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Silber\Bouncer\BouncerFacade as Bouncer;

class RolSeeder extends Seeder
{
    
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //TIPO ALQUILER
        $tipo_alquiler = 'tipo_alquiler';
        $crear_tipo_alquiler = 'crear_tipo_alquiler';
        $listar_tipo_alquiler = 'listar_tipo_alquiler';
        $editar_tipo_alquiler = 'editar_tipo_alquiler';
        $eliminar_tipo_alquiler = 'eliminar_tipo_alquiler';

        Bouncer::allow('administrador')->to([
            //TIPO ALQUILER
            $tipo_alquiler,
            $crear_tipo_alquiler,
            $listar_tipo_alquiler,
            $editar_tipo_alquiler,
            $eliminar_tipo_alquiler,
        ]);

        Bouncer::allow('usuario')->to([
            //TIPO ALQUILER
        
            $listar_tipo_alquiler,
 
        ]);
    }
}
