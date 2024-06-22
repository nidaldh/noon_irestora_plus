<?php
$base_color = '';
?>
<script type="text/javascript" src="<?php echo base_url('frequent_changing/js/setting.js'); ?>"></script>



<!-- Main content -->
<section class="main-content-wrapper">
    <?php
    if ($this->session->flashdata('exception')) {

        echo '<section class="alert-wrapper"><div class="alert alert-success alert-dismissible fade show"> 
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    <div class="alert-body"><p><i class="m-right fa fa-check"></i>';
        echo escape_output($this->session->flashdata('exception'));unset($_SESSION['exception']);
        echo '</p></div></div></section>';
    }
    ?>


    <section class="content-header">
        <h3 class="top-left-header">
            <?php echo lang('bill_printer_setting'); ?>
        </h3>
    </section>
    <div class="box-wrapper">
        <div class="row">

            <!-- left column -->
            <div class="col-md-12">
                <div class="table-box">
                    <!-- /.box-header -->
                    <!-- form start -->
                    <?php
                    $attributes = array('id' => 'restaurant_setting_form');
                    echo form_open_multipart(base_url('setting/billPrinterSetting/' . $encrypted_id),$attributes); ?>
                    <div class="box-body">
                        <div class="row">

                            <div class="mb-3 col-sm-12 col-md-4 col-lg-4">
                                <div class="form-group">
                                    <label><?php echo lang('printing_choice'); ?> <span
                                                class="required_star">*</span></label>
                                    <select class="form-control printing select2" id="printing_bill" name="printing_bill">
                                        <option
                                            <?php echo isset($outlet_information->printing_bill) && $outlet_information->printing_bill == "No_Print"?"selected":'' ?>
                                            <?php echo set_select('printing_bill',"No_Print") ?> value="No_Print">
                                            <?php echo lang('No_Print'); ?></option>
                                        <option
                                            <?php echo isset($outlet_information->printing_bill) && $outlet_information->printing_bill == "web_browser"?"selected":'' ?>
                                            <?php echo set_select('printing_bill',"web_browser") ?> value="web_browser">
                                            <?php echo lang('web_browser'); ?></option>
                                        <option
                                            <?php echo isset($outlet_information->printing_bill) && $outlet_information->printing_bill == "direct_print"?"selected":'' ?>
                                            <?php echo set_select('printing_bill',"direct_print") ?> value="direct_print">
                                            <?php echo lang('direct_print'); ?> (<?php echo lang('script_install_in_localhost'); ?>)</option>
                                        <option
                                            <?php echo isset($outlet_information->printing_bill) && $outlet_information->printing_bill == "live_server_print"?"selected":'' ?>
                                            <?php echo set_select('printing_bill',"live_server_print") ?>
                                                value="live_server_print"><?php echo lang('direct_print'); ?> (<?php echo lang('script_install_in_web_server'); ?>)</option>
                                    </select>
                                </div>
                                <?php if (form_error('printer_bill')) { ?>
                                    <div class="alert alert-error txt-uh-21">
                                        <?php echo form_error('printer_bill'); ?>
                                    </div>
                                <?php } ?>
                            </div>
                            <div class="mb-3 col-sm-12 col-md-4 col-lg-4 display_none receipt_printer_div_bill">
                                <div class="form-group">
                                    <label><?php echo lang('receipt_printer'); ?> <span
                                                class="required_star">*</span></label>
                                    <select class="form-control select2" id="receipt_printer_bill"
                                            name="receipt_printer_bill">
                                        <option value=""><?php echo lang('select'); ?></option>
                                        <?php
                                        foreach ($printers as $value):
                                            ?>
                                            <option
                                                <?php echo  isset($outlet_information->receipt_printer_bill) && $outlet_information->receipt_printer_bill == $value->id?"selected":'' ?>
                                                <?php echo set_select('receipt_printer_bill',$value->id) ?>
                                                    value="<?php echo escape_output($value->id) ?>">
                                                <?php echo escape_output($value->title) ?>
                                                <?php echo escape_output($value->path?"(".$value->path.")":'') ?></option>
                                            <?php
                                        endforeach;
                                        ?>
                                    </select>
                                </div>
                                <?php if (form_error('receipt_printer_bill')) { ?>
                                    <div class="alert alert-error txt-uh-21">
                                        <?php echo form_error('receipt_printer_bill'); ?>
                                    </div>
                                <?php } ?>
                            </div>
                            <div class="mb-3 col-sm-12 col-md-4 col-lg-4 txt_11 print_server_url_div_bill">

                                <div class="form-group">
                                    <label><?php echo lang('print_server_url'); ?> <span
                                                class="required_star">*</span></label>
                                    <a class="pull-right no_underline_pos btn bg-blue-btn custom_bt_xs" href="<?php echo base_url()?>images/ethernet_wifi.png" target="_blank"><?php echo lang('HowtogetIPv4Address'); ?></a>
                                    <input tabindex="1" autocomplete="off" type="text" id="print_server_url_bill"
                                           name="print_server_url_bill" class="form-control"
                                           placeholder="<?php echo lang('print_server_url_exm'); ?>"
                                           value="<?= escape_output($outlet_information->print_server_url_bill); ?>">
                                </div>
                                <?php if (form_error('print_server_url_bill')) { ?>
                                    <div class="callout callout-danger my-2">
                                        <?php echo form_error('print_server_url_bill'); ?>
                                    </div>
                                <?php } ?>
                            </div>
                            <div class="mb-3 col-sm-12 col-md-4 col-lg-4 print_format_div_bill">
                                <div class="form-group radio_button_problem">
                                    <label><?php echo lang('print_format'); ?> <span class="required_star">*</span></label>
                                    <div class="radio">
                                         

                                        <label>

                                            <input tabindex="5" autocomplete="off" type="radio" name="print_format_bill"
                                                   id="print_format_thermal" value="56mm" <?php
                                            if ($outlet_information->print_format_bill == "56mm") {
                                                echo "checked";
                                            };
                                            ?>><?php echo lang('56mm'); ?> </label>
                                        <label>



                                            <input tabindex="5" autocomplete="off" type="radio" name="print_format_bill"
                                                   id="print_format_a4" value="80mm" <?php
                                            if ($outlet_information->print_format_bill == "80mm") {
                                                echo "checked";
                                            };
                                            ?>><?php echo lang('80mm'); ?>
                                        </label>
                                    </div>
                                </div>
                                <?php if (form_error('print_format_bill')) { ?>
                                    <div class="callout callout-danger my-2">
                                        <?php echo form_error('print_format_bill'); ?>
                                    </div>
                                <?php } ?>
                            </div>
                            <div class="clearfix"></div>

                            <div class="col-sm-3">
                                <button type="submit" name="submit" value="submit"
                                        class="btn bg-blue-btn w-100"><?php echo lang('submit'); ?></button>
                            </div>
                        </div>
                    </div>
                    <!-- /.box-body -->


                    <?php echo form_close(); ?>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="logo_preview" aria-hidden="true" aria-labelledby="myModalLabel">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel">
                        <?php echo lang('Invoice_Logo'); ?> </h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                        <i data-feather="x"></i>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12"
                             style="background-color: <?php echo escape_output($base_color)?>;text-align: center;padding: 10px;">
                            <img class="img-fluid" src="" id="show_id">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn bg-blue-btn"
                            data-dismiss="modal"  data-bs-dismiss="modal"><?php echo lang('cancel'); ?></button>
                </div>
            </div>

        </div>
    </div>

</section>