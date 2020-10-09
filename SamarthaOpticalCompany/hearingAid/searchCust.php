<!DOCTYPE html>
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

body
{
    counter-reset: Serial;           /* Set the Serial counter to 0 */
}

table
{
    border-collapse: separate;
}

tr td:first-child:before
{
  counter-increment: Serial;      /* Increment the Serial counter */
  content: counter(Serial); /* Display the counter */
}
</style>  
<b>
<u>
<h1 align="center" >
<font color="blue">WELCOME TO THE SAMARTH OPTICAL CO.</font>

</h1>
</u>
</b>
  <title>Search Customer</title>
</head>
<body>
 <form action="index.php">
        <h2 align="left">

  <button class="button">GO BACK</button>
  </h2>
</form>

<form action="searchCust.php" method="post">
<h3 align="center">Enter Name of Customer to be Search</h3>
<h3 align="center"><input type="text" name="search" ></h3>
<h3 align="center">
<button class="button" type="submit" name="submit">Search</button>
</h3>
<table align="center" width='100%' border=5>
  <thead>
        <tr bgcolor='#AAAAAA'>
            <th bgcolor='#00FF00'><b>Sr.No</b></th>
            <th bgcolor='#00FF00'><b>Customer Name</b></th>
            <th bgcolor='#00FF00'><b>Age</b></th>
            <th bgcolor='#00FF00'><b>Gender</b></th>
            <th bgcolor='#00FF00'><b>Birth Date<b></th>
            <th bgcolor='#00FF00'><b>Address<b></th>
            <th bgcolor='#00FF00'><b>Contact No<b></th>
            <th bgcolor='#00FF00'><b>Model No<b></th>
            <th bgcolor='#00FF00'><b>Visiting Date<b></th>    
            <th bgcolor='#00FF00'><b>Expiry Date<b></th>
            <th bgcolor='#00FF00'><b>MRP<b></th>
            <th bgcolor='#00FF00'><b>File<b></th>
            <th bgcolor='#00FF00'><b>Update<b></th>
              <th bgcolor='#00FF00'><b>PDF<b></th>

            <h1 align="center" ></h1>
    </thead>
    </tr>
       <?php
include_once("config.php");

//echo "<br/><h6 align='left'><button class='button'><a href='index.php'>Home</a></button></h6>";
if(isset($_POST['submit'])) {
$search_value=$_POST['search'];
//$con=new mysqli($servername,$username,$password,$dbname);
if($mysqli->connect_error){
    echo 'Connection Faild: '.$con->connect_error;
    }else{
        $sql="select * from users where name like '%$search_value%'";

        $res=$mysqli->query($sql);

            while($row=$res->fetch_assoc()){
                  
            echo "<tr>";
            echo "<td></td>";
            echo "<td bgcolor='#AAAAAA'>".$row['name']."</td>";
            echo "<td bgcolor='#AAAAAA'>".$row['age']."</td>";
            echo "<td bgcolor='#AAAAAA'>".$row['gender']."</td>";    
            echo "<td bgcolor='#AAAAAA'>".$row['birthdate']."</td>";
            echo "<td bgcolor='#AAAAAA'>".$row['address']."</td>";
            echo "<td bgcolor='#AAAAAA'>".$row['contact']."</td>";
            echo "<td bgcolor='#AAAAAA'>".$row['model']."</td>";
            echo "<td bgcolor='#AAAAAA'>".$row['visitingdate']."</td>";
            echo "<td bgcolor='#AAAAAA'>".$row['expdate']."</td>";
            echo "<td bgcolor='#AAAAAA'>".$row['mrp']."</td>";
            echo "<td bgcolor='#AAAAAA'>".$row['file']." <a href=\"images/".$row['file']."\" download=\"\" onClick=\"return confirm('Are you sure you want to Download?')\">Download</a></td>";

            echo "<td bgcolor='#AAAAAA'><a href=\"edit.php?id=$row[id]\">UPDATE</a> | <a href=\"delete.php?id=$row[id]\" onClick=\"return confirm('Are you sure you want to Delete?')\">Delete</a></td>";  
            echo "<td bgcolor='#AAAAAA'><a href=\"index-pdf.php?id=$row[id]\"><img src='pdf.png'></a></td>";      
            echo "<body style='background-color:gray'>";
        }  
        }
        
      }

?>
            
    </table>




</form>
</body>
</html>