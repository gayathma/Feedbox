<!-- START language button ///////////////////////////// -->
<div class="row">

    <div class="col-md-3 pull-right lang_box">
        <?php if ($questionnaire->language_type == 'multi') { ?>
            <ul class="list-unstyled">
                <li class="dropdown">
                    <a class="dropdown-toggle cbtn" data-toggle="dropdown" href="#" aria-expanded="false">
                        <?php if ($this->lang->lang() == "si") {
                            echo $this->lang->line('si_lang_txt');
                            ?>
                        <?php
                        } elseif ($this->lang->lang() == "en") {
                            echo $this->lang->line('en_lang_txt');
                            ?>
                        <?php
                        } elseif ($this->lang->lang() == "ta") {
                            echo $this->lang->line('ta_lang_txt');
                            ?>
                        <?php }?>
                        <span class="caret"></span>
                    </a>

                    <ul class="dropdown-menu">
                        <?php if ($this->lang->lang() != "si") { ?>
                            <li>
                                <?php echo anchor(
                                    $this->lang->switch_uri('si'), $this->lang->line('si_lang_txt'),
                                    'class=""'
                                )  ?>
                            </li>
                        <?php } ?>
                        <?php if ($this->lang->lang() != "ta") { ?>
                            <li>
                                <?php echo anchor(
                                    $this->lang->switch_uri('ta'), $this->lang->line('ta_lang_txt'),
                                    'class=""'
                                )  ?>
                            </li>
                        <?php } ?>
                        <?php if ($this->lang->lang() != "en") { ?>
                            <li>
                                <?php echo anchor(
                                    $this->lang->switch_uri('en'), $this->lang->line('en_lang_txt'),
                                    'class=""'
                                )  ?>
                            </li>
                        <?php } ?>
                    </ul>

            </ul>
        <?php } ?>
        <!-- END language button ///////////////////////////// -->
    </div>
</div>

<?php
$welcome_txt      = $questionnaire->welcome_text;
$welcome_txt_desc = $questionnaire->welcome_text_desc;
if ($this->lang->lang() == "si" && $questionnaire->welcome_text_si != "") {
    $welcome_txt = $questionnaire->welcome_text_si;
} else if ($this->lang->lang() == "ta" && $questionnaire->welcome_text_ta != "") {
    $welcome_txt = $questionnaire->welcome_text_ta;
}

if ($this->lang->lang() == "si" && $questionnaire->welcome_text_desc_si != "") {
    $welcome_txt_desc = $questionnaire->welcome_text_desc_si;
} else if ($this->lang->lang() == "ta" && $questionnaire->welcome_text_desc_ta != "") {
    $welcome_txt_desc = $questionnaire->welcome_text_desc_ta;
}
?>
<div class="row pd-tp">
    <div class="col-sm-4">
        <div class="picture-container">
            <div>
                <img id="wizardPicturePreview" title="" class="welcomeImage"
                     src="<?php echo base_url(); ?>uploads/<?php echo $questionnaire->welcome_image;?>"/>
            </div>
        </div>
    </div>

    <div class="col-sm-8">
        <h2 class="main-title"><?php echo $welcome_txt; ?></h2>
        <h4 class="sub-title"><?php echo $welcome_txt_desc; ?></h4>

        <div class="row">
            <div class="col-sm-8 p-r-zero">
                <input type="text" class="form-control patient-number" name="patient_number"
                       placeholder="<?php echo $this->lang->line(
                           'patient_no_place_holder'
                       ); ?>">
            </div>

            <div class="col-sm-4 p-l-zero">
                <input type='button'
                       class='cbtn btn-next'
                       name='next'
                       value='<?php echo $this->lang->line('start_btn_txt'); ?>'/>
            </div>
        </div>

    </div>
</div>