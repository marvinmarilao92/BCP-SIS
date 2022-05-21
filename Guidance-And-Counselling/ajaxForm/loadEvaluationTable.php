<table  class="table table-hover" style="width:100%; font-size: 14px;" id="StudentINFO">
    <thead>
        <tr style="background: rgba(161, 213, 255, 0.1);">

            <th>#</th>
            <th>Survey Title</th>
            <th>Survey Rating Scale</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
            <?php
                require_once 'Config.php';
                $Guidance_eval = $db->query('SELECT DISTINCT  survey_title, survey_ratingScale, ID FROM gac_teachereval')->fetchAll();

                $x = "";
                foreach ($Guidance_eval as $data) :
                  if (isset($data["survey_title"]) && isset($data["survey_ratingScale"]) &&
                      !empty($data["survey_title"]) && !empty($data["survey_ratingScale"]))
                  {
                    echo '  <tr>
                              <td>'.++$x.'</td>
                              <td>'.$data["survey_title"].'</td>
                              <td>'.$data["survey_ratingScale"].'</td>';
                  ?>
                              <td>
                                <a href="#" class="btn btn-info"
                                  onclick="viewSurvey(<?php echo $data["ID"] ?>, 'formContent');"
                                ><i class="bi bi-eye"></i></a>
                                <a href="#" class="btn btn-danger" onclick="removeCurrentForm(<?php echo $data["ID"]; ?>, 'loadEvaluationTable');"><i class="bi bi-trash"></i></a>
                              </td>
                            </tr>
                <?php }
                endforeach;
            ?>

    </tbody>
</table>
