<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog</title>

    <?php
    include('com/navbar.php');
    include('com/header_link.php');
    ?>
</head>

<style>
    /*** Facts ***/
    .fact {
        /* background:  url(assets/img/indbg.webp) center center no-repeat; */
        background-size: cover;
    }

    .gradient-january {
        background: linear-gradient(45deg, #FFB6C1, #FF69B4);
        color: white;
    }

    .gradient-february {
        background: linear-gradient(45deg, #FF7F50, #FF4500);
        color: white;
    }

    .gradient-march {
        background: linear-gradient(45deg, #98FB98, #32CD32);
        color: white;
    }

    .gradient-april {
        background: linear-gradient(45deg, #FFD700, #FFA500);
        color: black;
    }

    .gradient-may {
        background: linear-gradient(45deg, #87CEFA, #4682B4);
        color: white;
    }

    .gradient-june {
        background: linear-gradient(45deg, #F0E68C, #FFD700);
        color: black;
    }

    .gradient-july {
        background: linear-gradient(45deg, #FF6347, #FF4500);
        color: white;
    }

    .gradient-august {
        background: linear-gradient(45deg, #FFDEAD, #FFD700);
        color: black;
    }

    .gradient-september {
        background: linear-gradient(45deg, #40E0D0, #20B2AA);
        color: white;
    }

    .gradient-october {
        background: linear-gradient(45deg, #FF8C00, #FF4500);
        color: black;
    }

    .gradient-november {
        background: linear-gradient(45deg, #778899, #708090);
        color: white;
    }

    .gradient-december {
        background: linear-gradient(45deg, #ADD8E6, #1E90FF);
        color: white;
    }

    .list-group-item i {
        color: white;
        /* Set the icon color to white */
    }


    /* Custom Styles for Cards */
    .custom-card {
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }

    .custom-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 8px 20px rgba(0, 0, 0, 0.15);
    }

    .card-title {
        font-size: 1.1rem;
        line-height: 1.4;
    }

    .card-body .text-muted {
        font-size: 0.9rem;
    }
</style>

<body>





    <!-- Header Start -->
    <div class="container-fluid bg-breadcrumb-1">
        <div class="container text-center py-5" style="max-width: 900px;">
            <h3 class="text-white display-3 mb-4">Blog</h1>

        </div>
    </div>
    <!-- Header End -->



    <div class="container mt-5 ">
        <div class="container py-5">
            <div class="mx-auto text-center mb-5" style="max-width: 900px;">
                <h1 class="section-title px-3">Holiday Destinations</h1>
                <h5 class="mb-0">Explore Our Insightful Blogs on Top Tourist Destinations for Joyful Journeys Ahead</h5>
            </div>
            <!-- Custom Navigation Buttons -->
            <div class="d-flex justify-content-between mb-3">
                <button id="prev-btn" class="btn btn-primary">Previous</button>
                <button id="next-btn" class="btn btn-primary">Next</button>
            </div>

            <!-- Owl Carousel -->
            <div class="owl-carousel owl-theme">
                <div class="item">
                    <img src="assets/img/blog-1.png" alt="">
                    <div class="carousel-caption">Kashmir</div>
                </div>
                <div class="item">
                    <img src="assets/img/blog-3.png" alt=>
                    <div class="carousel-caption">Kerala</div>
                </div>
                <div class="item">
                    <img src="assets/img/pasted .png" alt="">
                    <div class="carousel-caption">Darjiling</div>
                </div>
                <div class="item">
                    <img src="assets/img/pexels.jpeg" alt="Andaman">
                    <div class="carousel-caption">Himachal Pradesh</div>
                </div>
            </div>
        </div>
        <!-- Travel Month Section -->
        <div class="col-md-4 col-sm-12">

            <h2 class="text-primary fw-bold">Best Places</h2>
            <h3 class="mb-4"> To Travel In India By Month</h3>
            <ul class="list-group month-list">
                <li class="list-group-item d-flex justify-content-between align-items-center gradient-january">
                    January <i class="fa-solid fa-parachute-box"></i>
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-center gradient-february">
                    February <i class="fas fa-heart"></i>
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-center gradient-march">
                    March <i class="fas fa-tree"></i>
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-center gradient-april">
                    April <i class="fas fa-sun"></i>
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-center gradient-may">
                    May <i class="fas fa-sun"></i>
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-center gradient-june">
                    June <i class="fa-solid fa-cannabis"></i>
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-center gradient-july">
                    July <i class="fas fa-cloud-rain"></i>
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-center gradient-august">
                    August <i class="fas fa-sun"></i>
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-center gradient-september">
                    September <i class="fas fa-pencil-alt"></i>
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-center gradient-october">
                    October <i class="fas fa-leaf"></i>
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-center gradient-november">
                    November <i class="fas fa-umbrella"></i>
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-center gradient-december">
                    December <i class="fas fa-snowflake"></i>
                </li>
            </ul>


        </div>

        <section class="py-5">
            <div class="container">
                <h2 class="text-center mb-4 fw-bold">HOLIDAY DESTINATIONS</h2>
                <div class="row gy-4" id="card-container">
                    <!-- Initial Card 1 -->
                     
                    <div class="col-md-4">
                        <div class="card custom-card shadow-sm border-0 ">
                            <img src="assets/img/digha.jpg" class="card-img-top" alt="Udaipur Sunset">
                            <div class="card-body">
                                <span class="badge bg-danger mb-2">Holiday Destinations</span>
                                <h5 class="card-title fw-bold">Top 7 Sunset Spots In Digha To Visit This Winter</h5>
                                <p class="text-muted mb-0">Priyotosh • December 4, 2024</p>
                            </div>
                        </div>
                    </div>
                    <!-- Initial Card 2 -->
                    <div class="col-md-4">
                        <div class="card custom-card shadow-sm border-0 ">
                            <img src="assets/img/haji-peer-azad-kashmir-4405256.jpg" class="card-img-top" alt="Winter Spots">
                            <div class="card-body">
                                <span class="badge bg-danger mb-2">Holiday Destinations</span>
                                <h5 class="card-title fw-bold">10 Best Winter Spots To Discover This Holiday Season</h5>
                                <p class="text-muted mb-0">Priyotosh • November 28, 2024</p>
                            </div>
                        </div>
                    </div>
                    <!-- Initial Card 3 -->
                    <div class="col-md-4">
                        <div class="card custom-card shadow-sm border-0 ">
                            <img src="assets/img/north.jpg" class="card-img-top" alt="Kashmir">
                            <div class="card-body">
                                <span class="badge bg-danger mb-2">Holiday Destinations</span>
                                <h5 class="card-title fw-bold">Discover The Winter Wonderland Of Kashmir</h5>
                                <p class="text-muted mb-0">Priyotosh • November 28, 2024</p>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Load More Button -->
                <div class="text-center mt-4">
                    <button class="btn btn-primary px-4 py-2 fw-bold" id="load-more-btn">Load More</button>
                </div>
            </div>
        </section>

        <script>
            // JavaScript to handle Load More functionality
            let cardCount = 1; // Counter to keep track of added cards
            document.getElementById("load-more-btn").addEventListener("click", function() {
                const cardContainer = document.getElementById("card-container");

                // New cards to load
                const newCards = `
        <div class="col-md-4">
          <div class="card custom-card shadow-sm border-0">
            <img src="assets/img/shilong.php" class="card-img-top" alt="Beach Destinations ${cardCount}">
            <div class="card-body">
              <span class="badge bg-danger mb-2">Holiday Destinations</span>
              <h5 class="card-title fw-bold">Top Beach Destinations To Escape Winter Blues ${cardCount}</h5>
              <p class="text-muted mb-0">Priyotosh • December 1, 2024</p>
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="card custom-card shadow-sm border-0">
            <img src="https://via.placeholder.com/350x200" class="card-img-top" alt="Hill Stations ${cardCount}">
            <div class="card-body">
              <span class="badge bg-danger mb-2">Holiday Destinations</span>
              <h5 class="card-title fw-bold">Explore the Top Hill Stations This Winter ${cardCount}</h5>
              <p class="text-muted mb-0">Priyotosh • November 30, 2024</p>
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="card custom-card shadow-sm border-0">
            <img src="https://via.placeholder.com/350x200" class="card-img-top" alt="Cultural Sites ${cardCount}">
            <div class="card-body">
              <span class="badge bg-danger mb-2">Holiday Destinations</span>
              <h5 class="card-title fw-bold">Discover Cultural Sites To Visit This Holiday ${cardCount}</h5>
              <p class="text-muted mb-0">Priyotosh • November 29, 2024</p>
            </div>
          </div>
        </div>
      `;

                // Append new cards to the container
                cardContainer.insertAdjacentHTML("beforeend", newCards);

                // Increment card counter for next load
                cardCount++;
            });
        </script>



    </div>





    <?php
    include('com/footer.php');
    include('com/footer_link.php');

    ?>




</body>

</html>