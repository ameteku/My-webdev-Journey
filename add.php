<?php
   include ('config/wd_connect.php');
?>

<style>
    .errors{
        background-color:brown
    }

</style>
<?php
$title=$email=$ingredients='';

$errors = array('email'=>'', 'title'=>'', 'ingredients'=>'');

 if(isset($_POST['submit']))
 {
     $title = $_POST['title'];
     $email = $_POST['email'];
     $ingredients = $_POST['ingredients'];
     //checl email
     if(empty($_POST['email']))
     {
         $errors['email']= 'Email is required <br/>';
     }
     else{
        $email = $_POST['email'];
        if(!filter_var($email,FILTER_VALIDATE_EMAIL))
        {
            $errors['email']= 'not an email!';
        }
         echo '<br/>';
     }
     //check title
     if(empty($_POST['title']))
     {
        $errors['title']= 'Title is required <br/>';
     }
     else{
        echo htmlspecialchars($_POST['title']);
         echo '<br/>';
     }
     
     //check ingredients
     if(empty($_POST['ingredients']))
     {
        $errors['ingredients']= 'Ingredients is required <br/>';
     }
     else{
         echo htmlspecialchars($_POST['ingredients']);
         echo '<br/>';
         
     }
 }
?>
<!DOCTYPE html>
<html>

<?php include 'template/head.php'?>

<section class = "container grey-text">
    <h4 class  ="center">Add a pizza</h4>
    <form class = "white" action = "add.php" method="POST">
        <label>Your email:</label>
        <input type= "text" name = "email" value=<?php echo $email?>>
        <div name= "errors" class= "red-text"><?php echo $errors['email']?></div>
        <label>Pizza Title:</label>
        <input type= "text" name = "title" value=<?php echo $title?> >
        <div name= "errors" class= "red-text"><?php echo $errors['title']?></div>
        <label>Ingredients(comma separated):</label>
        <input type= "text" name = "ingredients" value=<?php echo $ingredients?> >
        <div name= "errors" class= "red-text"><?php echo $errors['ingredients']?></div>
        <div class = "center">
            <input type = "submit" name= "submit" value = "submit" class= "btn vrand z-depth-0">
        </div>

    </form>
</section>

<?php 
if(isset($_POST['submit']))
{
    
    if(!array_filter($errors))
    {
        $email = mysqli_real_escape_string($conn,$_POST['email']);
        $title = mysqli_real_escape_string($conn,$_POST['title']);
        $ingredients=mysqli_real_escape_string($conn,$_POST['ingredients']); 

        //create sql

        $sql = "INSERT INTO pizza(title,email,Ingredients) VALUES('$title','$email','$ingredients')";

        //save to db and check

        if(mysqli_query($conn,$sql)){
            header('Location: firstph.php');
        }
        else{
            echo "query error: ". mysqli_error($conn);
        }
        
    }
    else echo "There are errors in the form";
}
?>

<?php include 'template/footer.php' ?>
</html>