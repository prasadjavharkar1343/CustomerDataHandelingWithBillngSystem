<html>
<head>

<style>
.button {
  display: inline-block;
  padding: 15px 25px;
  font-size: 24px;
  cursor: pointer;
  text-align: center;
  text-decoration: none;
  outline: none;
  color: #fff;
  background-color: #4CAF50;
  border: none;
  border-radius: 15px;
  box-shadow: 0 9px #999;
}

.button:hover {background-color: #3e8e41}

.button:active {
  background-color: #3e8e41;
  box-shadow: 0 5px #666;
  transform: translateY(4px);
}
</style>  
<h1 align="center">
    <title>ADD CUSTOMER DATA</title>
	</h1>
</head>
 
<body>

<?php

include_once("config.php");
 
if(isset($_POST['Submit'])) {    
    $name = $_POST['name'];
    $age = $_POST['age'];
    $gender = $_POST['gender'];
    $birthdate = $_POST['birthdate'];
    $address = $_POST['address'];
    $contact = $_POST['contact'];
    $model = $_POST['model'];
    $visitingdate = $_POST['visitingdate'];
    $expdate = $_POST['expdate'];
    $mrp = $_POST['mrp'];
    //$file = $_POST['file'];    
    // checking empty fields
    if(empty($name) || empty($age) || empty($gender) || empty($birthdate) || empty($address) || empty($contact) || empty($model) || empty($visitingdate) || empty($expdate) || empty($mrp)) 
    {                
        if(empty($name)) {
            //echo "<font color='red'>Name field is empty.</font><br/>";
            echo "<script language='javascript'>alert('Name field is empty.');</script>";
        }
        
        if(empty($age)) {
            //echo "<font color='red'>Age field is empty.</font><br/>";
            echo "<script language='javascript'>alert('Age field is empty.');</script>";
        }
        
        if(empty($gender)) {
            echo "<script language='javascript'>alert('Gender field is empty.');</script>";
            //echo "<font color='red'>gender field is empty.</font><br/>";
        }
        if(empty($birthdate)) {
            echo "<script language='javascript'>alert('birthdate field is empty.');</script>";
            //echo "<font color='red'>birthdate field is empty.</font><br/>";
        }
        if(empty($address)) {
            echo "<script language='javascript'>alert('Address field is empty.');</script>";
            //echo "<font color='red'>address field is empty.</font><br/>";
        }
        if(empty($contact)) {
            echo "<script language='javascript'>alert('Contact field is empty.');</script>";
            //echo "<font color='red'>contact field is empty.</font><br/>";
        }
        if(empty($model)) {
            echo "<script language='javascript'>alert('Model_No. field is empty.');</script>";
            //echo "<font color='red'>model field is empty.</font><br/>";
        }
        if(empty($visitingdate)) {
            echo "<script language='javascript'>alert('Visitingdate field is empty.');</script>";
            //echo "<font color='red'>visitingdate field is empty.</font><br/>";
        }
        if(empty($expdate)) {
            echo "<script language='javascript'>alert('Expiry_Date field is empty.');</script>";
            //echo "<font color='red'>expdate field is empty.</font><br/>";
            echo "<script language='javascript'>alert('expdate field is empty.');</script>";
        }
        if(empty($mrp)) {
            //echo "<font color='red'>MRP field is empty.</font><br/>";
            echo "<script language='javascript'>alert('MRP field is empty.');</script>";
        }

       
        echo "<br/><h6 align='center'><button class='button'><a href='javascript:self.history.back();'>Go Back</a></button></h6>";
    } else 
    { 
       


           if(isset($_FILES['image']))
           {
      $errors= array();
      $file_name = $_FILES['image']['name'];
      $file_size =$_FILES['image']['size'];
      $file_tmp =$_FILES['image']['tmp_name'];
      $file_type=$_FILES['image']['type'];
      $tmp = explode('.',$_FILES['image']['name']);
      $file_ext=strtolower(end($tmp));
      $filepath = 'images/'.$file_name;
      $extensions= array("jpeg","jpg","png","pdf","xlsx","xls","docx","");
      
      if(in_array($file_ext,$extensions)=== false){
         $errors[]="extension not allowed, please choose a JPEG,PNG or PDF file.";
      }
      
      if($file_size > 2097152){
         $errors[]='File size must be excately 2 MB';
      }
      
      if(empty($errors)==true){
         move_uploaded_file($file_tmp,"images/".$file_name);
         
               }else{
         print_r($errors);
      }
   
     }
        $result = mysqli_query($mysqli, "INSERT INTO users(name,age,gender,birthdate,address,contact,model,visitingdate,expdate,mrp,file) VALUES('$name','$age','$gender','$birthdate','$address','$contact','$model','$visitingdate','$expdate','$mrp','$file_name')");
      //echo "<font color='green'>CUSTOMER ADDED SUCCESSFULLY.";
      echo "<h4><script language='javascript'>alert('CUSTOMER ADDED SUCCESSFULLY.');</script></h4>";


    echo "<form action='index.php'><h2 align='center'><button class='button'>VIEW USER</button></h2></form></body>";
    echo "<body style='background-color:gray'>";
    }
    
}
?>
<body background="">
</body>
</html>