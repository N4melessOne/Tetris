<?php
    include_once('./common.php');
    $request = $_SERVER['REQUEST_METHOD'];
    switch ($request)
    {
        case "POST":
            if (!empty($_POST["username"] && !empty($_POST["passwd"]))){
                global $connection;
                $query = "INSERT INTO [dbo].Users (Username, Passwd) VALUES ('{$_POST["username"]}', '{$_POST["passwd"]}')";
                $params = array();
                $options = array( "Scrollable" => SQLSRV_CURSOR_KEYSET );
                $statement = sqlsrv_query($connection, $query, $params, $options);

                if ($statement) {
                    $row_count = sqlsrv_num_rows($statement);
                    if ($row_count !== false){
                        echo json_encode(
                            array(
                                'error' => 0,
                                'message' => 'Successfully registered!'
                            )
                    );
                    }
                    else{
                        echo json_encode(
                            array(
                                'error' => 1,
                                'message' => 'Server error.'
                            )
                    );
                    }
                }
            }
            else{
                echo json_encode(
                    array(
                            'error' => 1,
                            'message' => 'Missing username/password.'
                        )
                    );
                exit;
            }
            break;
    	default: header('HTTP/1.1 405 Method Not Allowed');
            header('Allow: POST');
            break;
    }

?>