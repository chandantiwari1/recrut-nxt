<?php
class Home extends CI_controller {

    public function index() {

        $this->load->model('Common_model');
        $users = $this->Common_model->getUsers();
        $data = [];
        $data['users'] = $users;
        $this->load->view('home',$data);
    }

    /* This method will show a create form */
    public function create() {

        $this->load->model('Common_model');

        $countries = $this->Common_model->getCountries();

        $data = [];
        $data['countries'] = $countries;
        $this->load->view('create',$data);
    }

    /* This method will show a edit form */

    public function getStates(){
        $country_id = $this->input->post('country_id');
        $this->load->model('Common_model');
        $states = $this->Common_model->getStatesOfACountry($country_id);

        $data = [];
        $data['states'] = $states;
        $statesString = $this->load->view('states-select',$data,true); // This view will not load -- it will return as string  
        
        $response['states'] = $statesString;
        echo json_encode($response);
    }


     public function getCities(){
        $state_id = $this->input->post('state_id');
        $this->load->model('Common_model');
        $cities = $this->Common_model->getCitiesOfAState($state_id);

        $data = [];
        $data['cities'] = $cities;
        $citiesString = $this->load->view('cities-select',$data,true); // This view will not load -- it will return as string  
        
        $response['cities'] = $citiesString;
        echo json_encode($response);
    }


    public function saveUser() {
        $this->load->model('Common_model');

        $this->load->library('form_validation');
        $response = [];

        $this->form_validation->set_error_delimiters('','');
        $this->form_validation->set_rules('name','Name','required');
        $this->form_validation->set_rules('total_sales','Total_sales','required');
        $this->form_validation->set_rules('country','Country','required');
        $this->form_validation->set_rules('state','State','required');
        $this->form_validation->set_rules('city','City','required');
        $this->form_validation->set_rules('invoice','Invoice','required');
        $this->form_validation->set_rules('invoice_date','Invoice_date','required');
        $this->form_validation->set_rules('date','Date','required');
        if ($this->form_validation->run() == true) {
            // We will insert a record here
            $formData = [];
            $formData['name'] = $this->input->post('name');
            $formData['total_sales'] = $this->input->post('total_sales');
            $formData['country'] = $this->input->post('country');
            $formData['state'] = $this->input->post('state');
            $formData['city'] = $this->input->post('city');
            $formData['invoice'] = $this->input->post('invoice');
            $formData['customer_image'] = $this->input->post('customer_image');
            $formData['date'] = $this->input->post('date');
            $this->Common_model->add($formData); // Here we will insert a record
            $response['status'] = 1;
            $this->session->set_flashdata('success','User added successfully.');

        } else {

            // Here we will return error
            $response['name'] = form_error('name');
            $response['total_sales'] = form_error('total_sales');
            $response['country'] = form_error('country');
            $response['state'] = form_error('state');
            $response['city'] = form_error('city');
            $response['invoice'] = form_error('invoice');
            $response['customer_image'] = form_error('customer_image');
            $response['date'] = form_error('date');
            $response['status'] = 0;
        }

        echo json_encode($response);

        /*$this->Common_model->add();
        print_r($_POST);*/
    }


    
}
?>