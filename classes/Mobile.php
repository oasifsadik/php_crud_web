<?php
session_start();
include("config/config.php");

class Mobile extends Connection
{
    public function Add($allmobile)
    {
        $name = $allmobile['mobile_name'];
        $qty = $allmobile['enter_mobile_qty'];
        $imageName = $_FILES['mobile_img']['name'];
        $tempImage = $_FILES['mobile_img']['tmp_name'];
        $price = $allmobile['mobile_price'];
        $sql = "INSERT INTO mobile (mobile_name, enter_mobile_qty, mobile_img, mobile_price) VALUES ('$name', '$qty', '$imageName', '$price')";
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
        return $result = $this->con->query("SELECT * FROM `mobile`");
    }

    
    public function edit($tid)
    {
        return $fire = $this->con->query("SELECT * FROM `mobile` WHERE id = '$tid'");
    }
    
    public function update($allData, $tid)
    {
        $newName = $allData['mobile_name'];
        $newqty = $allData['enter_mobile_qty'];
        $old__imageName = $allData['old__image'];
        $new__imageName = $_FILES['mobile_img']['name'];
        $tmp__imageName = $_FILES['mobile_img']['tmp_name'];
        $newprice = $allData['mobile_price'];
        if($new__imageName != '')
        {
            $update_imageName = $new__imageName;
        }else
        {
            $update_imageName = $old__imageName;
        }
        if(file_exists("upload/".$new__imageName))
        {
            $sql = "UPDATE `mobile` SET `mobile_name`='$newName',`enter_mobile_qty`='$newqty',`mobile_img`='$update_imageName',`mobile_price`='$newprice' WHERE id='$tid'";
            $fire = $this->con->query($sql);
            header("location: mobile.php");
        }else
        {
            $sql = "UPDATE `mobile` SET `mobile_name`='$newName',`enter_mobile_qty`='$newqty',`mobile_img`='$update_imageName',`mobile_price`='$newprice' WHERE id='$tid'";
            $fire = $this->con->query($sql);
            if($fire)
            {
                if($new__imageName != ""){
                    move_uploaded_file($tmp__imageName, "upload/".$new__imageName);
                    unlink("upload/".$old__imageName);
                }
                $_SESSION['message'] = "Data Updated Successfully!";
                $_SESSION['type'] = "success";
                header("location:mobile.php");
            }else
            {
                $_SESSION['message'] = "Data Not Updated!";
                $_SESSION['type'] = "danger";
                header("location:mobile.php");
            }
        }
    }
    public function destroy($tid)
    {
        $fire = $this->con->query("SELECT * FROM `mobile` WHERE id = '$tid'");
        if($fire)
        {
            $row = mysqli_fetch_assoc($fire);
            $taskimage = $row['mobile_img'];
            unlink("upload/".$taskimage);
        }
        $result = $this->con->query("DELETE FROM `mobile` WHERE id = '$tid'");
        if($result)
        {
            header("location: mobile.php");
        }
    }
}
?>