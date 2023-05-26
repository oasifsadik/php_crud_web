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
            move_uploaded_file($tempImage,"upload/".$imageName);
            echo"Data Insert Successfully";
                }else{
                    echo "Data Insert Fail";
                }
                

    }

    public function show()
    {
        return $result = $this->con->query("SELECT * FROM `fruits`");
    }
}
?>