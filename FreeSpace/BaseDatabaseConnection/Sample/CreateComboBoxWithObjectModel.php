<?php

require_once "../Global/Generator/HtmlGenerators.php";
require_once "../Models/Test_Student.php";

$model = new Test_Student();
$excutor = new MySqlExecutor();

$queryResult = $excutor->Load($model);
echo HtmlGenerators::ComboBoxObjectModel("MyComboBox", $queryResult, "ID", "Name");

?>
