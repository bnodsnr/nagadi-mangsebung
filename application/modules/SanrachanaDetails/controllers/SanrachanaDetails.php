<?php
/**
  * This class create profile for business owner.
*/
class SanrachanaDetails extends MY_Controller
{
  /**
    * This class create profile for business owner.
  */
  public function __construct()
  {
    parent::__construct();
    $this->module_code = 'PERSONAL-PROFILE';
    $this->load->model("CommonModel");
    $this->load->model("SanrachanaDetailsModel");
    if(!$this->authlibrary->IsLoggedIn()) {
      $this->session->set_userdata('return_url', current_url());
      redirect('Login','location');
    }
  }

  public function Index() {}
 
  /**
    * This function on view land owner details.
    * @param  varchar $file_no
    * @return void 
   */
  public function veiwDetails( $file_no ) {
    if(!empty($file_no)) {
      $data['page']         = 'view_details';
      $data['land_owner']   = $this->CommonModel->GetLandOwnerRowByFileNo($file_no);
      $data['has_bill'] = check_tax_pax_for_current_fiscal_year( $file_no , get_current_fiscal_year());
      $this->load->view('main', $data);
    }
  }

  /**
    * This function on view land details.
    * @param  varchar $file_no
    * @return void 
   */
  public function GetSanrachanaDetailsLists() {
    if($this->input->is_ajax_request()) {
          $columns = array( 
                    0   => 'id', 
                    1   => 'k_no',
                    2   => 'sanrachana_n_no',
                    3   => 'sanrachana_prakar',
                    4   => 'land_owner_contact_no'
                );

          $limit                  = $this->input->post('length');
          $start                  = $this->input->post('start');
          $file_no                = $this->input->post('file_no');
          $kitta_no               = $this->input->post('kitta_no');
          $order                  = $columns[$this->input->post('order')[0]['column']];
          $dir                    = $this->input->post('order')[0]['dir'];
          $totalData              = $this->SanrachanaDetailsModel->SanrachanaDescriptionCount($file_no,$kitta_no);
          $totalFiltered          = $totalData;
          $posts                  = $this->SanrachanaDetailsModel->GetSanrachanaDetails($limit,$start,$order,$dir, $file_no,$kitta_no);

         // pp($posts);
          $data           = array();
          if(!empty($posts))
          {
              $i = 1;
              foreach ($posts as $post)
              {
                  $nestedData['sn']                                   = $this->mylibrary->convertedcit($i++);
                  $nestedData['id']                                   = $post->id;
                  $nestedData['k_no']                                 = $this->mylibrary->convertedcit($post->k_no);
                  $nestedData['toal_land_area']                       = $this->mylibrary->convertedcit($post->toal_land_area);
                  $nestedData['total_land_area_sqft']                 = $this->mylibrary->convertedcit($post->total_land_area_sqft);
                  $nestedData['total_land_min_amount']                = $this->mylibrary->convertedcit($post->total_land_min_amount);
                  $nestedData['total_land_tax_amount']                = $this->mylibrary->convertedcit($post->total_land_tax_amount);
                  $nestedData['sanrachana_n_no']                      = $this->mylibrary->convertedcit($post->sanrachana_n_no);
                  $nestedData['architect_type']                       = $post->architect_type;
                  $nestedData['st']                                   = $post->st;
                  $nestedData['contructed_year']                      = $this->mylibrary->convertedcit($post->contructed_year);
                  $nestedData['floor']                                = $this->mylibrary->convertedcit($post->sanrachana_floor);
                 
                  if($post->sanrachana_usages == 1) {
                      $nestedData['sanrachana_usages']                = 'निजि';
                  } elseif($post->sanrachana_usages == 2) {
                     $nestedData['sanrachana_usages']                = 'भाडा';
                  }

                   else {
                    $nestedData['sanrachana_usages']                = 'अन्य';
                  }
                  $nestedData['sanrachana_ground_area_sqft']          = $this->mylibrary->convertedcit($post->sanrachana_ground_area_sqft);
                  $nestedData['contructed_year']                      = $this->mylibrary->convertedcit($post->contructed_year);
                  $nestedData['sanrachana_dep_rate']                  = $this->mylibrary->convertedcit($post->sanrachana_dep_rate);
                  $nestedData['sanrachana_min_amount']                = $this->mylibrary->convertedcit($post->sanrachana_min_amount);
                  $nestedData['sanrachana_kubul_amount']              = $this->mylibrary->convertedcit($post->sanrachana_kubul_amount);
                  $nestedData['sanrachana_khud_amount']               = $this->mylibrary->convertedcit($post->sanrachana_khud_amount);
                  $nestedData['sanrachana_ground_area_ropani']        = $this->mylibrary->convertedcit($post->sanrachana_ground_area_ropani);
                  $nestedData['sanrachana_land_tax_amount']           = $this->mylibrary->convertedcit($post->sanrachana_land_tax_amount);
                  $nestedData['sampati_mullyankan']                   = $this->mylibrary->convertedcit($post->net_tax_amount);
                  $nestedData['r_bhumi_area']                         = $this->mylibrary->convertedcit($post->r_bhumi_area);
                  $nestedData['r_bhumi_kar']                          = $this->mylibrary->convertedcit($post->r_bhumi_kar);
                  $nestedData['sanrachana_dep_rate']                  = $this->mylibrary->convertedcit($post->sanrachana_dep_rate);
                  $nestedData['sanrachana_ground_housing_area_sqft']  = $this->mylibrary->convertedcit($post->sanrachana_ground_housing_area_sqft);

                  $data[] = $nestedData;
              }
          }
          $json_data = array(
                      "draw"            => intval($this->input->post('draw')),  
                      "recordsTotal"    => intval($totalData),                    "recordsFiltered" => intval($totalFiltered), 
                      "data"            => $data   
                      );
              
          echo json_encode($json_data);
      } else {
          exit('HTTPS!!');
      }
  }


