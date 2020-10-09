<?php
include_once("config.php");
 
if(isset($_POST['update']))
{    
    $id = $_POST['id'];
    
    $name=$_POST['name'];
    $age=$_POST['age'];
    $gender=$_POST['gender'];
    $address=$_POST['address'];    
    $contact=$_POST['contact'];
    $model=$_POST['model'];
    $visitingdate=$_POST['visitingdate'];
    $mrp=$_POST['mrp'];
    $file=$_POST['file_name'];
    $right_sph1 = $_POST['right_sph1'];
    $right_cyl1 = $_POST['right_cyl1'];
    $right_axis1 = $_POST['right_axis1'];
    $right_vn1 = $_POST['right_vn1'];
    $right_sph2 = $_POST['right_sph2'];
    $right_cyl2 = $_POST['right_cyl2'];
    $right_axis2 = $_POST['right_axis2'];
    $right_vn2 = $_POST['right_vn2'];
    $left_sph1 = $_POST['left_sph1'];
    $left_cyl1 = $_POST['left_cyl1'];
    $left_axis1 = $_POST['left_axis1'];
    $left_vn1 = $_POST['left_vn1'];
    $left_sph2 = $_POST['left_sph2'];
    $left_cyl2 = $_POST['left_cyl2'];
    $left_axis2 = $_POST['left_axis2'];
    $left_vn2 = $_POST['left_vn2'];
    
    if(empty($name) || empty($age) || empty($gender) || empty($address) || empty($contact) || empty($model) || empty($visitingdate)  || empty($mrp)) {           
        if(empty($name)) {
            echo "<font color='red'>Name field is empty.</font><br/>";
        }
        
        if(empty($age)) {
            echo "<font color='red'>Age field is empty.</font><br/>";
        }
        
        if(empty($gender)) {
            echo "<font color='red'>gender field is empty.</font><br/>";
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
         $result = mysqli_query($mysqli, "UPDATE contact_lens SET name='$name',age='$age',gender='$gender',address='$address',contact='$contact',model='$model',visitingdate='$visitingdate',mrp='$mrp',file='$file_name', right_sph1='$right_sph1',right_cyl1='$right_cyl1',right_axis1='$right_axis1',right_vn1='$right_vn1',right_sph2='$right_sph2',right_cyl2='$right_cyl2',right_axis2='$right_axis2',right_vn2='$right_vn2',left_sph1='$left_sph1',left_cyl1='$left_cyl1',left_axis1='$left_axis1',left_vn1='$left_vn1',left_sph2='$left_sph2',left_cyl2='$left_cyl2',left_axis2='$left_axis2',left_vn2='$left_vn2' WHERE id=$id");
        
        //redirectig to the display page. In our case, it is index.php
        header("Location: index.php");
    }
}
?>
<?php
//getting id from url
$id = $_GET['id'];
 
//selecting data associated with this particular id
$result = mysqli_query($mysqli, "SELECT * FROM contact_lens WHERE id=$id");
 
while($res = mysqli_fetch_array($result))
{
    $name = $res['name'];
    $age = $res['age'];
    $gender = $res['gender'];
    $address = $res['address'];
    $contact = $res['contact'];
    $model = $res['model'];
    $visitingdate = $res['visitingdate'];
    $mrp = $res['mrp'];
    $file = $res['file'];
    $right_sph1 = $res['right_sph1'];
    $right_cyl1 = $res['right_cyl1'];
    $right_axis1 = $res['right_axis1'];
    $right_vn1 = $res['right_vn1'];
    $right_sph2 = $res['right_sph2'];
    $right_cyl2 = $res['right_cyl2'];
    $right_axis2 = $res['right_axis2'];
    $right_vn2 = $res['right_vn2'];
    $left_sph1 = $res['left_sph1'];
    $left_cyl1 = $res['left_cyl1'];
    $left_axis1 = $res['left_axis1'];
    $left_vn1 = $res['left_vn1'];
    $left_sph2 = $res['left_sph2'];
    $left_cyl2 = $res['left_cyl2'];
    $left_axis2 = $res['left_axis2'];
    $left_vn2 = $res['left_vn2'];
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
</head>
 
<body>
<body background=".jpg" style='background-color:GRAY'>
     <form action="index.php">
        <h2 align="left">

  <button class="button">GO BACK</button>
  </h2>
</form>
    
    <br/><br/>
    
    <form name="form1" method="post" action="edit.php" enctype="multipart/form-data">
        <table align="center" width="40%" border="20">
            <tr> 
                <td><b>Name</b></td>
                <td><input type="text" name="name" value="<?php echo $name;?>"></td>
            </tr>
            <tr> 
                <td><b>Age</b></td>
                <td><input type="text" name="age" value="<?php echo $age;?>"></td>
            </tr>
            <tr> 
                <td><b>Gender</b></td>
                
                <td><select name="gender" required>
                <option value="" >----</option>
          <option value="male" >Male</option>
          <option value="female" >Female</option>
          <option value="other" >Other</option>
          </select></td>
            </tr>
           
            <tr> 
                <td><b>Address</b></td>
                <td><input type="text" name="address" value="<?php echo $address;?>"></td>
            </tr>
            <tr> 
                <td><b>Contact</b></td>
                <td><input type="text" name="contact" value="<?php echo $contact;?>"></td>
            </tr>
            <tr> 
                <td><b>Contact_Lens Type</b></td>
                <td><input type="text" name="model" value="<?php echo $model;?>"></td>
            </tr>
            <tr> 
                <td><b>Visiting date</b></td>
                <td><input type="date" name="visitingdate" value="<?php echo $visitingdate;?>" min="2020-01-01" max="2025-12-31"></td>
            </tr>
            
            <tr> 
                <td><b>MRP</b></td>
                <td><input type="text" name="mrp" value="<?php echo $mrp;?>"></td>
            </tr>
            <tr>  
            <td>
              <img src="lens.jpg">
            </td>          
   <td>         
 <table   align="center" style="width: 10%" border=3>
        <tr bgcolor='#AAAAAA'>
            <td style="width: 100px;" bgcolor='#00FF00'><b>RIGHT_SPH</b></td>
            <td style="width: 100px;"  bgcolor='#00FF00'><b>RIGHT_CYL</b></td>
            <td style="width: 100px;" bgcolor='#00FF00'><b>RIGHT_AXIS</b></td>
            <td style="width: 100px;" bgcolor='#00FF00'><b>RIGHT_V/N<b></td>
   
            

            
    </tr>
    <tr>
            <td bgcolor='#00FF00'><b><input style="width: 150px;"style="width: 90px;" type="text" name="right_sph1" value="<?php echo $right_sph1;?>"></b></td>
            <td bgcolor='#00FF00'><b><input style="width: 150px;"style="width: 90px;" type="text" name="right_cyl1" value="<?php echo $right_cyl1;?>"></b></td>
            <td bgcolor='#00FF00'><b><input style="width: 150px;"style="width: 90px;" type="text" name="right_axis1" value="<?php echo $right_axis1;?>"></b></td>
            <td bgcolor='#00FF00'><b><input style="width: 150px;"style="width: 90px;" type="text" name="right_vn1" value="<?php echo $right_vn1;?>"><b></td>

    </tr>
    <tr>
            <td bgcolor='#00FF00'><b><input style="width: 150px;"style="width: 90px;" type="text" name="right_sph2" value="<?php echo $right_sph2;?>"></b></td>
            <td bgcolor='#00FF00'><b><input style="width: 150px;"style="width: 90px;" type="text" name="right_cyl2" value="<?php echo $right_cyl2;?>"></b></td>
            <td bgcolor='#00FF00'><b><input style="width: 150px;"style="width: 90px;" type="text" name="right_axis2" value="<?php echo $right_axis2;?>"></b></td>
            <td bgcolor='#00FF00'><b><input style="width: 150px;"style="width: 90px;" type="text" name="right_vn2" value="<?php echo $right_vn2;?>"><b></td>

    </tr>

            
</table>

    <table  align="center" style="width: 10%" border=3>
        <tr>
          
            <td bgcolor='#00FF00'><b>LEFT_SPH<b></td>
            <td bgcolor='#00FF00'><b>LEFT_CYL<b></td>
            <td bgcolor='#00FF00'><b>LEFT_AXIS<b></td>
            <td bgcolor='#00FF00'><b>LEFT_V/N<b></td> 
        </tr>
        <tr>
          
            <td bgcolor='#00FF00'><b><input style="width: 150px;"style="width: 90px;" type="text" name="left_sph1" value="<?php echo $left_sph1;?>"></b></td>
            <td bgcolor='#00FF00'><b><input style="width: 150px;"style="width: 90px;" type="text" name="left_cyl1" value="<?php echo $left_cyl1;?>"></b></td>
            <td bgcolor='#00FF00'><b><input style="width: 150px;"style="width: 90px;" type="text" name="left_axis1" value="<?php echo $left_axis1;?>"></b></td>
            <td bgcolor='#00FF00'><b><input style="width: 150px;"style="width: 90px;" type="text" name="left_vn1" value="<?php echo $left_vn1;?>"><b></td> 
        </tr>
         <tr>
          
            <td bgcolor='#00FF00'><b><input style="width: 150px;"style="width: 90px;" type="text" name="left_sph2" value="<?php echo $left_sph2;?>"></b></td>
            <td bgcolor='#00FF00'><b><input style="width: 150px;"style="width: 90px;" type="text" name="left_cyl2" value="<?php echo $left_cyl2;?>"></b></td>
            <td bgcolor='#00FF00'><b><input style="width: 150px;"style="width: 90px;" type="text" name="left_axis2" value="<?php echo $left_axis2;?>"></b></td>
            <td bgcolor='#00FF00'><b><input style="width: 150px;"style="width: 90px;" type="text" name="left_vn2" value="<?php echo $left_vn2;?>"><b></td> 
        </tr>
    
        </table>
</td>
</tr>
            <tr> 
                <td><b>File</b></td>
                <td><form action="" method="get" enctype="multipart/form-data">
                <input type="file" name="image" value="<?php echo $file;?>"  >
                
                </form></td>

            </tr>
            <tr>
                <td><input type="hidden" name="id" value=<?php echo $_GET['id'];?>></td>
                <td><input class="button" type="submit" name="update" value="Update"></td>
            </tr>
        </table>
    </form>
</body>
</html>
