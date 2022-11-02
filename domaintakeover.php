<?php

error_reporting(0);



$file = file_get_contents("list.txt");

$urls = explode("\n",$file);

$op = fopen("vuln.txt","a");

foreach ($urls as $url) {
    if(gethostbyname($url) == $url) {
        
        echo("\033[1;32;40m$url \033[1;37;40m || OK || \033[1;36;40m");
        $dns = dns_get_record($url, DNS_NS); echo $dns[0]['target'].' || '.$dns[1]['target']."\n";
        fwrite($op,"$url\n");
    } else {
        echo("\033[1;31;40m$url --------Not\n");
    }
}

?>
