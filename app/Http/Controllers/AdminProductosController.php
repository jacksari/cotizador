<?php namespace App\Http\Controllers;

use Session;
use Request;
use DB;
use CRUDBooster;

class AdminProductosController extends \crocodicstudio\crudbooster\controllers\CBController {

    public function cbInit() {

			# START CONFIGURATION DO NOT REMOVE THIS LINE
			$this->title_field = "nombre";
			$this->limit = "20";
			$this->orderby = "companias_id,asc";
			$this->global_privilege = false;
			$this->button_table_action = true;
			$this->button_bulk_action = true;
			$this->button_action_style = "button_icon";
			$this->button_add = true;
			$this->button_edit = true;
			$this->button_delete = true;
			$this->button_detail = true;
			$this->button_show = true;
			$this->button_filter = true;
			$this->button_import = false;
			$this->button_export = false;
			$this->table = "productos";
			# END CONFIGURATION DO NOT REMOVE THIS LINE

			# START COLUMNS DO NOT REMOVE THIS LINE
			$this->col = [];
			$this->col[] = ["label"=>"Companias Id","name"=>"companias_id","join"=>"companias,nombre"];
			$this->col[] = ["label"=>"Nombre","name"=>"nombre"];
			$this->col[] = ["label"=>"Abreviación","name"=>"abreviacion"];
			$this->col[] = ["label"=>"Prima Mínima","name"=>"primaminima","callback_php"=>'"$ " . number_format($row->primaminima)'];
            $this->col[] = ["label"=>"GPS Tope","name"=>"gpsmontotope","callback_php"=>'"$ " . number_format($row->gpsmontotope)'];
//          $this->col[] = ["label"=>"% Comisión","name"=>"porcentajecomision"];
//			$this->col[] = ["label"=>"Contado","name"=>"is_contado"];
//			$this->col[] = ["label"=>"Cuatro Cuotas","name"=>"is_cuatrocuotas"];
//			$this->col[] = ["label"=>"Seis Cuotas","name"=>"is_seiscuotas"];
//			$this->col[] = ["label"=>"Diez Cuotas","name"=>"is_diezcuotas"];
			# END COLUMNS DO NOT REMOVE THIS LINE

			# START FORM DO NOT REMOVE THIS LINE
			$this->form = [];
			$this->form[] = ['label'=>'Compañia','name'=>'companias_id','type'=>'select2','validation'=>'required|integer|min:0','width'=>'col-sm-5','datatable'=>'companias,nombre'];
			$this->form[] = ['label'=>'Nombre','name'=>'nombre','type'=>'text','validation'=>'required|min:1|max:50','width'=>'col-sm-5'];
			$this->form[] = ['label'=>'Abreviación','name'=>'abreviacion','type'=>'text','validation'=>'required|min:1|max:20','width'=>'col-sm-4'];
			$this->form[] = ['label'=>'Prima Mínima','name'=>'primaminima','type'=>'number','validation'=>'required','width'=>'col-sm-4'];
			$this->form[] = ['label'=>'GPS Tope','name'=>'gpsmontotope','type'=>'money','validation'=>'required','width'=>'col-sm-4'];
			$this->form[] = ['label'=>'% Comisión','name'=>'porcentajecomision','type'=>'number','validation'=>'required','width'=>'col-sm-3'];
			$this->form[] = ['label'=>'% Descuento Tasa (Vehículo >= US$ 50,000)','name'=>'descuento_tasa','type'=>'number','validation'=>'required|numeric|min:0','width'=>'col-sm-3','value'=>'0','step'=>0.01];
			$this->form[] = ['label'=>'Contado','name'=>'is_contado','type'=>'hidden','validation'=>'integer','width'=>'col-sm-10','value'=>'0'];
			$this->form[] = ['label'=>'Cuatro Cuotas','name'=>'is_cuatrocuotas','type'=>'hidden','validation'=>'integer','width'=>'col-sm-10','value'=>'0'];
			$this->form[] = ['label'=>'Cinco Cuotas','name'=>'is_cincocuotas','type'=>'hidden','validation'=>'integer','width'=>'col-sm-10','value'=>'0'];
			$this->form[] = ['label'=>'Seis Cuotas','name'=>'is_seiscuotas','type'=>'hidden','validation'=>'integer','width'=>'col-sm-10','value'=>'0'];
			$this->form[] = ['label'=>'Diez Cuotas','name'=>'is_diezcuotas','type'=>'hidden','validation'=>'integer','width'=>'col-sm-10','value'=>'0'];
			# END FORM DO NOT REMOVE THIS LINE

			# OLD START FORM
			//$this->form = [];
			//$this->form[] = ['label'=>'Compañia','name'=>'companias_id','type'=>'select2','validation'=>'required|integer|min:0','width'=>'col-sm-10','datatable'=>'companias,nombre'];
			//$this->form[] = ['label'=>'Nombre','name'=>'nombre','type'=>'text','validation'=>'required|min:1|max:50','width'=>'col-sm-10'];
			//$this->form[] = ['label'=>'Abreviación','name'=>'abreviacion','type'=>'text','validation'=>'required|min:1|max:20','width'=>'col-sm-10'];
			//$this->form[] = ['label'=>'Prima Mínima','name'=>'primaminima','type'=>'number','validation'=>'required','width'=>'col-sm-10'];
			//$this->form[] = ['label'=>'GPS Tope','name'=>'gpsmontotope','type'=>'money','validation'=>'required','width'=>'col-sm-9','table'=>'deducibles','foreign_key'=>'productos_id'];
			//$this->form[] = ['label'=>'% Comisión','name'=>'porcentajecomision','type'=>'number','validation'=>'required','width'=>'col-sm-9','value'=>'0','style'=>(CRUDBooster::isSuperadmin())?'':'display:none'];
			//$this->form[] = ['label'=>'Contado','name'=>'is_contado','type'=>'radio','validation'=>'required|integer','width'=>'col-sm-10','dataenum'=>'1|Si;0|No','value'=>'0'];
			//$this->form[] = ['label'=>'Cuatro Cuotas','name'=>'is_cuatrocuotas','type'=>'radio','validation'=>'required|integer','width'=>'col-sm-10','dataenum'=>'1|Si;0|No','value'=>'0'];
			//$this->form[] = ['label'=>'Cinco Cuotas','name'=>'is_cincocuotas','type'=>'radio','validation'=>'required|integer','width'=>'col-sm-10','dataenum'=>'1|Si;0|No','value'=>'0'];
			//$this->form[] = ['label'=>'Seis Cuotas','name'=>'is_seiscuotas','type'=>'radio','validation'=>'required|integer','width'=>'col-sm-10','dataenum'=>'1|Si;0|No','value'=>'0'];
			//$this->form[] = ['label'=>'Diez Cuotas','name'=>'is_diezcuotas','type'=>'radio','validation'=>'required|integer','width'=>'col-sm-10','dataenum'=>'1|Si;0|No','value'=>'0'];
			//
			////			$columns[] = ['label'=>'Descripción','name'=>'descripcion','type'=>'text','required'=>true];
			////			$this->form[] = ['label'=>'Deducibles','name'=>'deducibles','type'=>'child','columns'=>$columns,'table'=>'deducibles','foreign_key'=>'productos_id'];
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
        $this->sub_module[] = ['label'=>'Modelos','path'=>'modelos_productos','parent_columns'=>'nombre,abreviacion','foreign_key'=>'productos_id','button_color'=>'success','button_icon'=>'fa fa-car'];
        $this->sub_module[] = ['label'=>'Tasas','path'=>'tasas','parent_columns'=>'nombre,abreviacion','foreign_key'=>'productos_id','button_color'=>'success','button_icon'=>'fa fa-bars'];
        $this->sub_module[] = ['label'=>'Conceptos','path'=>'deducibles_productos','parent_columns'=>'nombre','foreign_key'=>'productos_id','button_color'=>'success','button_icon'=>'fa fa-check'];
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
        $this->pre_index_html = null;



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
//        if($column_index==7 || $column_index==8 || $column_index==9 || $column_index==10){
//            if($column_value == 1) {
//                $column_value = 'Si';
//            }else{
//                $column_value = 'No';
//            }
//        }
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
        // Para evitar eliminar el producto diamante de mn
//            if ($id == 24) {
//                $to = CRUDBooster::mainpath('');
//                $message = "Este producto no puede ser eliminado, por tener plantilla y datos dependientes";
//                $type = "warning";
//                CRUDBooster::redirect($to,$message,$type);
//            }

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