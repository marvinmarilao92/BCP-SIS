<!-- Navigation bar -->
<style>
    .bcpname{
        display:none;
      }
    /*responsive*/
    @media(max-width: 550px){
      #bcplogo {
        display: none;
      }
      #logo{
        margin-top: 40px;
        margin-left: 10px;
      }
      .bcpname{
        margin-top: 30px;
        padding-left: 50px;
        position: absolute;
        display:block;
        font-weight: bolder;
        font-size: 30px;
        
      }
      #fh5co-offcanvas{
        opacity: 0.8;
        /* border-radius: 10px; */
       position: absolute;
      }
 
    }
</style>
<nav class="fh5co-nav" role="navigation">
    <div class="top-menu">
        <div class="container">
            <!-- <div style="background-color: black; height: 50px;"></div> -->
            <center><a href="index" class="bcpname"  style="color: rgb(29, 70, 146);">BCP</a></center>
            <div class="row">              
                <div class="col-xs-6">                
                <div id="fh5co-logo"><img src="assets/img/BCPlogo.png" id="logo" width="33px" height="35px"><a href="Index" id="bcplogo" style="color: rgb(29, 70, 146);">Bestlink College of the Philippines</a></div>
                </div>
                <!-- <div class="col-xs-2">
                    <div id="fh5co-logo"><a href="index.html"><i class=""></i>BCP</a></div>
                </div> -->
                <div class="col-xs-6 text-right menu-1">
                    <ul>
                        <li class="<?php if($page=='home'){echo 'active';}?>"><a href="Index">Home</a></li>
                        <li class="<?php if($page=='modules'){echo 'active';}?>"><a href="modules">Modules</a></li>
                        <li class=""><a href="dynamic-login"><span>Login</span></a></li>
                        <!-- <li class="<?php if($page=='about'){echo 'active';}?>"><a href="about">About</a></li> -->
                        <li class="btn-cta" ><a data-toggle="modal" data-target="#exampleModalLong"><span>APPLY ONLINE</span></a></li>
                    </ul>
                </div>
            </div>
            
        </div>
    </div>
</nav>
<!-- End of Navigation bar -->
