<?php
//fetch.php
$connect = mysqli_connect("localhost", "root", "", "jja");
mysqli_set_charset($connect,'utf8');
$query = "SELECT idres, domedif, cui, ut FROM escuelas_res ORDER BY domedif";

$result = mysqli_query($connect, $query);

$data = array();

if(mysqli_num_rows($result) > 0){
	 echo 'var multiple=[';
 while($row = mysqli_fetch_assoc($result)) {
	 
  echo '"' . $row["idres"] . '|' . $row["domedif"] . '|' . $row["cui"] . '|' . $row["ut"] . '|",';
 
 }

echo '"' . "1" . '|' . "ESC" . '|"];';
}
?>
