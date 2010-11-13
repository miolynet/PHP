<?php
require_once "../Backend/MySqlExecutor.php";
require_once "../Backend/DataModelBase.php";

class Test_Student extends DataModelBase{
    
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

// Insert
//$excutor->Create($model);
//
//if($excutor->Create($model))echo "<br>Inser succes</br>";
//else echo "<br>Inser fail: $excutor->ErrorMessage</br>";

// Delete
//$excutor->Remove($model);

// Select
//$model->Command = "Name='Yehoo'";
//$queryResult = $excutor->Load($model);
//while($row = mysql_fetch_array($queryResult))
//{
//    echo "$row[ID] ,  $row[Name]<br/>";
//}


function XXX($type){
    $g = new $type();
    echo $g->TT;
    echo $g->TT1;
}

XXX(MySqlExecutor);

?>
