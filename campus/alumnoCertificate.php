
  <?php
  
  include ("conexion.php");
  session_start();
  if (
        $_SESSION['Nivel'] == 'Alumno' ||
        $_SESSION['Nivel'] == 'Asistente' ||
        $_SESSION['Nivel'] == 'Administrador' ||
        $_SESSION['Nivel'] == 'SuperAdmin' ){

      }else{
          header("Location: index.php");
      }

?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="description" content="">
<meta name="author" content="Mosaddek">
<meta name="keyword" content="Habicom | Campus Virtual">
    <link rel="shortcut icon" type="image/x-icon" href="../img/favicon.jpg">

<title>Pragot | Campus Virtual</title>

<!-- Bootstrap core CSS -->
<link href="css/bootstrap.min.css" rel="stylesheet">
<link href="css/bootstrap-reset.css" rel="stylesheet">
<!--external css-->
<link href="assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
<link href="assets/jquery-easy-pie-chart/jquery.easy-pie-chart.css" rel="stylesheet" type="text/css" media="screen"/>
<link rel="stylesheet" href="css/owl.carousel.css" type="text/css">
<link rel="stylesheet" type="text/css" href="css/gallery.css" />

<!--right slidebar-->
<link href="css/slidebars.css" rel="stylesheet">

<!--LightBox-->
<link rel="stylesheet" type="text/css" href="css/lightbox.min.css" >
<script src="js/lightbox-plus-jquery.min.js"  ></script>

<!-- Custom styles for this template -->

<link href="vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
<link href="css/style.css" rel="stylesheet">
<link href="css/style-responsive.css" rel="stylesheet" />


      <!--right slidebar-->
      <link href="vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
      <link href="css/slidebars.css" rel="stylesheet">


<!-- HTML5 shim and Respond.js IE8 support of HTML5 tooltipss and media queries -->
<!--[if lt IE 9]>
<script src="js/html5shiv.js"></script>
<script src="js/respond.min.js"></script>
<![endif]-->
</head>

<body>


<section id="container">
        <?php include ("common/menu.php") ?>
        <?php include ("common/headerAlumnoCertificados.php") ?>
      <!--main content start-->
      <section id="main-content">
          <section class="wrapper">
            <br/>
              <section class="panel">
                  <header class="panel-heading" style="background-color: #054261; color: #fff;">
                  <i class="fa  fa-graduation-cap"></i> <b> Mis Certificados</b>
                  </header>
                            <div class="row">
                                <?php
                                    $id = $_SESSION ['ID'];
                                    $query = "SELECT DISTINCT ce.image image FROM users u join people p on p.id=u.person_id join aca_students stu on stu.person_id=p.id 
                                    join aca_certificates ce on ce.student_id=stu.id join aca_cap_registrations reg on reg.student_id=stu.id
                                    join aca_courses c ON c.id = reg.course_id 
                                            WHERE u.id='$id' ";
                                    $resultado = $conexion->query($query);
                                    while($row = $resultado->fetch_assoc()){ 
                                ?>
                                <div class="col-md-4" style="padding: 10px;">
                                    <a href="../img/certificate/<?php echo $row['image']; ?>" data-lightbox="mygallery" >
                                        <img  width="100%;" src="../img/certificate/<?php echo $row['image']; ?>"/>
                                    </a>
                                </div>
                                <?php  }  ?>
                            </div>
                </section>
          </section>
      </section>
      <!--main content end-->

      
    <?php  include ("common/footer.php")  ?>
  </section>

      

    <!-- js placed at the end of the document so the pages load faster -->
    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script class="include" type="text/javascript" src="js/jquery.dcjqaccordion.2.7.js"></script>
    <script src="assets/fancybox/source/jquery.fancybox.js"></script>
    <script src="js/jquery.scrollTo.min.js"></script>
    <script src="js/jquery.nicescroll.js" type="text/javascript"></script>
    <script src="js/respond.min.js" ></script>

    <script src="js/modernizr.custom.js"></script>
    <script src="js/toucheffects.js"></script>

  <!--right slidebar-->
  <script src="js/slidebars.min.js"></script>


    <!--common script for all pages-->
    <script src="js/common-scripts.js"></script>

    <script>

//owl carousel

$(document).ready(function() {
    $("#owl-demo").owlCarousel({
        navigation : true,
        slideSpeed : 300,
        paginationSpeed : 400,
        singleItem : true,
        autoPlay:true

    });
});

//custom select box

$(function(){
    $('select.styled').customSelect();
});

$(window).on("resize",function(){
    var owl = $("#owl-demo").data("owlCarousel");
    owl.reinit();
});

</script>


  </body>
</html>