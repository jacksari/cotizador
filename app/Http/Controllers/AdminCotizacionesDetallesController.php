<?php namespace App\Http\Controllers;

	use Carbon\Carbon;
    use Session;
	use Request;
	use DB;
	use CRUDBooster;

	class AdminCotizacionesDetallesController extends \crocodicstudio\crudbooster\controllers\CBController {

	    public function cbInit() {

			# START CONFIGURATION DO NOT REMOVE THIS LINE
			$this->title_field = "id";
			$this->limit = "20";
			$this->orderby = "companias_id,desc";
			$this->global_privilege = false;
			$this->button_table_action = true;
			$this->button_bulk_action = true;
			$this->button_action_style = "button_icon";
			$this->button_add = false;
			$this->button_edit = true;
			$this->button_delete = false;
			$this->button_detail = true;
			$this->button_show = false;
			$this->button_filter = true;
			$this->button_import = false;
			$this->button_export = false;
			$this->table = "cotizaciones_detalles";
			# END CONFIGURATION DO NOT REMOVE THIS LINE

			# START COLUMNS DO NOT REMOVE THIS LINE
			$this->col = [];
			$this->col[] = ["label"=>"Compañía","name"=>"companias_id","join"=>"companias,nombre"];
			$this->col[] = ["label"=>"Producto","name"=>"productos_id","join"=>"productos,nombre"];
			$this->col[] = ["label"=>"Tasa","name"=>"tasa"];
			$this->col[] = ["label"=>"Prima Neta","name"=>"primaneta","callback_php"=>'"$ " . number_format($row->primaneta,2)'];
			$this->col[] = ["label"=>"Prima Total","name"=>"primatotal","callback_php"=>'"$ " . number_format($row->primatotal,2)'];
			$this->col[] = ["label"=>"Descuento","name"=>"descuento"];
            //$this->col[] = ['label'=>'Tasa con Desc.','name'=>"(select round((cotdet.tasa - (cotdet.tasa * (cotdet.descuento / 100))),2) from cotizaciones_detalles cotdet where cotdet.id = cotizaciones_detalles.id) as tasa_descuento"];
            $this->col[] = ['label'=>'Tasa con Desc.','name'=>"(select (cotdet.tasa - (cotdet.tasa * (cotdet.descuento / 100))) from cotizaciones_detalles cotdet where cotdet.id = cotizaciones_detalles.id) as tasa_descuento"];
			$this->col[] = ["label"=>"GPS","name"=>"is_gps"];
			$this->col[] = ["label"=>"Como Nuevo","name"=>"is_comonuevo"];
			# END COLUMNS DO NOT REMOVE THIS LINE

			# START FORM DO NOT REMOVE THIS LINE
			$this->form = [];
			$this->form[] = ['label'=>'Cotizacion','name'=>'cotizaciones_id','type'=>'hidden','validation'=>'required|integer|min:0','width'=>'col-sm-10','datatable'=>'cotizaciones,id'];
			$this->form[] = ['label'=>'Compañía','name'=>'companias_id','type'=>'select','validation'=>'required|integer|min:0','width'=>'col-sm-10','datatable'=>'companias,nombre','disabled'=>(CRUDBooster::getCurrentMethod() == 'getEdit')?true:false];
			$this->form[] = ['label'=>'Producto','name'=>'productos_id','type'=>'select','validation'=>'integer|min:0','width'=>'col-sm-10','datatable'=>'productos,abreviacion','parent_select'=>'companias_id','disabled'=>(CRUDBooster::getCurrentMethod() == 'getEdit')?true:false];
			$this->form[] = ['label'=>'Tasa','name'=>'tasa','type'=>'text','validation'=>'required|numeric|min:0','width'=>'col-sm-10','readonly'=>(CRUDBooster::getCurrentMethod() == 'getEdit')?true:false];
			$this->form[] = ['label'=>'Prima Neta','name'=>'primaneta','type'=>'text','validation'=>'required|numeric|min:0','width'=>'col-sm-10','readonly'=>(CRUDBooster::getCurrentMethod() == 'getEdit')?true:false];
			$this->form[] = ['label'=>'Prima Total','name'=>'primatotal','type'=>'text','validation'=>'required|numeric|min:0','width'=>'col-sm-10','readonly'=>(CRUDBooster::getCurrentMethod() == 'getEdit')?true:false];
			$this->form[] = ['label'=>'Descuento','name'=>'descuento','type'=>'text','validation'=>'required|numeric|min:0','width'=>'col-sm-10'];
			$this->form[] = ['label'=>'Gps','name'=>'is_gps','type'=>'radio','validation'=>'required|integer','width'=>'col-sm-10','dataenum'=>'1|Si;0|No','value'=>'0'];
			$this->form[] = ['label'=>'Como Nuevo','name'=>'is_comonuevo','type'=>'radio','validation'=>'required|integer','width'=>'col-sm-10','dataenum'=>'1|Si;0|No','value'=>'0'];
			# END FORM DO NOT REMOVE THIS LINE

			# OLD START FORM
			//$this->form = [];
			//$this->form[] = ["label"=>"Cotizaciones Id","name"=>"cotizaciones_id","type"=>"select2","required"=>TRUE,"validation"=>"required|integer|min:0","datatable"=>"cotizaciones,id"];
			//$this->form[] = ["label"=>"Companias Id","name"=>"companias_id","type"=>"select2","required"=>TRUE,"validation"=>"required|integer|min:0","datatable"=>"companias,id"];
			//$this->form[] = ["label"=>"Productos Id","name"=>"productos_id","type"=>"select2","required"=>TRUE,"validation"=>"required|integer|min:0","datatable"=>"productos,id"];
			//$this->form[] = ["label"=>"Tasa","name"=>"tasa","type"=>"money","required"=>TRUE,"validation"=>"required|integer|min:0"];
			//$this->form[] = ["label"=>"Primaneta","name"=>"primaneta","type"=>"money","required"=>TRUE,"validation"=>"required|integer|min:0"];
			//$this->form[] = ["label"=>"Primatotal","name"=>"primatotal","type"=>"money","required"=>TRUE,"validation"=>"required|integer|min:0"];
			//$this->form[] = ["label"=>"Descuento","name"=>"descuento","type"=>"money","required"=>TRUE,"validation"=>"required|integer|min:0"];
			//$this->form[] = ["label"=>"Is Gps","name"=>"is_gps","type"=>"radio","required"=>TRUE,"validation"=>"required|integer","dataenum"=>"Array"];
			//$this->form[] = ["label"=>"Is Comonuevo","name"=>"is_comonuevo","type"=>"radio","required"=>TRUE,"validation"=>"required|integer","dataenum"=>"Array"];
			# OLD END FORM

			/* 
	        | ---------------------------------------------------------------------- 
	        | Sub Module
	        | ----------------------------------------------------------------------     
			| @label          = Label of action 
			| @path           = Path of sub module
			| @foreign_key 	  = foreign key of sub table/module
			| @button_color   = Bootstrap Class (primary,success,warning,danger)
			| @button_icon    = Font Awesome Class  
			| @parent_columns = Sparate with comma, e.g : name,created_at
	        | 
	        */
	        $this->sub_module = array();

	        /* 
	        | ---------------------------------------------------------------------- 
	        | Add More Action Button / Menu
	        | ----------------------------------------------------------------------     
	        | @label       = Label of action 
	        | @url         = Target URL, you can use field alias. e.g : [id], [name], [title], etc
	        | @icon        = Font awesome class icon. e.g : fa fa-bars
	        | @color 	   = Default is primary. (primary, warning, succecss, info)     
	        | @showIf 	   = If condition when action show. Use field alias. e.g : [id] == 1
	        | 
	        */
	        $this->addaction = array();


	        /* 
	        | ---------------------------------------------------------------------- 
	        | Add More Button Selected
	        | ----------------------------------------------------------------------     
	        | @label       = Label of action 
	        | @icon 	   = Icon from fontawesome
	        | @name 	   = Name of button 
	        | Then about the action, you should code at actionButtonSelected method 
	        | 
	        */
	        $this->button_selected = array();

	                
	        /* 
	        | ---------------------------------------------------------------------- 
	        | Add alert message to this module at overheader
	        | ----------------------------------------------------------------------     
	        | @message = Text of message 
	        | @type    = warning,success,danger,info        
	        | 
	        */
	        $this->alert        = array();
	                

	        
	        /* 
	        | ---------------------------------------------------------------------- 
	        | Add more button to header button 
	        | ----------------------------------------------------------------------     
	        | @label = Name of button 
	        | @url   = URL Target
	        | @icon  = Icon from Awesome.
	        | 
	        */
	        $this->index_button = array();
            $this->index_button[] = ['label'=>'Ver Cotización PDF','url'=>url('showpdf').'/'.$_GET["parent_id"],"icon"=>"fa fa-file-pdf-o"];


	        /* 
	        | ---------------------------------------------------------------------- 
	        | Customize Table Row Color
	        | ----------------------------------------------------------------------     
	        | @condition = If condition. You may use field alias. E.g : [id] == 1
	        | @color = Default is none. You can use bootstrap success,info,warning,danger,primary.        
	        | 
	        */
	        $this->table_row_color = array();     	          

	        
	        /*
	        | ---------------------------------------------------------------------- 
	        | You may use this bellow array to add statistic at dashboard 
	        | ---------------------------------------------------------------------- 
	        | @label, @count, @icon, @color 
	        |
	        */
	        $this->index_statistic = array();



	        /*
	        | ---------------------------------------------------------------------- 
	        | Add javascript at body 
	        | ---------------------------------------------------------------------- 
	        | javascript code in the variable 
	        | $this->script_js = "function() { ... }";
	        |
	        */
	        $this->script_js = NULL;


            /*
	        | ---------------------------------------------------------------------- 
	        | Include HTML Code before index table 
	        | ---------------------------------------------------------------------- 
	        | html code to display it before index table
	        | $this->pre_index_html = "<p>test</p>";
	        |
	        */
	        //$this->pre_index_html = null;

            $id = $_GET["parent_id"]; //CRUDBooster::getCurrentId();
            $cotizacion = DB::table('cotizaciones')->where('id',$id)->first();

            $uso = DB::table('usos')->where('id',$cotizacion->usos_id)->value('nombre');
            $marca = DB::table('marcas')->where('id',$cotizacion->marcas_id)->value('nombre');
            $modelo = DB::table('modelos')->where('id',$cotizacion->modelos_id)->value('nombre');
            $aniofabricacion = $cotizacion->aniofabricacion;
            $valormercado = $cotizacion->valormercado;
            $is_convertidogas = ($cotizacion->is_convertidogas)? '- Convertido a Gas' : '';

	        $this->pre_index_html = "<p><h3>$marca $modelo $aniofabricacion - $$valormercado $is_convertidogas</h3></p>";
	        $this->pre_index_html = $this->pre_index_html . "<p><h4>Para Uso: $uso</h4></p>";
	        /*$this->pre_index_html = $this->pre_index_html . "
                <div class=\"box box-default\">
                  <div class=\"box-body table-responsive no-padding\">
                    <table class=\"table table-bordered\">
                      <tbody>
                        <tr class=\"active\">
                          <td colspan=\"2\"><strong><i class=\"fa fa-bars\"></i> Detalles</strong></td>
                        </tr>
                                    <tr>
                          <td width=\"25%\"><strong>Nombreprospecto</strong></td><td>: Caleb Santos</td>
                        </tr>
                                    <tr>
                          <td width=\"25%\"><strong>Edad</strong></td><td>: 45</td>
                        </tr>
                                    <tr>
                          <td width=\"25%\"><strong>Celular</strong></td><td>: 993175447</td>
                        </tr>
                                    <tr>
                          <td width=\"25%\"><strong>Email</strong></td><td>: calebsc@gmail.com</td>
                        </tr>
                                    <tr>
                          <td width=\"25%\"><strong>Region</strong></td><td>: Lima</td>
                        </tr>
                                    <tr>
                          <td width=\"25%\"><strong>Estado</strong></td><td>: Pendiente</td>
                        </tr>
                                    <tr>
                          <td width=\"25%\"><strong>Observacion</strong></td><td>: </td>
                        </tr>

                      </tbody>
                    </table>
                  </div>
                </div>
	        ";*/

	        
	        
	        /*
	        | ---------------------------------------------------------------------- 
	        | Include HTML Code after index table 
	        | ---------------------------------------------------------------------- 
	        | html code to display it after index table
	        | $this->post_index_html = "<p>test</p>";
	        |
	        */
	        $this->post_index_html = null;
	        
	        
	        
	        /*
	        | ---------------------------------------------------------------------- 
	        | Include Javascript File 
	        | ---------------------------------------------------------------------- 
	        | URL of your javascript each array 
	        | $this->load_js[] = asset("myfile.js");
	        |
	        */
	        $this->load_js = array();
	        
	        
	        
	        /*
	        | ---------------------------------------------------------------------- 
	        | Add css style at body 
	        | ---------------------------------------------------------------------- 
	        | css code in the variable 
	        | $this->style_css = ".style{....}";
	        |
	        */
	        $this->style_css = NULL;
	        
	        
	        
	        /*
	        | ---------------------------------------------------------------------- 
	        | Include css File 
	        | ---------------------------------------------------------------------- 
	        | URL of your css each array 
	        | $this->load_css[] = asset("myfile.css");
	        |
	        */
	        $this->load_css = array();
	        
	        
	    }


	    /*
	    | ---------------------------------------------------------------------- 
	    | Hook for button selected
	    | ---------------------------------------------------------------------- 
	    | @id_selected = the id selected
	    | @button_name = the name of button
	    |
	    */
	    public function actionButtonSelected($id_selected,$button_name) {
	        //Your code here
	            
	    }


	    /*
	    | ---------------------------------------------------------------------- 
	    | Hook for manipulate query of index result 
	    | ---------------------------------------------------------------------- 
	    | @query = current sql query 
	    |
	    */
	    public function hook_query_index(&$query) {
	        //Your code here
	            
	    }

	    /*
	    | ---------------------------------------------------------------------- 
	    | Hook for manipulate row of index table html 
	    | ---------------------------------------------------------------------- 
	    |
	    */    
	    public function hook_row_index($column_index,&$column_value) {	        
	    	//Your code here
            if($column_index==8 || $column_index==9){
                if($column_value == 1) {
                    $column_value = 'Si';
                }else{
                    $column_value = 'No';
                }
            }
            if($column_index==2){
                if($column_value == "") {
                    $column_value = 'NO ASEGURABLE';
                }
            }
	    }

	    /*
	    | ---------------------------------------------------------------------- 
	    | Hook for manipulate data input before add data is execute
	    | ---------------------------------------------------------------------- 
	    | @arr
	    |
	    */
	    public function hook_before_add(&$postdata) {        
	        //Your code here

	    }

	    /* 
	    | ---------------------------------------------------------------------- 
	    | Hook for execute command after add public static function called 
	    | ---------------------------------------------------------------------- 
	    | @id = last insert id
	    | 
	    */
	    public function hook_after_add($id) {        
	        //Your code here

	    }

	    /* 
	    | ---------------------------------------------------------------------- 
	    | Hook for manipulate data input before update data is execute
	    | ---------------------------------------------------------------------- 
	    | @postdata = input post data 
	    | @id       = current id 
	    | 
	    */
	    public function hook_before_edit(&$postdata,$id) {        
	        //Your code here
	    }

	    /* 
	    | ---------------------------------------------------------------------- 
	    | Hook for execute command after edit public static function called
	    | ----------------------------------------------------------------------     
	    | @id       = current id 
	    | 
	    */
	    public function hook_after_edit($id) {
	        //Your code here

            $cotizaciones_detalles = DB::table('cotizaciones_detalles')->where('id',$id)->first();

            if (!is_null($cotizaciones_detalles->productos_id) && $cotizaciones_detalles->productos_id > 0) {

                $cotizacion = DB::table('cotizaciones')->where('id',$cotizaciones_detalles->cotizaciones_id)->first();
                $productos = DB::table('productos')->where('id',$cotizaciones_detalles->productos_id)->first();
                $is_gps = $cotizaciones_detalles->is_gps;
                $is_comonuevo = $cotizaciones_detalles->is_comonuevo;

                if ($is_comonuevo == 1) {
                    $anioantiguedad = 0;
                    $tasa = DB::table('tasas')->where([['productos_id','=',$cotizaciones_detalles->productos_id],['anioantiguedad','=',$anioantiguedad]])->value('porcentajetasa');
                } else {
                    //$tasa = $cotizaciones_detalles->tasa;
                    //falta agregar el caso en el que se desmarca IS_COMONUEVO la tasa deberia regresar a la tasa original
                    //Para tal fin solo se debe calcular anio antiguedad y buscar la tasa
                    $curYear = date('Y');
                    $anioantiguedad = $curYear - $cotizacion->aniofabricacion;
                    $tasa = DB::table('tasas')->where([['productos_id','=',$cotizaciones_detalles->productos_id],['anioantiguedad','=',$anioantiguedad]])->value('porcentajetasa');
                }

                //Calcula la tasa por si tuviera descuento, si el descuento es CERO no afecta la tasa
                $tasa_calculada = $tasa - ($tasa * ($cotizaciones_detalles->descuento / 100));
                $tasa_calculada = round($tasa_calculada,2);

                $primaneta = $cotizacion->valormercado * ($tasa_calculada / 100);

                if ($productos->primaminima > 0 && $primaneta < $productos->primaminima) {
                    $primaneta = $productos->primaminima;
                }
                $primatotal = round(($primaneta * (121.54 / 100)),2);
                $primaneta = round($primaneta,2);

                DB::table('cotizaciones_detalles')
                    ->where('id',$id)
                    ->update(
                        [
                            'updated_at'=>Carbon::now()->format('Y-m-d H:i:s'),
                            //'cotizaciones_id' => $id,
                            'companias_id' => $cotizaciones_detalles->companias_id,
                            'productos_id' => $cotizaciones_detalles->productos_id,
                            'tasa' => $tasa,
                            'primaneta' => $primaneta,
                            'primatotal' => $primatotal,
                            //'descuento' => $descuento,
                            'is_gps' => $is_gps //,
                            //'is_comonuevo' => $is_comonuevo
                        ]
                    );
            }

	    }

	    /* 
	    | ---------------------------------------------------------------------- 
	    | Hook for execute command before delete public static function called
	    | ----------------------------------------------------------------------     
	    | @id       = current id 
	    | 
	    */
	    public function hook_before_delete($id) {
	        //Your code here

	    }

	    /* 
	    | ---------------------------------------------------------------------- 
	    | Hook for execute command after delete public static function called
	    | ----------------------------------------------------------------------     
	    | @id       = current id 
	    | 
	    */
	    public function hook_after_delete($id) {
	        //Your code here

	    }



	    //By the way, you can still create your own method in here... :) 


	}