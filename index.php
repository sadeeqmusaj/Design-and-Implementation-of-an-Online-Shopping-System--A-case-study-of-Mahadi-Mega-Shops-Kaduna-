<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>welcome to mms</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Cookie">
    <link rel="stylesheet" href="assets/fonts/font-awesome.min.css">
    <link rel="stylesheet" href="assets/css/styles.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.10.0/css/lightbox.min.css">
    <link rel="stylesheet" href="assets/css/Pretty-Footer.css">
</head>

<body style="">
        <?php include "header.php";?> 

    <div id="loader-wrapper">
  <div id="loader"></div>

  <div class="loader-section section-left"></div>
  <div class="loader-section section-right"></div>

</div>
    
     <font color="white"><h1 style="text-align: center;">Gallery</h1></font>
    <center>
        <div class="container imgs">
            <div class="row">
                <div class="col-md-4">
                    <div class="thumbnail">
                        <a href="s2.jpg" data-lightbox="clothes"> <img class="img-responsive" src="assets/img/s2.JPG"></a>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="thumbnail">
                        <a href="IMG_5616.JPG" data-lightbox="clothes"> <img class="img-responsive" src="assets/img/IMG_5616.JPG"></a>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="thumbnail">
                        <a href="s4.jpg" data-lightbox="clothes"> <img class="img-responsive" src="assets/img/s4.JPG"></a>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <div class="thumbnail">
                        <a href="s3.jpg" data-lightbox="clothes"> <img class="img-responsive" src="assets/img/s3.JPG"></a>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="thumbnail">
                        <a href="s2.jpg" data-lightbox="clothes"> <img class="img-responsive" src="assets/img/s2.JPG"></a>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="thumbnail">
                        <a href="s1.jpg" data-lightbox="clothes"> <img class="img-responsive" src="assets/img/s1.JPG"></a>
                    </div>
                </div>
            </div>
        </div>
        </center>

    <?php include "footer.php";?>

    <script src="jquery.min.js" ></script>
    <script src="js/loader.js" ></script>
    <script src="bootstrap.min.js" ></script>

    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.10.0/js/lightbox-plus-jquery.min.js"></script>
</body>

</html>