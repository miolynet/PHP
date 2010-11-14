<?php
require_once "../Backend/MySqlExecutor.php";
require_once "../Backend/BaseDataModel.php";

class Test_Student extends BaseDataModel{
    
    public $ID;
    public $Name;

    public function __construct() {
        $this->TableName = "student";
    }
    public function ColumnNames() {
        return "ID,Name";
    }
    public function Values() {
        return "'$this->PrimaryKey','$this->Name'";
    }
}

$model =new Test_Student();
$model->Name = "Helloworld";
//$model->Command = "ID='$model->ID'";

$excutor = new MySqlExecutor();
if($excutor->IsConnected) echo "<br>Connect success.</br>";
else echo "<br>Connect fail: $excutor->ErrorMessage</br>";
echo "<br>Connected value: $excutor->IsConnected</br>";

// Select
//$model->Command = "Name='Yehoo'";
//$queryResult = $excutor->Load($model);
//while($row = mysql_fetch_array($queryResult))
//{
//    echo "$row[ID] ,  $row[Name]<br/>";
//}


// Insert
//$excutor->Create($model);
//
if($excutor->Create($model))echo "<br>Inser succes</br>";
else echo "<br>Inser fail: $excutor->ErrorMessage</br>";


// Update
//$model->Command = "ID='439dba939c1af631efd420e519a5e9a9'";
//$excutor->Update($model, "Name='It adas'");



// Delete
//$excutor->Remove($model);


//function XXX($type){
//    $g = new $type();
//    echo $g->TT;
//    echo $g->TT1;
//}
//
//XXX(MySqlExecutor);

?>
