<?php
include_once("config.php");
 
if(isset($_POST['update']))
{    
    $id = $_POST['id'];
    
    $name=$_POST['name'];
    $age=$_POST['age'];
    $gender=$_POST['gender'];
    $birthdate=$_POST['birthdate'];
    $address=$_POST['address'];    
    $contact=$_POST['contact'];
    $model=$_POST['model'];
    $visitingdate=$_POST['visitingdate'];
    $expdate=$_POST['expdate'];
    $mrp=$_POST['mrp'];
    $file=$_POST['file_name'];
    
    if(empty($name) || empty($age) || empty($gender) || empty($birthdate) || empty($address) || empty($contact) || empty($model) || empty($visitingdate) || empty($expdate)  || empty($mrp)) {           
        if(empty($name)) {
            echo "<font color='red'>Name field is empty.</font><br/>";
        }
        
        if(empty($age)) {
            echo "<font color='red'>Age field is empty.</font><br/>";
        }
        
        if(empty($gender)) {
            echo "<font color='red'>gender field is empty.</font><br/>";
        }
        if(empty($birthdate)) {
            echo "<font color='red'>birthdate field is empty.</font><br/>";
        }
        if(empty($address)) {
            echo "<font color='red'>address field is empty.</font><br/>";
        }
        if(empty($contact)) {
            echo "<font color='red'>contact field is empty.</font><br/>";
        }
        if(empty($model)) {
            echo "<font color='red'>model field is empty.</font><br/>";
        }
        if(empty($visitingdate)) {
            echo "<font color='red'>visitingdate field is empty.</font><br/>";
        }
        if(empty($expdate)) {
            echo "<font color='red'>expdate field is empty.</font><br/>";
        }
        if(empty($mrp)) {
            echo "<font color='red'>MRP field is empty.</font><br/>";
        }
        /*if(empty($file)) {
            echo "<font color='red'>file field is empty.</font><br/>";
        }*/        
    } else {   
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
      $extensions= array("jpeg","jpg","png","pdf","xlsx","xls","docx");
      
      if(in_array($file_ext,$extensions)=== false){
         $errors[]="extension not allowed, please choose a JPEG or PNG file.";
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

        //updating the table
        $result = mysqli_query($mysqli, "UPDATE users SET name='$name',age='$age',gender='$gender',birthdate='$birthdate',address='$address',contact='$contact',model='$model',visitingdate='$visitingdate',expdate='$expdate',mrp='$mrp',file='$file_name' WHERE id=$id");
        
        //redirectig to the display page. In our case, it is index.php
        header("Location: index.php");
    }
}
?>
<?php
//getting id from url
$id = $_GET['id'];
 
//selecting data associated with this particular id
$result = mysqli_query($mysqli, "SELECT * FROM users WHERE id=$id");
 
while($res = mysqli_fetch_array($result))
{
    $name = $res['name'];
    $age = $res['age'];
    $gender = $res['gender'];
    $birthdate = $res['birthdate'];
    $address = $res['address'];
    $contact = $res['contact'];
    $model = $res['model'];
    $visitingdate = $res['visitingdate'];
    $expdate = $res['expdate'];
    $mrp = $res['mrp'];
    $file = $res['file'];
}
?>
<html>
<head>  
<style>
.button {
  display: inline-block;
  padding: 15px 25px;
  font-size: 20px;
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
    <title>Edit Data</title>
    <b>
<u>
<h1 align="center" >
<font color="blue">WELCOME TO THE SAMARTH OPTICAL CO.</font>
</h1>
</u>
</b>
</head>
 
<body>
<u><body background=".jpg">
    
  <body style='background-color:GRAY'>
        <form action="index.php">
        <h2 align="left">

  <button class="button">GO BACK</button>
  </h2>
</form>
    <br/><br/>
 
    <form name="form1" method="post" action="edit.php" enctype="multipart/form-data">
        <table align="center"  border="5">
            <tr> 
                <td style="width: 150px;"><font color="white">Name</font></td>
        <td><input style="width: 632px;" type="text" name="name" value="<?php echo $name;?>" required></td>
            </tr>
            <tr> 
                <td style="width: 150px;"><font color="white">Age</font></td>
                <td><input style="width: 632px;" type="text" value="<?php echo $age;?>" name="age" required></td>
            </tr>
            <tr> 
                <td><font color="white" >Gender</font></td>
                <td>
                  <fieldset value="<?php echo $gender;?>">
      <div class="some-class" >
        <input type="radio" class="radio" name="gender" value="Male" required />
        <label for="male">Male</label>
        <input type="radio" class="radio" name="gender" value="Female" required />
        <label for="female">Female</label>
        <input type="radio" class="radio" name="gender" value="Other" required />
        <label for="other">other</label>
      </div>
    </fieldset>

      </td>
            </tr>
            <tr> 
                <td><font color="white">Birth Date</font></td>
                <td><input type="date" id="start" name="birthdate" value="<?php echo $birthdate;?>" min="1900-01-01" max="2025-12-31"></td>
            </tr>
            
            <tr> 
                <td><font color="white">Address</font></td>
                <td><input  style="width: 150px;"type="text" value="<?php echo $address;?>" name="address" required></td>
            </tr>
            <tr> 
                <td><font color="white">Contact No</font></td>
                <td><input style="width: 150px;"type="text" name="contact" value="<?php echo $contact;?>" required></td>
            </tr>
            <tr> 
                <td><font color="white">Model Type / No.</font></td>
                <td><input style="width: 150px;"type="text" name="model" value="<?php echo $model;?>" required></td>
            </tr>
            <tr> 
                <td><font color="white">Visiting Date</font></td>
                <td><input style="width: 150px;"type="date" id="start" name="visitingdate" value="<?php echo $visitingdate;?>" min="2020-01-01" max="2025-12-31" required></td>
            </tr>
            <tr> 
                <td><font color="white">Expiry Date</font></td>
                <td><input type="date" id="start" name="expdate" value="<?php echo $expdate;?>" min="2020-01-01" max="2025-12-31"></td>
            </tr>
            
            <tr> 
                <td><font color="white">MRP</font></td>
                <td><input style="width: 150px;"type="text" id="start" name="mrp" value="<?php echo $mrp;?>" required></td>
            </tr>

            <tr>
                <td><font color="white">File</font></td>
                <td> 
                <input style="width: 350px;"type="file" name="image" value="<?php echo $file;?>"/>
                </td>
            </tr>
            <tr> 
                <td><input type="hidden" name="id" value="<?php echo $_GET['id'];?>"></td>
                <td><input class="button" type="submit" name="update" value="Update"></td>
                
            </tr>
        </table>
    
               
    
    </form>
</body>
</html>


