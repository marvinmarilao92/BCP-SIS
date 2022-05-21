<!DOCTYPE html>
<html lang="en">

<head>
  <?php include 'include/external.php';
  include 'include/header.php'; ?>
  <!-- <link rel="stylesheet" href="mdb5-free-standard/css/mdb.min.css"> -->
  <!-- <script src="mdb5-free-standard/js/mdb.min.js"></script> -->
  <script>
  function validateDTIME() {
    $.ajax({
      url: '',
      success: function(html) {
        alert("asdas");
      }
    });
  }
  </script>



</head>

<!-- ======= Sidebar ======= -->
<?php include 'include/asideSidebar.php'; ?>

<link rel="stylesheet" href="CalendarCss/Calendar.css">
<script src="CalendarCss/CalendatScript.js"></script>
<script>
$(document).ready(function() {
  var date = new Date();
  var d = date.getDate();
  var m = date.getMonth();
  var y = date.getFullYear();



  $('#external-events div.external-event').each(function() {

    // create an Event Object (http://arshaw.com/fullcalendar/docs/event_data/Event_Object/)
    // it doesn't need to have a start or end
    var eventObject = {
      title: $.trim($(this).text()) // use the element's text as the event title
    };

    // store the Event Object in the DOM element so we can get to it later
    $(this).data('eventObject', eventObject);

    // make the event draggable using jQuery UI
    $(this).draggable({
      zIndex: 999,
      revert: true, // will cause the event to go back to its
      revertDuration: 0 //  original position after the drag
    });

  });


  /* initialize the calendar
  -----------------------------------------------------------------*/

  var calendar = $('#calendar').fullCalendar({
    header: {
      left: 'title',
      center: 'agendaDay,agendaWeek,month',
      right: 'prev,next today'
    },
    editable: true,
    firstDay: 1, //  1(Monday) this can be changed to 0(Sunday) for the USA system
    selectable: true,
    defaultView: 'month',

    axisFormat: 'h:mm',
    columnFormat: {
      month: 'ddd', // Mon
      week: 'ddd d', // Mon 7
      day: 'dddd M/d', // Monday 9/7
      agendaDay: 'dddd d'
    },
    titleFormat: {
      month: 'MMMM yyyy', // September 2009
      week: "MMMM yyyy", // September 2009
      day: 'MMMM yyyy' // Tuesday, Sep 8, 2009
    },
    allDaySlot: false,
    selectHelper: true,
    select: function(start, end, allDay) {
      //				var title = prompt('Event Title:');
      //				if (title) {
      //					calendar.fullCalendar('renderEvent',
      //						{
      //							title: title,
      //							start: start,
      //							end: end,
      //							allDay: allDay
      //						},
      //						true // make the event "stick"
      //					);
      //				}
      //				calendar.fullCalendar('unselect');
      //                                location.href = 'ConductCounsel.php?id=<?php echo $_SESSION['success']; ?>';
    },


    droppable: true, // this allows things to be dropped onto the calendar !!!
    drop: function(date, allDay) { // this function is called when something is dropped

      // retrieve the dropped element's stored Event Object
      var originalEventObject = $(this).data('eventObject');

      // we need to copy it, so that multiple events don't have a reference to the same object
      var copiedEventObject = $.extend({}, originalEventObject);

      // assign it the date that was reported
      copiedEventObject.start = date;
      copiedEventObject.allDay = allDay;

      // render the event on the calendar
      // the last `true` argument determines if the event "sticks" (http://arshaw.com/fullcalendar/docs/event_rendering/renderEvent/)
      $('#calendar').fullCalendar('renderEvent', copiedEventObject, true);

      // is the "remove after drop" checkbox checked?
      if ($('#drop-remove').is(':checked')) {
        // if so, remove the element from the "Draggable Events" list
        $(this).remove();
      }

    },

    events: [

      //				{
      //                                        title: 'Kinginaaaas',
      //					start: new Date(y, m, 1)
      //				},
      //				{
      //					id: 999,
      //					title: 'Repeating Event',
      //					start: new Date(y, m, d-3, 16, 0),
      //					allDay: false,
      //					className: 'info'
      //				},
      //				{
      //					id: 999,
      //					title: 'Repeating Event',
      //					start: new Date(2022,2-1,01, 22,54,41),
      //					allDay: false,
      //					className: 'info'
      //				},




      <?php

        require_once 'Config.php';

        $Sched = $db->query('SELECT * FROM counselrequest WHERE Status = "Counseling"')->fetchAll();

        foreach ($Sched as $Appointment) {
          $ChatID           = $Appointment["Request_KEY"];
          $Request_Type     = $Appointment["Request_Type"];
          // 5/14/2022 10:30 AM
          $DateTime         = $Appointment["Schedule"];
          $SplitDT          = explode(" ", $DateTime);

          $SetDate          = $SplitDT[0];
          $Date             = explode("/", $SetDate);

          $SetTime          = $SplitDT[1];
          $Time             = explode(":", $SetTime);

          echo "
                                    {
                                            title: '" . $Request_Type . "',
                                            start: new Date(" . $Date[2] . ", " . ($Date[0] - 1) . ", " . ($Date[1]) . ", " . $Time[0] . ", " . $Time[1] . "),
                                            url: 'http://localhost/GAC/ConductCounsel.php?id=" . $_SESSION['success'] . "&CAChats=" . $ChatID . "',
                                            allDay: false,
                                            className: 'info'
                                    },
                                    ";
        }
        ?>


      //				{
      //					title: 'Lunch',
      //					start: new Date(y, m, d, 12, 0),
      //					end: new Date(y, m, d, 14, 0),
      //					allDay: false,
      //					className: 'important'
      //				},
      //				{
      //					title: 'Birthday Party',
      //					start: new Date(y, m, d+1, 19, 0),
      //					end: new Date(y, m, d+1, 22, 30),
      //					allDay: false,
      //				},
      //				{
      //					title: 'Click for Google',
      //					start: new Date(y, m, 28),
      //					end: new Date(y, m, 29),
      //					url: 'https://ccp.cloudaccess.net/aff.php?aff=5188',
      //					className: 'success'
      //				}
    ],
  });


});
</script>
<!--internal css style-->
<style>
body {
  margin-bottom: 40px;
  margin-top: 40px;
  /*text-align: center;*/
  font-size: 15px;
  /*font-family: 'Roboto', sans-serif;*/
  background: url(http://www.digiphotohub.com/wp-content/uploads/2015/09/bigstock-Abstract-Blurred-Background-Of-92820527.jpg);
}

#wrap {
  width: 1100px;
  margin: 0 auto;
}

