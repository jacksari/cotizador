<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class SpGetCotizaciones extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        

        //delete SPGetCotizacionById
        DB::unprepared("DROP PROCEDURE IF EXISTS sp_get_cotizaciones");

        // SPGetCotizacionById
        DB::unprepared("
            CREATE PROCEDURE sp_get_cotizaciones(
                in t_status_id int,
                in t_search varchar(255)
            )
            BEGIN

                select 
                    c.id,
                    c.aniofabricacion ,
                    c.valormercado ,
                    c.updated_at ,
                    c.created_at ,
                    c.nombreprospecto ,
                    c.email ,
                    c.celular ,
                    c.region ,
                    c.observacion ,
                    c.is_convertidogas ,
                    c.pacifico_prima ,
                    c.pacifico_cuotas_1 ,
                    c.pacifico_cuotas_2 ,
                    c.pacifico_cuotas_3 ,
                    c.hdi_prima ,
                    c.hdi_cuotas_1 ,
                    c.hdi_cuotas_2 ,
                    c.hdi_cuotas_3 ,
                    cu.name ,
                    cu.email ,
                    cu.telefono ,
                    s.nombre 
                from cotizaciones c 
                join marcas m on m.id = c.marcas_id 
                join modelos m2 on m2.id = c.modelos_id 
                join cms_users cu on cu.id = c.cms_users_id 
                left join subagentes s on s.id = c.subagentes_id
                where if(t_status_id is null, 1, c.status_id = t_status_id)
                and if(t_search is null, 1, c.nombreprospecto COLLATE utf8mb4_unicode_ci like concat('%', t_search, '%') COLLATE utf8mb4_unicode_ci);
                
            END
        ");

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
