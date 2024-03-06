
<?php

$conn = mysqli_connect("localhost","root","","test") or die("connection feild");

$sql = "SELECT * FROM students";
$query = mysqli_query($conn,$sql) or die("query feild");

if(mysqli_num_rows($query) > 0){
    $output = "";

  $output .= '<table border="0" cellpading="0" cellpading="10px" width="100%">
                    <tr>
                            <th> </th>
                            <th> id </th>
                            <th> Name</th>
                    </tr>';

                    
                while($row = mysqli_fetch_assoc($query)){
                 $output .= "<tr>
                  <td> <input type='checkbox' value='{$row['id']}'> </td>
                  <td> {$row["id"]} </td>
                  <td>{$row["first_name"]} {$row["last_name"]} </td>
                   </tr>";
                }
      $output .= "</table>";
        
}else{
  echo "No Record Found";
}
          

echo $output;

?>