<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    


    <!-- Sidebar Start -->
    <div class="sidebar pe-4 pb-3">
        <nav class="navbar bg-light navbar-light">
            <a href="index.html" class="navbar-brand mx-4 mb-3">
                <h3 class="text-primary"><i class="fa-solid fa-mountain-sun"></i>Desh-tour</h3>
                
            </a>
            <div class="d-flex align-items-center ms-4 mb-4">
               
                
            </div>
            <div class="navbar-nav w-100">
                <a href="dashboard.php" class="nav-item nav-link "><i class="fa fa-tachometer-alt me-2"></i>Dashboard</a>
                <div class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"><i class="fa-solid fa-torii-gate me-2"></i>Tour</a>
                    <div class="dropdown-menu bg-transparent border-0">
                        <a href="tour catagory.php" class="dropdown-item">Catagory</a>
                        <a href="pack.php" class="dropdown-item">Trending packages</a>
                        <!-- <a href="element.html" class="dropdown-item">Other Elements</a> -->
                    </div>
                </div>
                <a href="user.php" class="nav-item nav-link"><i class="fa-solid fa-user me-2"></i>Users</a>
                <a href="setting.php" class="nav-item nav-link"><i class="fa-solid fa-gear me-2"></i>site setting</a>
                <a href="packages.php" class="nav-item nav-link"><i class="fa-solid fa-mountain-sun me-2"></i>Tour_pakages</a>
                <a href="contact.php" class="nav-item nav-link"><i class="fa-solid fa-phone me-2"></i>Contactus</a>
                
                <a href="booking.php" class="nav-item nav-link"><i class="fa-solid fa-location-dot me-2"></i>Booking</a>
                <a href="carousal.php" class="nav-item nav-link"><i class="fa-solid fa-location-dot me-2"></i>Carousal</a>
                
                <!-- <a href="chart.html" class="nav-item nav-link"><i class="fa fa-chart-bar me-2"></i>Charts</a> -->
                <!-- <div class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"><i class="far fa-file-alt me-2"></i>Pages</a>
                    <div class="dropdown-menu bg-transparent border-0">
                        <a href="signin.html" class="dropdown-item">Sign In</a>
                        <a href="signup.html" class="dropdown-item">Sign Up</a>
                        <a href="404.html" class="dropdown-item">404 Error</a>
                        <a href="blank.html" class="dropdown-item">Blank Page</a>
                    </div>
                </div> -->
            </div>
        </nav>
    </div>
    <!-- Sidebar End -->



    <!-- Content Start -->
    <div class="content">
        <!-- Navbar Start -->
        <nav class="navbar navbar-expand bg-light navbar-light sticky-top px-4 py-0">
            <a href="index.html" class="navbar-brand d-flex d-lg-none me-4">
                <h2 class="text-primary mb-0"><i class="fa fa-hashtag"></i></h2>
            </a>
            <a href="#" class="sidebar-toggler flex-shrink-0">
                <i class="fa fa-bars"></i>
            </a>
            
            <div class="navbar-nav align-items-center ms-auto">
                <div class="nav-item dropdown">
                    
                    <div class="dropdown-menu dropdown-menu-end bg-light border-0 rounded-0 rounded-bottom m-0">
                        
                        
                    </div>
                </div>
                <div class="nav-item dropdown">
                    
                    <div class="dropdown-menu dropdown-menu-end bg-light border-0 rounded-0 rounded-bottom m-0">
                       
                        
                        
                        
                    </div>
                </div>
                <div class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                        <img class="rounded-circle me-lg-2" src="assets/image/WhatsApp Image 2024-06-13 at 06.57.23_cbcdcf09.jpg" alt="" style="width: 40px; height: 40px;">
                        <span class="d-none d-lg-inline-flex">ashish</span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-end bg-light border-0 rounded-0 rounded-bottom m-0">
                        <a href="#" class="dropdown-item">My Profile</a>
                        <a href="#" class="dropdown-item">Settings</a>
                        <a href="logout.php" class="dropdown-item">Log Out</a>
                    </div>
                </div>
            </div>
        </nav>
        <!-- Navbar End -->
         <script>
            $('.sidebar-toggler').click(function () {
        $('.sidebar, .content').toggleClass("open");
        return false;
    });
         </script>
</body>
</html>