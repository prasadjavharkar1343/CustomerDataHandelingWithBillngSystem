<?php
include_once("config.php");
 
$id = $_GET['id'];
$result = mysqli_query($mysqli, "SELECT right_sph1,right_cyl1,right_axis1,right_vn1 FROM specs where id=$id"); 
$result2 = mysqli_query($mysqli, "SELECT right_sph2,right_cyl2,right_axis2,right_vn2 FROM specs where id=$id");
$result3 = mysqli_query($mysqli, "SELECT left_sph1,left_cyl1,left_axis1,left_vn1 FROM specs where id=$id"); 
$result4 = mysqli_query($mysqli, "SELECT left_sph2,left_cyl2,left_axis2,left_vn2 FROM specs where id=$id");
?>

<!DOCTYPE html>
<head>
<b>
<u>
<h1 align="center" >
<font color="blue">WELCOME TO THE SAMARTH OPTICAL CO.</font>
</h1>
</u>
</b>
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
table {
  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 50%;
  
}


tr:nth-child(even) {
  background-color: #dddddd;

}
</style>
</head>
<body style='background-color:gray'>
  <h3><button class="button" onclick="myFunction()">Go Back</a></button></h3>
<script >
  function myFunction() {
    location.replace("index.php")
    }

</script>
<h3>N</h3>

  <table  class="" align="" style="width: 10%" border=3>
 
        <tr bgcolor='#AAAAAA'>
            <td bgcolor='#00FF00'><b>RIGHT_SPH</b></td>
            <td bgcolor='#00FF00'><b>RIGHT_CYL</b></td>
            <td bgcolor='#00FF00'><b>RIGHT_AXIS</b></td>
            <td bgcolor='#00FF00'><b>RIGHT_V/N<b></td>
   
            

            <h1 align="center" ></h1>
    </tr>
    <tr>
               <?php 
        
        while($res = mysqli_fetch_array($result)) 
        {         
            echo "<tr>";
            echo "<td bgcolor='#AAAAAA'>".$res['right_sph1']."</td>";
            echo "<td bgcolor='#AAAAAA'>".$res['right_cyl1']."</td>";
            echo "<td bgcolor='#AAAAAA'>".$res['right_axis1']."</td>";    
            echo "<td bgcolor='#AAAAAA'>".$res['right_vn1']."</td>";            
        }
        ?>

    </tr>
        <tr>
               <?php 
        
        while($res = mysqli_fetch_array($result2)) 
        {         
            echo "<tr>";
            echo "<td bgcolor='#AAAAAA'>".$res['right_sph2']."</td>";
            echo "<td bgcolor='#AAAAAA'>".$res['right_cyl2']."</td>";
            echo "<td bgcolor='#AAAAAA'>".$res['right_axis2']."</td>";    
            echo "<td bgcolor='#AAAAAA'>".$res['right_vn2']."</td>";            
        }
        ?>

    </tr>

    

        <tr>
          
            <td bgcolor='#00FF00'><b>LEFT_SPH<b></td>
            <td bgcolor='#00FF00'><b>LEFT_CYL<b></td>
            <td bgcolor='#00FF00'><b>LEFT_AXIS<b></td>
            <td bgcolor='#00FF00'><b>LEFT_V/N<b></td> 
        </tr>
    <tr>
               <?php 
        
        while($res = mysqli_fetch_array($result3)) 
        {         
            echo "<tr>";
            echo "<td bgcolor='#AAAAAA'>".$res['left_sph1']."</td>";
            echo "<td bgcolor='#AAAAAA'>".$res['left_cyl1']."</td>";
            echo "<td bgcolor='#AAAAAA'>".$res['left_axis1']."</td>";    
            echo "<td bgcolor='#AAAAAA'>".$res['left_vn1']."</td>";            
        }
        ?>

    </tr>
        <tr>
               <?php 
        
        while($res = mysqli_fetch_array($result4)) 
        {         
            echo "<tr>";
            echo "<td bgcolor='#AAAAAA'>".$res['left_sph2']."</td>";
            echo "<td bgcolor='#AAAAAA'>".$res['left_cyl2']."</td>";
            echo "<td bgcolor='#AAAAAA'>".$res['left_axis2']."</td>";    
            echo "<td bgcolor='#AAAAAA'>".$res['left_vn2']."</td>";            
        }
        ?>

    </tr>
    </table>
  </code>
</div>
</body>
</html>
