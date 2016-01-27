<?php
$thank_txt = $questionnaire->thank_text;
$thank_txt_desc = $questionnaire->thank_text_desc;
if ($this->lang->lang() == "si" && $questionnaire->thank_text_si != "") {
    $thank_txt = $questionnaire->thank_text_si;
} else {
    if ($this->lang->lang() == "ta" && $questionnaire->thank_text_ta != "") {
        $thank_txt = $questionnaire->thank_text_ta;
    }
}

if ($this->lang->lang() == "si" && $questionnaire->thank_text_desc_si != "") {
    $thank_txt_desc = $questionnaire->thank_text_desc_si;
} else {
    if ($this->lang->lang() == "ta" && $questionnaire->thank_text_desc_ta != "") {
        $thank_txt_desc = $questionnaire->thank_text_desc_ta;
    }
}
?>
<style type="text/css">
    .thank-title, .thank-subtitle {
        color: #<?php echo $questionnaire->text_colour;?> !important;
    }
</style>

<div class="row">
    <div class="col-sm-12">
        <center>
            <img id="wizardPicturePreview" title="" class="thank-img"
                 src="<?php echo base_url(); ?>uploads/<?php echo $questionnaire->thank_image; ?>"/>

            <h1 class="thank-title"><?php echo $thank_txt; ?></h1>
            <h4 class="thank-subtitle"><?php echo $thank_txt_desc; ?></h4>
        </center>
    </div>
</div>