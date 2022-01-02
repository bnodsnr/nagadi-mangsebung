<?php
/**
* created by php strom
  Name:Binod Sunar
  Date:2018/02/01:11:14 AM.
*/
class Search extends MX_Controller
{	
	public function __construct()
	{
		parent:: __construct();
      $this->module_code = 'REPORT';
      $this->load->model('CommonModel');
      $this->load->model('MonthlyReportmodel');
      if(!$this->authlibrary->IsLoggedIn()){
        $this->session->set_userdata('return_url', current_url());
        redirect('Login');
      }
		  $this->container = 'main';
      $this->today = convertdate(date('Y-m-d'));
      $this->current_month = get_current_month();
	}

	public function Index()
	{
    if ($this->authlibrary->HasModulePermission('DAILY-REPORT', "VIEW")) {
      $data['main_topic']         = $this->CommonModel->getData('main_topic', 'ASC');
      $data['wards']              = $this->CommonModel->getData('wardwise_address','ASC');
      $data['session_ward']       = $this->session->userdata('PRJ_USER_WARD');
      $data['current_month']      = $this->current_month;
      $data['user']               = $this->CommonModel->getData('users');
      $data['sampati_kar_bhumi']  = $this->MonthlyReportmodel->MonthlySampatiKarCollection($this->today, $this->session->userdata('PRJ_USER_WARD'));
      $data['page']               = 'search';
      $this->load->view('main',
       $data);
    }
	}

  /**
     * This function on ajax call get all daily report.
     * @param varchar $date, int $ward
     * @return json.
    */
    public function AdminSearchReport() {
       if($this->input->is_ajax_request()) {
        $ward_no                    = $this->input->post('search_added_ward');
        $from_date                  = $this->input->post('from_date');
        $to_date                    = $this->input->post('to_date');
        $user                       = $this->input->post('user_id');
        $data['nagadi_details']     = $this->MonthlyReportmodel->getNagadiSearchDetails( $from_date,$to_date, $ward_no, $user);
       
        $data['cancel_amount']  = $this->MonthlyReportmodel->getCancelAmountDetailsBySearch( $from_date,$to_date, $ward_no, $user);

        $data['sampatikar']         = $this->MonthlyReportmodel->getSearchSampatiKarDetails( $from_date,$to_date, $ward_no, $user);
        $data['sampati_cancel_amount']         = $this->MonthlyReportmodel->getCancelSampatikarAmountDetailsBySearch( $from_date,$to_date, $ward_no, $user);
        $data_view                  = $this->load->view('ajax_search_view', $data, true);
        $response                   = array(
          'status'                  => 'success',
          'data'                    => $data_view
        );
        header("Content-type: application/json");
        echo json_encode($response);
        exit;
      }
    }

    public function GetUser() {
      $ward_no = $this->input->post('ward_no');
      $user = $this->CommonModel->getAllDataByField('users','ward', $ward_no);
      //pp($user);
      if(!empty($user)){

        $option = '';
       
        $option .= '<option value="">छान्नुहोस्</option>';
        foreach ($user as $key => $value) :
          $option .= '<option value = '.$value["userid"].'>'.$value["name"].'</option>';
        endforeach;
      
        $response = array(
          'status'      => 'success',
          'option' => $option,
        );
        header("Content-type: application/json");
        echo json_encode($response);
        exit;
      }
    }
}//end of class