<?php
session_start();
$name = "";
if(isset($_SESSION['username'])){
    $name = $_SESSION['username'];
} ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Responsive Kindergarten Website</title>
    <!-- font awesome cdn link  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <!-- lightgallery css cdn link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/lightgallery-js/1.4.0/css/lightgallery.min.css">
    <!-- custom css file link  -->
    <link rel="stylesheet" href="style.css">
</head>
<body>

    <!-- header section starts -->

    <header class="header">

        <a href="#" class="logo"> <i class="fas fa-school"></i> StoryVerse</a>

        <nav class="navbar">
            <a href="#home">home</a>
            <a href="#about">about</a>
            <a href="#education">Kids Stories</a>
            <a href="#games">Games</a>
            <a href="#gallery">Compose</a>
            <a href="#contact">contact</a>
        </nav>

        <div class="icons">
            <?php
            if($name == ""){ ?>
            <a href="login.php" class="nav-link px-lg-3 py-3 py-lg-4"><div class="fas fa-user" id="login-b"></div></a>
            <?php } else { ?>
                <div class="fas fa-user" id="login-b"><?php echo "   ".$name; ?></div>
            <a href="logout.php" class="nav-link px-lg-3 py-3 py-lg-4"><div class="fas fa-sign-out-alt" id="logout-b"></div></a>
            <?php } ?>
            
            <!--
            <a class="nav-link px-lg-3 py-3 py-lg-4" href="logout.php"><div class="fas fa-sign-out-alt" id="logout-b"></div></a> -->

        </div>

        <form action="" class="login-form">
            <h3>login now</h3>
            <input type="email" placeholder="your email" class="box">
            <input type="password" placeholder="your password" class="box">
            <p>forget your password <a href="#">click here</a> </p>
            <input type="submit" value="login now" class="btn">
        </form>

    </header>

    <!-- header section ends -->

    <!-- home section starts -->

    <section class="home" id="home">

        <div class="content">
            <h3>welcome to our <span>StoryVerse</span></h3>
            <p>Embark on a Journey of Wonder and Adventure: Explore the Boundless Worlds of StoryVerse!</p>
            <!-- <a href="#" class="btn">learn more</a> -->
        </div>

        <div class="image">
            <img src="images/home.png" alt="">
        </div>

        <div class="custom-shape-divider-bottom-1684324473">
            <svg data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1200 120" preserveAspectRatio="none">
                <path d="M985.66,92.83C906.67,72,823.78,31,743.84,14.19c-82.26-17.34-168.06-16.33-250.45.39-57.84,11.73-114,31.07-172,41.86A600.21,600.21,0,0,1,0,27.35V120H1200V95.8C1132.19,118.92,1055.71,111.31,985.66,92.83Z" class="shape-fill"></path>
            </svg>
        </div>

    </section>

    <!-- home section ends -->

    <!-- about us section starts -->

    <section class="about" id="about">

        <h1 class="heading"> <span>about</span> us</h1>

        <div class="row">

            <div class="image">
                <img src="images/about us.png" alt="">
            </div>

            <div class="content">
                <h3>Exploring, Growing, And Thriving Together</h3>
                <p align="justify">Welcome to StoryVerse, where enchanting worlds and thrilling adventures await! Our mission is simple: to captivate young hearts and minds with an exciting array of interactive games and captivating stories.At StoryVerse, we understand the importance of sparking creativity and curiosity in children. That's why we've curated a diverse range of entertainment options, including engaging audio, mesmerizing video, and delightful text stories, suitable for kids of all ages.</p>
                <p align="justify">Every click on StoryVerse is a gateway to endless fun and discovery. Whether your child loves solving puzzles, listening to exciting tales, or watching animated adventures, there's something here for everyone.Join us at StoryVerse, where the magic of storytelling comes to life, and unforgettable memories are made!</p>
                <!-- <a href="#" class="btn">read more</a> -->
            </div>

        </div>

    </section>

    <!-- about us section ends -->

    <!-- education section start -->

    <section class="education" id="education">

        <h1 class="heading">Kids <span> Stories</span></h1>

        <div class="box-container">

            <div class="box">
                <h3>Audio & music Stories</h3>
                <p>Listen to seamless audio and music content.</p>
                <a href="audio.php"><img src="images/education1.png" alt=""></a>
            </div>

            <div class="box">
                <h3>Video audio Stories</h3>
                <p>Enjoy the stories visually with your child.</p>
                <a href="video.php"><img src="images/captured_4.png" alt=""></a>
            </div>

            <div class="box">
                <h3>Read Stories</h3>
                <p>Improve your child's vocabulary by reading interesting stories.</p>
                <a href="stories.php"><img src="images/education3.png" alt=""></a>
            </div>

        </div>

    </section>


    <!-- education section ends -->

    <!-- teacher section starts 

    <section class="teacher" id="teacher">

        <h1 class="heading">our <span> teacher</span></h1>

        <div class="box-container">

            <div class="box">
                <img src="images/teacher1.png" alt="">
                <h3>john wright</h3>
                <p>instructor</p>
                <div class="share">
                    <i class="fab fa-facebook-f"></i>
                    <i class="fab fa-twitter"></i>
                    <i class="fab fa-instagram"></i>
                </div>
            </div>

            <div class="box">
                <img src="images/teacher2.png" alt="">
                <h3>john wright</h3>
                <p>instructor</p>
                <div class="share">
                    <i class="fab fa-facebook-f"></i>
                    <i class="fab fa-twitter"></i>
                    <i class="fab fa-instagram"></i>
                </div>
            </div>

            <div class="box">
                <img src="images/teacher3.png" alt="">
                <h3>john wright</h3>
                <p>instructor</p>
                <div class="share">
                    <i class="fab fa-facebook-f"></i>
                    <i class="fab fa-twitter"></i>
                    <i class="fab fa-instagram"></i>
                </div>
            </div>

        </div>

    </section>

   teacher section ends -->

    <!-- activities section starts -->


    <section id="games" class="activities">

        <h1 class="heading">Kids <span>Games</span></h1>

        <div class="box-container">

            <div class="box">
                <a href="Games/game1.html"><img src="Games/whack_a_mole.png" alt=""></a>
                <h3>Whack a Mole</h3>
            </div>

            <div class="box">
                <a href="Games/game2.html"><img src="Games/tic_tac_toe.png" alt=""></a>
                <h3>Tic Tac Toe</h3>
            </div>

            <div class="box">
                <a href="Games/game3.html"><img src="images/activities6.png" alt=""></a>
                <h3>Car Racing</h3>
            </div>

            <div class="box">
                <a href="Games/game4.html"><img src="images/activities7.png" alt=""></a>
                <h3>Drawing Craft</h3>
            </div>

        </div>

    </section>

    <!-- activities section ends -->

    <!-- gallery section starts -->

    <section class="gallery" id="gallery">

        <h1 class="heading">our <span>gallery</span></h1>

        <div class="gallery-container">

            <a href="images/gallery-1.jpg" class="box">
                <img src="images/gallery-1.jpg" alt="">
                <div class="icon"> <i class="fas fa-plus"></i></div>
            </a>

            <a href="images/gallery-2.jpg" class="box">
                <img src="images/gallery-2.jpg" alt="">
                <div class="icon"> <i class="fas fa-plus"></i></div>
            </a>

            <a href="images/gallery-3.jpg" class="box">
                <img src="images/gallery-3.jpg" alt="">
                <div class="icon"> <i class="fas fa-plus"></i></div>
            </a>

            <a href="images/gallery-4.jpg" class="box">
                <img src="images/gallery-4.jpg" alt="">
                <div class="icon"> <i class="fas fa-plus"></i></div>
            </a>

            <a href="images/gallery-5.jpg" class="box">
                <img src="images/gallery-5.jpg" alt="">
                <div class="icon"> <i class="fas fa-plus"></i></div>
            </a>

            <a href="images/gallery-6.jpg" class="box">
                <img src="images/gallery-6.jpg" alt="">
                <div class="icon"> <i class="fas fa-plus"></i></div>
            </a>

        </div>

    </section>

    <!-- gallery section ends -->

    <!-- contact section starts -->

    <section class="contact" id="contact">

        <h1 class="heading"> <span>contact</span> us</h1>

        <div class="icons-container">

            <div class="icons">
                <i class="fas fa-envelope"></i>
                <h3>email</h3>
                <p>mayank.kulkarni29@gmail.com</p>
                <p>manasi.pandit7@gmail.com</p>
            </div>

            <div class="icons">
                <i class="fas fa-phone"></i>
                <h3>phone number</h3>
                <p>+123-456-7890</p>
                <p>+123-456-7890</p>
            </div>

        </div>

        <div class="row">

            <div class="image">
                <img src="images/contact.gif" alt="">
            </div>

            <form action="https://formsubmit.co/91833dea505fe01deefa655aedd5af5e" method="POST" >
                <h3>get in touch</h3>
                <div class="inputBox">
                    <input type="text" name="Name" placeholder="your name">
                    <input type="email" name="Email" placeholder="your email">
                </div>
                <div class="inputBox">
                    <input type="number" name="Contact_Number" placeholder="your number">
                    <input type="text" name="Subject" placeholder="your subject">
                </div>
                <textarea placeholder="your message" name="Message" cols="30" rows="10"></textarea>
                <input type="hidden" name="_next" value="http://localhost/StoryVerse/">
                <input type="submit" value="send message" class="btn">
            </form>

        </div>

    </section>

    <!-- contact section ends -->

    <!-- footer section starts -->

    <section class="footer">

        <div class="box-container">

            <div class="box">
                <h3> <i class="fas fa-school"></i> Storyverse </h3>
                <p>Explore The Boundless Worlds Of StoryVerse!</p>
            </div>

            

            <div class="box">
                <h3>category</h3>
                <a href="#"> <i class="fas fa-caret-right"></i> about us</a>
                <a href="#"> <i class="fas fa-caret-right"></i> latest updates</a>
                <a href="#"> <i class="fas fa-caret-right"></i> events</a>
                <a href="#"> <i class="fas fa-caret-right"></i> news</a>
                <a href="#"> <i class="fas fa-caret-right"></i> contact us</a>
            </div>

            <div class="box">
                <h3>extra links</h3>
                <a href="#"> <i class="fas fa-caret-right"></i> privacy policy</a>
                <a href="#"> <i class="fas fa-caret-right"></i> terms of use</a>
                <a href="#"> <i class="fas fa-caret-right"></i> site map</a>
                <a href="#"> <i class="fas fa-caret-right"></i> FAQs</a>
                <a href="#"> <i class="fas fa-caret-right"></i> accessibility statement</a>
            </div>

        </div>

        <div class="credit"> &copy; copyright @ 2024 by <span>AI Aces</span></div>

    </section>















    <!-- footer section ends -->

























    <!-- lightgallery cdn js link -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/lightgallery-js/1.4.0/js/lightgallery.min.js"></script>
    <!-- custom js file link -->
    <script src="script.js"></script>

    <script>
        lightGallery(document.querySelector('.gallery .gallery-container'));
    </script>

</body>
</html>