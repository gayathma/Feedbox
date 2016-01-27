<div class="row">
    <div class="col-sm-12">
        <div>
            <header class="panel-heading" style="padding:0;margin:0;">
                <div class="col-md-4" style="padding:0;margin:0;"><a href="<?php echo site_url(); ?>"><i
                            class="fa fa-home"></i>Workspace</a></div>
                <div class="col-md-4" style="text-align: CENTER;">
                    <!--   <a class="btn btn-create" onclick="open_welcome()"  data-toggle="modal"> Welcome Screen</a> -->
                    <a class="btn btn-create" href="#modify_theme_modal" data-toggle="modal"><i
                            class="fa fa-sign-out logout-icon" style="font-size: 15px;
                            vertical-align: baseline;"></i> Customize Theme</a>
                    <!-- <a class="btn btn-create" onclick="open_thank_you()" data-toggle="modal"> Thank you Screen</a> -->
                </div>
                <div class="col-md-4 rl" style="padding:0;margin:0;"><i
                        class="fa fa-tasks"></i><?php echo $questionnaire->name; ?></div>
            </header>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-sm-12 bk">
        <div class="panel">
            <div class="small" id="welcome_screen_div" onclick="$('#add_welcome_modal').modal('show')">
                <!-- <?php //echo $this->load->view('questionnaire/welcome_screen',$questionnaire);   ?>-->
                <h3>Click to add Welcome screen here</h3>

                <p>Write a welcome message & add logo image or video to make a greate first impression</p>
            </div>
            <div class="large" id="question_list">
                <div class="small" id="thank_you_screen_div" onclick="$('#add_question_modal').modal('show')">
                    <h3>Click to add Question here</h3>

                </div>
                <?php
                $i = 0;
                foreach ($questions as $question):
                    ?>

                    <div class="line-holder" id="ques_<?php echo $question->id; ?>">

                        <span class="numbering"><?php echo++$i; ?></span>
                        <div class="line">
                            <?php echo $question->question_name; ?>
                            <div class="btn-holder">
                                <span
                                    class="label label-primary"><?php echo $question->type; ?></span>
                                <a class="bt"
                                   onclick="edit_question(<?php echo $question->id; ?>,<?php echo $questionnaire->id; ?>)">
                                    <i class="fa fa-pencil" title="Update"></i>
                                </a>
                                <a class="bt" onclick="delete_question(<?php echo $question->id; ?>)">
                                    <i class="fa fa-trash-o " title="Delete"></i>
                                </a>
                            </div>
                        </div>


                    </div>
                <?php endforeach ?>

            </div>
            <div class="small" id="thank_you_screen_div" onclick="$('#add_thankyou_modal').modal('show')">
                <h3>Click to add Thank you screen here</h3>

                <p>Write a custom thank you message and make it easy for your respondents to share your typeform</p>

                <!-- <?php //echo $this->load->view('questionnaire/thank_you_screen',$questionnaire);   ?>-->
            </div>
        </div>

    </div>
</div>

<!-- Only include on form edit page -->
<link rel="stylesheet" type="text/css" media="screen"
      href="<?php echo base_url(); ?>admin_resources/temp/css/jquery-ui.min.css">


<!--Theme -->
<div class="modal fade " id="modify_theme_modal" tabindex="-1" role="dialog"
     aria-labelledby="modify_theme_modal_label"
     aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">

            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Modify Theme</h4>
            </div>
            <form id="add_theme_form" name="add_theme_form">
                <div class="modal-body">
                    <div class="row">

                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="welcome_bg_colour">Background Color</label>

                                <input id="welcome_bg_colour" class="form-control jscolor" name="welcome_bg_colour"
                                       value="<?php echo $questionnaire->welcome_bg_colour; ?>">
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="text_colour">Text Color</label>

                                <input id="text_colour" class="form-control jscolor" name="text_colour"
                                       value="<?php echo $questionnaire->text_colour; ?>">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="banner_colour">Banner Color</label>

                                <input id="banner_colour" class="form-control jscolor" name="banner_colour"
                                       value="<?php echo $questionnaire->banner_colour; ?>">
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="banner_txt_colour">Banner Text Color</label>

                                <input id="banner_txt_colour" class="form-control jscolor" name="banner_txt_colour"
                                       value="<?php echo $questionnaire->banner_txt_colour; ?>">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="banner_colour">Button Type</label>

                                <select id="btn_type" class="form-control" name="btn_type">
                                    <option value="3d" <?php
                                    if ($questionnaire->btn_type == '3d'
                                    ) {
                                        ?> selected="true" <?php } ?>>3D
                                    </option>
                                    <option value="flat" <?php
                                    if ($questionnaire->btn_type == 'flat'
                                    ) {
                                        ?> selected="true" <?php } ?>>Flat
                                    </option>
                                </select>
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="btn_colour">Button Color</label>

                                <input id="btn_colour" class="form-control jscolor" name="btn_colour"
                                       value="<?php echo $questionnaire->btn_colour; ?>">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="btn_text_colour">Button Text Color</label>

                                <input id="btn_text_colour" class="form-control jscolor" name="btn_text_colour"
                                       value="<?php echo $questionnaire->btn_text_colour; ?>">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="text_box_colour">Text Box Color</label>

                                <input id="text_box_colour" class="form-control jscolor" name="text_box_colour"
                                       value="<?php echo $questionnaire->text_box_colour; ?>">
                            </div>
                        </div>
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

