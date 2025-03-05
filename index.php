



<?php
include('com/navbar.php');
include('com/header_link.php');
include('db_conn.php');
// Fetch packages
// $packages = $conn->query("SELECT * FROM tour_packages");
// $result = $conn->query("SELECT * FROM destinations");

?>

<!-- Carousel Start -->
<div class="carousel-header">
  <div id="carouselId" class="carousel slide" data-bs-ride="carousel">
    <ol class="carousel-indicators">
      <li data-bs-target="#carouselId" data-bs-slide-to="0" class="active"></li>
      <li data-bs-target="#carouselId" data-bs-slide-to="1"></li>
      <li data-bs-target="#carouselId" data-bs-slide-to="2"></li>
    </ol>
    <div class="carousel-inner" role="listbox">
      <div class="carousel-item active">
        <img src="assets/img/rajasthan.png" class="img-fluid" alt="Image">
        <div class="carousel-caption">
          <div class="p-3" style="max-width: 900px;">
            <h4 class="text-white text-uppercase fw-bold mb-4" style="letter-spacing: 3px;">Rajasthan Holiday Packages</h4>
            <!-- <h1 class="display-2 text-capitalize text-white mb-4">Rajasthan Holiday Packages</h1> -->
            <p class="mb-5 fs-5">
            </p>
            <div class="d-flex align-items-center justify-content-center">
              <a class="btn-hover-bg btn btn-primary rounded-pill text-white py-3 px-5" href="#">Discover Now</a>
            </div>
          </div>
        </div>
      </div>
      <div class="carousel-item">
        <img src="assets/img/fll_bnn.png" class="img-fluid" alt="Image">
        <div class="carousel-caption">
          <div class="p-3" style="max-width: 900px;">
            <h4 class="text-white text-uppercase fw-bold mb-4" style="letter-spacing: 3px;">Book your winter holiday tour packages </h4>
            <h1 class="display-2 text-capitalize text-white mb-4">
              </p>
              <div class="d-flex align-items-center justify-content-center">
                <a class="btn-hover-bg btn btn-primary rounded-pill text-white py-3 px-5" href="#">Discover Now</a>
              </div>
          </div>
        </div>
      </div>
      <div class="carousel-item">
        <img src="assets/img/Commongq.png" class="img-fluid" alt="Image">
        <div class="carousel-caption">
          <div class="p-3" style="max-width: 900px;">
            <h4 class="text-white text-uppercase fw-bold mb-4" style="letter-spacing: 3px;">Kashmir Holiday Packages</h4>
            <!-- <h1 class="display-2 text-capitalize text-white mb-4">You Like To Go?</h1> -->
            <p class="mb-5 fs-5">
            </p>
            <div class="d-flex align-items-center justify-content-center">
              <a class="btn-hover-bg btn btn-primary rounded-pill text-white py-3 px-5" href="#">Discover Now</a>
            </div>
          </div>
        </div>
      </div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselId" data-bs-slide="prev">
      <span class="carousel-control-prev-icon btn bg-primary" aria-hidden="false"></span>
      <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselId" data-bs-slide="next">
      <span class="carousel-control-next-icon btn bg-primary" aria-hidden="false"></span>
      <span class="visually-hidden">Next</span>
    </button>
  </div>
</div>
<!-- Carousel End -->
</div>
<!-- Search Start -->
<div class="container-fluid search-bar position-relative" style="top: -50%; transform: translateY(-50%);">
  <div class="container">
    <div class="position-relative rounded-pill w-100 mx-auto p-5" style="background: rgba(19, 53, 123, 0.8);">
      <input class="form-control border-0 rounded-pill w-100 py-3 ps-4 pe-5" type="text" placeholder="Eg: India">
      <button type="button" class="btn btn-primary rounded-pill py-2 px-4 position-absolute me-2" style="top: 50%; right: 46px; transform: translateY(-50%);">Search</button>
    </div>
  </div>
</div>

<!-- Search End -->



<!-- catagoey of tour start -->
<div class="mx-auto text-center mb-5" style="max-width: 900px;">
  <h5 class="section-title px-3">INDIA</h5>
  <h1 class="mb-0">Tour Catagory</h1>
</div>



