<?php
include_once("config.php");
 

$result = mysqli_query($mysqli, "SELECT * FROM specs ORDER BY id DESC"); 
?>
 
<html>
<head> 
<title>Customer Data</title>
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
</head>
 <h2 align="center">
        <button class="button" onclick="myFunction2()">SEARCH CUSTOMER</button>
  <button class="button" onclick="myFunction3()">ADD NEW CUSTOMER DATA</button>
  </h2>
    <h3><button class="button" onclick="myFunction()">Dashboard</a></button></h3>
    <script>
    function myFunction() {
    location.replace("../main.html")
    }

    function myFunction2() {
    location.replace("searchCust.php")
    }

    function myFunction3() {
    location.replace("add.html")
    }
    </script>
<body>
	<body background=".jpg">
	<div  style="overflow-x:auto;">
    <table align="center" width='100%' border=5>
      <thead>
        <tr bgcolor='#AAAAAA'>
          <th bgcolor='#00FF00'><b>Sr.No</b></th>
            <th bgcolor='#00FF00'><b>Customer Name</b></th>
            <th bgcolor='#00FF00'><b>Age</b></th>
            <th bgcolor='#00FF00'><b>Gender</b></th>
            <th bgcolor='#00FF00'><b>Address<b></th>
            <th bgcolor='#00FF00'><b>Contact No<b></th>
            <th bgcolor='#00FF00'><b>Specs Type<b></th>
            <th bgcolor='#00FF00'><b>Visiting Date<b></th>    
            <th bgcolor='#00FF00'><b>MRP<b></th>
            <th bgcolor='#00FF00'><b>File<b></th>
              <th bgcolor='#00FF00'><b>Specs_No.</b></th>
            <th bgcolor='#00FF00'><b>Update<b></th> 
            <th bgcolor='#00FF00'><b>PDF<b></th>       
		</tr>
    </thead>
        <?php 
        
        while($res = mysqli_fetch_array($result)) {  
                   
            echo "<tr>";
            echo "<td></td>";
            echo "<td bgcolor='#AAAAAA'>".$res['name']."</td>";
            echo "<td bgcolor='#AAAAAA'>".$res['age']."</td>";
            echo "<td bgcolor='#AAAAAA'>".$res['gender']."</td>";    
            echo "<td bgcolor='#AAAAAA'>".$res['address']."</td>";
            echo "<td bgcolor='#AAAAAA'>".$res['contact']."</td>";
            echo "<td bgcolor='#AAAAAA'>".$res['model']."</td>";
            echo "<td bgcolor='#AAAAAA'>".$res['visitingdate']."</td>";
            echo "<td bgcolor='#AAAAAA'>".$res['mrp']."</td>";
            echo "<td bgcolor='#AAAAAA'>".$res['file']." <a href=\"images/".$res['file']."\" download=\"\" onClick=\"return confirm('Are you sure you want to Download?')\">Download</a></td>";

            //contact lens table

            echo "<td bgcolor='#AAAAAA'><a href=\"contact_table.php?id=$res[id]\">Show_Specs_No</a></td>";
            //  


            //echo "<td bgcolor='#AAAAAA'><a href=\"edit.php?id=$res[id]\">UPDATE</a> | <a href=\"delete.php?id=$res[id]\" onClick=\"return confirm('Are you sure you want to Delete?')\">Delete</a></td>";        
            echo "<td bgcolor='#AAAAAA'><a href=\"edit.php?id=$res[id]\">UPDATE</a> | <a href=\"delete.php?id=$res[id]\" onClick=\"return confirm('Are you sure you want to Delete?')\">Delete</a></td>";
            echo "<td bgcolor='#AAAAAA'><a href=\"index-pdf.php?id=$res[id]\"><img src='pdf.png'></a></td>";
			echo "<body style='background-color:gray'>";
        }
        ?>
            
    </table>
</div>
	
</body>
</html>