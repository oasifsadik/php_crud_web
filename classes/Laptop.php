<?php
session_start();
include("config/config.php");


class Laptop extends Connection 
{

    public function Add($allmobile){
        $name = $allmobile['laptop_name'];
        $qty = $allmobile['enter_laptop_qty'];
        $imageName = $_FILES['laptop_img']['name'];
        $tempImage = $_FILES['laptop_img']['tmp_name'];
        $price = $allmobile['laptop_price'];
        $sql = "INSERT INTO laptops (laptop_name, enter_laptop_qty, laptop_img, laptop_price) VALUES ('$name', '$qty', '$imageName', '$price')";
        $result = $this->con->query($sql);
        if($result)
        {
            $_SESSION['message'] = "Data Inserted Successfully!";
            $_SESSION['type'] = "success";
            move_uploaded_file($tempImage,"upload/".$imageName);
                }else{
                    $_SESSION['message'] = "Data Not Inserted!";
                $_SESSION['type'] = "danger";
        }
    }

    public function show()
    {
        return $result = $this->con->query("SELECT * FROM `laptops`");
    }

    
    public function edit($tid)
    {
        return $fire = $this->con->query("SELECT * FROM `laptops` WHERE id = '$tid'");
    }
    
    public function update($allData, $tid)
    {
        $newName = $allData['laptop_name'];
        $newqty = $allData['enter_laptop_qty'];
        $old__imageName = $allData['old__image'];
        $new__imageName = $_FILES['laptop_img']['name'];
        $tmp__imageName = $_FILES['laptop_img']['tmp_name'];
        $newprice = $allData['laptop_price'];
        if($new__imageName != '')
        {
            $update_imageName = $new__imageName;
        }else
        {
            $update_imageName = $old__imageName;
        }
        if(file_exists("upload/".$new__imageName))
        {
            $sql = "UPDATE `laptops` SET `laptop_name`='$newName',`enter_laptop_qty`='$newqty',`laptop_img`='$update_imageName',`laptop_price`='$newprice' WHERE id='$tid'";
            $fire = $this->con->query($sql);
            header("location: laptop.php");
        }else
        {
            $sql = "UPDATE `laptops` SET `laptop_name`='$newName',`enter_laptop_qty`='$newqty',`laptop_img`='$update_imageName',`laptop_price`='$newprice' WHERE id='$tid'";
            $fire = $this->con->query($sql);
            if($fire)
            {
                if($new__imageName != ""){
                    move_uploaded_file($tmp__imageName, "upload/".$new__imageName);
                    unlink("upload/".$old__imageName);
                }
                
                $_SESSION['message'] = "Data Updated Successfully!";
                $_SESSION['type'] = "success";
                header("location:laptop.php");
            }else{
                $_SESSION['message'] = "Data Not Updated!";
                $_SESSION['type'] = "danger";
                header("location:laptop.php");
            }
            
        }
    }
    public function destroy($tid)
    {
        $fire = $this->con->query("SELECT * FROM `laptops` WHERE id = '$tid'");
        if($fire)
        {
            $row = mysqli_fetch_assoc($fire);
            $taskimage = $row['laptop_img'];
            unlink("upload/".$taskimage);
        }
        $result = $this->con->query("DELETE FROM `laptops` WHERE id = '$tid'");
        if($result)
        {
            header("location: laptop.php");
        }
    }
}
?>