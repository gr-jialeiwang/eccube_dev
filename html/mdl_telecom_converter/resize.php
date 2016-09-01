<?php
header("Content-Type: image/gif");
//画像のサイズ取得
$inf = "tc_logo.gif";
// HTTP ヘッダ送信
header("Content-Type: image/gif");
if(!$ow || !$oh){ list($ow, $oh) = getimagesize($inf); }
if(!$nh ){ $nh = $oh * ($nw/$ow); }
if(!$nw ){ $nw = $ow * ($nh/$oh); }
header("Content-Type: image/gif");
$out = imagecreatetruecolor("50", "50");
$in = imagecreatefromgif($inf);
header("Content-Type: image/gif");
imagecopyresized($out, $in, 0, 0, 0, 0, 50, 50, 50, 50);
header("Content-Type: image/gif");
imagegif($out);
header("Content-Type: image/gif");
imagedestroy($out);
?>
