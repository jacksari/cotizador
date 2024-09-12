<?php namespace App\Http\Controllers;

		use Session;
		use Request;
		use DB;
		use CRUDBooster;
        use App\Http\Controllers\HomeController as Home;

		class ApiCotizacionController extends \crocodicstudio\crudbooster\controllers\ApiController {

		    function __construct() {    
				$this->table       = "cotizaciones";        
				$this->permalink   = "cotizacion";    
				$this->method_type = "post";    
		    }
		

		    public function hook_before(&$postdata) {
		        //This method will be execute before run the main process

                if ($postdata['companias_id'] == 0) {
                    $postdata['companias_id'] = null;
                }

                if ($postdata['pacifico_prima'] == "0") {
                    $postdata['pacifico_prima'] = null;
                }
		    }

		    public function hook_query(&$query) {
		        //This method is to customize the sql query

		    }

		    public function hook_after($postdata,&$result) {
		        //This method will be execute after run the main process

                if ($result['api_status']==1) {

                    AdminCotizacionesController::saveQuotationDetail($result['data']['id']);

                    $result['data']['pdf'] = Home::createPDF($result['data']['id']);

                }

		    }

		}