<div class="row">
    <div class="col-sm-12">
        <div>
            <header class="panel-heading" style="padding:0;margin:0;">
                <div class="col-md-4" style="padding:0;margin:0;"><a href="<?php echo site_url(); ?>"><i
                            class="fa fa-home"></i>Workspace</a></div>
                <div class="col-md-4">
                    &nbsp;
                </div>
                <div class="col-md-4 rl" style="padding:0;margin:0;"></div>
            </header>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-sm-12 bk" style="margin-top: 10px;">
        <div class="panel">
            <div class="large">
                <div class="row">
                    <div class="col-sm-4">

                        <form id="settings_form" name="settings_form" >
                            <?php foreach ($settings as $setting) { ?>

                                <div class="form-group">
                                    <label for="<?php echo $setting->slug?>"><?php echo $setting->name?></label>
                                    <?php if($setting->slug == 'business_type'){?>
                                        <select id="<?php echo $setting->slug?>" class="form-control" name="slug[<?php echo $setting->slug?>]">
                                            <option value="">- Select Business Type -</option>
                                            <?php foreach($business_types as $key => $business_type){?>
                                                <option value="<?php echo $key;?>" <?php if($key == $setting->value){?> selected="true" <?php } ?>><?php echo $business_type;?></option>
                                            <?php }?>
                                        </select>

                                    <?php }else{?>
                                        <input id="<?php echo $setting->slug?>" class="form-control" name="slug[<?php echo $setting->slug?>]" type="text" value="<?php echo $setting->value?>" placeholder="i.e: http://www.feedbox.com/en">
                                    <?php }?>
                                </div>
                            <?php } ?>

                            <div class="form-group">
                                <button class="btn btn-primary pull-right" type="submit">Save</button>
                            </div>
                        </form>

                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    $(document).ready(function () {

        //save settings
        $("#settings_form").validate({
            rules: {

            }, submitHandler: function (form) {
                $.post(site_url + '/settings/save_settings', $('#settings_form').serialize(), function (msg) {
                    if (msg == 1) {
                        settings_form.reset();
                        toastr.success("Successfully saved !!", "Feedbox");

                    } else {
                        toastr.error("Error Occurred !!", "Feedbox");
                    }
                });
            }
        });
    });

</script>