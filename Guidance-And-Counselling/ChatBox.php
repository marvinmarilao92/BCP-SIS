<?php  ?>
<!-- Modal chat -->
<div class="modal animate__animated animate__bounceInDown" id="Convowithstudent" tabindex="-1" role="dialog" aria-labelledby="Convowithstudent" aria-hidden="true" >
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content"
         style="border: none; border-radius: 30px;
                border-bottom: 3px solid black;
                border-top: 3px solid black;">

        <div class="modal-header" style=" background-color: #c7efff;
                                            border-top-left-radius: 30px;
                                            border-top-right-radius: 30px;">
        <h5 class="modal-title" id=""> Chat with student</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="Dismiss();">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

        <script>
                function Dismiss()    { $("#Convowithstudent").modal('hide'); }
                function HideForm()   { $("#InsertForms").modal('hide'); }
                function Edit()       { $("#ViewRequest").modal('hide'); }
                function Testing()    { $("#AddScore").modal('hide'); }
        </script>

        <div class="modal-body" id="FetchConvo" style="height: 350px;
                overflow-x: hidden;
                overflow-y: auto;
                div.scroll::-webkit-scrollbar { display: none; }
                ">

                    <!--Fetch conversation here-->

        </div>
        <div class="modal-footer" style="margin-bottom: -30px; position: relative;">
            <form method="POST" action="#" id="form1" >
               <div class="form-row">
                   <div class="form-group col-md-1" ></div>
                   <div class="form-group col-md-1">
                       <button type="button" id="sync" class="btn btn-info form-group animate__animated animate__zoomInUp" ><i class="bi bi-arrow-clockwise "></i></button>
                   </div>
                 <div class="form-group col-md-8" >
                     <textarea name="Chatinfo" id="Chats"  placeholder="<?php echo 'Say Something about '.$_SESSION['Student_Name'.$_SESSION["success"].''];?>" required class="form-control animate__animated animate__zoomInUp"  rows="1" cols="80"></textarea>
                 </div>
                 <div class="form-group col-md-1" >
                     <button type="submit" id="convo" class="btn btn-success form-group animate__animated animate__zoomInUp" ><i class="bi bi-arrow-right-square"></i></button>
                 </div>
                   <div class="form-group col-md-1" ></div>
              </div>
            </form>
      </div>
    </div>
  </div>
</div>





<script>
    function ClearFields()
    {
     document.getElementById("Chats").value = "";
    }
</script>


<script type="text/javascript">
  $(document).ready(function(){
    $("#convo").click(function(){
      event.preventDefault();
      var	Chats = $('#Chats').val();
      $.ajax({
          type: "POST",
          url: "Conversation.php",
          data: { Chats:Chats },
          dataType: "json",
          success: function(result){

          }
      });
    });
  });
</script>

<script type="text/javascript">
  $(document).ready(function(){
     $("#convo").click(function(){
      $.ajax({
        type:'POST',
        url:'FetchConvo.php',
        data:{
          name:$("#Chats").val(),
        },
        success:function(data){
          $("#FetchConvo").html(data);
        }
      });
    });
  });
</script>


<script type="text/javascript">
  $(document).ready(function(){
     $("#sync").click(function(){
      $.ajax({
        type:'POST',
        url:'FetchConvo.php',
        data:{
          name:$("#Chats").val(),
        },
        success:function(data){
          $("#FetchConvo").html(data);
        }
      });
    });
  });
</script>