  /**
    * This function on view land details.
    * @param  varchar $file_no
    * @return void 
  */
  public function AddDetails($file_no) {
    if($this->authlibrary->HasModulePermission($this->module_code, "ADD")){
        $file_no = $this->uri->segment(3);
        $data['page']                 = 'add_details';
        $data['lo_details']           = $this->CommonModel->GetLandOwnerRowByFileNo($file_no);
        $data['landDescription']      = $this->SanrachanaDetailsModel->getLandDetails($file_no);
        $data['year']                 = $this->CommonModel->getData('settings_year');
        $data['architectstructure']   = $this->CommonModel->getData('settings_architect_structure', 'DESC');
        $data['architecttype'] = $this->CommonModel->getData('settings_architect_type', 'DESC');
        $this->load->view('main', $data);
    } else {
        $this->session->set_flashdata('MSG_ACCESS','तपाईंको अनुमति अस्वीकृत गरिएको छ');
        redirect('Dashboard');
    }
  }

  /**
    * This on ajax call get land desctiption by kitta number.
    * @param  varchar $kittano
    * @return json 
   */
    /**
    * This on ajax call get land desctiption by kitta number.
    * @param  varchar $kittano
    * @return json 
   */
    public function getLandDescriptionByKNo() {
      if($this->input->is_ajax_request())  {
        $k_no = $this->input->post('k_no');
        $file_no = $this->input->post('file_no');
        $check_if_has_sanrachana = $this->SanrachanaDetailsModel->getSanrachanaByDKNo($k_no,$file_no);
        $data = $this->SanrachanaDetailsModel->getLandDescriptionByKittaNo($k_no, $file_no);
        $sanrachana_details = $this->SanrachanaDetailsModel->checkSanrachanaDetails($k_no, $file_no);

       // pp($sanrachana_details);
        //pp($data);
        if(!empty($check_if_has_sanrachana)) {
          $land_area_sqft = $check_if_has_sanrachana['r_bhumi_area'];
        } else {
          $land_area_sqft = $data['total_square_feet'];
        }

        $resp_data = $data['min_land_rate'];
        $response = array(
          'status'      => 'success',
          'data'         => $data,
          'land_area'   => $land_area_sqft,
          'sanrachana_details' => $sanrachana_details,
        );
        header("Content-type: application/json");
        echo json_encode($response);
        exit;
      } else {
        exit('no direct script allowed');
      }
    } 

