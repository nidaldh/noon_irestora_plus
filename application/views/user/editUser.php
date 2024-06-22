<link rel="stylesheet" href="<?= base_url('assets/') ?>buttonCSS/checkBotton.css">


<section class="main-content-wrapper">
    <section class="content-header">
        <h3 class="top-left-header">
            <?php echo lang('edit_user'); ?>
        </h3>
    </section>

        <div class="box-wrapper">
            <!-- general form elements -->
            <div class="table-box">
                <!-- form start -->
                <?php echo form_open(base_url('User/addEditUser/' . $encrypted_id)); ?>
                <div class="box-body">
                    <div class="row">

                        <div class="col-sm-12 mb-2 col-md-3">

                            <div class="form-group">
                                <label><?php echo lang('name'); ?> <span class="required_star">*</span></label>
                                <input tabindex="1" type="text" name="full_name" class="form-control"
                                    placeholder="<?php echo lang('name'); ?>"
                                    value="<?php echo escape_output($user_details->full_name) ?>">
                            </div>
                            <?php if (form_error('full_name')) { ?>
                            <div class="callout callout-danger my-2">
                                <span class="error_paragraph"><?php echo form_error('full_name'); ?></span>
                            </div>
                            <?php } ?>
                        </div>

                        <div class="col-sm-12 mb-2 col-md-3">

                            <div class="form-group">
                                <label><?php echo lang('email_address'); ?> </label>
                                <input tabindex="2" type="text" name="email_address" class="form-control"
                                    placeholder="<?php echo lang('email_address'); ?>"
                                    value="<?php echo escape_output($user_details->email_address) ?>">
                            </div>
                        </div>
                        <div class="col-sm-12 mb-2 col-md-3">

                            <div class="form-group">
                                <label><?php echo lang('phone'); ?> <span class="required_star">*</span></label>
                                <input tabindex="3" type="text" name="phone" class="form-control integerchk"
                                    placeholder="<?php echo lang('phone'); ?>"
                                    value="<?php echo escape_output($user_details->phone) ?>">
                            </div>
                            <?php if (form_error('phone')) { ?>
                            <div class="callout callout-danger my-2">
                                <span class="error_paragraph"><?php echo form_error('phone'); ?></span>
                            </div>
                            <?php } ?>
                        </div>
                        <div class="col-sm-12 mb-2 col-md-3">
                            <div class="form-group">
                                <label><?php echo lang('designation'); ?><span class="required_star">
                                        *</span></label>
                                <select name="designation" class="form-control select2">
                                    <option value=""><?php echo lang('select'); ?></option>
                                    <option <?php echo set_select('designation','Admin')?> <?php echo isset($user_details->designation) &&  $user_details->designation=="Admin"?'selected':''?> value="Admin"><?php echo lang('Admin'); ?></option>
                                    <option <?php echo set_select('designation','Cashier')?> <?php echo isset($user_details->designation) &&  $user_details->designation=="Cashier"?'selected':''?> value="Cashier"><?php echo lang('Cashier'); ?></option>
                                    <option <?php echo set_select('designation','Manager')?> <?php echo isset($user_details->designation) &&  $user_details->designation=="Manager"?'selected':''?> value="Manager"><?php echo lang('Manager'); ?></option>
                                    <option <?php echo set_select('designation','Waiter')?> <?php echo isset($user_details->designation) &&  $user_details->designation=="Waiter"?'selected':''?> value="Waiter"><?php echo lang('Waiter'); ?></option>
                                    <option <?php echo set_select('designation','Normal User')?> <?php echo isset($user_details->designation) &&  $user_details->designation=="Normal User"?'selected':''?> value="Normal User"><?php echo lang('Normal_Users'); ?></option>
                                    <option <?php echo set_select('designation','Others')?> <?php echo isset($user_details->designation) &&  $user_details->designation=="Others"?'selected':''?> value="Others"><?php echo lang('Others'); ?></option>
                                </select>
                            </div>
                            <?php if (form_error('designation')) { ?>
                            <div class="callout callout-danger my-2">
                                <span class="error_paragraph"><?php echo form_error('designation'); ?></span>
                            </div>
                            <?php } ?>
                        </div>
                        <?php
                        $language_manifesto = $this->session->userdata('language_manifesto');
                        if(str_rot13($language_manifesto)=="eriutoeri"  && !(isFoodCourt('sGmsJaFJE'))):
                        ?>
                        <div class="col-sm-12 mb-2 col-md-6">

                            <div class="form-group">
                                <label><?php echo lang('outlets'); ?></label>
                                <br>
                                <?php
                                foreach ($outlets as $value) {
                                    $outlets_tmp = explode(",",$user_details->outlets);
                                    $checked = '';
                                    if(isset($outlets_tmp) && $outlets_tmp){
                                        foreach ($outlets_tmp as $ky=>$v){
                                            if ($v == $value->id) {
                                                $checked=  "checked";
                                            }
                                        }
                                    }
                                    ?>

                                    <label class="txt_34"> <input class="outlet_class" type="checkbox" name="outlets[]"
                                     <?=escape_output($checked)?>  <?php echo set_checkbox('outlets[]', $value->id); ?> value="<?php echo escape_output($value->id) ?>"> <?php echo escape_output($value->outlet_name) ?> </label>
                                <?php } ?>
                                <div class="callout callout-danger my-2 outlet_error txt_11">
                                    <span class="error_paragraph"><?php echo lang('Please_select_at_least_one_outlet'); ?></span>
                                </div>
                            </div>
                        </div>
                            <?php
                        endif;
                        ?>
                        <div class="col-sm-12 mb-2 col-md-6">
                            <div class="form-group">
                                <label><?php echo lang('kitchens'); ?><small>(<?php echo lang('user_tooltip_kitchens'); ?>)</small></label>
                                <br>
                                <?php
                                foreach ($kitchens as $value) {
                                    $kitchens_tmp = explode(",",$user_details->kitchens);
                                    $checked = '';
                                    if(isset($kitchens_tmp) && $kitchens_tmp){
                                        foreach ($kitchens_tmp as $ky=>$v){
                                            if ($v == $value->id) {
                                                $checked=  "checked";
                                            }
                                        }
                                    }

                                    ?>
                                    <label class="container mt-2">
                                        <input class="outlet_class" <?=escape_output($checked)?>  type="checkbox" name="kitchens[]" <?php echo set_checkbox('kitchens[]', $value->id); ?> value="<?php echo escape_output($value->id) ?>"> <?php echo escape_output($value->name) ?>
                                        <span class="checkmark"></span>

                                    </label>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                    <p>&nbsp;</p>
                    <div class="row">
                        <div class="col-sm-12 mb-2 col-md-6">
                            <div class="form-group radio_button_problem">
                                <label><?php echo lang('will_login'); ?> <span class="required_star">*</span></label>
                                <div class="radio">
                                    <label>
                                        <input tabindex="5" type="radio" name="will_login" id="will_login_yes"
                                            value="Yes"
                                            <?php if($user_details->will_login=="Yes"){echo "checked";} ?>><?php echo lang('yes'); ?> </label>
                                    <label>

                                        <input tabindex="6" type="radio" name="will_login" id="will_login_no" value="No"
                                            <?php if($user_details->will_login=="No"){echo "checked";} ?>><?php echo lang('no'); ?>
                                    </label>
                                </div>
                            </div>
                            <?php if (form_error('will_login')) { ?>
                            <div class="callout callout-danger my-2">
                                <?php echo form_error('will_login'); ?>
                            </div>
                            <?php } ?>
                        </div>
                    </div>

                    <div id="will_login_section"
                        style="display:<?php if($user_details->will_login=="Yes"){echo "block;";}else{echo "none;";}?>">
                        <div class="row">
                            <div class="col-sm-12 mb-2 col-md-3">
                                <div class="form-group">
                                    <label> <?php echo lang('order_receiving'); ?></label>
                                    <select  class="form-control select2" name="order_receiving_id" id="order_receiving_id">
                                        <option value=""><?php echo lang('select'); ?></option>
                                        <?php
                                        foreach ($waiters as $value):
                                            if($value->designation=="Cashier"):
                                                if($user_details->id!=$value->id):
                                                ?>
                                                <option <?php echo ($user_details->order_receiving_id==$value->id)?'selected':''?>  <?php echo set_select('order_receiving_id',$value->id)?> value="<?=$value->id?>"><?=$value->full_name?></option>
                                                <?php
                                                endif;
                                            endif;
                                        endforeach;
                                        ?>
                                    </select>
                                </div>
                                <?php if (form_error('order_receiving_id')) { ?>
                                    <div class="callout callout-danger my-2">
                                        <?php echo form_error('order_receiving_id'); ?>
                                    </div>
                                <?php } ?>
                            </div>
                            <div class="clearfix"></div>
                            <div class="col-sm-12 mb-2 col-md-3">
                                <div class="form-group">
                                    <label><?php echo lang('role'); ?><span class="required_star"> *</span></label>
                                    <select name="role_id" class="form-control select2">
                                        <option value=""><?php echo lang('select'); ?></option>
                                        <?php foreach ($roles as $value): ?>
                                            <option <?php echo ($user_details->role_id==$value->id)?'selected':''?> <?php echo set_select('role_id',$value->id)?> value="<?php echo escape_output($value->id)?>"><?php echo escape_output($value->role_name)?></option>
                                        <?php endforeach;?>
                                    </select>
                                </div>
                                <?php if (form_error('role_id')) { ?>
                                    <div class="callout callout-danger my-2">
                                        <span class="error_paragraph"><?php echo form_error('role_id'); ?></span>
                                    </div>
                                <?php } ?>
                            </div>
                            <div class="col-sm-12 mb-2 col-md-3">

                                <div class="form-group">
                                    <label><?php echo lang('password'); ?> <span class="required_star">*</span></label>
                                    <input tabindex="7" type="text" name="password" class="form-control"
                                        placeholder="<?php echo lang('password'); ?>"
                                        value="">
                                </div>
                                <?php if (form_error('password')) { ?>
                                <div class="callout callout-danger my-2">
                                    <span class="error_paragraph"><?php echo form_error('password'); ?></span>
                                </div>
                                <?php } ?>
                            </div>

                            <div class="col-sm-12 mb-2 col-md-3">

                                <div class="form-group">
                                    <label><?php echo lang('confirm_password'); ?> <span
                                            class="required_star">*</span></label>
                                    <input tabindex="8" type="text" name="confirm_password" class="form-control"
                                        placeholder="<?php echo lang('confirm_password'); ?>"
                                        value="">
                                </div>
                                <?php if (form_error('confirm_password')) { ?>
                                <div class="callout callout-danger my-2">
                                    <span class="error_paragraph"><?php echo form_error('confirm_password'); ?></span>
                                </div>
                                <?php } ?>
                            </div>
                            <div class="col-sm-12 mb-2 col-md-3">
                                <div class="form-group">
                                    <label><?php echo lang('login_pin'); ?>
                                    </label><a class="btn btn-xs btn-primary generate_now pull-right"><?php echo lang('Generate'); ?></a>
                                    <input tabindex="9" type="text" id="login_pin"  onfocus="select();"  name="login_pin" class="form-control"
                                           placeholder="<?php echo lang('login_pin'); ?>"
                                           value="<?php echo escape_output($user_details->login_pin) ?>">
                                </div>
                                <?php if (form_error('login_pin')) { ?>
                                    <div class="callout callout-danger my-2">
                                        <span class="error_paragraph"><?php echo form_error('login_pin'); ?></span>
                                    </div>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.box-body -->

               
                <div class="row mt-2">
                        <div class="col-sm-12 col-md-2 mb-2">
                            <button type="submit" name="submit" value="submit"
                            class="btn bg-blue-btn w-100"><?php echo lang('submit'); ?></button>
                        </div>
                        <div class="col-sm-12 col-md-2 mb-2">

                        <a class="btn bg-blue-btn w-100" href="<?php echo base_url() ?>User/users">
                            <?php echo lang('back'); ?>
                        </a>
                        </div>
                    </div>
                <?php echo form_close(); ?>
            </div>
        </div>
    
</section>
<script type="text/javascript" src="<?php echo base_url('frequent_changing/js/add_user.js'); ?>"></script>