<!--welcome -->
<div class="modal fade " id="add_welcome_modal" tabindex="-1" role="dialog"
     aria-labelledby="add_welcome_modal_label"
     aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">

            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Customize Welcome Screen</h4>
            </div>
            <form id="add_welcom_form" name="add_welcom_form">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="welcome_text">Title<span class="mandatory">*</span></label>
                                <input id="welcome_text" class="form-control" name="welcome_text" type="text"
                                       value="<?php echo $questionnaire->welcome_text; ?>">
                            </div>

                            <div class="form-group">
                                <label for="welcome_text_desc">Description</label>
                                <input id="welcome_text_desc" class="form-control" name="welcome_text_desc" type="text"
                                       value="<?php echo $questionnaire->welcome_text_desc; ?>">
                            </div>

                            <div class="form-group">
                                <label for="welcome_text_ta">Title (Tamil)</label>
                                <input id="welcome_text_ta" class="form-control" name="welcome_text_ta" type="text"
                                       value="<?php echo $questionnaire->welcome_text_ta; ?>">
                            </div>

                            <div class="form-group">
                                <label for="welcome_text_desc_ta">Description(Tamil)</label>
                                <input id="welcome_text_desc_ta" class="form-control" name="welcome_text_desc_ta"
                                       type="text" value="<?php echo $questionnaire->welcome_text_desc_ta; ?>">
                            </div>

                            <div class="form-group">
                                <label for="welcome_text_si">Title (Sinhala)</label>
                                <input id="welcome_text_si" class="form-control" name="welcome_text_si" type="text"
                                       value="<?php echo $questionnaire->welcome_text_si; ?>">
                            </div>

                            <div class="form-group">
                                <label for="welcome_text_desc_si">Description(Sinhala)</label>
                                <input id="welcome_text_desc_si" class="form-control" name="welcome_text_desc_si"
                                       type="text" value="<?php echo $questionnaire->welcome_text_desc_si; ?>">
                            </div>
                        </div>
                        <script src="<?php echo base_url(); ?>admin_resources/file_upload_plugin/ajaxupload.3.5.js"
                        type="text/javascript"></script>
                        <script>
                //upload image
                $(function() {
                    var btnUpload = $('#upload_wel');
                    new AjaxUpload(btnUpload, {
                        action: '<?php echo site_url(); ?>/questionnaire/upload_welcome_image/<?php echo $questionnaire->id; ?>',
                        name: 'uploadfile',
                        onSubmit: function(file, ext) {
                            if (!(ext && /^(jpg|png|jpeg|gif)$/.test(ext))) {
                                // extension is not allowed
                                toastr.error('Only JPG, PNG or GIF files are allowed');
                                return false;
                            }
                        },
                        onComplete: function(file, response) {
                            $("#upload_wel").html("");
                            //Add uploaded file to list
                            if (response != "error") {
                                $('#upload_wel').html("");
                                $('#upload_wel').html('<img id="wizardPicturePreview" title="" class="thank-img" src="<?php echo base_url(); ?>uploads/' + response + '"  />');

                            }
                        }
                    });

                });
                        </script>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="logo">Logo (max 251px x 251px)<span class="mandatory">*</span></label>

                                <div id="upload_wel">
                                    <img id="wizardPicturePreview" title="" class="thank-img"
                                         src="<?php
                                         echo base_url(
                                         );
                                         ?>uploads/<?php echo $questionnaire->thank_image; ?>"/>
                                </div>
                            </div>
                        </div>
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

