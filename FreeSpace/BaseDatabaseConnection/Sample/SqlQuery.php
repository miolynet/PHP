<?php
require_once "../Backend/MySqlExecutor.php";
require_once "../Models/Test_Student.php";
$model =new Test_Student();
$excutor = new MySqlExecutor();

// Check connection
if($excutor->IsConnected) echo "<br>Connect success.</br>";
else echo "<br>Connect fail: $excutor->ErrorMessage</br>";
echo "<br>Connected value: $excutor->IsConnected</br>";

// Select
$model->Command = "Name='Helloworld'";
$queryResult = $excutor->Load($model);
while($row = mysql_fetch_array($queryResult))
{
    echo "$row[ID] ,  $row[Name]<br/>";
}


// Update
$model->Command = "ID='$model->ID'";
$model->Command = "ID='439dba939c1af631efd420e519a5e9a9'";
$excutor->Update($model, "Name='It adas'");


// Delete
$model->Name = "Helloworld";
$model->Command = "Name='$model->Name'";
$excutor->Remove($model);


// Insert
$model->Name = "Helloworld";
$excutor->Create($model);
if($excutor->Create($model))echo "<br>Inser succes</br>";
else echo "<br>Inser fail: $excutor->ErrorMessage</br>";

?>
