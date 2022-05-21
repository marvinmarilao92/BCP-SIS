<?php session_start();


    echo '
    <select class="form-select" aria-label="Default select example"
    onchange="setSessionTrue(this.value, '; echo "'openBtnAppointment'"; echo');">
      <option selected value="" disabled >Select available time</option>';

      if (isset($_SESSION["time"][0]) && $_SESSION["time"][0] == "8:30")
        echo '<option value="8:30 AM" disabled style="color:red">8:30 AM</option>';
      else
        echo '<option value="8:30 AM" style="color:green">8:30 AM</option>';

       if (isset($_SESSION["time"][1]) && $_SESSION["time"][1] == "10:30")
          echo '<option value="10:30 AM" disabled style="color:red">10:30 AM</option>';
        else
          echo '<option value="10:30 AM" style="color:green">10:30 AM</option>';

          if (isset($_SESSION["time"][2]) && $_SESSION["time"][2] == "1:30")
            echo '<option value="1:30 PM" disabled style="color:red">1:30 PM</option>';
          else
            echo '<option value="1:30 PM" style="color:green">1:30 PM</option>';

            if (isset($_SESSION["time"][3]) && $_SESSION["time"][3] == "3:30")
              echo '<option value="3:30 PM" disabled style="color:red">3:30 PM</option>';
            else
              echo '<option value="3:30 PM" style="color:green">3:30 PM</option>';

  echo' </select>';

?>
