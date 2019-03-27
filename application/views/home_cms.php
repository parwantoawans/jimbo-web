<!DOCTYPE html>
<html>
  <head>
    <title>Content Management System</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap -->
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- styles -->
    <link href="css/styles.css" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>

    <div class="page-content">
        <div class="row">
            <div class="col-md-2">
                <div class="sidebar content-box" style="display: block;">
                    <p><a data-toggle="collapse" href="#collapseMaster" role="button" aria-expanded="true" aria-controls="collapseMaster"><i class="glyphicon glyphicon-plus"></i> Master Data</a></p>
                    <div class="collapse" id="collapseMaster">
                        <ul class="nav">
                            <!-- Main menu -->
                            <li><a href="welcome/tm_school"  target="content_list"><i class="glyphicon glyphicon-asterisk"></i> School</a></li>
                            <li><a href="welcome/tm_contact"  target="content_list"><i class="glyphicon glyphicon-asterisk"></i> Contact</a></li>
                            <li><a href="welcome/tm_about_us"  target="content_list"><i class="glyphicon glyphicon-asterisk"></i> About-Us</a></li>
                            <li><a href="welcome/tm_experience"  target="content_list"><i class="glyphicon glyphicon-asterisk"></i> Experience</a></li>
                            <li><a href="welcome/tp_school_year"  target="content_list"><i class="glyphicon glyphicon-asterisk"></i> School Year</a></li>
                            <li><a href="welcome/tm_subjects"  target="content_list"><i class="glyphicon glyphicon-asterisk"></i> Subject</a></li>
                            <li><a href="welcome/tm_type_nilai"  target="content_list"><i class="glyphicon glyphicon-asterisk"></i> Subject Value Type</a></li>
                            <li><a href="welcome/tm_teachers"  target="content_list"><i class="glyphicon glyphicon-asterisk"></i> Teacher</a></li>
                            <li><a href="welcome/students"  target="content_list"><i class="glyphicon glyphicon-asterisk"></i> Student</a></li>
                            <li><a href="welcome/tm_agama"  target="content_list"><i class="glyphicon glyphicon-asterisk"></i> Religion</a></li>
                            <li><a href="welcome/tm_articles_type"  target="content_list"><i class="glyphicon glyphicon-asterisk"></i> Article Type</a></li>
                            <li><a href="welcome/tm_class"  target="content_list"><i class="glyphicon glyphicon-asterisk"></i> Class</a></li>
                            <li><a href="welcome/tm_events_type"  target="content_list"><i class="glyphicon glyphicon-asterisk"></i> Eventy Type</a></li>
                            <li><a href="welcome/tm_classes_program"  target="content_list"><i class="glyphicon glyphicon-asterisk"></i> Class Program</a></li>
                            <li><a href="welcome/tm_extracuricullar"  target="content_list"><i class="glyphicon glyphicon-asterisk"></i> Extracuricullar</a></li>
                            <li><a href="welcome/tm_food_menu"  target="content_list"><i class="glyphicon glyphicon-asterisk"></i> Food Menu</a></li>
                            <li><a href="welcome/tm_parents"  target="content_list"><i class="glyphicon glyphicon-asterisk"></i> Parent</a></li>
                            <li><a href="welcome/tm_school_improvement"  target="content_list"><i class="glyphicon glyphicon-asterisk"></i> School Improvement</a></li>
                        </ul>
                    </div>
                    <p><a data-toggle="collapse" href="#collapseTransaction" role="button" aria-expanded="true" aria-controls="collapseMaster"><i class="glyphicon glyphicon-plus"></i> Transaction Data</a></p>
                    <div class="collapse" id="collapseTransaction">
                        <ul class="nav">
                            <!-- Main menu -->
                            <li><a href="welcome/tx_field_trip"  target="content_list"><i class="glyphicon glyphicon-asterisk"></i> Field Trip</a></li>
                            <li><a href="welcome/input_nilai"  target="content_list"><i class="glyphicon glyphicon-asterisk"></i> value of subjects</a></li>
                            <li><a href="welcome/input_makanan"  target="content_list"><i class="glyphicon glyphicon-asterisk"></i> Foods</a></li>
                            <li><a href="welcome/input_extracuricullar"  target="content_list"><i class="glyphicon glyphicon-asterisk"></i> Extracuricullars</a></li>
                            <li><a href="welcome/jadwal_mata_pelajaran"  target="content_list"><i class="glyphicon glyphicon-asterisk"></i> schedule of subjects</a></li>
                            <li><a href="welcome/input_kelas"  target="content_list"><i class="glyphicon glyphicon-asterisk"></i> Classes</a></li>
                            <li><a href="welcome/nilai_anak/1"  target="content_list"><i class="glyphicon glyphicon-asterisk"></i> the value of children's subjects</a></li>
                            <li><a href="welcome/input_article"  target="content_list"><i class="glyphicon glyphicon-asterisk"></i> Articles</a></li>
                            <li><a href="welcome/input_event"  target="content_list"><i class="glyphicon glyphicon-asterisk"></i> Events</a></li>
                            <li><a href="welcome/input_news"  target="content_list"><i class="glyphicon glyphicon-asterisk"></i> News</a></li>
                            <li><a href="welcome/tm_gallery"  target="content_list"><i class="glyphicon glyphicon-asterisk"></i> Image Gallery</a></li>
                            <li><a href="welcome/tp_testimoni_parents"  target="content_list"><i class="glyphicon glyphicon-asterisk"></i> Parent Testimoni</a></li>
                            <li><a href="welcome/tx_videos"  target="content_list"><i class="glyphicon glyphicon-asterisk"></i> Videos</a></li>
                            <li><a href="welcome/tm_other_service"  target="content_list"><i class="glyphicon glyphicon-asterisk"></i> Other Service</a></li>
                            <li><a href="welcome/tx_calendar"  target="content_list"><i class="glyphicon glyphicon-asterisk"></i> Calendar</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-md-10">
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="embed-responsive embed-responsive-1by1">
                            <iframe id="content_list" name="content_list" style="width: 100%;height: 80vh;position: relative;" src="" frameborder="0" allowfullscreen></iframe>
                        </div>
                    </div>
                </div>		  	
            </div>
		</div>
    </div>

    <footer>
         <div class="container">
         
            <div class="copy text-center">
               Copyright 2014 <a href='#'>Website</a>
            </div>
            
         </div>
      </footer>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://code.jquery.com/jquery.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="bootstrap/js/bootstrap.min.js"></script>
    <script src="js/custom.js"></script>
  </body>
</html>