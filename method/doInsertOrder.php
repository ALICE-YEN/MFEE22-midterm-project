<!--Bug: 訂單送出 信用卡卻沒有跳轉到信用卡頁面 而是直接跳到product-list！！！-->
<!--BUG: 建立訂單，如果直接選送貨方式：超商送失敗，先點送貨方式：宅配到家 再重選超商就可以。！！！！！！！-->



<?php
require_once ("pdo-connect.php");

$member_id='0';
$amount='0';
$payment=$_POST["payment"];
$payment_status='未付款';
$receiver=$_POST["receiver"];
$receiver_phone=$_POST["receiver_phone"];

//BUG: 建立訂單，如果直接選送貨方式：超商送失敗，先點送貨方式：宅配到家 再重選超商就可以。！！！！！！！
$address=$_POST["address"];
$convenient_store=$_POST["convenient_store"];
if ($_POST["delivery"]==="#delivery1"):
    $delivery="宅配到府";
    $convenient_store="";
else:
    $delivery="超商取貨";
    $address="";
endif;
$status='訂單處理中';
$order_time=date("Y/m/d H:i:s");

$sqlOrderList="INSERT INTO order_list(member_id , amount, payment, payment_status, delivery, receiver, receiver_phone, address, convenient_store, status, order_time) VALUES('$member_id' , '$amount', '$payment', '$payment_status', '$delivery', '$receiver', '$receiver_phone', '$address', '$convenient_store', '$status', '$order_time')";
$stmtOrderList=$db_host->prepare($sqlOrderList);
try{
    $stmtOrderList->execute();
    $orderCount=$stmtOrderList->rowCount();
    echo "修改資料完成";
    var_dump($payment);
    if ($payment=="信用卡"){
        header("location: doCreditCard.php");
    }else{
//        header("location: ../product-list.php");
    }
}catch (PDOException $e){
    echo "修改資料錯誤: ".$e->getMessage();
}
?>