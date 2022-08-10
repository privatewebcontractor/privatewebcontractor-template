<?php
function returner($status, $message) {
    switch($status) {
        case 0: $result = array('status' => 'error', 'message' => $message); $code = 400; break;
        case 1: $result = array('status' => 'warning', 'message' => $message); $code = 501; break;
        case 2: $result = array('status' => 'success', 'message' => $message); $code = 200; break;
    }
    echo json_encode($result, JSON_UNESCAPED_UNICODE);
    http_response_code($code);
    die();
}
    
function checkPostParams($params)
{
    $data = [];
    for ($i = 0; $i < count($params); $i++) {
        if (isset($_POST[$params[$i]])) {
            $data[$params[$i]] = $_POST[$params[$i]];
            continue;
        }
        returner(0, 'Не установлен POST параметр \' ' . $params[$i] . ' \'');
    }
    return $data;
}
?>