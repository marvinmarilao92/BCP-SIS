
<!--Register ACCOUNT-->
<div class="modal fade" id="Register" tabindex="-1"  aria-hidden="true" >
                <div class="modal-dialog modal-xl">
                  <div class="modal-content">
                    <div class="modal-header" style="background-color: lightblue;">
                      <h3 class="modal-title">Magandang Buhay !</h3>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body" style="text-align: justify; text-justify: inter-word; overflow-y: scroll;  height:420px; ">
                   
                    <form class="row g-3 needs-validation" action="auth/ges.php" method="POST" enctype="multipart/form-data">
                   
                    <h4 class="custom">Please Sign Up!</h4><br>
                    <hr>
                          <div class="col-6">
                            <div class="form-floating">
                              <input type="text" class="form-control" name="cname"  placeholder="companyname" required autofocus>
                              <label for="floatingName">Company Name</label>
                            </div>
                          </div>
                          <br>

                          <div class="col-6">
                            <div class="form-floating">
                              <input type="text" class="form-control" name="rname"  placeholder="repname" required autofocus>
                              <label for="floatingName">Representative Name</label>
                            </div>
                          </div>
                          <br>


                          <div class="col-12  ">
                            <div class="form-floating">
                              <textarea  class="form-control" name="caddress"  placeholder="cmpaddress" required autofocus></textarea>
                              <label for="floatingName">Company Address</label>
                            </div>
                          </div>
                          <br>



                          

                          <div class="col-12">
                            <div class="form-floating">
                              <input type="email" class="form-control" name="cemail"  placeholder="email address" required autofocus>
                              <label for="floatingName">Company Email Address</label>
                            </div>
                          </div>
                          <br>


                          <div class="col-6">
                            <div class="form-floating">
                            <input type="password" class="form-control" name="password"  placeholder="password"  required autofocus>
                              <label for="floatingName">Password</label>
                            </div>
                          </div>
                          <br>




                          <div class="col-6">
                            <div class="form-floating">
                              <input type="password" class="form-control" name="re_pass"  placeholder="Amount" required autofocus>
                              <label for="floatingName">ReType Password</label>
                            </div>
                          </div>
                          <br>
                          <br>
                          <br>
                           <br>
                          <br>
                          <h4 class="custom">"Representative" User Credentials !</h4><br>

                           <div class="col-4">
                            <div class="form-floating">
                              <input type="text" class="form-control" name="fname"  placeholder="firstname" required autofocus>
                              <label for="floatingName">Firstname</label>
                            </div>
                          </div>
                          <br>
                           <div class="col-4">
                            <div class="form-floating">
                              <input type="text" class="form-control" name="midname"  placeholder="middlename" required autofocus>
                              <label for="floatingName">Middlename</label>
                            </div>
                          </div>
                          <br>
                           <div class="col-4">
                            <div class="form-floating">
                              <input type="text" class="form-control" name="lname"  placeholder="lastname" required autofocus>
                              <label for="floatingName">Lastname</label>
                            </div>
                          </div>
                          <br>
                           <div class="col-12">
                            <div class="form-floating">
                              <input type="text" class="form-control" name="presentadd"  placeholder="companyname" required autofocus>
                              <label for="floatingName">Present Address</label>
                            </div>
                          </div>
                          <br>
                          <div class="col-4">
                            <div class="form-floating">
                              <input type="text" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" class="form-control" name="contact" onkeypress="return onlyNumberKey(event)" 
                   maxlength="11" 
                   size="50%"  placeholder="pno" required autofocus>
                              <label for="floatingName">Phone number</label>
                            </div>
                          </div>
                          <br>
                          <div class="col-4">
                            <div class="form-floating">
                              <input type="text" class="form-control" name="r_email"  placeholder="lastname" required autofocus>
                              <label for="floatingName">Valid Email Address</label>
                            </div>
                          </div>
                          <br>

                          <div class="col-4">
                            <div class="form-floating">

                              <select type="text" class="form-control" name="gender"  placeholder="companyname" required autofocus>
                              <option value="" style="color:black" selected="selected" disabled="disabled">Select Gender</option>
                              <option>Male</option>
                              <option>Female</option>
                              <label for="floatingName">Gender</label>
                              </select>
                            </div>

                          </div>
                          <br>
                          <div class="col-12">
                            <div class="form-floating">
                              <input type="text" class="form-control" name="position"  placeholder="companyname" required autofocus>
                              <label for="floatingName">Position At Work</label>
                            </div>
                          </div>
                          <br>
                          <br>
                          <br>
                          <br>
                          <div class="col-12">
                          <br>
                          <br>
                          <br>
                          <h4 class="custom">"Please upload your background Company such as include your other information about to your company !</h4><br>
                          <br>
                          <br>
                          <br>

                          <div class="container">
                                <center>
                                <span><i class="fa fa-cloud-upload text-dark fa-5x" aria-hidden="true"></i></span>
                                <p class="text-dark">Choose your file Upload</label><br><br>
                                <input type="file" id="file" class="text-dark" name="uploaded_file"accept="application/pdf, application/vnd.ms-excel" required>
                                <br>
                                <small id="passwordHelpBlock" class="form-text text-muted">
                                    Your filetype must be pdf to avoid error while uploading and size of 4mb.
                                </small>
                            </center>
                          </div>
                          </div>    

                         
                    </div>
                    <div class="modal-footer">
                     
                      <button type="submit" class="btn btn-primary btn-lg  rounded-pill" name="submit">Continue</button>
                     
                    </div>
                    </form>
                  </div>
                </div>
              </div>

