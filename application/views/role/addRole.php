<input type="hidden" class="required_roll_name" value="<?php echo lang('required_roll_name'); ?>">
<input type="hidden" class="at_least_one_check_access" value="<?php echo lang('at_least_one_check_access'); ?>">
<link rel="stylesheet" href="<?php echo base_url();?>frequent_changing/css/custom_check_box.css">
<link rel="stylesheet" href="<?php echo base_url();?>frequent_changing/css/light.css">
<!-- Main content -->
<section class="main-content-wrapper">
    <section class="content-header">
        <h3 class="top-lef-header">
            <?php echo lang('add_role'); ?>
        </h3>
    </section>


    <div class="box-wrapper">

        <div class="table-box">

            <!-- /.box-header -->
            <!-- form start -->
            <?php echo form_open(base_url('Role/addEditRole')); ?>
            <div>
                <div class="row">
                    <div class="col-sm-12 mb-2 col-md-3">
                        <div class="form-group">
                            <label><?php echo lang('role_name'); ?> <span class="required_star">*</span></label>
                            <input tabindex="1" autocomplete="off" type="text" name="role_name" class="form-control" placeholder="<?php echo lang('name'); ?>" value="<?php echo set_value('role_name'); ?>">
                        </div>

                        <?php if (form_error('role_name')) { ?>
                            <div class="callout callout-danger my-2">
                                <?php echo form_error('role_name'); ?>
                            </div>
                        <?php } ?>
                    </div>
                    </div>
                </div>
            <div class="row">
                <label class="col-md-2 col-form-label"><?php echo lang('menu_access'); ?> <span class="required_star">*</span></label>
                <div class="clearfix"></div>
                <div class="col-md-3">
                    <label class="container txt-uh-73"><?php echo lang('select_all'); ?>
                        <input class="checkbox_roleAll" type="checkbox" id="checkbox_roleAll">
                        <span class="checkmark"></span>
                    </label>
                </div>
                <div class="clearfix"></div>
                <span class="error_alert_atleast txt-uh-74"role="alert"></span>
                <?php
                $ignoreModule = array();

                foreach($access_modules as $keys=>$value){
                    if (!in_array($value->main_module_id, $ignoreModule)) {
                        $ignoreModule[] = $value->main_module_id;
                        ?>
                        <div class="col-sm-12">
                            <h4 class="c_center"><?php echo lang(getMainModuleName($value->main_module_id))?></h4>
                        </div>
                        <?php
                    }
                    ?>
                    <div class="col-sm-12">
                        <hr class="txt-uh-77">
                        <label class="container txt-uh-73"><?php echo "<b>".lang($value->label_name)."</b>"?>
                            <input class="checkbox_role_p  parent_class parent_class_<?php echo str_replace(' ', '_', $value->module_name)?>" data-name="<?php echo str_replace(' ', '_', $value->module_name)?>" type="checkbox">
                            <span class="checkmark"></span>
                        </label>
                    </div>
                    <?php
                    foreach($value->functions as $keys_f=>$value_f) {
                        $checked = '';
                        $access_id_ = $value_f->id;
                        if (isset($selected_modules_arr)):
                            foreach ($selected_modules_arr as $uma) {
                                if (in_array($access_id_, $selected_modules_arr)) {
                                    $checked = 'checked';
                                } else {
                                    $checked = '';
                                }
                            }
                        endif;
                        ?>

                        <div class="col-md-<?php echo escape_output($value_f->label_name) == "Change Password" ? '3' : '2' ?>">
                            <label class="font_unset container txt-uh-77"><?php echo escape_output(lang($value_f->label_name)); ?>
                                <input type="checkbox"  <?=set_select('access_id[]',  (escape_output($value->id)."|".escape_output($value_f->id)));?> <?php echo escape_output($checked)?> class="checkbox_role child_class child_<?php echo str_replace(' ', '_', $value->module_name)?>" data-parent_name="<?php echo str_replace(' ', '_', $value->module_name)?>" value="<?php echo escape_output($value->id); ?>|<?php echo escape_output($value_f->id); ?>"  name="access_id[]">
                                <span class="checkmark"></span>
                            </label>
                        </div>
                        <?php
                    }
                    ?>
                    <div  class="txt-uh-79"></div>
                    <?php
                }
                ?>
            </div>
                <!-- /.box-body -->
            </div>

            <div class="box-footer p-0 mt-3">
                <div class="row">
                    <div class="col-sm-12 col-md-2 mb-2">
                        <button type="submit" name="submit" value="submit"
                                class="btn bg-blue-btn w-100"><?php echo lang('submit'); ?></button>
                    </div>
                    <div class="col-sm-12 col-md-2 mb-2">
                        <a class="btn bg-blue-btn w-100"href="<?php echo base_url() ?>Role/roles">
                            <?php echo lang('back'); ?>
                        </a>
                    </div>
                </div>


            </div>
            <?php echo form_close(); ?>
        </div>
</section>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/POS/js/lib/tippy/popper.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/POS/js/lib/tippy/tippy-bundle.umd.min.js"></script>
<script src="<?php echo base_url(); ?>frequent_changing/js/add_role.js"></script>