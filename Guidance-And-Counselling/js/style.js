var title = "";
 function setModuleNameHDS() 
            { 
              var setValue = "Help Desk System";
              setSession(setValue);
            }
            function setModuleNameIS ()
            {
                var setValue = "Internship System";
                 setSession(setValue);
            }
            function setModuleNameLMSE ()
            {
                var setValue = "LMS EDMODO";
                 setSession(setValue);
            }
            function setModuleNameBCPC ()
            {
                var setValue = "BCP Clearance";
                 setSession(setValue);
            }
            function setModuleNameGAC  ()
            {
                var setValue = "Guidance and Counselling";
                 setSession(setValue);
            }
            function setModuleNameDATMS   ()
            {
                var setValue = "Document Approval, Tracking and Mgmt System";
                 setSession(setValue);
            }
            function setModuleNameHCM    ()
            {
                var setValue = "Health Check Monitoring";
                 setSession(setValue);
            }
            function setModuleNameSS     ()
            {
                var setValue = "Student Services (Grievances/Discipline)";
                 setSession(setValue);
            }
            function setModuleNameLMSM      ()
            {
                var setValue = "LMS MOODLE";
                 setSession(setValue);
            }
            function setModuleNameMS      ()
            {
                var setValue = "Medical System";
                 setSession(setValue);
            }
            function setModuleNameSsys      ()
            {
                var setValue = "Scholarship System";
                 setSession(setValue);
            }
            function setModuleNameUMS()
            { 
                 var setValue = "User Management System";
                 document.getElementById("LoginTitleUMS").innerHTML = "User Management System";
                 setSession(setValue);
            }
            function setSession(set)
            {
                
                if (typeof(Storage) !== "undefined") {
                  sessionStorage.setItem("index", set);
                  document.getElementById("LoginTitle").innerHTML = sessionStorage.getItem("index");
                  document.getElementById("register").innerHTML = sessionStorage.getItem("index");
                  
                } else {
                  document.getElementById("LoginTitle").innerHTML = "Sorry, your browser does not support Web Storage...";
                }
            }
            function Data()
            {
                return "Welcome to our module: "+sessionStorage.getItem("index");
            }
            function test()
            {
                return "hello";
            }
            function Merge()
            {
                if (sessionStorage.getItem("index") === "Help Desk System")
                    {
                        window.location = "https://www.facebook.com";
                    }
                    if (sessionStorage.getItem("index") === "Internship System")
                    {
                        window.location = "https://www.youtube.com";
                    }
                    if (sessionStorage.getItem("index") === "LMS EDMODO")
                    {
                        window.location = "https://www.youtube.com";
                    }
                    if (sessionStorage.getItem("index") === "BCP Clearance")
                    {
                        window.location = "https://www.youtube.com";
                    }
                    if (sessionStorage.getItem("index") === "Guidance and Counselling")
                    {
                        window.location = "https://life-line.site";
                    }
                    if (sessionStorage.getItem("index") === "Document Approval, Tracking and Mgmt System")
                    {
                        window.location = "https://www.youtube.com";
                    }
                    if (sessionStorage.getItem("index") === "Health Check Monitoring")
                    {
                        window.location = "https://www.youtube.com";
                    }
                    if (sessionStorage.getItem("index") === "Student Services (Grievances/Discipline)")
                    {
                        window.location = "https://www.youtube.com";
                    }
                    if (sessionStorage.getItem("index") === "LMS MOODLE")
                    {
                        window.location = "https://www.youtube.com";
                    }
                    if (sessionStorage.getItem("index") === "Medical System")
                    {
                        window.location = "https://www.youtube.com";
                    }
                    if (sessionStorage.getItem("index") === "Scholarship System")
                    {
                        window.location = "https://www.youtube.com";
                    }
                    if (sessionStorage.getItem("index") === "User Management System")
                    {
                        window.location = "https://www.youtube.com";
                    }
            }
            function Message(text)
            {
                swal({
                    title: text,
                    text:  Data(),
                    type: "success"
                }).then(function() {
                    Merge();   
                });
            }
//            
//            function getTitle()
//            {
//                return value;
//            }
//            function setTitle(text)
//            {
//               value = (document.getElementById("register").innerHTML = text);
//            }



        
            
         