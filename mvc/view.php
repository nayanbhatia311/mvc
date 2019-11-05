<html>
    <head>
        <title>Crud Operations</title>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    </head>
    <body>
        <div id="container">
        <div>
            <form action="" method="post">
                <label for="txtName">Name: </label>
                <input type="text" name="txtName" id="txtName" placeholder="Enter Your Name" /><br><br>
                <label for="txtMobile">Mobile: </label>
                <input type="number" name="txtMobile" id="txtMobile" placeholder="Enter Your Mobile" /><br><br>
                <label for="txtAddress">Address: </label>
                <input type="text" name="txtAddress" id="txtAddress" placeholder="Enter Your Address" /><br><br>
                <button type="button" name="action" id="action" value="insert">INSERT</button>
                <button type="button" name="action1" id="action1" value="select">SELECT</button>
            </form>
        </div>
        <div id="tablecreate">
        </div>
        </div>
        <script type="text/javascript">
            document.getElementById("action").addEventListener("click",getResults);
            document.getElementById("action1").addEventListener("click",getResultss);
            function getResults()
            {
                const action = document.getElementById("action").value;
                const name = document.getElementById("txtName").value;
                const mobile = document.getElementById("txtMobile").value;
                const address = document.getElementById("txtAddress").value;
                if(action == "insert")
                {
                    $.ajax({
                        url:"controller.php",
                        method:"post",
                        dataType: "json",
                        data: {action:action,txtName:name,txtMobile:mobile,txtAddress:address},
                        success:function(data)
                        {
                            if(data["status"] == "OK")
                            {
                                window.alert("Data inserted Successfully.");
                            }
                            else
                            {
                                window.alert("Something went wrong");
                            }
                        }
                    })
                }
            }
            function getResultss()
            {
                const action = document.getElementById("action1").value;
                if(action == "select")
                {
                    console.log("select me aaya");
                    $.ajax({
                        method:"post",
                        url:"controller.php",
                        dataType:"json",
                        data:{action:action},
                        success:function(data)
                        {
                            console.log(data);
                            let output = `<table>
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Mobile</th>
                                    <th>Address</th>
                                </tr>
                            </thead>
                            <tbody>`;
                            let datas = data["datas"];
                            for(let i=0;i<datas.length;i++)
                            {
                                output += `<tr>
                                    <td>${datas[i].name}</td>
                                    <td>${datas[i].mobile}</td>
                                    <td>${datas[i].address}</td>
                                </tr>`;
                            }
                            output += `</tbody>
                            </table>`;
                            document.getElementById("tablecreate").innerHTML = output;
                        }
                    });
                }
            }
        </script>
    </body>
</html>