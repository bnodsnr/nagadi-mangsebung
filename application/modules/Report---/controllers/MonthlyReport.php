<?php

/**

* created by php strom

  Name:Binod Sunar

  Date:2018/02/01:11:14 AM.

*/

class MonthlyReport extends MX_Controller
{	
	public function __construct()
	{
		parent:: __construct();
    $this->module_code = 'REPORT';
    $this->load->model('CommonModel');
    $this->load->model('MonthlyReportmodel');
    $this->load->model('Reportmodel');
    if(!$this->authlibrary->IsLoggedIn()){
      $this->session->set_userdata('return_url', current_url());
      redirect('Login');
    }
		$this->container = 'main';
    $this->today = convertdate(date('Y-m-d'));
    $this->current_month = get_current_month();
	}

  /** 
    This function get total monthly collection report.
  */
	public function Index()
	{
    if ($this->authlibrary->HasModulePermission('DAILY-REPORT', "VIEW")) {
      $data['main_topic']         = $this->CommonModel->getData('main_topic', 'ASC');
      $data['wards']              = $this->CommonModel->getData('wardwise_address','ASC', 'ward');
      $data['session_ward']       = $this->session->userdata('PRJ_USER_WARD');
      $data['current_month']      = $this->current_month;
      $data['sampati_kar_bhumi']  = $this->Reportmodel->MonthlySampatiKarCollection();
      $data['page']               = 'monthly/index';
      $this->load->view('main',$data);
    }
	}

  /**
      * On ajaxcall Search wardwise monthly report
      * @param string $_POST.
      * @return void
  */
  public function AdminMonthlyReport() {
    if($this->input->is_ajax_request()) {
      $date                       = $this->input->post('date');
      $ward                       = $this->input->post('ward');
      $detail_date                = empty( $date) ? $this->current_month : $date;
      $detail_ward                = empty($ward) ? $this->session->userdata('PRJ_USER_WARD') : $ward;
      $data['ward_no']            = $ward;
      $data['current_month']      = $detail_date;
      $data['main_topic']         = $this->CommonModel->getData('main_topic', 'ASC');
      $data['sampati_bhumi_kar']  = $this->Reportmodel->MonthlySampatiKarCollection($detail_date, $detail_ward);
      $data_view                  = $this->load->view('monthly/admin_monthly_report', $data, true);
      $response                   = array(
        'status'                  => 'success',
        'data'                    => $data_view
      );
      header("Content-type: application/json");
      echo json_encode($response);
      exit;
    }
  }

  /**
    * Nagadi Report By Topic
    * @param string $_POST['topic_id'].
    * @param string $_POST['date'].
    * @param string $_POST['ward'].
    * @return void
  */
  public function viewByTopic( $topic_id = NUll,$month = NULL , $ward = NULL) {
    if ($this->authlibrary->HasModulePermission('REPORT', "VIEW")) {
      $detail_date            = empty($month) ? $this->current_month : $month;
      $detail_ward            = $ward;
      $data['ward_no']        = $detail_ward;
      $data['date']           = $detail_date;
      $data['topic_id']       = $topic_id;
      $data['title']          = $this->CommonModel->getDataById('main_topic', $topic_id);
      $data['nagadi_details'] = $this->Reportmodel->getNagadiDetailsByTopic($topic_id,$detail_date, $detail_ward );
     $data['cancel_amount']  = $this->Reportmodel->getNagadiCancelAmountDetailsByMonth($topic_id,$detail_date, $detail_ward);
      $data['page']           = 'monthly/view_by_topic';
      $this->load->view('main', $data);
    }
  }

  /**
    * Nagadi print nagadi By Topic
    * @param string $_POST['topic_id'].
    * @param string $_POST['date'].
    * @param string $_POST['ward'].
    * @return void
  */
  public function printNagadiDetailsByTopic( $topic_id = NUll,$month = NULL , $ward = NULL) {
    if ($this->authlibrary->HasModulePermission('REPORT', "VIEW")) {
      $detail_date            = empty($month) ? $this->current_month : $month;
      $detail_ward            = $ward;
      $data['ward_no']        = $detail_ward;
      $data['date']           = $detail_date;
      $data['topic_id']       = $topic_id;
      $data['nagadi_details'] = $this->Reportmodel->getNagadiDetailsByTopic($topic_id,$detail_date, $detail_ward );
      $data['title']          = $this->CommonModel->getDataById('main_topic', $topic_id);
      $data['cancel_amount']  = $this->Reportmodel->getNagadiCancelAmountDetailsByMonth($topic_id,$detail_date, $detail_ward);
      $this->load->view('monthly/print_nagadi_detials_by_topic', $data);
    }
  }

