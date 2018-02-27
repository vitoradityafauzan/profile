<?php
//fetch.php
$connect = mysqli_connect("localhost", "root", "", "magang");
$output = '';
if(isset($_POST["query"]))
{
 $search = mysqli_real_escape_string($connect, $_POST["query"]);
 $query = "
  SELECT * FROM biodata 
  WHERE fname LIKE '%".$search."%'
  OR lname LIKE '%".$search."%' 
 ";
 $bad = ("cunt")("fuck");
}
else
{
 $query = "
  SELECT * FROM biodata ORDER BY id";
}
$result = mysqli_query($connect, $query);
if(mysqli_num_rows($result) > 0)
{
 $output .= '
  <div class="table-responsive">
   <table class="table table bordered">
    <tr>
     <th>First Name</th>
     <th>Last Name</th>
    </tr>
 ';
 while($row = mysqli_fetch_array($result))
 {
  $output .= '
  <tr>
    <td>'.$row["fname"].'</td>
    <td>'.$row["lname"].'</td>
  </tr>
  ';
 }
 echo $output;
}
elseif ($row = $bad) {
  echo "very funny ha ha";
}
else
{
 echo 'Data Not Found';
}

?>