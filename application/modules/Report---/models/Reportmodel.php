<?php 
/**
 * 
 */
class Reportmodel extends CI_Model
{

	public function __construct()
	{
		parent:: __construct();
      	$this->today = convertdate(date('Y-m-d'));
      	$this->current_month = get_current_month();
	}

	/**--------------------------------------------------------------------------------
		NAGADI DETIALS
	-----------------------------------------------------------------------------------**/
	public function MonthlyNagadiCollection($topic_id,$month =NULL,$ward = NULL) {
		$month = !empty($month)?$month:$this->current_month;
		$this->db->select('SUM(t_rates) as total');
		$this->db->from('nagadi_amount_details');
		if(!empty($topic_id)) {
			$this->db->where('main_topic', $topic_id);
		}
		if(!empty($ward)){
			$this->db->where('added_ward', $ward);
		}
		$this->db->where('SUBSTRING(added, 6,2)=',$month);
		$this->db->where('initial_flag !=', 1);
		$this->db->order_by('bill_no', 'ASC');
		$query =$this->db->get();
		return $query->row_array();
	}
	public function getNagadiDetailsByTopic($topic_id = NULL, $month =NULL, $ward = NULL ){
		$this->db->select('t1.*,t2.customer_name,t2.payment_mode,t2.status,t3.topic_name,t4.sub_topic,t5.topic_title,t6.reason,t7.name');
		$this->db->from('nagadi_amount_details t1');
		$this->db->join('nagadi_rasid t2', 't2.guid = t1.guid', 'left');
		$this->db->join('main_topic t3','t3.id = t1.main_topic','left');
		$this->db->join('topic t4','t4.id = t1.sub_topic','left');
		$this->db->join('sub_topic t5','t5.id = t1.topic','left');
		$this->db->join('nagadi_cancle_reason t6','t6.trans_id = t2.id','left');
		$this->db->join('users t7','t7.userid = t1.added_by','left');
		if(!empty($topic_id)) {
			$this->db->where('t1.main_topic', $topic_id);
		}
		if(!empty($month)) {
			$this->db->where('SUBSTRING(t1.added, 6,2)=',$month);
		}
		if(!empty($ward)) {
			$this->db->where('t1.added_ward', $ward);
		}
		$this->db->order_by('t1.added','ASC');
		$query = $this->db->get();
		return $query->result_array();
	}

	public function getNagadiCancelAmountDetailsByMonth($topic_id = NULL, $month =NULL, $ward = NULL) {
		$this->db->select('SUM(t_rates) as cancel_bills')->from('nagadi_amount_details');
		if(!empty($topic_id)) {
			$this->db->where('main_topic', $topic_id);
		}
		if(!empty($month)) {
			$this->db->where('SUBSTRING(added, 6,2)=',$month);
		}
		if(!empty($ward)) {
			$this->db->where('added_ward', $ward);
		}
		$this->db->where('initial_flag',1);
		$query = $this->db->get();
		return $query->row_array();
	}

	/**--------------------------------------------------------------------------------
		Sampatikar details
	-----------------------------------------------------------------------------------**/
	public function MonthlySampatiKarCollection($month = NULL, $ward_no =NULL) {
		$month = !empty($month)?$month:$this->current_month;
		$this->db->select('SUM(net_total_amount) as total');
		$this->db->from('sampati_kar_bhumi_kar_bill_details');
		if(!empty($month)) {
			$this->db->where('SUBSTRING(billing_date, 6,2)=',$month);
		}
		if(!empty($ward_no)) {
			$this->db->where('added_ward', $ward_no);
		}
		$this->db->where('status',1);
		$query =$this->db->get();
		return $query->row_array();
	}

	public function getMonthlySampatiKarDetails($month, $ward ) {
		$this->db->select('t1.*, t2.land_owner_name_np, t3.reason,t4.name')->from('sampati_kar_bhumi_kar_bill_details t1');
		$this->db->join('land_owner_profile_basic t2','t2.file_no = t1.nb_file_no','left');
		$this->db->join('sampati_rasid_cancel_reason t3','t3.bill_no = t1.bill_no','left');
		$this->db->join('users t4','t4.userid = t1.added_by','left');
		if(!empty($month)) {
			$this->db->where('SUBSTRING(t1.billing_date, 6,2)=',$month);
		}
		if(!empty($ward)) {
			$this->db->where('t1.added_ward', $ward);
		}
		$this->db->order_by('t1.bill_no','ASC');
		$query = $this->db->get();
		return $query->result_array();
	}

	public function getCancelSampatikarAmountDetailsByMonth($month, $ward ) {
		$this->db->select('SUM(net_total_amount) as sampati_cancel_bills')->from('sampati_kar_bhumi_kar_bill_details');
		
		$this->db->where('SUBSTRING(billing_date, 6,2)=',$month);
		$this->db->where('added_ward', $ward);
		$this->db->where('status',2);
		$query = $this->db->get();
		return $query->row_array();

	}

	/**
		* This function get all billing details by day in report
		* @param date ward.
		* @return array
	*/

