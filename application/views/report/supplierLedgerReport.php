<link rel="stylesheet" href="<?php echo base_url(); ?>assets/dist/css/custom/report.css">
<script src="<?php echo base_url(); ?>frequent_changing/js/supplier_report.js"></script>

<section class="main-content-wrapper">

    <section class="content-header">
        <h3 class="top-left-header text-left"><?php echo lang('supplier_ledger_report'); ?></h3>
        <input type="hidden" class="datatable_name" data-title="<?php echo lang('supplier_ledger_report'); ?>" data-id_name="datatable">
    </section>

    <div class="my-2">
        <?php
        if(isLMni() && isset($outlet_id)):
            ?>
            <h4> <?php echo lang('outlet'); ?>: <?php echo escape_output(getOutletNameById($outlet_id))?></h4>
            <?php
        endif;
        ?>
        <h4 class="ir_txtCenter_mt0"><?php
            if (isset($supplier_id) && $supplier_id):
                echo "<span>" . getSupplierNameById($supplier_id) . "</span>";
            endif;
            ?></h4>
        <h4><?= isset($start_date) && $start_date && isset($end_date) && $end_date ? lang('report_date') . date($this->session->userdata('date_format'), strtotime($start_date)) . " - " . date($this->session->userdata('date_format'), strtotime($end_date)) : '' ?><?= isset($start_date) && $start_date && !$end_date ? lang('report_date') . date($this->session->userdata('date_format'), strtotime($start_date)) : '' ?><?= isset($end_date) && $end_date && !$start_date ? lang('report_date') . date($this->session->userdata('date_format'), strtotime($end_date)) : '' ?>
        </h4>
    </div>

    <div class="box-wrapper">
        <div class="row">
            <div class="col-sm-12 mb-3 col-md-4 col-lg-2">
                <?php echo form_open(base_url() . 'Report/supplierLedgerReport', $arrayName = array('id' => 'supplierReport')) ?>
                <div class="form-group">
                    <input tabindex="1" type="text" id="" name="startDate" readonly class="form-control customDatepicker"
                           placeholder="<?php echo lang('start_date'); ?>" value="<?php echo set_value('startDate'); ?>">
                </div>
            </div>
            <div class="col-sm-12 mb-3 col-md-4 col-lg-2">

                <div class="form-group">
                    <input tabindex="2" type="text" id="endMonth" name="endDate" readonly
                           class="form-control customDatepicker" placeholder="<?php echo lang('end_date'); ?>"
                           value="<?php echo set_value('endDate'); ?>">
                </div>
            </div>
            <div class="col-sm-12 mb-3 col-md-4 col-lg-2">

                <div class="form-group">
                    <select tabindex="2" class="form-control select2 ir_w_100" id="supplier_id" name="supplier_id">
                        <option value=""><?php echo lang('suppliers'); ?></option>
                        <?php
                        foreach ($suppliers as $value) {
                            ?>
                            <option value="<?php echo escape_output($value->id) ?>" <?php echo set_select('supplier_id', $value->id); ?>>
                                <?php echo escape_output($value->name) ?></option>
                        <?php } ?>
                    </select>
                </div>
                <?php if (form_error('supplier_id')) { ?>
                    <div class="callout callout-danger my-2">
                        <?php echo form_error('supplier_id'); ?>
                    </div>
                <?php } ?>
                <div class="alert error-msg supplier_id_err_msg_contnr ir_p_5">
                    <p id="supplier_id_err_msg"></p>
                </div>
            </div>
            <?php
            if(isLMni()):
                ?>
                <div class="col-sm-12 mb-3 col-md-4 col-lg-2">
                    <div class="form-group">
                        <select tabindex="2" class="form-control select2 ir_w_100" id="outlet_id" name="outlet_id">
                            <?php
                            $outlets = getAllOutlestByAssign();
                            foreach ($outlets as $value):
                                ?>
                                <option <?= set_select('outlet_id',$value->id)?>  value="<?php echo escape_output($value->id) ?>"><?php echo escape_output($value->outlet_name) ?></option>
                                <?php
                            endforeach;
                            ?>
                        </select>
                    </div>
                </div>
                <?php
            endif;
            ?>
            <div class="col-sm-12 col-md-4 col-lg-2">
                <div class="form-group">
                    <button type="submit" name="submit" value="submit"
                            class="btn bg-blue-btn w-100"><?php echo lang('submit'); ?></button>
                </div>
            </div>
        </div>

        <div class="table-box mt-3">
            <!-- /.box-header -->
            <div class="table-responsive">

                <table id="datatable" class="table">
                    <thead>
                    <tr>
                        <th class="ir_w2_txt_center"><?php echo lang('sn'); ?></th>
                        <th><?php echo lang('title'); ?></th>
                        <th><?php echo lang('date'); ?></th>
                        <th><?php echo lang('g_total'); ?></th>
                        <th><?php echo lang('debit'); ?></th>
                        <th><?php echo lang('credit'); ?></th>
                        <th><?php echo lang('balance')."(".lang('current_due').")"; ?></th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    $grandTotal = 0;
                    $countTotal = 0;
                    if (isset($supplierLedger)):
                        foreach ($supplierLedger as $key => $value) {
                            $key++;
                            ?>
                            <tr>
                                <td class="op_center"><?php echo ($key); ?></td>
                                <td><?php echo escape_output($value['title']); ?></td>
                                <td>
                                    <?php
                                    if($key==1){
                                        echo escape_output($value['date']);
                                    }else{
                                        echo date($this->session->userdata('date_format'), strtotime($value['date']));
                                    }
                                    ?>
                                </td>
                                <td><?php echo escape_output(getAmtCustom($value['grant_total'])); ?></td>
                                <td><?php echo escape_output(getAmtCustom($value['debit'])); ?></td>
                                <td><?php echo escape_output(getAmtCustom($value['credit'])); ?></td>
                                <td><?php echo escape_output(getAmtCustom($value['balance'])); ?></td>
                            </tr>
                            <?php
                        }
                    endif;
                    ?>
                    </tbody>
                </table>
            </div>
            <!-- /.box-body -->
        </div>
    </div>

</section>
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


<script src="<?php echo base_url(); ?>frequent_changing/js/custom_report1.js"></script>