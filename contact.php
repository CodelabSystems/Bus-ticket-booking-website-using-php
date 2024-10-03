<?php
include './config.php';
$admin = new Admin();

if (isset($_SESSION['c_id'])) {
    $cid = $_SESSION['c_id'];
    $getCustomer = $admin->ret("SELECT * FROM `customer` where `c_id`='$cid'");
    $customer = $getCustomer->fetch(PDO::FETCH_ASSOC);
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>TMS | Bus Ticket Booking</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Lato:ital,wght@0,400;0,700;0,900;1,400;1,700;1,900&family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap"
        rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="lib/animate/animate.min.css" rel="stylesheet">
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">


    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="css/style.css" rel="stylesheet">
</head>

<body>

    <!-- Spinner Start -->
    <div id="spinner"
        class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
        <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
            <span class="sr-only">Loading...</span>
        </div>
    </div>
    <!-- Spinner End -->


    <!-- Navbar & Hero Start -->
    <?php include './includes/header.php'; ?>
    <!-- Navbar & Hero End -->

    <!-- Header Start -->
    <div class="container-fluid bg-breadcrumb">
        <div class="container text-center py-5" style="max-width: 900px;">
            <h4 class="text-white display-4 mb-4 wow fadeInDown" data-wow-delay="0.1s">Contact Us</h4>
            <ol class="breadcrumb d-flex justify-content-center mb-0 wow fadeInDown" data-wow-delay="0.3s">
                <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                <li class="breadcrumb-item active text-primary">Contact</li>
            </ol>
        </div>
    </div>
    <!-- Header End -->

    <!-- Contact Start -->
    <div class="container-fluid contact py-5">
        <div class="container py-5">
            <!-- <div class="text-center mx-auto pb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 800px;">
                <h1 class="display-5 text-capitalize text-primary mb-3">Contact Us</h1>
                <p class="mb-0">Feel free to reach out to us. Lorem ipsum dolor, sit amet consectetur adipisicing elit.
                    Aliquam, cumque?</p>
            </div> -->
            <div class="row g-5">

                <div class="col-xl-12 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="bg-secondary p-5 rounded">
                        <h4 class="text-primary mb-4">Submit your feedback or complaints in this form</h4>
                        <form action="./Controllers/feedback.php" method="post">
                            <div class="row g-4">
                                <div class="col-lg-12 col-xl-4">
                                    <div class="form-floating">
                                        <input type="text" class="form-control" id="name" name="name"
                                            placeholder="Your Name" required>
                                        <label for="name">Your Name</label>
                                    </div>
                                </div>
                                <div class="col-lg-12 col-xl-4">
                                    <div class="form-floating">
                                        <input required type="email" class="form-control" id="email" name="email"
                                            placeholder="Your Email">
                                        <label for="email">Your Email</label>
                                    </div>
                                </div>
                                <div class="col-lg-12 col-xl-4">
                                    <div class="form-floating">
                                        <input required type="phone" class="form-control" id="phone" name="phone"
                                            placeholder="Phone">
                                        <label for="phone">Your Phone</label>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-floating">
                                        <input required type="text" class="form-control" id="subject" name="subject"
                                            placeholder="Subject">
                                        <label for="subject">Subject</label>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-floating">
                                        <textarea required class="form-control" placeholder="Leave a message here"
                                            id="message" name="message" style="height: 160px"></textarea>
                                        <label for="message">Message</label>
                                    </div>

                                </div>
                                <div class="col-12">
                                    <button name="submitFeedback" type="submit" class="btn btn-light w-100 py-3">Send
                                        Message</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

                <!-- <div class="col-12 col-xl-5 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="p-5 bg-light rounded">
                        <div class="bg-white rounded p-4 mb-4">
                            <h4 class="mb-3">Our Branch 01</h4>
                            <div class="d-flex align-items-center flex-shrink-0 mb-3">
                                <p class="mb-0 text-dark me-2">Address:</p><i
                                    class="fas fa-map-marker-alt text-primary me-2"></i>
                                <p class="mb-0">123 Street New York.USA</p>
                            </div>
                            <div class="d-flex align-items-center">
                                <p class="mb-0 text-dark me-2">Telephone:</p><i
                                    class="fa fa-phone-alt text-primary me-2"></i>
                                <p class="mb-0">(+012) 3456 7890</p>
                            </div>
                        </div>
                        <div class="bg-white rounded p-4 mb-4">
                            <h4 class="mb-3">Our Branch 02</h4>
                            <div class="d-flex align-items-center mb-3">
                                <p class="mb-0 text-dark me-2">Address:</p><i
                                    class="fas fa-map-marker-alt text-primary me-2"></i>
                                <p class="mb-0">123 Street New York.USA</p>
                            </div>
                            <div class="d-flex align-items-center">
                                <p class="mb-0 text-dark me-2">Telephone:</p><i
                                    class="fa fa-phone-alt text-primary me-2"></i>
                                <p class="mb-0">(+012) 3456 7890</p>
                            </div>
                        </div>
                        <div class="bg-white rounded p-4 mb-0">
                            <h4 class="mb-3">Our Branch 03</h4>
                            <div class="d-flex align-items-center mb-3">
                                <p class="mb-0 text-dark me-2">Address:</p><i
                                    class="fas fa-map-marker-alt text-primary me-2"></i>
                                <p class="mb-0">123 Street New York.USA</p>
                            </div>
                            <div class="d-flex align-items-center">
                                <p class="mb-0 text-dark me-2">Telephone:</p><i
                                    class="fa fa-phone-alt text-primary me-2"></i>
                                <p class="mb-0">(+012) 3456 7890</p>
                            </div>
                        </div>
                    </div>
                </div> -->
                <div class="col-12">
                    <div class="rounded">
                        <iframe class="rounded w-100" style="height: 400px;"
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d127043.72793865163!2d74.82017032597194!3d12.92784847678264!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3ba35a4c37bf488f%3A0x827bbc7a74fcfe64!2sMangaluru%2C%20Karnataka%2C%20India!5e0!3m2!1sen!2sbd!4v1726729659068!5m2!1sen!2sbd"
                            loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <!-- Contact End -->

    <!-- Footer Start -->
    <?php include './includes/footer.php'; ?>
    <!-- Footer End -->


    <!-- Back to Top -->
    <a href="#" class="btn btn-secondary btn-lg-square rounded-circle back-to-top"><i class="fa fa-arrow-up"></i></a>


    <!-- JavaScript Libraries -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="lib/wow/wow.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/waypoints/waypoints.min.js"></script>
    <script src="lib/counterup/counterup.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>


    <!-- Template Javascript -->
    <script src="js/main.js"></script>
</body>

</html>