<!--Thank you -->
<div class="modal fade " id="add_thankyou_modal" tabindex="-1" role="dialog"
     aria-labelledby="add_thankyou_modal_label"
     aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">

            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Customize Thank you Screen</h4>
            </div>
            <form id="add_thank_form" name="add_thank_form">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="thank_text">Title<span class="mandatory">*</span></label>
                                <input id="thank_text" class="form-control" name="thank_text" type="text"
                                       value="<?php echo $questionnaire->thank_text; ?>">
                            </div>

                            <div class="form-group">
                                <label for="thank_text_desc">Description</label>
                                <input id="thank_text_desc" class="form-control" name="thank_text_desc" type="text"
                                       value="<?php echo $questionnaire->thank_text_desc; ?>">
                            </div>

                            <div class="form-group">
                                <label for="thank_text_ta">Title (Tamil)</label>
                                <input id="thank_text_ta" class="form-control" name="thank_text_ta" type="text"
                                       value="<?php echo $questionnaire->thank_text_ta; ?>">
                            </div>

                            <div class="form-group">
                                <label for="thank_text_desc_ta">Description(Tamil)</label>
                                <input id="thank_text_desc_ta" class="form-control" name="thank_text_desc_ta"
                                       type="text" value="<?php echo $questionnaire->thank_text_desc_ta; ?>">
                            </div>

                            <div class="form-group">
                                <label for="thank_text_si">Title (Sinhala)</label>
                                <input id="thank_text_si" class="form-control" name="thank_text_si" type="text"
                                       value="<?php echo $questionnaire->thank_text_si; ?>">
                            </div>

                            <div class="form-group">
                                <label for="thank_text_desc_si">Description(Sinhala)</label>
                                <input id="thank_text_desc_si" class="form-control" name="thank_text_desc_si"
                                       type="text" value="<?php echo $questionnaire->thank_text_desc_si; ?>">
                            </div>
                        </div>
                        <script src="<?php echo base_url(); ?>admin_resources/file_upload_plugin/ajaxupload.3.5.js"
                        type="text/javascript"></script>
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
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="thank_text">Image (max 251px x 251px)<span
                                        class="mandatory">*</span></label>

                                <div id="upload">
                                    <img id="wizardPicturePreview" title="" class="thank-img"
                                         src="<?php
                                         echo base_url(
                                         );
                                         ?>uploads/<?php echo $questionnaire->thank_image; ?>"/>
                                </div>
                            </div>
                        </div>
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


<!--Question Add Modal -->
<div class="modal fade " id="add_question_modal" tabindex="-1" role="dialog" aria-labelledby="add_question_modal_label"
     aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <form id="add_question_form" name="add_question_form">

            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title" id="q_cat_title">Question Category goes here ....</h4>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-4" style="border-right: 1px solid #F3F3F3;">
                            <div class="form-group">
                                <select id="question_type_id" class="form-control ques_type" name="question_type_id">
                                    <option value="">Select Question Type</option>
                                    <?php foreach ($question_types as $question_type) { ?>
                                        <option
                                            value="<?php echo $question_type->id; ?>"><?php echo $question_type->name; ?></option>
                                            <?php
                                        }
                                        ?>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="question_name">Question (English)</label>
                                <textarea id="question_name" class="form-control" name="question_name"
                                          onkeyup="fill_question(this)"></textarea>
                            </div>

                            <?php if ($questionnaire->language_type == 'multi') { ?>
                                <div class="form-group">
                                    <label for="question_name_si">Question (Sinhala)</label>
                                    <textarea id="question_name_si" class="form-control"
                                              name="question_name_si"></textarea>
                                </div>

                                <div class="form-group">
                                    <label for="question_name_ta">Question (Tamil)</label>
                                    <textarea id="question_name_ta" class="form-control"
                                              name="question_name_ta"></textarea>
                                </div>

                            <?php } ?>

                            <div class="form-group cc">
                                <div class="form-group draggable txtArea">

                                </div>

                                <div class="form-group draggable txtfield">

                                </div>
                                <div class="form-group draggable radio">

                                </div>
                                <div class="form-group draggable yn">

                                </div>

                                <input type="text" name="answer_type" id="answer_type" style="visibility: hidden"/>

                            </div>
                        </div>

                        <div class="col-md-8">

                            <div id="droppable">


                                <input type="hidden" id="questionnaire_id" name="questionnaire_id"
                                       value="<?php echo $questionnaire->id; ?>">

                                <h3 class="q_name_heading">Question goes here ...</h3>

                                <div class="content">
                                    Drag and drop input fields
                                </div>


                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button data-dismiss="modal" class="btn btn-default" type="button">Close</button>
                    <button class="btn btn-primary" type="submit">Save</button>

                </div>
            </div>


        </form>
    </div>
