<?php

include('./connect.php');
if(isset($_POST['submit'])){
    $name=$_POST['name'];
    $phone_number=$_POST['phone_number'];
    $email_id=$_POST['email_id'];
    $image=$_FILES['file'];
    echo $name;
    echo "<br>";
    echo $phone_number;
    echo "<br>";
    echo $email_id;
    echo "<br>";
    print_r($image);
    echo "<br>";

    $imagefilename=$image['name'];
    print_r($imagefilename);
    echo "<br>";
    $imagefileerror=$image['error'];
    print_r($imagefileerror);
    echo "<br>";
    $imagefiletemp=$image['tmp_name'];
    print_r($imagefiletemp);
    echo "<br>";

    $filename_seperate=explode('.',$imagefilename);
    print_r($filename_seperate);
    echo "<br>";

    $file_extension=strtolower(end($filename_seperate));
    print_r($file_extension);
    echo "<br>";

    $extension=array('jpeg','jpg','png');
    if(in_array($file_extension,$extension)){
        $upload_image='images/'.$imagefilename;
        move_uploaded_file($imagefiletemp,$upload_image);
        $sql="insert into `registration` (name,phone_number,email_id,image) values ('$name','$phone_number','$email_id','$upload_image')";
        $result=mysqli_query($con,$sql);
        if($result){
            echo '<div class="alert alert-success" role="alert">
            <strong>Success</strong>Data inserted successfully
          </div>';
        }else{
            die(mysqli_error($con));
        }
    }

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Display Data</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        img{
            width:200px;
        }
    </style>
</head>
<body>
    <h1 class="text-center my-4">Doctors Data</h1>
    <div class="container mt-5 d-flex justify-content-center">
    <table class="table table-borderd w-50">
  <thead  class="table-dark">
    <tr>
      <th scope="col">Sl no</th>
      <th scope="col">Name</th>
      <th scope="col">Image</th>
    </tr>
  </thead>
  <tbody>
       <?php 
       
 $sql="select * from `registration`";  
 $result=mysqli_query($con,$sql);
 while($row=mysqli_fetch_assoc($result)){
    $id=$row['id'];
    $name=$row['name'];
    $image=$row['image'];
    echo '<tr>
    <td>'.$id.'</td>
    <td>'.$name.'</td>
    <td><img src='.$image.' /></td>
  </tr>';
 }
       ?>

  </tbody>
</table>
</body>
</html>