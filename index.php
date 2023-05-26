
<?php
include_once("include/header.php");
include("classes/Fruits.php");
$task = new Fruits();
?>

    <section>
        <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner" style="height:70vh;">
                <div class="carousel-item active">
                <img src="image/5afeb9dc1a02-mobile-and-sim-dealsadvicerevised.jpg" class="d-block w-100" alt="...">
                </div>
                <div class="carousel-item">
                <img src="image/assortment-of-colorful-ripe-tropical-fruits-top-royalty-free-image-995518546-1564092355.jpg" class="d-block w-100" alt="...">
                </div>
                <div class="carousel-item">
                <img src="image/Top-laptop-brands-in-India.webp" class="d-block w-100" alt="...">
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </section>
    <section class=" container">
        <h1 class="lead display-3 text-center">Fruits section</h1>
    <div class="container text-center">
        <div class="row">
            <?php
                    $data = $task->Show();
                    $s = 1;
                    while($all = mysqli_fetch_assoc($data) ){
            ?>
                <div class="col p-2">
                    <img src="upload/<?php echo $all['img'];?>" width="280px;" height="250px" alt="">
                </div>
            <?php
                
            }
            ?>
             <!-- <nav aria-label="Page navigation example">
                <ul class="pagination">
                    <li class="page-item"><a class="page-link" href="#">Previous</a></li>
                    <li class="page-item"><a class="page-link" href="#">1</a></li>
                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                    <li class="page-item"><a class="page-link" href="#">Next</a></li>
                </ul>
            </nav> -->
        </div>
    </div>
    </section>
<?php include_once("include/footer.php") ?>