<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<!-- ////////////Q1/////////////// -->
    <form method="get" action='welcome.php' >
    password: <input type="text" name="name"><br>
    E-mail:   <input type="text" name="email"><br> 
              <input type="submit">
    </form>

    <?php
        if($_SERVER["REQUEST_METHOD"] == "GET"){
            echo "it's a GET method";
        } else{ echo "it's a POST method";}
        echo "<hr>";
    ?>
    
<!-- ////////////Q2/////////////// -->
    <br>
    <form>
    <label for="url">Enter an https:// URL:</label>

    <input type="url" name="url" 
        placeholder="https://example.com"
        pattern="https://.*" >
        <br>
        <input type='submit' value="GO">
        </form>
        
        <?php 
            if (isset($_POST['url'])){
                $url=$_POST['url'];
                header ("location:$url");
            }
        
        ?>

<!-- ////////////Q3/////////////// -->
    <br>
    <?php
        echo "<hr>";
        $num1 = $_POST['first_num'];
        $num2 = $_POST['second_num'];
        $operator = $_POST['operator'];
        $result = '';
        if (is_numeric($num1) && is_numeric($num2)) {
            switch ($operator) {
                case "Add":
                $result = $num1 + $num2;
                    break;
                case "Subtract":
                $result = $num1 - $num2;
                    break;
                case "Multiply":
                    $result = $num1 * $num2;
                    break;
                case "Divide":
                    $result = $num1 / $num2;
            }
        }
        // echo "<hr>";
    ?>

    <div id="page-wrap">
	
	  <form action="" method="post" id="quiz-form">
            <p>
                <input type="number" name="first_num" id="first_num" required="required" value="<?php echo $num1; ?>" /> <b>First Number</b>
            </p>
            <p>
                <input type="number" name="second_num" id="second_num" required="required" value="<?php echo $num2; ?>" /> <b>Second Number</b>
            </p>
            <p>
                <input readonly="readonly" name="result" value="<?php echo $result; ?>"> <b>Result</b>
            </p>
            <input type="submit" name="operator" value="Add" />
            <input type="submit" name="operator" value="Subtract" />
            <input type="submit" name="operator" value="Multiply" />
            <input type="submit" name="operator" value="Divide" />
	  </form>
    </div>
        
    <!-- ////////////Q5/////////////// -->
    <br>
    <?php
    echo "<hr>";
    echo $_SERVER['PHP_SELF']; //SCRIPT NAME
    // echo $_SERVER['']; //PROJECT NAME
    echo "<br>";
    echo $_SERVER['REQUEST_TIME'];//time requste
    
    ?>
    
        
    <!-- ////////////Q7+8/////////////// -->
    <br>
    
    <?PHP
    echo "<hr>";
    session_start();
 
    if(isset($_SESSION['views'])){
        $_SESSION['views'] = $_SESSION['views']+ 1;
    }else{
        $_SESSION['views'] = 1;
    }
    echo "Total page views = ". $_SESSION['views'];
    echo "<hr><div align=\"center\">";
    
    echo "</div>";
    
  ///////////////Q2+Q4+Q9////////////////////////
?>
<!-- ////////////Q9/////////////// -->
<?php
if (count($_COOKIE) > 0) {
    echo " cookie is set";
} else {
    echo "cookie is not set";
}


setcookie("firstTask", "TASK", time() + 86400, "/",TRUE,TRUE);

echo "<pre>";
print_r($_COOKIE);
echo time();?>
<!-- ////////////////////////////////////////////////// -->

<form method="post" action="index.php">
		<input type="text" name="task" required>
		<input type="submit" name="addTask" value= "Add Task"/>
        <?php
// session_start();
if (isset($_POST["addTask"])) {
    if (isset($_SESSION["tasks"])) {
        array_push($_SESSION["tasks"],$_POST["task"]);
    }else{
        $_SESSION["tasks"] = array($_POST["task"]);
    }
}
if (isset($_SESSION["tasks"])){
    foreach($_SESSION["tasks"] as $task){
        echo "<p>$task</p>";
    }
}
        ?>
	</form>




?>
    <br>
</body>
</html>