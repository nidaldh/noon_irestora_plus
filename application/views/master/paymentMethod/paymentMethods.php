<section class="main-content-wrapper">

    <?php
    if ($this->session->flashdata('exception')) {

        echo '<section class="alert-wrapper">
        <div class="alert alert-success alert-dismissible fade show"> 
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        <div class="alert-body">
        <p><i class="m-right fa fa-check"></i>';
        echo escape_output($this->session->flashdata('exception'));unset($_SESSION['exception']);
        echo '</p></div></div></section>';
    }
    ?>
    <link rel="stylesheet" href="<?php echo base_url(); ?>frequent_changing/css/up_down.css">

    <section class="content-header">
        <div class="row">
            <div class="col-md-12">
                <h2 class="top-left-header"><?php echo lang('payment_methods'); ?> </h2>
                <input type="hidden" class="datatable_name" data-title="<?php echo lang('payment_methods'); ?>" data-id_name="datatable">
            </div>
            <div>

            </div>
            <div>
                <a class="btn_list btn bg-blue-btn m-right" href="<?php echo base_url() ?>paymentMethod/sorting">
                    <i data-feather="arrow-down"></i><i data-feather="arrow-up"></i> &nbsp;<?php echo lang('sorting'); ?>
                </a>
            </div>
        </div>
    </section>


    <div class="box-wrapper">
            <!-- general form elements -->
            <div class="table-box">
                <!-- /.box-header -->
                <div class="table-responsive">
                    <table id="datatable" class="table">
                        <thead>
                            <tr>
                                <th class="ir_w_1"> <?php echo lang('sn'); ?></th>
                                <th class="ir_w_10 "><?php echo lang('payment_method_name'); ?></th>
                                <th  class="ir_w_10"><?php echo lang('description'); ?></th>
                                <th class="ir_w_26"><?php echo lang('added_by'); ?></th>
                                <th  class="ir_w_1 ir_txt_center not-export-col"><?php echo lang('actions'); ?></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            if ($paymentMethods && !empty($paymentMethods)) {
                                $i = count($paymentMethods);
                            }
                            foreach ($paymentMethods as $key=>$value) {
                                $key++;
                                ?>
                            <tr>
                                <td class="ir_txt_center"><?php echo escape_output($key); ?></td>
                                <td><?php echo escape_output($value->name) ?></td>
                                <td><?php echo escape_output($value->description) ?></td>
                                <td><?php echo escape_output(userName($value->user_id)); ?></td>
                                <td class="ir_txt_center">
                                    <?php if($value->id!=1 && $value->id!=5): ?>
                                    <div class="btn-group  actionDropDownBtn">
                                        <button type="button" class="btn bg-blue-color dropdown-toggle"
                                            id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                                            <i data-feather="more-vertical"></i>
                                        </button>
                                        <ul class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuButton1" role="menu">
                                            <li data-access="update-260" class="menu_assign_class"><a
                                                    href="<?php echo base_url() ?>paymentMethod/addEditPaymentMethod/<?php echo escape_output($this->custom->encrypt_decrypt($value->id, 'encrypt')); ?>"><i
                                                        class="fa fa-pencil tiny-icon"></i><?php echo lang('edit'); ?></a>
                                            </li>
                                            <li data-access="delete-260" class="menu_assign_class"><a class="delete"
                                                    href="<?php echo base_url() ?>paymentMethod/deletePaymentMethod/<?php echo escape_output($this->custom->encrypt_decrypt($value->id, 'encrypt')); ?>"><i
                                                        class="fa fa-trash tiny-icon"></i><?php echo lang('delete'); ?></a>
                                            </li>
                                        </ul>
                                    </div>
                                    <?php endif;?>
                                </td>
                            </tr>
                            <?php
                            }
                            ?>
                        </tbody>
                       
                    </table>
                </div>
                <!-- /.box-body -->
            </div>
    </div>
   
</section>
<script src="<?php echo base_url(); ?>frequent_changing/js/inventory.js"></script>
<!-- DataTables -->
<script src="<?php echo base_url(); ?>assets/datatable_custom/jquery-3.3.1.js"></script>
<script src="<?php echo base_url(); ?>frequent_changing/js/dataTable/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url(); ?>assets/datatable_custom/dataTables.buttons.min.js"></script>
<script src="<?php echo base_url(); ?>frequent_changing/js/dataTable/dataTables.bootstrap4.min.js"></script>
<script src="<?php echo base_url(); ?>assets/datatable_custom/buttons.flash.min.js"></script>
<script src="<?php echo base_url(); ?>assets/datatable_custom/jszip.min.js"></script>
<script src="<?php echo base_url(); ?>assets/datatable_custom/pdfmake.min.js"></script>
<script src="<?php echo base_url(); ?>assets/datatable_custom/vfs_fonts.js"></script>
<script src="<?php echo base_url(); ?>assets/datatable_custom/buttons.html5.min.js"></script>
<script src="<?php echo base_url(); ?>assets/datatable_custom/buttons.print.min.js"></script>
<script src="<?php echo base_url(); ?>frequent_changing/newDesign/js/forTable.js"></script>

<script src="<?php echo base_url(); ?>frequent_changing/js/custom_report_no_sorting.js"></script>