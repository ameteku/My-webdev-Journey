<!DOCTYPE html>
<?php

function calculations( $fnum= 0, $snum = 0,  $option = 0)
{
    switch($option)
    {
        case "+":
            return $fnum + $snum;
        break;
        case "/":
            return $fnum / $snum;
        break;
        case "*":
            return $fnum *$snum;
        break;
        case "%":
            return $fnum % $snum;
        break;
        case "-":
            return $fnum -$snum;
        break;
        default:
        return 0;
    }
}

?>
<html>

<title>Michaels php Calculator</title>


<body>
    <form action = "webcalc.php" method = "GET">
        <label >First Number</label><br/>
        <input type = "number" name = "fnum" required><br/>
        <label >Second Number</label><br/>
        <input type = "number" name = "snum" required>

        <ul>
            <input type = "submit" name = "plus" value = '+' >
            <input type = "submit" name = "minus" value = '-'>
            <input type = "submit" name = "divide" value = "/">
            <input type = "submit" name = "remainder" value = "%">
            <input type = "submit" name = "product" value = "*">
        </ul>
    </form>


    <?php
    $answer = 5;
    try{

    if(isset($_GET["plus"]))
    {
        $answer = calculations($_GET['fnum'],$_GET['snum'],$_GET['plus']);
    }
    if(isset($_GET["minus"]))
    {
        $answer = calculations($_GET['fnum'],$_GET['snum'],$_GET['minus']);
    }
    if(isset($_GET["divide"]))
    {
        if($_GET['snum']=='0')
        {
            print("divisor cannot be zero");
        }
        else
        $answer = calculations($_GET['fnum'],$_GET['snum'],$_GET['divide']);
    }
    if(isset($_GET["remainder"]))
    {
        if($_GET['fnum'])
        $answer = calculations($_GET['fnum'],$_GET['snum'],$_GET['remainder']);
    }
    if(isset($_GET["product"]))
    {
        $answer = calculations($_GET['fnum'],$_GET['snum'],$_GET['product']);
    }
    }
    catch(Exception $e )
    {
        if(!is_numeric($_GET['snum']) ||!is_numeric($_GET['snum']))
        {
            echo "Enter a valid number";
        }
    }
    ?>

<input type = "number" value = "<?php echo $answer ?>" readonly>
</body>
</html>