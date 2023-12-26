<?php
if ($_POST['function'] == 'CashRecord') {
    CashRecord();
} elseif ($_POST['function'] == 'GetBuyers') {
    GetBuyers();
} elseif ($_POST['function'] == 'DeleteCash') {
    DeleteCash();
} elseif ($_POST['function'] == 'SelectCash') {
    SelectCash();
} if ($_POST['function'] == 'GoldRecord') {
    GoldRecord();
} elseif ($_POST['function'] == 'DeleteGold') {
    DeleteGold();
} elseif ($_POST['function'] == 'SelectGold') {
    SelectGold();
} elseif ($_POST['function'] == 'AddBuyer') {
    AddBuyer();
} elseif ($_POST['function'] == 'UpdateBuyer') {
    UpdateBuyer();
} elseif ($_POST['function'] == 'GetAllBuyerData') {
    GetAllBuyerData();
} elseif ($_POST['function'] == 'BuyerCount') {
    BuyerCount();
} elseif ($_POST['function'] == 'GetBuyer') {
    GetBuyer();
} elseif ($_POST['function'] == 'BuyerDelete') {
    BuyerDelete();
}

function CashRecord()
{
    include 'session.php';
    error_reporting(E_ALL);
    ini_set('display_errors', 1);
    require_once "config.php";
    $array = array();
    if ($_POST['product_id'] == null) {
        $getRecordQuery = "INSERT INTO `m2_cash`(`date`, `buyer_id`, `type`, `amount`,`details`, `status`) VALUES (:date,:buyer_id,:type,:amount,:details,'Active')";
    } else {
        $getRecordQuery = "UPDATE `m2_cash` SET `date`=:date,`buyer_id`=:buyer_id,`type`=:type,`amount`=:amount,`details`=:details WHERE `id`=:id";
    }

    $getRecordStatement = $pdo->prepare($getRecordQuery);
    $getRecordStatement->bindParam(':date', $_POST['date']);
    $getRecordStatement->bindParam(':buyer_id', $_POST['vendor']);
    $getRecordStatement->bindParam(':type', $_POST['type']);
    $getRecordStatement->bindParam(':details', $_POST['detail']);
    $getRecordStatement->bindParam(':amount', $_POST['amount']);
    if ($_POST['product_id'] != null) {
        $getRecordStatement->bindParam(':id', $_POST['product_id']);
    }
    if ($getRecordStatement->execute()) {
        array_push($array, "success");
        echo json_encode($array, true);
    } else {
        echo json_encode($getRecordStatement->errorInfo(), true);
    }
}

function GetBuyers()
{
    include 'session.php';
    error_reporting(E_ALL);
    ini_set('display_errors', 1);
    require_once "config.php";
    $array = array();
    $getRecordQuery = "SELECT * FROM `buyer` WHERE `status` = 'Active'";
    $getRecordStatement = $pdo->prepare($getRecordQuery);
    if ($getRecordStatement->execute()) {
        $array = $getRecordStatement->fetchAll(PDO::FETCH_ASSOC);
        echo json_encode($array, true);
    } else {
        echo json_encode($getRecordStatement->errorInfo(), true);
    }
}

function SelectCash()
{
    include 'session.php';
    error_reporting(E_ALL);
    ini_set('display_errors', 1);
    require_once "config.php";
    $array = array();
    $getRecordQuery = "SELECT m2_cash.id, m2_cash.date, m2_cash.buyer_id, buyer.name, m2_cash.type, m2_cash.details, m2_cash.amount
        FROM m2_cash
        JOIN buyer ON m2_cash.buyer_id = buyer.id
        WHERE m2_cash.type =:type AND m2_cash.status='Active'";
    $getRecordStatement = $pdo->prepare($getRecordQuery);
    $getRecordStatement->bindParam(':type', $_POST['type']);
    if ($getRecordStatement->execute()) {
        $array = $getRecordStatement->fetchAll(PDO::FETCH_ASSOC);
        $totalPureWeight = 0;
        foreach ($array as $row) {
            $totalPureWeight += $row['amount'];
        }
        $result = array(
            'records' => $array,
            'total_pure_weight' => $totalPureWeight
        );
        echo json_encode($result, true);
    } else {
        echo json_encode($getRecordStatement->errorInfo(), true);
    }
}

