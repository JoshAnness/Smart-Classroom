<?php  
//export.php  
$connect = mysqli_connect("localhost", "root", "", "smartclassroom");
$output = '';
if(isset($_POST["export"]))
{
 $query = "SELECT * FROM signoutlog";
 $result = mysqli_query($connect, $query);
 if(mysqli_num_rows($result) > 0)
 {
  $output .= '
   <table class="table" bordered="1">  
                    <tr>  
                         <th>Id</th>  
                         <th>Name</th>  
                         <th>Teacher</th>  
       <th>Place</th>
	   <th>Time Out</th>
	   <th>Date Out</th>
	   <th>Time In</th>
	   <th>Date In</th>
                    </tr>
  ';
  while($row = mysqli_fetch_array($result))
  {
   $output .= '
    <tr>  
                         <td>'.$row["id"].'</td>  
                         <td>'.$row["name"].'</td>  
                         <td>'.$row["teacher"].'</td>  
       <td>'.$row["place"].'</td>  
	   <td>'.$row["timeout"].'</td>
	   <td>'.$row["dateout"].'</td>
	   <td>'.$row["timein"].'</td>
	   <td>'.$row["datein"].'</td>
                    </tr>
   ';
  }
  $output .= '</table>';
  header('Content-Type: application/xls');
  header('Content-Disposition: attachment; filename=download.xls');
  echo $output;
 }
}
?>