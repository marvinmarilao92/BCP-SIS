<meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <meta content="" name="description">
  <meta content="" name="keywords">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Favicons -->
  <link href="../../assets/img/BCPlogo.png" rel="icon">
  <link href="../assets/img/apple-touch-icon.png" rel="apple-touch-icon">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <!-- Vendor CSS Files -->
  <link href="../assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="../assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="../assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="../assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="../assets/vendor/quill/quill.snow.css" rel="stylesheet">
  <link href="../assets/vendor/quill/quill.bubble.css" rel="stylesheet">
  <link href="../assets/vendor/simple-datatables/style.css" rel="stylesheet">
  <!-- Template Main CSS File -->
  <link href="../assets/css/style.css" rel="stylesheet">
  <link rel="stylesheet" href="../mdb5-free-standard/css/mdb.min.css" />
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/2.2.2/css/buttons.dataTables.min.css"/>
  
  <!-- Selector search -->
  <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
  <link href="cropperjs/cropper.min.css" rel="stylesheet" type="text/css"/>
  <style>
 
 img {
            display: block;
            max-width: 100%;
        }
        .preview {
            overflow: hidden;
            width: 160px; 
            height: 160px;
            margin: 10px;
            border: 1px solid red;
        }

#imgLarge {
    float: left;
    width: 100px;
    height: 100px;
    object-fit: cover;
}
#imgMedium {
    float: left;
    width: 80px;
    height: 80px;
    object-fit: cover;
}
#imgSmall {
    float: left;
    width: 30px;
    height: 30px;
    object-fit: cover;
}
#cPhoto {
    width: 100%;
    height: 100%;
    cursor: pointer;
}

@media(max-width: 500px){
      .table thead{
        display: none;
      }

      .table, .table tbody, .table tr, .table td{
        display: block;
        width: 100%;
      }
      .table tr{
        background: #ffffff;
        box-shadow: 0 8px 8px -4px lightblue;
        border-radius: 5%;
        margin-bottom:13px;
        margin-top: 13px;
      }
      .table td{
        /* max-width: 20px; */
        padding-left: 50%;
        text-align: right;
        position: relative;
      }
      .table td::before{      
        margin-top: 10px;      
        content: attr(data-label);
        position: absolute;
        left:0;
        width: 50%;
        padding-left:15px;
        font-size:15px;
        font-weight: bold;
        text-align: left;
      }
    }
</style>

  


  

  
