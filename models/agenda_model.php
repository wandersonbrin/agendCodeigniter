<?php
setlocale( LC_TIME, 'pt_BR', 'pt_BR.utf-8', 'pt_BR.utf-8', 'portuguese' );
date_default_timezone_set( "America/Sao_paulo" );
class Agenda_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }
     function get($table,$fields,$where){
        
        $this->db->select($fields);
        $this->db->from($table);
        if($where){
            $this->db->where($where);
        }
        
       return $this->db->get()->result();
    }

    function add($table,$data){
        $data['filial_id'] = $this->session->userdata('filial_id');
        $this->db->insert($table, $data);         
        if ($this->db->affected_rows() == '1')
		{
			return TRUE;
		}
		
		return FALSE;       
    }
    	public function getAgendaHrData($where){
          // $this->db->from('agenda');
        $this->db->where($where);
        $this->db->limit(1);
        return $this->db->get('agenda')->row();
       //return $this->db->get()->result();
    }
    
    public function  getAgendaEnc($where){
        $this->db->from('agenda');
        $this->db->where($where);
        return $this->db->get()->result();
    }
     function getAgById($id){
        //$this->db->from('agenda');
        $this->db->where('idAgenda',$id);
        $this->db->limit(1);
       return $this->db->get('agenda')->row();
    }
    function getById($id){
        $this->db->from('clientes');
        $this->db->where('idClientes',$id);
        $this->db->limit(1);
       return $this->db->get()->result();
    }
    function edit($table,$data,$fieldID,$ID){
        $this->db->where($fieldID,$ID);
        $this->db->update($table, $data);

        if ($this->db->affected_rows() >= 0)
		{
			return TRUE;
		}
		
		return FALSE;       
    }
    
    function delete($table,$fieldID,$ID){
        $this->db->where($fieldID,$ID);
        $this->db->delete($table);
        if ($this->db->affected_rows() == '1')
		{
			return TRUE;
		}
		
		return FALSE;        
    }

    function count($table) {
        return $this->db->count_all($table);
    }
    
}