  /**
    * sampati kar details
    * @param string $_POST['topic_id'].
    * @param string $_POST['date'].
    * @param string $_POST['ward'].
    * @return void
  */
  public function viewSampatiKarDetails( $month = NULL, $ward = NULL) {
    if ($this->authlibrary->HasModulePermission('REPORT', "VIEW")) {
      $detail_date                    = empty( $month ) ? $this->current_month : $month ;
      $detail_ward                    = empty($ward) ? $this->session->userdata('PRJ_USER_WARD') : $ward;
      $data['ward_no']                = $detail_ward;
      $data['date']                   = $detail_date;
      $data['sampati_bhumi_kar']      = $this->Reportmodel->getMonthlySampatiKarDetails($detail_date, $detail_ward);
      $data['sampati_cancel_amount']  = $this->Reportmodel->getCancelSampatikarAmountDetailsByMonth($detail_date, $detail_ward);
      $data['page'] = 'monthly/monthly_sampati_details';
      $this->load->view('main', $data);
    }
  }

  /**
    * sampati kar details
    * @param string $_POST['topic_id'].
    * @param string $_POST['date'].
    * @param string $_POST['ward'].
    * @return void
  */
  public function printSampatiKarDetails( $month = NULL, $ward = NULL) {
    if ($this->authlibrary->HasModulePermission('REPORT', "VIEW")) {
      $detail_date                    = empty( $month ) ? $this->current_month : $month ;
      $detail_ward                    = empty($ward) ? $this->session->userdata('PRJ_USER_WARD') : $ward;
      $data['ward_no']                = $detail_ward;
      $data['date']                   = $detail_date;
      $data['sampati_bhumi_kar']      = $this->MonthlyReportmodel->getMonthlySampatiKarDetails($detail_date, $detail_ward);
      $data['sampati_cancel_amount']  = $this->MonthlyReportmodel->getCancelSampatikarAmountDetailsByMonth($detail_date, $detail_ward);
      $this->load->view('monthly/print_sampati_details', $data);
    }
  }


  /**
    * sampati kar details
    * @param string $_POST['topic_id'].
    * @param string $_POST['date'].
    * @param string $_POST['ward'].
    * @return void
  */
  public function viewMonthlyCollectionDetails($month =NULL, $ward=NULL) {
    if ($this->authlibrary->HasModulePermission('REPORT', "VIEW")) {
      $month                          = $this->uri->segment(4);
      $ward                           = $this->uri->segment(5);
      $detail_date                    = empty( $month) ? $this->current_month : $month;
      $detail_ward                    = empty( $ward) ? '' : $ward;
      $data['ward_no']                = $detail_ward;
      $data['date']                   = $detail_date;
      $data['details']                = $this->Reportmodel->getAllMonthlyReportDetails($detail_date, $detail_ward);
      $data['sampati_bhumi_kar']      = $this->Reportmodel->getMonthlySampatiKarDetails($detail_date, $detail_ward);
      $data['cancel_amount']          = $this->Reportmodel->getCancelSampatikarAmountDetailsByMonth($detail_date, $detail_ward);
      $data['page']                   = 'monthly/monthly_collection_report';
      $this->load->view('main', $data);
    }
  }


 /**
   * This function show daily collection print details
   * @param varchar $date, int $ward
   * @return void.
  */
  public function printMonthlyCollection($date =NULL,$ward =NULL) {
    $date                       = $this->uri->segment(4);
    $ward                       = $this->uri->segment(5);
    $detail_date                = empty( $date) ? $this->current_month : $date;
    $detail_ward                = empty($ward) ? $this->session->userdata('PRJ_USER_WARD') : $ward;
    $data['ward_no']            = $ward;
    $data['current_month']      = $detail_date;
    $data['main_topic']         = $this->CommonModel->getData('main_topic', 'ASC');
    $data['sampati_bhumi_kar']  = $this->Reportmodel->MonthlySampatiKarCollection($detail_date, $detail_ward);
    $this->load->view('monthly/print_collection_report', $data);
  }

  public function printOverAllMonthlyCollection($date =NULL,$ward =NULL) {
    $month                          = $this->uri->segment(4);
    $ward                           = $this->uri->segment(5);
    $detail_date                    = empty( $month) ? $this->current_month : $month;
    $detail_ward                    = empty( $ward) ? '' : $ward;
    $data['ward_no']                = $detail_ward;
    $data['current_month']          = $detail_date;
    $data['details']                = $this->Reportmodel->getAllMonthlyReportDetails($detail_date, $detail_ward);
    $data['sampati_bhumi_kar']      = $this->Reportmodel->getMonthlySampatiKarDetails($detail_date, $detail_ward);
    $data['cancel_amount']          = $this->Reportmodel->getCancelSampatikarAmountDetailsByMonth($detail_date, $detail_ward);
    $this->load->view('monthly/print_overall_monthly_report', $data);
  }

