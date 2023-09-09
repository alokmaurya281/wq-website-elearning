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
                    <a href="progress.php?course_id=<?php echo $_GET['course_id'] ?>" type="button" class="btn btn-primary me-3">
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
                <h1>Lecture Name</h1>

                <!-- <hr> -->
                <div>
                    <div class="course-content">
                        <div class="content-left">

                            <!-- <div class="container"> -->
                            <div class="video-container" id="video-container">
                                <div class="playback-animation" id="playback-animation">
                                    <svg class="playback-icons">
                                        <use class="hidden" href="#play-icon"></use>
                                        <use href="#pause"></use>
                                    </svg>
                                </div>

                                <video controls class="video" id="video" preload="metadata" poster="player/poster.jpg">
                                    <source src="../player/video.mp4" type="video/mp4">
                                    </source>
                                    <!-- <track label="English subtitles" kind="subtitles" srclang="en" src="/static/the-web-is-always-changing.vtt" default=""> -->

                                </video>

                                <div class="video-controls hidden" id="video-controls">
                                    <div class="video-progress">
                                        <progress id="progress-bar" value="0" min="0"></progress>
                                        <input class="seek" id="seek" value="0" min="0" type="range" step="1">
                                        <div class="seek-tooltip" id="seek-tooltip">00:00</div>
                                    </div>

                                    <div class="bottom-controls">
                                        <div class="left-controls">
                                            <button data-title="Play (k)" id="play">
                                                <svg class="playback-icons">
                                                    <use href="#play-icon"></use>
                                                    <use class="hidden" href="#pause"></use>
                                                </svg>
                                            </button>

                                            <div class="volume-controls">
                                                <button data-title="Mute (m)" class="volume-button" id="volume-button">
                                                    <svg>
                                                        <use class="hidden" href="#volume-mute"></use>
                                                        <use class="hidden" href="#volume-low"></use>
                                                        <use href="#volume-high"></use>
                                                    </svg>
                                                </button>

                                                <input class="volume" id="volume" value="1" data-mute="0.5" type="range"
                                                    max="1" min="0" step="0.01">
                                            </div>

                                            <div class="time">
                                                <time id="time-elapsed">00:00</time>
                                                <span> / </span>
                                                <time id="duration">00:00</time>
                                            </div>
                                        </div>

                                        <div class="right-controls">
                                            <button data-title="PIP (p)" class="pip-button" id="pip-button">
                                                <svg>
                                                    <use href="#pip"></use>
                                                </svg>
                                            </button>
                                            <button data-title="Full screen (f)" class="fullscreen-button"
                                                id="fullscreen-button">
                                                <svg>
                                                    <use href="#fullscreen"></use>
                                                    <use href="#fullscreen-exit" class="hidden"></use>
                                                </svg>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- </div> -->

                            <svg style="display: none">
                                <defs>
                                    <symbol id="pause" viewBox="0 0 24 24">
                                        <path
                                            d="M14.016 5.016h3.984v13.969h-3.984v-13.969zM6 18.984v-13.969h3.984v13.969h-3.984z">
                                        </path>
                                    </symbol>

                                    <symbol id="play-icon" viewBox="0 0 24 24">
                                        <path d="M8.016 5.016l10.969 6.984-10.969 6.984v-13.969z"></path>
                                    </symbol>

                                    <symbol id="volume-high" viewBox="0 0 24 24">
                                        <path
                                            d="M14.016 3.234q3.047 0.656 5.016 3.117t1.969 5.648-1.969 5.648-5.016 3.117v-2.063q2.203-0.656 3.586-2.484t1.383-4.219-1.383-4.219-3.586-2.484v-2.063zM16.5 12q0 2.813-2.484 4.031v-8.063q1.031 0.516 1.758 1.688t0.727 2.344zM3 9h3.984l5.016-5.016v16.031l-5.016-5.016h-3.984v-6z">
                                        </path>
                                    </symbol>

                                    <symbol id="volume-low" viewBox="0 0 24 24">
                                        <path
                                            d="M5.016 9h3.984l5.016-5.016v16.031l-5.016-5.016h-3.984v-6zM18.516 12q0 2.766-2.531 4.031v-8.063q1.031 0.516 1.781 1.711t0.75 2.32z">
                                        </path>
                                    </symbol>

                                    <symbol id="volume-mute" viewBox="0 0 24 24">
                                        <path
                                            d="M12 3.984v4.219l-2.109-2.109zM4.266 3l16.734 16.734-1.266 1.266-2.063-2.063q-1.547 1.313-3.656 1.828v-2.063q1.172-0.328 2.25-1.172l-4.266-4.266v6.75l-5.016-5.016h-3.984v-6h4.734l-4.734-4.734zM18.984 12q0-2.391-1.383-4.219t-3.586-2.484v-2.063q3.047 0.656 5.016 3.117t1.969 5.648q0 2.203-1.031 4.172l-1.5-1.547q0.516-1.266 0.516-2.625zM16.5 12q0 0.422-0.047 0.609l-2.438-2.438v-2.203q1.031 0.516 1.758 1.688t0.727 2.344z">
                                        </path>
                                    </symbol>

                                    <symbol id="fullscreen" viewBox="0 0 24 24">
                                        <path
                                            d="M14.016 5.016h4.969v4.969h-1.969v-3h-3v-1.969zM17.016 17.016v-3h1.969v4.969h-4.969v-1.969h3zM5.016 9.984v-4.969h4.969v1.969h-3v3h-1.969zM6.984 14.016v3h3v1.969h-4.969v-4.969h1.969z">
                                        </path>
                                    </symbol>

                                    <symbol id="fullscreen-exit" viewBox="0 0 24 24">
                                        <path
                                            d="M15.984 8.016h3v1.969h-4.969v-4.969h1.969v3zM14.016 18.984v-4.969h4.969v1.969h-3v3h-1.969zM8.016 8.016v-3h1.969v4.969h-4.969v-1.969h3zM5.016 15.984v-1.969h4.969v4.969h-1.969v-3h-3z">
                                        </path>
                                    </symbol>

                                    <symbol id="pip" viewBox="0 0 24 24">
                                        <path
                                            d="M21 19.031v-14.063h-18v14.063h18zM23.016 18.984q0 0.797-0.609 1.406t-1.406 0.609h-18q-0.797 0-1.406-0.609t-0.609-1.406v-14.016q0-0.797 0.609-1.383t1.406-0.586h18q0.797 0 1.406 0.586t0.609 1.383v14.016zM18.984 11.016v6h-7.969v-6h7.969z">
                                        </path>
                                    </symbol>
                                </defs>
                            </svg>

                            <script src="../player/index.js"></script>




                            <!-- Tabs navs -->
                            <ul class="nav nav-tabs mb-3" id="ex1" role="tablist"
                                style="display:flex; flex-direction:row;">
                                <li class="nav-item" role="presentation">
                                    <a class="nav-link active" id="ex1-tab-1" data-mdb-toggle="tab" href="#ex1-tabs-1"
                                        role="tab" aria-controls="ex1-tabs-1" aria-selected="true">Overview</a>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <a class="nav-link" id="ex1-tab-2" data-mdb-toggle="tab" href="#ex1-tabs-2"
                                        role="tab" aria-controls="ex1-tabs-2" aria-selected="false">Material</a>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <a class="nav-link" id="ex1-tab-3" data-mdb-toggle="tab" href="#ex1-tabs-3"
                                        role="tab" aria-controls="ex1-tabs-3" aria-selected="false">Reviews</a>
                                </li>
                            </ul>
                            <!-- Tabs navs -->

                            <!-- Tabs content -->
                            <div class="tab-content" id="ex1-content" style="">
                                <div class="tab-pane fade show active" id="ex1-tabs-1" role="tabpanel"
                                    aria-labelledby="ex1-tab-1">
                                    Tab 1 content
                                </div>
                                <div class="tab-pane fade" id="ex1-tabs-2" role="tabpanel" aria-labelledby="ex1-tab-2">
                                    <center class="mt-4">
                                        <h1 style="color: #16C304">WorldsQNA</h1>
                                        <h3 class="mb-4">Embedding the PDF file Using Object Tag</h3>
                                        <object
                                            data="https://media.geeksforgeeks.org/wp-content/cdn-uploads/20210101201653/PDF.pdf"
                                            width="800" height="500">
                                        </object>
                                    </center>
                                </div>
                                <div class="tab-pane fade" id="ex1-tabs-3" role="tabpanel" aria-labelledby="ex1-tab-3">
                                    Tab 3 content
                                </div>
                            </div>
                            <!-- Tabs content -->






                        </div>



                        <div class="content-right">
                            <div class="text-new">
                                <h1>Course Content</h1>

                                <hr>
                            </div>
                            <?php 

