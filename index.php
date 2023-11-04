<?php
session_start();
    function rollD20() {
        return mt_rand(1,20);
    }

    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['roll'])){
        $rollResult = rollD20();
        $imagePath = "images/d20_" . $rollResult . ".png";
        $_SESSION['rollResult'] = $rollResult;
        $_SESSION['imagePath'] = $imagePath;
    }

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>20 Side Die</title>
</head>
<body>
    <h1> Roll a 20-side die </h1>
    Goal of Site: Create a 20 side die to roll randomly generated number.

    <?php
        if (isset($_SESSION['rollResult'])){
            echo "<p>You rolled a " . $_SESSION['rollResult']. " on the d20!</p>";
            echo "<img src='" . $_SESSION['imagePath'] . "' alt='D20 result'>";
        }
    ?>

    <form method="post" id="rollForm">
        <input type="submit" name="roll" value="Roll the D20">
    </form>
    
    <?php
        if (isset($_SESSION['rollResult'])) {
            unset($_SESSION['rollResult']);
            unset($_SESSION['imagePath']);
        }
    ?>

</body>
</html>