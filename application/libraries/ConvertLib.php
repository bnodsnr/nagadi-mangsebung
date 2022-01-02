<?php
/**
 * 
 */
class Convertlib
{
	
	public function __construct()
	{
		$this->two_digit = array(
			0 => "",
			1 => "एक",
			2 => "दुइ",
			3 => "तीन",
			4 => "चार",
			5 => "पाच",
			6 => "छ",
			7 => "सात",
			8 => "आठ",
			9 => "नौ",
			10 => "दश",
			11 => "एघार",
			12 =>"बाह्र",13=>"तेह्र",14=>"चौध",15=>"पन्ध्र" ,16=>"सोह्र",
			17=>"सत्र",18=>"अठार",19=>"उन्नाइस",20=>"बिस",21=>"एक्काइस", 22=>"बाइस", 23=>"तेईस", 24=>"चौविस", 25=>"पच्चिस", 26=>"छब्बिस", 27=>"सत्ताइस", 28=>"अठ्ठाईस", 29=>"उनन्तिस", 
			30=>"तिस", 31=>"एकत्तिस", 32=>"बत्तिस", 33=>"तेत्तिस" ,34=>"चौँतिस", 35=>"पैँतिस", 36=>"छत्तिस", 37=>"सैँतीस", 38=>"अठतीस", 39=>"उनन्चालीस", 
			40=>"चालीस", 41=>"एकचालीस", 42=>" बयालीस", 43=>"त्रियालीस", 44=>"चवालीस", 45=>"पैँतालीस", 46=>"छयालीस", 47=>"सच्चालीस", 48=>"अठचालीस", 49=>"उनन्चास", 
			50=>"पचास", 51=>"एकाउन्न", 52=>"बाउन्न", 53=>"त्रिपन्न", 54=>"चउन्न", 55=>"पचपन्न", 56=>"छपन्न", 57=>"सन्ताउन्न", 58=>"अन्ठाउन्न", 59=>"उनन्साठी", 
			60=>"साठी", 61=>"एकसट्ठी", 62=>"बयसट्ठी", 63=>"त्रिसट्ठी", 64=>"चौंसट्ठी", 65=>"पैंसट्ठी", 66=>"छयसट्ठी", 67=>"सतसट्ठी", 68=>"अठसट्ठी", 69=>"उनन्सत्तरी", 
			70=>"सत्तरी", 71=>"एकहत्तर", 72=>"बहत्तर", 73=>"त्रिहत्तर", 74=>"चौहत्तर", 75=>"पचहत्तर", 76=>"छयहत्तर", 77=>"सतहत्तर", 78=>"अठहत्तर", 79=>"उनासी", 
			80=>"असी", 81=>"एकासी", 82=>"बयासी", 83=>"त्रियासी", 84=>"चौरासी", 85=>"पचासी", 86=>"छयासी", 87=>"सतासी", 88=>"अठासी", 89=>"उनान्नब्बे", 
			90=>"नब्बे", 91=>"एकान्नब्बे", 92=>"बयानब्बे", 93=>"त्रियान्नब्बे", 94=>"चौरान्नब्बे", 95=>"पन्चानब्बे", 96=>"छयान्नब्बे", 97=>"सन्तान्नब्बे", 98=>"अन्ठान्नब्बे", 99=>"उनान्सय");
		$matra="मात्र |";
	}

	function twoDigit($num)
	{
		if(intval($num)==0)
		{
			return "";
		}
		else{
			$new = intval($num); 
			return $this->two_digit[$new];
		}
	}
	function threeDigit($num)
	{
		if(substr($num,0,1)==0)
		{
			$output = $this->twoDigit(substr($num,1,2));
		}
		elseif(intval(substr($num,1,2)!=0))
		{
			$result = $this->twoDigit(substr($num,0,1));
			$result2 = $this->twoDigit(substr($num,1,2));
			$output = $result. " सय ". $result2;
		}
		elseif(intval(substr($num,1,2)==0))
		{
			$result = $this->twoDigit(substr($num,0,1));
			$result2 = $this->twoDigit(substr($num,1,2));
			$output = $result. " सय ". $result2;
		}
		return $output ;
	}
	function fiveDigit($num)
	{   
		if(intval(substr($num,0,2)==0))
		{
			$output = $this->threeDigit(substr($num,2,3));
		}
		elseif(intval(substr($num,0,2)!=0))
		{
			$output =  $this->twoDigit(substr($num,0,2))." हजार ". $this->threeDigit(substr($num,2,3));
		}
		elseif((substr($num,0,5)==0))
		{
			$output="";
		}
		return $output ;
	}
	function sevenDigit($num)
	{
		if(intval(substr($num,0,2)==0))
		{
			$output= $this->fiveDigit(substr($num,2,5));
		}
		elseif(intval(substr($num,0,2)!=0))
		{
			$output=  $this->twoDigit(substr($num,0,2))." लाख ". $this->fiveDigit(substr($num,2,5));
		}
		elseif((substr($num,0,7)==0))
		{
			$output="";
		}
		return $output ;
	}

	function convert_number($post)
	{
		$length= strlen($post);
		$num = $post;
		$output = $this->twoDigit(substr($num,-2));
		if($length==3)
		{
			$output = $this->threeDigit($num);
			
		}
		if($length==4)
		{

			$result = $this->threeDigit(substr($num,1,3));
			$res = $this->twoDigit(substr($num,0,1));
			$output = $res. " हजार ".$result;
		}
		if($length==5)
		{
			$result = $this->twoDigit(substr($num,0,2));
			$res = $this->threeDigit(substr($num,2,3));
			$output = $result. " हजार ".$res;
		}
		if($length==6)
		{
			$result = $this->twoDigit(substr($num,0,1));
			$res = $this->fiveDigit(substr($num,1,5));
			$output = $result." लाख ".$res;
		}
		if($length==7)
		{
			$result = $this->twoDigit(substr($num,0,2));
			$res = $this->fiveDigit(substr($num,2,5));
			$output = $result." लाख ".$res;
		}
		if($length==8)
		{
			$result = $this->twoDigit(substr($num,0,1));
			$res = $this->sevenDigit(substr($num,1,7));
			$output = $result." करोड ".$res;
		}
		if($length==9)
		{
			$result = $this->twoDigit(substr($num,0,2));
			$res= $this->sevenDigit(substr($num,2,7));
			$output=$result." करोड ".$res;
		}
		return $output; 

	}
	function convert($post)
	{
		$result = '';
		$num = explode(".",$post);

		$result .= $this->convert_number($num[0]).' रुपैया ';
		if(!empty($num[1]))
		{ 
			$num = substr($num[1], 0, 2);
			if($num != 00) {
				$result .= "-" .$this->convert_number($num)." पैसा ";
			}
		}
		else
		{
			$result .= "";
		}
		//pp($reuslt);
		return $result;
	}
}