$base_url = $_SESSION['base_url'];
$url_fetch = "get-section";
$url = $base_url.$url_fetch;
$fields = array("course_id"=>$_GET['course_id']);

$data = api_call_auth("POST", $url, $fields, $_SESSION['token']);
$array_length = count($data);
$i=-1;

foreach ($data['Data'] as $key => $value) {
    $i++;
    $sections = $data['Data'][$i];
    // print_r( $sections);
    $section_id = $sections['id'];
    $section_no = $sections['section_no'];
    $section_title = $sections['section_title'];
 



?>

                            <div style="border:1px solid silver; padding:20px 30px;background-color:#03f6401c;">
                                <button style="background:none; border:none; "
                                    onclick="form_drop<?php echo $section_id?>()">
                                    <div class="text-new" style="display:flex;justify-content:space-between;">
                                        <h1>Section:<?php echo $section_no?> <?php echo $section_title?></h1>
                                        <i style="" class="fa-solid fa-caret-down mt-2 ms-5"></i>
                                    </div>
                                </button>



                                <div id="section<?php echo $section_id?>" class="hide-0 m">
                                <?php 
                                $base_url = $_SESSION['base_url'];
                                $url_fetch = "get-course-lectures-by-course-id-and-section-id";
                                $url = $base_url.$url_fetch;
                                $fields = array("course_id"=>$_GET['course_id'],"section_id"=>$section_id);
                                
                                $lecture = api_call_auth("POST", $url, $fields, $_SESSION['token']);
                                $array_length = count($lecture);
                                $x=-1;
                                // error_reporting(0);
                                
                                foreach ($lecture['Data'] as $key => $value) {
                                    $x++;
                                    $lectures = $lecture['Data'][$x];
                                    // print_r( $sections);
                                    $lecture_id = $lectures['id'];
                                    $lecture_no = $lectures['lecture_number'];
                                    $lecture_name = $lectures['lecture_name'];
                                    $lecture_video = $lectures['lecture_video'];
                                    $path = "http://localhost:8000/storage/".$lecture_video;
                                    require_once('getid3/getid3.php');
        $getID3 = new getID3();
        $filename="../player/video.mp4";
        $fileinfo = $getID3->analyze($filename);

        $width=$fileinfo['video']['resolution_x'];
        $height=$fileinfo['video']['resolution_y'];

        // echo $fileinfo['video']['resolution_x']. 'x'. $fileinfo['video']['resolution_y'];
        // echo '<pre>';print_r($fileinfo);echo '</pre>';
        
                                
                                ?>
                                    <h4 style="font-size:18px; font-weight:700; " class="mb-2"><a href=""><?php echo $lecture_name?></a> </h4>
                                    <small> <i class="fa-solid fa-play"></i> <?php echo $fileinfo['playtime_string']; ?></small>
                                    
                                    
                                    <?php }?>

                                    <?php
        
?>

                                </div>
                                <script>
                                function form_drop<?php echo $section_id?>() {
                                    var new1 = document.getElementById('section<?php echo $section_id?>');
                                    if (new1.classList.contains('show-0')) {
                                        new1.classList.remove("show-0");
                                        new1.classList.add("hide-0");

                                    } else {
                                        new1.classList.remove("hide-0");
                                        new1.classList.add("show-0");

                                    }

                                    // console.log(new1);
                                }
                                </script>

                            </div>
                            <?php } ?>
                            



                        </div>

                    </div>




                </div>


    </section>



    <?php

include('backtotop.php');

include('footer.php');


?>