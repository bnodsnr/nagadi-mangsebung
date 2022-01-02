<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/*This class load model for dashboard*/

class Dashboardmodel extends CI_Model
{
	
	/*
     * this function count all profile created
     * @ param NULL
     * @ return total count
  	*/
	public function getTotalProfile() {
		$this->db->where('status','1');
		if($this->session->userdata('PRJ_USER_ID') != 1) {
			$this->db->where('added_by', $this->session->userdata('PRJ_USER_ID'));
		}
		$this->db->where('form_type', '2');
        $this->db->from("land_owner_profile_basic");
        $count = $this->db->count_all_results();
        
        return $count;
	}

	/*
     * this function count all profile created
     * @ param NULL
     * @ return total count
  	*/
	public function getTotalPaidProfile() {

		$this->db->where('status',1);
		if($this->session->userdata('PRJ_USER_ID') != 1) {
			$this->db->where('added_ward', $this->session->userdata('PRJ_USER_WARD'));
		}
		$this->db->where('initial_flag',1);
        $this->db->from("land_owner_profile_basic");
        return $this->db->count_all_results();
	}

	/*
     * this function count all profile created
     * @ param NULL
     * @ return total count
  	*/
	public function getTotalUnPaidProfile() {

		$this->db->where('status',1);
		if($this->session->userdata('PRJ_USER_ID') != 1) {
			$this->db->where('added_ward', $this->session->userdata('PRJ_USER_WARD'));
		}
		$this->db->where('initial_flag!=',1);
        $this->db->from("land_owner_profile_basic");
        return $this->db->count_all_results();
	}

	/**
     * this function get total sampati kar amount
     * @ param NULL
     * @ return total kar amount
  	*/
  	public function getTotalSampatiBhumiKar() {
  		$this->db->select('SUM(net_total_amount) as total');
		$this->db->from('sampati_kar_bhumi_kar_bill_details');

		if($this->session->userdata('PRJ_USER_ID') != 1) {
			$this->db->where('added_by', $this->session->userdata('PRJ_USER_ID'));
		}
		$this->db->where('status',1);
		$query = $this->db->get();
		return $query->row(); 
  	}
	/**
     * this function get total nagadi kar amount
     * @param NULL
     * @return total kar amount
  	*/
  	public function getNagadiTotal() {
		$this->db->select('SUM(t_rates) as total');
		if($this->session->userdata('PRJ_USER_ID') != 1) {
			$this->db->where('added_ward', $this->session->userdata('PRJ_USER_WARD'));
		}
		$this->db->where('initial_flag !=',1);
		$this->db->from('nagadi_amount_details');
		$query = $this->db->get();
		//echo $this->db->last_query();
		return $query->row(); 
	}

	/**
     * this function get total nagadi kar amount grouping ward in ascending
     * @param NULL
     * @return total kar amount
  	*/
	public function getWardWiseNagadiCollection() {
		$current_fy = current_fiscal_year();
		$this->db->select('SUM(t_rates) as total_nagadi');
		$this->db->from('nagadi_amount_details');
		$this->db->where('fiscal_year', $current_fy['year']);
		$this->db->where('initial_flag!=',1);
		$this->db->group_by('added_ward');
		$this->db->order_by('added_ward', 'ASC');
		$query = $this->db->get();
		return $query->result();
	}

	/**
     * this function get total sampati-bhumi kar amount
     * @param NULL
     * @return total kar amount
  	*/
	public function getSsamptiBhumiKarCollection() {
		$current_fy = current_fiscal_year();
		$this->db->select('SUM(net_total_amount) as total');
		$this->db->from('sampati_kar_bhumi_kar_bill_details');
		$this->db->where('fiscal_year', $current_fy['year']);
		$this->db->where('status', 1);
		$this->db->group_by('added_ward');
		$this->db->order_by('added_ward', 'ASC');
		$query = $this->db->get();
		return $query->result(); 
	}

	/**
     * this function get total sampati-bhumi kar amount of today's date
     * @param current date
     * @return array total_kar_amount.  
  	*/
  	public function getTodaysSsamptiBhumiKarCollection() {
		$current_fy = current_fiscal_year();
		$current_date = convertDate(date('Y-m-d'));
		$this->db->select('SUM(net_total_amount) as total');
		$this->db->from('sampati_kar_bhumi_kar_bill_details');
		$this->db->where('fiscal_year', $current_fy['year']);
		$this->db->where('added_on', $current_date);
		$this->db->where('status', 1);
		$query = $this->db->get();
		return $query->row(); 
	}

