<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
    <h4 class="modal-title">Edit Question Type</h4>
</div>
<form id="edit_question_ty_form" name="edit_question_ty_form">
    <div class="modal-body">
        <input type="hidden" name="q_type_id" value="<?php echo $question_type->id; ?>">

        <div class="form-group">
            <label for="name">Type Name<span class="mandatory">*</span></label>
            <input id="name" class="form-control" name="name" type="text" value="<?php echo $question_type->name; ?>">
        </div>

        <div class="form-group">
            <label for="name_si">Type Name (Sinhala)</label>
            <input id="name_si" class="form-control" name="name_si" type="text"
                   value="<?php echo $question_type->name_si; ?>">
        </div>

        <div class="form-group">
            <label for="name_ta">Type Name (Tamil)</label>
            <input id="name_ta" class="form-control" name="name_ta" type="text"
                   value="<?php echo $question_type->name_ta; ?>">
        </div>

    </div>
    <div class="modal-footer">
        <button data-dismiss="modal" class="btn btn-default" type="button">Close</button>
        <button class="btn btn-success" type="submit">Update</button>

    </div>
</form>

<script type="text/javascript">

    //edit animal_cat form validation
    $("#edit_question_ty_form").validate({
        rules: {
            name: "required"
        },
        submitHandler: function (form) {
            $.post(site_url + '/questionnaire/edit_question_type', $('#edit_question_ty_form').serialize(), function (msg) {
                if (msg == 1) {
                    toastr.success("Successfully updated !!", "Feedbox");
                    setTimeout("location.href = site_url+'/questionnaire/question_types';", 100);
                } else {
                    toastr.error("Error Occurred !!", "Feedbox");
                }
            });


        }
    });
</script>