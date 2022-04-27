<?php
    $conn=mysqli_connect("localhost","root","","product");
    if(!$conn){
        die("Connection failed: ".mysqli_connect_error());
    }
    $provinceId=intval($_GET['province']);
    $sql="SELECT * FROM districts WHERE province_id='$provinceId'";
    $result=mysqli_query($conn,$sql);
    if(mysqli_num_rows($result)>0){
        while($row=mysqli_fetch_assoc($result)){
            echo "<option value='".$row['district_id']."'>".$row['district_name']."</option>";
        }
    }
?>