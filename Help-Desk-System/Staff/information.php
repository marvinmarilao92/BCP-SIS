
<script type="text/javascript">
$(document).ready(function() {
    $("#addNew").on('click', function () {
       $("#tableManager").modal('show');
    });

    $("#tableManager").on('hidden.bs.modal', function () {
       $("#showContent").fadeOut();
       $("#editContent").fadeIn();
       $("#editRowID").val(0);
       $("#longDesc").val("");
       $("#shortDesc").val("");
       $("#title").val("");
       $("#closeBtn").fadeOut();
       $("#manageBtn").attr('value', 'Add New').attr('onclick', "manageData('addNew')").fadeIn();
    });

    getExistingData(0, 50);
});

function deleteRow(rowID) {
    if (confirm('Are you sure you want to delete this?')) {
        $.ajax({
            url: 'info_staff.php',
            method: 'POST',
            dataType: 'text',
            data: {
                key: 'deleteRow',
                rowID: rowID
            },  success:function(response) {
                $("#faqs_"+rowID).parent().remove();
                alert(response);
            }
        });
    }
}

function viewORedit(rowID, type) {
    $.ajax({
        url: 'info_staff.php',
        method: 'POST',
        dataType: 'json',
        data: {
            key: 'getRowData',
            rowID: rowID
        }, success: function (response) {
            if (type == "view") {
                $("#showContent").fadeIn();
                $("#editContent").fadeOut();
                $("#longDescView").html(response.longDesc);
                $("#shortDescView").html(response.shortDesc);
                $("#manageBtn").fadeOut();
                $("#closeBtn").fadeIn();
            } else {
                $("#editContent").fadeIn();
                $("#editRowID").val(rowID);
                $("#showContent").fadeOut();
                $("#longDesc").val(response.longDesc);
                $("#shortDesc").val(response.shortDesc);
                $("#title").val(response.title);
                $("#closeBtn").fadeOut();
                $("#manageBtn").attr('value', 'Save Changes').attr('onclick', "manageData('updateRow')");
            }

         
            $("#tableManager").modal('show');
        }
    });
}

function getExistingData(start, limit) {
    $.ajax({
        url: 'info_staff.php',
        method: 'POST',
        dataType: 'text',
        data: {
            key: 'getExistingData',
            start: start,
            limit: limit
        }, success: function (response) {
            if (response != "reachedMax") {
                $('tbody').append(response);
                start += limit;
                getExistingData(start, limit);
            } else
                $(".table").DataTable();
        }
    });
}

function manageData(key) {
    var title = $("#title");
    var shortDesc = $("#shortDesc");
    var longDesc = $("#longDesc");
    var editRowID = $("#editRowID");

    if (isNotEmpty(title) && isNotEmpty(shortDesc) && isNotEmpty(longDesc)) {
        $.ajax({
           url: 'info_staff.php',
           method: 'POST',
           dataType: 'text',
           data: {
               key: key,
               title: title.val(),
               shortDesc: shortDesc.val(),
               longDesc: longDesc.val(),
               rowID: editRowID.val()
           }, success: function (response) {
               if (response != "success")
                   alert(response);
               
        
               else {
                   $("#faqs_"+editRowID.val()).html(title.val());
                   title.val('');
                   shortDesc.val('');
                   longDesc.val('');
                   $("#tableManager").modal('hide');
                   $("#manageBtn").attr('value', 'Add').attr('onclick', "manageData('addNew')");
               }
           }
        });
    }
}

function isNotEmpty(caller) {
    if (caller.val() == '') {
        caller.css('border', '1px solid red');
        return false;
    } else
        caller.css('border', '');

    return true;
}
</script>