<div class="container text-center my-5">


  <div class="row mt-4 justify-content-center">
    <!-- Europe Card -->
    <div class="col-lg-2 col-md-4 col-sm-6 mb-4 destination-card">
      <img src="assets/img/mandir.jpg" alt="Europe">
      <p class="destination-title">Religious Tour</p>
    </div>

    <!-- Kerala Card -->
    <div class="col-lg-2 col-md-4 col-sm-6 mb-4 destination-card">
      <img src="assets/img/home/ttabc-img3.jpg" alt="Kerala">
      <p class="destination-title">Heritage Destinations</p>
    </div>

    <!-- Dubai Card -->
    <div class="col-lg-2 col-md-4 col-sm-6 mb-4 destination-card">
      <img src="assets/img/beatch.jpg" alt="Dubai">
      <p class="destination-title">Beatches</p>
    </div>

    <!-- Andaman Card -->
    <div class="col-lg-2 col-md-4 col-sm-6 mb-4 destination-card">
      <img src="assets/img/home/Untitled-6.avif" alt="Andaman">
      <p class="destination-title">Wild Life Tour</p>
    </div>

    <!-- Australia Card -->
    <div class="col-lg-2 col-md-4 col-sm-6 mb-4 destination-card">
      <img src="assets/img/adventure-tour-packages.jpg" alt="Australia">
      <p class="destination-title">Adventure Destinations</p>
    </div>
  </div>
</div>

<!-- more pacakege start -->
<div class="container my-5">
  <div class="mx-auto text-center mb-5 " style="max-width: 900px;">
    <h5 class="section-title px-3 h1">INDIA</h5>
    <h1 class="mb-0">Trending Packages</h1>
  </div>

  <h2 class="text-primary fw-bold">Limited-time Christmas-New Year deals!</h2>
  <p>Travel beyond boundaries with incredible savings.</p>

  <!-- Owl Carousel with custom navigation buttons -->
  <div class="position-relative mt-4">

    <!-- Custom Previous and Next Buttons with Font Awesome Icons -->
    <button class="custom-nav-btn prev" id="prev-btn"><i class="fas fa-chevron-left"></i></button>
    <button class="custom-nav-btn next" id="next-btn"><i class="fas fa-chevron-right"></i></button>

    <div class="owl-carousel owl-theme">
      <?php
      // Start session to check login status
      

      // Fetch packages from the database
      $packages = $conn->query("SELECT * FROM packages  LIMIT 4");
      while ($package = $packages->fetch_assoc()):
      ?>
        <div class="item">
          <div class="card package-card">
            <?php
            // Check if image exists for the package
            if (!empty($package['image'])):
              $imagePath = "assets/img/" . htmlspecialchars($package['image']);
            else:
              $imagePath = null; // No image
            endif;
            ?>
            <?php if ($imagePath): ?>
              <img src="<?= $imagePath ?>" alt="<?= htmlspecialchars($package['title']) ?>" class="card-img-top">
            <?php else: ?>
              <p class="text-center">Image not found</p> <!-- Message if no image -->
            <?php endif; ?>
            <div class="card-body">
              <h5><?= htmlspecialchars($package['title']) ?></h5>
              <p>From ₹ <?= htmlspecialchars($package['price']) ?></p>
              <a href="#" 
                 class="btn-explore book-now-btn" 
                 data-id="<?= htmlspecialchars($package['id']) ?>"
                 data-logged-in="<?= isset($_SESSION['logged_in']) && $_SESSION['logged_in'] ? 'true' : 'false' ?>">
                 Book Now →
              </a>
            </div>
          </div>
        </div>
      <?php endwhile; ?>
    </div>
  </div>
</div>

<script>
  // Handle Book Now button click
  document.querySelectorAll('.book-now-btn').forEach(button => {
    button.addEventListener('click', function (e) {
      e.preventDefault();

      const isLoggedIn = this.getAttribute('data-logged-in') === 'true';
      const packageId = this.getAttribute('data-id');

      if (isLoggedIn) {
        // If user is logged in, redirect to the booking page
        window.location.href = `pack_deti.php?id=${packageId}`;
      } else {
        // If user is not logged in, redirect to login page
        alert("Please login first!");
        window.location.href = 'siginup.php';
      }
    });
  });
</script>



<!-- more pacakege end -->

<!-- gallery start-->

<!-- gallery end -->




<!-- Packages Start -->

<!-- Packages End -->
<!-- services start -->
<!-- Services Start -->
<div class="container-fluid service py-5">
  <div class="container py-5">
    <div class="text-center mx-auto pb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 800px;">
      <h1 class="display-5 text-capitalize mb-3">Benefits of <span class="text-primary">Booking With Us</span></h1>

    </div>
    <div class="row g-4">
      <div class="col-md-6 col-lg-4 wow fadeInUp" data-wow-delay="0.1s">
        <div class="service-item p-4">
          <div class="service-icon mb-4">
            <i class="fa-solid fa-piggy-bank fa-2xl" style="color: #ffffff;"></i>

          </div>
          <h5 class="mb-3">Wallet-Friendly Prices</h5>
          <p class="mb-0"></p>Every traveller from worldwide can embark on unforgettable journeys with our unbeatable holiday package prices.
        </div>
      </div>
      <div class="col-md-6 col-lg-4 wow fadeInUp" data-wow-delay="0.3s">
        <div class="service-item p-4">
          <div class="service-icon mb-4">
            <i class="fa fa-solid fa-tag fa-2x" style="color: #ffffff;"></i>
            <i class=""></i>
          </div>
          <h5 class="mb-3">Exciting Deals</h5>
          <p class="mb-0">Our platform comprises perfect deals and discounts on all exclusive holiday packages to ensure value-for-money.

          </p>
        </div>
      </div>
      <div class="col-md-6 col-lg-4 wow fadeInUp" data-wow-delay="0.5s">
        <div class="service-item p-4">
          <div class="service-icon mb-4">
            <i class="fa-solid fa-phone fa-2x" style="color: #ffffff;"></i>

          </div>
          <h5 class="mb-3">24/7 Support</h5>
          <p class="mb-0">Our customer support team is always available to assist you and resolve travel-related queries instantly</p>
        </div>
      </div>



    </div>
  </div>
