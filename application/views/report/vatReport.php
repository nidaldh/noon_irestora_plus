<link rel="stylesheet" href="<?php echo base_url(); ?>assets/dist/css/custom/report.css">

<section class="main-content-wrapper">

    <section class="content-header">
        <h3 class="top-left-header text-left"><?php echo lang('vat_report'); ?></h3>
        <input type="hidden" class="datatable_name" data-title="<?php echo lang('vat_report'); ?>" data-id_name="datatable">
    </section>

    <div class="my-2">

            <?php
                    if(isLMni() && isset($outlet_id)):
                        ?>
                        <h4> <?php echo lang('outlet'); ?>: <?php echo escape_output(getOutletNameById($outlet_id))?></h4>
                        <?php
                    endif;
                    ?>
                    <h4><?= isset($start_date) && $start_date && isset($end_date) && $end_date ? lang('report_date') . date($this->session->userdata('date_format'), strtotime($start_date)) . " - " . date($this->session->userdata('date_format'), strtotime($end_date)) : '' ?><?= isset($start_date) && $start_date && !$end_date ? lang('report_date') . date($this->session->userdata('date_format'), strtotime($start_date)) : '' ?><?= isset($end_date) && $end_date && !$start_date ? lang('report_date') . date($this->session->userdata('date_format'), strtotime($end_date)) : '' ?>
                    </h4>
    </div>

    <div class="box-wrapper">
    <div class="row">
                        <div class="col-sm-12 col-md-4 col-lg-2 mb-3">
                            <?php echo form_open(base_url() . 'Report/vatReport') ?>

                            <div class="form-group">
                                <input tabindex="1" type="text" id="" name="startDate" readonly class="form-control customDatepicker"
                                    placeholder="<?php echo lang('start_date'); ?>" value="<?php echo set_value('startDate'); ?>">
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-4 col-lg-2 mb-3">

                            <div class="form-group">
                                <input tabindex="2" type="text" id="endMonth" name="endDate" readonly
                                    class="form-control customDatepicker" placeholder="<?php echo lang('end_date'); ?>"
                                    value="<?php echo set_value('endDate'); ?>">
                            </div>
                        </div>
                        <?php
                        if(isLMni()):
                            ?>
                            <div class="col-sm-12 col-md-4 col-lg-2 mb-3">
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
                        <div class="col-sm-12 col-md-3 col-lg-2">

                                <button type="submit" name="submit" value="submit"
                                    class="btn bg-blue-btn w-100"><?php echo lang('submit'); ?></button>

                        </div>

                    </div>
            <div class="table-box">
                <!-- /.box-header -->
                <div class="table-responsive">


                    <table id="datatable" class="table">
                        <thead>
                            <tr>
                                <th class="ir_w2_txt_center"><?php echo lang('sn'); ?></th>
                                <th class="ir_w_15"><?php echo lang('sale_no'); ?></th>
                                <th><?php echo lang('date'); ?></th>
                                <th><?php echo lang('total_sale'); ?></th>
                                <th><?php echo lang('applied_tax'); ?> <?php echo lang('amount'); ?></th>
                                <th><?php echo lang('total'); ?> <?php echo lang('vat'); ?></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $grandTotal = 0;
                            $vatTotal = 0;
                            if (isset($vatReport)):
                                foreach ($vatReport as $key => $value) {
                                    if($value->total_vat):
                                    $grandTotal+=$value->total_payable;
                                    $vatTotal+=$value->total_vat;
                                    $key++;
                                    ?>
                            <tr>
                                <td class="ir_txt_center"><?php echo escape_output($key--); ?></td>
                                <td><?= escape_output($value->sale_no) ?>
                                <td><?= escape_output(date($this->session->userdata('date_format'), strtotime($value->sale_date))) ?></td>
                                <td><?php echo escape_output(getAmtCustom($value->total_payable)) ?></td>
                                <td>
                                    <?php
                                        $vat_json = json_decode($value->sale_vat_objects);
                                        foreach ($vat_json as $key=>$value1){
                                            if((float)$value1->tax_field_amount):
                                            echo escape_output($value1->tax_field_type).":".escape_output($value1->tax_field_amount);
                                            if($key<sizeof($vat_json)-1){
                                                echo ", ";
                                            }
                                            endif;
                                        }
                                    ?>
                                </td>
                                <td><?php echo escape_output(getAmtCustom($value->total_vat)) ?></td>
                            </tr>
                            <?php
                                endif;
                                }
                            endif;
                            ?>
                        </tbody>
                        <tfoot>
                            <tr>
                                <th class="ir_w2_txt_center"></th>
                                <th class="ir_w2_txt_center"></th>
                                <th class="pull-right"><?php echo lang('total'); ?></th>
                                <th><?php echo escape_output(getAmtCustom($grandTotal)) ?></th>
                                <th></th>
                                <th class=""><?php echo escape_output(getAmtCustom($vatTotal)) ?></th>
                            </tr>
                        </tfoot>
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
<script src="<?php echo base_url(); ?>assets/datatable_custom/buttons.flash.min.js"></script>
<script src="<?php echo base_url(); ?>assets/datatable_custom/jszip.min.js"></script>
<script src="<?php echo base_url(); ?>frequent_changing/js/dataTable/dataTables.bootstrap4.min.js"></script>
<script src="<?php echo base_url(); ?>assets/datatable_custom/pdfmake.min.js"></script>
<script src="<?php echo base_url(); ?>assets/datatable_custom/vfs_fonts.js"></script>
<script src="<?php echo base_url(); ?>assets/datatable_custom/buttons.html5.min.js"></script>
<script src="<?php echo base_url(); ?>assets/datatable_custom/buttons.print.min.js"></script>
<script src="<?php echo base_url(); ?>frequent_changing/newDesign/js/forTable.js"></script>

<script src="<?php echo base_url(); ?>frequent_changing/js/custom_report.js"></script>