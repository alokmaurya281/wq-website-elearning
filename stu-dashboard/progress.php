<?php 
include('api.php');

include('check-login.php');
include('head.php');

// include('sidebar.php');
if(!isset($_GET['course_id'])){
    echo "<script>alert('Please Select one of Your Course Or Create New Course');window.location.assign('index.php');</script>";
}


?>

<body>
    <!-- Navbar -->
    <nav style="margin-left:-60px;" class="navbar navbar-expand-lg navbar-light bg-light">
        <!-- Container wrapper -->
        <div class="container">
            <!-- Navbar brand -->
            <a class="navbar-brand me-2" href="https://mdbgo.com/">
                <!-- <img
        src="https://mdbcdn.b-cdn.net/img/logo/mdb-transaprent-noshadows.webp"
        height="16"
        alt="MDB Logo"
        loading="lazy"
        style="margin-top: -1px;"
      /> -->WorldsQNA
            </a>

            <!-- Toggle button -->
            <button class="navbar-toggler" type="button" data-mdb-toggle="collapse"
                data-mdb-target="#navbarButtonsExample" aria-controls="navbarButtonsExample" aria-expanded="false"
                aria-label="Toggle navigation">
                <i class="fas fa-bars"></i>
            </button>

            <!-- Collapsible wrapper -->
            <div class="collapse navbar-collapse" id="navbarButtonsExample">
                <!-- Left links -->
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" href="#">Dashboard</a>
                    </li>
                </ul>
                <!-- Left links -->

                <div class="d-flex align-items-center">
                    <button type="button" class="btn btn-link px-3 me-2">
                        Leave rating
                    </button>
                    <a href="progress.php" type="button" class="btn btn-primary me-3">
                        Progress
</a>
                    <a class="btn btn-dark px-3" href="https://github.com/mdbootstrap/mdb-ui-kit" role="button"><i
                            class="fa fa-share-alt"></i></a>
                </div>
            </div>
            <!-- Collapsible wrapper -->
        </div>
        <!-- Container wrapper -->
    </nav>
    <!-- Navbar -->





    <section style="margin-left:100px; margin-right:100px;">
        <!-- <div class="form-head d-md-flex mb-sm-4 mb-3 align-items-start"
        style="background-color:white; padding:30px; border-radius:10px; margin-bottom:30px;">
        <div class="me-auto  d-lg-block">
            <h2 class="text-black font-w600">Course Lecture</h2>
            <p class="mb-0">Welcome <?php echo $_SESSION['name'];?></p>
        </div>
        <?php $actual_link = 'http://'.$_SERVER['HTTP_HOST'].$_SERVER['PHP_SELF'];?>
        <a href="<?php echo $actual_link?>" class="btn btn-primary rounded light me-3">Refresh</a>
        <!-- <a href="update_property_details.php" class="btn btn-primary rounded light me-3">Update</a>

                        <a href="javascript:void(0);" class="btn btn-primary rounded"><i class="fas fa-cog me-0"></i></a> -->
        <!-- </div>  -->






        <div style=" padding:40px; border-radius:10px; margin-right:auto; margin-left:auto; ">
            <style>
            .active {
                color: #828282 !important;
            }
            </style>
            <div class="text-new">
                <h1>Progress Of course</h1>

                <!-- <hr> -->
        </div>
    </div>


    </section>



    <?php

include('backtotop.php');

include('footer.php');


?>