function DeleteCash()
{
    include 'session.php';
    error_reporting(E_ALL);
    ini_set('display_errors', 1);
    require_once "config.php";

    $id = $_POST['id'];
    $qry = "Update m2_cash SET status='Inactive' WHERE id=:id";
    $qryStatement = $pdo->prepare($qry);

    $qryStatement->bindParam(':id', $id);

    if ($qryStatement->execute()) {
        $result = array('status' => 'success');
    } else {
        $result = array('status' => 'error');
    }
    echo json_encode($result, true);
}

function GoldRecord()
{
    include 'session.php';
    error_reporting(E_ALL);
    ini_set('display_errors', 1);
    require_once "config.php";
    $array = array();
    if ($_POST['product_id'] == null) {
        $getRecordQuery = "INSERT INTO `m2_gold`(`date`, `buyer_id`, `type`, `amount`,`details`, `status`) VALUES (:date,:buyer_id,:type,:amount,:details,'Active')";
    } else {
        $getRecordQuery = "UPDATE `m2_gold` SET `date`=:date,`buyer_id`=:buyer_id,`type`=:type,`amount`=:amount,`details`=:details WHERE `id`=:id";
    }

    $getRecordStatement = $pdo->prepare($getRecordQuery);
    $getRecordStatement->bindParam(':date', $_POST['date']);
    $getRecordStatement->bindParam(':buyer_id', $_POST['vendor']);
    $getRecordStatement->bindParam(':type', $_POST['type']);
    $getRecordStatement->bindParam(':details', $_POST['detail']);
    $getRecordStatement->bindParam(':amount', $_POST['amount']);
    if ($_POST['product_id'] != null) {
        $getRecordStatement->bindParam(':id', $_POST['product_id']);
    }
    if ($getRecordStatement->execute()) {
        array_push($array, "success");
        echo json_encode($array, true);
    } else {
        echo json_encode($getRecordStatement->errorInfo(), true);
    }
}

function SelectGold()
{
    include 'session.php';
    error_reporting(E_ALL);
    ini_set('display_errors', 1);
    require_once "config.php";
    $array = array();
    $getRecordQuery = "SELECT m2_gold.id, m2_gold.date, m2_gold.buyer_id, buyer.name, m2_gold.type, m2_gold.details, m2_gold.amount
        FROM m2_gold
        JOIN buyer ON m2_gold.buyer_id = buyer.id
        WHERE m2_gold.type =:type AND m2_gold.status='Active'";
    $getRecordStatement = $pdo->prepare($getRecordQuery);
    $getRecordStatement->bindParam(':type', $_POST['type']);
    if ($getRecordStatement->execute()) {
        $array = $getRecordStatement->fetchAll(PDO::FETCH_ASSOC);
        $totalPureWeight = 0;
        foreach ($array as $row) {
            $totalPureWeight += $row['amount'];
        }
        $result = array(
            'records' => $array,
            'total_pure_weight' => $totalPureWeight
        );
        echo json_encode($result, true);
    } else {
        echo json_encode($getRecordStatement->errorInfo(), true);
    }
}

function DeleteGold()
{
    include 'session.php';
    error_reporting(E_ALL);
    ini_set('display_errors', 1);
    require_once "config.php";

    $id = $_POST['id'];
    $qry = "Update m2_gold SET status='Inactive' WHERE id=:id";
    $qryStatement = $pdo->prepare($qry);

    $qryStatement->bindParam(':id', $id);

    if ($qryStatement->execute()) {
        $result = array('status' => 'success');
    } else {
        $result = array('status' => 'error');
    }
    echo json_encode($result, true);
}

