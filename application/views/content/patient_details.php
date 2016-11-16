<div class="row">
    <div class="col-sm-12">
        <?php if ($questionnaire->loc_type == 'hospital') {?>
        <h1 class="header"><?php echo $this->lang->line('patient_detail_txt'); ?></h1>
        <?php }else{?>
            <h1 class="header"></h1>
        <?php }?>

    </div>

</div>
<div class="q-container">
    <div class="row rw-mar-b">
        <div class="col-sm-11">
            <span class="sub-h"><?php echo $this->lang->line('verify_txt'); ?></span>
        </div>
    </div>

    <div class="row rw-mar-b">
        <div class="col-sm-11">
            <label for="patient_name" class="lbl-f lbl-mod"><?php echo $this->lang->line('patient_detail_name_txt'); ?><b>:</b></label>

              <input type="text" class="form-control patient-number p-details" id="patient_name" name="patient_name">
        </div>

    </div>
    <?php if ($questionnaire->ward_no_field == '1') {?>
    <div class="row rw-mar-b">
        <div class="col-sm-11">
            <label for="ward_no" class="lbl-f lbl-mod"><?php echo $this->lang->line(
                    'ward_no_txt'
                ); ?><b>:</b></label>
             <input type="text"  class="form-control patient-number p-details" id="ward_no"
                   name="ward_no" >
        </div>

    </div>
    <?php
    }
    if ($questionnaire->admission_date_field == '1') {?>
    <div class="row rw-mar-b">
        <div class="col-sm-11">
            <label for="patient_contact_no" class="lbl-f lbl-mod"><?php echo $this->lang->line(
                    'patient_detail_admission_date_txt'
                ); ?><b>:</b></label>
             <input type="text" readonly="true" class="form-control patient-number p-details" id="patient_admission_date"
                   name="patient_admission_date" value="<?php echo date('Y-m-d');?>">
        </div>

    </div>
    <?php
    }
    if ($questionnaire->contact_field == '1') {?>
    <div class="row rw-mar-b">
        <div class="col-sm-11">
            <label for="patient_contact_no" class="lbl-f lbl-mod"><?php echo $this->lang->line(
                    'patient_detail_contact_txt'
                ); ?><b>:</b></label>
             <input type="text"  class="form-control patient-number p-details" id="patient_contact_no"
                   name="patient_contact_no">
        </div>

    </div>
     <?php
    }
    if ($questionnaire->email_field == '1') {?>
    <div class="row rw-mar-b">
        <div class="col-sm-11">
            <label for="patient_email" class="lbl-f lbl-mod"><?php echo $this->lang->line(
                    'patient_detail_email_txt'
                ); ?><b>:</b></label>
            <input type="text" class="form-control patient-number p-details" id="patient_email" name="patient_email" >
        </div>

    </div>
    <?php
    }
    if ($questionnaire->discharge_date_field == '1') {?>
    <div class="row">
        <div class="col-sm-11">
            <label for="patient_discharge_date" class="lbl-f lbl-mod"><?php echo $this->lang->line(
                    'patient_detail_discharge_date_txt'
                ); ?><b>:</b></label>
          <input type="text" readonly="true" class="form-control patient-number p-details" id="patient_discharge_date"
                   name="patient_discharge_date" value="<?php echo date('Y-m-d');?>">
        </div>

    </div>
     <?php
    }?>

    <div class="row rw-pad">

    </div>
</div>
