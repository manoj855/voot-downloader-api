<?php
$url =$_GET['q'];
$id = end(explode('/', $url));
$api =file_get_contents("https://apiv2.voot.com/wsv_2_3/playBack.json?mediaId=$id");
$apis =json_decode($api);
$url =$apis->assets[0]->assets[0]->items[0]->URL;
$title =$apis->assets[0]->assets[0]->items[0]->mediaName;
$des =$apis->assets[0]->assets[0]->items[0]->desc;
$img =$apis->assets[0]->assets[0]->items[0]->imgURL;
if($url ==""){
$status ="invalid error";
}
else{
$status="ok";
}
$apii = array("status" => $status, "title" => $title, "description" => $des, "thumbnail" => $img, "video_url" => $url);
$api =json_encode($apii);
header("Content-Type: application/json");
echo $api;