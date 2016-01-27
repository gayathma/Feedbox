<div class="large" style="background-color: <?php echo $questionnaire->thank_bg_colour; ?>;color: #ffffff">
    <div class="row pd-tp">
        <div class="col-sm-4">
            <div class="picture-container">
                <div>
                    <img id="wizardPicturePreview" class="welcomeImage"
                         src="<?php echo base_url(); ?>application_resources/images/face.png"/>
                </div>
            </div>
        </div>

        <div class="col-sm-8">
            <h2 class="main-title"><?php echo $this->lang->line('welcome_message'); ?></h2>
            <h4 class="sub-title"><?php echo $this->lang->line('welcome_description'); ?></h4>

            <div class="row">
                <div class="col-sm-8 p-r-zero">
                    <input type="text" class="form-control patient-number" name="patient_number"
                           placeholder="<?php echo $this->lang->line(
                               'patient_no_place_holder'
                           ); ?>">
                </div>

                <div class="col-sm-4 p-l-zero">
                    <input type='button'
                           class='cbtn btn-next'
                           name='next'
                           value='<?php echo $this->lang->line('start_btn_txt'); ?>'/>
                </div>
            </div>

        </div>
    </div>
</div>


<!--Thank you Modal -->
<div class="modal fade " id="add_welcome_modal" tabindex="-1" role="dialog"
     aria-labelledby="add_welcome_modal_label"
     aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">

            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Modify Description</h4>
            </div>
            <form id="add_thank_form" name="add_thank_form">
                <div class="modal-body">

                    <div class="form-group">
                        <label for="thank_text">Text<span class="mandatory">*</span></label>
                        <input id="thank_text" class="form-control" name="thank_text" type="text" value="<?php echo $questionnaire->thank_text;?>">
                    </div>

                    <div class="form-group">
                        <label for="thank_text_desc">Text Description</label>
                        <input id="thank_text_desc" class="form-control" name="thank_text_desc" type="text" value="<?php echo $questionnaire->thank_text_desc;?>">
                    </div>

                    <div class="form-group">
                        <label for="thank_text_ta">Text (Tamil)</label>
                        <input id="thank_text_ta" class="form-control" name="thank_text_ta" type="text" value="<?php echo $questionnaire->thank_text_ta;?>">
                    </div>

                    <div class="form-group">
                        <label for="thank_text_desc_ta">Text Description(Tamil)</label>
                        <input id="thank_text_desc_ta" class="form-control" name="thank_text_desc_ta" type="text" value="<?php echo $questionnaire->thank_text_desc_ta;?>">
                    </div>

                    <div class="form-group">
                        <label for="thank_text_si">Text (Sinhala)</label>
                        <input id="thank_text_si" class="form-control" name="thank_text_si" type="text" value="<?php echo $questionnaire->thank_text_si;?>">
                    </div>

                    <div class="form-group">
                        <label for="thank_text_desc_si">Text Description(Sinhala)</label>
                        <input id="thank_text_desc_si" class="form-control" name="thank_text_desc_si" type="text" value="<?php echo $questionnaire->thank_text_desc_si;?>">
                    </div>

                    <input type="hidden" value="<?php echo $questionnaire->id; ?>" name="questionnaire_id"/>
                </div>
                <div class="modal-footer">
                    <button data-dismiss="modal" class="btn btn-default" type="button">Close</button>
                    <button class="btn btn-success" type="submit">Save</button>

                </div>
            </form>
        </div>
    </div>
</div>
<!-- modal -->


<script type="text/javascript">
    $(document).ready(function ($) {

        //modify texts
        $("#add_thank_form").validate({
            rules: {
                thank_text: "required"
            },
            submitHandler: function (form) {
                $.post(site_url + '/questionnaire/save_thank_you_text', $('#add_thank_form').serialize(), function (msg) {
                    toastr.success("Successfully saved !!", "Feedbox");
                    $('#thank_you_screen_div').html(msg);
                });


            }
        });

        $('#thank_you_screen_div .large').click(function(){
            $('.jscolor').show();
        });
    });
</script>