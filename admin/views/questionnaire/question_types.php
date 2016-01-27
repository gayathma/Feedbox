<div class="row">
    <div class="col-sm-12">
        <div>
            <header class="panel-heading" style="padding:0;margin:0;">
                <div class="col-md-4" style="padding:0;margin:0;"><a href="<?php echo site_url(); ?>"><i
                            class="fa fa-home"></i>Workspace</a></div>
                <div class="col-md-4">
                    <a class="btn btn-create" style="padding: 2px;
    width: 30%;" href="#add_question_ty_modal" data-toggle="modal"><i
                            style="font-size: 15px;
    vertical-align: baseline;" class="fa fa-sign-out logout-icon"></i> Create</a>
                </div>
                <div class="col-md-4 rl" style="padding:0;margin:0;">
                    <a href="<?php echo site_url(); ?>/questionnaire/question_types"><i
                            class="fa fa-tasks"></i>Question Types</a>
                </div>
            </header>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-sm-12 bk">
        <div class="panel">
            <div class="panel-body large">
                <div class="adv-table">
                    <table class="display table table-bordered table-striped" id="q_t_table">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Type Name</th>
                            <th>Type Name (Sinhala)</th>
                            <th>Type Name (Tamil)</th>
                            <th>Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        $i = 0;
                        foreach ($question_types as $question_type) {
                            ?>
                            <tr id="q_t_<?php echo $question_type->id; ?>">
                                <td><?php echo++$i; ?></td>
                                <td><?php echo $question_type->name; ?></td>
                                <td><?php echo $question_type->name_si; ?></td>
                                <td><?php echo $question_type->name_ta; ?></td>

                                <td align="center">
                                    <a class="bt"
                                       onclick="display_question_type_pop_up(<?php echo $question_type->id; ?>)"><i
                                            class="fa fa-pencil" title="Update"></i></a>
                                    <a class="bt"
                                       onclick="delete_question_type(<?php echo $question_type->id; ?>)"><i
                                            class="fa fa-trash-o " title="" title="Remove"></i></a>
                                </td>
                            </tr>
                        <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<!--Question Types Add Modal -->
<div class="modal fade " id="add_question_ty_modal" tabindex="-1" role="dialog"
     aria-labelledby="add_question_ty_modal_label"
     aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">

            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Add New Question Type</h4>
            </div>
            <form id="add_question_ty_form" name="add_question_ty_form">
                <div class="modal-body">

                    <div class="form-group">
                        <label for="name">Type Name<span class="mandatory">*</span></label>
                        <input id="name" class="form-control" name="name" type="text">
                    </div>

                    <div class="form-group">
                        <label for="name_si">Type Name (Sinhala)</label>
                        <input id="name_si" class="form-control" name="name_si" type="text">
                    </div>

                    <div class="form-group">
                        <label for="name_ta">Type Name (Tamil)</label>
                        <input id="name_ta" class="form-control" name="name_ta" type="text">
                    </div>

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

<!--Question Type Edit Modal -->
<div class="modal fade " id="question_t_edit_div" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content" id="question_t_edit_content">

        </div>
    </div>
</div>

<script type="text/javascript">
    $(document).ready(function () {

        $('#q_t_table').dataTable();

        //add animal form validation
        $("#add_question_ty_form").validate({
            rules: {

                name: "required"

            }, submitHandler: function (form) {
                $.post(site_url + '/questionnaire/save_questions_type', $('#add_question_ty_form').serialize(), function (msg) {
                    if (msg == 1) {

                        add_question_ty_form.reset();
                        toastr.success("Successfully saved !!", "Feedbox");
                        setTimeout("location.href = site_url+'/questionnaire/question_types';", 100);

                    } else {
                        toastr.error("Error Occurred !!", "Feedbox");
                    }
                });
            }
        });
    });

    //Edit question type
    function display_question_type_pop_up(ques_ty_id) {

        $.post(site_url + '/questionnaire/load_edit_question_type_content', {ques_ty_id: ques_ty_id}, function (msg) {

            $('#question_t_edit_content').html('');
            $('#question_t_edit_content').html(msg);
            $('#question_t_edit_div').modal('show');
        });
    }

    //delete question type
    function delete_question_type(id) {
        if (confirm('Are you sure want to delete this Question Type?')) {

            $.ajax({
                type: "POST",
                url: site_url + '/questionnaire/delete_question_type',
                data: "id=" + id,
                success: function (msg) {
                    if (msg == 1) {
                        $('#q_t_' + id).hide();
                        toastr.success("Successfully deleted !!", "Feedbox");
                    }
                    else if (msg == 2) {
                        toastr.error("Cannot be deleted as it is already assigned. !!", "Feedbox");
                    }
                }
            });
        }
    }
</script>

