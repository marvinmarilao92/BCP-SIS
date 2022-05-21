
function myFunction() {

var filterdate  = document.getElementById("filterdate").value;
var filterJob   = document.getElementById("filterJob").value;
var Jobdate     = document.getElementById("Jobdate").value;

// Returns successful data submission message when the entered information is stored in database.

var takeDatainfoArray =


'filterdate=' + filterdate +
'&filterJob=' + filterJob +
'&Jobdate='   + Jobdate ;



if (filterdate == '' || filterJob == '' || Jobdate == '' )
{
  alert("Please Fill All Fields");
}
else
{

  $.ajax({
  type: "POST",
  url: "../createSession.php",
  data: takeDatainfoArray,
  cache: false,
  success: function(html)
  {
    // alert(html);
    var ajaxDisplay = document.getElementById(filterPost);
    ajaxDisplay.innerHTML = html;

  }});
}
    return false;
}
