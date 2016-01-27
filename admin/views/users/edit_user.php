<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
    <h4 class="modal-title">Edit User</h4>
</div>
<form id="edit_user_form" name="edit_user_form">
    <div class="modal-body">

        <div class="form-group">
            <label for="name">Name<span class="mandatory">*</span></label>
            <input id="name" class="form-control" name="name" type="text" value="<?php echo $user->name; ?>">
        </div>

        <div class="form-group">
            <label for="user_type">User Type<span class="mandatory">*</span></label>
            <select class="form-control" name="user_type">
                <option value="">- Select User Type -</option>
                <?php foreach ($user_types as $key => $user_type) { ?>
                    <option value="<?php echo $key; ?>"  <?php  if (
                        $user->user_type == $key
                    ) {
                        ?> selected="true" <?php } ?>><?php echo $user_type; ?></option>
                <?php } ?>
            </select>
        </div>

        <div class="form-group">
            <label for="location_id">Location<span class="mandatory">*</span></label>
            <?php  if ($this->session->userdata('USER_TYPE') != '1') { ?>
                <input type="hidden"
                                                                                 name="location_id"
                                                                                 value="<?php echo $this->session->userdata(
                                                                                     'USER_LOCATION'
                                                                                 ); ?>"> <?php } ?>
            <select class="form-control" name="location_id" <?php  if (
                $this->session->userdata('USER_TYPE') != '1'
            ) {
                ?> disabled="true" <?php } ?>>
                <option value="">- Select Location -</option>
                <?php foreach ($locations as $location) { ?>
                    <option value="<?php echo $location->id; ?>" <?php  if (
                        $user->location_id == $location->id
                    ) {
                        ?> selected="true" <?php } ?>><?php echo $location->name; ?></option>
                <?php } ?>
            </select>
        </div>

        <div class="form-group">
            <label for="email">Email<span class="mandatory">*</span></label>
            <input id="email" class="form-control" name="email" type="text" value="<?php echo $user->email; ?>">
        </div>

        <div class="form-group">
            <label for="user_name">User Name<span class="mandatory">*</span></label>
            <input id="user_name" class="form-control" name="user_name" type="text"
                   value="<?php echo $user->user_name; ?>">
        </div>

        <div class="form-group">
            <label for="password_edit">Password<span class="mandatory">*</span></label>
            <input id="password_edit" class="form-control" name="password" type="text">
        </div>

        <div class="form-group">
            <label for="re_password">Confirm Password<span class="mandatory">*</span></label>
            <input id="re_password" class="form-control" name="re_password" type="text">
        </div>
        <input type="hidden"
               name="user_id"
               value="<?php echo $user->id; ?>">
    </div>
    <div class="modal-footer">
        <button data-dismiss="modal" class="btn btn-default" type="button">Close</button>
        <button class="btn btn-success" type="submit">Save</button>

    </div>
</form>

<script type="text/javascript">
    $(document).ready(function () {

        //add user form validation
        $("#edit_user_form").validate({
            rules: {
                name: "required",
                user_type: "required",
                location_id: "required",
                email: {
                    required: true,
                    email: true
                },
                user_name: {
                    required: true,
                    minlength: 3
                },
                password: {
                    required: true,
                    minlength: 6
                },
                re_password: {
                    required: true,
                    minlength: 6,
                    equalTo: $('#password_edit')
                }

            }, submitHandler: function (form) {
                $.post(site_url + '/users/update_user', $('#edit_user_form').serialize(), function (msg) {
                    if (msg == 1) {

                        edit_user_form.reset();
                        toastr.success("Successfully saved !!", "Feedbox");
                        setTimeout("location.href = site_url+'/users/manage_users';", 100);

                    } else {
                        toastr.error("Error Occurred !!", "Feedbox");
                    }
                });
            }
        });
    });

</script>