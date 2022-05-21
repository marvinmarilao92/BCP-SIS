<div class="modal-header " style="background-color:rgba(245, 254, 255, 1)">
  <h5 class="modal-title" id="exampleModalLongTitle"><img src="http://bcp-sis.ga/Document-Approval-Tracking-and-Mngt-System/DATMS/assets/img/DATMS_logo.png" width="30px;" height="30px;"> Student Information Request</h5>
  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
<div class="modal-body">

<div class="form-row">
  <div class="form-group col-12">
    <label for="">Student Course</label>
    <select class="form-select" aria-label="Default select example" id="stdCourse">
      <option selected>Open this select menu</option>
      <option value="BS Information Technology">BS Information Technology</option>
      <option value="BS Hospitality Management">BS Hospitality Management</option>
      <option value="BS Office Administration">BS Office Administration</option>
      <option value="BS Business Administration">BS Business Administration</option>
      <option value="BS Criminology">BS Criminology</option>
      <option value="Bachelor of Elementary Education">Bachelor of Elementary Education</option>
      <option value="Bachelor of Secondary Education">Bachelor of Secondary Education</option>
      <option value="BS Computer Engineering">BS Computer Engineering</option>
      <option value="Bachelor of Library in Information Science">Bachelor of Library in Information Science</option>
      <option value="BS Tourism Management">BS Tourism Management</option>
      <option value="BS Entrepreneurship">BS Entrepreneurship</option>
      <option value="BS Accounting Information System">BS Accounting Information System</option>
      <option value="BS Psychology">BS Psychology</option>

    </select>
  </div>
</div>

<div class="form-row">
  <div class="form-group col-6">
    <label for="">School Year</label>
    <select class="form-select" aria-label="Default select example" id="stdSchoolYear">
      <option selected value="" disabled>Select School Year</option>
      <option value="2021-2022">2021-2022</option>
      <option value="2020-2021">2020-2021</option>
      <option value="2019-2020">2019-2020</option>
      <option value="2018-2019">2018-2019</option>
      <option value="2017-2018">2017-2018</option>
      <option value="2016-2017">2016-2017</option>
      <option value="2015-2016">2015-2016</option>
      <option value="2014-2015">2014-2015</option>
      <option value="2013-2014">2013-2014</option>
      <option value="2012-2013">2012-2013</option>
      <option value="2011-2012">2011-2012</option>
      <option value="2010-2011">2010-2011</option>
      <option value="2009-2010">2009-2010</option>
      <option value="2008-2009">2008-2009</option>
      <option value="2007-2008">2007-2008</option>
      <option value="2006-2007">2006-2007</option>
      <option value="2005-2006">2005-2006</option>
      <option value="2004-2005">2004-2005</option>
      <option value="2003-2004">2003-2004</option>
      <option value="2002-2003">2002-2003</option>


    </select>
  </div>
  <div class="form-group col-6">
    <label for="">Year Level</label>
    <select class="form-select" aria-label="Default select example" id="stdyearLvl">
      <option selected value="" disabled>Select year level</option>
      <option value="1st Year">1st Year</option>
      <option value="2nd Year">2nd Year</option>
      <option value="3rd Year">3rd Year</option>
      <option value="4th Year">4th Year</option>
      <option value="All Year Level">All Year Level</option>
    </select>
  </div>
</div>

<div class="modal-footer">
  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
  <button type="button" class="btn btn-primary" onclick="submitDTMSRequest('dtmsTable');">Create Request</button>
</div>
</div>