    /**
      * This function on ajax call list kar kaatti rate.
      * @param  varchar $file_no
      * @return json
    */
    public function getMinStructureAmount() {
      if($this->input->is_ajax_request())  {
        $land_area_type = $this->input->post('land_area_type');
        $structure_type = $this->input->post('structure_type');
        $data = $this->SanrachanaDetailsModel->getMinStrucureAmount($land_area_type, $structure_type);
        $d_percent = $this->SanrachanaDetailsModel->getDepricitatedPercentByStrucuture($land_area_type);
        $response = array(
          'status'      => 'success',
          'data'        => $data,
          'dep'         => $d_percent
        );
        header("Content-type: application/json");
        echo json_encode($response);
        exit;
      } else {
        exit('no direct script allowed');
      }
    }   

    /**
      * This function on ajax call list kar kaatti rate.
      * @param  varchar $file_no
      * @return json
    */
    public function getDepRate() {
      if($this->input->is_ajax_request())  {
        $year = $this->input->post('year');
        $land_strucutre_type = $this->input->post('land_strucutre_type');
        $current_fiscal_year = current_fiscal_year();
        $y = explode('/', $current_fiscal_year['year']);
        $y = '2'.$y[1];
        $year_range = $y - $year;
        $data = $this->SanrachanaDetailsModel->getDepRange($year_range);
        $depPercent = $this->SanrachanaDetailsModel->getDepPercent($data['id'], $land_strucutre_type);
        // pp($depPercent);
        $response = array(
          'status'      => 'success',
          'data'        => $depPercent,
        );
        header("Content-type: application/json");
        echo json_encode($response);
        exit;

      } else {
        exit('no direct script allowed');
      }
    }

