<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class SpGetCotizacionById extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        //delete SPGetCotizacionById
        DB::unprepared("DROP PROCEDURE IF EXISTS sp_get_cotizacion_by_id");

        // SPGetCotizacionById
        DB::unprepared("
            CREATE PROCEDURE sp_get_cotizacion_by_id(
                IN t_cotizacion_id INT
            )
            BEGIN

                set @plan_id = (select planes_id from cotizaciones where id = t_cotizacion_id);
                set @companies = (
                    select 
                        json_arrayagg(json_object(
                            'product_id', x.product_id,
                            'product_name', x.product_name,
                            'factores', x.factores,
                            'company_id', x.company_id,
                            'company_name', x.company_name,
                            'company_logo', x.company_logo,
                            'primatotal', x.primatotal,
                            'primaneta', x.primaneta,
                            'is_gps', x.is_gps,
                            'coberturas', x.coberturas,
                            'deducibles', x.deducibles
                        )) `values`
                    from (
                        select 
                            uc.companias_id as company_id,
                            y.product_id,
                            y.product_name,
                            c2.nombre company_name,
                            c2.logo company_logo,
                            y.factores,
                            y.primatotal,
                            y.primaneta,
                            y.is_gps,
                            y.coberturas,
                            y.deducibles,
                            uc.cotizaciones_id as cotizacion_id
                        from usos_companias uc 
                        join companias c2 on c2.id = uc.companias_id
                        left join (
                            select 
                                c.id company_id,
                                p.id as product_id,
                                p.nombre as product_name,
                                fc.factores,
                                cd.primaneta,
                                cd.primatotal,
                                cd.is_gps,
                                cobe.`values` as coberturas,
                                dedu.`values` as deducibles
                            from cotizaciones_detalles cd
                            join productos p on p.id = cd.productos_id 
                            join companias c on c.id = cd.companias_id 
                            join (
                                select 
                                    f.companias_id ,
                                    json_arrayagg(json_object(
                                        'id', f.id ,
                                        'cuota', f.numerocuota,
                                        'percentage', f.porcentaje,
                                        'description', f.descripcion
                                    )) factores
                                from factores f 
                                where f.planes_id = @plan_id
                                and f.companias_id in (
                                    select uc.companias_id from usos_companias uc 
                                    where uc.cotizaciones_id = t_cotizacion_id
                                )
                                group by f.companias_id
                            ) fc on fc.companias_id = c.id 
                            left join (
                                select 
                                    d.productos_id ,
                                    json_arrayagg(json_object(
                                        'concepto_id', d.conceptos_id ,
                                        'name', c.descripcion ,
                                        'description', d.descripcion 
                                    ))  `values`
                                from deducibles d 
                                left join conceptos c on c.id = d.conceptos_id 
                                where d.conceptos_tipos_id = 1
                                and d.conceptos_id is not null
                                group by d.productos_id 
                            ) cobe on cobe.productos_id = p.id
                            left join (
                                select 
                                    d.productos_id ,
                                    json_arrayagg(json_object(
                                        'concepto_id', d.conceptos_id ,
                                        'name', c.descripcion ,
                                        'description', d.descripcion 
                                    ))  `values`
                                from deducibles d 
                                left join conceptos c on c.id = d.conceptos_id 
                                where d.conceptos_tipos_id = 2
                                group by d.productos_id 
                            ) dedu on dedu.productos_id = p.id
                            where cd.cotizaciones_id = t_cotizacion_id
                            and cd.companias_id in (
                                select uc.companias_id from usos_companias uc 
                                where uc.cotizaciones_id = t_cotizacion_id
                            )
                        ) y on y.company_id = uc.companias_id 
                        where uc.cotizaciones_id = t_cotizacion_id
                    ) x
                    group by x.cotizacion_id
                );

                select 
                    c.id cotizacion_id,
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
                    c.planes_id ,
                    c.companias_id ,
                    cu.name ,
                    cu.email ,
                    cu.telefono ,
                    s.nombre as subagente_nombre,
                    m.nombre as marca_nombre,
                    m2.nombre as modelo_nombre,
                    u.nombre as uso_nombre,
                    c.companies as companies_history,
                    @companies as companies,
                    @plan_id as plan_id
                from cotizaciones c 
                join marcas m on m.id = c.marcas_id 
                join modelos m2 on m2.id = c.modelos_id 
                join cms_users cu on cu.id = c.cms_users_id 
                join usos u on u.id = c.usos_id 
                left join subagentes s on s.id = c.subagentes_id 
                where c.id = t_cotizacion_id;

            END
        ");

        // dd('OK SPGetCotizacionById');
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