</div>
<!-- Services End -->

<!-- blog start -->

<div class="container py-5">

  <div class="mx-auto text-center mb-5 " style="max-width: 900px;">
    <h1 class="section-title px-3 h1">Enjoy our Travel Blogs</h1>

  </div>

  <div class="row g-3">
    <div class="col-md-3">
      <div class="position-relative blog-card">
        <img src="assets/img/howrah.webp" class="img-fluid" alt="Blog Image">
        <span class="category-badge">Holiday Destinations</span>
        <div class="blog-overlay">
          <h6>7 Reasons Why Kolkata is a Must-Visit in Winters</h6>
          <span class="read-more">Read More <span>&rarr;</span></span>
        </div>
      </div>
    </div>
    <div class="col-md-3">
      <div class="position-relative blog-card">
        <img src="assets/img/Digha-Beach.webp" class="img-fluid" alt="Blog Image">
        <span class="category-badge">Holiday Destinations</span>
        <div class="blog-overlay">
          <h6>10 Reasons Why Digha is a Must-Visit in Winters</h6>
          <span class="read-more">Read More <span>&rarr;</span></span>
        </div>
      </div>
    </div>
    <div class="col-md-3">
      <div class="position-relative blog-card">
        <img src="assets/img/mandir.jpg" class="img-fluid" alt="Blog Image">
        <span class="category-badge">Holiday Destinations</span>
        <div class="blog-overlay">
          <h6>10 Must-Visit Temples in Tamil Nadu for a Divine Experience!</h6>
          <span class="read-more">Read More <span>&rarr;</span></span>
        </div>
      </div>
    </div>
    <div class="col-md-3">
      <div class="position-relative blog-card">
        <img src="assets/img/blog-1.png" class="img-fluid" alt="Blog Image">
        <span class="category-badge">Holiday Destinations</span>
        <div class="blog-overlay">
          <h6>Discover the Winter Wonderland of Kashmir</h6>
          <span class="read-more">Read More <span>&rarr;</span></span>
        </div>
      </div>
    </div>
  </div>
  <div class="text-center mt-4">
    <a href="blog.php" class="view-all-btn">View All</a>
  </div>
</div>
<!-- blog end -->

<!-- testomonial start -->

<!-- Testimonial Start -->
<div class="container my-5">
  <h2 class="text-center mb-4">
    <span class="text-primary">What</span> Travellers Say?
  </h2>
  <p class="text-center text-muted mb-5">
    See real tourists and their real opinions, helping you create the best memories.
  </p>

  <div class="owl-carousel owl-theme">
    <!-- Testimonial 1 -->
    <div class="item">
      <div class="card p-3 border-0 shadow">
        <div class="card-body">
          <p class="card-text">"I have visited Bhutan with my wife for 6N7D and explored Thimpu, Punakha, Paro, Phuentsholing cities. It was a great experience and the services provided by you regarding hotel rooms, guide, and driver vehicle. I shall definitely recommend to my friends and family to..."</p>
          <div class="mt-4">
            <h6 class="mb-0">Mahipal Singh Bhatiy</h6>
            <small class="text-muted">29 Nov, 2024</small>
          </div>
        </div>
      </div>
    </div>

    <!-- Testimonial 2 -->
    <div class="item">
      <div class="card p-3 border-0 shadow">
        <div class="card-body">
          <p class="card-text">"We would like to thank Balvindar and Aditya for helping us with our recent Europe trip. Both were really helpful and prompt in answering our questions. We were looking for a customised tour because we wanted to travel to the UK after Europe, not returning..."</p>
          <div class="mt-4">
            <h6 class="mb-0">Rahul Choudhary</h6>
            <small class="text-muted">30 Nov, 2024</small>
          </div>
        </div>
      </div>
    </div>

    <!-- Add more testimonials as needed -->
  </div>
</div>
<!-- Testimonial End -->

<!-- testomonial end -->



<!-- footer start -->

<?php
include('com/footer.php');
include('com/footer_link.php');

?>
<!-- footer end -->