#external-events {
  float: left;
  width: 150px;
  padding: 0 10px;
  text-align: left;
}

#external-events h4 {
  font-size: 16px;
  margin-top: 0;
  padding-top: 1em;
}

.external-event {
  /* try to mimick the look of a real event */
  margin: 10px 0;
  padding: 2px 4px;
  background: #3366CC;
  color: #fff;
  font-size: .85em;
  cursor: pointer;
}

#external-events p {
  margin: 1.5em 0;
  font-size: 11px;
  color: #666;
}

#external-events p input {
  margin: 0;
  vertical-align: middle;
}

#calendar {

  /* 		float: right; */
  margin: 0 auto;
  width: 900px;
  background-color: #FFFFFF;
  border-radius: 6px;
  box-shadow: 0 1px 2px #C3C3C3;
  -webkit-box-shadow: 0px 0px 21px 2px rgba(0, 0, 0, 0.18);
  -moz-box-shadow: 0px 0px 21px 2px rgba(0, 0, 0, 0.18);
  box-shadow: 0px 0px 21px 2px rgba(0, 0, 0, 0.18);
}


/*Other CSS Stlye*/
#ModalBody::-webkit-scrollbar {
  display: none;
}
</style>

<!--        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>-->
<script type="text/javascript">
function ChangeFormContent(ChangeContent) {
  $.ajax({
    url: 'Ajax/AppointmentForm.php?getTableContent=form1',
    success: function(html) {
      var ajaxDisplay = document.getElementById(ChangeContent);
      ajaxDisplay.innerHTML = html;
      getInputDate();
    }
  });

}
</script>

<script>
function submitAppointment(test, testing, openBtn) {
  var dtime = document.getElementById("dateTimePicker").value;
  $.ajax({
    url: 'Ajax/takeDateTime.php?time=' + dtime,
    success: function(html) {
      var ge = document.getElementById(test);
      ge.innerHTML = html;
      $.ajax({
        url: 'Ajax/takeTime.php?click=false',
        success: function(html) {
          var test = document.getElementById(testing);
          test.innerHTML = html;
        }
      });
      $.ajax({
        url: 'Ajax/takeBtnOpen.php?click=false',
        success: function(html) {
          var ntn = document.getElementById(openBtn);
          ntn.innerHTML = html;
        }
      });
    }
  });
}
</script>


<script>
function takeTimesql(testing) {
  $.ajax({
    url: 'Ajax/takeTime.php?click=true',
    success: function(html) {
      var test = document.getElementById(testing);
      test.innerHTML = html;
    }
  });
}
</script>

<script>
function openBtnAppointment(open) {
  $.ajax({
    url: 'Ajax/takeBtnOpen.php',
    success: function(html) {
      var ntn = document.getElementById(open);
      ntn.innerHTML = html;
    }
  });
}
</script>

<script>
function setSessionTrue(value, open) {
  $.ajax({
    url: 'Ajax/takeSetOpen.php?selectTime=' + value,
    success: function(html) {
      openBtnAppointment(open);
      // var tst = document.getElementById(open);
      // tst.innerHTML = html;
    }
  });
}
</script>

<script>
function validateEmployee(emp, open) {

}
</script>
</head>

