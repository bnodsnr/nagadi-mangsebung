<?php
/**
  * This class create profile for business owner.
*/
class LandDetails extends MY_Controller
{
  /**
    * This class create profile for business owner.
  */
  public function __construct()
  {
    parent::__construct();
    $this->module_code = 'PERSONAL-PROFILE';
    $this->load->model("CommonModel");
    $this->load->model("LandDetailsModel");
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
  public function veiwLandDescription( $file_no ) {
    if(!empty($file_no)) {
      $data['page']         = 'bidur/view_details';
      $data['land_owner']   = $this->CommonModel->GetLandOwnerRowByFileNo($file_no);
      $data['lands']        = $this->CommonModel->getAllDataBySelectedFields('land_description_details','ld_file_no',$file_no);
      $data['has_bill']     = $this->LandDetailsModel->checkIfTaxPaid($file_no);
      $this->load->view('main', $data);
    }
  }

  /**
    * This function on view land details.
    * @param  varchar $file_no
    * @return void 
   */
  public function GetLandLists() {
    if($this->input->is_ajax_request()) {
          $columns = array( 
                    0   => 'id', 
                    1   => 'file_no',
                    2   => 'land_owner_name_en',
                    3   => 'lo_czn_no',
                    4   => 'land_owner_contact_no'
                );

          $limit                  = $this->input->post('length');
          $start                  = $this->input->post('start');
          $file_no                = $this->input->post('file_no');
          $kitta_no               = $this->input->post('kitta_no');
          $order                  = $columns[$this->input->post('order')[0]['column']];
          $dir                    = $this->input->post('order')[0]['dir'];
          $totalData              = $this->LandDetailsModel->CountLand($file_no,$kitta_no);
          $totalFiltered          = $totalData;
          $posts                  = $this->LandDetailsModel->GetLandDetails($limit,$start,$order,$dir, $file_no,$kitta_no);
          $data           = array();
          if(!empty($posts))
          {
              $i = 1;
              foreach ($posts as $post)
              {
                  $nestedData['sn']                 = $this->mylibrary->convertedcit($i++);
                  $nestedData['id']                 = $post->land_id;
                  $nestedData['file_no']            = $this->mylibrary->convertedcit($post->ld_file_no);
                  $nestedData['file_no_en']         = $post->ld_file_no;
                  $nestedData['kitta_no_en']        = $post->k_number;
                  $nestedData['land_area_type']     = $post->lat;
                  $nestedData['road_name']          = $post->rm;

                  $nestedData['sabik']              = $post->old_gapa_napa.'-'.$this->mylibrary->convertedcit($post->old_ward);
                  $nestedData['present']              = $post->present_gapa_napa.'-'.$this->mylibrary->convertedcit($post->present_ward);
                  $nestedData['land_category']      = $post->category;
                  $biga = !empty($post->a_ropani) ? $post->a_ropani:0;
                  $kattha = !empty($post->a_ana) ? $post->a_ana:0;
                  $dhur = !empty($post->a_paisa) ? $post->a_paisa:0;
                  $dam = !empty($post->a_dam) ? $post->a_dam:0;
                  if(CALC == 1){
                    $nestedData['total_area']               = $this->mylibrary->convertedcit($biga).'.'.$this->mylibrary->convertedcit($kattha).'.'.$this->mylibrary->convertedcit($dhur).'.'.$this->mylibrary->convertedcit($dam).' (???????????????. ????????? .????????????.?????????)';

                  } else {
                    $nestedData['total_area']               = $this->mylibrary->convertedcit($biga).'.'.$this->mylibrary->convertedcit($kattha).'.'.$this->mylibrary->convertedcit($dam).' (????????????. ??????????????? .?????????)';
                  }
                  $nestedData['k_number']           = $this->mylibrary->convertedcit($post->k_number);
                  $nestedData['nn_number']          = $this->mylibrary->convertedcit($post->nn_number);
                  $nestedData['min_land_rate']      = $this->mylibrary->convertedcit($post->min_land_rate);
                  $nestedData['k_land_rate']        = $this->mylibrary->convertedcit($post->k_land_rate);
                  $nestedData['old_gapa_napa']      = $post->old_gapa_napa;
                  $nestedData['old_ward']           = $this->mylibrary->convertedcit($post->old_ward);
                  $nestedData['present_gapa_napa']  = $post->present_gapa_napa;
                  $nestedData['present_ward']       = $this->mylibrary->convertedcit($post->present_ward);
                  $nestedData['t_rate']             = $this->mylibrary->convertedcit($post->t_rate);
                  if($post->initial_flag  == 1){
                    $nestedData['kar'] = '<p class = "badge badge-success"><i class="fa fa-check-circle"></i></p>';
                  } else{
                    $nestedData['kar'] = '<p class = "badge badge-danger"><i class = "fa fa-times-circle"></i></p>';
                  }
                  if($post->initial_flag  == 1) {
                    $nestedData['update'] = '<p class = "badge badge-danger">??????????????? ?????????????????? ?????????</p>';
                  } else {
                    // $nestedData['update'] = '<a class="btn btn-sm btn-warning" href="'.base_url().'LandDetails/EditLandDetails/'.$post->land_id.'"><i class="fa  fa-pencil"></i> </a>';
                    $nestedData['update'] = '<div class="btn-group">
                                  <div class="dropdown">
                                      <button class="btn btn-sm btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                         ???????????????
                                      </button>
                                      <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                          <a class="dropdown-item" href="'.base_url().'LandDetails/EditLandDetails/'.$post->land_id.'"><i class="fa fa-pencil-square-o"></i> ????????????????????? ???????????????????????????</a>
                                          <button class="dropdown-item   btn-delete" data-id="'.$post->land_id.'" data-kitta="'.$post->k_number.'"><i class="fa fa-trash-o"></i> ??????????????????????????????</button>
                                      </div
                                  </div>
                              </div>';

                    
                                     
                  }
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
   public function AddLandDetails($file_no) {
      if($this->authlibrary->HasModulePermission($this->module_code, "ADD")){
          $file_no = $this->uri->segment(3);
          $data['page']           = 'bidur/add_land';
          $data['lo_details']     = $this->CommonModel->GetLandOwnerRowByFileNo($file_no);
          $data['oldwardaddress'] = $this->CommonModel->addressOld();
          $data['wardadrress']    = $this->CommonModel->oldWard();
          $data['roadtype']       = $this->CommonModel->getData('settings_road','DESC');
          $data['roadkisim']      = $this->CommonModel->getData('settings_road_type', 'DESC');
          $data['jaggaunit']      = $this->CommonModel->getData('settings_unit', 'DESC');
          $data['land_category'] = $this->CommonModel->getData('land_category', 'DESC');
          $data['areatype'] = $this->CommonModel->getData('settings_land_area_type', 'DESC');
          $this->load->view('main', $data);
      } else {
          $this->session->set_flashdata('MSG_ACCESS','????????????????????? ?????????????????? ???????????????????????? ?????????????????? ???');
          redirect('Dashboard');
      }
   }

  /**
    * This function on view land details.
    * @param  varchar $file_no
    * @return void 
   */
    public function saveLandDetails() {
      if($this->input->is_ajax_request()) {
        $this->form_validation->set_rules('old_gapa_napa[]',     '??????????????? ??????.??????/???.??????', 'required');
        $this->form_validation->set_rules('old_ward[]',     '??????????????? ????????? ??????', 'required');
        $this->form_validation->set_rules('present_gapa_napa[]', '????????? ??????.??????/???.??????', 'required');
        $this->form_validation->set_rules('present_ward[]', '???????????????????????? ??????????????? ???', 'required');
        $this->form_validation->set_rules('road_name[]', '????????? ????????? ??????', 'required');
        $this->form_validation->set_rules('land_area_type[]', '??????????????? ?????????', array('trim','required'));
        $this->form_validation->set_rules('nn_number[]', '??????????????? ??????', array('trim','required'));
        $this->form_validation->set_rules('k_number[]', '?????????????????? ??????', 'required|trim');
        $this->form_validation->set_rules('total_square_feet[]', '???????????????????????????', array('trim','required'));
        $this->form_validation->set_rules('min_land_rate[]', '????????????????????? ????????????????????? ???????????????(??????????????? ??????????????? )', array('trim','required'));
        $this->form_validation->set_rules('k_land_rate[]', '???????????? ??????????????? ???????????????(??????????????? ??????????????? )', array('trim','required'));
        $this->form_validation->set_rules('t_rate[]', '?????? ?????????????????? ???????????????', array('trim','required'));
        if($this->form_validation->run() == false) {
            $response = array(
                'status'      => 'validation_error',
                'message'     => '<div class="alert alert-danger">'.validation_errors().'</div>',
            );
            header("Content-type: application/json");
            echo json_encode($response);
            exit;
        }
        $old_gapa_napa          = $this->input->post('old_gapa_napa');
        $old_ward               = $this->input->post('old_ward');
        $present_gapa_napa      = $this->input->post('present_gapa_napa');
        $present_ward           = $this->input->post('present_ward');
        $road_name              = $this->input->post('road_name');
        $land_area_type         = $this->input->post('land_area_type');
        $land_category          = $this->input->post('land_category');
        $n_number               = $this->input->post('nn_number');
        $k_number               = $this->input->post('k_number');
        $a_ropani               = $this->input->post('a_ropani');//biga
        $a_ana                  = $this->input->post('a_ana');//kattha
        $a_paisa                = $this->input->post('a_paisa');//dhur
        $a_dam                  = $this->input->post('a_dam');
        $a_unit                 = $this->input->post('a_unit');
        $total_square_feet      = $this->input->post('total_square_feet');
        $min_land_rate          = $this->input->post('min_land_rate');
        $max_land_rate          = $this->input->post('max_land_rate');
        $k_land_rate            = $this->input->post('k_land_rate');
        $t_rate                 = $this->input->post('t_rate');
        $ld_file_no             = $this->input->post('ld_file_no');
        $data['lo_details']     = $this->CommonModel->GetLandOwnerRowByFileNo($ld_file_no);
        $fiscal_year            = get_current_fiscal_year();
        if($ld_file_no != $data['lo_details']['file_no']){
          exit('invalid file no');
        }
        // $check_unique_k_no = check_unique_kitta_no($k_number, $old_ward );
        // if($check_unique_k_no == 1 ) {
        //     $response = array(
        //         'status'      => 'error',
        //         'message'     => '?????????????????? ?????????????????? ?????? ??????????????????????????? ?????????????????? ????????????????????? ?????????.',
        //     );
        //     header("Content-type: application/json");
        //     echo json_encode($response);
        //     exit;
        // }
        $post_array = array();
        if(!empty($k_number)) {
          foreach ($k_number as $key => $indexv) {
            $post_array[] = array(
              'old_gapa_napa'     => $old_gapa_napa[$key],
              'old_ward'          => $old_ward[$key],
              'present_gapa_napa' => $present_gapa_napa[$key],
              'present_ward'      => $present_ward[$key],
              'road_name'         => $road_name[$key],
              'land_area_type'    => $land_area_type[$key],
              'land_category'     => $land_category[$key],
              'nn_number'         => $n_number[$key],
              'k_number'          => $k_number[$key],
              'a_ropani'          => $a_ropani[$key],
              'a_paisa'           => $a_paisa[$key],
              'a_ana'             => $a_ana[$key],
              'a_dam'             => $a_dam[$key],
              'a_unit'            => 1,
              'total_square_feet' => $total_square_feet[$key],
              'min_land_rate'     => $min_land_rate[$key],
              'max_land_rate'     => $max_land_rate[$key],
              'k_land_rate'       => $k_land_rate[$key],
              'fiscal_year'       => current_fiscal_year()['year'],
              't_rate'            => $t_rate[$key],
              'ld_file_no'        => $ld_file_no,
              'added_by'          => $this->session->userdata('PRJ_USER_ID'),
              'added_on'          => convertDate(date('Y-m-d'))
            );
          }
        }
       
        $check_if_bill_exits = check_tax_pax_for_current_fiscal_year($ld_file_no,$fiscal_year);
        $result = $this->LandDetailsModel->saveData($post_array);
        if($result) {
          $flag       = array('initial_flag' => 0);
          $this->CommonModel->updateDataByField('land_owner_profile_basic','file_no',$ld_file_no,$flag);
            $response = array(
                    'status'          => 'success',
                    'data'            => "????????????????????????????????? ???????????????????????? ???????????????",
                    'message'         => 'redirect',
                    'redirect_url'    => base_url().'SampatiKarRasid/CreateBills/'.$ld_file_no,
            );
          header("Content-type: application/json");
          echo json_encode($response);
          exit;
        } else {
           $response = array(
                    'status'        => 'fail',
                    'data'          => "oops you got an error",
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
  public function EditLandDetails($id) {
      if($this->authlibrary->HasModulePermission($this->module_code, "ADD")){
          $file_no                  = $this->uri->segment(3);
          
          $data['page']             = 'bidur/edit_land_details_v1';
          $data['oldwardaddress']   = $this->CommonModel->addressOld();
          $data['wardadrress']      = $this->CommonModel->oldWard();
          $data['roadkisim']        = $this->CommonModel->getData('settings_road_type', 'DESC');
          $data['jaggaunit']        = $this->CommonModel->getData('settings_unit', 'DESC');
          $data['landDescription']    = $this->CommonModel->GetLandDetailsByID($id);
          $data['lo_details']       = $this->CommonModel->GetLandOwnerRowByFileNo($data['landDescription']['ld_file_no']);
          $has_bill = check_tax_pax_for_current_fiscal_year($data['landDescription']['ld_file_no'],get_current_fiscal_year());
          if($data['landDescription']['initial_flag'] == 1) {
            $this->session->set_flashdata('MSG_ACCESS','???????????? ???. ???. ?????? ???????????? ????????????????????? ?????? ????????????????????? ???????????? ?????????????????????');
          
            redirect('LandDetails/veiwLandDescription/'.$data['landDescription']['ld_file_no']);
          }
          
          $data['areatype'] = $this->CommonModel->getData('settings_land_area_type', 'DESC');
          $present_ward =  $data['landDescription']['present_ward'];
          $data['roadtype']          = $this->CommonModel->getAllDataBySelectedFields('settings_road','ward',$present_ward);
          $data['land_category']      = $this->CommonModel->getData('land_category', 'DESC');
          $this->load->view('main', $data);
      } else {
          $this->session->set_flashdata('MSG_ACCESS','????????????????????? ?????????????????? ???????????????????????? ?????????????????? ???');
          redirect('Dashboard');
      }
  }


  /**
    * This function on view land details.
    * @param  varchar $file_no
    * @return void 
  */
  public function updateLandDetails() {
      if($this->input->is_ajax_request()) {
        $id                     = $this->input->post('id');
        $old_gapa_napa          = $this->input->post('old_gapa_napa');
        $old_ward               = $this->input->post('old_ward');
        $present_gapa_napa      = $this->input->post('present_gapa_napa');
        $present_ward           = $this->input->post('present_ward');
        $road_name              = $this->input->post('road_name');
        $land_area_type         = $this->input->post('land_area_type');
        $land_category          = $this->input->post('land_category');
        $n_number               = $this->input->post('nn_number');
        $k_number               = $this->input->post('k_number');
        $a_ropani               = $this->input->post('a_ropani');//biga
        $a_ana                  = $this->input->post('a_ana');//kattha
        $a_paisa                = $this->input->post('a_paisa');//dhur
        $a_dam                  = $this->input->post('a_dam');
        $a_unit                 = $this->input->post('a_unit');
        $total_square_feet      = $this->input->post('total_square_feet');
        $min_land_rate          = $this->input->post('min_land_rate');
        $max_land_rate          = $this->input->post('max_land_rate');
        $k_land_rate            = $this->input->post('k_land_rate');
        $t_rate                 = $this->input->post('t_rate');
        $ld_file_no             = $this->input->post('ld_file_no');
        $k_number_org           = $this->input->post('k_number_org');
        $flag           = $this->input->post('flag');
        $data['lo_details']     = $this->CommonModel->GetLandOwnerRowByFileNo($ld_file_no);
        $data['landDescription']    = $this->CommonModel->GetLandDetailsByID($id);
        if($ld_file_no != $data['lo_details']['file_no']){
          exit('invalid file no');
        }

        $this->form_validation->set_rules('old_gapa_napa',     '??????????????? ??????.??????/???.??????', 'required');
        $this->form_validation->set_rules('old_ward',     '??????????????? ????????? ??????', 'required');
        $this->form_validation->set_rules('present_gapa_napa', '????????? ??????.??????/???.??????', 'required');
        $this->form_validation->set_rules('present_ward', '????????? ????????? ??????', 'required');
        $this->form_validation->set_rules('road_name', '??????????????? ?????????', 'required');
        $this->form_validation->set_rules('land_area_type', '????????????????????? ??????????????????????????? ???????????????', array('trim','required'));
        if(MODULE == 2) {
          $this->form_validation->set_rules('land_category', '????????????????????? ??????????????????', array('trim','required'));
        }
        $this->form_validation->set_rules('nn_number', '??????????????? ??????', array('trim','required'));
        $this->form_validation->set_rules('k_number', '?????????????????? ??????', array('trim','required'));
        $this->form_validation->set_rules('total_square_feet', '???????????????????????????', array('trim','required'));
        $this->form_validation->set_rules('min_land_rate', '????????????????????? ????????????????????? ???????????????(??????????????? ??????????????? )', array('trim','required'));
        $this->form_validation->set_rules('k_land_rate', '???????????? ??????????????? ???????????????(??????????????? ??????????????? )', array('trim','required'));
        $this->form_validation->set_rules('t_rate', '?????? ?????????????????? ???????????????', array('trim','required'));

         if($this->form_validation->run() == false) {
            $response = array(
                'status'      => 'validation_error',
                'message'     => '<div class="alert alert-danger">'.validation_errors().'</div>',
            );
            header("Content-type: application/json");
            echo json_encode($response);
            exit;
        }
        
        $has_bill = check_tax_pax_for_current_fiscal_year($ld_file_no,get_current_fiscal_year());
          if($flag == 1) {
               $response = array(
                'status'      => 'error',
                'message'     => '???????????? ???. ???. ?????? ???????????? ????????????????????? ?????? ????????????????????? ???????????? ?????????????????????.',
            );
            header("Content-type: application/json");
            echo json_encode($response);
            exit;
            //$this->session->set_flashdata('MSG_ACCESS','???????????? ???. ???. ?????? ???????????? ????????????????????? ?????? ????????????????????? ???????????? ???????????????
            //redirect('LandDetails/veiwLandDescription/'.$data['landDescription']['ld_file_no']);
        }
          
        // if($data['landDescription']['k_number'] != $flag){
        //   $check_unique_k_no = check_unique_kitta_no($k_number, $old_ward );
        //   if($check_unique_k_no == 1 ) {
        //     $response = array(
        //         'status'      => 'error',
        //         'message'     => '?????????????????? ?????????????????? ?????? ??????????????????????????? ?????????????????? ????????????????????? ?????????.',
        //     );
        //     header("Content-type: application/json");
        //     echo json_encode($response);
        //     exit;
        //   }
        // }
        $post_array = array(
          'old_gapa_napa'       => $old_gapa_napa,
          'old_ward'            => $old_ward,
          'present_gapa_napa'   => $present_gapa_napa,
          'present_ward'        => $present_ward,
          'road_name'           => $road_name,
          'land_area_type'      => $land_area_type,
          'land_category'       => $land_category,
          'nn_number'           => $n_number,
          'k_number'            => $k_number,
          'a_ropani'            => $a_ropani,
          'a_paisa'             => $a_paisa,
          'a_ana'               => $a_ana,
          'a_dam'               => $a_dam,
          'a_unit'              => $a_unit,
          'total_square_feet'   => $total_square_feet,
          'min_land_rate'       => $min_land_rate,
          'max_land_rate'       => $max_land_rate,
          'k_land_rate'         => $k_land_rate,
          'fiscal_year'         => current_fiscal_year()['year'],
          't_rate'              => $t_rate,
          // 'ld_file_no' =>$ld_file_no,
          'modified_by'            => $this->session->userdata('PRJ_USER_ID'),
          'modified_on'            => convertDate(date('Y-m-d'))
        );
        $sanrachana_details = $this->LandDetailsModel->HasSanrachana($k_number);
        if($sanrachana_details == true) {
          $sanrachana_details = $this->CommonModel->getAllDataBySelectedFields('sanrachana_details','k_no', $k_number);
          $details = array();
          $total_land_area = $a_ropani.'-'.$a_ana.'-'.$a_paisa.'-'.$a_dam;
          if(!empty($sanrachana_details)) {
            foreach($sanrachana_details as $key => $val){
              $r_bhumi = $val['r_bhumi_area'] / 5476;
              $r_bhumi_tax = $r_bhumi * $k_land_rate;
              $details[] = array( 
                'k_no'                            => $k_number,
                'toal_land_area'                  => $total_land_area,
                'total_land_area_sqft'            => $total_square_feet,
                'total_land_min_amount'           => $min_land_rate,
                'total_land_tax_amount'           => $k_land_rate,
                'r_bhumi_kar'                     => $r_bhumi_tax,
              );
            }
            $this->LandDetailsModel->updateSanrachana($details,$k_number);
          }
          // pp($sanrachana_details);
          
          // $r_bhumi_tax = $total_square_feet / 72900;
          // $land_tax_amount = $r_bhumi_
          // $data = array(
          //           'k_no'=>$k_number,
          //           'total_land_area' => $total_land_area,
          //           'total_land_area_sqft' => $total_square_feet,,
          //           'total_land_min_amount' =>$min_land_rate,
          //           'total_land_tax_amount' =>$k_land_rate,,
          //         );
          
        }
        $result = $this->CommonModel->updateData('land_description_details',$id,$post_array);
        if($result) {
            
            $response = array(
                    'status'      => 'success',
                    'data'         => "????????????????????????????????? ???????????????????????? ???????????????",
                    'message'     => 'redirect',
                    'redirect_url'    => base_url().'LandDetails/veiwLandDescription/'.$ld_file_no,
            );
          header("Content-type: application/json");
          echo json_encode($response);
          exit;
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

  /**getLandAreaCost
    * This function delete data from database.
    * check proper id is in format of not.
    * @param $id int pk
    * @return boolean.
  */
  public function delete() {
      if($this->input->is_ajax_request()) {
          $id = $this->input->post('id');
          $kitta_no = $this->input->post('kitta');
         
          $file_no = $this->CommonModel->getDataById('land_description_details', $id);
          $result = $this->LandDetailsModel->remove($id);
         
          if($result) {
              
              $sanrachana_details = $this->LandDetailsModel->HasSanrachana($kitta_no);
              if($sanrachana_details == true) {
                $this->LandDetailsModel->RemoveSanrachanaDetails($kitta_no);
              }

              $response = array(
                  'status'      => 'success',
                  'data'         => "????????????????????????????????? ??????????????????",
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

  /**
    * on ajax request get new address on request old address.
    * check proper id is in format of not.
    * @param $ward int pk
    * @return boolean.
  */
  public function getNewAddress() {
    $gapana = $this->input->post('gapana');
    $ward = $this->input->post('ward');
    $data = $this->LandDetailsModel->getNewAddressDetails($gapana,$ward);
    $road_option = "";
    $road_option .= "<option value=''>??????????????????????????????</option>";
    $road['details'] = $this->LandDetailsModel->getRoadDetails($data['present_ward']);
    //pp($road['details']);
    if(!empty($road['details'])) {
      foreach ($road['details'] as $key => $value) {
        $road_option .= "<option value = '".$value['id']."''>".$value['road_name']."</option>";
      }
    } else {
      $road_option .= "<option> Empty Road</option>";
    }
    $new_gapana = $data['present_name'];
    $new_ward = $data['present_ward'];
    $response = array(
      'status'      => 'success',
      'data'         => $data,
      'road_option' => $road_option,
    );
    header("Content-type: application/json");
    echo json_encode($response);
    exit;
  } 

  /**
    * on ajax request get new address on request old address.
    * check proper id is in format of not.
    * @param $ward int pk
    * @return boolean.
  */
  public function getNewWard() {
    $gapana = $this->input->post('gapana');
    $data = $this->LandDetailsModel->oldWard($gapana);
    $wards = "<option value=''>??????????????????????????????</option>";
   
    if(!empty($data)) {
      foreach ($data as $key => $value) {
        $wards .= "<option value = '".$value['old_ward']."''>".$value['old_ward']."</option>";
      }
    } else {
      $wards .= "<option></option>";
    }
    $response = array(
      'status'      => 'success',
      'wards' => $wards,
    );
    header("Content-type: application/json");
    echo json_encode($response);
    exit;
  } 


  public function getLandAreaCost() {
    if($this->input->is_ajax_request()) {
      $road_name = $this->input->post('road_name');
      $land_area_type = $this->input->post('land_area_type');
      $ward = $this->input->post('ward');
      $data = $this->LandDetailsModel->getLandCost($road_name,$land_area_type,$ward);
      
      $tax_amount = $this->LandDetailsModel->getBhumikarRate($data['minimal_cost']);
      //pp($tax_amount);
      $response = array(
        'status'        => 'success',
        'data'          => $data,
        'tax_amount'    => $tax_amount['bhumi_kar']
      );
      header("Content-type: application/json");
      echo json_encode($response);
      exit;
    }
  }

//  public function getLandCost($road_name =NULL,$land_area_type=NULL,$ward=NULL) {

//         //$fiscal_year = get_current_fiscal_year();

//         $this->db->from('settings_area_minimal_cost');

//         if(!empty($road_name)) {

//             $this->db->where('road_name', $road_name);

//         }

//         if(!empty($land_area_type)) {

//             $this->db->where('land_area_type', $land_area_type);

//         }

//       // $this->db->where('fiscal_year',$fiscal_year );

//         $query = $this->db->get();

//         return $query->row_array();

//         // $condition = array(

//         //     'id' => $road_name,

//         //     't1.fiscal_year' => get_current_fiscal_year(),

//         // );

//         // $this->db->select('t1.*, t2.*')->from('settings_road t1');

//         // $this->db->join('settings_land_area_type t2', 't2.id = t1.land_area_type');

//         // $this->db->where($condition);

//         // $query = $this->db->get();

//         // return $query->row_array();

//         // return $this->db->select('*')

//         //              ->from('settings_road')

//         //              ->where($condition)

//         //              ->get()

//         //              ->row_array();

//     }

    public function getBhumikarRate($price_range) {
        $fiscal_year = get_current_fiscal_year();
        $sql = "SELECT bhumi_kar from sampati_bhumi_kar_rate where ".$price_range. " BETWEEN from_rate and to_rate
              AND fiscal_year = '$fiscal_year'";
        $query = $this->db->query($sql);
        $result = $query->row_array();
        return $result;
    }

}//end of class

?>