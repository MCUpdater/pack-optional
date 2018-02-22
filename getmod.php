#!/usr/bin/php
<?php
if( $argc < 2 )  {
	echo "Syntax: ${argv[0]} <url> [<fname>]\n";
	exit(1);
}
$url = $argv[1];
if( isset($argv[2]) ) {
	$fname = $argv[2];
} else {
	$fname = "getmod.jar";
}

function curl_get($url, $fname) {
    $ch = curl_init($url);
    $fp = fopen($fname, "w");

    curl_setopt($ch, CURLOPT_FILE, $fp);
    curl_setopt($ch, CURLOPT_HEADER, 0);
	curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);

    curl_exec($ch);

    $code = curl_getinfo($ch, CURLINFO_HTTP_CODE);

    curl_close($ch);
    fclose($fp);

    if( $code > 300 ) {
        unlink($fname);
    }
    if( !file_exists($fname) || filesize($fname) == 0 ) {
        touch($fname);
    }
    return $code;
}

echo "Downloading $url...\n";
$code = curl_get($url, $fname);
echo "  $code -> $fname\n";

$size = filesize($fname);
$md5 = md5_file($fname);
?>
		<Module name="" id="" depends="" side="CLIENT">
			<URL priority="0"><?=$url?></URL>
			<URL priority="1">http://files.mcupdater.com/optional/<?=$fname?></URL>
			<Required isDefault="false">false</Required>
			<ModType>Regular</ModType>
			<MD5><?=$md5?></MD5>
			<Size><?=$size?></Size>
		</Module>
