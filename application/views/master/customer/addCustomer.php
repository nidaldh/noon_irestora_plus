
 <!-- Main content -->
 <section class="main-content-wrapper">
    <section class="content-header">
        <h3 class="top-left-header">
            <?php echo lang('add_customer'); ?>
        </h3>
    </section>

    <div class="box-wrapper">
        <div class="table-box">

                 <?php echo form_open(base_url('customer/addEditCustomer')); ?>
                 <div>
                     <div class="row">
                         <div class="col-sm-12 mb-2 col-md-4">

                             <div class="form-group">
                                 <label><?php echo lang('customer_name'); ?> <span
                                         class="required_star">*</span></label>
                                 <input tabindex="1" type="text" name="name" class="form-control"
                                     placeholder="<?php echo lang('customer_name'); ?>"
                                     value="<?php echo set_value('name'); ?>">
                             </div>
                             <?php if (form_error('name')) { ?>
                             <div class="callout callout-danger my-2">
                                 <?php echo form_error('name'); ?>
                             </div>
                             <?php } ?>
                         </div>
                         <div class="col-sm-12 mb-2 col-md-4">

                             <div class="form-group">
                                 <label><?php echo lang('phone'); ?> <span class="required_star">*</span></label>
                                 <small><?php echo lang('should_country_code'); ?></small>
                                 <input tabindex="2" type="text" name="phone" class="form-control integerchk"
                                     placeholder="<?php echo lang('phone'); ?>"
                                     value="<?php echo set_value('phone'); ?>">
                             </div>
                             <?php if (form_error('phone')) { ?>
                             <div class="callout callout-danger my-2">
                                 <?php echo form_error('phone'); ?>
                             </div>
                             <?php } ?>
                         </div>
                         <div class="col-sm-12 mb-2 col-md-4">
                             <div class="form-group">
                                 <label><?php echo lang('email'); ?></label>
                                 <input tabindex="3" type="text" name="email" class="form-control"
                                     placeholder="<?php echo lang('email'); ?>"
                                     value="<?php echo set_value('email'); ?>">
                             </div>
                             <?php if (form_error('email')) { ?>
                             <div class="callout callout-danger my-2">
                                 <?php echo form_error('email'); ?>
                             </div>
                             <?php } ?>
                         </div>
                         <div class="col-sm-12 mb-2 col-md-4">
                             <div class="form-group">
                                 <label><?php echo lang('date_of_birth'); ?></label>
                                 <input tabindex="4" type="text" id="date" name="date_of_birth"
                                     class="form-control w-100 datepicker" placeholder="<?php echo lang('date_of_birth'); ?>"
                                     value="">
                             </div>

                         </div>
                         <div class="col-sm-12 mb-2 col-md-4">
                             <div class="form-group">
                                 <label><?php echo lang('date_of_anniversary'); ?></label>
                                 <input tabindex="5" type="text" id="dates2" name="date_of_anniversary"
                                     class="form-control " placeholder="<?php echo lang('date_of_anniversary'); ?>"
                                     value="">
                             </div>

                         </div>
                         <div class="col-sm-12 mb-2 col-md-4">
                             <div class="form-group">
                                 <label><?php echo lang('address'); ?></label>
                                 <textarea tabindex="6" name="address" class="form-control"
                                     placeholder="<?php echo lang('address'); ?>"></textarea>
                             </div>
                         </div>
                         <div class="col-sm-12 mb-2 col-md-4">
                             <div class="form-group">
                                 <label><?php echo lang('default_discount'); ?></label>
                                 <input tabindex="3" type="text" name="default_discount" class="form-control"
                                        placeholder="<?php echo lang('default_discount_pl'); ?>"
                                        value="<?php echo set_value('default_discount'); ?>">
                             </div>
                             <?php if (form_error('default_discount')) { ?>
                                 <div class="callout callout-danger my-2">
                                     <?php echo form_error('default_discount'); ?>
                                 </div>
                             <?php } ?>
                         </div>
                         <?php if(collectGST()=="Yes"){?>
                             <div class="col-sm-12 mb-2 col-md-4">
                                 <div class="form-group">
                                     <label> <?php echo lang('same_or_diff_state'); ?> <span class="required_star">*</span></label>
                                     <select tabindex="4" class="form-control select2" name="same_or_diff_state"
                                             id="same_or_diff_state">
                                         <option value=""><?php echo lang('select'); ?></option>
                                         <option <?php echo set_value('same_or_diff_state',1)?> value="1"><?php echo lang('same_state'); ?></option>
                                         <option <?php echo set_value('same_or_diff_state',2)?> value="2"><?php echo lang('different_state'); ?></option>
                                     </select>
                                 </div>
                                 <?php if (form_error('same_or_diff_state')) { ?>
                                     <div class="callout callout-danger my-2">
                                         <?php echo form_error('same_or_diff_state'); ?>
                                     </div>
                                 <?php } ?>
                             </div>

                             <div class="col-sm-12 mb-2 col-md-4">
                                 <div class="form-group">
                                     <label><?php echo lang('gst_number'); ?></label>
                                     <input tabindex="3" type="text" name="gst_number" class="form-control"
                                         placeholder="<?php echo lang('gst_number'); ?>"
                                         value="<?php echo set_value('gst_number'); ?>">
                                 </div>
                                 <?php if (form_error('gst_number')) { ?>
                                 <div class="callout callout-danger my-2">
                                     <?php echo form_error('gst_number'); ?>
                                 </div>
                                 <?php } ?>
                             </div>
                         <?php } ?>


                     </div>
                 </div>

                 <div class="row mt-2">
                    <div class="col-sm-12 col-md-2 mb-2">
                        <button type="submit" name="submit" value="submit"
                            class="btn bg-blue-btn w-100"><?php echo lang('submit'); ?></button>
                    </div>
                    <div class="col-sm-12 col-md-2 mb-2">
                        <a class="btn bg-blue-btn w-100" href="<?php echo base_url() ?>customer/customers">
                            <?php echo lang('back'); ?>
                        </a>
                    </div>
                 </div>
                 <?php echo form_close(); ?>
        </div>
    </div>
  
 </section>