	public function getAllMonthlyReportDetails($month = NULL, $ward =NULL, $topic_id= NULL) {

		$this->db->select('

			t1.*,

			t2.customer_name,

			t2.payment_mode,

			t2.status,

			t3.topic_name,

			t4.sub_topic,

			t5.topic_title,

			t6.reason,
			t7.name

		');

		$this->db->from('nagadi_amount_details t1');

		$this->db->join('nagadi_rasid t2', 't2.guid = t1.guid', 'left');

		$this->db->join('main_topic t3','t3.id = t1.main_topic','left');

		$this->db->join('topic t4','t4.id = t1.sub_topic','left');

		$this->db->join('sub_topic t5','t5.id = t1.topic','left');

		$this->db->join('nagadi_cancle_reason t6','t6.trans_id = t2.id','left');
		$this->db->join('users t7','t7.userid = t1.added_by','left');
		$this->db->where('SUBSTRING(t1.added, 6,2)=',$month);
		if(!empty($ward)){
			$this->db->where('t1.added_ward', $ward);
		}
		if(!empty($topic_id)) {

			$this->db->where('t1.main_topic', $topic_id);

		}
		$this->db->order_by('t1.added','ASC');

		$query = $this->db->get();

		return $query->result_array();

	}


	/** -------------------------------------------------------------------------------------
search
-----------------------------------------------------------------------------------------*/

	public function getNagadiSearchDetails($from_date =NULL,$to_date=NULL, $ward_no=NULL, $user = NULL) {
		$this->db->select('

			t1.*,
			t1.bill_no,
			t1.added_by,
			t1.added_ward,
			t2.customer_name,

			t2.payment_mode,

			t2.status,

			t3.topic_name,

			t4.sub_topic,

			t5.topic_title,

			t6.reason,
			t7.name

		');

		$this->db->from('nagadi_amount_details t1');

		$this->db->join('nagadi_rasid t2', 't2.guid = t1.guid', 'left');

		$this->db->join('main_topic t3','t3.id = t1.main_topic','left');

		$this->db->join('topic t4','t4.id = t1.sub_topic','left');

		$this->db->join('sub_topic t5','t5.id = t1.topic','left');

		$this->db->join('nagadi_cancle_reason t6','t6.trans_id = t2.id','left');
		$this->db->join('users t7','t7.userid = t1.added_by','left');

		if(!empty($from_date) && !empty($to_date)) {

			$this->db->where('added >=', $from_date);

			$this->db->where('added <=', $to_date);

		}
		if($this->session->userdata('PRJ_USER_ID') != 1){
			$this->db->where('t1.added_ward', $this->session->userdata('PRJ_USER_WARD'));
		}
		if(!empty($ward_no) ) {

			if($ward_no == 'nagarpalika'){
				$this->db->where('t1.added_ward','0');
			}
			else {
				$this->db->where('t1.added_ward', $ward_no);
			}

		}
		if(!empty($user)){
			$this->db->where('t1.added_by', $user);
		}
		$this->db->order_by('t1.bill_no', 'ASC');
		$query = $this->db->get();

		return $query->result_array();

  	}



  	public function getCancelAmountDetailsBySearch($from_date =NULL,$to_date=NULL, $ward =NULL,$user=NULL) {
  		
		$this->db->select('SUM(t_rates) as cancel_bills')->from('nagadi_amount_details');

		if(!empty($from_date) && !empty($to_date)) {
			$this->db->where('added >=', $from_date);
			$this->db->where('added <=', $to_date);
		}

		if($this->session->userdata('PRJ_USER_ID') != 1){
			$this->db->where('added_ward', $this->session->userdata('PRJ_USER_WARD'));
		}

		if(!empty($ward)) {
			if($ward == 'nagarpalika'){
				$this->db->where('added_ward','0');
			}
			else {
				$this->db->where('added_ward', $ward);
			}
		}
		if(!empty($user)){
			$this->db->where('added_by', $user);
		}
		$this->db->where('initial_flag',1);

		$query = $this->db->get();

		return $query->row_array();



	}



	public function getSearchSampatiKarDetails($from_date =NULL,$to_date=NULL, $ward =NULL, $user=NULL) {

		$this->db->select('t1.*, t2.land_owner_name_np, t3.reason,t4.name')->from('sampati_kar_bhumi_kar_bill_details t1');

		$this->db->join('land_owner_profile_basic t2','t2.file_no = t1.nb_file_no','left');

		$this->db->join('sampati_rasid_cancel_reason t3','t3.bill_no = t1.bill_no','left');
		$this->db->join('users t4','t4.userid = t1.added_by','left');

		if(!empty($from_date) && !empty($to_date)) {

			$this->db->where('t1.billing_date >=', $from_date);

			$this->db->where('t1.billing_date <=', $to_date);

		}

		if($this->session->userdata('PRJ_USER_ID') != 1){
			$this->db->where('t1.added_ward', $this->session->userdata('PRJ_USER_WARD'));
		}

		if(!empty($ward) ) {

			$this->db->where('t1.added_ward', $ward);

		}

		if(!empty($user)){
			$this->db->where('t1.added_by', $user);
		}

		$query = $this->db->get();

		return $query->result_array();

	}





	public function getCancelSampatikarAmountDetailsBySearch($from_date =NULL,$to_date=NULL,$ward =NULL, $user=NULL) {
		$this->db->select('SUM(net_total_amount) as sampati_cancel_bills')->from('sampati_kar_bhumi_kar_bill_details');
		if(!empty($from_date) && !empty($to_date)) {
			$this->db->where('billing_date >=', $from_date);
			$this->db->where('billing_date <=', $to_date);
		}
		if($this->session->userdata('PRJ_USER_ID') != 1){
			$this->db->where('added_ward', $this->session->userdata('PRJ_USER_WARD'));
		}
		if(!empty($ward) ) {
			$this->db->where('added_ward', $ward);
		}

		if(!empty($user)){
			$this->db->where('added_by', $user);
		}
		$this->db->where('status',2);

		$query = $this->db->get();

		return $query->row_array();

	}

}