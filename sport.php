<?php
include("classes/Sport.php");
$sport = new Sport();

    if(isset($_POST['save']))
    {
        $sport->Add($_POST);
    }
?>

<?php
include_once("include/header.php")
?>

<section>
        <div class="container">
            <div class="title text-center text-primary">
                <h4 class="display-2">Sport</h4>
            </div>
            <div class="col-md-8 offset-2">
                    <table class="table border">
                        <thead>
                            <tr>
                                <th>#sl</th>
                                <th>Sport</th>
                                <th>Sport Qty</th>
                                <th>Sport Image</th>
                                <th>Sport Price</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                $sport = $sport->show();
                                $s = 1;
                                while($all = mysqli_fetch_assoc($sport) ){
                            ?>
                            <tr>
                                <td><?php echo $s++;?></td>
                                <td><?php echo $all['sport_name'];?></td>
                                <td><?php echo $all['sport_qty'];?></td>
                                <td><img src="upload/<?php echo $all['sport_img'];?>" width="100px;" height="80px" alt=""></td>
                                <td><?php echo $all['sport_price'];?></td>
                                <td>
                                    <a href="edit_sport.php?id=<?php echo $all['id']?>" class="btn btn-sm btn-danger">Edit</a>
                                    <a href="delete_sport.php?id=<?php echo $all['id']?>" class="btn btn-sm btn-primary">Delete</a>
                                </td>
                            </tr>
                            <?php
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
        </div>
    </section>
    <section>
    <div class="container">
            <div class="title text-center text-primary">
                <h4 class="display-2">Add Sport</h4>
            </div>
            <div class="col-md-8 offset-2">
                <?php 
                    if(isset($_SESSION['message'])){
                ?>
                <div class="alert alert-<?php echo $_SESSION['type']?> alert-dismissible fade show" role="alert">
                    <?php echo $_SESSION['message'];?>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                <?php
                    unset($_SESSION['message']);
                    }
                ?>
                <form action="" method="POST" enctype="multipart/form-data">
                    <div class="mb-3">
                        <input type="text" name="sport_name" class="form-control" placeholder="Enter Sport Name" require>
                    </div>
                    <div class="mb-3">
                        <input type="number" name="sport_qty" class="form-control" placeholder="Enter Sport Quantity" require>
                    </div>
                    <div class="mb-3">
                        <input type="file" name="sport_img" class="form-control" require>
                    </div>
                    <div class="mb-3">
                        <input type="text" name="sport_price" placeholder="Enter Sport Price" class="form-control" require>
                    </div>
                    <button type="submit" name="save" class="btn btn-primary w-100">Submit</button>
                </form>
            </div>
        </div>
    </section>
<?php include_once("include/footer.php") ?>