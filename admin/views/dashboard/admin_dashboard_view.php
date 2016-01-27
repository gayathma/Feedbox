<div class="row">
    <div class="col-sm-12">
        <div>
            <header class="panel-heading">
                <a href="#"><i
                        class="fa fa-tasks"></i>Overview</a>
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
                    <div class="col-lg-3 col-sm-6">
                        <span><?php echo $location->name.' - ('. ucfirst($location->type).')';?></span>
                        <section class="panel">

                            <div class="symbol terques">
                                <i class="fa fa-home"></i>
                            </div>
                            <div class="value">
                                <h1 class="count"> <?php echo count($user_service->get_users_for_location($location->id));?> </h1>
                                <p>Users</p>
                                <h1 class="count"> <?php echo count($questionnaire_service->get_questionnaires_only($location->id));?>  </h1>
                                <p>Feedbacks</p>
                            </div>
                        </section>
                    </div>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
</div>
