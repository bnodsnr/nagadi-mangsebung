<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
    
    <title></title>
    <style>
   
    body{ 
        font-family: freesans; 
    }
       
      #customers {
          border-collapse: collapse;
          width: 100%;
      }

      #customers td, #customers th {
          border: 1px solid #000;
          padding: 8px;
      }
      #customers tr:hover {background-color: #000;}
      #customers th {
          text-align: left;
          color: #000;
      }

      #customers tbody td {
        font-size: 10px;
      }
      
      .container{
  	position: relative;
}

.container:after {
  content: "";
  display: block;
  width: 100%;
  height: 100%;
  position: absolute;
  top: 0px;
  left: 0px;
  background-image: url("http://bmsnep.com/bidur/ngd/assets/img/nepal-govt.png");
  background-size: 100px 100px;
  background-position: 30px 30px;
  background-repeat: no-repeat;
  opacity: 0.7;
}
  </style>
</head>
<body>
  <div id="container" style="">
    <div class="header">
      <div style="height: 100px;width: 100px; margin-left:20px;">
        <img src="<?php echo base_url()?>assets/img/nepal-govt.png" style="height: 100px; width: 110px;">
        <div style="font-size:10px;">आ ब: <?php echo $this->mylibrary->convertedcit($bill_details['fiscal_year'])?></div>
      </div>
      
      <div style="margin-left:300px; margin-top: -130px;">
        <div style="font-size: 16px"><?php echo GNAME?></div>
        <div style="margin-left: -20px;margin-top: 5px;font-size: 12px"><b><?php echo SLOGAN?></b></div>
        
        <div style="margin-left: 0px;margin-top: 5px;font-size: 12px"><?php echo 'विदुर,नुकवाकोट'
        
        ?>
        
        </div>
        
        <div style="margin-left: 0; font-size: 12px">कार्यलय कोड नं: <?php echo $this->mylibrary->convertedcit('-')?></div>
        <div style="margin-left: -45px; margin-top: 8px; font-size: 12px"><b>नगदी रशिद(सेवाग्राही प्रति <?php if($bill_details['print_count'] >0){echo 'प्रतिलिपी ';}?>)</b></div>
      </div>

      <div>
        <div style="height: 100px;width: 310px; margin-left:490px;margin-top: -29px;">
          <div style="margin-top: -60px; margin-left: 80px;font-size: 12px;">म.ले.प. फारम नं.१०१</div>
        
        </div>
        <div style="height: 100px;width: 310px; margin-left:490px; margin-top: -60px;">
          <div style="margin-top:0px; margin-left: 80px; font-size: 12px;"> रशिद नं: <?php echo $this->mylibrary->convertedcit($bill_details['bill_no']) ?></div>
          <div style="margin-top: 5px; margin-left:70px; font-size: 12px;">मिति: <?php echo $this->mylibrary->convertedcit($bill_details['date'])?></div>
         
        </div>
      </div>
    </div><!--end of header-->
    <div>

       <?php
        if($total_count == 1) {
        $margin_top = 'margin-top:15px';
      } else if($total_count == 2){
      $margin_top = 'margin-top:10px';
    }
      else {
        $margin_top = 'margin-top:-15px';
      }
      ?>

      <div style="width:500px;<?php echo $margin_top;?>">
        <div class= "title">
          <div style=" width:450px;margin-left: 10px;margin-top:-50px;font-size: 12px">
            श्री  <b><?php echo $bill_details['customer_name']?></b>  बाट देहाय बमोजिम जम्मा रु  <b><?php echo $this->mylibrary->convertedcit($bill_details['t_total']).'/-'?></b> ( अक्षररेपी <b><?php echo $this->convertlib->convert_number($bill_details['t_total'],"मात्र |").' '.'रुपैया मात्र )';?></b> प्राप्त भयो |
          </div>
        </div>
        <table id="customers">
          <tr>
            <th rowspan="2" style="font-size: 12px" align="center">क्र.सं</th>
            <th colspan="2" style="font-size: 12px"align="center">प्राप्ती शीर्षक</th>
            <th rowspan="2" style="font-size: 12px" align="center">वापत/प्रयाेजन</th>
             <th rowspan="2" align="center">परिमाण</th>
            <th rowspan="2" align="center">दर</th>
            <th rowspan="2" align="center">रकम रु</th>
           <th rowspan="2" style="font-size: 12px" align="center">प्राप्तीकाे माध्यम</th>
         </tr>
         <tr>
           <th>संकेत नम्बर</th>
           <th>विवरण</th>
         </tr>
         <?php
          $count = 0;
          $i =1;if(!empty($nagadi_detials)) : 
          foreach ($nagadi_detials as $key => $value): ?>
          <tr>
            <td style="font-size: 12px"><?php echo $this->mylibrary->convertedcit($i);?></td>
            <td style="font-size: 12px">
              <?php 
              echo $this->mylibrary->convertedcit($value['topic_no'])
              ?>
            </td>
            <td style="font-size: 12px"><?php echo $value['topic_name']?></td>
            <td style="font-size: 12px">
               <?php if($value['topic'] == 'others') {
                            $topic_title = $value['others_topic'];
                          } else {
                            $topic_title = $value['topic_title'];
                          }
                          echo $topic_title;
                        ?>
            </td>
             <td><?php echo $this->mylibrary->convertedcit($value['topic_qty'])?></td>
           <td><?php echo $this->mylibrary->convertedcit($value['rate']).'/-'?>
           </td>
            <td><?php echo $this->mylibrary->convertedcit($value['t_rates']).'/-'?></td>
            <td style="font-size: 12px"><?php echo 'नगद'?></td>
          </tr>
          <?php $i++;endforeach;endif;?>
           <tr>
            <td colspan="5" align="right" style="font-size: 12px">जम्मा रकम(अंकमा)</td>
            <td colspan="3" style="font-size: 12px"><?php echo 'रु.'.$this->mylibrary->convertedcit($bill_details['t_total']).'/-'?></td>
          </tr>
        </table>
      </div>
      <?php
        if($total_count == 1) {
        $margin_top = 'margin-top:-160px';
      } else if($total_count == 2){
      $margin_top = 'margin-top:-230px';
    }
      else {
        $margin_top = 'margin-top:-246px';
      }
      ?>
      <div style="width:400px;margin-left: 530px;border:1px solid; border-radius: 25px; <?php echo $margin_top?>">
        <ul>
          <li style="font-size: 10px;">नियमित कर तिरी नगरकाे विकास निर्माणमा सहभागी बनौ ।</li>
          <li style="font-size: 10px;">तिर्नुपर्ने सम्पूर्ण कर चुक्ता नगरेसम्म कुनैपनि सेवा सुविधा उपलब्ध गराउन कार्यलय बाध्य हुने छैन ।</li>
          <li style="font-size: 10px;">कर तिर्नु सवै नगरवासीहरुकाे कर्तव्य हाे भने सेवा प्राप्त गर्नु अधिकार हाे ।</li>
          <li style="font-size: 10px;">कर तिराैं, सभ्य नागरिक बनाैं ।</li>
          <li style="font-size: 10px;">हाम्राे ठाउँ सवै मिलेर राम्राे बनाऔ‌ं।</li>
        </ul>
      </div>
    </div>
     <?php
        if($total_count == 1) {
        $margin_top = 'margin-top:-30px';
      } else if($total_count <= 3){
        $margin_top = 'margin-top:40px';
      }
      else {
        $margin_top = 'margin-top:120px';
      }
    ?>
    <div class="recived_details">
        <div style="font-size: 12px; <?php echo $margin_top?>">
          बुझाउनेकाे सही:
        </div>
        <div style="font-size: 12px">
          स्थायी लेखा नं: <?php echo $this->mylibrary->convertedcit($bill_details['pan_no'])?>
        </div>
    </div>

    <?php
        if($total_count == 1) {
        $margin_top = 'margin-top:-30px';
      } else if($total_count <= 3){
        $margin_top = 'margin-top:-30px';
      }
      else {
        $margin_top = 'margin-top:-30px';
      }
    ?>
    <div style="margin-left:400px; <?php echo $margin_top?>; font-size: 12px">
        <div style="font-size: 12px">बुझिलिनेकाे सही :</div>
        <div style="font-size: 12px">नाम: <?php echo $user->name?></div>
        <div style="font-size: 12px">दर्जा: <?php echo $user->designation?></div>
        <div style="font-size: 12px"> कर्मचारी संकेत नं:  <?php echo $this->mylibrary->convertedcit($user->symbol_no)?></div>
    </div>

    <div style="margin-left: 150px;margin-top: 5px;"><b>नियमानुसार कर / दस्तुर तिर्नु भएकोमा धन्यवाद !!! !!!</b></div>
  </div> <!--end of container-->
<div style="height: 40px;">------------------------------------------------------------------------------------------------------------------------------------------</div>
  <div id="container">
    <div class="header">
      <div style="height: 100px;width: 100px; margin-left:20px;">
        <img src="<?php echo base_url()?>assets/img/nepal-govt.png" style="height: 100px; width: 110px;">
        <div style="font-size:10px;">आ ब: <?php echo $this->mylibrary->convertedcit($bill_details['fiscal_year'])?></div>
      </div>
      
      <div style="margin-left:300px; margin-top: -130px;">
        <div style="font-size: 16px"><?php echo GNAME?></div>
        <div style="margin-left: -20px;margin-top: 5px;font-size: 12px"><b><?php echo SLOGAN?></b></div>
        
        <div style="margin-left: 0px;margin-top: 5px;font-size: 12px"><?php echo 'विदुर,नुकवाकोट'
        
        ?>
        
        </div>
        <div style="margin-left: -45px; margin-top: 8px; font-size: 12px"><b>नगदी रशिद(कार्यालय प्रति <?php if($bill_details['print_count'] >0){echo 'प्रतिलिपी ';}?>)</b></div>
      </div>

      <div>
        <div style="height: 100px;width: 310px; margin-left:490px;margin-top: -10px;">
          <div style="margin-top: -60px; margin-left: 80px;font-size: 12px;">म.ले.प. फारम नं.१०१</div>
         
        </div>
        <div style="height: 100px;width: 310px; margin-left:490px; margin-top: -70px;">
          <div style="margin-top:0px; margin-left: 80px;"> रशिद नं: <?php echo $this->mylibrary->convertedcit($bill_details['bill_no']) ?></div>
          <div style="margin-top: 5px; margin-left:70px;">मिति: <?php echo $this->mylibrary->convertedcit($bill_details['date'])?></div>
         
        </div>
      </div>
    </div><!--end of header-->
    <div>

       <?php
        if($total_count == 1) {
        $margin_top = 'margin-top:-15px';
      } else if($total_count == 2){
      $margin_top = 'margin-top:-20px';
    }
      else {
        $margin_top = 'margin-top:-15px';
      }
      ?>

      <div style="width:500px;<?php echo $margin_top;?>">
        <div class= "title">
          <div style=" width:450px;margin-left: 10px;margin-top:-50px;font-size: 12px">
            श्री  <b><?php echo $bill_details['customer_name']?></b>  बाट देहाय बमोजिम जम्मा रु  <b><?php echo $this->mylibrary->convertedcit($bill_details['t_total'])?></b> ( अक्षररेपी <b><?php echo $this->convertlib->convert_number($bill_details['t_total'],"मात्र |").' '.'रुपैया मात्र )';?></b> प्राप्त भयो |
          </div>
        </div>
        <table id="customers">
          <tr>
            <th rowspan="2" style="font-size: 12px" align="center">क्र.सं</th>
            <th colspan="2" style="font-size: 12px"align="center">प्राप्ती शीर्षक</th>
            <th rowspan="2" style="font-size: 12px" align="center">वापत/प्रयाेजन</th>
             <th rowspan="2" align="center">परिमाण</th>
            <th rowspan="2" align="center">दर</th>
            <th rowspan="2" align="center">रकम रु</th>
           <th rowspan="2" style="font-size: 12px" align="center">प्राप्तीकाे माध्यम</th>
         </tr>
         <tr>
           <th>संकेत नम्बर</th>
           <th>विवरण</th>
         </tr>
         <?php
          $count = 0;
          $i =1;if(!empty($nagadi_detials)) : 
          foreach ($nagadi_detials as $key => $value): ?>
          <tr>
            <td style="font-size: 12px"><?php echo $this->mylibrary->convertedcit($i);?></td>
            <td style="font-size: 12px">
              <?php 
              echo $this->mylibrary->convertedcit($value['topic_no'])
              ?>
            </td>
            <td style="font-size: 12px"><?php echo $value['topic_name']?></td>
            <td style="font-size: 12px">
               <?php if($value['topic'] == 'others') {
                            $topic_title = $value['others_topic'];
                          } else {
                            $topic_title = $value['topic_title'];
                          }
                          echo $topic_title;
                        ?>
            </td>
             <td><?php echo $this->mylibrary->convertedcit($value['topic_qty'])?></td>
           <td><?php echo $this->mylibrary->convertedcit($value['rate']).'/-'?>
           </td>
            <td><?php echo $this->mylibrary->convertedcit($value['t_rates']).'/-'?></td>
            <td style="font-size: 12px"><?php echo 'नगद'?></td>
          </tr>
          <?php $i++;endforeach;endif;?>
           <tr>
            <td colspan="5" align="right" style="font-size: 12px">जम्मा रकम(अंकमा)</td>
            <td colspan="3" style="font-size: 12px"><?php echo 'रु.'.$this->mylibrary->convertedcit($bill_details['t_total']).'/-'?></td>
          </tr>
        </table>
      </div>
      <?php
        if($total_count == 1) {
        $margin_top = 'margin-top:-160px';
      } else if($total_count == 2){
      $margin_top = 'margin-top:-200px';
    }
      else {
        $margin_top = 'margin-top:-306px';
      }
      ?>
      <div style="width:400px;margin-left: 530px;border:1px solid; border-radius: 25px; <?php echo $margin_top?>">
        <ul>
          <li style="font-size: 10px;">नियमित कर तिरी नगरकाे विकास निर्माणमा सहभागी बनौ ।</li>
          <li style="font-size: 10px;">तिर्नुपर्ने सम्पूर्ण कर चुक्ता नगरेसम्म कुनैपनि सेवा सुविधा उपलब्ध गराउन कार्यलय बाध्य हुने छैन ।</li>
          <li style="font-size: 10px;">कर तिर्नु सवै नगरवासीहरुकाे कर्तव्य हाे भने सेवा प्राप्त गर्नु अधिकार हाे ।</li>
          <li style="font-size: 10px;">कर तिराैं, सभ्य नागरिक बनाैं ।</li>
          <li style="font-size: 10px;">हाम्राे ठाउँ सवै मिलेर राम्राे बनाऔ‌ं।</li>
        </ul>
      </div>
    </div>
     <?php
        if($total_count == 1) {
        $margin_top = 'margin-top:-30px';
      } else if($total_count == 2){
        $margin_top = 'margin-top:0px';
      }
      else {
        $margin_top = 'margin-top:120px';
      }
    ?>
    <div class="recived_details">
        <div style="font-size: 12px; <?php echo $margin_top?>">
          बुझाउनेकाे सही:
        </div>
        <div style="font-size: 12px">
          स्थायी लेखा नं: <?php echo $this->mylibrary->convertedcit($bill_details['pan_no'])?>
        </div>
    </div>

    <?php
        if($total_count == 1) {
        $margin_top = 'margin-top:-30px';
      } else if($total_count <= 3){
        $margin_top = 'margin-top:-30px';
      }
      else {
        $margin_top = 'margin-top:-30px';
      }
    ?>
    <div style="margin-left:400px; <?php echo $margin_top?>; font-size: 12px">
        <div style="font-size: 12px">बुझिलिनेकाे सही :</div>
        <div style="font-size: 12px">नाम: <?php echo $user->name?></div>
        <div style="font-size: 12px">दर्जा: <?php echo $user->designation?></div>
        <div style="font-size: 12px"> कर्मचारी संकेत नं:  <?php echo $this->mylibrary->convertedcit($user->symbol_no)?></div>
    </div>
    <?php
        $style = "";
        if($total_count == 1) {
          $style .= 'margin-left: 150px;margin-top:5px;';
        } else if($total_count <= 3){
         $style .= 'margin-left: 150px;margin-top:5px;';
        }
        else {
         $style .= 'margin-left: 350px;margin-top:-205px;';
      }
     
    ?>
    <div style="<?php echo $style?>"><b>नियमानुसार कर तिर्नु भएकाेमा धन्यवाद !!!</b></div>
  </div> <!--end of container-->

</body>
</html>