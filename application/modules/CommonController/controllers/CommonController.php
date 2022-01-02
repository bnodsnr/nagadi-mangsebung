<?php

defined('BASEPATH') OR exit('No direct script access allowed');



class CommonController extends MX_Controller

{	

	public function __construct()
	{
		parent:: __construct();
	}

	public function Index(){}
    public function convertNum() {
        $num = $this->input->post('num');
        $converted_num = $this->mylibrary->englishnum($num);
        echo $converted_num;
   }

}