    /**
      * This function on view land details.
      * @param  varchar $file_no
      * @return void 
    */
    public function Save() {
      if($this->input->is_ajax_request()) {
        $file_no                                      = $this->input->post('ls_file_no');
        $k_no                                         = $this->input->post('k_no');
        $toal_land_area                               = $this->input->post('toal_land_area');
        $total_land_area_sqft                         = $this->input->post('total_land_area_sqft');
        $total_land_min_amount                        = $this->input->post('total_land_min_amount');
        $total_land_tax_amoun                         = $this->input->post('total_land_tax_amount');
        $sanrachana_n_no                              = $this->input->post('sanrachana_n_no');
        $sanrachana_prakar                            = $this->input->post('sanrachana_prakar');
        $sanrachana_banot_kisim                       = $this->input->post('sanrachana_banot_kisim');
        $sanrachana_usages                            = $this->input->post('sanrachana_usages');
        $sanrachana_floor                             = $this->input->post('sanrachana_floor');
        $sanrachana_ground_lenth                      = $this->input->post('sanrachana_ground_lenth');
        $sanrachana_ground_width                      = $this->input->post('sanrachana_ground_width');
        $sanrachana_ground_area_sqft                  = $this->input->post('sanrachana_ground_area_sqft');
        $sanrachana_ground_housing_area_sqft          = $this->input->post('charcheko_area');
        $contructed_year                              = $this->input->post('contructed_year');
        $sanrachana_dep_rate                          = $this->input->post('sanrachana_dep_rate');
        $sanrachana_min_amount                        = $this->input->post('sanrachana_min_amount');
        $sanrachana_kubul_amount                      = $this->input->post('sanrachana_kubul_amount');
        $sanrachana_khud_amount                       = $this->input->post('sanrachana_khud_amount');
        $sanrachana_ground_area_ropani                = $this->input->post('sanrachana_ground_area_ropani');
        $sanrachana_land_tax_amount                   = $this->input->post('sanrachana_land_tax_amount');
        $net_tax_amount                               = $this->input->post('net_tax_amount');
        $ls_file_no                                   = $this->input->post('ls_file_no');
       // $sanrachana_ground_area_ropani                = $this->input->post('sanrachana_ground_area_ropani');
        $r_bhumi_area                                 = $this->input->post('bhumi_kar_area');
        $r_bhumi_kar                                  = $this->input->post('bhumi_kar_amount');

        $this->form_validation->set_rules('ls_file_no',     'साबिक गा.पा/न.पा', 'required');
        $this->form_validation->set_rules('k_no',     'संरचना रहेको कि.नं', 'required');
        $this->form_validation->set_rules('toal_land_area', 'संरचना रहेको जग्गाको क्षेत्रफल', 'required');
        $this->form_validation->set_rules('total_land_area_sqft', 'जग्गाको क्षेत्रफल(वर्गफुट)', 'required');
        $this->form_validation->set_rules('total_land_min_amount', 'जग्गाको कबुल गरेको मूल्य(प्रति रोपनी)', 'required');
        $this->form_validation->set_rules('total_land_tax_amount', 'जग्गाको कर लाग्ने मुल्य', array('trim','required'));
        $this->form_validation->set_rules('sanrachana_n_no', 'संरचना रहेको न.नं', array('trim','required'));
        $this->form_validation->set_rules('sanrachana_prakar', 'संरचनाको प्रकार', array('trim','required'));
        $this->form_validation->set_rules('sanrachana_prakar', 'संरचनाको बनौटको किसिम', 'required|trim');
        $this->form_validation->set_rules('sanrachana_banot_kisim', 'संरचनाको प्रयोगको किसिम', array('trim','required'));
        $this->form_validation->set_rules('sanrachana_usages', 'संरचनाको तला )', array('trim','required'));
        $this->form_validation->set_rules('sanrachana_floor', 'प्लिन्थलेभलको क्षेत्रफल वर्गफुट )', array('trim','required'));
        // $this->form_validation->set_rules('sanrachana_ground_lenth', 'कर लाग्ने मुल्य', array('trim','required'));
        // $this->form_validation->set_rules('sanrachana_ground_width', 'कर लाग्ने मुल्य', array('trim','required'));
        $this->form_validation->set_rules('sanrachana_ground_area_sqft', 'संरचनाको क्षेत्रफल जम्मा वर्गफुट', array('trim','required'));
        $this->form_validation->set_rules('sanrachana_ground_housing_area_sqft', 'कर लाग्ने मुल्य', array('trim','required'));
        $this->form_validation->set_rules('contructed_year', 'बनेको साल', array('trim','required'));
        $this->form_validation->set_rules('sanrachana_dep_rate', 'संरचनाको ह्रासकट्टी प्रतिशत ', array('trim','required'));
        $this->form_validation->set_rules('sanrachana_min_amount', 'संरचनाको तोकिएको न्युनतम मुल्य (प्रति व.फु. )', array('trim','required'));
        $this->form_validation->set_rules('sanrachana_kubul_amount', 'संरचनाको खुद कायम मुल्य', array('trim','required'));
        $this->form_validation->set_rules('sanrachana_ground_area_ropani', 'प्लिन्थलेभलको क्षेत्रफल', array('trim','required'));
        $this->form_validation->set_rules('charcheko_area', 'चर्चेकाे जग्गाको क्षेत्रफल )', array('trim','required'));
        $this->form_validation->set_rules('sanrachana_land_tax_amount', 'संरचनाले चर्चेकाे जग्गाको कर लाग्ने मुल्य', array('trim','required'));
        $this->form_validation->set_rules('net_tax_amount', 'सम्पति मूल्याङ्कन जम्मा मुल्य', array('trim','required'));
        $this->form_validation->set_rules('ls_file_no', 'कर लाग्ने मुल्य', array('trim','required'));
        $this->form_validation->set_rules('bhumi_kar_area', 'चर्चेकाे बाहेक भूमिकर जग्गाको क्षेत्रफल', array('trim','required'));
        $this->form_validation->set_rules('bhumi_kar_amount', 'चर्चेकाे बाहेक जग्गाको भूमिकर मूल्याङ्कन', array('trim','required'));
        if($this->form_validation->run() == false) {
          $response = array(
              'status'      => 'validation_error',
              'message'     => '<div class="alert alert-danger">'.validation_errors().'</div>',
          );
          header("Content-type: application/json");
          echo json_encode($response);
          exit;
        }
        $post_array = array(
          'k_no'                                    => $k_no,
          'toal_land_area'                          => $toal_land_area,
          'total_land_area_sqft'                    => $total_land_area_sqft,
          'total_land_min_amount'                   => $total_land_min_amount,
          'total_land_tax_amount'                   => $total_land_tax_amoun, 
          'sanrachana_n_no'                         => $sanrachana_n_no, 
          'sanrachana_prakar'                       => $sanrachana_prakar, 
          'sanrachana_banot_kisim'                  => $sanrachana_banot_kisim, 
          'sanrachana_usages'                       => $sanrachana_usages, 
          'sanrachana_floor'                        => $sanrachana_floor, 
          'sanrachana_ground_lenth'                 => isset($sanrachana_ground_lenth) ? $sanrachana_ground_lenth :'',
          'sanrachana_ground_width'                 => isset($sanrachana_ground_width) ? $sanrachana_ground_width : '',
          'sanrachana_ground_area_sqft'             => $sanrachana_ground_area_sqft, 
          'sanrachana_ground_housing_area_sqft'     => $sanrachana_ground_housing_area_sqft, 
          'contructed_year'                         => $contructed_year,
          'sanrachana_dep_rate'                     => $sanrachana_dep_rate,
          'sanrachana_min_amount'                   => $sanrachana_min_amount, 
          'sanrachana_kubul_amount'                 => $sanrachana_kubul_amount, 
          'sanrachana_khud_amount'                  => $sanrachana_khud_amount,
          'sanrachana_ground_area_ropani'           => $sanrachana_ground_area_ropani, 
          'sanrachana_land_tax_amount'              => $sanrachana_land_tax_amount, 
          'net_tax_amount'                          => $net_tax_amount, 
          'ls_file_no'                              => $file_no, 
          'added_on'                                => convertDate(date('Y-m-d')), 
          'added_by'                                => $this->session->userdata('PRJ_USER_ID'), 
          'modified_on'                             => '', 
          'modified_by'                             => '', 
          'r_bhumi_area'                            => $r_bhumi_area,
          'r_bhumi_kar'                             => $r_bhumi_kar,
          'fiscal_year'                             => current_fiscal_year()['year'],
        );
       
        if(!empty($this->input->post('sanrachana_id'))) {
          $update_details_pre = array('r_bhumi_area' =>0, 'r_bhumi_kar' => 0);
          $this->CommonModel->updateData('sanrachana_details',$this->input->post('sanrachana_id'), $update_details_pre);
        }
        $result = $this->CommonModel->insertData('sanrachana_details',$post_array);
        if($result) {
          $response = array(
                  'status'      => 'success',
                  'data'         => "सफलतापूर्वक सम्मिलित गरियो",
                  'message'     => 'redirect',
                  'redirect_url' => base_url().'SanrachanaDetails/veiwDetails/'.$file_no,
          );
        header("Content-type: application/json");
        echo json_encode($response);
        exit;
        // $this->session->set_flashdata('MSG_SUCCESS','प्रोफाइल सफलतापूर्वक सिर्जना गरियो
        // ');
        // redirect('LandDetails/AddLandDetails/'.$ld_file_no);
        } else {
        
         $response = array(
                  'status'      => 'fail',
                  'data'         => "oops you got an error",
          );
          header("Content-type: application/json");
          echo json_encode($response);
          exit;
        }
      }
    }

