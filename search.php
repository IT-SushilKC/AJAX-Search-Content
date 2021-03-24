<?php
$search_value = $_POST["search"];
$conn = mysqli_connect("localhost", "root", "", "test") or die("The connection is failed");

$sql = "SELECT * FROM student WHERE first_name LIKE '%{$search_value}%' OR last_name LIKE '%{$search_value}%'";
$result = mysqli_query($conn, $sql) or die("The Query is failed");
$output = "";
if(mysqli_num_rows($result) > 0){
    $output = '<table border="1" width="100%" cellspacing="0" cellpadding="10px">
    <tr>
       <th>ID</th>
       <th>Name</th>
       </tr>
    ';
    while($row = mysqli_fetch_assoc($result)){
        $output .="<tr><td>{$row["id"]}</td><td>{$row["first_name"]}{$row["last_name"]}</td></tr>";
    }
    $output .= "</table>";
    mysqli_close($conn);
    echo"$output";
}else{
   echo"No record Found";
}

?>