<!--Terms and condition-->
<div class="modal fade" id="terms" tabindex="-1"  aria-hidden="true">
                <div class="modal-dialog modal-lg">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h1 class="modal-title">Terms & Conditions</h1>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body" style="text-align: justify; text-justify: inter-word; overflow-y: scroll;  height:500px; ">
                    
                    
                    
                          <div class="col-12">
                          <div style="padding: 10px;">
                            <h4>Statement of Privacy Policy</h4>
                            <hr>
                            <b >BESTLINK COLLEGE OF THE PHILIPPINES, INC .( BCP )</b> is committed to abide by and adhere to the provisions of Philippine Republic Act No. 10173, also known as, the Data Privacy Act of 2012 and its Implementing Rules and Regulations. BCP commits itself to protect the privacy of its data subjects (individuals it deals with, current, past and prospective) as well as to ensure that the personal data gathered as provided by such subjects shall be safeguarded and secured while under its control and custody. This data privacy policy will outline the manner by which the data gathered will be properly utilized and the process of doing so; the measures to be undertaken for purposes of keeping it secure, its appropriate use and disposal when no longer deemed necessary; and provide information to the data subjects about their rights under RA#10173.
                            <br>
                            For the above purpose this Data Privacy Notice and Consent Form may be amended at any time without prior notice, and such amendments will be notified to you via BCP’s website or email.
                            <br><br>
                            <h4><b>Privacy Notice</b></h3>
                            <hr>

                            <h5><b>Information Collected</b></h3>
                            <p>
                                BCP collects, stores, and processes personal data from its current, past and prospective students, starting with the information provided at application through the information collected throughout the whole course of their study at the BCP. This will include: 
                            </p>
                            <ul>
                                <li>Contact information, such as, name, addresses, telephone numbers, email addresses and other contact details;</li>
                                <li>Personal information, such as date and place of birth, nationality, immigration status, religion, civil status, student ID, government-issued IDs, web information, recommendations and assessment forms from previous schools, etc.;</li>
                                <li>Family background, including information on parents, guardians, siblings, etc.;</li>
                                <li>Photographic and biometric data, such as, photos, CCTV videos, fingerprints, handwriting and signature specimens;</li>
                                <li>Student's school works, including data gathered using third party online learning tools Health records, psychological evaluation results, disciplinary records, and physical fitness information;</li>
                                <li>Student Cumulative Guidance Folder, which includes interviews, guidance assessments, special needs, exclusions/behavioral information, etc.;</li>
                                <li>Permanent Student Academic Records, including transcripts and the academic history of the student in BCP;</li>
                                <li>Student extra-curricular activities, résumés, job interview forms; and,</li>
                                <li>Financial and billing information.</li>
                            </ul>

                            <h5><b>Use of Information</b></h3>
                            <p>             
                            The collected personal data is used solely for the following purposes:         
                            </p>
                            <ul>
                                <li>Processing of admission application and student selection (and to confirm the identity of prospective students and their parents);</li>
                                <li>Verifying authenticity of student records and documents;</li>
                                <li>Processing of scholarship applications and its on-going requirements;</li>
                                <li>Processing of enrollment and registration;</li>
                                <li>Supporting student learning, and validating students’ program of study based on curriculum requirements, and other activities and experiences forming part of the student’s formation and education;</li>
                                <li>Supporting the student’s well-being and providing medical services and guidance counselling;</li>
                                <li>Monitoring and reporting on student progress; processing of evaluations, exam results, and grades;</li>
                                <li>Monitoring and ensuring the safety of all students within the BCP campus;</li>
                                <li>Processing and generating statements of accounts;</li>
                                <li>Processing of application for graduation;</li>
                                <li>Evaluation for board examinations;</li>
                                <li>Documentation of students’ data;</li>
                                <li>For accreditation, professional development of teachers and staff, and research, e.g., evaluation studies by the research desk, action research by teachers, etc.;</li>
                                <li>Posting or displaying of academic and non-academic achievements within the BCP premises and/or its official website and social media accounts;</li>
                                <li>Marketing and promoting BCP, its students, employees, and other academic and non-academic and/or school activities inside and outside the campus; and,</li>
                                <li>Providing Library services, running an outreach program, family council purposes, job postings, practicums, internships, employment.</li>
                            </ul>

                            <h5><b>Information Sharing</b></h3>
                            <p>                         
                            Personal data under the custody of BCP shall be disclosed only to authorized recipients of such data. Otherwise, we will share your personal data with third parties, other than your parents and/or guardian on record for minors, only with your consent, or when required or permitted by our policies and applicable law, such as with:               
                            </p>
                            <ul>    
                                <li>Regulatory authorities, courts, and government agencies, e.g., Department of Education, Commission on Higher Education, etc.;</li>
                                <li>The Association of Christian Schools, Colleges and University Accrediting Agency (ACSCU-AAI), a service organization which accredits academic programs that meet commonly accepted standards of quality education;</li>
                                <li>Service Providers who perform services for us and help us support your learning, monitor and report on your progress, manage the operations of our school, and assess how well BCP is doing; and,</li>
                                <li>Business partners and other academic linkages who provide internships and job opportunities to our graduates.</li>              
                            </ul>

                            <h5><b>Data Transfer</b></h3>
                            <p>                 
                            Where BCP consider it necessary or appropriate, for the purposes of data storage, processing, providing any service or product on our behalf to you, or implementing an academic linkage program, we may transfer your personal data to third parties within or outside of the Philippines, under conditions of confidentiality and similar levels of security safeguards.                
                            </p>

                            <h5><b>Security</b></h3>
                            <p>         
                                We continue to implement organizational, administrative, technical, and physical security measures to safeguard your personal data. 
                                <br><br>                 
                                Only authorized personnel have access to them, the exchange of which is facilitated through internal shared servers, email, and paper files.  
                                <br><br>                          
                                Should third parties need access to your personal data, we require some form of data sharing agreement with them, in compliance with the DPA and the DPA-IRR.    
                                <br><br>                    
                                Your paper and digital files are securely stored employing physical security to safeguard the paper files and technical security to protect the digital files.                             
                                </p> 
                                <h5><b>Retention of Information</b></h3>
                                <p>             
                                We keep your paper and digital files only for as long as necessary. 
                                <br><br>           
                                a) The Permanent Student Academic Records are kept by the Basic Education (BED) Records Office or the Higher Education (HED) Registrar’s Office for 75 years after last graduation from BCP. 
                                <br>
                                b) The BED and HED Admission files are kept for five years.      
                                <br>            
                                c) Application forms and documents of unsuccessful applicants are kept by the Admissions Office – five years for BED and two years for HED.              
                                <br>            
                                d) Scholarship application forms and supporting documentation are kept by the HED Office of Student Affairs for four years, or until the scholar graduates.             
                                <br>            
                                e) The Student Cumulative Guidance Folders are kept by the Guidance Office for five years after graduation.             
                                <br>            
                                f) Student school works are kept for five years, but, in a some cases, selected student works may be retained for ten years as exemplars.             
                                <br>            
                                g) Student disciplinary records are stored by the Office of Student Affairs, for five years after graduation.             
                                <br>            
                                h) The class records are kept for one year after graduation.             
                                <br>            
                                i) Non-academic records, e.g., service records for HED scholars, extra-curricular activities, emergency contact forms, etc. are kept for five years.             
                                <br>   
                                j) Financial and billing information are kept by the Finance Office for ten years.             
                                <br>               
                                k) The Clinic retains health records for five years after graduation.             
                                <br>     
                                l) CCTV cameras are the responsibility of Facilities; some cameras have memory for a month of CCTV videos, and older ones for less. The cameras run continuously on a rolling basis, where older videos are overwritten as the memory fills up.             
                                <br> 
                                <br>            
                                When your personal data is no longer needed, we take reasonable steps to securely destroy such information or permanently de-identify it. Paper files are securely shredded and electronic information is deleted applying <i>Secure Erase</i>
                                so that this is no longer recoverable nor reproducible.        
                                <br>          
                            </p>
                            <h5><b>Your rights</b></h3>
                            <p>                     
                            You have the right to be informed, to object processing, access and rectification, to suspend or to withdraw your personal data, including, any such information held by third parties, with whom BCP has data sharing agreement; and be indemnified in case of damages pursuant to the provisions of the DPA and the DPA-IRR.                        
                            </p>
                        </div>
                          </div>
                       
                          
                          
                    </div>
                    <div class="modal-footer">
                     
                      <a type="button" class="btn btn-primary btn-lg  rounded-pill" name="submit" data-bs-toggle="modal" data-bs-target="#Register">I Agree</a>
                     
                    </div>
                    
                  </div>
                </div>
              </div>