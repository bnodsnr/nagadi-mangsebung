<?php if (!defined('BASEPATH')) exit('No direct script access allowed');



class Mylibrary{



    function __construct(){

        $this->CI=& get_instance();

        $this->CI->load->helper('form');

        $this->CI->load->helper('url');

    }

    function convertNos($nos)

    {

        $n = '';

      switch($nos){

        case "०": $n = 0; break;

        case "१": $n = 1; break;

        case "२": $n = 2; break;

        case "३": $n = 3; break;

        case "४": $n = 4; break;

        case "५": $n = 5; break;

        case "६": $n = 6; break;

        case "७": $n = 7; break;

        case "८": $n = 8; break;

        case "९": $n = 9; break;

        

        case "0": $n = "०"; break;

        case "1": $n = "१"; break;

        case "2": $n = "२"; break;

        case "3": $n = "३"; break;

        case "4": $n = "४"; break;

        case "5": $n = "५"; break;

        case "6": $n = "६"; break;

        case "7": $n = "७"; break;

        case "8": $n = "८"; break;

        case "9": $n = "९"; break;

       }

       return $n;

    }

    function convertedcit($string)

    {

        $string = str_split($string);

        $out = '';

        foreach($string as $str)

        {

            if(is_numeric($str))

            {
                $out .= $this->convertNos($str);
                     
            }
            else
            {
                $out .=$str;
            }
        }
        return $out;
    }

    function devanagari($num)
    {
        $num_nepali = array('०','१','२','३','४','५','६','७','८','९');
        $num_eng    = array('0','1','2','3','4','5','6','7','8','9');
        $nums       = str_replace($num_eng, $num_nepali, $num);
        return $nums;
    }

    function englishnum($num)
    {
        $num_nepali     = array('०','१','२','३','४','५','६','७','८','९');
        $num_eng        = array('0','1','2','3','4','5','6','7','8','9');
        $nums           = str_replace($num_nepali, $num_eng, $num);
        return $nums;
    }

}