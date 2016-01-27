<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
    <h4 class="modal-title">Edit Location</h4>
</div>
<form id="edit_location_form" name="edit_location_form">
    <div class="modal-body">
        <input type="hidden" name="loc_id" value="<?php echo $location->id; ?>">
        <div class="form-group">
            <label for="name">Name<span class="mandatory">*</span></label>
            <input id="name" class="form-control" name="name" type="text" value="<?php echo $location->name; ?>">
        </div>

        <div class="form-group">
            <label for="type">Type</label>
            <select class="form-control" name="type">
                <option value="">- Select Type -</option>
                <?php foreach ($business_types as $key => $business_type) { ?>
                    <option value="<?php echo $key; ?>" <?php if($location->type == $key){ ?> selected="true" <?php } ?>><?php echo $business_type; ?></option>
                <?php } ?>
            </select>
        </div>

    </div>
    <div class="modal-footer">
        <button data-dismiss="modal" class="btn btn-default" type="button">Close</button>
        <button class="btn btn-success" type="submit">Save</button>

    </div>
</form>
<script type="text/javascript">

    $("#edit_location_form").validate({
        rules: {

            name: "required",
            type: "required"

        }, submitHandler: function (form) {
            $.post(site_url + '/locations/edit_location', $('#edit_location_form').serialize(), function (msg) {
                if (msg == 1) {

                    edit_location_form.reset();
                    toastr.success("Successfully saved !!", "Feedbox");
                    setTimeout("location.href = site_url+'/locations/manage_locations';", 100);

                } else {
                    toastr.error("Error Occurred !!", "Feedbox");
                }
            });
        }
    });
</script>