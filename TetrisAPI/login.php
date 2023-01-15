<?php
    include_once('./common.php');
    $request = $_SERVER['REQUEST_METHOD'];
    switch ($request)
    {
        case "POST":
            if (!empty($_POST["username"] && !empty($_POST["passwd"]))){
                global $connection;
                $query = "SELECT * FROM [dbo].Users WHERE Username='{$_POST["username"]}' AND Passwd='{$_POST["passwd"]}'";
                $statement = sqlsrv_query($connection, $query);
                if ($statement) {
                    $rows = sqlsrv_has_rows($statement);
                    if ($rows === true){
                        echo json_encode(
                            array(
                                'error' => 0,
                                'message' => 'Successfully logged in!'
                            )
                        );
                    }
                    else{
                        echo json_encode(
                            array(
                                'error' => 1,
                                'message' => 'Invalid username/password.'
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
    	default: header('HTTP/1.1 405 Method Not Allowed');
                header('Allow: POST');
                break;
    }

?>