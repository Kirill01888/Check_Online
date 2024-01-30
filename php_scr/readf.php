<?php
$response = array();

if (isset($_POST['get_log'])) {
    $ff = fopen('log.txt', 'r');
    while (!feof($ff)) {
        $response['message'] = htmlentities(fgets($ff));
    }
    fclose($ff);
}else{
    $response['message'] = 'did not read file';
}
echo json_encode($response);
?>