<?php

include ('config/wd_connect.php');
if(isset($_GET('id')))
{
    $id = mysqli_real_escape_string($conn,$_GET['id']);
    
$sql = 'SELECT id FROM pizza';
$result = mysqli_query($conn,$sql);

$pizza = mysqli_fetch_all($result);

}
?>


<!DOCTYPE html>
<html>
<?php include ('template/head.php');?>
<h2>Deatils  </h2>
<?php include ('template/footer.php');?>
</html>