<?php
function get_content_from_github($url) {
    $ch = curl_init();
    curl_setopt($ch,CURLOPT_URL,$url);
    curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
    curl_setopt($ch,CURLOPT_CONNECTTIMEOUT,1);
    curl_setopt($ch,CURLOPT_USERAGENT,'My User Agent');
    $content = curl_exec($ch);
    curl_close($ch);
    return $content;
}

$json = json_decode(get_content_from_github('https://api.github.com/users/octocat/repos'), true);

foreach($json as $repo) {
    $language = $repo['language'];
}
?>
