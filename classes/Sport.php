<?php
session_start();
include("config/config.php");


class Sport extends Connection 
{
    public function Add($allmobile)
    {
        $name = $allmobile['sport_name'];
        $qty = $allmobile['sport_qty'];
        $imageName = $_FILES['sport_img']['name'];
        $tempImage = $_FILES['sport_img']['tmp_name'];
        $price = $allmobile['sport_price'];
        $sql = "INSERT INTO sports (sport_name, sport_qty, sport_img, sport_price) VALUES ('$name', '$qty', '$imageName', '$price')";
        $result = $this->con->query($sql);
        if($result)
        {
            $_SESSION['message'] = "Data Inserted Successfully!";
            $_SESSION['type'] = "success";
            move_uploaded_file($tempImage,"upload/".$imageName);
        }else
        {
            $_SESSION['message'] = "Data Not Inserted!";
            $_SESSION['type'] = "danger";
        }
    }

    public function show()
    {
        return $result = $this->con->query("SELECT * FROM `sports`");
    }
    public function edit($tid)
    {
        return $fire = $this->con->query("SELECT * FROM `sports` WHERE id = '$tid'");
    }
    
    public function update($allData, $tid)
    {
        $newName = $allData['sport_name'];
        $newqty = $allData['sport_qty'];
        $old__imageName = $allData['old__image'];
        $new__imageName = $_FILES['sport_img']['name'];
        $tmp__imageName = $_FILES['sport_img']['tmp_name'];
        $newprice = $allData['sport_price'];
        if($new__imageName != '')
        {
            $update_imageName = $new__imageName;
        }else
        {
            $update_imageName = $old__imageName;
        }
        if(file_exists("upload/".$new__imageName))
        {
            $sql = "UPDATE `sports` SET `sport_name`='$newName',`sport_qty`='$newqty',`sport_img`='$update_imageName',`sport_price`='$newprice' WHERE id='$tid'";
            $fire = $this->con->query($sql);
            header("location: sport.php");
        }else
        {
            $sql = "UPDATE `sports` SET `sport_name`='$newName',`sport_qty`='$newqty',`sport_img`='$update_imageName',`sport_price`='$newprice' WHERE id='$tid'";
            $fire = $this->con->query($sql);
            if($fire)
            {
                if($new__imageName != "")
                {
                    move_uploaded_file($tmp__imageName, "upload/".$new__imageName);
                    unlink("upload/".$old__imageName);
                }
                $_SESSION['message'] = "Data Updated Successfully!";
                $_SESSION['type'] = "success";
                header("location:sport.php");
            }else
            {
                $_SESSION['message'] = "Data Not Updated!";
                $_SESSION['type'] = "danger";
                header("location:sport.php");
            }
        }
    }
    public function destroy($tid)
    {
        $fire = $this->con->query("SELECT * FROM `sports` WHERE id = '$tid'");
        if($fire)
        {
            $row = mysqli_fetch_assoc($fire);
            $taskimage = $row['sport_img'];
            unlink("upload/".$taskimage);
        }
        $result = $this->con->query("DELETE FROM `sports` WHERE id = '$tid'");
        if($result)
        {
            header("location: sport.php");
        }
    }
}
?>