function AddBuyer()
{
    include 'session.php';
    error_reporting(E_ALL);
    ini_set('display_errors', 1);
    require_once "config.php";
    $array = array();
    $getRecordQuery = "INSERT INTO `buyer`(`id`,`name`,`status`,`date`) VALUES (:id, :name, 'Active',:date)";
    $getRecordStatement = $pdo->prepare($getRecordQuery);
    $getRecordStatement->bindParam(':name', $_POST['name'], PDO::PARAM_STR);
    $getRecordStatement->bindParam(':id', $_POST['id'], PDO::PARAM_STR);
    $getRecordStatement->bindParam(':date', $_POST['date'], PDO::PARAM_STR);
    if ($getRecordStatement->execute()) {
        array_push($array, 'success');
        echo json_encode($array, true);
        die;
    }
}

function UpdateBuyer()
{
    include 'session.php';
    error_reporting(E_ALL);
    ini_set('display_errors', 1);
    require_once "config.php";
    $array = array();
    $getRecordQuery = "UPDATE `buyer` SET `name` = :name,`date`=:date WHERE `id` = :id";
    $getRecordStatement = $pdo->prepare($getRecordQuery);
    $getRecordStatement->bindParam(':name', $_POST['name'], PDO::PARAM_STR);
    $getRecordStatement->bindParam(':id', $_POST['id'], PDO::PARAM_STR);
    $getRecordStatement->bindParam(':date', $_POST['date'], PDO::PARAM_STR);
    if ($getRecordStatement->execute()) {
        array_push($array, 'success');
        echo json_encode($array, true);
        die;
    }
}

function GetAllBuyerData()
{
    include 'session.php';
    error_reporting(E_ALL);
    ini_set('display_errors', 1);
    require_once "config.php";
    $array = array();
    $getRecordQuery = "SELECT * FROM `buyer` WHERE `status` = 'Active'";
    $getRecordStatement = $pdo->prepare($getRecordQuery);
    if ($getRecordStatement->execute()) {
        $array = $getRecordStatement->fetchAll(PDO::FETCH_ASSOC);
        echo json_encode($array, true);
        die;
    }
}

function BuyerCount()
{
    include 'session.php';
    error_reporting(E_ALL);
    ini_set('display_errors', 1);
    require_once "config.php";
    $array = array();
    $getRecordQuery = "SELECT LPAD(COUNT(*), 3, '0') AS `count` FROM `buyer`";
    $getRecordStatement = $pdo->prepare($getRecordQuery);
    if ($getRecordStatement->execute()) {
        $row = $getRecordStatement->fetch();
        array_push($array, str_pad($row['count'] + 1, 3, '0', STR_PAD_LEFT));
        echo json_encode($array, true);
        die;
    echo 'success';
    }
}

function GetBuyer()
{
    include 'session.php';
    error_reporting(E_ALL);
    ini_set('display_errors', 1);
    require_once "config.php";
    $array = array();
    $id = $_POST['id'];
    $getRecordQuery = "SELECT * FROM `buyer` WHERE `status` = 'Active' AND `id` = '$id'";
    $getRecordStatement = $pdo->prepare($getRecordQuery);
    if ($getRecordStatement->execute()) {
        array_push($array, $getRecordStatement->fetch(PDO::FETCH_ASSOC));
        echo json_encode($array, true);
        die;
    }
}

function BuyerDelete()
{
    include 'session.php';
    error_reporting(E_ALL);
    ini_set('display_errors', 1);
    require_once "config.php";
    $array = array();
    $getRecordQuery = "UPDATE `buyer` SET `status` = 'Inactive' WHERE `id` = :id";
    $getRecordStatement = $pdo->prepare($getRecordQuery);
    $getRecordStatement->bindParam(':id', $_POST['id'], PDO::PARAM_STR);
    if ($getRecordStatement->execute()) {
        array_push($array, 'success');
        echo json_encode($array, true);
        die;
    }
}