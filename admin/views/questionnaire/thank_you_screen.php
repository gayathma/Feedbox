<div class="large" style="background-color: <?php echo $questionnaire->thank_bg_colour; ?>;color: #ffffff">
    <div class="row">
        <div class="col-sm-12">
            <script src="<?php echo base_url(); ?>admin_resources/file_upload_plugin/ajaxupload.3.5.js" type="text/javascript"></script>
            <script>
                //upload image
                $(function() {
                    var btnUpload = $('#upload');
                    new AjaxUpload(btnUpload, {
                        action: '<?php echo site_url(); ?>/questionnaire/upload_thank_you_image/<?php echo $questionnaire->id; ?>',
                        name: 'uploadfile',
                        onSubmit: function(file, ext) {
                            if (!(ext && /^(jpg|png|jpeg|gif)$/.test(ext))) {
                                // extension is not allowed 
                                toastr.error('Only JPG, PNG or GIF files are allowed');
                                return false;
                            }
                        },
                        onComplete: function(file, response) {
                            $("#upload").html("");
                            //Add uploaded file to list
                            if (response != "error") {
                                $('#upload').html("");
                                $('#upload').html('<img id="wizardPicturePreview" title="" class="thank-img" src="<?php echo base_url(); ?>uploads/' + response + '"  />');

                            }
                        }
                    });

                });


            </script>
            <center>
                <div id="upload">
                    <img id="wizardPicturePreview" title="" class="thank-img"
                         src="<?php echo base_url(); ?>uploads/<?php echo $questionnaire->thank_image;?>"/>
                </div>
                <a data-toggle="modal" href="#add_thank_you_modal">
                    <h1 class="thank-title"><?php echo $questionnaire->thank_text; ?></h1>
                    <h4 class="thank-subtitle"><?php echo $questionnaire->thank_text_desc; ?></h4>
                </a>
            </center>
        </div>
    </div>
</div>


<!--Thank you Modal -->
<div class="modal fade " id="add_thank_you_modal" tabindex="-1" role="dialog"
     aria-labelledby="add_thank_you_modal_label"
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
                        <input id="thank_text" class="form-control" name="thank_text" type="text" value="<?php echo $questionnaire->thank_text; ?>">
                    </div>

                    <div class="form-group">
                        <label for="thank_text_desc">Text Description</label>
                        <input id="thank_text_desc" class="form-control" name="thank_text_desc" type="text" value="<?php echo $questionnaire->thank_text_desc; ?>">
                    </div>

                    <div class="form-group">
                        <label for="thank_text_ta">Text (Tamil)</label>
                        <input id="thank_text_ta" class="form-control" name="thank_text_ta" type="text" value="<?php echo $questionnaire->thank_text_ta; ?>">
                    </div>

                    <div class="form-group">
                        <label for="thank_text_desc_ta">Text Description(Tamil)</label>
                        <input id="thank_text_desc_ta" class="form-control" name="thank_text_desc_ta" type="text" value="<?php echo $questionnaire->thank_text_desc_ta; ?>">
                    </div>

                    <div class="form-group">
                        <label for="thank_text_si">Text (Sinhala)</label>
                        <input id="thank_text_si" class="form-control" name="thank_text_si" type="text" value="<?php echo $questionnaire->thank_text_si; ?>">
                    </div>

                    <div class="form-group">
                        <label for="thank_text_desc_si">Text Description(Sinhala)</label>
                        <input id="thank_text_desc_si" class="form-control" name="thank_text_desc_si" type="text" value="<?php echo $questionnaire->thank_text_desc_si; ?>">
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
    $(document).ready(function($) {

        //modify texts
        $("#add_thank_form").validate({
            rules: {
                thank_text: "required"
            },
            submitHandler: function(form) {
                $.post(site_url + '/questionnaire/save_thank_you_text', $('#add_thank_form').serialize(), function(msg) {
                    toastr.success("Successfully saved !!", "Feedbox");
                    $('#thank_you_screen_div').html(msg);
                });


            }
        });

        $('#thank_you_screen_div .large').click(function() {
            $('.jscolor').show();
        });
    });
</script>