	/**
     * this function get total nagadi amount of today's date
     * @param current date
     * @return array total_kar_amount.  
  	*/
	public function getTodayNagadiCollection() {
		$current_fy = current_fiscal_year();
		$current_date = convertDate(date('Y-m-d'));
		$this->db->select('SUM(t_rates) as total_nagadi');
		$this->db->from('nagadi_amount_details');
		$this->db->where('fiscal_year', $current_fy['year']);
		$this->db->where('added', $current_date);
		$this->db->where('initial_flag !=', 1);
		$query = $this->db->get();
		return $query->row();
	}



	/*
     * this function get total sampati-bhumi kar amount of monthly date
     * @ param current date
     * @ return array total_kar_amount.  
  	*/
  	public function getMonthlySamptiBhumiKarCollection($month) {
		$current_fy = current_fiscal_year();
		$current_date = convertDate(date('Y-m-d'));
		$this->db->select('SUM(net_total_amount) as total');
		$this->db->from('sampati_kar_bhumi_kar_bill_details');
		$this->db->where('fiscal_year', $current_fy['year']);
		$this->db->where('MONTH(added_on)', $month);
		$this->db->where('status', 1);
		$query = $this->db->get();
		return $query->row(); 
	}

	/*
     * this function get total nagadi amount of monthly date
     * @ param current date
     * @ return array total_kar_amount.  
  	*/
	public function getMonthlyNagadiCollection($month) {
		$current_fy = current_fiscal_year();
		$current_date = convertDate(date('Y-m-d'));
		$this->db->select('SUM(t_rates) as total_nagadi');
		$this->db->from('nagadi_amount_details');
		$this->db->where('fiscal_year', $current_fy['year']);
		$this->db->where('MONTH(added)', $month);
		$this->db->where('initial_flag !=', 1);
		$query = $this->db->get();
		return $query->row();
	}

	/*
     * this function count sampati kar paid
     * @ param NULL
     * @ return total count
  	*/
	public function getTotalProfileKarPaid() {
		$totalRows = $this->db->count_all('sampati_kar_bhumi_kar_bill_details');
		return  $totalRows;
	}

	/*
     * this function select distinct ward number in nagadi
     * @ param NULL
     * @ return total count
  	*/
	public function getNagadiWard() {
		$query = $this->db->select('added_ward')
                ->distinct('added_ward')
                ->from('nagadi_amount_details')
                ->order_by('added_ward','ASC')
                ->get(); 
 		return $query->result();
	}

	/*
     * this function select distinct ward number in sampati & bhummi kar
     * @ param NULL
     * @ return total count
  	*/
	public function getsampatiWard() {
		$query = $this->db->select('added_ward')
                ->distinct('added_ward')
                ->from('sampati_kar_bhumi_kar_bill_details')
                ->order_by('added_ward','ASC')
                ->get(); 
 		return $query->result();
	}
	public function getDailyNagadiCollection() {
		$current_date = convertDate(date('Y-m-d'));
		$this->db->select('SUM(t_total) as dailytotal');
		$this->db->from('nagadi_rasid');
		$this->db->where('added_by', $this->session->userdata('PRJ_USER_ID'));
		$this->db->where('date', $current_date);
		$this->db->where('status', 1);
		$query = $this->db->get();
		return $query->row(); 
	}

	public function getDailySampatiBhumiKarCollection() {
		$current_date = convertDate(date('Y-m-d'));
		$this->db->select('SUM(net_total_amount) as dailytotal');
		$this->db->from('sampati_kar_bhumi_kar_bill_details');
		$this->db->where('added_by', $this->session->userdata('PRJ_USER_ID'));
		$this->db->where('billing_date', $current_date);
		$this->db->where('status', 1);
		$query = $this->db->get();
		return $query->row(); 
	}

	public function getMonthlyNagadiWardCollection() {
		$current_date = explode('-',convertDate(date('Y-m-d')));
		$this->db->select('SUM(t_total) as monthlytotal');
		$this->db->from('nagadi_rasid');
		$this->db->where('added_by', $this->session->userdata('PRJ_USER_ID'));
		$this->db->where('MONTH(date)', $current_date[1]);
		$this->db->where('status', 1);
		$query = $this->db->get();
		return $query->row(); 
	}

	public function getMonthlySampatiBhumiKarWardCollection() {
		$current_date = explode('-',convertDate(date('Y-m-d')));
		$this->db->select('SUM(net_total_amount) as monthlytotal');
		$this->db->from('sampati_kar_bhumi_kar_bill_details');
		$this->db->where('added_by', $this->session->userdata('PRJ_USER_ID'));
		$this->db->where('MONTH(billing_date)', $current_date[1]);
		$this->db->where('status', 1);
		$query = $this->db->get();
		return $query->row();
	}
}