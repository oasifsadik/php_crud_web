<?php
session_start();
include("config/config.php");
    class Fruits extends Connection 
    {
        public function store($alldata)
        {  
            $name = $alldata['name'];
            $qty = $alldata['enter_qty'];
            $imageName = $_FILES['img']['name'];
            $tempImage = $_FILES['img']['tmp_name'];
            $price = $alldata['price'];
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

        
        public function edit($tid)
        {
            return $fire = $this->con->query("SELECT * FROM `fruits` WHERE id = '$tid'");
        }
        
        public function update($allData, $tid)
        {
            $newName = $allData['name'];
            $newqty = $allData['enter_qty'];
            $old__imageName = $allData['old__image'];
            $new__imageName = $_FILES['img']['name'];
            $tmp__imageName = $_FILES['img']['tmp_name'];
            $newprice = $allData['price'];
            if($new__imageName != ''){
                    $update_imageName = $new__imageName;
            }else{
                $update_imageName = $old__imageName;
            }
            if(file_exists("upload/".$new__imageName)){

                $sql = "UPDATE `fruits` SET `name`='$newName',`enter_qty`='$newqty',`img`='$update_imageName',`price`='$newprice' WHERE id='$tid'";
                $fire = $this->con->query($sql);
                header("location: fruits.php");
            }else{
                $sql = "UPDATE `fruits` SET `name`='$newName',`enter_qty`='$newqty',`img`='$update_imageName',`price`='$newprice' WHERE id='$tid'";
                $fire = $this->con->query($sql);
                if($fire){
                    if($new__imageName != ""){
                        move_uploaded_file($tmp__imageName, "upload/".$new__imageName);
                        unlink("upload/".$old__imageName);
                    }
                    $_SESSION['message'] = "Data Updated Successfully!";
                    $_SESSION['type'] = "success";
                    header("location:fruits.php");
                }else{
                    $_SESSION['message'] = "Data Not Updated!";
                    $_SESSION['type'] = "danger";
                    header("location:fruits.php");
                }
            }
        }
        public function destroy($tid){
            $fire = $this->con->query("SELECT * FROM `fruits` WHERE id = '$tid'");
            if($fire){
                $row = mysqli_fetch_assoc($fire);
                $taskimage = $row['img'];
                unlink("upload/".$taskimage);
            }
    
            $result = $this->con->query("DELETE FROM `fruits` WHERE id = '$tid'");
            if($result){
                header("location: fruits.php");
            }
        }
    }
?>