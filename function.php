<?php
function delayedRedirect($url, $delayInSeconds) {
    sleep($delayInSeconds);
    header("Location: $url");
    exit();
}
function user_gravatar($uid){
    global $db;
    $data = $db->query("SELECT email FROM users WHERE id = ".$uid." ")->fetch(PDO::FETCH_ASSOC);
    $grav_url = "https://www.gravatar.com/avatar/".md5( strtolower(trim( $data['email']))) . "?s=100" ;
    return $grav_url;
}
?>