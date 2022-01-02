<?php 

/**

 * 

 */

class Reportmodel extends CI_Model

{

	//get data by ward and topic title

	public function getNagadiTotalByTopic($topic = NULL ,$ward) {
		$date = $this->input->post('date');
		$month = $this->input->post('month');
		//echo $month;
		$this->db->select('SUM(t_rates) as total');

		$this->db->from('nagadi_amount_details');

		$this->db->where('main_topic', $topic);
		if(!empty($date)) {
			$this->db->where('added', $date);
		}
		if(!empty($month)) {
			$this->db->where('SUBSTRING(added, 6,2)=',$month);
		}
		$this->db->where('added_ward', $ward);
		$this->db->where('initial_flag !=',1);

		$query = $this->db->get();

		return $query->row(); 

	}



	public function getNagadiTotalByMT($topic = NULL) {

		$date = $this->input->post('date');
		$month = $this->input->post('month');
		$this->db->select('SUM(t_rates) as total');

		$this->db->from('nagadi_amount_details');

		$this->db->where('main_topic', $topic);
		$this->db->where('initial_flag !=', 1);

		if(!empty($date)) {
			$this->db->where('added', $date);
		}
		if(!empty($month)) {
			$this->db->where('SUBSTRING(added, 6,2)=',$month);
		}
		$query = $this->db->get();

		return $query->row(); 

	}



	public function getNagadiTotalByWard($ward) {
		$date = $this->input->post('date');
		$month = $this->input->post('month');
		
		$this->db->select('SUM(t_rates) as total');

		$this->db->from('nagadi_amount_details');

		$this->db->where('added_ward', $ward);
		if(!empty($date)) {
			$this->db->where('added', $date);
		}
		if(!empty($month)) {
			$this->db->where('SUBSTRING(added, 6,2)=',$month);
		}
		$this->db->where('initial_flag !=', 1);

		$query = $this->db->get();

		return $query->row(); 

	}

	//search total report
	// public function searchNagadiTotalByWard($ward) {
	// 	$date = $this->input->post('date');
	// 	$month = $this->input->post('month');
		
	// 	$this->db->select('SUM(t_rates) as total');

	// 	$this->db->from('nagadi_amount_details');

	// 	$this->db->where('added_ward', $ward);
		
	// 		$this->db->where('added', $date);
		
	// 		$this->db->where('SUBSTRING(added, 6,2)=',$month);
		
	// 	$this->db->where('initial_flag !=', 1);

	// 	$query = $this->db->get();

	// 	return $query->row(); 

	// }

	/*--------------------------------------------------------------------------------------

		//daily report

	/*---------------------------------------------------------------------------------------*/



	public function getNagadiTotalByTopicD($topic = NULL ,$ward= NULL, $date = NULL) {

		

		$this->db->select('SUM(t_rates) as total');

		$this->db->from('nagadi_amount_details');

		$this->db->where('main_topic', $topic);

		$this->db->where('added_ward', $ward);

		if(!empty($date)) {

			$this->db->where('added', $date);

		}
		$this->db->where('initial_flag !=', 1);
		$query = $this->db->get();

		return $query->row(); 

	}



	public function getNagadiTotalByMTD($topic = NULL,$date = NULL) {

		$this->db->select('SUM(t_rates) as total');

		$this->db->from('nagadi_amount_details');

		$this->db->where('main_topic', $topic);

		

		if(!empty($date)) {

			$this->db->where('added', $date);

		}
		$this->db->where('initial_flag !=', 1);
		$query = $this->db->get();

		return $query->row(); 

	}



	public function getNagadiTotalByWardD($ward,$date = NULL) {

		$this->db->select('SUM(t_rates) as total');

		$this->db->from('nagadi_amount_details');

		$this->db->where('added_ward', $ward);

		if(!empty($date)) {

			$this->db->where('added', $date);

		}
		$this->db->where('initial_flag !=', 1);
		$query = $this->db->get();



		return $query->row(); 

	}



    public function getNagadiMonthlyTotal($month =NULL, $ward =NULL, $main_topic= NULL) {

    	$this->db->select('SUM(t_rates) as total');

		$this->db->from('nagadi_amount_details');

    	$this->db->where('added_ward', $ward);

    	// $this->db->where('SUBSTRING(added, 6,2)', $month);
    	$this->db->where('SUBSTRING(added, 6,2)=',$month);

    	$this->db->where('main_topic', $main_topic);
    	$this->db->where('initial_flag !=', 1);
    	$query = $this->db->get();

    	return $query->row();

    }

    //get sampati details by ward
    public function getSampatiTotalByWard($ward) {
    	$date = $this->input->post('date');
    	$month = $this->input->post('month');
    	$this->db->select('SUM(net_total_amount) as sampati_total');
    	$this->db->from('sampati_kar_bhumi_kar_bill_details');
    	if(!empty($date)) {
    		$this->db->where('billing_date', $date);
    	}
    	if(!empty($month)) {
    		$this->db->where('SUBSTRING(billing_date, 6,2)=',$month);
    	}
    	$this->db->where('added_ward', $ward);
    	$this->db->where('status',1);
    	$query = $this->db->get();
    	return $query->row();
    }

}