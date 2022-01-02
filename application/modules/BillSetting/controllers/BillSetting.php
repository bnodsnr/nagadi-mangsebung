<?php
/**
 * Created by Binod Sunar.
 * User: root
 */
class BillSetting extends MX_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("CommonModel");
        $this->load->model('BillSettingModel');
        $this->module_code = 'BILL-SETTING';
        if(!$this->authlibrary->IsLoggedIn()) {
            $this->session->set_userdata('return_url', current_url());
            redirect('Login','location');
        }
    }

    /*
        *This function list all the land minimun rate
        @param 
        return array of all land_minimum rate

     */
    public function Index()
    {
        if($this->authlibrary->HasModulePermission($this->module_code, "VIEW")){
            $data['page'] = 'list_all';
            $data['fiscal_year'] = $this->CommonModel->getData('fiscal_year','DESC');
            $data['bill_details'] = $this->BillSettingModel->getBillData();
            $this->load->view('main', $data);
        } else {
            $this->session->set_flashdata('MSG_ACCESS','तपाईंको अनुमति अस्वीकृत गरिएको छ');
            redirect('Dashboard');
        }
    }

    public function add() {
        if($this->authlibrary->HasModulePermission($this->module_code, "ADD")){
            $data['page'] = 'add_new_details';
            $data['fiscal_year'] = $this->CommonModel->getData('fiscal_year','DESC');
            $data['user']        = $this->BillSettingModel->getUser();
            $this->load->view('main', $data);
        }else{
            $this->session->set_flashdata('MSG_ACCESS','तपाईंको अनुमति अस्वीकृत गरिएको छ');
            redirect('Dashboard');
        }
    }

    public function saveBillSetting() {
        if($this->input->post('Submit')) {
            $user_id = $this->input->post('user_id');
            $bill_type = $this->input->post('bill_type');
            $fiscal_year = get_current_fiscal_year();
            $bill_from = $this->input->post('bill_from');
            $bill_to = $this->input->post('bill_to');
            // $check_bill = check_unique_bill_no($user_id,$bill_type, $fiscal_year);
            // if($check_bill == 1) {
            //     $this->session->set_flashdata('MSG_ALERT','Bill no is already given to user');
            //     redirect('BillSetting/add');
            // }
            $check_bill_no_exits = check_bill_no_exits($bill_type,$bill_from,$bill_to, $fiscal_year);
            if($check_bill_no_exits == 1) {
                $this->session->set_flashdata('MSG_ALERT','Duplicate Bill');
                redirect('BillSetting/add');
            }
            $post_data = array(
                'user_id'     => $this->input->post('user_id'),
                'bill_type'     => $this->input->post('bill_type'),
                'bill_from'   => $this->input->post('bill_from'),
                'bill_to'      => $this->input->post('bill_to'),
                'fiscal_year'   => $this->input->post('fiscal_year'),
                'added_by'      => $this->session->userdata('PRJ_USER_ID'),
                'added_on'      => date('Y-m-d h:i:s')
            );
          
            $result = $this->CommonModel->insertData('settings_bill_setup', $post_data);
            if($result) {
                $this->session->set_flashdata('MSG_SUCCESS', "सफलतापूर्वक अपडेट गरियो");
                redirect('BillSetting');
            }
        }
    }
    
    
    /**
        * This function delete data the id.
        * check proper id is in format of not.
        * @param $id int pk
        * @return json.
     */
    public function delete() {
        if($this->input->is_ajax_request()) {
            $id = $this->input->post('id');
            $result = $this->CommonModel->remove($id,'settings_bill_setup');
            if($result) {
                $response = array(
                    'status'      => 'success',
                    'data'         => "सफलतापूर्वक हटाइयो",
                    'message'     => 'success'
                );
                header("Content-type: application/json");
                echo json_encode($response);
                exit;
            } else {
                $response = array(
                    'status'      => 'error',
                    'data'         => "Oops something goes worng!!! Please try again",
                    'message'     => 'success'
                );
                header("Content-type: application/json");
                echo json_encode($response);
                exit;
            }
        } else {
            exit('no direct script allowed!!!');
        }
    }

   
}
