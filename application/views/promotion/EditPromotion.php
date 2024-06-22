<script type="text/javascript" src="<?php echo base_url('frequent_changing/js/add_promotion.js'); ?>"></script>
<section class="main-content-wrapper">


    <section class="content-header">
        <h1>
            <?php echo lang('edit_promotion'); ?>
        </h1>
    </section>


    <div class="box-wrapper">
        <!-- general form elements -->
        <div class="table-box">

            <!-- /.box-header -->
            <!-- form start -->
            <?php echo form_open(base_url() . 'Promotion/addEditPromotion/' . $encrypted_id, $arrayName = array('id' => 'promotion_form')) ?>
            <div>
                <div class="row">
                    <div class="col-sm-12 mb-2 col-md-3">
                        <div class="form-group">
                            <label><?php echo lang('type'); ?> <span class="required_star">*</span></label>
                            <select class="form-control select2 type" name="type" id="type">
                                <option><?php echo lang('select'); ?></option>
                                <option value="1" <?php echo isset($promotion_details->type) && $promotion_details->type==1?'selected':''?> <?php echo set_select('type',1)?>><?php echo lang('discount'); ?></option>
                                <option value="2" <?php echo isset($promotion_details->type) && $promotion_details->type==2?'selected':''?> <?php echo set_select('type',2)?>><?php echo lang('free_item'); ?></option>
                            </select>
                        </div>
                        <?php if (form_error('type')) { ?>
                            <div class="callout callout-danger my-2">
                                <?php echo form_error('type'); ?>
                            </div>
                        <?php } ?>
                    </div>

                    <div class="col-sm-12 mb-2 col-md-3">
                        <div class="form-group">
                            <label><?php echo lang('title'); ?> <span class="required_star">*</span></label>
                            <input tabindex="3" type="text" id="title" name="title" class="form-control"
                                   placeholder="eg: Black friday offer" value="<?php echo escape_output($promotion_details->title)?>">
                        </div>
                        <?php if (form_error('title')) { ?>
                            <div class="callout callout-danger my-2">
                                <?php echo form_error('title'); ?>
                            </div>
                        <?php } ?>

                    </div>

                    <div class="col-sm-12 mb-2 col-md-3">
                        <div class="form-group">
                            <label><?php echo lang('start_date'); ?> <span class="required_star">*</span></label>
                            <input tabindex="3" type="text"  name="start_date" readonly class="form-control customDatepicker"
                                   placeholder="<?php echo lang('start_date'); ?>" value="<?php echo escape_output($promotion_details->start_date)?>">
                        </div>
                        <?php if (form_error('start_date')) { ?>
                            <div class="callout callout-danger my-2">
                                <?php echo form_error('start_date'); ?>
                            </div>
                        <?php } ?>

                    </div>
                    <div class="col-sm-12 mb-2 col-md-3">
                        <div class="form-group">
                            <label><?php echo lang('end_date'); ?> <span class="required_star">*</span></label>
                            <input tabindex="3" type="text"  name="end_date" readonly class="form-control customDatepicker"
                                   placeholder="<?php echo lang('end_date'); ?>" value="<?php echo escape_output($promotion_details->end_date)?>">
                        </div>
                        <?php if (form_error('end_date')) { ?>
                            <div class="callout callout-danger my-2">
                                <?php echo form_error('end_date'); ?>
                            </div>
                        <?php } ?>

                    </div>
                    <div class="col-sm-12 mb-2 col-md-3 display_none discount_div">
                        <div class="form-group select_promotion">
                            <label><?php echo lang('food_menu'); ?> <span class="required_star">*</span></label>
                            <select tabindex="4" class="form-control select2 " name="food_menu_id"
                                    id="food_menu_id">
                                <option value=""><?php echo lang('select'); ?></option>
                                <?php
                                foreach ($food_menus as $ingnts) {
                                if($ingnts->is_variation!=1){
                                    $p_name = '';
                                    if($ingnts->parent_id!='0'){
                                        $p_name = getVariationName($ingnts->parent_id);
                                    }
                                    ?>
                                    <option <?php echo isset($promotion_details->food_menu_id) && $promotion_details->food_menu_id==$ingnts->id?'selected':''?> <?php echo set_select('food_menu_id',$ingnts->id)?> value="<?php echo escape_output($ingnts->id) ?>">
                                        <?php echo escape_output((isset($p_name) && $p_name?$p_name." ":'').$ingnts->name . " (" . $ingnts->code . ")") ?></option>
                                    <?php
                                    }
                                }
                                ?>
                            </select>
                        </div>
                        <?php if (form_error('food_menu_id')) { ?>
                            <div class="callout callout-danger my-2">
                                <?php echo form_error('food_menu_id'); ?>
                            </div>
                        <?php } ?>
                    </div>

                    <div class="col-sm-12 mb-2 col-md-3 display_none discount_div">
                        <div class="form-group">
                            <label><?php echo lang('discount_pro'); ?> <span class="required_star">*</span></label>
                            <input tabindex="3" type="text" name="discount"  class="form-control"
                                   placeholder="<?php echo lang('default_discount_pl'); ?>" value="<?php echo escape_output($promotion_details->discount)?>">
                        </div>
                        <?php if (form_error('discount')) { ?>
                            <div class="callout callout-danger my-2">
                                <?php echo form_error('discount'); ?>
                            </div>
                        <?php } ?>

                    </div>

                    <div class="clearfix"></div>
                    <div class="col-sm-12 mb-2 col-md-3 display_none free_item_div">
                        <div class="form-group select_promotion">
                            <label><?php echo lang('buy'); ?> <span class="required_star">*</span></label>
                            <select tabindex="4" class="form-control select2 " name="buy_food_menu_id"
                                    id="buy_food_menu_id">
                                <option value=""><?php echo lang('select'); ?></option>
                                <?php
                                foreach ($food_menus as $ingnts) {
                                    if($ingnts->is_variation!=1){
                                        $p_name = '';
                                        if($ingnts->parent_id!='0'){
                                            $p_name = getVariationName($ingnts->parent_id);
                                        }
                                        ?>
                                        <option <?php echo isset($promotion_details->food_menu_id) && $promotion_details->food_menu_id==$ingnts->id?'selected':''?> <?php echo set_select('buy_food_menu_id',$ingnts->id)?> value="<?php echo escape_output($ingnts->id) ?>">
                                            <?php echo escape_output((isset($p_name) && $p_name?$p_name." ":'').$ingnts->name . " (" . $ingnts->code . ")") ?></option>
                                        <?php
                                     }
                                }
                                ?>
                            </select>
                        </div>
                        <?php if (form_error('buy_food_menu_id')) { ?>
                            <div class="callout callout-danger my-2">
                                <?php echo form_error('buy_food_menu_id'); ?>
                            </div>
                        <?php } ?>
                    </div>

                    <div class="col-sm-12 mb-2 col-md-3 display_none free_item_div">
                        <div class="form-group">
                            <label><?php echo lang('buy'); ?> <?php echo lang('quantity'); ?> <span class="required_star">*</span></label>
                            <input tabindex="3" type="text" name="qty" class="form-control aligning  integerchk"
                                   placeholder="<?php echo lang('buy'); ?> <?php echo lang('quantity'); ?>" value="<?php echo escape_output($promotion_details->qty)?>">
                        </div>
                        <?php if (form_error('qty')) { ?>
                            <div class="callout callout-danger my-2">
                                <?php echo form_error('qty'); ?>
                            </div>
                        <?php } ?>

                    </div>


                    <div class="col-sm-12 mb-2 col-md-3 display_none free_item_div">
                        <div class="form-group select_promotion">
                            <label><?php echo lang('get'); ?> <span class="required_star">*</span></label>
                            <select tabindex="4" class="form-control select2 " name="get_food_menu_id"
                                    id="get_food_menu_id">
                                <option value=""><?php echo lang('select'); ?></option>
                                <?php
                                foreach ($food_menus as $ingnts) {
                                if($ingnts->is_variation!=1){
                                    $p_name = '';
                                    if($ingnts->parent_id!='0'){
                                        $p_name = getVariationName($ingnts->parent_id);
                                    }
                                    ?>
                                    <option <?php echo isset($promotion_details->get_food_menu_id) && $promotion_details->get_food_menu_id==$ingnts->id?'selected':''?> <?php echo set_select('get_food_menu_id',$ingnts->id)?>  value="<?php echo escape_output($ingnts->id) ?>">
                                        <?php echo escape_output((isset($p_name) && $p_name?$p_name." ":'').$ingnts->name . " (" . $ingnts->code . ")") ?></option>
                                    <?php
                                    }
                                }
                                ?>
                            </select>
                        </div>
                        <?php if (form_error('get_food_menu_id')) { ?>
                            <div class="callout callout-danger my-2">
                                <?php echo form_error('get_food_menu_id'); ?>
                            </div>
                        <?php } ?>
                    </div>

                    <div class="col-sm-12 mb-2 col-md-3 display_none free_item_div">
                        <div class="form-group">
                            <label><?php echo lang('get'); ?> <?php echo lang('quantity'); ?> <span class="required_star">*</span></label>
                            <input tabindex="3" type="text" name="get_qty" class="form-control integerchk"
                                   placeholder="<?php echo lang('get'); ?> <?php echo lang('quantity'); ?>" value="<?php echo escape_output($promotion_details->get_qty)?>">
                        </div>
                        <?php if (form_error('get_qty')) { ?>
                            <div class="callout callout-danger my-2">
                                <?php echo form_error('get_qty'); ?>
                            </div>
                        <?php } ?>

                    </div>
                    <div class="col-sm-12 mb-2 col-md-3">
                        <div class="form-group">
                            <label><?php echo lang('status'); ?></label>
                            <select class="form-control select2 status" name="status" id="status">
                                <option value="1" <?php echo isset($promotion_details->status) && $promotion_details->status==1?'selected':''?>  <?php echo set_select('status',1)?>><?php echo lang('Active'); ?></option>
                                <option value="2" <?php echo isset($promotion_details->status) && $promotion_details->status==2?'selected':''?>  <?php echo set_select('status',2)?>><?php echo lang('Inactive'); ?></option>
                            </select>
                        </div>
                        <?php if (form_error('reference_no')) { ?>
                            <div class="callout callout-danger my-2">
                                <?php echo form_error('reference_no'); ?>
                            </div>
                        <?php } ?>
                    </div>
                </div>
                <div class="box-footer p-0 mt-2">
                    <div class="row">
                        <div class="col-sm-12 col-md-2 mb-2">
                            <button type="submit" name="submit" value="submit"
                                    class="btn bg-blue-btn w-100"><?php echo lang('submit'); ?></button>
                        </div>
                        <div class="col-sm-12 col-md-2 mb-2">
                            <a class="btn bg-blue-btn w-100" href="<?php echo base_url() ?>Promotion/promotions">
                                <?php echo lang('back'); ?>
                            </a>
                        </div>
                    </div>

                </div>
                <?php echo form_close(); ?>
            </div>
        </div>
    </div>

</section>