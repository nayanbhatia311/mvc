<?php
    if(isset($_POST["action"]))
    {    
        include 'model.php';  
        $model = new Models();
        $conn = $model->openConnection();
        $action = $_POST["action"];
        switch($action)
        {
            case "insert":
                $name = $_POST["txtName"];
                $mobile = $_POST["txtMobile"];
                $address = $_POST["txtAddress"];
                $result = $model->insertData($conn,$name,$mobile,$address);
                echo json_encode($result);
                break;
            case "select":
                $resule = $model->selectData($conn);
                echo json_encode($resule);
                break;    
        }
    }
?>