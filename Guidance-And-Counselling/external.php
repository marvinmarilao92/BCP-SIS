<?php session_start(); ?>

        <meta charset="utf-8">
        <meta content="width=device-width, initial-scale=1.0" name="viewport">

        <title>Guidance & Counseling</title>
        <meta content="" name="description">
        <meta content="" name="keywords">

        <!-- Favicons -->
        <link href="https://www.clipartkey.com/mpngs/m/19-191718_group-clipart-self-help-group-guidance-and-counselling.png" rel="icon" >
        <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
      <!-- Google Fonts -->
        <link href="https://fonts.gstatic.com" rel="preconnect">
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

        <!-- Vendor CSS Files -->
        <link rel="stylesheet" href="CalendarCss/Calendar.css">
        <script src="CalendarCss/CalendatScript.js"></script>
        <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
        <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
        <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
        <link href="assets/vendor/quill/quill.snow.css" rel="stylesheet">
        <link href="assets/vendor/quill/quill.bubble.css" rel="stylesheet">
        <link href="assets/vendor/simple-datatables/style.css" rel="stylesheet">

        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
        <link href="assets/css/style.css" rel="stylesheet">
        <!-- <link rel="stylesheet" href="mdb5-free-standard/css/mdb.rtl.min.css.map"> -->
        <link rel="stylesheet" href="mdb5-free-standard/css/mdb.min.css">
        <!-- <script src="mdb5-free-standard/js/mdb.min.js"></script> -->
        <!-- Template Main CSS File -->

        <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

        <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
        <script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.datatables.net/1.11.3/js/dataTables.bootstrap4.min.js"></script>
        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.3/css/dataTables.bootstrap4.min.css">
        <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
        <script src="gac_Notif/notifScript.js"></script>
        <link href="../css/ConadnAss.css">
        <link rel="stylesheet" href="https://kendo.cdn.telerik.com/2022.2.510/styles/kendo.default-v2.min.css"/>
        <!-- <script src="https://code.jquery.com/jquery-1.12.4.min.js"></script> -->
        <script src="https://kendo.cdn.telerik.com/2022.2.510/js/kendo.all.min.js"></script>

        <!-- <script src="gac_Notif/notifDataFunction.js"></script> -->
        <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="mdb5-free-standard/js/mdb.min.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.css" />
        <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script> -->

        <!--<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">-->



        <script>
          function getInputDate()
          {

            $("#dateTimePicker").kendoDatePicker({
              value: new Date(),

                  disableDates: function (date) {
                      if (date <= new Date()) {
                          return true;
                      }
                      else {
                         return false;
                      }
                  }
            });
            // $("#dateTimePicker").kendoDatePicker({
            //   disableDates: [new Date(2022,04,12), new Date(2022,04,13)],
            //   // disableDates: ["sa", "su"],
            // });
            $('#dateTimePicker').keypress(function(event) {
                event.preventDefault();
                return false;
            });
          }
        </script>






        <style>
            #sideButton
            {
              border-radius: 50px;
              padding: 10px;
              box-shadow:  0px 0px 20px 0px #e6e6e6
            }
            #Page{
                color: #6666ff;
            }
            #Eguls
            {
              border-radius: 50px;
              width: 50px;
              height: 50px;
              background-color: #00ddff;
              border-left: 3px solid #595959;
            }
            table
            {
              font-family: Arial, Helvetica, sans-serif;
            }
            body
            {
              margin-top: -10px;
            }
            aside
            {
              margin-top: -10px;
            }
            #notifContainer::-webkit-scrollbar {
                display: none;
            }



        </style>
