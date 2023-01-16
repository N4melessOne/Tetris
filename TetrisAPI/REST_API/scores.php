<?php
include_once('./common.php');
$request = $_SERVER['REQUEST_METHOD'];
switch ($request)
{
    case "GET":
        if (!empty($_GET["userId"])){
            getScoresOfUser($_GET["userId"]);
            exit;
        }
        if (!empty($_GET["maxScore"])){
            getMaxScore();
            exit;
        }
        getAllScores();
        break;
    case "POST":
        if (empty($_POST["userId"]) || empty($_POST["score"]) || empty($_POST["lines"])){
            echo json_encode(
                        array(
                            'error' => 1,
                            'message' => 'Invalid score!'
                        )
                );
        }
        else{
            postNewScore($_POST["userId"], $_POST["score"], $_POST["lines"]);
        }
        break;
    default: header('HTTP/1.1 405 Method Not Allowed');
        header('Allow: POST');
        break;
}

function getAllScores(){
    global $connection;
    $response = array();
    $score = array();
    $query = "SELECT * FROM [dbo].Scores;";
    $result = sqlsrv_query($connection, $query);

    while($row = sqlsrv_fetch_object($result)) {

        $score['Id'] = $row->Id;
        $score['UserId'] = $row->UserId;
        $score['Score'] = $row->Score;
        $score['Lines'] = $row->Lines;

        $response[] = $score;
    }

    echo json_encode($response);
}

function getScoresOfUser($userId){
    global $connection;
    $response = array();
    $score = array();
    $query = "SELECT * FROM [dbo].Scores WHERE UserId = $userId";
    $result = sqlsrv_query($connection, $query);

    while($row = sqlsrv_fetch_object($result)) {

        $score['Id'] = $row->Id;
        $score['UserId'] = $row->UserId;
        $score['Score'] = $row->Score;
        $score['Lines'] = $row->Lines;

        $response[] = $score;
    }

    echo json_encode($response);
}

function getMaxScore(){
    global $connection;
    $response = array();
    $score = array();
    $query = "SELECT MAX(Score) AS Max FROM [dbo].Scores";
    $result = sqlsrv_query($connection, $query);
    while($row = sqlsrv_fetch_object($result)) {
        $score["MaxScore"] = $row->Max;

        $response[] = $score;
    }

    echo json_encode($response);
}

function postNewScore($userId, $score, $lines){
    global $connection;
    $query = "INSERT INTO [dbo].Scores (UserId, Score, Lines) VALUES ($userId, $score, $lines)";
    $params = array();
    $options = array( "Scrollable" => SQLSRV_CURSOR_KEYSET );
    $statement = sqlsrv_query($connection, $query, $params, $options);

    if ($statement) {
        $row_count = sqlsrv_num_rows($statement);
        if ($row_count !== false){
            echo json_encode(
                array(
                    'error' => 0,
                    'message' => 'Successfully inserted new score!'
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
?>