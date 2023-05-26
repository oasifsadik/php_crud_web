<?php
// class Connection{
//     protected $con;
//     public function __construct()
//     {
//         $this->con = new mysqli("localhost","root","","crud_project");
        
//     }
// }
class Connection{
    protected $con;
    public function __construct()
    {
        $this->con = new mysqli("localhost","root","","crud_project",);
        // if($this->con){
        //     echo "connect";
        // }
    }
}
?>