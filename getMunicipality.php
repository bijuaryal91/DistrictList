<?php
    $conn=mysqli_connect("localhost","root","","product");
    if(!$conn){
        die("Connection failed: ".mysqli_connect_error());
    }
    $districtId=intval($_GET['district']);
    $sql="SELECT * FROM municipalities WHERE district_id='$districtId'";
    $result=mysqli_query($conn,$sql);
    if(mysqli_num_rows($result)>0){
        while($row=mysqli_fetch_assoc($result)){
            echo "<option value='".$row['municipality_id']."'>".$row['municipality_name']."</option>";
        }
    }
?>