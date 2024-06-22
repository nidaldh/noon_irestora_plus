<section class="main-content-wrapper">
    <?php
    if ($this->session->flashdata('exception_3')) {

        echo '<section class="alert-wrapper"><div class="alert alert-danger alert-dismissible"> 
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        <div class="alert-body"><p><i class="m-right fa fa-check"></i>';
        echo escape_output($this->session->flashdata('exception_3'));unset($_SESSION['exception_3']);
        echo '</p></div></div></section>';
    }
    ?>
    <input type="hidden" id="base_url_customer" value="<?php echo base_url()?>">
    <section class="content-header">
        <h3 class="top-left-header">
            <?php echo lang('register_details'); ?>
        </h3>
    </section>

    <link href="<?php echo base_url(); ?>frequent_changing/css/register_details.css" rel="stylesheet" type="text/css" />
    <div class="box-wrapper">
        <!-- general form elements -->
        <div class="table-box">
            <!-- form start -->
            <div>
                <div class="row">
                    <input type="hidden" class="datatable_name" data-title="<?php echo lang('register_details'); ?>" data-id_name="datatable">
                    <div class="html_content">

                    </div>
                </div>
            </div>
            <!-- /.box-body -->
            <p>&nbsp;</p>

        </div>
    </div>
</section>
<!--for datatable-->
<script src="<?php echo base_url(); ?>assets/datatable_custom/jquery-3.3.1.js"></script>
<script src="<?php echo base_url(); ?>frequent_changing/js/dataTable/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url(); ?>assets/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<script src="<?php echo base_url(); ?>frequent_changing/js/dataTable/dataTables.bootstrap4.min.js"></script>
<script src="<?php echo base_url(); ?>frequent_changing/js/dataTable/dataTables.buttons.min.js"></script>
<script src="<?php echo base_url(); ?>frequent_changing/js/dataTable/buttons.html5.min.js"></script>
<script src="<?php echo base_url(); ?>frequent_changing/js/dataTable/buttons.print.min.js"></script>
<script src="<?php echo base_url(); ?>frequent_changing/js/dataTable/jszip.min.js"></script>
<script src="<?php echo base_url(); ?>frequent_changing/js/dataTable/pdfmake.min.js"></script>
<script src="<?php echo base_url(); ?>frequent_changing/js/dataTable/vfs_fonts.js"></script>
<script src="<?php echo base_url(); ?>frequent_changing/newDesign/js/forTable.js"></script>
<script src="<?php echo base_url(); ?>frequent_changing/js/register_details.js"></script>