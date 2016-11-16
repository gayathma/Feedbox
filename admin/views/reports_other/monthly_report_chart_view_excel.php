<script src="<?php echo base_url(); ?>admin_resources/js/highcharts.js"></script>
<script src="<?php echo base_url(); ?>admin_resources/js/exporting.js"></script>
<script src="<?php echo base_url(); ?>admin_resources/js/export-csv.js"></script>
<?php
header("Content-Type:   application/vnd.ms-excel; charset=utf-8");
header("Content-Disposition: attachment; filename=Inpatient_Feedback_Report.xls");  //File name extension was wrong
header("Expires: 0");
header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
header("Cache-Control: private", false);
?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</head>


<body >
<div>

    <div class="row">
        <div class="col-sm-12 bk">
        <div class="panel">
        <div class="panel-body large">
        <h3>Feedback for the month of <?php echo $month;?></h3>

        <table class="table table-bordered">
            <tr>
                <td>Total Admissions</td>
                <td><?php echo $total_admissions;?></td>
            </tr>
            <tr>
                <td>Total Feedback Sheets Received</td>
                <td><?php echo count($feed_back_sheets);?></td>
            </tr>
            <tr>
                <td>%</td>
                <td><?php echo ($total_admissions != 0) ? round(((count($feed_back_sheets) / $total_admissions) * 100)) : 0;?>
                    %
                </td>
            </tr>
        </table>
        <div class="adv-table">
        <table class="display table table-bordered ">
            <thead>
            <tr>
                <th>Description</th>
                <th>Excellent%</th>
                <th>Below Satisfactory%</th>
                <th>Excellent</th>
                <th>Good</th>
                <th>Satisfactory</th>
                <th>Poor</th>
            </tr>
            </thead>
        </table>

        <?php
        $questions_service = new Questions_service();
        $feedback_service = new Patients_feeds_service();

        foreach ($q_types as $q_type) {
            $cat_arr   = array();
            $exce_arr  = array();
            $satis_arr = array();

            if ($questionnaire != "") {
                $questions
                    = $questions_service->get_questions_for_question_type_questionnaire(
                    $q_type->id, $questionnaire
                );
            } else {
                $questions = $questions_service->get_questions_for_question_type($q_type->id);
            }
            ?>
            <table class="display table table-bordered ">
                <tbody>
                <tr>
                    <td colspan="7">
                        <strong><?php echo $q_type->name;?></strong>
                    </td>
                </tr>
                <!-- Loop Questions -->
                <?php
                foreach ($questions as $question) {
                    if ($question->answer_type == 'emo') {
                        $cat_arr[] = $question->question_name;

                        $excellent = $feedback_service->get_feedback_excellent_digits(
                            $location_id, $date, $question->id, 'emo', $questionnaire
                        );
                        $good      = $feedback_service->get_feedback_good_digits(
                            $location_id, $date, $question->id, 'emo', $questionnaire
                        );
                        $satis     = $feedback_service->get_feedback_satis_digits(
                            $location_id, $date, $question->id, 'emo', $questionnaire
                        );
                        $poor      = $feedback_service->get_feedback_poor_digits(
                            $location_id, $date, $question->id, 'emo', $questionnaire
                        );


                        $tot            = $excellent + $good + $satis + $poor;
                        $excellent_perc = ($tot != 0) ? round(($excellent / $tot) * 100) : 0;
                        $satis_perc     = ($tot != 0) ? round((($satis + $poor) / $tot) * 100) : 0;

                        $exce_arr[]  = $excellent_perc;
                        $satis_arr[] = $satis_perc;
                        ?>
                        <tr>
                            <td>
                                <strong><?php echo $question->question_name;?></strong>
                            </td>
                            <td>
                                <strong><?php echo $excellent_perc . '%';?></strong>
                            </td>
                            <td>
                                <strong><?php echo $satis_perc . '%';?></strong>
                            </td>
                            <td>
                                <strong><?php echo $excellent;?></strong>
                            </td>
                            <td>
                                <strong><?php echo $good;?></strong>
                            </td>
                            <td>
                                <strong><?php echo $satis;?></strong>
                            </td>
                            <td>
                                <strong><?php echo $poor;?></strong>
                            </td>
                        </tr>

                    <?php
                    }
                } ?>
                <tr></tr>
                </tbody>
            </table>
            <script type="text/javascript">

                $('#container_<?php echo $q_type->id; ?>').highcharts({
                    chart: {
                        type: 'column'
                    },
                    title: {
                        text: 'Inpatient Feedback for the month of <?php echo $month;?>'
                    },
                    xAxis: {
                        categories: <?php echo json_encode($cat_arr);?>,
                        crosshair: true
                    },
                    yAxis: {
                        min: 0,
                        title: {
                            text: '%'
                        }
                    },
                    tooltip: {
                        headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
                        pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
                            '<td style="padding:0"><b>{point.y:.1f} mm</b></td></tr>',
                        footerFormat: '</table>',
                        shared: true,
                        useHTML: true
                    },
                    plotOptions: {
                        column: {
                            pointPadding: 0,
                            borderWidth: 0
                        }
                    },
                    series: [
                        {
                            name: 'Excellent%',
                            data: [<?php echo  implode(",",$exce_arr);?>],
                            color: '#41ba53'

                        },
                        {
                            name: 'Below Satisfactory%',
                            data: [<?php echo  implode(",",$satis_arr);?>],
                            color: '#cb6781'

                        }
                    ]
                });
            </script>
            <div id="container_<?php echo $q_type->id; ?>"
                 style="min-width: 310px; height: 400px; margin: 0 auto"></div>
        <?php
        }
        $non_cat_questions = $questions_service->get_non_cat_questions(
            $questionnaire
        );
        ?>


        <?php
        foreach ($non_cat_questions as $question) {
            if ($question->answer_type == 'emo') {
                $excellent = $feedback_service->get_feedback_excellent_digits(
                    $location_id, $date, $question->id, 'emo', $questionnaire
                );
                $good      = $feedback_service->get_feedback_good_digits(
                    $location_id, $date, $question->id, 'emo', $questionnaire
                );
                $satis     = $feedback_service->get_feedback_satis_digits(
                    $location_id, $date, $question->id, 'emo', $questionnaire
                );
                $poor      = $feedback_service->get_feedback_poor_digits(
                    $location_id, $date, $question->id, 'emo', $questionnaire
                );


                $tot            = $excellent + $good + $satis + $poor;
                $excellent_perc = ($tot != 0) ? round(($excellent / $tot) * 100) : 0;
                $satis_perc     = ($tot != 0) ? round((($satis + $poor) / $tot) * 100) : 0;

                ?>
                <table class="display table table-bordered ">
                    <thead>
                    <tr>
                        <th>Description</th>
                        <th>Excellent%</th>
                        <th>Below Satisfactory%</th>
                        <th>Excellent</th>
                        <th>Good</th>
                        <th>Satisfactory</th>
                        <th>Poor</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td>
                            <strong><?php echo $question->question_name;?></strong>
                        </td>
                        <td>
                            <strong><?php echo $excellent_perc . '%';?></strong>
                        </td>
                        <td>
                            <strong><?php echo $satis_perc . '%';?></strong>
                        </td>
                        <td>
                            <strong><?php echo $excellent;?></strong>
                        </td>
                        <td>
                            <strong><?php echo $good;?></strong>
                        </td>
                        <td>
                            <strong><?php echo $satis;?></strong>
                        </td>
                        <td>
                            <strong><?php echo $poor;?></strong>
                        </td>
                    </tr>
                    <tr></tr>
                    </tbody>
                </table>
            <?php
            } elseif ($question->answer_type == 'yno') {

                $yes = $feedback_service->get_feedback_yes(
                    $location_id, $date, $question->id, 'yno', $questionnaire
                );
                $no  = $feedback_service->get_feedback_no(
                    $location_id, $date, $question->id, 'yno', $questionnaire
                );

                $tot      = $yes + $no;
                $yes_perc = ($tot != 0) ? round(($yes / $tot) * 100) : 0;
                $no_perc  = ($tot != 0) ? round((($no) / $tot) * 100) : 0;

                ?>
                <table class="display table table-bordered ">
                    <thead>
                    <th>Description</th>
                    <th>Yes %</th>
                    <th>No %</th>
                    <th>Yes</th>
                    <th>No</th>
                    </thead>
                    <tbody>
                    <tr>
                        <td>
                            <strong><?php echo $question->question_name;?></strong>
                        </td>
                        <td>
                            <strong><?php echo $yes_perc . '%';?></strong>
                        </td>
                        <td>
                            <strong><?php echo $no_perc . '%';?></strong>
                        </td>
                        <td>
                            <strong><?php echo $yes;?></strong>
                        </td>
                        <td>
                            <strong><?php echo $no;?></strong>
                        </td>
                    </tr>
                    <tr></tr>
                    </tbody>
                </table>
                <script type="text/javascript">
                    $('#container_<?php echo $question->id; ?>').highcharts({
                        chart: {
                            plotBackgroundColor: null,
                            plotBorderWidth: null,
                            plotShadow: false,
                            type: 'pie'
                        },
                        title: {
                            text: '<?php echo $question->question_name;?>'
                        },
                        tooltip: {
                            pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
                        },
                        plotOptions: {
                            pie: {
                                allowPointSelect: true,
                                cursor: 'pointer',
                                dataLabels: {
                                    enabled: true,
                                    format: '<b>{point.name}</b>: {point.percentage:.1f} %',
                                    style: {
                                        color: (Highcharts.theme && Highcharts.theme.contrastTextColor) || 'black'
                                    }
                                }
                            }
                        },
                        series: [
                            {
                                name: 'Value',
                                colorByPoint: true,
                                data: [
                                    {
                                        name: 'Yes',
                                        sliced: true,
                                        selected: true,
                                        y: <?php echo $yes_perc ;?>,
                                        color:'#82a6e2'
                                    },
                                    {
                                        name: 'No',
                                        sliced: true,
                                        y: <?php echo $no_perc;?>,
                                        color:'#c33f62'
                                    }
                                ]
                            }
                        ]
                    });
                </script>

                <div id="container_<?php echo $question->id; ?>"></div>
            <?php
            }
        }?>

        </div>
        </div>
        </div>
        </div>
    </div>
</div>
</body>
</html>
