<?php
header("Access-Control-Allow-Origin:*");

try{
    $db=new PDO('mysql:host=localhost;dbname=barcodes','root','root');

}
catch(PDOException $e){
    print "Error!" .$e->getMessage()."<br/>";
    die();
}
$barcode=$_GET['barcode'];

if($barcode){
    $query=$db->prepare("SELECT*FROM barcodes WHERE  barcode=:barcode");
    $query->bindParam(':barcode',$barcode);
    $query->execute();
    $barcode=$query->fetch(PDO::FETCH_OBJ);

    header('Content-type:application/json;charset=utf8');
    echo json_encode($barcode);
}