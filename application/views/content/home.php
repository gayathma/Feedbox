<style type="text/css">
    body {
        background-color: #<?php echo $questionnaire->welcome_bg_colour; ?> !important;
    }

    .wizard-card {
        background-color: #<?php echo $questionnaire->welcome_bg_colour; ?> !important;
    }

    .main-title, .sub-title, .questions-container li h3, .op p ,.sub-h, .lbl-f{
        color: #<?php echo $questionnaire->text_colour; ?> !important;
    }

    .cbtn,.dropdown-menu > li > a {
        color: #<?php echo $questionnaire->btn_text_colour; ?> !important;
    }

    .header{
        background-color: #<?php echo $questionnaire->banner_colour; ?> !important;
        color: #<?php echo $questionnaire->banner_txt_colour; ?> !important;
    }

    .patient-number, .tarea {
        background-color:#<?php echo $questionnaire->text_box_colour; ?> !important;
    }

    .lang_btn, .cbtn, .dropdown-menu > li > a {
        background-color:#<?php echo $questionnaire->btn_colour; ?> !important;
    }

    .lang_btn:hover, .cbtn:hover  {
        background-color:<?php echo $light_colour; ?> !important;
    }

    .dropdown-menu > li> a:focus, .dropdown-menu > li> a:hover {
        background-color: <?php echo $light_colour; ?> !important;
    }

    <?php if ($questionnaire->btn_type == '3d') { ?>
        .lang_btn, .cbtn {
            box-shadow: 0 6px 0 <?php echo $dark_colour; ?>;
        }
    <?php } ?>
</style>

<div>
    <!--      Wizard container        -->
    <div class="wizard-container animated fadeInDown">
        <div class="card wizard-card ct-wizard-orange" id="wizardProfile">

            <form class="form-inline" role="form" action="post" id="feed_form">
                <ul class="wizard-nav">
                    <li><a href="#welcome" data-toggle="tab">Welcome</a></li>

                    <?php if ($questionnaire->active_user_detail == '1') { ?>
                        <li><a href="#patient_detail" data-toggle="tab">Patient Detail</a></li>
                    <?php } ?>

                    <?php if (!empty($result_arr)): ?>
                        <?php foreach ($result_arr as $result): ?>
                            <li><a href="#ques_type_<?php echo (is_object($result['question_type'])) ? $result['question_type']->id : "non-cat"; ?>" data-toggle="tab">Qt-<?php echo (is_object($result['question_type'])) ? $result['question_type']->id : "non-cat"; ?></a></li>
                        <?php endforeach; ?>
                    <?php endif; ?>

                </ul>

                <div class="tab-content">
                    <div class="tab-pane" id="welcome">
                        <input type="hidden" value="<?php echo $questionnaire->id; ?>" name="questionnaire_id" id="questionnaire_id"/>
                        <?php echo $this->load->view('content/welcome', $questionnaire); ?>
                    </div>

                    <?php echo $this->load->view('content/questions'); ?>

                    <?php if ($questionnaire->active_user_detail == '1') { ?>
                        <div class="tab-pane" id="patient_detail">
                            <?php echo $this->load->view('content/patient_details'); ?>
                        </div>
                    <?php } ?>
                </div>
                <div class="wizard-footer">
                    <div class="row">
                        <div class="col-sm-11 pre-next-btn">
                            <div class="pull-right">
                                <input type='button' class='cbtn btn-next nxt-btn'
                                       name='next'
                                       value='<?php echo $this->lang->line('next_btn_txt'); ?>'/>
                                <input type='button' class='cbtn btn-finish' name='finish'
                                       value='<?php echo $this->lang->line('finish_btn_txt'); ?>'/>
                            </div>

                            <div class="pull-left">
                                <input type='button' class='cbtn btn-previous'
                                       name='previous' value='<?php echo $this->lang->line('prev_btn_txt'); ?>'/>
                            </div>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                </div>
            </form>
        </div>
    </div>
</div>
<a href="#0" class="cd-top">Top</a>