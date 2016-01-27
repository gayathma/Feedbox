<?php if (!empty($result_arr)): ?>
    <?php foreach ($result_arr as $result): ?>
        <div class="tab-pane"
             id="ques_type_<?php echo (is_object($result['question_type'])) ? $result['question_type']->id
                 : "non-cat"; ?>">
            <div class="row">
                <div class="col-sm-12">
                    <?php
                    if (is_object($result['question_type'])) {
                        $q_t_name = $result['question_type']->name;
                        if ($this->lang->lang() == "si" && $result['question_type']->name_si != "") {
                            $q_t_name = $result['question_type']->name_si;
                        } else {
                            if ($this->lang->lang() == "ta" && $result['question_type']->name_ta != "") {
                                $q_t_name = $result['question_type']->name_ta;
                            }
                        }
                    }
                    ?>
                    <?php echo (is_object($result['question_type'])) ? '<h1 class="header">'.$q_t_name.'</h1>' : " "; ?>
                    <ul class="questions-container">
                        <?php foreach ($result['questions'] as $question): ?>
                            <?php
                            $q_name = $question['question_name'];
                            if ($this->lang->lang() == "si" && $question['question_name_si'] != "") {
                                $q_name = $question['question_name_si'];
                            } else {
                                if ($this->lang->lang() == "ta" && $question['question_name_ta'] != "") {
                                    $q_name = $question['question_name_ta'];
                                }
                            }
                            ?>
                            <li>
                                <h3><?php echo $q_name; ?></h3>
                                <input type="hidden" name="questions[]" value="<?php echo $question['id']; ?>"/>

                                <?php if ($question['answer_type'] == 'emo'): ?>
                                    <div class="cc-selector">

                                        <?php foreach ($emotions as $key => $emotion): ?>
                                            <div class="op">
                                                <input id="<?php
                                                echo $this->lang->line(
                                                    strtolower($emotion) . '_lbl'
                                                ) . $question['id'];
                                                ?>" type="radio"
                                                       name="answer[<?php echo $question['id']; ?>]" <?php
                                                    if ($key == 4
                                                    ) {
                                                        ?> checked="true" <?php } ?>
                                                       value="<?php echo $key; ?>"/>

                                                <label class="drinkcard-cc <?php
                                                echo $this->lang->line(
                                                    strtolower($emotion) . '_lbl'
                                                );
                                                ?>" for="<?php
                                                echo $this->lang->line(
                                                    strtolower($emotion) . '_lbl'
                                                ) . $question['id'];
                                                ?>"></label>

                                                <p><?php
                                                    echo $this->lang->line(
                                                        strtolower($emotion) . '_lbl'
                                                    );
                                                    ?></p>
                                            </div>
                                        <?php endforeach; ?>
                                    </div>
                                <?php elseif ($question['answer_type'] == 'yno'): ?>
                                    <div class="cc-selector">
                                        <div class="op">
                                            <input id="<?php echo 'y' . $question['id']; ?>"
                                                   type="radio" name="answer[<?php echo $question['id']; ?>]"
                                                   value="1"/>

                                            <label class="drinkcard-cc y3"
                                                   for="<?php echo 'y' . $question['id']; ?>"></label>

                                        </div>
                                        <div class="op">
                                            <input id="<?php echo 'n' . $question['id']; ?>"
                                                   type="radio" name="answer[<?php echo $question['id']; ?>]"
                                                   value="0"
                                                   checked="true"/>

                                            <label class="drinkcard-cc n3"
                                                   for="<?php echo 'n' . $question['id']; ?>"></label>

                                        </div>
                                    </div>
                                <?php elseif ($question['answer_type'] == 'tarea'): ?>
                                    <textarea type="text" class="form-control tarea"
                                              id="<?php echo $question['id'] . 'tarea'; ?>"
                                              name="answer[<?php echo $question['id']; ?>]"
                                              placeholder="<?php
                                              echo $this->lang->line(
                                                  'txt_type_here'
                                              );
                                              ?>"></textarea>
                                <?php elseif ($question['answer_type'] == 'txt'): ?>
                                    <input type="text" class="form-control ttxt"
                                           id="<?php echo $question['id'] . 'txt'; ?>"
                                           name="answer[<?php echo $question['id']; ?>]"
                                           placeholder="<?php
                                           echo $this->lang->line(
                                               'txt_type_here'
                                           );
                                           ?>"/>
                                <?php endif; ?>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            </div>
        </div>
    <?php endforeach; ?>
<?php endif; ?>