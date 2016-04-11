<?php

class Model_users extends CI_model {
    
    public function can_log_in(){
        
        $this->db->where('email', $this->input->post('email'));
        $this->db->where('password',md5( $this->input->post('password')));
        $query = $this->db->get('users');

        if ($query->num_rows() ==1) {
            return true; 
        } else {
            return false;
        }
    }
    
    public function add_temp_user($key) {
        
        $data = array (
            'email' => $this->input->post('email'),
            'password' => md5 ($this->input->post('password')),
            'key'=> $key 
        );
        
        $query = $this->db->insert('temp_users', $data);
        if ($query) {
            return true; 
        } else {
            return false ; 
        }
    }
    
    public function is_key_valid($key) {

	$this->db->where('key', $key) ; 
	$query = $this->db->get('temp_users') ; 
	
	if ($query->num_rows() ==1){
	
	return true ; 
	} else return false ; 
	}
	
    	public function add_user($key) { 
	
	$this->db->where('key', $key) ; 
	$temp_user = $this->db->get('temp_users') ; 
	
	if ($temp_user) {
	
		$row = $temp_user->row(); 
		
		$data = array (
			'email' => $row->email,
			'password' => $row->password 
			) ; 
			
			$did_add_user = $this->db->insert('users', $data) ; 
			
	}
	if ($did_add_user) {
		$this->db->where('key', $key) ; 
		$this->db->delete('temp_users') ; 
		return $data['email']; 
	} return false; 
	
	}
		public function insert_car(){
    
    $carid = $this->input->post('carid');
    $make = $this->input->post('make');
    $model = $this->input->post('model');
    $colour = $this->input->post('colour');
    $paintcode = $this->input->post('paintcode');
    $year = $this->input->post('year');
   

    
    $sql = "INSERT INTO Cars (carid,make,model,colour,paintcode,year)
    VALUES
    (
    ".$this->db->escape($carid).",
    ".$this->db->escape($make).",
    ".$this->db->escape($model).",
    ".$this->db->escape($colour).",
    ".$this->db->escape($paintcode).",
    ".$this->db->escape($year)."

    )";
    
    $result = $this->db->query($sql);
    if ($this->db->affected_rows()===1){
        return true;
    }else{
        echo "fail";
    }
}
public function display_all_data() {
	
	$query = $this->db
				->select('carid')
				->select('make')
				->from('Cars')
				->get();
				return $query->result(); 
				
}

public function fetch_all_data($carid) {
	
	$q = $this->db->from('Cars')
				->where(['carid'=>$carid])				
				->get();
				if($q->num_rows())
				return $q->row(); 
				

}
    public function car_update($Cars,$carid)
      {
            $this->db->where('carid',$carid);
            $this->db->update('Cars', $Cars);
          
      }
}
