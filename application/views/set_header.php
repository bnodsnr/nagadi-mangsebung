<html>

	<head>
		<meta charset="UTF-8">
		<meta http-equiv="cache-control" content="no-cache">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta name="description" content="">
		<meta name="author" content="">
		<meta name="keyword" content="">
		<link rel="shortcut icon" href="<?php echo base_url()?>assets/img/nepal-govt.png">
		<title><?php echo GNAME?></title>
		<!-- Bootstrap core CSS -->
		<link href="<?php echo base_url()?>assets/css/bootstrap.min.css" rel="stylesheet">
		<link href="<?php echo base_url()?>assets/css/bootstrap-reset.css" rel="stylesheet">
		<!--external css-->
		<link href="<?php echo base_url()?>assets/assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
		<link rel="stylesheet" type="text/css"
			href="<?php echo base_url()?>assets/assets/gritter/css/jquery.gritter.css" />
		<!--right slidebar-->
		<link href="<?php echo base_url('assets/datatable/datatables.min.css') ?>" rel="stylesheet">
		<link href="<?php echo base_url()?>assets/nepali_datepicker/nepali.datepicker.v2.2.min.css" rel="stylesheet" />
		<link href="<?php echo base_url()?>assets/css/slidebars.css" rel="stylesheet">
		<!-- Custom styles for this template -->
		<link href="<?php echo base_url()?>assets/css/style.css" rel="stylesheet" />
		<link href="<?php echo base_url()?>assets/css/style-responsive.css" rel="stylesheet" />
		<link href="<?php echo base_url()?>assets/toastr-master/toastr.css" rel="stylesheet" type="text/css" />
		<link rel="stylesheet" type="text/css"
			href="<?php echo base_url()?>assets/assets/select2/css/select2.min.css" />
		<script src="<?php echo base_url()?>assets/js/jquery.js"></script>
		<script type="text/javascript">
			var base_url = "<?php echo base_url()?>";
		</script>
	</head>

	<body>
		<section id="container" class="">
			<!--header start-->
			<header class="header white-bg">
				<div class="sidebar-toggle-box">
					<i class="fa fa-bars" style="color:#FFF"></i>
				</div>
				<!--logo start-->
				<a href="javascript;" class="logo">
					<img src="<?php echo base_url()?>assets/img/nepal-govt.png">
					<?php echo GNAME?>
				</a>
				<?php if($this->session->userdata('PRJ_USER_ID') == 1):?>
					<div class="nav notify-row" id="top_menu">
			              <!--  notification start -->
			              <ul class="nav top-menu">
			                  <!-- settings start -->
			                  <li class="dropdown">
			                      <a class="" href="<?php echo base_url()?>Settings/MenuSetup" aria-expanded="false">
			                          <i class="fa fa-cogs"></i>
			                          <span class="badge badge-success"></span>
			                      </a>
			                  </li>
			                  <!-- settings end -->
			                  
			              </ul>
			              <!--  notification end -->
			         </div>
		     	<?php endif;?>
				<!--logo end-->
				 <div class="top-nav ">
		              <!--search & user info start-->
		            <ul class="nav pull-right top-menu">
	                  <!-- user login dropdown start-->
	                  <li class="dropdown">
	                      <a data-toggle="dropdown" class="dropdown-toggle" href="#">
	                          <img alt="" src="<?php echo base_url()?>assets/img/npl.png" style="height: 20px;">
	                         <?php echo $this->session->userdata('PRJ_USER_NAME')?>
								<span class="username"><i class="fa fa-user"></i></span>
								<b class="caret"></b>
	                      </a>
	                      <ul class="dropdown-menu extended logout dropdown-menu-right">
	                          <div class="log-arrow-up"></div>
	                        	<li><a href="<?php echo base_url()?>Userprofile/ViewProfile/<?php echo $this->session->userdata('PRJ_USER_ID')?>"><i class=" fa fa-suitcase"></i>प्रोफाइल हेर्नुहोस्</a></li> 
	                          	<li><a href="<?php echo base_url()?>Changepassword"><i class="fa fa-cog"></i>पासवर्ड परिवर्तन</a></li>
	                          	<li><a href="<?php echo base_url()?>Dashboard/dbbackup"><i class="fa fa-cloud-download"></i>डाटा ब्याकअप</a></li>
	                          	<li><a href="<?php echo base_url()?>Logout"><i class="fa fa-key"></i> लग आउट गर्नुहोस्</a></li>
	                      </ul>
	                  </li>
	                  <!-- user login dropdown end -->
		             </ul>
		              <!--search & user info end-->
		          </div>
			</header>
			<!--sidebar start-->
			<aside>
				<div id="sidebar" class="nav-collapse ">
					<div id="sidebar_nav">
						<ul class="sidebar-menu" id="nav-accordion" style="color:blue;">
							<?php
              					$user_id = $this->session->userdata('PRJ_USER_ID');
              					$link = $this->uri->segment(1);
              					$gid = $this->session->userdata('PRJ_USER_GROUP');
              					$sql = "SELECT * FROM admin_menu m WHERE fn_CheckMenuPermission(m.menuid,". $user_id .") = 1 AND  m.parent_id='0' AND m.status=1 AND m.group_label =''  ORDER BY m.position ";
              					$query = $this->db->query($sql);
              					if($query->num_rows()>0){
                					foreach($query->result() as $row):
                  					$check_parent = "SELECT * FROM admin_menu WHERE parent_id = '$row->menuid'";
                  					$cp = $this->db->query($check_parent);
					                if(!empty($cp->result())){
					                	if($this->uri->uri_string() == $row->menu_name) { 
                      						echo 'active';
                  						}
					                    echo '<li class="sub-menu" active><a href="javascript:;"><i class="'.$row->icon_class.'"></i><span class="title">'.$row->menu_name.'</span> <span class="arrow"></span></a>';
					                } else { ?>
									<li>
										<a href="<?php echo base_url().$row->menu_link?>">
											<i class="<?php echo $row->icon_class?>"></i>
											<span class="title"><?php echo $row->menu_name?></span>
											<span class="selected"></span>
										</a>
									</li>
							<?php } 
                			$qsql = "SELECT * FROM admin_menu m WHERE m.parent_id='".$row->menuid."' AND fn_CheckMenuPermission(m.menuid,". $user_id .") = 1 AND m.group_label ='' AND m.status=1 ORDER BY m.position";
                				$squery = $this->db->query($qsql);
                				echo '<ul class="sub">';
                				foreach($squery->result() as $rsub):
                 	 			echo '<li class="nav-item ';
                  				if($this->uri->uri_string() == $rsub->menu_link) { 
                      				echo 'active';
                  				}
                  				echo '"><a href="'.base_url().$rsub->menu_link.'" class="nav-link"><i class=""></i> <span class="title">'.$rsub->menu_name.'</span></a></li>';
                  				endforeach;
                  				echo '</ul>';
                				echo '</li>';
                				endforeach;
                				$query->free_result();
                				}
                				?>
						</ul>
					</div>
			</aside>
			<!--sidebar end-->
