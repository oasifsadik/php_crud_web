<?php
include("config/config.php");

class Fruits extends Connection {
    public function store($alldata)
    {  
        $name = $alldata['name'];
        $qty = $alldata['enter_qty'];
        $imageName = $_FILES['img']['name'];
        $tempImage = $_FILES['img']['tmp_name'];
        $price = $alldata['price'];

        // $sql = "INSERT INTO `fruits`(`id`, `name`, `enter_qty`, `img`, `price`) VALUES ($name, $qty, $imageName, $price)";
        $sql = "INSERT INTO fruits (name, enter_qty, img, price) VALUES ('$name', '$qty', '$imageName', '$price')";
        $result = $this->con->query($sql);
        if($result){
                    echo"Data Insert Successfully";
                    move_uploaded_file($tempImage,"upload/".$imageName);
                }

    }

    public function show()
    {
        return $result = $this->con->query("SELECT * FROM `fruits`");
    }

    public function destroy($tid){

        // Image delete from upload directory.
        $fire = $this->con->query("SELECT * FROM `fruits` WHERE id = '$tid'");

        if($fire){
            $row = mysqli_fetch_assoc($fire);
            $taskimage = $row['img'];
            unlink("upload/".$taskimage);
        }


        // Task Delete From Database
        $result = $this->con->query("DELETE FROM `fruits` WHERE id = '$tid'");
        if($result){
            header("location: index.php");
        }
    }
}
?>