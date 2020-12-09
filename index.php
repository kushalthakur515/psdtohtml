<?php
require_once 'connection/db.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Oxford College Hubei</title>
    <link href="css/index.css?v=<?php echo time()?>" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous">
    </script>
    <script>
            function doReload(value)    
            {
                document.location = 'index.php?news_type=' + value;
            }        
    </script>
</head>

<body>
    <!-- Start of sub heading-->
    <section>
        <div class="container py-3 sub-heading">
            <span class="contact-us"><img src="images/telephone.svg"><span class="line">--</span>4598098778</span>
            <span class="contact-us"><img src="images/email.svg"><span class="line">--</span>email@email.com</span>
            <a href="#" id="pay-btn">Pay Your Fees<i class="fa fa-long-arrow-right" aria-hidden="true"></i></a>
            <div id="contact-icons">
                <a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></i></a>
                <a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></i></a>
            </div>
        </div>
    </section>
    <!-- End of sub heading-->

    <!-- Start of Main Header-->
    <header>
        <div class="container-fluid nav-bar py-1  navbar-dark">
            <nav class="navbar navbar-expand-lg top-navbar">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse h-nav" id="navbarSupportedContent">
                    <ul class="navbar-nav navbar-container">
                        <li class="navbar-nav"> <a class="nav-link" href="#">Home</a></li>
                        <li class="navbar-nav"> <a class="nav-link" href="#">About</a></li>
                        <li class="navbar-nav"> <a class="nav-link" href="#">Course Offered</a></li>
                        <li class="navbar-nav"> <a class="nav-link" href="#">Placements</a></li>
                        <li class="navbar-nav"> <a class="nav-link" href="#">Admissions</a></li>
                        <li class="navbar-nav"> <a class="nav-link" href="#">Achivements</a></li>
                        <li class="navbar-nav"> <a class="nav-link" href="#">Club</a></li>
                        <li class="navbar-nav"> <a class="nav-link" href="#">Events</a></li>
                    </ul>
                </div>
            </nav>
        </div>
    </header>
    <!-- End of Mian Header-->

    <!--Start of banner-->
    <div class="container-fluid banner">
        <img src="images/banner.jpg" alt="banner" class="img-fluid banner-img">
        <div class="banner-text">
            <span class="text-center" id="first">VISHWASHANTI FOUNDATION</span><br>
            <span class="text-center" id="second">OXFORD <br>COLLEGE</h2><br>
                <span class="text-center" id="third">HUBLI</p>
        </div>
    </div>
    <!--End of banner-->

    <!--Start of daily tally-->
    <div class="container tally-conatiner py-4">
        <div class="tally-first">
            <span class="head">Our Tally</span><img src="images/next.svg">
        </div>
        <div class="tally">
            <span class="t-main">53</span>
            <span class="t-sub">Faculty</span>
        </div>
        <div class="tally">
            <span class="t-main">25</span>
            <span class="t-sub">Awards</span>
        </div>
        <div class="tally">
            <span class="t-main">34</span>
            <span class="t-sub">Courses</span>
        </div>
        <div class="tally" style="border: none;">
            <span class="t-main">1.5</span>
            <span class="t-sub">Lakh Placed</span>
        </div>
    </div>
    <!--End of daily tally-->

    <!--Start of Announcent ment-->
    <section>

        <?php 
            $announcement = mysqli_query($db, "SELECT * FROM `announcement` ORDER BY `a_date` DESC LIMIT 4");
            if(isset($_GET['see']))
            {
                $announcement = mysqli_query($db, "SELECT * FROM `announcement` ORDER BY `a_date` DESC");
            }
            else if(isset($_GET['less']))
            {
                $announcement = mysqli_query($db, "SELECT * FROM `announcement` ORDER BY `a_date` DESC LIMIT 4");
            }
        ?>
        <div class="announ container-fluid">
            <h4>OUR ANNOUNCEMENT</h3>
                <div class="container">
                    <div class="row my-4 d-flex flex-wrap" id="announ-main">
                        <?php if (mysqli_num_rows($announcement)>0) : ?>
                            <?php while ($getAnnounce = mysqli_fetch_assoc($announcement)) : ?>
                                <div class="col-md-3 col-sm-6">
                                    <div class="p-1 my-2 card-announce">
                                        <div class="date"> <?php echo $getAnnounce['a_date'] ?></div>
                                        <p class="card-details"><?php echo $getAnnounce['a_msg'] ?></p>
                                    </div>
                                </div>
                            <?php endwhile; ?>
                    </div>
                    <?php
                            $announcementa = mysqli_query($db, "SELECT * FROM `announcement` ORDER BY `a_date` DESC");
                            if (mysqli_num_rows($announcementa) > 4) :
                            ?>
                                <?php if(!isset($_GET['see'])):?>
                                    <div style="text-align:center;">
                                        <a class="text-white" href="index.php?see=more" id="see_more">See More</a>
                                    </div>
                                <?php else:?>
                                    <div style="text-align:center;">
                                        <a class="text-white" href="index.php?less=less" id="see_more">See Less</a>
                                    </div>
                                <?php endif;?>
                            <?php endif; ?>

                        <?php else : ?>
                            <div style="margin:0 auto">
                                <h4 style="font-size: 2rem;">No Announcement Yet!</h4>
                            </div>
                        <?php endif; ?>
                </div>
        </div>
    </section>
    <!--End of Announcent ment-->

    <!--Start of Course Offered-->
    <section>
        <div class="course container">
            <h4 class="text-center" style="text-transform: uppercase;">Course Offered</h4>
            <div class="row course-col">
                <div class="col-md-4 mt-5 c-name w-100">
                    <img src="images/arts design.jfif" alt="art" class="img-fluid">
                    <span class="c-heading">Arts</span>
                    <div class="c-card">
                        <div class="c-card-img">
                            <img src="images/computer.png">
                        </div>
                        <div class="c-card-content">
                            <h5 class="card-title">Card Title Here</h5>
                            <p class="card-text">Some quick example text to build on the card title
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 mt-5 c-name">
                    <img src="images/science.jpg" alt="art" class="img-fluid">
                    <span class="c-heading">Science</span>
                    <div class="c-card">
                        <div class="c-card-img">
                            <img src="images/computer.png">
                        </div>
                        <div class="c-card-content">
                            <h5 class="card-title">Card Title Here</h5>
                            <p class="card-text">Some quick example text to build on the card title
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 mt-5 c-name">
                    <img src="images/commerce.png" alt="art" class="img-fluid">
                    <span class="c-heading">Commerce</span>
                    <div class="c-card">
                        <div class="c-card-img">
                            <img src="images/computer.png">
                        </div>
                        <div class="c-card-content">
                            <h5 class="card-title">Card Title Here</h5>
                            <p class="card-text">Some quick example text to build on the card title
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 mt-5 c-name">
                    <img src="images/biology.jpg" alt="art" class="img-fluid">
                    <span class="c-heading">Biology</span>
                    <div class="c-card">
                        <div class="c-card-img">
                            <img src="images/computer.png">
                        </div>
                        <div class="c-card-content">
                            <h5 class="card-title">Card Title Here</h5>
                            <p class="card-text">Some quick example text to build on the card title
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 mt-5 c-name">
                    <img src="images/law.jpg" alt="art" class="img-fluid">
                    <span class="c-heading">Law</span>
                    <div class="c-card">
                        <div class="c-card-img">
                            <img src="images/computer.png">
                        </div>
                        <div class="c-card-content">
                            <h5 class="card-title">Card Title Here</h5>
                            <p class="card-text">Some quick example text to build on the card title.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 mt-5 c-name">
                    <img src="images/economics.jpeg" alt="art" class="img-fluid">
                    <span class="c-heading">Economics</span>
                    <div class="c-card">
                        <div class="c-card-img">
                            <img src="images/computer.png">
                        </div>
                        <div class="c-card-content">
                            <h5 class="card-title">Card Title Here</h5>
                            <p class="card-text">Some quick example text to build on the card title
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--End of Course Offered-->

    <!--Start of About Section-->
    <section>
        <div class="container about">
            <div class="row a-r">
                <div class="col-md-5">
                    <img src="images/college students.jpg" alt="college stu" class="w-100 img-fluid a-img">
                </div>
                <div class="col-md-7 col-sm-12 about-details">
                    <span>About</span>
                    <h2>OXFORD <br>COLLEGE</h2>
                    <p>Contrary to popular belief, Lorem Ipsum is not simply random text.
                        It has roots in a piece of classical Latin literature from 45 BC,
                        making it over 2000 years old. Richard McClintock, a Latin professor at
                        Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur,
                        from a Lorem Ipsum
                        passage, and going through the cites of the word in classical literature, discovered the
                        undoubtable source.
                    </p>
                    <p>
                        Contrary to popular belief, Lorem Ipsum is not simply random text.
                        It has roots in a piece of classical Latin literature from 45 BC,
                        making it over 2000 years old. Richard McClintock, a Latin professor at
                        Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur,
                        from a Lorem Ipsum
                        passage, and going through the cites of the word in classical literature, discovered the
                        undoubtable source.
                    </p>
                    <a href="#">Know More <i class="fa fa-long-arrow-right" aria-hidden="true" style="margin-left:1rem;"></i></a>
                </div>
            </div>
        </div>
    </section>
    <!--End of About Section-->
    <!--Start of News section-->
    <section>
        <div class="container-fluid news">
            <hr style="margin: 30px 30px!important;">
            <div class="container">
                <div class="row">
                    <div class="col-md-7">
                        <div class="news-heading">
                            <h4>Latest News</h4>
                            <form method="GET" action="index.php">
                                <select name="n_type" onchange="doReload(this.value);">
                                    <option selected>Select Type</option>
                                    <option value="Culture">Culture</option>
                                    <option value="Education">Education</option>
                                    <option value="Miscellaneous">Miscellaneous</option>
                                </select>
                            </form>
                        </div>
                            <!--Start of php section-->
                            <?php 
                                
                                if(isset($_GET['news_type']))
                                {
                                    $type_n=$_GET['news_type'];
                                    $newsq=mysqli_query($db,"SELECT * FROM `college_news` WHERE `type`='$type_n' ORDER BY `date` DESC");
                                }
                                else
                                {
                                    $newsq=mysqli_query($db,"SELECT * FROM `college_news` WHERE `type`='Culture' ORDER BY `date` DESC");
                                }
                                if(mysqli_num_rows($newsq)>0):
                            ?>
                            <?php while($news=mysqli_fetch_assoc($newsq)):?>
                                <div class="news-card">
                                    <div class="news-card-i">
                                        <img src="images/news.png" alt="news logo">
                                        <span><?php echo $news['type']?></span>
                                    </div>
                                    <div class="news-card-c">
                                        <span><?php echo $news['date']?></span>
                                        <h3><?php echo $news['title']?></h3>
                                        <p><?php echo $news['msg']?></p>
                                        <a href="#">Know Here<i class="fa fa-long-arrow-right" aria-hidden="true" style="margin-left:1rem;"></i></a>
                                    </div>
                                </div>
                                <?php endwhile;?>
                            <?php endif;?>
                    </div>
                    <div class="col-md-5 achive-i pl-md-5 pl-sm-0">
                        <h4>Achivements</h4>
                        <div class="achive mt-md-4 md-sm-0">
                            <img src="images/achivements.jpg" src="achivement image">
                            <span class="caption">Win Prize in competetion</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </section>
    <!--End of News Section-->
    <!--Start of Admission Section-->
    <section>
        <div class="admission mt-md-5 mt-sm-2">
            <div class="container">
                <div class="row py-5">
                    <div class="col-md-6 col-sm-12 admission-m">
                        <span>Get Your</span>
                        <h2>Admission</h2>
                        <form class="form-admission" method="GET" action="admissionfxn.php">
                            <div class="form-group">
                                <input type="text" name="name" placeholder="Name" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <input type="email" name="email" placeholder="Enter Email" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <input type="number" name="phone" placeholder="Phone Number" class="form-control" required>
                            </div>
                            <div class="btn"><input type="submit" value="Submit" required><i class="fa fa-long-arrow-right" aria-hidden="true" style="margin-left:1rem;"></i></div>
                        </form>
                        <?php if(isset($_GET['notnull'])):?>
                            <div class="alert alert-danger mt-2" role="alert">
                                Enter details in all fields!!
                            </div>   
                        <?php endif;?>
                        <?php if(isset($_GET['pass'])):?>
                            <div class="alert alert-success mt-2" role="alert">
                                Your data is saved successfully!!
                            </div>
                        <?php endif;?>
                        <?php if(isset($_GET['fail'])):?>
                            <div class="alert alert-danger mt-2" role="alert">
                                Your details are already registered!!
                            </div> 
                        <?php endif;?>
                    </div>
                    <div class="col-md-6 a-img " style="box-sizing: border-box;">
                        <img src="images/science-lab.jpg" alt="science lab" class="img-fluid mt-5 ml-5">
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--End of Admission Section-->
    <!--Start of Events Section-->
    <section>
        <div class="container">
            <h2 class="text-center mt-4 font-weight-bold" style="text-transform: uppercase;">Our Events</h2>
            <div class="d-flex justify-content-between events-option">
                <div class="e-name">
                    Cultural Event
                </div>
                <div class="e-name">
                    Educational Event
                </div>
                <div class="e-name">
                    Cermonial Event
                </div>
                <div class="e-name">
                    Campus Event
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 events mt-sm-1">
                    <div class="my-5">
                        <img src="images/science-lab.jpg" alt="images" class="img-fluid">
                        <div class="e-details">
                            <span>21/12/2020</span>
                            <h4>Events come here</h4>
                            <a href="#">Know more<i class="fa fa-long-arrow-right" aria-hidden="true" style="margin-left:1rem;"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 events mt-sm-1">
                    <div class="my-5">
                        <img src="images/science-lab.jpg" alt="images" class="img-fluid">
                        <div class="e-details">
                            <span>21/12/2020</span>
                            <h4>Events come here</h4>
                            <a href="#">Know more<i class="fa fa-long-arrow-right" aria-hidden="true" style="margin-left:1rem;"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 events mt-sm-1">
                    <div class="my-5">
                        <img src="images/science-lab.jpg" alt="images" class="img-fluid">
                        <div class="e-details">
                            <span>21/12/2020</span>
                            <h4>Events come here</h4>
                            <a href="#">Know more<i class="fa fa-long-arrow-right" aria-hidden="true" style="margin-left:1rem;"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 events mt-sm-1">
                    <div class="my-5">
                        <img src="images/science-lab.jpg" alt="images" class="img-fluid">
                        <div class="e-details">
                            <span>21/12/2020</span>
                            <h4>Events come here</h4>
                            <a href="#">Know more<i class="fa fa-long-arrow-right" aria-hidden="true" style="margin-left:1rem;"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </section>
    <!--End of Events Section-->
    <!--Start of Partners Section-->
    <div class="container">
        <h3 class="mt-md-5 mt-sm-3 text-center pt-5 font-weight-bold">Our Partners</h3>
        <div class="partners mt-4">
            <img src="images/tata.png" alt="image" class="img-fluid">
            <img src="images/cognizant.png" class="img-fluid">
            <img src="images/a.png" class="img-fluid">
            <img src="images/polygon.png" class="img-fluid">
            <img src="images/delottie.png" class="img-fluid">
        </div>
    </div>
    <!--End of Partners Section-->
    <!--Start of footer section-->
    <footer>
        <div class="footer pt-5 pb-3">
            <div class="container d-flex footer-c">
                <div class="f-logo mt-4">
                    <img src="images/logo.png" style="width: 150px; height: 150px;">
                </div>
                <div class="f-links">
                    <span>Our Links</span>
                    <div class="f-first d-flex justify-content-between f-links-lists">
                        <ul class="f-first mt-4 mt-md-1">
                            <li><a href="#">Home</a></li>
                            <li><a href="#">About Us</a></li>
                            <li><a href="#">Courses</a></li>
                            <li><a href="#">Placements</a></li>
                        </ul>
                        <ul class="f-second mt-4 ml-5 mt-md-1 ml-md-5 ml-sm-1">
                            <li><a href="#">Admissions</a></li>
                            <li><a href="#">Achivements</a></li>
                            <li><a href="#">Club</a></li>
                            <li><a href="#">Events</a></li>
                        </ul>
                    </div>
                </div>
                <div class="f-subscribe">
                    <span>Subscribe To NewsLetter</span>
                    <div class="f-input mt-4">
                        <input type="text" placeholder="Enter Email Address">
                        <span>
                            Go
                        </span>
                    </div>
                </div>

            </div>
            <div class="container">
                <hr style="background-color: gray;">
            </div>
            <div class="text-center text-white py-3">&copy;Oxford Institution. All right reserved</div>
        </div>
    </footer>
    <!--End of Footer Section-->
    <script src="js/index.js" type="text/js"></script>
</body>

</html>