  /**
    * This function on view land details.
    * @param  varchar $file_no
    * @return void 
   */
  public function EditDetails($id = NULL) {
      if($this->authlibrary->HasModulePermission($this->module_code, "ADD")){
          $id                           = $this->uri->segment(3);
          $data['page']                 = 'edit_details';
          $data['row']   = $this->CommonModel->getDataByID('sanrachana_details',$id);
          $data['lo_details']           = $this->CommonModel->GetLandOwnerRowByFileNo($data['row']['ls_file_no']);
          $data['landDescription']      = $this->CommonModel->getAllDataBySelectedFields('land_description_details', 'ld_file_no', $data['row']['ls_file_no']);
          $data['year']                 = $this->CommonModel->getData('settings_year');
          $data['architectstructure']   = $this->CommonModel->getData('settings_architect_structure', 'DESC');
          $data['architecttype'] = $this->CommonModel->getData('settings_architect_type', 'DESC');
          $this->load->view('main', $data);
      } else {
          $this->session->set_flashdata('MSG_ACCESS','तपाईंको अनुमति अस्वीकृत गरिएको छ');
          redirect('Dashboard');
      }
  }


  /**
    * This function on view land details.
    * @param  varchar $file_no
    * @return void 
   */
  public function Update() {
      if($this->input->is_ajax_request()) {
        $id                                           = $this->input->post('id');
        $file_no                                      = $this->input->post('ls_file_no');
        $k_no                                         = $this->input->post('k_no');
        $toal_land_area                               = $this->input->post('toal_land_area');
        $total_land_area_sqft                         = $this->input->post('total_land_area_sqft');
        $total_land_min_amount                        = $this->input->post('total_land_min_amount');
        $total_land_tax_amoun                         = $this->input->post('total_land_tax_amount');
        $sanrachana_n_no                              = $this->input->post('sanrachana_n_no');
        $sanrachana_prakar                            = $this->input->post('sanrachana_prakar');
        $sanrachana_banot_kisim                       = $this->input->post('sanrachana_banot_kisim');
        $sanrachana_usages                            = $this->input->post('sanrachana_usages');
        $sanrachana_floor                             = $this->input->post('sanrachana_floor');
        $sanrachana_ground_lenth                      = $this->input->post('sanrachana_ground_lenth');
        $sanrachana_ground_width                      = $this->input->post('sanrachana_ground_width');
        $sanrachana_ground_area_sqft                  = $this->input->post('sanrachana_ground_area_sqft');
        $sanrachana_ground_housing_area_sqft          = $this->input->post('charcheko_area');
        $contructed_year                              = $this->input->post('contructed_year');
        $sanrachana_dep_rate                          = $this->input->post('sanrachana_dep_rate');
        $sanrachana_min_amount                        = $this->input->post('sanrachana_min_amount');
        $sanrachana_kubul_amount                      = $this->input->post('sanrachana_kubul_amount');
        $sanrachana_khud_amount                       = $this->input->post('sanrachana_khud_amount');
        $sanrachana_ground_area_ropani                = $this->input->post('sanrachana_ground_area_ropani');
        $sanrachana_land_tax_amount                   = $this->input->post('sanrachana_land_tax_amount');
        $net_tax_amount                               = $this->input->post('net_tax_amount');
        $ls_file_no                                   = $this->input->post('ls_file_no');
       // $sanrachana_ground_area_ropani                = $this->input->post('sanrachana_ground_area_ropani');
        $r_bhumi_area                                 = $this->input->post('bhumi_kar_area');
        $r_bhumi_kar                                  = $this->input->post('bhumi_kar_amount');

        $this->form_validation->set_rules('ls_file_no',     'साबिक गा.पा/न.पा', 'required');
        $this->form_validation->set_rules('k_no',     'संरचना रहेको कि.नं', 'required');
        $this->form_validation->set_rules('toal_land_area', 'संरचना रहेको जग्गाको क्षेत्रफल', 'required');
        $this->form_validation->set_rules('total_land_area_sqft', 'जग्गाको क्षेत्रफल(वर्गफुट)', 'required');
        $this->form_validation->set_rules('total_land_min_amount', 'जग्गाको कबुल गरेको मूल्य(प्रति रोपनी)', 'required');
        $this->form_validation->set_rules('total_land_tax_amount', 'जग्गाको कर लाग्ने मुल्य', array('trim','required'));
        $this->form_validation->set_rules('sanrachana_n_no', 'संरचना रहेको न.नं', array('trim','required'));
        $this->form_validation->set_rules('sanrachana_prakar', 'संरचनाको प्रकार', array('trim','required'));
        $this->form_validation->set_rules('sanrachana_prakar', 'संरचनाको बनौटको किसिम', 'required|trim');
        $this->form_validation->set_rules('sanrachana_banot_kisim', '', array('trim','required'));
        $this->form_validation->set_rules('sanrachana_usages', 'संरचनाको प्रयोगको किसिम  )', array('trim','required'));
        $this->form_validation->set_rules('sanrachana_floor', 'संरचनाको तला )', array('trim','required'));
        // $this->form_validation->set_rules('sanrachana_ground_lenth', 'कर लाग्ने मुल्य', array('trim','required'));
        // $this->form_validation->set_rules('sanrachana_ground_width', 'कर लाग्ने मुल्य', array('trim','required'));
        $this->form_validation->set_rules('sanrachana_ground_area_sqft', 'संरचनाको क्षेत्रफल जम्मा वर्गफुट', array('trim','required'));
        $this->form_validation->set_rules('sanrachana_ground_housing_area_sqft', 'कर लाग्ने मुल्य', array('trim','required'));
        $this->form_validation->set_rules('contructed_year', 'बनेको साल', array('trim','required'));
        $this->form_validation->set_rules('sanrachana_dep_rate', 'संरचनाको ह्रासकट्टी प्रतिशत ', array('trim','required'));
        $this->form_validation->set_rules('sanrachana_min_amount', 'संरचनाको तोकिएको न्युनतम मुल्य (प्रति व.फु. )', array('trim','required'));
        $this->form_validation->set_rules('sanrachana_kubul_amount', 'संरचनाको खुद कायम मुल्य', array('trim','required'));
        $this->form_validation->set_rules('sanrachana_ground_area_ropani', 'प्लिन्थलेभलको क्षेत्रफल(कठ्ठा )', array('trim','required'));
        $this->form_validation->set_rules('charcheko_area', 'चर्चेकाे जग्गाको क्षेत्रफल )', array('trim','required'));
        $this->form_validation->set_rules('sanrachana_land_tax_amount', 'संरचनाले चर्चेकाे जग्गाको कर लाग्ने मुल्य', array('trim','required'));
        $this->form_validation->set_rules('net_tax_amount', 'सम्पति मूल्याङ्कन जम्मा मुल्य', array('trim','required'));
        $this->form_validation->set_rules('ls_file_no', 'कर लाग्ने मुल्य', array('trim','required'));
        $this->form_validation->set_rules('bhumi_kar_area', 'चर्चेकाे बाहेक भूमिकर जग्गाको क्षेत्रफल', array('trim','required'));
        $this->form_validation->set_rules('bhumi_kar_amount', 'चर्चेकाे बाहेक जग्गाको भूमिकर मूल्याङ्कन', array('trim','required'));
        if($this->form_validation->run() == false) {
          $response = array(
              'status'      => 'validation_error',
              'message'     => '<div class="alert alert-danger">'.validation_errors().'</div>',
          );
          header("Content-type: application/json");
          echo json_encode($response);
          exit;
        }
        $post_array = array(
          'k_no'                                    => $k_no,
          'toal_land_area'                          => $toal_land_area,
          'total_land_area_sqft'                    => $total_land_area_sqft,
          'total_land_min_amount'                   => $total_land_min_amount,
          'total_land_tax_amount'                   => $total_land_tax_amoun, 
          'sanrachana_n_no'                         => $sanrachana_n_no, 
          'sanrachana_prakar'                       => $sanrachana_prakar, 
          'sanrachana_banot_kisim'                  => $sanrachana_banot_kisim, 
          'sanrachana_usages'                       => $sanrachana_usages, 
          'sanrachana_floor'                        => $sanrachana_floor, 
          'sanrachana_ground_lenth'                 => isset($sanrachana_ground_lenth) ? $sanrachana_ground_lenth :'',
          'sanrachana_ground_width'                 => isset($sanrachana_ground_width) ? $sanrachana_ground_width : '',
          'sanrachana_ground_area_sqft'             => $sanrachana_ground_area_sqft, 
          'sanrachana_ground_housing_area_sqft'     => $sanrachana_ground_housing_area_sqft, 
          'contructed_year'                         => $contructed_year,
          'sanrachana_dep_rate'                     => $sanrachana_dep_rate,
          'sanrachana_min_amount'                   => $sanrachana_min_amount, 
          'sanrachana_kubul_amount'                 => $sanrachana_kubul_amount, 
          'sanrachana_khud_amount'                  => $sanrachana_khud_amount,
          'sanrachana_ground_area_ropani'           => $sanrachana_ground_area_ropani, 
          'sanrachana_land_tax_amount'              => $sanrachana_land_tax_amount, 
          'net_tax_amount'                          => $net_tax_amount, 
          'ls_file_no'                              => $file_no, 
          'added_on'                                => convertDate(date('Y-m-d')), 
          'added_by'                                => $this->session->userdata('PRJ_USER_ID'), 
          'modified_on'                             => '', 
          'modified_by'                             => '', 
          'r_bhumi_area'                            => $r_bhumi_area,
          'r_bhumi_kar'                             => $r_bhumi_kar,
          'fiscal_year'                             => current_fiscal_year()['year'],
        );
        //pp($post_array);
        $result = $this->CommonModel->updateData('sanrachana_details',$id,$post_array);
        if($result) {
          $response = array(
                  'status'      => 'success',
                  'data'         => "सफलतापूर्वक सम्मिलित गरियो",
                  'message'     => 'redirect',
                  'redirect_url' => base_url().'SanrachanaDetails/veiwDetails/'.$file_no,
          );
        header("Content-type: application/json");
        echo json_encode($response);
        exit;
        // $this->session->set_flashdata('MSG_SUCCESS','प्रोफाइल सफलतापूर्वक सिर्जना गरियो
        // ');
        // redirect('LandDetails/AddLandDetails/'.$ld_file_no);
        } else {
        
         $response = array(
                  'status'      => 'fail',
                  'data'         => "oops you got an error",
          );
          header("Content-type: application/json");
          echo json_encode($response);
          exit;
        }
      }
  }

  //get minimal cost
  public function GetLandMinCost() {
    if($this->input->is_ajax_request()) {
      $road_name = $this->input->post('road_name');
      $present_ward = $this->input->post('present_ward');
      $data = $this->CommonModel->GetRoadDetailsByID($road_name);
      $response = array(
        'status'        => 'success',
        'data'          => $data,
      );
      header("Content-type: application/json");
      echo json_encode($response);
      exit;
    }
  }


  /**
    * This function delete data from database.
    * check proper id is in format of not.
    * @param $id int pk
    * @return boolean.
  */
  public function delete() {
      if($this->input->is_ajax_request()) {
          $id = $this->input->post('id');
          $result = $this->SanrachanaDetailsModel->remove($id);
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
}//end of class

?>
