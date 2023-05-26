<?php
include("config/config.php");

class Mobile extends Connection{

    public function Add($allmobile){
        $name = $allmobile['mobile_name'];
        $qty = $allmobile['enter_mobile_qty'];
        $imageName = $_FILES['mobile_img']['name'];
        $tempImage = $_FILES['mobile_img']['tmp_name'];
        $price = $allmobile['mobile_price'];

        // $sql = "INSERT INTO `fruits`(`id`, `name`, `enter_qty`, `img`, `price`) VALUES ($name, $qty, $imageName, $price)";
        $sql = "INSERT INTO mobile (mobile_name, enter_mobile_qty, mobile_img, mobile_price) VALUES ('$name', '$qty', '$imageName', '$price')";
        $result = $this->con->query($sql);
        if($result){
            $_SESSION['message'] = "Data Inserted Successfully!";
            $_SESSION['type'] = "success";
            move_uploaded_file($tempImage,"upload/mobile".$imageName);
                }else{
                    $_SESSION['message'] = "Data Not Inserted!";
                $_SESSION['type'] = "danger";
                }
    }
    public function show()
    {
        return $result = $this->con->query("SELECT * FROM `mobile`");
    }
}
?>