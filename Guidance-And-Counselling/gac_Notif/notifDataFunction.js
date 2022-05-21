
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

    function ApproveRequest(test)
    {
      $.ajax({
        url: 'gac_Notif/approveStdRequest.php',
        success: function (html)
        {
          // var temp = document.getElementById(test);
          // temp.innerHTML = html;
          alert("request has been Approved!");
        }
      });
    }

  function closeCurrent()    { $("#showEachNotific").modal('hide'); }
  function closeAllNotif()   { $("#showallNotification").modal('hide'); }
