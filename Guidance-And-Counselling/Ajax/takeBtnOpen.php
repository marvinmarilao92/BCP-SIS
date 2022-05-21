


<?php session_start();

    if (isset($_SESSION["appointmentBTN"][0]) && $_SESSION["appointmentBTN"][0] == true &&
        isset($_SESSION["appointmentBTN"][1]) && $_SESSION["appointmentBTN"][1] == true)
    {
      echo '<button type="submit"  class="btn btn-info "
      onclick="submitAppointment('; echo "'validate_dateTime'"; echo');" name="AddRequesting" ><i class="bi bi-check-circle"></i> Submit</button></form>';
    }
    else
    {
      echo '<button type="submit"  class="btn btn-danger "  disabled  onclick="submitAppointment('; echo "'validate_dateTime'"; echo');" name="AddRequesting"><i class="bi bi-x-octagon"></i> Closed</button></form>';
    }
 ?>
