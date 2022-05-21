<div class="modal fade" id="setStudentAppointment" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <?php session_start();

                echo '      <div class="form-row" >
                                <div class="form-group col-md-12" >
                                    <input type="text"   oninput="validateEmployee(this.value,'; echo "'openBtnAppointment'"; echo');"  id="RemployeeName" required name="EmployeeName" placeholder="Referred by?" class="form-control animate__animated animate__bounceInLeft"  >
                                </div>
                            </div>';

            if (isset($_SESSION["Student_Name".$_SESSION['success'].""]) && isset($_SESSION["Student_ID".$_SESSION['success'].""]))
            {
                echo '      <div class="form-row" >
                              <div class="form-group col-md-8" >
                                  <input  type="text" id="RStudentName" disabled name="StudentName" value="'.$_SESSION["Student_Name".$_SESSION['success'].""].'" placeholder="Student Name" class="form-control animate__animated animate__bounceInRight"  >
                              </div>
                              <div class="form-group col-md-4">
                                  <input type="text" id="RStudentID" disabled name="StudentID" value="'.$_SESSION["Student_ID".$_SESSION['success'].""].'" placeholder="Student ID" class="form-control animate__animated animate__bounceInLeft"  >
                              </div>
                            </div>';
            }
            else
            {
                echo '      <div class="form-row" >
                              <div class="form-group col-md-8" >
                                  <input  type="text" id="RStudentName" required disabled name="StudentName" placeholder="Student Name" class="form-control animate__animated animate__bounceInRight"  >
                              </div>
                              <div class="form-group col-md-4">
                                  <input type="text" id="RStudentID" required disabled name="StudentID" placeholder="Student ID" class="form-control animate__animated animate__bounceInLeft"  >
                              </div>
                            </div>';
            }

                echo '      <div class="form-row" >
                                <div class="form-group col-md-12" >
                                    <textarea id="RStudentIssue" name="StudentIssue" required class="form-control animate__animated animate__zoomInUp"  rows="5"  placeholder="Reason for referral" ></textarea>
                                </div>
                            </div>

                             <div class="form-row" >
                                <div class="form-group col-md-12" >
                                    <input type="hidden" name="size" value="1000000">
                                    <label for ="referral" ><span style="font-style: italic;">Insert Referral slip (GF-6)</span></label>
                                    <input type="file"  id="RemployeeName" required name="ReferralSlip"  class="form-control animate__animated animate__bounceInLeft"  >
                                </div>
                            </div>

                            <div class="form-row" >
                                <div class="form-group col-md-12" >
                                    <label for ="referral" ><span style="font-style: italic;">Set appointment</span></label>
                                    <input id="dateTimePicker" placeholder="Select available date" type="date"  style="height: 45px;" onchange="submitAppointment('; echo "'validate_dateTime','show_Time','openBtnAppointment'"; echo');" required  name="dtime"  class="form-control animate__animated animate__bounceInRight"  >
                                    <span id="validate_dateTime"><small class="form-text text-muted"></small></span>
                                </div>
                            </div>

                            <div class="form-row" >
                                <div class="form-group col-md-12" id="show_Time">
                                      <select class="form-select" aria-label="Default select example" onchange="openBtnAppointment('; echo "'openBtnAppointment'"; echo');">
                                        <option selected value="" disabled>Select available time</option>
                                        <option value=" 8:30 AM" style="color:green">08:30 AM</option>
                                        <option value=" 10:30 AM" style="color:green">10:30 AM</option>
                                        <option value=" 1:30 PM" disabled style="color:red">01:30 PM</option>
                                        <option value=" 3:30 PM" style="color:green">03:30 PM</option>
                                      </select>
                                    <span><small class="form-text text-muted"></small></span>
                                </div>
                            </div>
                       </div>


                      <div class="modal-footer" id="openBtnAppointment">
                          <button type="submit"  class="btn btn-info"  disabled onclick="submitAppointment('; echo "'validate_dateTime'"; echo');" name="AddRequesting">Submit</button></form>
                      </div>';

         ?>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>
