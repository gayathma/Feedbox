<div class="row">
    <div class="col-sm-12">
        <div>
            <header class="panel-heading" style="padding:0;margin:0;">
                <div class="col-md-4" style="padding:0;margin:0;"><a href="<?php echo site_url(); ?>/home/admin_home"><i
                            class="fa fa-home"></i>Workspace</a></div>
                <div class="col-md-4">
                    <a class="btn btn-create" style="padding: 2px;
                       width: 30%;" href="#add_location_modal" data-toggle="modal"><i
                            style="font-size: 15px;
                            vertical-align: baseline;" class="fa fa-sign-out logout-icon"></i> Create</a>
                </div>
                <div class="col-md-4 rl" style="padding:0;margin:0;"><i
                        class="fa fa-location-arrow"></i>Locations</div>
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
                            <th>Location</th>
                            <th>Type</th>
                            <th>Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        $i = 0;
                        foreach ($locations as $location) {
                            ?>
                            <tr id="lc_<?php echo $location->id; ?>">
                                <td><?php echo++$i; ?></td>
                                <td><?php echo $location->name; ?></td>
                                <td><?php echo ucfirst($location->type); ?></td>

                                <td align="center">
                                    <a class="bt"
                                       onclick="display_location_pop_up(<?php echo $location->id; ?>)"><i
                                            class="fa fa-pencil" title="Update"></i></a>
                                    <a class="bt"
                                       onclick="delete_location(<?php echo $location->id; ?>)"><i
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

<!--Location Add Modal -->
<div class="modal fade " id="add_location_modal" tabindex="-1" role="dialog"
     aria-labelledby="add_location_modal_label"
     aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">

            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Add New Location</h4>
            </div>
            <form id="add_location_form" name="add_location_form">
                <div class="modal-body">

                    <div class="form-group">
                        <label for="name">Name<span class="mandatory">*</span></label>
                        <input id="name" class="form-control" name="name" type="text">
                    </div>

                    <div class="form-group">
                        <label for="type">Type</label>
                        <select class="form-control" name="type">
                            <option value="">- Select Type -</option>
                            <?php foreach ($business_types as $key => $business_type) { ?>
                                <option value="<?php echo $key; ?>"><?php echo $business_type; ?></option>
                            <?php } ?>
                        </select>
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

<!--Location Edit Modal -->
<div class="modal fade " id="location_edit_div" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content" id="location_edit_content">

        </div>
    </div>
</div>

<script type="text/javascript">
    $(document).ready(function () {

        $('#q_t_table').dataTable();

        //add location form validation
        $("#add_location_form").validate({
            rules: {

                name: "required",
                type: "required"

            }, submitHandler: function (form) {
                $.post(site_url + '/locations/save_location', $('#add_location_form').serialize(), function (msg) {
                    if (msg == 1) {

                        add_location_form.reset();
                        toastr.success("Successfully saved !!", "Feedbox");
                        setTimeout("location.href = site_url+'/locations/manage_locations';", 100);

                    } else {
                        toastr.error("Error Occurred !!", "Feedbox");
                    }
                });
            }
        });
    });

    //Edit location
    function display_location_pop_up(loc_id) {

        $.post(site_url + '/locations/load_edit_location_content', {loc_id: loc_id}, function (msg) {

            $('#location_edit_content').html('');
            $('#location_edit_content').html(msg);
            $('#location_edit_div').modal('show');
        });
    }

    //delete location
    function delete_location(id) {
        if (confirm('Are you sure want to delete this Location?')) {

            $.ajax({
                type: "POST",
                url: site_url + '/locations/delete_location',
                data: "id=" + id,
                success: function (msg) {
                    if (msg == 1) {
                        $('#lc_' + id).hide();
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

