    <?php
    session_start();


    require_once 'includes/dbh.inc.php';

    require_once 'classes/RollD20.php';

        if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['roll'])){
            //weighted roll
            require_once 'includes/rollWeights.php';

            //roll the d20
            $d20 = new RollD20($rollWeights);
            $rollResult = $d20->roll();
            $imagePath = "images/d20_" . $rollResult . ".png";

            //insert roll into database
            $query = "INSERT INTO rolls (roll_result) VALUES (:rollResult);";
            $stmt = $pdo->prepare($query);
            $stmt->bindParam(":rollResult", $rollResult);
            $stmt->execute();

            $_SESSION['rollResult'] = $rollResult;
            $_SESSION['imagePath'] = $imagePath;

        }elseif (isset($_POST['reset'])) {
            //Reset rolls in table and the id's with it
            $query = "TRUNCATE TABLE rolls;";
            $stmt = $pdo->prepare($query);
            $stmt-> execute();
            echo "<p>All rolls have been reset.</p>";
        }

    //Fetch all rolls in database
    $query = "SELECT id, roll_result, timestamp FROM rolls ORDER BY id ASC;";
    $stmt = $pdo->prepare($query);
    $stmt->execute();
    $rolls = $stmt->fetchAll(PDO::FETCH_ASSOC);
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
            <input type="submit" name="reset" value="Reset Rolls">
        </form>
        
        <?php if (!empty($rolls)): ?>
            <h2>Roll History</h2>
            <table border="1" cellpadding="5"cellspacing="0">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Roll Result</th>
                        <th>Time</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($rolls as $roll): ?>
                        <tr>
                            <td><?= $roll['id']; ?></td>
                            <td><?= $roll['roll_result']; ?></td>
                            <td><?= $roll['timestamp']; ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        <?php else: ?>
            <p>No rolls yet</p>
        <?php endif; ?>


        <?php
            if (isset($_SESSION['rollResult'])) {
                unset($_SESSION['rollResult']);
                unset($_SESSION['imagePath']);
            }
        ?>

    </body>
    </html>