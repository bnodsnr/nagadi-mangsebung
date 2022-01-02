<?php 

class BillSettingModel extends CI_Model {
    
    public function __construct()
    {
        parent::__construct();
    }
	//get get user
	public function getUser() {
		return $this->db->select('userid,user_name,name')
				->from('users')
				->where('userid !=', 1)
				->get()
				->result_array();
	}

	public function getBillData() {
	    
		$sql = '
				select t1.* ,t2.userid,t2.user_name,t2.name,t2.ward from settings_bill_setup as t1
	            left join users as t2 on t2.userid = t1.user_id where t1.fiscal_year = "2078/079"
		';
		$query = $this->db->query($sql);
		return $query->result_array();
	}
}