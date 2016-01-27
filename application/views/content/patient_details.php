<div class="row">
    <div class="col-sm-12">

        <h1 class="header"><?php echo $this->lang->line('patient_detail_txt'); ?></h1>
    </div>

</div>
<div class="q-container">

    <div class="row rw-mar-b">

        <div class="col-sm-11">
            <span class="sub-h">Please verify below details,</span>
        </div>

    </div>

    <div class="row rw-mar-b">

        <div class="col-sm-11">
            <label for="patient_name" class="lbl-f lbl-mod"><?php echo $this->lang->line('patient_detail_name_txt'); ?><b>:</b></label>

              <input type="text" class="form-control patient-number p-details" id="patient_name" name="patient_name">
        </div>

    </div>
    <div class="row rw-mar-b">


        <div class="col-sm-11">
            <label for="patient_contact_no" class="lbl-f lbl-mod"><?php echo $this->lang->line(
                    'patient_detail_admission_date_txt'
                ); ?><b>:</b></label>
             <input type="text" readonly="true" class="form-control patient-number p-details" id="patient_admission_date"
                   name="patient_admission_date" value="<?php echo date('Y-m-d');?>">
        </div>

    </div>
    <div class="row rw-mar-b">


        <div class="col-sm-11">
            <label for="patient_contact_no" class="lbl-f lbl-mod"><?php echo $this->lang->line(
                    'patient_detail_contact_txt'
                ); ?><b>:</b></label>
             <input type="text"  class="form-control patient-number p-details" id="patient_contact_no"
                   name="patient_contact_no">
        </div>

    </div>
    <div class="row rw-mar-b">


        <div class="col-sm-11">
            <label for="patient_email" class="lbl-f lbl-mod"><?php echo $this->lang->line(
                    'patient_detail_email_txt'
                ); ?><b>:</b></label>
            <input type="text" class="form-control patient-number p-details" id="patient_email" name="patient_email" >
        </div>

    </div>
    <div class="row">


        <div class="col-sm-11">
            <label for="patient_discharge_date" class="lbl-f lbl-mod"><?php echo $this->lang->line(
                    'patient_detail_discharge_date_txt'
                ); ?><b>:</b></label>
          <input type="text" readonly="true" class="form-control patient-number p-details" id="patient_discharge_date"
                   name="patient_discharge_date" value="<?php echo date('Y-m-d');?>">
        </div>

    </div>

    <div class="row rw-pad">

    </div>
</div>
