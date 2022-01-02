<!--main content start-->
      <section id="main-content">
          <section class="wrapper site-min-height">
            <nav aria-label="breadcrumb">
              <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="<?php echo base_url()?>"><i class="fa fa-home"></i> गृहपृष्ठ</a></li>
                  <li class="breadcrumb-item"><a href="javascript:;">खोज्नुहोस</a></li>
              </ol>
            </nav>
              <!-- page start-->
              <div class="row">
                <div class="col-sm-12">
                  <section class="card" style="margin-bottom: -25px;">
                      <header class="card-header" style="background: #1b5693;color:#FFF">
                        <div class="row">
                          <div class="col-md-6">
                            <div class="input-group">
                              <input type="text" id="search" class="form-control" placeholder="कित्ता नं" />
                              <div class="input-group-prepend">
                                <button type="button" class="input-group-text btn btn-danger btn-search" title="">खोज्नुहोस  </button>
                              </div>
                            </div>
                          </div>
                        </div>
                      </header>
                      <div class="card-body">
                        <div class="adv-table">
                        
                        </div>
                      </div>
                    </section>
                </div>
              </div>
              <!-- page end-->
          </section>
      </section>
      <script type="text/javascript" src="<?php echo base_url('assets/nepali_datepicker/nepali.datepicker.v2.2.min.js')?>"></script>
    <script src="<?php echo base_url('assets/datatable/datatables.min.js') ?>"></script>
   
    <script type="text/javascript">
      $(document).ready(function(){

        var date = "<?php echo convertDate(date('Y-m-d'))?>";
        $('#nepaliDateD').nepaliDatePicker({});

        $(document).on('click', '.btn-search', function(){
          var obj = $(this);
          var search = $('#search').val();
          $.ajax({
            url:"<?php echo base_url()?>SearchDetails/searchLandDetails",
            method:"POST",
            data:{search:search,'<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>'},
            beforeSend: function () {
              obj.html('<i class="fa fa-spinner fa-spin"></i> खोज्नुहोस');
            },
            success:function(resp){
              if(resp.status == 'success') {
                $('.adv-table').empty().html(resp.data);
                obj.html('खोज्नुहोस');
              }
            }
          }); 
        });
        
      })
  </script>
    
   