<?php

class SearchDetails extends MX_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("CommonModel");
        $this->load->model("SearchModel");
        $this->module_code = 'SEARCH-DETAILS';
        if(!$this->authlibrary->IsLoggedIn()) {
            $this->session->set_userdata('return_url', current_url());
            redirect('Login','location');
        }
    }

    /**
        * This function list all the land minimun rate
        * @param 
        * @return void

     */
    public function Index()
    {
        if($this->authlibrary->HasModulePermission($this->module_code, "VIEW")){
            $data['page'] = 'search';
            $data['fiscal_year'] = $this->CommonModel->getData('fiscal_year','DESC');
            $data['land_area_type'] = $this->CommonModel->getData('settings_land_area_type','DESC');
            $this->load->view('main', $data);
        } else {
            $this->session->set_flashdata('MSG_ACCESS','तपाईंको अनुमति अस्वीकृत गरिएको छ');
            redirect('Dashboard');
        }
    }

    public function searchLandDetails() {
        if($this->input->is_ajax_request()) {
            $kitta_no = $this->input->post('search');
            $data['kitta_no'] = $kitta_no;
            $data['details'] = $this->SearchModel->getLandDetails($kitta_no);
            $data_view = $this->load->view('ajax_land_view', $data, true);
            $response = array(
                'status'            => 'success',
                'data'              => $data_view
            );
            header("Content-type: application/json");
            echo json_encode($response);
            exit;
        } else {
            exit('No direct script access allowed');
        }
    }
}