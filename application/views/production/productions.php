


 <section class="main-content-wrapper">
    <?php
        if ($this->session->flashdata('exception')) {

            echo '<section class="alert-wrapper">
            <div class="alert alert-success alert-dismissible fade show"> 
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            <div class="alert-body">
            <p class="m-0"><i class="icon fa fa-check"></i>';
            echo escape_output($this->session->flashdata('exception'));unset($_SESSION['exception']);
            echo '</p></div></div></section>';
        }


    ?>

        <section class="content-header">
            <div class="row">
                <div class="col-sm-12 col-md-8">
                    <h3 class="top-left-header"><?php echo lang('productions'); ?> </h3>
                    <input type="hidden" class="datatable_name" data-title="<?php echo lang('productions'); ?>" data-id_name="datatable">
                </div>
                <div class="col-sm-12 col-md-4">

                </div>
            </div>
        </section>

     <div class="box-wrapper">
        <div class="table-box">
                 <!-- /.box-header -->
                 <div class="table-responsive">
                     <table id="datatable" class="table table-responsive">
                         <thead>
                             <tr>
                                 <th class="ir_w_1"><?php echo lang('sn'); ?></th>
                                 <th class="ir_w_11"><?php echo lang('ref_no'); ?></th>
                                 <th class="ir_w_8"><?php echo lang('date'); ?></th>
                                 <th class="ir_w_8"><?php echo lang('status'); ?></th>
                                 <th class="ir_w_12"><?php echo lang('added_by'); ?></th>
                                 <th class="ir_w5_txt_center not-export-col"><?php echo lang('actions'); ?></th>
                             </tr>
                         </thead>
                         <tbody>
                             <?php
                            if ($productions && !empty($productions)) {
                                $i = count($productions);
                            }
                            foreach ($productions as $prchs) {
                                ?>
                             <tr>
                                 <td><?php echo escape_output($i--); ?></td>
                                 <td><?php echo escape_output($prchs->reference_no) ?></td>
                                 <td><?php echo escape_output(date($this->session->userdata('date_format'), strtotime($prchs->date))); ?> </td>
                                 <td><?php echo ($prchs->status==1)?lang('Final'):lang('Draft'); ?></td>
                                 <td><?php echo escape_output(userName($prchs->user_id)); ?></td>
                                 <td class="ir_txt_center">
                                     <div class="btn-group  actionDropDownBtn">
                                         <button type="button" class="btn bg-blue-color dropdown-toggle"
                                             id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                                             <i data-feather="more-vertical"></i>
                                         </button>
                                         <ul class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuButton1" role="menu">
                                             <li data-access="view_details-340" class="menu_assign_class"><a
                                                     href="<?php echo base_url() ?>Production/productionDetails/<?php echo escape_output($this->custom->encrypt_decrypt($prchs->id, 'encrypt')); ?>"><i
                                                         class="fa fa-eye tiny-icon"></i><?php echo lang('view_details'); ?></a>
                                             </li>
                                             <li data-access="update-340" class="menu_assign_class"><a
                                                     href="<?php echo base_url() ?>Production/addEditProduction/<?php echo escape_output($this->custom->encrypt_decrypt($prchs->id, 'encrypt')); ?>"><i
                                                         class="fa fa-pencil tiny-icon"></i><?php echo lang('edit'); ?></a>
                                             </li>
                                             <li data-access="delete-340" class="menu_assign_class"><a class="delete"
                                                     href="<?php echo base_url() ?>Production/deleteProduction/<?php echo escape_output($this->custom->encrypt_decrypt($prchs->id, 'encrypt')); ?>"><i
                                                         class="fa fa-trash tiny-icon"></i><?php echo lang('delete'); ?></a>
                                             </li>
                                         </ul>
                                     </div>
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
<script src="<?php echo base_url(); ?>assets/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<script src="<?php echo base_url(); ?>frequent_changing/js/dataTable/dataTables.bootstrap4.min.js"></script>
<script src="<?php echo base_url(); ?>frequent_changing/js/dataTable/dataTables.buttons.min.js"></script>
<script src="<?php echo base_url(); ?>frequent_changing/js/dataTable/buttons.html5.min.js"></script>
<script src="<?php echo base_url(); ?>frequent_changing/js/dataTable/buttons.print.min.js"></script>
<script src="<?php echo base_url(); ?>frequent_changing/js/dataTable/jszip.min.js"></script>
<script src="<?php echo base_url(); ?>frequent_changing/js/dataTable/pdfmake.min.js"></script>
<script src="<?php echo base_url(); ?>frequent_changing/js/dataTable/vfs_fonts.js"></script>
<script src="<?php echo base_url(); ?>frequent_changing/js/dataTable/buttons.colVis.min.js"></script>
<script src="<?php echo base_url(); ?>frequent_changing/newDesign/js/forTable.js"></script>



 <script src="<?php echo base_url(); ?>frequent_changing/js/custom_report.js"></script>

