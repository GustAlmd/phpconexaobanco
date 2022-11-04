<?php 
include_once(__DIR__.'/../vendor/autoload.php');

echo "app...";

use App\Models\Aluno;
use App\Persistence\ConnectionFactory;
use App\DTOS\SensorDTO;

$connFactory = new ConnectionFactory();
$conn = $connFactory->getInstance();

$sensorDTO11 = new SensorDTO(10,100);
$sensorDTO22 = new SensorDTO(20,200);

$sqlInsertSensorData = "insert into dadosbrutos (temperatura,umidade) values ";
$conn->exec($sqlInsertSensorData."(".$sensorDTO11->_temperatura.",".$sensorDTO11->_umidade.");");
$conn->exec($sqlInsertSensorData."(".$sensorDTO22->_temperatura.",".$sensorDTO22->_umidade.");");

$sqlSelectDadosBrutos = "select * from dadosbrutos";

$stmt = $conn->query($sqlSelectDadosBrutos);
$sensorDataArr = $stmt->fetchAll(\PDO::FETCH_ASSOC);

echo "<br></br>temperatura -- umidade <br></br>";

foreach ($sensorDataArr as $sensorData){
    echo "<br></br>".$sensorData['temperatura']." -- ".$sensorData['umidade'];
}