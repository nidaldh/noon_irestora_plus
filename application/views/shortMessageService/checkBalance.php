<!-- Main content -->
<section class="main-content-wrapper">
        <section class="content-header">
            <h3 class="top-left-header">
                <?php echo lang('sms_balance'); ?>
            </h3>  
        </section>
        <div class="box-wrapper">
            <!-- general form elements -->
            <div class="table-box">
                <div>
                    <div class="row">
                        <div class="col-md-12"> 
                            <div class="form-group">
                               <h3><?php echo lang('your_current_textlocal'); ?> <b><?php echo getAmtPCustom($balance); ?></b>, <?php echo lang('please_check_in'); ?> <a href="https://textlocal.com" target="_blank"><?php echo lang('textlocal'); ?></a> <?php echo lang('to_know_how'); ?></h3>
                            </div>  
                        </div>
                        <div class="col-sm-12 col-md-2 mb-2"> 
                            <a class="btn bg-blue-btn"href="<?php echo base_url() ?>Short_message_service/smsService">
                                <?php echo lang('back'); ?>
                            </a>
                        </div> 
                    </div> 
                    <!-- /.box-body -->
                </div> 
               
            </div>
        </div>

</section>