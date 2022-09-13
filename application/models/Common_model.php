<?php
class Common_model extends CI_model{

    public function getCountries(){
        $countries = $this->db->get('countries')->result_array();
        return $countries;
    }

    public function getStatesOfACountry($country_id){
        $this->db->where('country_id',$country_id);
        $states = $this->db->get('states')->result_array();
        //echo $this->db->last_query();
        return $states;
    }


    public function getCitiesOfAState($state_id){
        $this->db->where('state_id',$state_id);
        $cities = $this->db->get('cities')->result_array();
        //echo $this->db->last_query();
        return $cities;
    }

    public function add($formData) {
        echo $formData;
        $this->db->insert('users',$formData);

    }

    public function update($id, $formData) {
        $this->db->where('id',$id);
        $this->db->update('users',$formData);
    }
        

    public function getUsers() {
        $users = $this->db->get('users')->result_array();
        return $users;
    }

    public function getUser($id) {
        $this->db->where('id',$id);
        $user = $this->db->get('users')->row_array();
        return $user;
    }

}
?>