    /**

     * This function show overall daily collection report
     * @param varchar $date, int $ward
     * @return void.
    */

    // public function viewMonthlyNagadiCollectionByTopic($topic_id, $date =NULL, $ward=NULL) {

    //     if ($this->authlibrary->HasModulePermission('REPORT', "VIEW")) {

    //         // $detail_date                    = empty( $date) ? $this->today : $date;

    //         // $detail_ward                    = empty($ward) ? $this->session->userdata('PRJ_USER_WARD') : $ward;

    //         // $data['ward_no']                = $detail_ward;

    //         // $data['date']                   = $detail_date;

    //         // $data['details']                = $this->MonthlyReportmodel->getDailyReportDetails($detail_date, $detail_ward);

    //         // $data['sampati_bhumi_kar']      = $this->MonthlyReportmodel->getDailySampatiKarDetails($detail_date, $detail_ward);

    //         // $data['cancel_amount']          = $this->MonthlyReportmodel->getCancelAmountDetailsByDate($detail_date, $detail_ward);

    //         // $data['sampati_cancel_amount']  = $this->MonthlyReportmodel->getCancelSampatikarAmountDetailsByDate($detail_date, $detail_ward);

    //         // $data['page']                   = 'daily/daily_collection_report';

    //         // $this->load->view('main', $data);

    //     }

    // }

    /**

      * This function show daily sampati kar details view

      * @param int $topic_id, varchar $date, int $ward

      * @return void;

    */

    



    //  public function PrintSampatiKarDetails( $date=NULL, $ward = NULL) {

    //     if ($this->authlibrary->HasModulePermission('REPORT', "VIEW")) {

    //         $detail_date                    = empty( $date) ? $this->current_month : $date;

    //         $detail_ward                    = empty($ward) ? $this->session->userdata('PRJ_USER_WARD') : $ward;

    //         $data['ward_no']                = $detail_ward;

    //         $data['date']                   = $detail_date;

    //         $data['sampati_bhumi_kar']      = $this->MonthlyReportmodel->getMonthlySampatiKarDetails($detail_date, $detail_ward);

    //         $data['sampati_cancel_amount']  = $this->MonthlyReportmodel->getCancelSampatikarAmountDetailsByMonth($detail_date, $detail_ward);

    //         $data['page'] = 'monthly/daily_sampati_details';

    //         $this->load->view('main', $data);

    //     }

    // }


   



    //public function printNagadiDetailsByTopic($topic_id = NUll,$date = NULL , $ward = NULL) {

       // if ($this->authlibrary->HasModulePermission('DAILY-REPORT', "VIEW")) {

       //    $detail_date            = empty( $date) ? $this->today : $date;

       //    $detail_ward            = empty($ward) ? $this->session->userdata('PRJ_USER_WARD') : $ward;

       //    $data['topic_id']       = $topic_id;

       //    $data['ward_no']           = $detail_ward;

       //    $data['date']           = $detail_date;

       //    $data['nagadi_details'] = $this->MonthlyReportmodel->getDailyDetailsByTopic($detail_date,$detail_ward, $topic_id);

       //    $data['title']          = $this->CommonModel->getDataById('main_topic', $topic_id);

       //    $data['cancel_amount']  = $this->MonthlyReportmodel->getCancelAmountDetailsByDate($detail_date, $detail_ward, $topic_id);

          

       //    $this->load->view('daily/print_daily_details_by_topic', $data);

       //  }

   // }



  // public function printCollectionReport($date =NULL, $ward_no =NULL){

  //   if ($this->authlibrary->HasModulePermission('REPORT', "VIEW")) {

  //     $detail_date                    = empty( $date) ? $this->current_month : $date;

  //     $detail_ward                    = empty($ward_no) ? $this->session->userdata('PRJ_USER_WARD') : $ward_no;

  //     $data['ward_no']                = $detail_ward;

  //     $data['date']                   = $detail_date;

  //     $data['details']                = $this->MonthlyReportmodel->getMonthlyReportDetails($detail_date, $detail_ward);

  //     $data['sampati_bhumi_kar']      = $this->MonthlyReportmodel->getMonthlySampatiKarDetails($detail_date, $detail_ward);

  //     $data['cancel_amount']          = $this->MonthlyReportmodel->getCancelAmountDetailsByMonth($detail_date, $detail_ward);

  //     $data['sampati_cancel_amount']  = $this->MonthlyReportmodel->getCancelSampatikarAmountDetailsByMonth($detail_date, $detail_ward);

  //     $data['page']                   = '';

  //     $this->load->view('monthly/print_collection_report', $data);

  //   }

  // }



  /*---------------------------------------------------------------------------

  ----------------------------------------------------------------------------*/

 

}//end of class