</div>
<!-- modal -->

<!--Question Edit Modal -->
<div class="modal fade " id="question_edit_div" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg" id="question_edit_content">

    </div>
</div>


<script type="text/javascript" src="<?php echo base_url(); ?>admin_resources/temp/js/jquery-ui.min.js"></script>
<script type="text/javascript">
                            function open_welcome() {
                                $('#welcome_screen_div').show();
                                $('#question_list').hide();
                                $('#thank_you_screen_div').hide();
                            }

                            function open_thank_you() {
                                $('#welcome_screen_div').hide();
                                $('#question_list').hide();
                                $('#thank_you_screen_div').show();
                            }

                            //this is to auto fill the Question
                            function fill_question(element) {

                                var q_text = $(element).val();
                                $('.q_name_heading').html(q_text);
                            }

                            //Edit Question
                            function edit_question(ques_id, questionnaire_id) {

                                $.post(site_url + '/questionnaire/load_edit_question_content', {q_id: ques_id, questionnaire_id: questionnaire_id}, function(msg) {

                                    $('#question_edit_content').html('');
                                    $('#question_edit_content').html(msg);
                                    $('#question_edit_div').modal('show');
                                });
                            }

                            //delete question
                            function delete_question(id) {

                                if (confirm('Are you sure want to delete this Question ?')) {

                                    $.ajax({
                                        type: "POST",
                                        url: site_url + '/questionnaire/delete_question',
                                        data: "id=" + id,
                                        success: function(msg) {
                                            if (msg == 1) {
                                                $('#ques_' + id).hide();
                                                toastr.success("Successfully deleted !!", "Feedbox");
                                            }
                                            else if (msg == 2) {
                                                toastr.error("Cannot be deleted as it is already assigned. !!", "Feedbox");
                                            }
                                        }
                                    });
                                }
                            }

                            $(document).ready(function($) {

                                //modify theme
                                $("#add_theme_form").validate({
                                    submitHandler: function(form) {
                                        $.post(site_url + '/questionnaire/save_theme', $('#add_theme_form').serialize(), function(msg) {
                                            toastr.success("Successfully saved !!", "Feedbox");
                                            $('#modify_theme_modal').modal('hide');
                                        });


                                    }
                                });

                                //modify texts
                                $("#add_thank_form").validate({
                                    rules: {
                                        thank_text: "required"
                                    },
                                    submitHandler: function(form) {
                                        $.post(site_url + '/questionnaire/save_thank_you_text', $('#add_thank_form').serialize(), function(msg) {
                                            toastr.success("Successfully saved !!", "Feedbox");
                                            $('#add_thankyou_modal').modal('hide');
                                        });


                                    }
                                });

                                //modify texts
                                $("#add_welcom_form").validate({
                                    rules: {
                                        welcome_text: "required"
                                    },
                                    submitHandler: function(form) {
                                        $.post(site_url + '/questionnaire/save_welcome', $('#add_welcom_form').serialize(), function(msg) {
                                            toastr.success("Successfully saved !!", "Feedbox");
                                            $('#add_welcome_modal').modal('hide');
                                        });


                                    }
                                });

                                //add new question form validation
                                $("#add_question_form").validate({
                                    rules: {
                                        question_name: "required",
                                        answer_type: "required"
                                    },
                                    messages: {
                                        question_name: "Please enter question name",
                                        answer_type: "Please select an answer type"
                                    },
                                    submitHandler: function(form) {
                                        questionnaire_id = $('#questionnaire_id').val();
                                        $.post(site_url + '/questionnaire/save_question', $('#add_question_form').serialize(), function(msg) {
                                            if (msg == 1) {
                                                toastr.success("Successfully saved !!", "Feedbox");
                                                setTimeout("location.href = site_url+'/questionnaire/main_form/'+questionnaire_id;", 100);
                                            } else {
                                                toastr.error("Error Occurred !!", "Feedbox");
                                            }
                                        });


                                    }
                                });

                                $(".draggable").draggable({revert: "invalid", cursor: "move", helper: "clone", start: function(event, ui) {
                                        $(this).css("z-index", 8000);
                                    }});
                                $("#droppable").droppable({
                                    hoverClass: "ui-state-active",
                                    drop: function(event, ui) {
                                        $(this).addClass("ui-state-highlight");
                                        $('.content').empty();


                                        if ($(ui.draggable).hasClass('txtArea')) {

                                            $('.content').append('<div><a class=\"clse\">x</a><textarea type="text" class="form-control tarea" id="32tarea" name="answer[32]" placeholder="type here...."></textarea></div>');
                                            $('#answer_type').val('tarea');
                                        } else if ($(ui.draggable).hasClass('txtfield')) {
                                            $('.content').append('<div><a class=\"clse\">x</a><input type="text" class="form-control tfield" id="32tarea" name="answer[32]" placeholder="type here...."/></div>');
                                            $('#answer_type').val('txt');
                                        } else if ($(ui.draggable).hasClass('radio')) {
                                            $('.content').append("<div><a class=\"clse\">x</a><div class=\"cc-selector\">" +
                                                    "                                                                                    <div class=\"op\">" +
                                                    "                                                <input id=\"Poor1\" type=\"radio\" name=\"answer[1]\" value=\"1\">" +
                                                    "                                                <label class=\"drinkcard-cc Poor\" for=\"Poor1\"></label>" +
                                                    "                                                <p>Poor</p>" +
                                                    "                                            </div>" +
                                                    "                                                                                    <div class=\"op\">" +
                                                    "                                                <input id=\"Satisfactory1\" type=\"radio\" name=\"answer[1]\" value=\"2\">" +
                                                    "                                                <label class=\"drinkcard-cc Satisfactory\" for=\"Satisfactory1\"></label>" +
                                                    "                                                <p>Satisfactory</p>" +
                                                    "                                            </div>" +
                                                    "                                                                                    <div class=\"op\">" +
                                                    "                                                <input id=\"Good1\" type=\"radio\" name=\"answer[1]\" value=\"3\">" +
                                                    "                                                <label class=\"drinkcard-cc Good\" for=\"Good1\"></label>" +
                                                    "                                                <p>Good</p>" +
                                                    "                                            </div>" +
                                                    "                                                                                    <div class=\"op\">" +
                                                    "                                                <input id=\"Excellent1\" type=\"radio\" name=\"answer[1]\" checked=\"true\" value=\"4\">" +
                                                    "                                                <label class=\"drinkcard-cc Excellent\" for=\"Excellent1\"></label>" +
                                                    "                                                <p>Excellent</p>" +
                                                    "                                            </div>" +
                                                    "                                                                            </div></div>");
                                            $('#answer_type').val('emo');
                                        } else if ($(ui.draggable).hasClass('yn')) {
                                            $('.content').append("<div><a class=\"clse\">x</a><div class=\"cc-selector\">" +
                                                    "                                        <div class=\"op\">" +
                                                    "                                            <input checked=\"checked\" id=\"y31\" type=\"radio\" name=\"answer[31]\" value=\"1\">" +
                                                    "                                            <label class=\"drinkcard-cc y3\" for=\"y31\"></label>" +
                                                    "                                            " +
                                                    "                                        </div>" +
                                                    "                                        <div class=\"op\">" +
                                                    "                                            <input id=\"n31\" type=\"radio\" name=\"answer[31]\" value=\"0\" checked=\"true\">" +
                                                    "                                            <label class=\"drinkcard-cc n3\" for=\"n31\"></label>" +
                                                    "                                            " +
                                                    "                                        </div>" +
                                                    "                                    </div></div>");
                                            $('#answer_type').val('yno');
                                        }

                                    }
                                });


                                $('.content').on('click', '.clse', function() {
                                    $(this).parent().empty();
                                    $('#answer_type').val('');
                                });

                                $(document).on('change', '.ques_type', function() {
                                    question_type = $(this).find('option:selected').text();
                                    if ($(this).val() != "") {
                                        $('.modal-title').html(question_type);
                                    } else {
                                        $('.modal-title').html("  ");
                                    }
                                });
                            });

</script>