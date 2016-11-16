<form id="edit_question_form" name="edit_question_form">

    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            <h4 class="modal-title" id="q_cat_title"><?php echo $question->type;?></h4>
        </div>
        <div class="modal-body">
            <div class="row">
                <div class="col-md-4" style="border-right: 1px solid #F3F3F3;">
                    <div class="form-group">
                        <select id="question_type_id" class="form-control ques_type" name="question_type_id">
                            <option value="">Select Question Type</option>
                            <?php foreach ($question_types as $question_type) { ?>
                                <option
                                    value="<?php echo $question_type->id; ?>" <?php if (
                                    $question_type->id == $question->question_type_id
                                ) {
                                    ?> selected="true" <?php } ?>><?php echo $question_type->name; ?></option>
                            <?php
                            }
                            ?>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="question_name">Question (English)</label>
                        <textarea id="question_name" class="form-control" name="question_name"
                                  onkeyup="fill_question(this)"><?php echo $question->question_name;?></textarea>
                    </div>

                    <?php if ($questionnaire->language_type == 'multi' || $questionnaire->language_type == 'si'
                    ) {
                        ?>
                        <div class="form-group">
                            <label for="question_name_si">Question (Sinhala)</label>
                            <textarea id="question_name_si" class="form-control"
                                      name="question_name_si"><?php echo $question->question_name_si;?></textarea>
                        </div>
                    <?php
                    }
                    if ($questionnaire->language_type == 'multi' || $questionnaire->language_type == 'ta'
                    ) {
                        ?>
                        <div class="form-group">
                            <label for="question_name_ta">Question (Tamil)</label>
                            <textarea id="question_name_ta" class="form-control"
                                      name="question_name_ta"><?php echo $question->question_name_ta;?></textarea>
                        </div>

                    <?php }?>

                    <div class="form-group cc">
                        <div class="form-group draggable_edit txtArea">

                        </div>

                        <div class="form-group draggable_edit txtfield">

                        </div>
                        <div class="form-group draggable_edit radio">

                        </div>
                        <div class="form-group draggable_edit yn">

                        </div>

                        <input type="text" name="answer_type" id="answer_type_edit" style="visibility: hidden"
                               value="<?php echo $question->answer_type; ?>"/>

                    </div>
                </div>

                <div class="col-md-8">

                    <div id="droppable_edit">

                        <input type="hidden" id="question_id_edit" name="question_id"
                               value="<?php echo $question->id; ?>">
                        <input type="hidden" id="questionnaire_id_edit" name="questionnaire_id"
                               value="<?php echo $questionnaire->id; ?>">

                        <h3 class="q_name_heading"><?php echo $question->question_name;?></h3>

                        <div class="content">
                            <?php if ($question->answer_type == 'emo') { ?>
                                <div><a class="clse">x</a>

                                    <div class="cc-selector">
                                        <div class="op"><input id="Poor1" type="radio" name="answer[1]" value="1">
                                            <label class="drinkcard-cc Poor" for="Poor1"></label>

                                            <p>Poor</p>
                                        </div>
                                        <div class="op">
                                            <input id="Satisfactory1" type="radio" name="answer[1]" value="2">
                                            <label class="drinkcard-cc Satisfactory" for="Satisfactory1"></label>

                                            <p>Satisfactory</p>
                                        </div>
                                        <div class="op">
                                            <input id="Good1" type="radio" name="answer[1]" value="3">
                                            <label class="drinkcard-cc Good" for="Good1"></label>

                                            <p>Good</p>
                                        </div>
                                        <div class="op">
                                            <input id="Excellent1" type="radio" name="answer[1]" checked="true"
                                                   value="4">
                                            <label class="drinkcard-cc Excellent" for="Excellent1"></label>

                                            <p>Excellent</p>
                                        </div>
                                    </div>
                                </div>
                            <?php
                            } else {
                                if ($question->answer_type == 'yno') {
                                    ?>
                                    <div><a class="clse">x</a>

                                        <div class="cc-selector">
                                            <div class="op">
                                                <input checked="checked" id="y31" type="radio" name="answer[31]"
                                                       value="1">
                                                <label class="drinkcard-cc y3" for="y31"></label>

                                            </div>
                                            <div class="op">
                                                <input id="n31" type="radio" name="answer[31]" value="0" checked="true">
                                                <label class="drinkcard-cc n3" for="n31"></label>
                                            </div>
                                        </div>
                                    </div>
                                <?php
                                } else {
                                    if ($question->answer_type == 'txt') {
                                        ?>
                                        <div><a class="clse">x</a><input type="text" class="form-control tfield"
                                                                         id="32tarea"
                                                                         name="answer[32]" placeholder="type here...."/>
                                        </div>
                                    <?php
                                    } else {
                                        if ($question->answer_type == 'tarea') {
                                            ?>
                                            <div>
                                                <a class="clse">x</a>
                                                <textarea type="text" class="form-control tarea" id="32tarea"
                                                          name="answer[32]"
                                                          placeholder="type here...."></textarea>
                                            </div>
                                        <?php
                                        }
                                    }
                                }
                            }?>
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

<script type="text/javascript">
    $(document).ready(function ($) {

        //edit question form validation
        $("#edit_question_form").validate({
            rules: {
                question_name: "required",
                answer_type: "required"
            },
            messages: {
                question_name: "Please enter question name",
                answer_type: "Please select an answer type"
            },
            submitHandler: function (form) {
                questionnaire_id = $('#questionnaire_id_edit').val();
                $.post(site_url + '/questionnaire/edit_question', $('#edit_question_form').serialize(), function (msg) {
                    if (msg == 1) {
                        toastr.success("Successfully saved !!", "Feedbox");
                        setTimeout("location.href = site_url+'/questionnaire/main_form/'+questionnaire_id;", 100);
                    } else {
                        toastr.error("Error Occurred !!", "Feedbox");
                    }
                });


            }
        });

        $(".draggable_edit").draggable({ revert: "invalid", cursor: "move", helper: "clone", start: function (event, ui) {
            $(this).css("z-index", 8000);
        }});
        $("#droppable_edit").droppable({
            hoverClass: "ui-state-active",
            drop: function (event, ui) {
                $(this).addClass("ui-state-highlight");
                $('.content').empty();


                if ($(ui.draggable).hasClass('txtArea')) {

                    $('.content').append('<div><a class=\"clse\">x</a><textarea type="text" class="form-control tarea" id="32tarea" name="answer[32]" placeholder="type here...."></textarea></div>');
                    $('#answer_type_edit').val('tarea');
                } else if ($(ui.draggable).hasClass('txtfield')) {
                    $('.content').append('<div><a class=\"clse\">x</a><input type="text" class="form-control tfield" id="32tarea" name="answer[32]" placeholder="type here...."/></div>');
                    $('#answer_type_edit').val('txt');
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
                    $('#answer_type_edit').val('emo');
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
                    $('#answer_type_edit').val('yno');
                }

            }
        });

        $('.content').on('click', '.clse', function () {
            $(this).parent().empty();
            $('#answer_type_edit').val('');
        });
    });
</script>