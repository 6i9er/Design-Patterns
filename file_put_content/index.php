<?php
    $file =  'data/data.json';

    $array = array();
    $array['name'] = ' amir';
    $array['age'] = 56;
    $array['job'] = 'police man';
    $array['address'] = 'Mansoura';
    $array['email'] = 'amir@gmail.com';
    $objects = json_decode(file_get_contents($file) , true);
    array_push($objects ,$array);
//    Preview Onjects
    $index = 1;
    foreach($objects as $object){
        echo "id : ".$index++."<BR>";
        echo "name : ".$object['name']."<BR>";
        echo "age : ".$object['age']."<BR>";
        echo "Address : ".$object['address']."<BR>";
        echo "email : ".$object['email']."<BR>";
        echo "job : ".$object['job']."<BR>";
        echo "<HR>";
    }
//    save data to new file
    file_put_contents($file,json_encode($objects));







//	require_once('library.php');
//	$car['type'] = 'BYD';
//	$car['color'] = 'Black';
//	$car['model'] = '2011';
//	$car['horsePower'] = '100';
//	$car['motor'] = '1600cc';
//
//
//
//	// $a = new SettingValues($car);
//	 $newCar = new Car($car);
//	 echo $newCar->getColor();
//	 echo"<BR>";
//	 echo $newCar->getMotor();
//	 echo"<BR>";
//	 echo $newCar->getType();
//	 echo"<BR>";
//	 echo $newCar->getHorsePower();
//	 echo"<BR>";
//	 echo $newCar->checkModel("Mercides");
//	 echo"<BR>";


?>