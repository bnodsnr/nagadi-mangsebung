<?php

/**
 * Created by PhpStorm.
 * User: root
 */
class SearchModel extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function getLandDetails( $k_number ) {
        $this->db->select('t1.*,t2.road_name, t3.land_area_type,t4.land_owner_name_np')->from('land_description_details t1');
        $this->db->join('settings_road t2', 't2.id = t1.road_name','left');
        $this->db->join('settings_land_area_type t3', 't3.id = t1.land_area_type','left');
        $this->db->join('land_owner_profile_basic t4', 't4.file_no = t1.ld_file_no','left');
        $this->db->where('t1.k_number', $k_number);
        $query = $this->db->get();
        return $query->result_array();
    }
}