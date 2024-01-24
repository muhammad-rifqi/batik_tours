<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- favicon -->
    <link rel="icon" type="image/png" href="<?= base_url()?>assets/backend/assets/images/favicon.png">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="<?= base_url()?>assets/backend/assets/css/bootstrap.min.css" media="all">
    <!-- Fonts Awesome CSS -->
    <link rel="stylesheet" type="text/css" href="<?= base_url()?>assets/backend/assets/css/all.min.css">
    <!-- google fonts -->
    <link
        href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,600;0,700;0,800;1,400&family=Raleway:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,400&display=swap"
        rel="stylesheet">
    <!-- Custom CSS -->
    <link rel="stylesheet" type="text/css" href="<?= base_url()?>assets/backend/style.css">
    <title>Travele | Travel & Tour HTML5 template </title>
    <script src="https://cdn.jsdelivr.net/gh/openlayers/openlayers.github.io@master/en/v6.4.3/build/ol.js"></script>
    <link rel="stylesheet"
        href="https://cdn.jsdelivr.net/gh/openlayers/openlayers.github.io@master/en/v6.4.3/css/ol.css" type="text/css">
    <!-- <script type="text/javascript">         
         window.addEventListener("change",(e)=>{
            const myfilegallery = document.getElementById("myfilegallery");
            const uploadbtn = document.getElementById("upload-input");
            const uploadgrag = document.getElementsByClassName("dragable-field-inner");
            picobject = e.target.files[0];
            preview = document.createElement("img");
            preview.src=URL.createObjectURL(picobject);
            preview.width = 150;
            uploadbtn.style.display="none";
            uploadgrag[0].append(preview);
         });
      </script> -->
    <style>
    .map {
        height: 400px;
        width: 100%;
        text-align:center;
    }
    </style>
    <script type="text/javascript">
    function getLocation() {
        navigator.geolocation.getCurrentPosition(position => {
            const {
                latitude,
                longitude
            } = position.coords;
            document.getElementById("latitude").value = latitude;
            document.getElementById("longitude").value = longitude;
        });
    }
    </script>
</head>

<body>