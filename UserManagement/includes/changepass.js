
  function verifyOldPassword(oldpass, messCurrentPassword, open, locked)
  {
    $.ajax({
      url: 'changePassword/verifypass.php?check=' + oldpass,
      success: function(html)
      {
        var error = document.getElementById(messCurrentPassword);
        error.innerHTML =  html;
        button(open);

      }
    });
  }

  function validateNewPassword(newpass, showValidate, open, clear)
  {
    var conPass = document.getElementById("confirmPass").value;
    if (conPass != '') {
      pitikHAHA(clear);
    }
    $.ajax({
      url: 'changePassword/NewPasssword.php?npas=' + newpass,
      success: function(html)
      {
        var show = document.getElementById(showValidate);
        show.innerHTML = html;
        button(open);
      }
    });
  }
  function pitikHAHA(Pitik)
  {
    $.ajax({
      url: 'changePassword/Pitik.php?Pitik=false',
      success: function(html)
      {
        var throwError = document.getElementById(Pitik);
        throwError.innerHTML = html;
        button(open);
      }
    });
  }
  function NewPassswordConfirmed(nwpass, ConfirmedPassword, open)
  {

    $.ajax({
      url: 'changePassword/confirmedPass.php?comPass=' +nwpass ,
      success: function(html)
      {
        var comfirmedP = document.getElementById(ConfirmedPassword);
        comfirmedP.innerHTML = html;
        button(open);
      }
    });
  }
  function button(open)
  {
    $.ajax({
      url: 'changePassword/openButton.php',
      success: function(html)
      {
        var openButton = document.getElementById(open);
        openButton.innerHTML = html;
      }
    });
  }
