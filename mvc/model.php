<?php
    class Models
    {
        function openConnection()
        {
            $conn = mysqli_connect("localhost","root","","practices");
            return $conn;
        }
        function insertData($conn,$name,$mobile,$address)
        {
            $sql = "insert into tp values('$name',$mobile,'$address')";
            $response = array();
            if(mysqli_query($conn,$sql))
            {
                $response = array(
                    "status"=>"OK"
                );
            }
            else
            {
                $response = array(
                    "status"=>"EXIST"
                );
            }
            return $response;
        }
        function selectData($conn)
        {
            $sql = "select * from tp";
            $response = array();
            $response["datas"] = array();
            $result = mysqli_query($conn,$sql);
            if(mysqli_num_rows($result)>0)
            {
                while($row = mysqli_fetch_assoc($result))
                {
                    $postitem = array(
                        "name"=>$row["name"],
                        "mobile"=>$row["mobile"],
                        "address"=>$row["address"]
                    );
                    array_push($response["datas"],$postitem);
                }
                return $response;
            }
        }
    }
?>