<body>


  <?php include 'include/asideSidebar.php'; ?>

  <main id="main" class="main">
    <div class="pagetitle">
      <h1 class="layout">Student Appointment</h1>
      <nav>
        <ol class="breadcrumb" style="background-color: transparent;">
          <li class="breadcrumb-item"><a href="index.php?id=<?php echo $_SESSION['success']; ?>">Home</a></li>
          <li class="breadcrumb-item active">Student Approval</li>
          <li class="breadcrumb-item active">Consulting and Assessment</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->
    <br>
    <ul class="nav nav-tabs" id="myTab" role="tablist">
      <li class="nav-item" role="presentation">
        <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home" type="button"
          role="tab" aria-controls="home" aria-selected="true">Referred Request</button>
      </li>
      <li class="nav-item" role="presentation">
        <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile" type="button"
          role="tab" aria-controls="profile" aria-selected="false">Walk-in</button>
      </li>
      <li class="nav-item" role="presentation">
        <button class="nav-link" id="contact-tab" data-bs-toggle="tab" data-bs-target="#contact" type="button"
          role="tab" aria-controls="contact" aria-selected="false">Student Request</button>
      </li>
    </ul>
    <div class="tab-content pt-3" id="myTabContent">
      <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
        <table class="table table-hover" style="width:100%; " id="StudentINFO">
          <thead style="background: rgba(161, 213, 255, 0.1);">
            <tr style="text-align:center;">
              <th>Slip</th>
              <th>Student ID</th>
              <th>Schedule</th>
              <th>Status</th>
              <th>Action </th>
            </tr>
          </thead>
          <tbody id="AppointmentData">

            <?php
            require_once 'Config.php';
            $studentData = $db->query(' SELECT  * FROM counselrequest AS Counsel
                                                INNER JOIN gacs_referral AS ref
                                                ON Counsel.Request_KEY = ref.Refferal_Key
                                                WHERE Counsel.Status = "Pending" ORDER BY Counsel.Schedule DESC')->fetchAll();

            foreach ($studentData as $data) :

              $date = date_create($data['Schedule']);

              if ($data["Referral_KEY"] == "") {
                echo '<tr style="text-align:center;">
                    <td><a href="ConandAss.php?id=' . $_SESSION['success'] . '&PreviewImage=' . $data['Request_KEY'] . '"><img src="Referral_Image/' . $data['Referral_Slip'] . '"  width="35" height="35" style="border-radius: 50px; border-bottom: 2px solid #036ffc; "></a></td>
                    <td>' . $data['Student_ID'] . '</td>
                    <td>' . date_format($date, 'g:ia \o\n l jS F Y') . '</td>
                    <td>' . $data['Status'] . '</td>
                    <td style="" id="TDbutton">
                        <a href="ConandAss.php?id=' . $_SESSION['success'] . '&CAChats=' . $data['Request_KEY'] . '"  class="btn btn-info"    style="background-color: #6699ff" id="chats" ><i class="bi bi-chat-square-quote"></i></a>
                        <a href="ConandAss.php?id=' . $_SESSION['success'] . '&CAUpdate=' . $data['Request_KEY'] . '" class="btn btn-secondary" style="background-color: #ccffff;"><i class="bi bi-pin-angle-fill" style="color:black;"></i></a>
                        <a href="ConandAss.php?id=' . $_SESSION['success'] . '&CADelete=' . $data['Request_KEY'] . '" class="btn btn-danger"  style="background-color: #ff6666" ><i class="bi bi-trash"></i></a>
                    </td>
                  </tr>';
              }
            endforeach;
            ?>
          </tbody>
        </table>
      </div>
      <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
        <table class="table table-hover" style="width:100%; " id="StudentINFO2">
          <thead style="background: rgba(161, 213, 255, 0.1);">
            <tr style="text-align:center;">
              <th>Slip</th>
              <th>Student ID</th>
              <th>Schedule</th>
              <th>Status</th>
              <th>Action </th>
            </tr>
          </thead>
          <tbody id="AppointmentData">

            <?php
            require_once 'Config.php';
            $studentData = $db->query(' SELECT  * FROM counselrequest AS Counsel
                                                INNER JOIN gacs_referral AS ref
                                                ON Counsel.Request_KEY = ref.Refferal_Key
                                                WHERE Counsel.Status = "Pending" ORDER BY Counsel.Schedule DESC')->fetchAll();

            foreach ($studentData as $data) :

              $date = date_create($data['Schedule']);

              if ($data["Referral_KEY"] == "") {
                echo '<tr style="text-align:center;">
                    <td><a href="ConandAss.php?id=' . $_SESSION['success'] . '&PreviewImage=' . $data['Request_KEY'] . '"><img src="Referral_Image/' . $data['Referral_Slip'] . '"  width="35" height="35" style="border-radius: 50px; border-bottom: 2px solid #036ffc; "></a></td>
                    <td>' . $data['Student_ID'] . '</td>
                    <td>' . date_format($date, 'g:ia \o\n l jS F Y') . '</td>
                    <td>' . $data['Status'] . '</td>
                    <td style="" id="TDbutton">
                        <a href="ConandAss.php?id=' . $_SESSION['success'] . '&CAChats=' . $data['Request_KEY'] . '"  class="btn btn-info"    style="background-color: #6699ff" id="chats" ><i class="bi bi-chat-square-quote"></i></a>
                        <a href="ConandAss.php?id=' . $_SESSION['success'] . '&CAUpdate=' . $data['Request_KEY'] . '" class="btn btn-secondary" style="background-color: #ccffff;"><i class="bi bi-pin-angle-fill" style="color:black;"></i></a>
                        <a href="ConandAss.php?id=' . $_SESSION['success'] . '&CADelete=' . $data['Request_KEY'] . '" class="btn btn-danger"  style="background-color: #ff6666" ><i class="bi bi-trash"></i></a>
                    </td>
                  </tr>';
              }
            endforeach;
            ?>
          </tbody>
        </table>
      </div>
      <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
        <table class="table table-hover" style="width:100%; " id="StudentINFO3">
          <thead style="background: rgba(161, 213, 255, 0.1);">
            <tr style="text-align:center;">
              <th>Student Name</th>
              <th>Stundent ID</th>
              <th>Schedule</th>
              <th>Status</th>
              <th>Action </th>
            </tr>
          </thead>
          <tbody id="AppointmentData">

            <?php
            require_once 'Config.php';
            $studentData = $db->query('SELECT * FROM counselrequest WHERE Schedule =?', "Not Set")->fetchAll();

              foreach ($studentData as $data) :
              if ($data["Referral_KEY"] == "")
              {
                echo '<tr style="text-align:center;">
                    <td>' . $data['Student_Name'] . '</td>
                    <td>' . $data['Student_ID'] . '</td>
                    <td><i>Please set an appointment</i></td>
                    <td>' . $data['Status'] . '</td>
                    <td style="" id="TDbutton">
                        <a href="#" class="btn btn-info"  onclick="setStudentAppointment('.$data['ID'].',';    echo "'showAppointmentForm'";   echo' )" style="background-color: #6699ff" id="chats" ><i class="bi bi-calendar-plus"></i></a>
                        <a href="ConandAss.php?id=' . $_SESSION['success'] . '&CADelete=' . $data['Request_KEY'] . '" class="btn btn-danger" style="background-color: #ff6666" ><i class="bi bi-trash"></i></a>
                    </td>
                  </tr>';
              }
              endforeach;

            ?>
          </tbody>
        </table>
      </div>
    </div>





   <div id="showAppointmentForm"></div> <script>
      function setStudentAppointment(appointmentID , appointmentForm)
      {
        $.ajax({
          url: 'ajaxStudents/setAppointment.php',
          success: function(html)
          {
            var disApp = document.getElementById(appointmentForm);
            disApp.innerHTML  = html;
            $("#setStudentAppointment").modal("show");
          }
        });
      }
    </script>


    <script>
    $(document).ready(function() {
      $('#StudentINFO').DataTable();
    });
    </script>
    <script>
    $(document).ready(function() {
      $('#StudentINFO2').DataTable();
    });
    </script>
    <script>
    $(document).ready(function() {
      $('#StudentINFO3').DataTable();
    });
    </script>



    <?php
    if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['CAChats']) && isset($_SESSION['success'])) {

      require_once 'Config.php';
      $Studentdata = $db->query('SELECT * FROM counselrequest WHERE Request_KEY = ?', $_GET['CAChats'])->fetchArray();
      $_SESSION["KEY"] = $_GET['CAChats'];
      if (isset($Studentdata["Student_ID"]) && $Studentdata["Student_Name"] && isset($Studentdata["Request_KEY"])) {
        $_SESSION["Student_ID" . $_SESSION['success'] . ""]     =   $Studentdata["Student_ID"];
        $_SESSION["Student_Name" . $_SESSION['success'] . ""]   =   $Studentdata["Student_Name"];
        $_SESSION["Request_KEY" . $_SESSION['success'] . ""]    =   $Studentdata["Request_KEY"];
      }

      echo '<script>
                                $(document).ready(function(){
                                 $("#Convowithstudent").modal("show");
                                });
                             </script>';
    }
    if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['CAUpdate']) && isset($_SESSION['success'])) {
      require_once 'Config.php';
      $StudentSched = $db->query('SELECT * FROM counselrequest WHERE Request_KEY=?', $_GET['CAUpdate'])->fetchArray();
      if (isset($StudentSched["Student_ID"]) && $StudentSched["Student_Name"]) {
        $_SESSION["Student_ID" . $_SESSION['success'] . ""]     = $StudentSched["Student_ID"];
        $_SESSION["Student_Name" . $_SESSION['success'] . ""]   = $StudentSched["Student_Name"];
        $_SESSION["StudentIssue" . $_SESSION['success'] . ""]   = $StudentSched["StudentIssue"];
        $_SESSION["Request_KEY" . $_SESSION['success'] . ""]    = $StudentSched["Request_KEY"];
        $_SESSION["Referral_KEY" . $_SESSION['success'] . ""]   = $StudentSched["Referral_KEY"];
      }
    ?>
    <script>
    Swal.fire({
      title: 'Do you want to counsel this student?',
      text: "Student already an appointment!",
      icon: 'info',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Yes, Start couseling!'
    }).then((result) => {
      if (result.isConfirmed) {
        location.href =
          'RemoveStudent.php?id=<?php echo $_SESSION['success'] . "&CAUpdate=" . $_GET['CAUpdate']; ?>';
      }
    });
    </script>
    <?php
    }
    if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['CADelete']) && isset($_SESSION['success'])) {

      require_once 'Config.php';
      $StudentSched = $db->query('SELECT * FROM counselrequest WHERE Request_KEY = ?', $_GET['CADelete'])->fetchArray();
      if (isset($StudentSched["Student_ID"]) && $StudentSched["Student_Name"]) {
        $_SESSION["Student_ID" . $_SESSION['success'] . ""]     = $StudentSched["Student_ID"];
        $_SESSION["Student_Name" . $_SESSION['success'] . ""]   = $StudentSched["Student_Name"];
        $_SESSION["Description" . $_SESSION['success'] . ""]    = $StudentSched["Description"];
        $_SESSION["Request_KEY" . $_SESSION['success'] . ""]    = $StudentSched["Request_KEY"];
      }

    ?>
    <script>
    Swal.fire({
      title: 'Are you sure?',
      text: "You won't be able to revert this request!",
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Yes, delete it!'
    }).then((result) => {
      if (result.isConfirmed) {
        location.href =
          'RemoveStudent.php?id=<?php echo $_SESSION['success'] . "&CRDelete=" . $_SESSION["Request_KEY" . $_SESSION['success'] . ""]; ?>';
      }
    });
    </script>
    <?php

    }


    if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET["Counseling"]) && isset($_SESSION["Counseling"])) {
      unset($_SESSION["Counseling"]);
      echo "<script>
                                        Swal.fire(
                                            'Student added for counseling!',
                                            'You can make an action.',
                                            'success' )
                                    </script>";
    }

    if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['PreviewImage']) && isset($_SESSION['success'])) {

      require_once 'Config.php';
      $ReferralData = $db->query('SELECT * FROM gacs_referral WHERE Refferal_Key = ?', $_GET['PreviewImage'])->fetchArray();

      if (isset($ReferralData["Referral_Slip"])) {
        $_SESSION["PreviewImage"]     =  $ReferralData["Referral_Slip"];
        $_SESSION["Student_Name"]     =  $ReferralData["Student_Name"];
      }

      echo '<script>
                                $(document).ready(function(){
                                 $("#PreviewReferralSlip").modal("show");
                                });
                             </script>';
    }

    if ($_SERVER["REQUEST_METHOD"] == "GET") {
      if (isset($_SESSION['RemoveSucess']) && isset($_GET['RemoveReq'])) :
        unset($_SESSION['RemoveSucess']);

        require_once  'Config.php';
        $DeleteConvo    = $db->query('DELETE FROM conversation WHERE Request_KEY=? AND Employee_ID=?', $_SESSION["Request_KEY" . $_SESSION['success'] . ""], $_SESSION["User_ID" . $_SESSION['success'] . ""]);

        echo "<script>
                                        Swal.fire(
                                            'Request Deleted!',
                                            'You can request again.',
                                            'success' )
                                      </script>";
      endif;
    }
    ?>

    <!--//Chat support by student-->

    <!--Modal Preview Referral Slip-->
    <div class="modal fade" id="PreviewReferralSlip" tabindex="-1" role="dialog" aria-labelledby="PreviewReferralSlip"
      aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content" style="border-left: 3px solid #5e5e5e;
                                                            border-right: 3px solid #5e5e5e;
                                                            border-radius: 30px;">
          <div class="modal-header" style=" background-color: #c7efff;
                                            border-top-left-radius: 30px;
                                            border-top-right-radius: 30px;">
            <h5 class="modal-title" id="exampleModalLabel"><?php echo $_SESSION["Student_Name"]; ?> </h5>

          </div>
          <div class="modal-body">
            <img src="Referral_Image/<?php echo $_SESSION["PreviewImage"]; ?>" class="img-fluid" alt="Responsive image">
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal" onclick="Preview();">Close</button>
          </div>
        </div>
      </div>
    </div>


    <!--View appointment calendar-->
    <div class="modal fade" id="ViewCalendar" tabindex="-1" role="dialog" aria-labelledby="ViewCalendar"
      aria-hidden="true" style="margin:0%; padding: 0px; ">
      <div class="modal-dialog modal-lg">
        <div class="modal-content" style="background-color: transparent; border: none;">

          <div class="modal-body">

            <div id='wrap'>
              <div id='calendar' style="width: 70%; margin: 0%; padding: 0px;"></div>
              <div style='clear:both'></div>
            </div>

          </div>
          <div class="modal-footer" style="border-top: none;">
            <!-- <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button> -->
          </div>
        </div>
      </div>
    </div>



    <!--Modal application for appointment-->
    <div class="modal fade" id="AddAppointment" tabindex="-1" role="dialog" aria-labelledby="AddAppointment"
      aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content" id="CAmodalcontent" style="border-left: 3px solid #5e5e5e;
                                                            border-right: 3px solid #5e5e5e;
                                                            border-radius: 30px;">
          <div class="modal-header" style=" background-color: #c7efff;
                                            border-top-left-radius: 30px;
                                            border-top-right-radius: 30px;">
            <h5 id="TitleforSlip" class="animate__animated animate__zoomInDown">Student application for appointment
            </h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <form method="POST" action="" enctype="multipart/form-data">

              <div id="ChangeContent">

                <div class="form-row">
                  <div class="form-group col-md-12">
                    <input type="text" id="RemployeeName" name="EmployeeName" placeholder="Interviewed by?"
                      class="form-control animate__animated animate__bounceInLeft">
                  </div>
                </div>

                <div class="form-row">
                  <div class="form-group col-md-8">
                    <input type="text" id="RStudentName" required disabled name="" value="<?php if (isset($_SESSION["Student_Name"])) {
                                                                                            echo $_SESSION["Student_Name"];
                                                                                          }  ?>"
                      placeholder="Student Name" class="form-control animate__animated animate__bounceInRight">
                  </div>
                  <div class="form-group col-md-4">
                    <input type="text" id="RStudentID" required disabled name="" value="<?php if (isset($_SESSION["Student_ID"])) {
                                                                                          echo $_SESSION["Student_ID"];
                                                                                        }  ?>" placeholder="Student ID"
                      class="form-control animate__animated animate__bounceInLeft">
                  </div>
                </div>

                <div class="form-row">

                  <div class="form-group col-md-4">
                    <input type="text" id="RStudentID" required disabled name="" value="<?php if (isset($_SESSION["Student_Section"])) {
                                                                                          echo $_SESSION["Student_Section"];
                                                                                        }  ?>"
                      placeholder="Student Section" class="form-control animate__animated animate__bounceInLeft">
                  </div>
                  <div class="form-group col-md-8">
                    <input type="text" id="RStudentName" required disabled name="" value="<?php if (isset($_SESSION["Student_Course"])) {
                                                                                            echo $_SESSION["Student_Course"];
                                                                                          }  ?>"
                      placeholder="Student Course" class="form-control animate__animated animate__bounceInRight">
                  </div>
                </div>

                <div class="form-row">
                  <div class="form-group col-md-2"></div>
                  <div class="form-group col-md-10s">

                    <div class="form-check">
                      <input class="form-check-input animate__animated animate__bounceInLeft" type="radio"
                        name="flexRadioDefault" id="RStudentName">
                      <label class="form-check-label animate__animated animate__bounceInLeft" for="flexRadioDefault1">
                        Withdrawal (Old Student)
                      </label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input animate__animated animate__bounceInRight" type="radio"
                        name="flexRadioDefault" id="RStudentName" checked>
                      <label class="form-check-label animate__animated animate__bounceInRight" for="flexRadioDefault2">
                        Withdrawal (New Student)
                      </label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input animate__animated animate__bounceInLeft" type="radio"
                        name="flexRadioDefault" id="RStudentName" checked>
                      <label class="form-check-label animate__animated animate__bounceInLeft" for="flexRadioDefault2">
                        Transferring
                      </label>
                    </div>

                  </div>
                </div>


                <div class="form-row">
                  <div class="form-group col-md-12">
                    <label for="referral"><span style="font-style: italic;">Set appointment</span></label>
                    <input type="datetime-local" id="RStudentID" name="dtime"
                      class="form-control animate__animated animate__bounceInRight">
                  </div>
                </div>
                <div class="modal-footer">
                  <button type="submit" class="btn btn-info" name="AddRequesting">Submit</button>
            </form>
          </div>
        </div>
      </div>
    </div>
    </div>
    </div>

    <script>
    function Dismiss() {
      $("#Convowithstudent").modal('hide');
    }

    function Edit() {
      $("#ViewRequest").modal('hide');
    }

    function Preview() {
      $("#PreviewReferralSlip").modal('hide');
    }
    </script>




    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["AddRequesting"])) {
      require_once  'Config.php';
      include 'SForms/timezone.php';
      $created = $time;

      $numLenth = 15;
      $SerialKEY = "";

      list($usec, $sec) = explode(' ', microtime());
      $takedata = (float) $sec + ((float) $usec * 100000);

      srand($takedata);
      $numSeed = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
      for ($i = 0; $i < $numLenth; $i++) :  $SerialKEY   .= $numSeed[rand(0, strlen($numSeed) - 1)];
      endfor;


      //For Image Insert
      // $dbs = mysqli_connect("localhost", "root", "", "bcpsis");
      $dbs = mysqli_connect("31.220.110.2", "u692894633_sis_cluster6a", "?kZ]!w7?k+1", "u692894633_SIS_C6A");
      $image = $_FILES['ReferralSlip']['name'];
      $target = "Referral_Image/" . basename($image);
      $sql = "INSERT INTO gacs_referral (Referral_Slip, Refferal_Key) VALUES ('" . $image . "' , '" . $SerialKEY . "')";
      mysqli_query($dbs, $sql);
      if (move_uploaded_file($_FILES['ReferralSlip']['tmp_name'], $target)) {
      }

      $_SESSION["Request_Type" . $_SESSION['success'] . ""] = "For Counseling";


      $insertRequest = $db->query(
        'INSERT INTO counselrequest ( Student_ID, Student_Name, Student_Course, Student_yrlvl, Request_Type, StudentIssue, Schedule, Status ,Request_KEY, create_at, update_at)'
          . ' VALUES (?,?,?,?,?, ?,?,?,?,?,?)',
        $_SESSION["Student_ID" . $_SESSION['success'] . ""],
        $_SESSION["Student_Name" . $_SESSION['success'] . ""],
        $_SESSION["Student_Course" . $_SESSION['success'] . ""],
        $_SESSION["Student_yrlvl" . $_SESSION['success'] . ""],
        $_SESSION["Request_Type" . $_SESSION['success'] . ""],
        $_POST["StudentIssue"],
        $_SESSION["timeDate"] . ' ' . $_SESSION["Dtime"],
        'Pending',
        $SerialKEY,
        $created,
        $created
      );



      $insertSlip = $db->query(
        'UPDATE gacs_referral SET Employee_Name=? , Student_Name =?, Student_ID=?, Student_Issue=?, Referral_Slip=?, created_at=?, updated_at=?  WHERE Refferal_Key=?',
        $_POST["EmployeeName"],
        $_SESSION["Student_Name" . $_SESSION['success'] . ""],
        $_SESSION["Student_ID" . $_SESSION['success'] . ""],
        $_POST["StudentIssue"],
        $image,
        $created,
        $created,
        $SerialKEY
      );



      if ($insertRequest->affectedRows() == 1 && $insertSlip->affectedRows() == 1) {
        $_SESSION["InsertSuccess"] = "Success";
        echo "<script>
                         location.href = 'ConandAss.php?id=" . $_SESSION['success'] . "&ReqRemove=1';
                    </script>";
      }
    }
    if ($_SERVER["REQUEST_METHOD"] == "GET") {
      if (isset($_SESSION["InsertSuccess"]) && isset($_GET["ReqRemove"])) {
        unset($_SESSION["InsertSuccess"]);
        echo "
                <script>
                        Swal.fire(
                        'Your Request is on process!',
                        'You request appointment for student!',
                        'success'
                      )
                </script>";
      }
    }
    ?>



    <div id="InfoButton" class="nav-content collapse ">

      <!--    <div class="form-row fixed-bottom " >
        <div class="form-group col-md-11"></div>
        <div class="form-group  col-md-1 ">
            <button type="button" name="SearchStudent" class="btn btn-info  form-control animate__animated animate__slideInRight " data-toggle="modal" data-target="#ViewCalendar"
                    style="background-image: linear-gradient(to right,  #6666ff ,  #4d88ff);
                           box-shadow: 5px 7px 17px grey;
                           border-radius: 50px;
                           width: 50px;
                           height: 50px;
                           position: relative;
                           top: -230px;

                    ">
                <i class="bi bi-plus-square" style="font-size: 20px; color: white; "></i>
            </button></div>
    </div>-->


      <div class="form-row fixed-bottom ">
        <div class="form-group col-md-11"></div>
        <div class="form-group  col-md-1 ">
          <button type="button" name="SearchStudent"
            class="btn btn-info  form-control animate__animated animate__bounceInUp " data-toggle="modal"
            data-target="#ViewCalendar" style="background-image: linear-gradient(to right,  #6666ff ,  #4d88ff);
                           box-shadow: 5px 7px 17px grey;
                           border-radius: 50px;
                           width: 50px;
                           height: 50px;
                           position: relative;
                           top: -175px;

                    ">
            <i class="bi bi-calendar-check" style="font-size: 20px; color: white; "></i>
          </button>
        </div>
      </div>



      <div class="form-row fixed-bottom ">
        <div class="form-group col-md-11"></div>
        <div class="form-group  col-md-1 ">
          <button type="button" name="SearchStudent" onclick="ChangeFormContent('ChangeContent')"
            class="btn btn-info  form-control animate__animated animate__bounceInUp " data-toggle="modal"
            data-target="#AddAppointment" style="background-image: linear-gradient(to right,  #6666ff ,  #4d88ff);
                           box-shadow: 5px 7px 17px grey;
                           border-radius: 50px;
                           width: 50px;
                           height: 50px;
                           position: relative;
                           top: -120px;
                    ">
            <i class="bi bi-calendar-plus" style="font-size: 20px; color: white; "></i>
          </button>
        </div>
      </div>



      <div class="form-row fixed-bottom ">
        <div class="form-group col-md-11"></div>
        <div class="form-group  col-md-1 ">

          <?php
          if (isset($_SESSION["KEY"])) {
            echo '<button type="button" name="Convo" class="btn btn-info  form-control animate__animated animate__bounceInUp " data-toggle="modal" data-target="#Convowithstudent" ';
          } else {
            echo '<button type="button" name="Convo" disabled class="btn btn-info  form-control animate__animated animate__bounceInUp " data-toggle="modal" data-target="#Convowithstudent" ';
          }


          echo 'style="background-image: linear-gradient(to right,  #6699ff ,  #4d88ff);
                           box-shadow: 5px 7px 17px grey;
                           border-radius: 50px;
                           width: 50px;
                           height: 50px;
                           position: relative;
                           top: -65px;

                    ">';
          ?>

          <i class="bi bi-chat-square-quote" style="font-size: 20px; color: white; "></i>
          </button>
        </div>
      </div>


    </div>

    <div class="form-row fixed-bottom ">
      <div class="form-group col-md-11"></div>
      <div class="form-group  col-md-1 ">
        <a class="nav-link collapsed btn- btn-info" data-bs-target="#InfoButton" data-bs-toggle="collapse" href="#"
          id="Eguls" style="">
          <i class="bi bi-menu-button" style="font-size: 20px; color: white; text-align: center;"></i>
        </a>
      </div>
    </div>





    <?php
    //    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["SendConvo"]))
    //    {
    //        require_once 'Config.php';
    //        include 'SForms/timezone.php';
    //        $timeData =  $dt->format('Y-m-d H:i:s');
    //        $insertConvo = $db->query('INSERT INTO conversation (
    //                    Employee_ID,
    //                    Employee_Name,
    //                    Student_ID,
    //                    Student_Name,
    //                    User,
    //                    Chat_Info,
    //                    created_at,
    //                    update_at ) VALUES (?,?,?,? ,?,?,?,?)' ,
    //                    'GA18012935',
    //                    'Counselor Kim',
    //                    $_SESSION["Student_ID"],
    //                    $_SESSION["Student_Name"],
    //                    'Assistant Counselor',
    //                    $_POST["Chatinfo"],
    //                    $timeData,
    //                    $timeData);
    //    }
    ?>



    <!-- Modal for set appointment/schedules -->
    <div class="modal fade" id="ViewRequest" tabindex="-1" role="dialog" aria-labelledby="ViewRequest"
      aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title animate__animated animate__zoomInDown" id="exampleModalLongTitle">Set student issue
              and appointment's</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick=" Edit()();">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <form method="POST" action="">

              <?php
              if (isset($_SESSION["Referral_KEY"]) && !empty($_SESSION["Referral_KEY"])) {
                echo ' <select class="form-select" aria-label="Default select example" required name="Psychometrician">
                            <option disabled selected  value="">Select Psychometrician</option>';

                $Psychometrician = $db->query('SELECT * FROM departmental_user WHERE Role ="Psychometrician"')->fetchAll();
                foreach ($Psychometrician as $Data) {
                  echo '<option value="' . $Data["User_ID"] . '">' . $Data["last_name"] . ', ' . $Data["first_name"] . '</option>';
                }

                echo '  </select>';
              } else {

                echo ' <select class="form-select" aria-label="Default select example" required name="StudentCounselor">
                            <option disabled selected  value="">Select Student Counselor</option>';

                $Student_Counselor = $db->query('SELECT * FROM departmental_user WHERE Role ="Student Counselor"')->fetchAll();
                foreach ($Student_Counselor as $Data) {
                  echo '<option value="' . $Data["User_ID"] . '">' . $Data["last_name"] . ', ' . $Data["first_name"] . '</option>';
                }

                echo '  </select>';
              } ?>


              <br>
              <div class="form-row">
                <div class="form-group col-md-12">
                  <label for="des">Reason for referral:</label>
                  <textarea name="DescUpdate" id="des" disabled required
                    class="form-control animate__animated animate__zoomInUp"
                    rows="5"><?php if (isset($_SESSION["StudentIssue" . $_SESSION['success'] . ""])) {
                                                                                                                                              echo $_SESSION["StudentIssue" . $_SESSION['success'] . ""];
                                                                                                                                            } ?></textarea>
                </div>
              </div>

              <!--                     <div class="form-row" >
                          <div class="form-group col-md-12" >
                              <label for="issue">Set Student issue :</label>
                              <input type="text" id="issue" required name="StudentIssue" class="form-control animate__animated animate__bounceInLeft" placeholder="Enter student issue">
                          </div>
                    </div> -->

              <div class="form-row">
                <div class="form-group col-md-12">
                  <label for="appoint">Set Appointment :</label>
                  <input type="datetime-local" required id="appoint" name="Appointment"
                    class="form-control animate__animated animate__bounceInRight">
                </div>
              </div>

          </div>
          <div class="modal-footer">
            <button type="submit" class="btn btn-primary" name="Approval">Approve</button></form>
          </div>
        </div>
      </div>
    </div>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["Approval"])) {



      if (isset($_SESSION["Referral_KEY" . $_SESSION['success'] . ""]) && !empty($_SESSION["Referral_KEY" . $_SESSION['success'] . ""])) {
        require_once 'Config.php';

        $SetAppointment = $db->query(
          'UPDATE counselrequest SET Employee_ID=?, Description=?, StudentIssue=?, Schedule=?, Status=?, update_at=? WHERE ID=?',
          $_POST['Psychometrician'],
          $_POST["DescUpdate"],
          $_POST["StudentIssue"],
          $_POST["Appointment"],
          "Approved (Referral)",
          $_POST["Appointment"],
          $_GET['CAUpdate']
        );
      } else {
        require_once 'Config.php';

        $SetAppointment = $db->query(
          'UPDATE counselrequest SET Employee_ID=?, Description=?, StudentIssue=?, Schedule=?, Status=?, update_at=? WHERE ID=?',
          $_POST["StudentCounselor"],
          $_POST["DescUpdate"],
          $_POST["StudentIssue"],
          $_POST["Appointment"],
          "Approved",
          $_POST["Appointment"],
          $_GET['CAUpdate']
        );
      }


      if ($SetAppointment->affectedRows() == 1) {
        $_SESSION["setAppointment"] = "Success";
        echo '<script type="text/javascript">location.href = "ConandAss.php?id=' . $_SESSION['success'] . '&setAppointment=' . $_SESSION['setAppointment'] . '"</script>';
      }
    }
    if ($_SERVER["REQUEST_METHOD"] == "GET") {
      if (isset($_SESSION["setAppointment"]) && isset($_GET["setAppointment"])) :

        unset($_SESSION['setAppointment']);
        require_once  'Config.php';

        $Imginsert =  $db->query('INSERT INTO notification (User_Img)
                                        SELECT User_img FROM departmental_user WHERE User_ID =?', $_SESSION['User_ID' . $_SESSION['success'] . '']);

        require_once  'Config.php';
        include 'SForms/timezone.php';
        $DataUpdate = $db->query(
          'UPDATE notification SET User_ID=?, User_Name=?, Student_ID=?, Message_Title=?, Message=?, Read_Status=?, Notif_Messages=? ,created_at=? ORDER BY ID DESC LIMIT 1',
          $_SESSION['User_ID'],
          $_SESSION['Fname'],
          $_SESSION["Student_ID"],
          "Appointment Approved!",
          "Please be on time of your schedule.",
          "Unread",
          "Notification",
          $dt->format('Y-m-d H:i:s')
        );
        //
        require_once  'Config.php';
        $DeleteMessageKEY  = $db->query('DELETE FROM notification WHERE Notif_Messages=? AND Request_KEY=?', "Messages", $_SESSION["Request_KEY" . $_SESSION['success'] . ""]);

        require_once  'Config.php';
        $DeleteConvo    = $db->query('DELETE FROM conversation WHERE Request_KEY=? AND Employee_ID=?', $_SESSION["Request_KEY" . $_SESSION['success'] . ""], $_SESSION["User_ID" . $_SESSION['success'] . ""]);


        echo "<script>
                                        Swal.fire(
                                            'Request Approved!',
                                            'Student counselor can make action',
                                            'success' )
                                      </script>";
      endif;
    }
    ?>



  </main>
  <?php include 'ChatBox.php'; ?>

  <!-- ======= Footer ======= -->
  <?php include 'include/footer.php'; ?>


  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>
  <script src="assets/vendor/quill/quill.min.js"></script>
  <script src="assets/vendor/tinymce/tinymce.min.js"></script>
  <script src="assets/vendor/simple-datatables/simple-datatables.js"></script>
  <script src="assets/vendor/chart.js/chart.min.js"></script>
  <script src="assets/vendor/apexcharts/apexcharts.min.js"></script>
  <script src="assets/vendor/echarts/echarts.min.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

</body>

</html>
