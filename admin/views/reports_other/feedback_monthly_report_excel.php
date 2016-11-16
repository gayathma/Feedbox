<?php
header("Content-Type:   application/vnd.ms-excel; charset=utf-8");
header("Content-Disposition: attachment; filename=Customer_Feedback_Report.xls"); //File name extension was wrong
header("Expires: 0");
header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
header("Cache-Control: private", false);

$questions_service = new Questions_service();
?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>

    <style type="text/css">
        table.table-bordered
        {
            width:100%;
            margin:0;
            clear:both;
            font-family:Arial, Helvetica, sans-serif;
            font-size:12px;
            border-top:1px solid #cacaca;
            border-left:1px solid #cacaca;
            border-bottom:1px solid #cacaca;
            border-right:1px solid #cacaca;

            -moz-box-shadow:inset 1px 0 0 0 #f8f8f8;
            -webkit-box-shadow:inset 1px 0 0 0 #f8f8f8;
            -khtml-box-shadow:inset 1px 0 0 0 #f8f8f8;
            box-shadow:inset 1px 0 0 0 #f8f8f8;
        }

        table.table-bordered tr td,
        table.table-bordered tr th
        {
            vertical-align:middle;
        }
    </style>
</head>
<body>
<div>

    <div class="row">
        <div class="col-sm-12 bk">
            <div class="panel">
                <div class="panel-body large">
                    <h3>Customer Feedback for the month of <?php echo $month;?></h3>

                    <div class="adv-table">
                        <table class="display table table-bordered ">
                            <thead>
                            <tr>
                                <th colspan="3"></th>
                                <?php
                                foreach ($q_types as $q_type) {
                                    if ($questionnaire != "") {
                                        $questions
                                                         = $questions_service->get_questions_for_question_type_questionnaire(
                                            $q_type->id, $questionnaire
                                        );
                                    } else {
                                        $questions = $questions_service->get_questions_for_question_type($q_type->id);
                                    }
                                    ?>
                                    <th colspan="<?php echo count($questions); ?>"><?php echo $q_type->name;?></th>
                                <?php
                                }
                                ?>
                            </tr>
                            <tr>
                                <th>Month</th>
                                <th>Ref. No</th>
                                <?php
                                foreach ($q_types as $q_type) {
                                    if ($questionnaire != "") {
                                        $questionnaire_n = $questionnaire;
                                        $questions
                                                         = $questions_service->get_questions_for_question_type_questionnaire(
                                            $q_type->id, $questionnaire
                                        );
                                    } else {
                                        $questions = $questions_service->get_questions_for_question_type($q_type->id);
                                    }
                                    foreach ($questions as $question) {
                                        ?>
                                        <th><?php echo $question->question_name;?></th>
                                    <?php } ?>
                                <?php
                                }
                                $non_cat_questions = $questions_service->get_non_cat_questions(
                                    $questionnaire_n
                                );
                                foreach ($non_cat_questions as $non_cat_question) {
                                    ?>
                                    <th><?php echo $non_cat_question->question_name;?></th>
                                <?php } ?>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            $i = 0;
                            $feedback_service = new Patients_feeds_service();
                            foreach ($feed_back_sheets as $feed_back_sheet) {
                                ?>
                                <tr>
                                    <td><?php echo date('M - y', strtotime($get_month));?></td>
                                    <td><?php echo ++$i;?></td>
                                    <?php
                                    //questions with categories
                                    foreach ($q_types as $q_type) {
                                        if ($questionnaire != "") {
                                            $questionnaire_n = $questionnaire;
                                            $questions
                                                             = $questions_service->get_questions_for_question_type_questionnaire(
                                                $q_type->id, $questionnaire
                                            );

                                        } else {
                                            $questionnaire_n = $feed_back_sheet->questionnaire_id;
                                            $questions       = $questions_service->get_questions_for_question_type(
                                                $q_type->id
                                            );
                                        }

                                        foreach ($questions as $question) {
                                            $feed = $feedback_service->get_feed_for_location_by_month(
                                                $location_id, $feed_back_sheet->added_date,
                                                $feed_back_sheet->patient_id, $questionnaire_n,
                                                $question->id
                                            );

                                            $res = "";
                                            if (!empty($feed)) {
                                                if ($feed->feed == 4) {
                                                    $res = "EXCELLENT";
                                                } elseif ($feed->feed == 3) {
                                                    $res = "GOOD";
                                                } elseif ($feed->feed == 2) {
                                                    $res = "SATISFACTORY";
                                                } elseif ($feed->feed == 1) {
                                                    $res = "POOR";
                                                }
                                            }
                                            ?>
                                            <td><?php echo $res;?></td>
                                        <?php
                                        }
                                    }
                                    $non_cat_questions = $questions_service->get_non_cat_questions(
                                        $questionnaire_n
                                    );
                                    foreach ($non_cat_questions as $non_cat_question) {
                                        $feed = $feedback_service->get_feed_for_location_by_month(
                                            $location_id, $feed_back_sheet->added_date,
                                            $feed_back_sheet->patient_id, $questionnaire_n,
                                            $non_cat_question->id
                                        );
                                        $res  = "";
                                        if (!empty($feed)) {
                                            if ($non_cat_question->answer_type == 'yno') {
                                                if ($feed->feed == '1') {
                                                    $res = "YES";
                                                } else {
                                                    $res = "NO";
                                                }
                                            } elseif ($non_cat_question->answer_type == 'emo') {
                                                if ($feed->feed == 4) {
                                                    $res = "EXCELLENT";
                                                } elseif ($feed->feed == 3) {
                                                    $res = "GOOD";
                                                } elseif ($feed->feed == 2) {
                                                    $res = "SATISFACTORY";
                                                } elseif ($feed->feed == 1) {
                                                    $res = "POOR";
                                                }
                                            } else {
                                                $res = $feed->feed;
                                            }
                                        }
                                        ?>
                                        <td><?php echo $res;?></td>
                                    <?php
                                    }
                                    ?>

                                </tr>
                            <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>
