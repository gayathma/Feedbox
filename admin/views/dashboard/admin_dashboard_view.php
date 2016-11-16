
<div class="row">
    <div class="col-sm-12">
        <div>
            <header class="panel-heading">

                <a class=" pull-right" href="<?php echo site_url(); ?>/settings"><i
                        class="fa fa-cogs"></i>Settings</a>
            </header>
            <div class="panel-body">
                <div class="row state-overview">
                    <?php
                    $user_service = new User_service();
                    $questionnaire_service = new Questionnaire_service();
                    foreach($locations as $location){
                        ?>
                        <div id="first_btn" class="col-md-3 col-lg-2">
                            <div class="panel-base">
                                <div class="s-ad green"><?php echo $location->name.' - ('. ucfirst($location->type).')';?></div>
                                <div class="s-top-ad green">
                                    <span class="smilie fa dash-plus" style="font-size:4em;padding-top:20px;font-family: 'Open Sans';"> <?php echo count($user_service->get_users_for_location($location->id));?></span>
                                    Users
                                </div>
                                <div class="s-bottom-ad green green-shadow">
                                    <span class="smilie fa dash-plus" style="font-size:4em;padding-top:20px;"> <?php echo count($questionnaire_service->get_questionnaires_only($location->id));?></span>
                                    Feedbacks
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
</div>
