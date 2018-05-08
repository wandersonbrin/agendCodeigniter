<?php
class Agenda extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        if ((!$this->session->userdata('session_id')) || (!$this->session->userdata('logado'))) {
            redirect('mapos/login');
        }
        $this->load->helper(array('form', 'codegen_helper'));
        $this->load->model('agenda_model', '', TRUE);
        $this->load->model('mapos_model', '', TRUE);
        $this->load->model('clientes_model', '', TRUE);
        $this->load->model('usuarios_model', '', TRUE);
        $this->data['menuAgenda'] = 'agenda';
        $this->load->model('setor_model', '', TRUE);
        $this->load->model('permissoes_model');
        $this->load->model('filial_model', '', TRUE);
        $this->data['menuUsuarios'] = 'Usuários';
        $this->data['menuConfiguracoes'] = 'Configurações';
        
           
       
      
        
       
    }

    function index()
    {
        $this->gerenciar();
    }
  
 function gerenciar()
    {
         if (!$this->permission->checkPermission($this->session->userdata('permissao'), 'vAgenda')) {
            $this->session->set_flashdata('error', 'Você não tem permissão para visualizar clientes.');
            redirect(base_url());
        }
        
     if($_GET['data']==true){
         
        $Data = $_GET['data'];
     } else{
        $Data = date('Y-m-d');
        
     }
    
   
        $this-> data['data'] =  $Data;
        if($this->session->userdata('permissao')==1 && $this->permission->checkPermission($this->session->userdata('permissao'), 'eAgenda')){
            if($_GET['user']==true){
            $this->data['userAgendas'] = $this->usuarios_model->getUserAgenda($_GET['user']-1234);
            }
        }elseif($this->session->userdata('permissao')==2){
             $this->data['userAgendas'] = $this->usuarios_model->getUserAgenda($this->session->userdata('id'));
        }
        $userAgendas = $this->data['userAgendas'];
        //print_r($userAgendas);
        if( utf8_encode(strftime('%a', strtotime($Data)))== $userAgendas->domingo){
	        //hora inicial
		    $horaInicial = new DateTime( $userAgendas->domHrIni  );
			//hora final
			$horaFinal = new DateTime( $userAgendas->domHrTer );
			$t =$userAgendas->domTempoAtendimento;
		    $tempo = "PT" . $userAgendas->domTempoAtendimento. "M";
		 	$h = $horaInicial->format( 'H:i' );
        }
        if( utf8_encode(strftime('%a', strtotime($Data)))== $userAgendas->segunda){
	        //hora inicial
			$horaInicial = new DateTime( $userAgendas->segHrIni  );
			//hora final
			$horaFinal = new DateTime( $userAgendas->segHrTer );
			$t =$userAgendas->segTempoAtendimento;
		    $tempo = "PT" . $userAgendas->segTempoAtendimento. "M";
		 	$h = $horaInicial->format( 'H:i' );
        }
        if( utf8_encode(strftime('%a', strtotime($Data)))== $userAgendas->terca){
	        //hora inicial
			$horaInicial = new DateTime( $userAgendas->terHrIni  );
			//hora final
			$horaFinal = new DateTime( $userAgendas->terHrTer );
			$t =$userAgendas->terTempoAtendimento;
		    $tempo = "PT" . $userAgendas->terTempoAtendimento. "M";
		 	$h = $horaInicial->format( 'H:i' );
        }
        if( utf8_encode(strftime('%a', strtotime($Data)))== $userAgendas->quarta){
	        //hora inicial
			$horaInicial = new DateTime( $userAgendas->quaHrIni  );
			//hora final
			$horaFinal = new DateTime( $userAgendas->quaHrTer );
			$t =$userAgendas->quaTempoAtendimento;
		   $tempo = "PT" . $userAgendas->quaTempoAtendimento. "M";
		 	$h = $horaInicial->format( 'H:i' );
        }
         if( utf8_encode(strftime('%a', strtotime($Data)))== $userAgendas->quinta){ 
	        //hora inicial
			$horaInicial = new DateTime( $userAgendas->quiHrIni  );
			//hora final
			$horaFinal = new DateTime( $userAgendas->quiHrTer );
			$t =$userAgendas->quiTempoAtendimento;
		    $tempo = "PT" . $userAgendas->quiTempoAtendimento. "M";
		 	$h = $horaInicial->format( 'H:i' );
        }
        if( utf8_encode(strftime('%a', strtotime($Data)))== $userAgendas->sexta){ 
	        //hora inicial
			$horaInicial = new DateTime( $userAgendas->sexHrIni  );
			//hora final
			$horaFinal = new DateTime( $userAgendas->sexHrTer );
			$t =$userAgendas->sexTempoAtendimento;
		    $tempo = "PT" . $userAgendas->sexTempoAtendimento. "M";
		 	$h = $horaInicial->format( 'H:i' );
        }
        if( utf8_encode(strftime('%a', strtotime($Data)))== $userAgendas->sabado){ 
	        //hora inicial
			$horaInicial = new DateTime( $userAgendas->sabHrIni  );
			//hora final
			$horaFinal = new DateTime( $userAgendas->sabHrTer );
			$t =$userAgendas->sabTempoAtendimento;
		    $tempo = "PT" . $userAgendas->sabTempoAtendimento. "M";
		 	$h = $horaInicial->format( 'H:i' );
        }
        if($horaInicial!=0){ 
            
            $where = 'filial_id = '. $this->session->userdata('filial_id') .'
    					AND dataEv = "' . $Data . '"
    					AND HrIni = "'.$h.'"';   
    					
    	    $rest = $h;	
    		$rest2 = substr( $rest, -1 );
    		$rest3 = $rest2 + 1;
    		$temp = substr( $rest, 0, -1 ) . $rest3;
    		if ( $t >= 60 ) {
    			$temp2 = substr( $rest, 0, -2 ) . 59;
    		} else {
    
    			if ( $t <= 10 ) {
    				$tt = $p[ 'tempoAtendimento' ] - 1;
    				$temp2 = substr( $rest, 0, -1 ) . $tt;
    			} else {
    				$tt = $t- 1;
    				$temp2 = substr( $rest, 0, -2 ) . $tt;
    			}
    		}
            $where1 = 'filial_id = '. $this->session->userdata('filial_id') .'
    						AND dataEv = "' . $Data . '"
    						AND HrIni between "'.$temp.'" and "'.$temp2.'" ORDER BY HrIni asc';
    		$temp3= substr( $rest, 0, -2 ) . $t;
    	
    		 $where2 = 'filial_id = '. $this->session->userdata('filial_id') .'
    						AND dataEv = "' . $Data . '"
    						AND idUsuario = "' . $this->session->userdata('id') . '"
    						AND HrIni between "'.$temp3.'" and "23:59" ORDER BY HrIni asc';	
    		$agend = array();
    		$agend5 = array();
    	
    		while ( $horaInicial->add( new DateInterval( $tempo ) ) < $horaFinal ) {
    		      $where3 = 'filial_id = '. $this->session->userdata('filial_id') .'
    					AND dataEv = "' . $Data . '"
    					AND HrIni = "'. $horaInicial->format( 'H:i' ).'"';  
    					
    		   if($this->agenda_model->getAgendaHrData($where3)){
    		        $agend[]=  array('idAgenda'=> $this->agenda_model->getAgendaHrData($where3)->idAgenda,
    		                    'idPac'=> $this->agenda_model->getAgendaHrData($where3)->idPac,
    		                    'idUsuario'=> $this->agenda_model->getAgendaHrData($where3)->idUsuario,
                		        'HrIni'=> $this->agenda_model->getAgendaHrData($where3)->HrIni,
                		        'descri'=> $this->agenda_model->getAgendaHrData($where3)->descri,
                		        'cliente'=> $this->agenda_model->getAgendaHrData($where3)->cliente,
                		        'convenio'=> $this->agenda_model->getAgendaHrData($where3)->convenio,
                		        'email'=> $this->agenda_model->getAgendaHrData($where3)->email,
                		        'tel1'=> $this->agenda_model->getAgendaHrData($where3)->tel1,
                		        'tel2'=> $this->agenda_model->getAgendaHrData($where3)->tel2);
                		        
                                $hora = $horaInicial->format( 'H:i' );
                                $t1=$t-1;
                		        $rest2 = substr( $hora, -1 );
                                $rest3 = $rest2 + 1;
                            	$temp = substr( $hora, 0, -1 ) . $rest3;
                                $temp2 = date('H:i', strtotime('+'.$t1.' minute', strtotime($hora)));
                                
                            	$where4 = 'filial_id = '. $this->session->userdata('filial_id') .'
                    						AND dataEv = "' . $Data . '"
                    						AND HrIni between "'.$temp.'" and "'.$temp2.'" ORDER BY HrIni asc';
                                		           
                		         if($this->agenda_model->getAgendaEnc($where4)){
                    		        $agend5[]= $this->agenda_model->getAgendaEnc($where4);
                                       
                                		        
                    		   }
                                       
                		       
    		   }else{
    		        $agend[]= array('HrIni'=> $horaInicial->format( 'H:i' )); 
    		   }
    		}
    
    						
            $this->data['agenda']       = $this->agenda_model->getAgendaHrData($where);
            $this->data['agenda1']      = $this->agenda_model->getAgendaEnc($where1);
            $this->data['agenda2']      = $this->agenda_model->getAgendaEnc($where2);
         }
         if($_GET['idAg']==true){
             $this->data['agendaInfo']       = $this->agenda_model->getAgById($_GET['idAg']);
         }
        $this->data['clientes']     = $this->clientes_model->getAll();
        $this->data['usuarios']     = $this->usuarios_model->getMedicos();
        $this->data['tipoUser']     = $this->mapos_model->getById($this->session->userdata('id'));
        $this->data['test']         =$agend;
        $this->data['agendaEnc']    =$agend5;
        $this->data['filial']       = $this->session->userdata('filial_id');
        $this->data['view']         = 'agenda/agenda';
        $this->load->view('tema/topo', $this->data);
    }  
 function getDetalhes()
    {
     
      $request = $_POST['request'];
        if($request == 1){
            $search = $_POST['search'];
            $where =  "nomeCliente LIKE '%" . $search ."%' ";
            $re = $this->agenda_model->get('clientes', 'idClientes,nomeCliente', $where);
            $response= array();
            foreach ($re as $k){
                 $response[] = array("value"=>$k->idClientes,"label"=>$k->nomeCliente);
            }
            // encoding array to json format
            echo json_encode($response);
            exit;
        }
       
        print_r($response);
        // Get details
        if($request == 2){
        	$userid = $_POST['userid'];
        	$re2 =$this->agenda_model->getById($userid); 
        	$users_arr = array();
        	foreach ($re2 as $k1){
        		$userid = $k1->idClientes;
                $fullname = $k1->nomeCliente;
                $email = $k1->email;
                $tel1 = $k1->telefone;
                $tel2 = $k1->celular;

        $users_arr[] = array("id" => $userid, "name" => $fullname,"email" => $email, "tel1" =>$tel1, "tel2" =>$tel2);
        		
            }
            // encoding array to json format
            echo json_encode($users_arr);
            exit;
        }
      
    
      
    }
        public function adicionarAgenda()
    {
         if (!$this->permission->checkPermission($this->session->userdata('permissao'), 'aAgenda')) {
            $this->session->set_flashdata('error', 'Você não tem permissão para visualizar clientes.');
            redirect(base_url());
        }

        $idAgenda           = $this->input->post('idAgenda');
        $idPac              = $this->input->post('idPac');
        $idUsuario          = $this->input->post('idUsuario');
        $dataEv             = $this->input->post('dataEv');
        $HrIni              = $this->input->post('HrIni');
        $descri             = $this->input->post('descri');
        $cliente            = $this->input->post('cliente');
        $convenio           = $this->input->post('convenio');
        $email              = $this->input->post('email');
        $cartao             = $this->input->post('cartao');
        $tel1               = $this->input->post('tel1');
        $tel2               = $this->input->post('tel2');

        $data = array(
            'idUsuario'         => $idUsuario,
            'idPac'             => $idPac,
            'dataEv'            => $dataEv,
            'HrIni'             => $HrIni,
            'descri'            => $descri,
            'cliente'           => $cliente,
            'convenio'          => $convenio,
            'email'             => $email,
            'cartao'            => $cartao,
            'tel1'              => $tel1,
            'tel2'              => $tel2
        );

        if ($idAgenda) {
            if ($this->agenda_model->edit('agenda', $data, 'idAgenda', $idAgenda) == true) {
                echo json_encode(array('result' => true));
            } else {
                echo json_encode(array('result' => false));
            }
        } else {
            if ($this->agenda_model->add('agenda', $data) == true) {
                echo json_encode(array('result' => true));
            } else {
                echo json_encode(array('result' => false));
            }
        }
    }
       

}


?>