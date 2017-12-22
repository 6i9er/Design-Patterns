<?php
require __DIR__ . '/bootstrap.php';

use Service\Container;
use Model\RebelShip;
use Service\BattleManager;

$container = new Container($configuration);
$shipLoader = $container->getShipLoader();
$ships = $shipLoader->getShips();

$ship1Id = isset($_POST['ship1_id']) ? $_POST['ship1_id'] : null;
$ship1Quantity = isset($_POST['ship1_quantity']) ? $_POST['ship1_quantity'] : 1;
$ship2Id = isset($_POST['ship2_id']) ? $_POST['ship2_id'] : null;
$ship2Quantity = isset($_POST['ship2_quantity']) ? $_POST['ship2_quantity'] : 1;

if (!$ship1Id || !$ship2Id) {
    header('Location: index.php?error=missing_data');
    die;
}

if (!isset($ships[$ship1Id]) || !isset($ships[$ship2Id])) {
    header('Location: index.php?error=bad_ships');
    die;
}

if ($ship1Quantity <= 0 || $ship2Quantity <= 0) {
    header('Location: index.php?error=bad_quantities');
    die;
}

$ship1 = $shipLoader->findShipById($ship1Id);
$ship2 = $shipLoader->findShipById($ship2Id);

$battleManager = $container->getBattleManager();
$battleType = $_POST['battle_type'];
//var_dump($battleType);
$battleResult = $battleManager->battle($ship1, $ship1Quantity, $ship2, $ship2Quantity , $battleType);
//var_dump($battleResult);
//die;
?>

<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>OO Battleships</title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Audiowide' rel='stylesheet' type='text/css'>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>
<div class="container">
    <div class="page-header">
        <h1>OO Battleships of Space</h1>
    </div>
    <div>
        <h2 class="text-center">The Matchup:</h2>
        <p class="text-center">
            <br>
            <?php echo $ship1->getName(); ?>
            VS.
            <?php echo  $ship2->getName(); ?>
        </p>
    </div>
    <div class="result-box center-block">
        <h3 class="text-center audiowide">
            Winner:
            <?php if($battleResult->getDrowUp() == "1"){
                echo "both Fighters are equal in strength";
            }else{
                echo "<p>".$battleResult['winningShip']->getName()."</p>";
                echo "<p> Remaining damage is :".$battleResult->strength."</p>";
                echo "<p> did Ship use jedi Force : ".(($battleResult->getUsedJediPower()) ? 'yes' : 'no' )."</p>" ;
            }

            ?>
        </h3>

        <dd>
            <dt><?php echo $ship1->getName(); ?></dt>
            <dt><?php echo $ship1->getstrength(); ?></dt>
        </dd>
        <dd>
        <dt><?php echo $ship2->getName(); ?></dt>
        <dt><?php echo $ship2->getstrength(); ?></dt>
        </dd>

    </div>
    <a href="index.php"><p class="text-center"><i class="fa fa-undo"></i> Battle again</p></a>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
</div>
</body>
</html>
