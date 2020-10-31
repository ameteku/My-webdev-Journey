<?php
 include('config/wd_connect.php');

$sql = 'SELECT  title,Ingredients,id FROM pizza ';

//make query and get result
$result =mysqli_query($conn,$sql);

//fetch the resulting  rows  as an array
$pizzas = mysqli_fetch_all($result, MYSQLI_ASSOC);
//print_r($pizzas);

mysqli_free_result($result);

mysqli_close($conn);
 ?>

<html>

  
  <?php include 'template/head.php';?>

  <h4 class = "center gray-text"> Pizzas! </h4>

  <div class='container center'>
    <div class="row">
      <?php foreach($pizzas as $pizza): ?>

        <div class= "col s6 md3"> 
          <div class = 'card z-depth-6'>
            <div class = "card-content">
              <h6><?php echo htmlspecialchars($pizza['title']);?> </h6> 
              <h6>
                <ul>
                <?php
                
               $ingred_arr=explode(',',$pizza['Ingredients']) ;
               foreach ($ingred_arr as $arr):?>

               <li><?php echo htmlspecialchars($arr);?></li>
               <?php endforeach;?>
                </ul>
              </h6> 
            </div>
            <div class='card-action center-align'>
            <button name= 'remove' onclick=<?php  ?>>remove</button>
               <a a.brand-text href='Details.php?id=<?php echo $pizza['id'];?>'>more Info</a>                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                 
            </div>
          </div>
        </div>
      <?php endforeach?>
    </div>

  </div>
  
  <?php include 'template/footer.php';?>

  </body>
  </html>