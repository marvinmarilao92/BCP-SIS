
  function openReqModal(reqID)
  {
    $.ajax({
      url: 'gac_Notif/notif.php?req=' + reqID,
      success: function (html)
      {
        var ba = document.getElementById(notifBadges);
        ba.innerHTML = html;
      }
    });
  }


  function myBadge(notifBadges)
  {
    $.ajax({
      url: 'gac_Notif/notif.php?badge=true',
      success: function (html)
      {
        var ba = document.getElementById(notifBadges);
        ba.innerHTML = html;
      }
    });

  }

  function showAllNotif() { $("#showallNotification").modal("show"); }

   function showCurrentNofif(crrntID, currentNotif)
   {
     $.ajax({
       url: 'gac_Notif/notifInfo.php?current=' + crrntID,
       success: function (html)
       {
         var cNtf = document.getElementById(currentNotif);
         cNtf.innerHTML = html;
         $("#showEachNotific").modal("show");
       }
     });

   }

    function ApproveRequest(message, closeApprovedbtn, table)
    {
      $.ajax({
        url: 'gac_Notif/approveStdRequest.php',
        success: function (html)
        {
          var temp = document.getElementById(message);
          temp.innerHTML = html;
          $.ajax({
            url: 'gac_Notif/closeBtn.php',
            success: function(html)
            {
              var cbtn = document.getElementById(closeApprovedbtn);
              cbtn.innerHTML = html;
              $.ajax({
                url: 'gac_Notif/notiftable.php',
                success: function (html)
                {
                  var temp = document.getElementById(table);
                  temp.innerHTML = html;
                  $(document).ready(function() {
                      $('#showNOF').DataTable();
                  } );
                }
              });
            }
          });

        }
      });
    }

    function declinedRequest(decReq, closeApprovedbtn, table)
    {
      $.ajax({
        url: 'gac_Notif/declinedRequest.php',
        success: function(html)
        {
          var Declined = document.getElementById(decReq);
          Declined.innerHTML = html;
          $.ajax({
            url: 'gac_Notif/closeBtn.php',
            success: function(html)
            {
              var cbtn = document.getElementById(closeApprovedbtn);
              cbtn.innerHTML = html;
              $.ajax({
                url: 'gac_Notif/notiftable.php',
                success: function (html)
                {
                  var temp = document.getElementById(table);
                  temp.innerHTML = html;
                  $(document).ready(function() {
                      $('#showNOF').DataTable();
                  } );
                }
              });
            }
          });

        }
      });

    }

  function closeCurrent()    { $("#showEachNotific").modal('hide'); }
  function closeAllNotif()   { $("#showallNotification").modal('hide'); }
