<?php namespace App\Http\Controllers;

use Session;
use Request;
use DB;
use CRUDbooster;

class AdminCmsUsersController extends \crocodicstudio\crudbooster\controllers\CBController {


	public function cbInit() {
		# START CONFIGURATION DO NOT REMOVE THIS LINE
		$this->table               = 'cms_users';
		$this->primary_key         = 'id';
		$this->title_field         = "name";
		$this->button_action_style = 'button_icon';	
		$this->button_import 	   = FALSE;	
		$this->button_export 	   = FALSE;	
		# END CONFIGURATION DO NOT REMOVE THIS LINE

        # START COLUMNS DO NOT REMOVE THIS LINE
        $this->col = [];
        $this->col[] = ["label"=>"Name","name"=>"name"];
        $this->col[] = ["label"=>"Email","name"=>"email"];
        $this->col[] = ["label"=>"Privilege","name"=>"id_cms_privileges","join"=>"cms_privileges,name"];
        $this->col[] = ["label"=>"Dealer-Tienda","name"=>"subagentes_id","join"=>"subagentes,nombre"];
        $this->col[] = ["label"=>"Photo","name"=>"photo","image"=>true];
        # END COLUMNS DO NOT REMOVE THIS LINE

        # START FORM DO NOT REMOVE THIS LINE
        $this->form = [];
        $this->form[] = ['label'=>'Name','name'=>'name','type'=>'text','validation'=>'required|alpha_spaces|min:3','width'=>'col-sm-10'];
        //$this->form[] = ['label'=>'Email','name'=>'email','type'=>'email','validation'=>'required|email|unique:cms_users,email,4','width'=>'col-sm-10'];
        $this->form[] = ['label'=>'Email','name'=>'email','type'=>'email','validation'=>'required|email|unique:cms_users,email,'.CRUDBooster::getCurrentId(),'width'=>'col-sm-10'];
        $this->form[] = ['label'=>'Photo','name'=>'photo','type'=>'upload','validation'=>'image|max:1000','width'=>'col-sm-10','help'=>'Recommended resolution is 200x200px'];
        $this->form[] = ['label'=>'Privilege','name'=>'id_cms_privileges','type'=>'select','width'=>'col-sm-10','datatable'=>'cms_privileges,name','datatable_where'=>(CRUDBooster::myPrivilegeName() == "Administrador")?'is_superadmin=0':((CRUDBooster::myPrivilegeName() == "Administrador Dealer")?'id>2':'')];
        $this->form[] = ['label'=>'Dealer-Tienda','name'=>'subagentes_id','type'=>'select','width'=>'col-sm-10','datatable'=>'subagentes,nombre','datatable_where'=>(CRUDBooster::myPrivilegeName() == "Administrador Dealer")?'id='.self::mySubAgente():''];
        $this->form[] = ['label'=>'Plan','name'=>'planes_id','type'=>'select','width'=>'col-sm-10','datatable'=>'planes,nombre'];
        $this->form[] = ['label'=>'Telefono','name'=>'telefono','type'=>'text','validation'=>'max:50','width'=>'col-sm-4'];
        $this->form[] = ['label'=>'Password','name'=>'password','type'=>'password','width'=>'col-sm-10','help'=>'Please leave empty if not change'];
        # END FORM DO NOT REMOVE THIS LINE

        # OLD START FORM
        //$this->form = [];
        //$this->form[] = ['label'=>'Name','name'=>'name','type'=>'text','validation'=>'required|alpha_spaces|min:3','width'=>'col-sm-10'];
        //$this->form[] = ['label'=>'Email','name'=>'email','type'=>'email','validation'=>'required|email|unique:cms_users,email,4','width'=>'col-sm-10'];
        //$this->form[] = ['label'=>'Photo','name'=>'photo','type'=>'upload','validation'=>'required|image|max:1000','width'=>'col-sm-10','help'=>'Recommended resolution is 200x200px'];
        //$this->form[] = ['label'=>'Privilege','name'=>'id_cms_privileges','type'=>'select','width'=>'col-sm-10','datatable'=>'cms_privileges,name'];
        //$this->form[] = ['label'=>'Password','name'=>'password','type'=>'password','width'=>'col-sm-10','help'=>'Please leave empty if not change'];
        # OLD END FORM

        /*
	        | ----------------------------------------------------------------------
	        | Add javascript at body
	        | ----------------------------------------------------------------------
	        | javascript code in the variable
	        | $this->script_js = "function() { ... }";
	        |
	        */
        $this->script_js = NULL;

        $modulo = CRUDBooster::getCurrentMethod();
        $mySubAgenteId = self::mySubAgente();

        //if ($modulo == "getAdd" || $modulo == "getEdit"){
        if ($modulo == "getAdd" && CRUDBooster::myPrivilegeName() == "Administrador Dealer"){

            $urlapi = asset('getmodelo');

            $this->script_js = "
                    $(function() {
                        //$('#id_cms_privileges').prop('selectedIndex', 2);
                        $('#id_cms_privileges').val('3');
                        //$(\"#id_cms_privileges\").prop(\"disabled\", true);
                        $('#subagentes_id').val('$mySubAgenteId');
                        $(\"#subagentes_id\").prop(\"disabled\", true);
                        
                    })
                ";

        } else if ($modulo == "getEdit" && CRUDBooster::myPrivilegeName() == "Administrador Dealer"){

            $urlapi = asset('getmodelo');

            $this->script_js = "
                    $(function() {
                        //$(\"#id_cms_privileges\").prop(\"disabled\", true);
                        $(\"#subagentes_id\").prop(\"disabled\", true);
                        
                    })
                ";

        }


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
        if (CRUDBooster::myPrivilegeName() == "Administrador") {
            $query->where('cms_users.id_cms_privileges','>',1);
        } else if (CRUDBooster::myPrivilegeName() == "Administrador Dealer") {
            $query->where('cms_users.id_cms_privileges','>',2)->where('subagentes_id','=',self::mySubAgente());
        }

    }

	public function getProfile() {			

		$this->button_addmore = FALSE;
		$this->button_cancel  = FALSE;
		$this->button_show    = FALSE;			
		$this->button_add     = FALSE;
		$this->button_delete  = FALSE;	
		$this->hide_form 	  = ['id_cms_privileges','subagentes_id','planes_id'];

		$data['page_title'] = trans("crudbooster.label_button_profile");
		$data['row']        = CRUDBooster::first('cms_users',intval(CRUDBooster::myId()));

		$this->cbView('crudbooster::default.form',$data);				
	}

    public function mySubAgente() {

        $query = DB::table('cms_users')->where('id','=',CRUDBooster::myId())->first();

        return $query->subagentes_id;
    }
}