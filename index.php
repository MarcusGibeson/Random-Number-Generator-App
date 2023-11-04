<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1> Roll a 20-side dice </h1>
    Goal of Site: Create a 20 side die to roll randomly generated number.

    <?php
        function rollD20() {
            return mt_rand(1,20);
        }

        if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['roll'])){
            $rollResult = rollD20();
            $imagePath = "images/d20_" . $rollResult . ".png";
            echo "<p>You rolled a $rollResult on the d20!</p>";
            echo "<img src='$imagePath' alt='D20 result'>";
        }

    ?>

    <form method="post" id="rollForm">
        <input type="submit" name="roll" value="Roll the D20">
    </form>

    <script> 
        var form = document.getElementById('rollForm');
        var resultContainer = document.getElementById('resultContainer');
        
        document.getElementById('rollForm').addEventListener('submit', function (e) {
            e.preventDefault();
            var xhr = new XMLHttpRequest();
            xhr.open('POST', form.action, true);
            xhr.onload = function () {  
                if (xhr.status === 200) {
                    resultContainer.innerHTML = xhr.responseText;
                }
            };
            xhr.send(new FormData(form));
        });
        </script>
        <div id="resultContainer"></div>
</body>
</html>