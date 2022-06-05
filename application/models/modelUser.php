<?php
Class modelUser extends CI_Model{


    public function selectuser($username){
        $user = $this->db->get_where('user',['username'=>$username],['password' => $password])->row_array();
        return $user;
    }

}
?>