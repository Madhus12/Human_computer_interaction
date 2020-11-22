<!DOCTYPE html>  
 <html>  
      <head>  
           <title>HCI project </title>  
           <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>  
           <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  
          <link rel="stylesheet" href="C:\xampp2\htdocs\HCI\style.css" />
          <style> 

h1,
h2,
h3,
h4 {
    margin: .1rem 0;
}

h1 {
    font-size: 2rem;
}

h2 {
    font-size: 1.5rem;
    padding-left: 20px;
}

h3 {
    font-size: 1.2rem;
    padding-left: 40px;
}

h4 {
    font-size: 1rem;
    font-style: italic;
    padding-left: 60px;
}

* {
  box-sizing: border-box;
}

input[type=text], select, textarea {
  width: 100%;
  padding: 12px;
  border: 1px solid #ccc;
  border-radius: 4px;
  resize: vertical;
}

label {
  padding: 12px 12px 12px 0;
  display: inline-block;
}

input[type=submit] {
  background-color: #4CAF50;
  color: white;
  padding: 12px 20px;
  border: none;
  border-radius: 4px;
  cursor: pointer;
  float: right;
}

input[type=submit]:hover {
  background-color: #45a049;
}

.container {
  border-radius: 5px;
  background-color: #f2f2f2;
  padding: 20px;
}

.col-25 {
  float: left;
  width: 25%;
  margin-top: 6px;
}

.col-75 {
  float: left;
  width: 75%;
  margin-top: 6px;
}

/* Clear floats after the columns */
.row:after {
  content: "";
  display: table;
  clear: both;
}

/* Responsive layout - when the screen is less than 600px wide, make the two columns stack on top of each other instead of next to each other */
@media screen and (max-width: 600px) {
  .col-25, .col-75, input[type=submit] {
    width: 100%;
    margin-top: 0;
  }
}
table {
  width:100%;
}
table, th, td {
  border: 1px solid black;
  border-collapse: collapse;
}
th, td {
  padding: 15px;
  text-align: left;
}
#t01 tr:nth-child(even) {
  background-color: #eee;
}
#t01 tr:nth-child(odd) {
 background-color: #fff;
}
#t01 th {
  background-color: black;
  color: white;
}
</style>
</style>  
      </head>  
      <body background="back1.jpg">  
           <br /><br />  
           <div class="container" style="width:500px;">  
                <b><h1 align="center">Welcome Kids for spelling game</h1></b>
                <br />  
               
                <form method="get" name="form" action="display_image1.php"> 
                
                <input type="submit" name="submit" id="insert" value="display_image" class="btn btn-info" /> 
                 </form><br>  

                <form method="get" name="form" action="display_image1.php"> 
                <input type="text" placeholder="Enter ID of the image" name="id"> 
                <input type="text" placeholder="Enter Speling of the image" name="spell"> 
                <input type="submit" name="check" id="check" value="check" class="btn btn-info" /> 
                </form>   
                <br />  
                <br />  
               
           </div>  
      </body>  
 </html>  

<?php  
 $connect = mysqli_connect("localhost", "root", "", "testing");  

 if(isset($_GET['submit']))
{
   Display();
}

 if(isset($_GET['check']))
{
   Display1();
}


 function Display1()
 {
        
  
      global $connect;
      $result = strtolower($_GET['spell']); 
       $resultid = $_GET['id'];
     
          
          $query1 = "SELECT spelling FROM tbl_images where id= $resultid";
          $result1 = mysqli_query($connect, $query1);
          
            
            while ($row = $result1->fetch_assoc())
             {
                
          if($result==$row['spelling'])
         {
            echo "<h1><font color=green><b>Correct spelling</b></font></h1>";
          }
          else 
          {
            echo "<h1><font color=red><b>Wrong spelling</b></font></h1>";
          } 
              }
         
}

 function Display()
 {
  
  
      global $connect;
          
          $query1 = "SELECT id FROM tbl_images";
          $result1 = mysqli_query($connect, $query1);
          
       

                $query = "SELECT * FROM tbl_images";
                   $result = mysqli_query($connect, $query); 
                while($row = mysqli_fetch_array($result))  
                {  
                        echo "<h1>"."id:" . $row["id"]. "</h1>";
                        echo '  
                          <table border="5">
                          <tr>  
                               <td>  
                                    <img src="data:image/jpeg;base64,'.base64_encode($row['name'] ).'" height="200" width="200" class="img-thumnail" />  

                               </td>  
                          </tr>  

                        </table>
                     ';  
                     
               // }  
 }  
}
 ?>  


