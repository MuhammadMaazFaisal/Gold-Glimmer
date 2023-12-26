<?php

if ($_POST['function'] == 'GetAllVendorData') {
    GetAllVendorData();
} elseif ($_POST['function'] == 'GetAllSemiProductData') {
    GetAllSemiProductData();
} elseif ($_POST['function'] == 'VendorCount') {
    VendorCount();
} elseif ($_POST['function'] == 'SemiProductCount') {
    SemiProductCount();
} elseif ($_POST['function'] == 'AddVendor') {
    AddVendor();
} elseif ($_POST['function'] == 'AddSemiProduct') {
    AddSemiProduct();
} elseif ($_POST['function'] == 'VendorDelete') {
    VendorDelete();
} elseif ($_POST['function'] == 'SemiProductDelete') {
    SemiProductDelete();
} elseif ($_POST['function'] == 'GetVendor') {
    GetVendor();
} elseif ($_POST['function'] == 'GetSemiProduct') {
    GetSemiProduct();
} elseif ($_POST['function'] == 'UpdateVendor') {
    UpdateVendor();
} elseif ($_POST['function'] == 'UpdateSemiProduct') {
    UpdateSemiProduct();
} elseif ($_POST['function'] == 'ProductCount') {
    ProductCount();
} elseif ($_POST['function'] == 'GetAllProduct') {
    GetAllProduct();
} elseif ($_POST['function'] == 'StepOne') {
    StepOne();
} elseif ($_POST['function'] == 'StepTwo') {
    StepTwo();
} elseif ($_POST['function'] == 'StepThree') {
    StepThree();
} elseif ($_POST['function'] == 'GetManufacturerData') {
    GetManufacturerData();
} elseif ($_POST['function'] == 'GetPolisherData') {
    GetPolisherData();
} elseif ($_POST['function'] == 'GetStoneSetterData') {
    GetStoneSetterData();
} elseif ($_POST['function'] == 'GetZircons') {
    GetZircons();
} elseif ($_POST['function'] == 'GetStones') {
    GetStones();
} elseif ($_POST['function'] == 'DeleteProduct') {
    DeleteProduct();
} elseif ($_POST['function'] == 'DeletePurchasing') {
    DeletePurchasing();
} elseif ($_POST['function'] == 'GetPolisherRate') {
    GetPolisherRate();
} elseif ($_POST['function'] == 'GetStoneSetterRate') {
    GetStoneSetterRate();
} elseif ($_POST['function'] == 'GetModalProducts') {
    GetModalProducts();
} elseif ($_POST['function'] == 'GetModalInvoices') {
    GetModalInvoices();
} elseif ($_POST['function'] == 'GetFilteredProducts') {
    GetFilteredProducts();
} elseif ($_POST['function'] == 'ReturnedStepThree') {
    ReturnedStepThree();
} elseif ($_POST['function'] == 'StepFour') {
    StepFour();
} elseif ($_POST['function'] == 'GetReturnedStoneData') {
    GetReturnedStoneData();
} elseif ($_POST['function'] == 'GetReturnedData') {
    GetReturnedData();
} elseif ($_POST['function'] == 'GetAdditionalData') {
    GetAdditionalData();
} elseif ($_POST['function'] == 'GetMetalVendors') {
    GetMetalVendors();
} elseif ($_POST['function'] == 'MetalRecord') {
    MetalRecord();
} elseif ($_POST['function'] == 'GetPurchasingCount') {
    GetPurchasingCount();
} elseif ($_POST['function'] == 'AddPurchasing') {
    AddPurchasing();
} elseif ($_POST['function'] == 'GetInvoices') {
    GetInvoices();
} elseif ($_POST['function'] == 'GetProductDetails') {
    GetProductDetails();
} elseif ($_POST['function'] == 'AddStock') {
    AddStock();
} elseif ($_POST['function'] == 'GetStockCount') {
    GetStockCount();
} elseif ($_POST['function'] == 'GetStockData') {
    GetStockData();
} elseif ($_POST['function'] == 'GetManufacturerReportData') {
    GetManufacturerReportData();
} elseif ($_POST['function'] == 'GetManufacturerReportDataAll') {
    GetManufacturerReportDataAll();
} elseif ($_POST['function'] == 'AddExistingStock') {
    AddExistingStock();
} elseif ($_POST['function'] == 'GetPolisherReportData') {
    GetPolisherReportData();
} elseif ($_POST['function'] == 'GetPolisherReportDataAll') {
    GetPolisherReportDataAll();
} elseif ($_POST['function'] == 'GetAllZircons') {
    GetAllZircons();
} elseif ($_POST['function'] == 'GetAllStones') {
    GetAllStones();
} elseif ($_POST['function'] == 'GetStoneSetterNames') {
    GetStoneSetterNames();
} elseif ($_POST['function'] == 'PrintManufacturer') {
    PrintManufacturer();
} elseif ($_POST['function'] == 'PrintSemiFinish') {
    PrintSemiFinish();
} elseif ($_POST['function'] == 'PrintPolisher') {
    PrintPolisher();
} elseif ($_POST['function'] == 'PrintSetter') {
    PrintSetter();
} elseif ($_POST['function'] == 'PrintReturned') {
    PrintReturned();
} elseif ($_POST['function'] == 'SelectMetal') {
    SelectMetal();
} elseif ($_POST['function'] == 'SelectMetalVendor') {
    SelectMetalVendor();
} elseif ($_POST['function'] == 'SelectMetal2') {
    SelectMetal2();
} elseif ($_POST['function'] == 'DeleteMetal') {
    DeleteMetal();
} elseif ($_POST['function'] == 'CashRecord') {
    CashRecord();
} elseif ($_POST['function'] == 'GetCashVendors') {
    GetCashVendors();
} elseif ($_POST['function'] == 'DeleteCash') {
    DeleteCash();
} elseif ($_POST['function'] == 'SelectCash') {
    SelectCash();
} elseif ($_POST['function'] == 'GetPurchasingDetails') {
    GetPurchasingDetails();
} elseif ($_POST['function'] == 'Logout') {
    Logout();
} elseif ($_POST['function'] == 'GetlZirconDetails') {
    GetlZirconDetails();
} elseif ($_POST['function'] == 'SemiFinish') {
    SemiFinish();
} elseif ($_POST['function'] == 'GetProductData') {
    GetProductData();
} elseif ($_POST['function'] == 'GetSemiFinishStatus') {
    GetSemiFinishStatus();
} elseif ($_POST['function'] == 'GetAdditionalAccountData') {
    GetAdditionalAccountData();
} elseif ($_POST['function'] == 'GetStoneSetterIssued') {
    GetStoneSetterIssued();
} elseif ($_POST['function'] == 'GetVendorData') {
    GetVendorData();
} elseif ($_POST['function'] == 'GetUniversalProduct') {
    GetUniversalProduct();
} elseif ($_POST['function'] == 'DeleteStock') {
    DeleteStock();
} elseif($_POST['function'] == 'GetAllTypes'){
    GetAllTypes();
} elseif ($_POST['function'] == 'AddType'){
    AddType();
}
elseif ($_POST['function'] == 'GetDetailType'){
    GetDetailType();
}


function Logout()
{
    // Initialize the session
    session_start();

    // Unset all of the session variables
    $_SESSION = array();

    // Destroy the session.
    session_destroy();

    // Redirect to login page
    header("location: auth-login.php");
    exit;
}


// -------------------------Production Page-------------------------//

function GetlZirconDetails()
{
    include 'layouts/session.php';
    error_reporting(E_ALL);
    ini_set('display_errors', 1);
    require_once "layouts/config.php";
    $getRecordQuery = "SELECT * FROM `stock_details` WHERE `barcode` = :barcode";
    $getRecordStatement = $pdo->prepare($getRecordQuery);
    $getRecordStatement->bindParam(':barcode', $_POST['barcode']);
    if ($getRecordStatement->execute()) {
        $array = $getRecordStatement->fetch(PDO::FETCH_ASSOC);
        echo json_encode($array, true);
        die;
    }
}

function PrintSemiFinish()
{
    include 'layouts/session.php';
    error_reporting(E_ALL);
    ini_set('display_errors', 1);
    require_once "layouts/config.php";
    $array = array();
    $getRecordQuery = "SELECT ms.id, ms.vendor_id, ms.product_id, ms.date, ms.image, v.name AS vendor_name, p.`id`, 
    p.`status`, 
    p.`date_created`,
    v.`id`,
    v.`name`,
    s.`product_id`,
    s.`Issued_weight`
    FROM manufacturing_step AS ms
    INNER JOIN vendor AS v ON ms.vendor_id = v.id
    JOIN `stone_setter_step` s ON ms.`product_id` = s.`product_id`
    JOIN `product` p ON ms.`product_id` = p.`id`
    WHERE p.`status`='SemiFinished'";



    $getRecordStatement = $pdo->prepare($getRecordQuery);
    if ($getRecordStatement->execute()) {
        $array = $getRecordStatement->fetchAll(PDO::FETCH_ASSOC);
        echo json_encode($array, true);
        die;
    }
}

function PrintManufacturer()
{
    include 'layouts/session.php';
    error_reporting(E_ALL);
    ini_set('display_errors', 1);
    require_once "layouts/config.php";
    $array = array();
    $id = $_POST['id'];
    $getRecordQuery = "SELECT ms.id, ms.vendor_id, ms.product_id, ms.date, ms.image, ms.details, ms.type, ms.quantity, ms.purity, ms.unpolish_weight, ms.polish_weight, ms.rate, ms.wastage, ms.unpure_weight, ms.pure_weight, ms.status, ms.tValues, ms.barcode, v.type AS vendor_type, v.name AS vendor_name, v.18k, v.21k, v.22k, v.status AS vendor_status, v.date AS vendor_date
    FROM manufacturing_step AS ms
    INNER JOIN vendor AS v ON ms.vendor_id = v.id WHERE ms.product_id = :id";
    $getRecordStatement = $pdo->prepare($getRecordQuery);
    $getRecordStatement->bindParam(':id', $id);
    if ($getRecordStatement->execute()) {
        $array = $getRecordStatement->fetchAll(PDO::FETCH_ASSOC);
        echo json_encode($array, true);
        die;
    }
}

function PrintPolisher()
{
    include 'layouts/session.php';
    error_reporting(E_ALL);
    ini_set('display_errors', 1);
    require_once "layouts/config.php";
    $array = array();
    $id = $_POST['id'];
    $getRecordQuery = "SELECT ms.id, ms.vendor_id, ms.product_id, ms.date, ms.image, ms.details, ms.type, ms.quantity, ms.purity, ms.unpolish_weight, ms.polish_weight, ms.rate, ms.wastage, ms.unpure_weight, ms.pure_weight, ms.status, ms.tValues, ms.barcode, mv.type AS manufacturer_type, mv.name AS manufacturer_name, mv.18k AS manufacturer_18k, mv.21k AS manufacturer_21k, mv.22k AS manufacturer_22k, mv.status AS manufacturer_status, mv.date AS manufacturer_date, ps.id AS polisher_step_id, ps.date AS polisher_step_date, ps.difference, ps.rate AS polisher_rate, ps.wastage AS polisher_wastage, ps.payable, ps.status AS polisher_status, ps.polisherbarcode, pv.type AS polisher_type, pv.name AS polisher_name, pv.18k AS polisher_18k, pv.21k AS polisher_21k, pv.22k AS polisher_22k, pv.status AS polisher_status, pv.date AS polisher_date
    FROM manufacturing_step AS ms
    LEFT JOIN vendor AS mv ON ms.vendor_id = mv.id
    LEFT JOIN polisher_step AS ps ON ms.product_id = ps.product_id
    LEFT JOIN vendor AS pv ON ps.vendor_id = pv.id
    WHERE ms.product_id = :id";



    $getRecordStatement = $pdo->prepare($getRecordQuery);
    $getRecordStatement->bindParam(':id', $id);
    if ($getRecordStatement->execute()) {
        $array = $getRecordStatement->fetchAll(PDO::FETCH_ASSOC);
        echo json_encode($array, true);
        die;
    }
}

function PrintSetter()
{
    include 'layouts/session.php';
    error_reporting(E_ALL);
    ini_set('display_errors', 1);
    require_once "layouts/config.php";
    $array = array();
    $id = $_POST['id'];
    $vendor_id = $_POST['vendor_id'];
    $getRecordQuery = "SELECT ss.`Ssid`, ss.`product_id`, ss.`date`, ss.`vendor_id`, ss.`image`, ss.`detail`, ss.`retained_weight`, ss.`total_weight`, ss.`Issued_weight`, ss.`z_total_weight`, ss.`z_total_quantity`, ss.`s_total_weight`, ss.`s_total_quantity`, ss.`grand_weight`, ss.`status`, v.`type` AS vendor_type, v.`name` AS vendor_name, v.`18k`, v.`21k`, v.`22k`, v.`status` AS vendor_status, v.`date` AS vendor_date
    FROM `stone_setter_step` AS ss
    LEFT JOIN `vendor` AS v ON ss.`vendor_id` = v.`id`
    WHERE ss.`product_id` = :id AND ss.`vendor_id` = :v_id";




    $getRecordStatement = $pdo->prepare($getRecordQuery);
    $getRecordStatement->bindParam(':id', $id);
    $getRecordStatement->bindParam(':v_id', $vendor_id);

    if ($getRecordStatement->execute()) {
        $array = $getRecordStatement->fetchAll(PDO::FETCH_ASSOC);
        echo json_encode($array, true);
        die;
    }
}

function PrintReturned()
{
    include 'layouts/session.php';
    error_reporting(E_ALL);
    ini_set('display_errors', 1);
    require_once "layouts/config.php";
    $array = array();
    $id = $_POST['id'];
    $vendor_id = $_POST['vendor_id'];
    $getRecordQuery = "SELECT rs.`id` AS returned_stone_id, rs.`product_id`, rs.`vendor_id`, rs.`received_weight`, rs.`stone_weight`, rs.`stone_quantity`, rs.`total_weight`, rs.`rate`, rs.`shruded_quantity`, rs.`wastage`, rs.`grand_weight`, rs.`payable`, rs.`date`, v.`type` AS vendor_type, v.`name` AS vendor_name, v.`18k`, v.`21k`, v.`22k`, v.`status` AS vendor_status, v.`date` AS vendor_date
    FROM `returned_stone_step` AS rs
    LEFT JOIN `vendor` AS v ON rs.`vendor_id` = v.`id`
    WHERE rs.`product_id` = :id AND rs.`vendor_id` = :v_id";


    $getRecordStatement = $pdo->prepare($getRecordQuery);
    $getRecordStatement->bindParam(':id', $id);
    $getRecordStatement->bindParam(':v_id', $vendor_id);

    if ($getRecordStatement->execute()) {
        $array = $getRecordStatement->fetchAll(PDO::FETCH_ASSOC);
        echo json_encode($array, true);
        die;
    }
}


function GetModalProducts()
{
    include 'layouts/session.php';
    error_reporting(E_ALL);
    ini_set('display_errors', 1);
    require_once "layouts/config.php";
    $array = array();
    $getRecordQuery = "SELECT ms.id, ms.vendor_id, ms.product_id, ms.date, ms.image, ms.details, ms.type, ms.quantity, ms.purity, ms.unpolish_weight, ms.polish_weight, ms.rate, ms.wastage, ms.unpure_weight, ms.pure_weight, ms.status, ms.tValues, ms.barcode, v.type AS vendor_type, v.name AS vendor_name, v.18k, v.21k, v.22k, v.status AS vendor_status, v.date AS vendor_date
    FROM manufacturing_step AS ms
    INNER JOIN vendor AS v ON ms.vendor_id = v.id WHERE ms.status='Active'";
    $getRecordStatement = $pdo->prepare($getRecordQuery);
    if ($getRecordStatement->execute()) {
        $array = $getRecordStatement->fetchAll(PDO::FETCH_ASSOC);
        echo json_encode($array, true);
        die;
    }
}

function GetSemiFinishStatus()
{
    include 'layouts/session.php';
    error_reporting(E_ALL);
    ini_set('display_errors', 1);
    require_once "layouts/config.php";
    $array = array();
    $getRecordQuery = "SELECT `id` FROM `product` WHERE `status`='SemiFinished'";
    $getRecordStatement = $pdo->prepare($getRecordQuery);
    if ($getRecordStatement->execute()) {
        $array = $getRecordStatement->fetchAll(PDO::FETCH_ASSOC);
        echo json_encode($array, true);
    } else {
        echo json_encode($getRecordStatement->errorInfo(), true);
    }
}

function GetFilteredProducts()
{
    include 'layouts/session.php';
    error_reporting(E_ALL);
    ini_set('display_errors', 1);
    require_once "layouts/config.php";
    $array = array();

    $from_date = $_POST['from-date'];
    $to_date = $_POST['to-date'];
    $product_id = $_POST['product_id'];
    $vendor_id = $_POST['vendor_id'];

    $sql = "SELECT id, vendor_id, product_id, date, image, details, type, quantity, purity, unpolish_weight, polish_weight, rate, wastage, unpure_weight, pure_weight, status, tValues, barcode
        FROM manufacturing_step  WHERE 1=0";

    if (!empty($from_date)) {
        $sql .= " OR date >= :from_date ";
    }
    if (!empty($to_date)) {
        $sql .= " OR date <= :to_date ";
    }
    if (!empty($product_id)) {
        $sql .= " OR product_id = :product_id ";
    }
    if (!empty($vendor_id)) {
        $sql .= " OR vendor_id = :vendor_id ";
    }

    $stmt = $pdo->prepare($sql);

    if (!empty($from_date)) {
        $stmt->bindParam(':from_date', $from_date);
    }
    if (!empty($to_date)) {
        $stmt->bindParam(':to_date', $to_date);
    }
    if (!empty($product_id)) {
        $stmt->bindParam(':product_id', $product_id);
    }
    if (!empty($vendor_id)) {
        $stmt->bindParam(':vendor_id', $vendor_id);
    }

    if ($stmt->execute()) {
        $array = $stmt->fetchAll(PDO::FETCH_ASSOC);
    } else {
        array_push($array, "error");
    }
    echo json_encode($array, true);
}

function GetAllZircons()
{
    include 'layouts/session.php';
    error_reporting(E_ALL);
    ini_set('display_errors', 1);
    require_once "layouts/config.php";
    $array = array();
    $getRecordQuery = "SELECT `id`, `s_id`, `type`, `detail`, `price_per`, `quantity`, `weight`, `rate`, `total_amount`, `barcode` FROM `stock_details` WHERE quantity > 0";
    $getRecordStatement = $pdo->prepare($getRecordQuery);
    if ($getRecordStatement->execute()) {
        $array = $getRecordStatement->fetchAll(PDO::FETCH_ASSOC);
        echo json_encode($array, true);
        die;
    }
}

function GetAllStones()
{
    include 'layouts/session.php';
    error_reporting(E_ALL);
    ini_set('display_errors', 1);
    require_once "layouts/config.php";
    $array = array();
    $getRecordQuery = "SELECT `id`, `s_id`, `type`, `detail`, `price_per`, `quantity`, `weight`, `rate`, `total_amount`, `barcode` FROM `stock_details` WHERE quantity > 0";
    $getRecordStatement = $pdo->prepare($getRecordQuery);
    if ($getRecordStatement->execute()) {
        $array = $getRecordStatement->fetchAll(PDO::FETCH_ASSOC);
        echo json_encode($array, true);
        die;
    }
}

function GetStoneSetterNames()
{
    include 'layouts/session.php';
    error_reporting(E_ALL);
    ini_set('display_errors', 1);
    require_once "layouts/config.php";
    $array = array();
    $getRecordQuery = "SELECT * FROM vendor WHERE type = 'Stone Setter' AND status = 'Active'";
    $getRecordStatement = $pdo->prepare($getRecordQuery);
    if ($getRecordStatement->execute()) {
        $array = $getRecordStatement->fetchAll(PDO::FETCH_ASSOC);
        echo json_encode($array, true);
        die;
    }
}

function GetAllVendorData()
{
    include 'layouts/session.php';
    error_reporting(E_ALL);
    ini_set('display_errors', 1);
    require_once "layouts/config.php";
    $array = array();
    $type = $_POST['type'];
    $getRecordQuery = "SELECT * FROM `vendor` WHERE `status` = 'Active' AND `type` = '$type'";
    $getRecordStatement = $pdo->prepare($getRecordQuery);
    if ($getRecordStatement->execute()) {
        $array = $getRecordStatement->fetchAll(PDO::FETCH_ASSOC);
        echo json_encode($array, true);
        die;
    }
}

function GetAllSemiProductData()
{
    include 'layouts/session.php';
    error_reporting(E_ALL);
    ini_set('display_errors', 1);
    require_once "layouts/config.php";
    $array = array();
    $type = $_POST['type'];
    $getRecordQuery = "SELECT * FROM `universal_product` WHERE `status` = 'Active'";
    $getRecordStatement = $pdo->prepare($getRecordQuery);
    if ($getRecordStatement->execute()) {
        $array = $getRecordStatement->fetchAll(PDO::FETCH_ASSOC);
        echo json_encode($array, true);
        die;
    }
}

function VendorCount()
{
    include 'layouts/session.php';
    error_reporting(E_ALL);
    ini_set('display_errors', 1);
    require_once "layouts/config.php";
    $array = array();
    $getRecordQuery = "SELECT LPAD(COUNT(*), 3, '0') AS `count` FROM `vendor`";
    $getRecordStatement = $pdo->prepare($getRecordQuery);
    if ($getRecordStatement->execute()) {
        $row = $getRecordStatement->fetch();
        array_push($array, str_pad($row['count'] + 1, 3, '0', STR_PAD_LEFT));
        echo json_encode($array, true);
        die;
    }
}

function SemiProductCount()
{
    include 'layouts/session.php';
    error_reporting(E_ALL);
    ini_set('display_errors', 1);
    require_once "layouts/config.php";
    $array = array();
    $getRecordQuery = "SELECT LPAD(COUNT(*), 3, '0') AS `count` FROM `universal_product` where status='Active'";
    $getRecordStatement = $pdo->prepare($getRecordQuery);
    if ($getRecordStatement->execute()) {
        $row = $getRecordStatement->fetch();
        array_push($array, str_pad($row['count'] + 1, 3, '0', STR_PAD_LEFT));
        echo json_encode($array, true);
        die;
    }
}

function AddVendor()
{
    include 'layouts/session.php';
    error_reporting(E_ALL);
    ini_set('display_errors', 1);
    require_once "layouts/config.php";
    $array = array();
    $getRecordQuery = "INSERT INTO `vendor`(`id`,`type`,`name`, `18k`, `21k`, `22k`, `status`,`date`) VALUES (:id,:type, :name, :18k, :21k, :22k, 'Active',:date)";
    $getRecordStatement = $pdo->prepare($getRecordQuery);
    $getRecordStatement->bindParam(':name', $_POST['name'], PDO::PARAM_STR);
    $getRecordStatement->bindParam(':id', $_POST['id'], PDO::PARAM_STR);
    $getRecordStatement->bindParam(':type', $_POST['type'], PDO::PARAM_STR);
    $getRecordStatement->bindParam(':18k', $_POST['18k'], PDO::PARAM_STR);
    $getRecordStatement->bindParam(':21k', $_POST['21k'], PDO::PARAM_STR);
    $getRecordStatement->bindParam(':22k', $_POST['22k'], PDO::PARAM_STR);
    $getRecordStatement->bindParam(':date', $_POST['date'], PDO::PARAM_STR);
    if ($getRecordStatement->execute()) {
        array_push($array, 'success');
        echo json_encode($array, true);
        die;
    }
}

function AddType()
{
    include 'layouts/session.php';
    error_reporting(E_ALL);
    ini_set('display_errors', 1);
    require_once "layouts/config.php";
    $array = array();

    $checktype="SELECT * FROM `type` WHERE `id` = :id";
    $checktypeStatement = $pdo->prepare($checktype);
    $checktypeStatement->bindParam(':id', $_POST['id'], PDO::PARAM_STR);
    $checktypeStatement->execute();
    $row = $checktypeStatement->fetchAll(PDO::FETCH_ASSOC);

    if (count($row) > 0) {
        $getRecordQuery = "UPDATE `type` SET `name` = :name,`price_per`= :price_per, `rate` = :rate, `barcode` = :barcode WHERE `id` = :id";
        $getRecordStatement = $pdo->prepare($getRecordQuery);
        $getRecordStatement->bindParam(':id', $_POST['id'], PDO::PARAM_STR);
    }else{
        $getRecordQuery = "INSERT INTO `type`( `name`, `price_per`, `rate`, `barcode`) VALUES (:name, :price_per, :rate, :barcode)";
        $getRecordStatement = $pdo->prepare($getRecordQuery);
    }
    $getRecordStatement->bindParam(':name', $_POST['type'], PDO::PARAM_STR);
    $getRecordStatement->bindParam(':price_per', $_POST['price_per'], PDO::PARAM_STR);
    $getRecordStatement->bindParam(':rate', $_POST['rate'], PDO::PARAM_STR);
    $getRecordStatement->bindParam(':barcode', $_POST['barcode'], PDO::PARAM_STR);
    if ($getRecordStatement->execute()) {
        array_push($array, 'success');
        echo json_encode($array, true);
        die;
    }
}

function GetDetailType(){
    include 'layouts/session.php';
    error_reporting(E_ALL);
    ini_set('display_errors', 1);
    require_once "layouts/config.php";

    $array = array();
    $getRecordQuery = "SELECT * FROM `type` WHERE `id` = :id";
    $getRecordStatement = $pdo->prepare($getRecordQuery);
    $getRecordStatement->bindParam(':id', $_POST['id'], PDO::PARAM_STR);
    if ($getRecordStatement->execute()) {
        $array = $getRecordStatement->fetch(PDO::FETCH_ASSOC);
        echo json_encode($array, true);
        die;
    }
}

function GetAllTypes(){
    include 'layouts/session.php';
    error_reporting(E_ALL);
    ini_set('display_errors', 1);
    require_once "layouts/config.php";

    $array = array();
    $getRecordQuery = "SELECT * FROM `type`";
    $getRecordStatement = $pdo->prepare($getRecordQuery);
    if ($getRecordStatement->execute()) {
        $array = $getRecordStatement->fetchAll(PDO::FETCH_ASSOC);
        echo json_encode($array, true);
        die;
    }
}

function AddSemiProduct()
{
    include 'layouts/session.php';
    error_reporting(E_ALL);
    ini_set('display_errors', 1);
    require_once "layouts/config.php";

    $array = array();
    $getRecordQuery = "INSERT INTO `universal_product`(`id`,`name`,`status`) VALUES (:id,:name,'Active')";
    $getRecordStatement = $pdo->prepare($getRecordQuery);
    $getRecordStatement->bindParam(':name', $_POST['name'], PDO::PARAM_STR);
    $getRecordStatement->bindParam(':id', $_POST['id'], PDO::PARAM_STR);
    if ($getRecordStatement->execute()) {
        array_push($array, 'success');
        echo json_encode($array, true);
        die;
    }
}

function VendorDelete()
{
    include 'layouts/session.php';
    error_reporting(E_ALL);
    ini_set('display_errors', 1);
    require_once "layouts/config.php";
    $array = array();
    $getRecordQuery = "UPDATE `vendor` SET `status` = 'Inactive' WHERE `id` = :id";
    $getRecordStatement = $pdo->prepare($getRecordQuery);
    $getRecordStatement->bindParam(':id', $_POST['id'], PDO::PARAM_STR);
    if ($getRecordStatement->execute()) {
        array_push($array, 'success');
        echo json_encode($array, true);
        die;
    }
}

function SemiProductDelete()
{
    include 'layouts/session.php';
    error_reporting(E_ALL);
    ini_set('display_errors', 1);
    require_once "layouts/config.php";
    $array = array();
    $getRecordQuery = "UPDATE `universal_product` SET `status` = 'Inactive' WHERE `id` = :id";
    $getRecordStatement = $pdo->prepare($getRecordQuery);
    $getRecordStatement->bindParam(':id', $_POST['id'], PDO::PARAM_STR);
    if ($getRecordStatement->execute()) {
        array_push($array, 'success');
        echo json_encode($array, true);
        die;
    }
}

function GetVendor()
{
    include 'layouts/session.php';
    error_reporting(E_ALL);
    ini_set('display_errors', 1);
    require_once "layouts/config.php";
    $array = array();
    $id = $_POST['id'];
    $getRecordQuery = "SELECT * FROM `vendor` WHERE `status` = 'Active' AND `id` = '$id'";
    $getRecordStatement = $pdo->prepare($getRecordQuery);
    if ($getRecordStatement->execute()) {
        array_push($array, $getRecordStatement->fetch(PDO::FETCH_ASSOC));
        echo json_encode($array, true);
        die;
    }
}

function GetUniversalProduct()
{
    include 'layouts/session.php';
    error_reporting(E_ALL);
    ini_set('display_errors', 1);
    require_once "layouts/config.php";
    $array = array();
    $getRecordQuery = "SELECT * FROM `universal_product` WHERE `status` = 'Active'";
    $getRecordStatement = $pdo->prepare($getRecordQuery);
    if ($getRecordStatement->execute()) {
        array_push($array, $getRecordStatement->fetch(PDO::FETCH_ASSOC));
        echo json_encode($array, true);
        die;
    }
}

function GetSemiProduct()
{
    include 'layouts/session.php';
    error_reporting(E_ALL);
    ini_set('display_errors', 1);
    require_once "layouts/config.php";
    $array = array();
    $id = $_POST['id'];
    $getRecordQuery = "SELECT * FROM `universal_product` WHERE `status` = 'Active' AND `id` = '$id'";
    $getRecordStatement = $pdo->prepare($getRecordQuery);
    if ($getRecordStatement->execute()) {
        array_push($array, $getRecordStatement->fetch(PDO::FETCH_ASSOC));
        echo json_encode($array, true);
        die;
    }
}

function UpdateVendor()
{
    include 'layouts/session.php';
    error_reporting(E_ALL);
    ini_set('display_errors', 1);
    require_once "layouts/config.php";
    $array = array();
    $getRecordQuery = "UPDATE `vendor` SET `name` = :name,`type`= :type, `18k` = :18k, `21k` = :21k, `22k` = :22k, `date`=:date WHERE `id` = :id";
    $getRecordStatement = $pdo->prepare($getRecordQuery);
    $getRecordStatement->bindParam(':name', $_POST['name'], PDO::PARAM_STR);
    $getRecordStatement->bindParam(':id', $_POST['id'], PDO::PARAM_STR);
    $getRecordStatement->bindParam(':type', $_POST['type'], PDO::PARAM_STR);
    $getRecordStatement->bindParam(':18k', $_POST['18k'], PDO::PARAM_STR);
    $getRecordStatement->bindParam(':21k', $_POST['21k'], PDO::PARAM_STR);
    $getRecordStatement->bindParam(':22k', $_POST['22k'], PDO::PARAM_STR);
    $getRecordStatement->bindParam(':date', $_POST['date'], PDO::PARAM_STR);
    if ($getRecordStatement->execute()) {
        array_push($array, 'success');
        echo json_encode($array, true);
        die;
    }
}

function UpdateSemiProduct()
{
    include 'layouts/session.php';
    error_reporting(E_ALL);
    ini_set('display_errors', 1);
    require_once "layouts/config.php";
    $array = array();
    $getRecordQuery = "UPDATE `universal_product` SET `name` = :name WHERE `id` = :id";
    $getRecordStatement = $pdo->prepare($getRecordQuery);
    $getRecordStatement->bindParam(':name', $_POST['name'], PDO::PARAM_STR);
    $getRecordStatement->bindParam(':id', $_POST['id'], PDO::PARAM_STR);
    if ($getRecordStatement->execute()) {
        array_push($array, 'success');
        echo json_encode($array, true);
        die;
    }
}

function ProductCount()
{
    include 'layouts/session.php';
    error_reporting(E_ALL);
    ini_set('display_errors', 1);
    require_once "layouts/config.php";
    $array = array();
    $getRecordQuery = "SELECT LPAD(COUNT(*), 4, '0') AS `count` FROM `product`";
    $getRecordStatement = $pdo->prepare($getRecordQuery);
    if ($getRecordStatement->execute()) {
        $row = $getRecordStatement->fetch();
        array_push($array, str_pad($row['count'] + 1, 4, '0', STR_PAD_LEFT));
        echo json_encode($array, true);
        die;
    }
}

function GetAllProduct()
{
    include 'layouts/session.php';
    error_reporting(E_ALL);
    ini_set('display_errors', 1);
    require_once "layouts/config.php";
    $array = array();
    $getRecordQuery = "SELECT * FROM `product` WHERE `status` = 'Active'";
    $getRecordStatement = $pdo->prepare($getRecordQuery);
    if ($getRecordStatement->execute()) {
        $array = $getRecordStatement->fetchAll(PDO::FETCH_ASSOC);
        echo json_encode($array, true);
        die;
    }
}

function StepOne()
{
    include 'layouts/session.php';
    error_reporting(E_ALL);
    ini_set('display_errors', 1);
    require_once "layouts/config.php";

    $dir = 'external-work-directory/images/';
    $imageName = $_FILES['image']['name'];
    $imageTmpName = $_FILES['image']['tmp_name'];
    $vendor_id = trim($_POST['vendor_id']);
    $code = $_POST['code'];
    $type = $_POST['type'];
    $quantity = $_POST['quantity'];
    $purity = trim($_POST['purity']);
    $purity_text = trim($_POST['purity_text']);
    $unpolish_weight = trim($_POST['unpolish_weight']);
    $polish_weight = trim($_POST['polish_weight']);
    $rate = trim($_POST['rate']);
    $wastage = trim($_POST['wastage']);
    $tValues = trim($_POST['tValues']);
    $date = $_POST['date'];
    $details = $_POST['details'];
    $barcode = $_POST['barcode'];
    $fileWithName = $dir . $imageName;

    $fileType = pathinfo($fileWithName, PATHINFO_EXTENSION);

    if (!file_exists($dir)) {
        mkdir($dir, 0777, true);
        chmod($dir, 0777);
    }

    $time = time();

    $pName = $dir . '/' . $time . '-' . $imageName;

    $array = array();

    $qry3 = "SELECT * FROM `product` WHERE `id` = '$code'";
    $qry3Statement = $pdo->prepare($qry3);
    $qry3Statement->execute();
    $row = $qry3Statement->fetch(PDO::FETCH_ASSOC);
    if ($row && $row['id'] == $code) {
        array_push($array, 'success');
        $qry = "UPDATE `manufacturing_step` SET `vendor_id`=:vendor_id,`image`=:imageName,`product_id`=:code,`type`=:fType,`quantity`=:quantity,`purity`=:pValue,`purity_text`=:purity_text,`unpolish_weight`=:unpolish_weight,`polish_weight`=:polish_weight,`rate`=:rate,`wastage`=:wastage,`tValues`=:tValues,`date`=:fDate,`details`=:details,`barcode`=:barcode WHERE `product_id` = '$code'";
    } else {
        $qry1 = "INSERT INTO `product`(`id`, `status`) VALUES (:code, 'Active')";
        $qry1Statement = $pdo->prepare($qry1);

        $qry1Statement->bindParam(':code', $code);

        if ($qry1Statement->execute()) {
            array_push($array, 'success');
        }
        $qry = "INSERT INTO manufacturing_step(`vendor_id`, `image`, `product_id`, `type`, `quantity`, `purity`, `purity_text`, `unpolish_weight`, `polish_weight`, `rate`, `wastage`, `tValues`, `date`, `details`,`barcode`)
        VALUES (:vendor_id, :imageName, :code, :fType, :quantity, :pValue,:purity_text, :unpolish_weight, :polish_weight, :rate, :wastage, :tValues, :fDate, :details, :barcode);";
    }

    $qryStatement = $pdo->prepare($qry);

    $qryStatement->bindParam(':vendor_id', $vendor_id);
    $qryStatement->bindParam(':imageName', $pName);
    $qryStatement->bindParam(':code', $code);
    $qryStatement->bindParam(':fType', $type);
    $qryStatement->bindParam(':quantity', $quantity);
    $qryStatement->bindParam(':pValue', $purity);
    $qryStatement->bindParam(':purity_text', $purity_text);
    $qryStatement->bindParam(':unpolish_weight', $unpolish_weight);
    $qryStatement->bindParam(':polish_weight', $polish_weight);
    $qryStatement->bindParam(':rate', $rate);
    $qryStatement->bindParam(':wastage', $wastage);
    $qryStatement->bindParam(':tValues', $tValues);
    $qryStatement->bindParam(':fDate', $date);
    $qryStatement->bindParam(':details', $details);
    $qryStatement->bindParam(':barcode', $barcode);

    move_uploaded_file($imageTmpName, $pName);

    if ($qryStatement->execute()) {
        array_push($array, 'success');
    }
    echo json_encode($array);
}

function StepTwo()
{
    include 'layouts/session.php';
    error_reporting(E_ALL);
    ini_set('display_errors', 1);
    require_once "layouts/config.php";

    $dirpro = 'external-work-directory/images';
    $imageNamepo = $_FILES['image']['name'];
    $imageTmpName = $_FILES['image']['tmp_name'];

    $stepTwoCode = trim($_POST['product_id']);
    $stepTwoName = trim($_POST['vendor_id']);
    $stepTwoDifference = $_POST['difference'];
    $rate = $_POST['p_rate'];
    $poWas = $_POST['poWas'];
    $payable = $_POST['payable'];
    $stepTwoDate = $_POST['date'];
    $details = $_POST['detail'];
    $polisherbarcode = $_POST['polisherbarcode'];
    $fileWithNamepo = $dirpro . $imageNamepo;

    $fileType = pathinfo($fileWithNamepo, PATHINFO_EXTENSION);

    if (!file_exists($dirpro)) {
        mkdir($dirpro, 0777, true);
        chmod($dirpro, 0777);
        // copy('article-archive/published-articles/CMC/CMC-29-42-6335/XML-compilation/CMC-29-42-6335-compilation.xml', $dir.'/test.xml');
    }

    $time = time();

    $poliName = $dirpro . '/' . $time . '-' . $imageNamepo;

    $qry = "SELECT * FROM `polisher_step` WHERE `product_id` = :stepTwoCode";
    $qryStatement = $pdo->prepare($qry);
    $qryStatement->bindParam(':stepTwoCode', $stepTwoCode);
    $qryStatement->execute();
    $array = array();
    if ($qryStatement->rowCount() > 0) {
        $stepTwoQry = "UPDATE `polisher_step` SET `image`=:imageNamepo,`vendor_id`=:stepTwoName,`rate`=:rate,`difference`=:stepTwoDifference,`Wastage`=:poWas,`Payable`=:payable,`date`=:stepTwoDate,`details`=:details,`polisherbarcode`=:polisherbarcode WHERE `product_id` = :stepTwoCode";
    } else {
        $stepTwoQry = "INSERT INTO polisher_step(`product_id`, `image`, `vendor_id`, `difference`, `Wastage`, `Payable`, `date`,`details`,`polisherbarcode`,`rate`)
        VALUES (:stepTwoCode,:imageNamepo, :stepTwoName, :stepTwoDifference, :poWas, :payable, :stepTwoDate, :details, :polisherbarcode,:rate);";
    }

    $stepTwoStatement = $pdo->prepare($stepTwoQry);

    $stepTwoStatement->bindParam(':stepTwoCode', $stepTwoCode);
    $stepTwoStatement->bindParam(':stepTwoName', $stepTwoName);
    $stepTwoStatement->bindParam(':stepTwoDifference', $stepTwoDifference);
    $stepTwoStatement->bindParam(':poWas', $poWas);
    $stepTwoStatement->bindParam(':payable', $payable);
    $stepTwoStatement->bindParam(':stepTwoDate', $stepTwoDate);
    $stepTwoStatement->bindParam(':details', $details);
    $stepTwoStatement->bindParam(':imageNamepo', $poliName);
    $stepTwoStatement->bindParam(':polisherbarcode', $polisherbarcode);
    $stepTwoStatement->bindParam(':rate', $rate);

    move_uploaded_file($imageTmpName, $poliName);

    $array = array();

    if ($stepTwoStatement->execute()) {
        array_push($array, 'success');
    }
    echo json_encode($array, true);
}

function StepThree()
{
    include 'layouts/session.php';
    error_reporting(E_ALL);
    ini_set('display_errors', 1);
    require_once "layouts/config.php";

    $array = array();

    $dirpro = 'external-work-directory/images';
    $imageNamepo = $_FILES['image']['name'];
    $imageTmpName = $_FILES['image']['tmp_name'];
    $vendor_id = $_POST['vendor'];
    array_push($array, $vendor_id);
    $product_id = $_POST['code'];
    $date = $_POST['date'];
    $details = $_POST['detail'];
    $total_weight = $_POST['s_total_weight'];
    $retained_weight = $_POST['retained_weight'];
    $issued_weight = $_POST['Issued_weight'];
    $z_code = $_POST['zircon_code'];
    $z_weight = $_POST['zircon_weight'];
    $z_quantity = $_POST['zircon_quantity'];
    $total_z_weight = $_POST['zircon_total_weight'];
    $total_z_quantity = $_POST['zircon_total_quantity'];
    $s_code = $_POST['stone_code'];
    $s_weight = $_POST['stone_weight'];
    $s_quantity = $_POST['stone_quantity'];
    $total_s_weight = $_POST['stone_total_weight'];
    $total_s_quantity = $_POST['stone_total_quantity'];
    $grand_weight = $_POST['grand_total_weight'];
    $total_z_weight[0] = $total_z_weight[0] === '' ? 0 : $total_z_weight[0];
    $total_z_quantity[0] = $total_z_quantity[0] === '' ? 0 : $total_z_quantity[0];
    $total_s_weight[0] = $total_s_weight[0] === '' ? 0 : $total_s_weight[0];
    $total_s_quantity[0] = $total_s_quantity[0] === '' ? 0 : $total_s_quantity[0];



    $time = time();


    $qry = "SELECT * FROM `stone_setter_step` WHERE `product_id` = :product_id AND `vendor_id` = :vendor_id";
    $qryStatement = $pdo->prepare($qry);
    $qryStatement->bindParam(':product_id', $product_id[0]);
    $qryStatement->bindParam(':vendor_id', $vendor_id[0]);
    $qryStatement->execute();
    $array = array();
    if ($qryStatement->rowCount() > 0) {
        $qry2 = "UPDATE `stone_setter_step` SET `date`=:date,`image`=:imageNamepo,`detail`=:details,`Issued_weight`=:issued_weight,`z_total_weight`=:total_z_weight,`z_total_quantity`=:total_z_quantity,`s_total_weight`=:total_s_weight,`s_total_quantity`=:total_s_quantity,`grand_weight`=:grand_weight, `total_weight`=:total_weight, `retained_weight`=:retained_weight WHERE `product_id` = :product_id AND `vendor_id` = :vendor_id";
    } else {
        $qry2 = "INSERT INTO `stone_setter_step`( `product_id`, `date`, `vendor_id`, `image`, `detail`, `total_weight`, `retained_weight`, `Issued_weight`, `z_total_weight`, `z_total_quantity`, `s_total_weight`, `s_total_quantity`, `grand_weight`, `status`) VALUES (:product_id,:date,:vendor_id,:imageNamepo,:details,:total_weight,:retained_weight,:issued_weight,:total_z_weight,:total_z_quantity,:total_s_weight,:total_s_quantity,:grand_weight,'Active')";
    }
    $qryStatement2 = $pdo->prepare($qry2);
    $qryStatement2->bindParam(':product_id', $product_id[0]);
    $qryStatement2->bindParam(':date', $date[0]);
    $qryStatement2->bindParam(':vendor_id', $vendor_id[0]);
    $qryStatement2->bindParam(':imageNamepo', $imageNamepo[0]);
    $qryStatement2->bindParam(':details', $details[0]);
    $qryStatement2->bindParam(':issued_weight', $issued_weight[0]);
    $qryStatement2->bindParam(':total_z_weight', $total_z_weight[0]);
    $qryStatement2->bindParam(':total_z_quantity', $total_z_quantity[0]);
    $qryStatement2->bindParam(':total_s_weight', $total_s_weight[0]);
    $qryStatement2->bindParam(':total_s_quantity', $total_s_quantity[0]);
    $qryStatement2->bindParam(':grand_weight', $grand_weight[0]);
    $qryStatement2->bindParam(':total_weight', $total_weight[0]);
    $qryStatement2->bindParam(':retained_weight', $retained_weight[0]);
    if ($qryStatement2->execute()) {
        array_push($array, 'success');
    }


    $qry3 = "SELECT * FROM `stone_setter_step` WHERE `product_id` = :product_id and `vendor_id` = :vendor_id";
    $qryStatement3 = $pdo->prepare($qry3);
    $qryStatement3->bindParam(':product_id', $product_id[0]);
    $qryStatement3->bindParam(':vendor_id', $vendor_id[0]);
    $qryStatement3->execute();
    $array = array();
    if ($qryStatement3->rowCount() > 0) {
        // Update Zircon
        $qry001 = "SELECT `code`, `weight`, `quantity` FROM `zircon` WHERE `product_id` = :product_id and `vendor_id` = :vendor_id";
        $qryStatement001 = $pdo->prepare($qry001);
        $qryStatement001->bindParam(':product_id', $product_id[0]);
        $qryStatement001->bindParam(':vendor_id', $vendor_id[0]);
        $qryStatement001->execute();
        $results = $qryStatement001->fetchAll(PDO::FETCH_ASSOC);
        foreach ($results as $result) {
            $qryUpdate = "UPDATE `stock_details` 
                      SET `weight` = `weight` + :weight, `quantity` = `quantity` + :quantity 
                      WHERE `barcode` = :barcode LIMIT 1";
            $updateStatement = $pdo->prepare($qryUpdate);
            $updateStatement->bindParam(':weight', $result['weight']);
            $updateStatement->bindParam(':quantity', $result['quantity']);
            $updateStatement->bindParam(':barcode', $result['code']);
            $updateStatement->execute();
        }

        // Update Stone
        $qry002 = "SELECT `code`, `weight`, `quantity` FROM `stone` WHERE `product_id` = :product_id and `vendor_id` = :vendor_id";
        $qryStatement002 = $pdo->prepare($qry002);
        $qryStatement002->bindParam(':product_id', $product_id[0]);
        $qryStatement002->bindParam(':vendor_id', $vendor_id[0]);
        $qryStatement002->execute();
        $results002 = $qryStatement002->fetchAll(PDO::FETCH_ASSOC);
        foreach ($results002 as $result) {
            $qryUpdate = "UPDATE `stock_details` 
                      SET `weight` = `weight` + :weight, `quantity` = `quantity` + :quantity 
                      WHERE `barcode` = :barcode 
                      LIMIT 1";
            $updateStatement = $pdo->prepare($qryUpdate);
            $updateStatement->bindParam(':weight', $result['weight']);
            $updateStatement->bindParam(':quantity', $result['quantity']);
            $updateStatement->bindParam(':barcode', $result['code']);
            $updateStatement->execute();
        }

        // Delete Records
        $qry2 = "DELETE FROM `zircon` WHERE `product_id` = :product_id and `vendor_id` = :vendor_id";
        $qryStatement2 = $pdo->prepare($qry2);
        $qryStatement2->bindParam(':product_id', $product_id[0]);
        $qryStatement2->bindParam(':vendor_id', $vendor_id[0]);
        $qryStatement2->execute();
        $qry2 = "DELETE FROM `stone` WHERE `product_id` = :product_id and `vendor_id` = :vendor_id";
        $qryStatement2 = $pdo->prepare($qry2);
        $qryStatement2->bindParam(':product_id', $product_id[0]);
        $qryStatement2->bindParam(':vendor_id', $vendor_id[0]);
        $qryStatement2->execute();
    }

    for ($i = 0; $i < @count($z_code); $i++) {
        if ($z_code[$i] == '') {
            break;
        }
        $z_weight1 = $z_weight[$i];
        $z_quantity1 = $z_quantity[$i] ? $z_quantity[$i] : 0;
        $z_code1 = $z_code[$i];

        // Subtract from stock_details first
        $qryUpdateStock = "UPDATE `stock_details` 
                           SET `weight` = `weight` - :z_weight, `quantity` = `quantity` - :z_quantity 
                           WHERE `barcode` = :z_code 
                           LIMIT 1";

        $updateStockStmt = $pdo->prepare($qryUpdateStock);
        $updateStockStmt->bindParam(':z_code', $z_code1);
        $updateStockStmt->bindParam(':z_weight', $z_weight1);
        $updateStockStmt->bindParam(':z_quantity', $z_quantity1);
        $updateStockStmt->execute();

        // Now insert into zircon
        $qry = "INSERT INTO `zircon`(`code`, `vendor_id`, `product_id`, `weight`, `price`, `quantity`) 
                VALUES (:z_code,:vendor_id,:product_id,:z_weight,0,:z_quantity)";

        $statement = $pdo->prepare($qry);
        $statement->bindParam(':z_code', $z_code1);
        $statement->bindParam(':product_id', $product_id[0]);
        $statement->bindParam(':z_weight', $z_weight1);
        $statement->bindParam(':z_quantity', $z_quantity1);
        $statement->bindParam(':vendor_id', $vendor_id[0]);

        if ($statement->execute()) {
            array_push($array, 'success');
        }
    }

    for ($i = 0; $i < @count($s_code); $i++) {

        if ($s_code[$i] == '') {
            break;
        }
        $s_weight1 = $s_weight[$i];
        $s_quantity1 = $s_quantity[$i] ? $s_quantity[$i] : 0;
        $s_code1 = $s_code[$i];
        // Subtract from stock_details first
        $qryUpdateStock = "UPDATE `stock_details` 
                           SET `weight` = `weight` - :s_weight, `quantity` = `quantity` - :s_quantity 
                           WHERE `barcode` = :s_code 
                           LIMIT 1";

        $updateStockStmt = $pdo->prepare($qryUpdateStock);
        $updateStockStmt->bindParam(':s_code', $s_code1);
        $updateStockStmt->bindParam(':s_weight', $s_weight1);
        $updateStockStmt->bindParam(':s_quantity', $s_quantity1);
        $updateStockStmt->execute();

        $qry1 = "INSERT INTO `stone`(`code`, `vendor_id`, `product_id`, `price`, `weight`, `quantity`) VALUES (:s_code,:vendor_id,:product_id,0,:s_weight,:s_quantity)";

        $statement1 = $pdo->prepare($qry1);

        $statement1->bindParam(':s_code', $s_code1);
        $statement1->bindParam(':product_id', $product_id[0]);
        $statement1->bindParam(':s_weight', $s_weight1);
        $statement1->bindParam(':s_quantity', $s_quantity1);
        $statement1->bindParam(':vendor_id', $vendor_id[0]);

        if ($statement1->execute()) {
            array_push($array, 'success');
        }
    }

    // $statement1 = $pdo->prepare($qry4);

    // $statement1->bindParam(':product_id', $product_id[0]);
    // $statement1->bindParam(':date', $date[0]);
    // $statement1->bindParam(':vendor_id', $vendor_id[0]);
    // $statement1->bindParam(':imageNamepo', $pName[0]);
    // $statement1->bindParam(':details', $details[0]);
    // $statement1->bindParam(':issued_weight', $issued_weight[0]);
    // $statement1->bindParam(':total_z_price', $total_z_price[0]);
    // $statement1->bindParam(':total_z_weight', $total_z_weight[0]);
    // $statement1->bindParam(':total_z_quantity', $total_z_quantity[0]);
    // $statement1->bindParam(':total_s_price', $total_s_price[0]);
    // $statement1->bindParam(':total_s_weight', $total_s_weight[0]);
    // $statement1->bindParam(':total_s_quantity', $total_s_quantity[0]);
    // $statement1->bindParam(':grand_weight', $grand_weight[0]);
    // $statement1->bindParam(':grand_price', $grand_price[0]);

    // move_uploaded_file($imageTmpName[0], $pName[0]);

    // if ($statement1->execute()) {
    //     array_push($array, 'success');
    // }
    echo json_encode($array, true);
}

function ReturnedStepThree()
{
    include 'layouts/session.php';
    error_reporting(E_ALL);
    ini_set('display_errors', 1);
    require_once "layouts/config.php";
    $array = array();
    $product_id = $_POST['product_id'];
    $vendor_id = $_POST['vendor_id'];
    $received_weight = $_POST['received_weight'];
    $r_stone_weight = $_POST['r_stone_weight'] ? $_POST['r_stone_weight'] : 0;
    $r_stone_quantity = $_POST['r_stone_quantity'] ? $_POST['r_stone_quantity'] : 0;
    $r_total_weight = $_POST['r_total_weight'];
    $r_rate = $_POST['r_rate'];
    $r_wastage = $_POST['r_wastage'];
    $r_grand_weight = $_POST['r_grand_weight'];
    $r_payable = $_POST['r_payable'];
    $r_code = $_POST['r_code'];
    $r_weight = $_POST['r_weight'];
    $r_quantity = $_POST['r_quantity'];
    $sh_qty = $_POST['sh_qty'];

    $qry2 = "SELECT * FROM `returned_stone_step` WHERE `product_id` = :product_id and `vendor_id` = :vendor_id";
    $qryStatement2 = $pdo->prepare($qry2);
    $qryStatement2->bindParam(':product_id', $product_id);
    $qryStatement2->bindParam(':vendor_id', $vendor_id);
    $qryStatement2->execute();
    $row = $qryStatement2->fetch(PDO::FETCH_ASSOC);

    if ($row > 0) {
        $qry = "UPDATE `returned_stone_step` SET `received_weight`=:received_weight,`stone_weight`=:r_stone_weight,`stone_quantity`=:r_stone_quantity,`total_weight`=:r_total_weight,`rate`=:r_rate ,`shruded_quantity`=:sh_qty,`wastage`=:r_wastage,`grand_weight`=:r_grand_weight,`payable`=:r_payable, `vendor_id`=:vendor_id WHERE `product_id` = :product_id";

        $qry3 = "DELETE FROM `returned_item` WHERE `product_id` = :product_id";
        $statement3 = $pdo->prepare($qry3);
        $statement3->bindParam(':product_id', $product_id);
        $statement3->execute();
    } else {
        $qry = "INSERT INTO `returned_stone_step`(`product_id`, `vendor_id`, `received_weight`, `stone_weight`, `stone_quantity`, `total_weight`, `rate`, `shruded_quantity`, `wastage`, `grand_weight`, `payable`) VALUES (:product_id,:vendor_id,:received_weight,:r_stone_weight,:r_stone_quantity,:r_total_weight,:r_rate,:sh_qty,:r_wastage,:r_grand_weight,:r_payable)";
    }

    $statement = $pdo->prepare($qry);
    $statement->bindParam(':product_id', $product_id);
    $statement->bindParam(':r_stone_weight', $r_stone_weight);
    $statement->bindParam(':r_stone_quantity', $r_stone_quantity);
    $statement->bindParam(':r_total_weight', $r_total_weight);
    $statement->bindParam(':r_rate', $r_rate);
    $statement->bindParam(':sh_qty', $sh_qty);
    $statement->bindParam(':r_wastage', $r_wastage);
    $statement->bindParam(':r_grand_weight', $r_grand_weight);
    $statement->bindParam(':r_payable', $r_payable);
    $statement->bindParam(':received_weight', $received_weight);
    $statement->bindParam(':vendor_id', $vendor_id);
    if ($statement->execute()) {
        array_push($array, 'success');
    } else {
        array_push($array, 'error');
    }

    $qry1 = "INSERT INTO `returned_item`(`code`,`vendor_id` , `product_id`, `price`, `weight`, `quantity`) VALUES (:r_code,:vendor_id,:product_id,0,:r_weight,:r_quantity)";

    if (is_array($r_code)) {
        for ($i = 0; $i < @count($r_code); $i++) {
            if ($r_code[$i] == '') {
                break;
            }
            $r_code1 = $r_code[$i];
            $r_weight1 = $r_weight[$i];
            $r_quantity1 = $r_quantity[$i];
            $statement1 = $pdo->prepare($qry1);
            $statement1->bindParam(':product_id', $product_id);
            $statement1->bindParam(':r_code', $r_code1);
            $statement1->bindParam(':r_weight', $r_weight1);
            $statement1->bindParam(':r_quantity', $r_quantity1);
            $statement1->bindParam(':vendor_id', $vendor_id);
            if ($statement1->execute()) {
                array_push($array, 'success');
            } else {
                array_push($array, 'error');
            }
        }
    }
    echo json_encode($array, true);
}

function StepFour()
{
    include 'layouts/session.php';
    error_reporting(E_ALL);
    ini_set('display_errors', 1);
    require_once "layouts/config.php";

    $array = array();
    $date = $_POST['date'];
    $vendor_id = $_POST['vendor_id'];
    $product_id = $_POST['product_id'];
    $amount = $_POST['amount'];
    $type = $_POST['type'];

    $qry1 = "Delete from `additional_step` WHERE `product_id` = :product_id";

    $qryStatement1 = $pdo->prepare($qry1);
    $qryStatement1->bindParam(':product_id', $product_id);
    $qryStatement1->execute();
    // $row = $qryStatement1->fetch(PDO::FETCH_ASSOC);

    $qry = "Insert into `additional_step`(`product_id`,`vendor_id`,`type`,`amount`,`date`,`status`) VALUES (:product_id,:vendor_id,:type,:amount,:date,'Active')";

    for ($i = 0; $i < @count($type); $i++) {
        $type1 = $type[$i];
        $amount1 = $amount[$i];
        $vendor_id1 = $vendor_id[$i];
        $date1 = $date[$i];
        $statement = $pdo->prepare($qry);
        $statement->bindParam(':product_id', $product_id);
        $statement->bindParam(':vendor_id', $vendor_id1);
        $statement->bindParam(':type', $type1);
        $statement->bindParam(':amount', $amount1);
        $statement->bindParam(':date', $date1);
        if ($statement->execute()) {
            array_push($array, 'success');
        } else {
            array_push($array, 'error');
        }
    }

    echo json_encode($array, true);
}

function GetManufacturerData()
{
    include 'layouts/session.php';
    error_reporting(E_ALL);
    ini_set('display_errors', 1);
    require_once "layouts/config.php";

    $id = $_POST['id'];
    $qry = "SELECT * FROM manufacturing_step WHERE product_id = :id";
    $qryStatement = $pdo->prepare($qry);
    $qryStatement->bindParam(':id', $id);
    $qryStatement->execute();
    $result = $qryStatement->fetchAll(PDO::FETCH_ASSOC);
    echo json_encode($result, true);
}

function GetPolisherData()
{
    include 'layouts/session.php';
    error_reporting(E_ALL);
    ini_set('display_errors', 1);
    require_once "layouts/config.php";

    $id = $_POST['id'];
    $qry = "SELECT * FROM polisher_step WHERE product_id = :id";
    $qryStatement = $pdo->prepare($qry);
    $qryStatement->bindParam(':id', $id);
    $qryStatement->execute();
    $result = $qryStatement->fetchAll(PDO::FETCH_ASSOC);
    echo json_encode($result, true);
}

function GetStoneSetterData()
{
    include 'layouts/session.php';
    error_reporting(E_ALL);
    ini_set('display_errors', 1);
    require_once "layouts/config.php";

    $id = $_POST['id'];
    $qry = "SELECT * FROM stone_setter_step WHERE product_id = :id";
    $qryStatement = $pdo->prepare($qry);
    $qryStatement->bindParam(':id', $id);
    $array = array();
    if ($qryStatement->execute()) {
        $result = $qryStatement->fetchAll(PDO::FETCH_ASSOC);
        foreach ($result as &$row) {
            // Get the zircon data for each stone setter
            $qry = "SELECT * FROM zircon WHERE product_id=:id AND vendor_id = :vendor_id";
            $qryStatement = $pdo->prepare($qry);

            $qryStatement->bindParam(':id', $row['product_id']);
            $qryStatement->bindParam(':vendor_id', $row['vendor_id']);
            $qryStatement->execute();

            $zirconResult = $qryStatement->fetchAll(PDO::FETCH_ASSOC);

            // Add the zircon data to each stone setter data
            $row['zircons'] = $zirconResult;
        }
        foreach ($result as &$row) {
            $qry = "SELECT * FROM stone WHERE product_id=:id AND vendor_id = :vendor_id";
            $qryStatement = $pdo->prepare($qry);

            $qryStatement->bindParam(':id', $row['product_id']);
            $qryStatement->bindParam(':vendor_id', $row['vendor_id']);
            $qryStatement->execute();

            $stoneResult = $qryStatement->fetchAll(PDO::FETCH_ASSOC);

            $row['stones'] = $stoneResult;
        }
        echo json_encode($result, true);
    } else {
        echo json_encode($qryStatement->errorInfo(), true);
    }
}

function SemiFinish()
{
    include 'layouts/session.php';
    error_reporting(E_ALL);
    ini_set('display_errors', 1);
    require_once "layouts/config.php";

    // Get the 'id' value from POST data
    $id = $_POST['id'];

    // Prepare the SQL query
    $qry = "UPDATE `product` SET `status` = 'SemiFinished' WHERE `id` = :id";
    $qryStatement = $pdo->prepare($qry);

    // Bind the 'id' value to the placeholder :id
    $qryStatement->bindParam(':id', $id, PDO::PARAM_STR);

    // Execute the query and check for success
    if ($qryStatement->execute()) {
        echo "Update successful.";
    } else {
        $errorInfo = $qryStatement->errorInfo();
        echo "Update failed. Error: " . $errorInfo[2];
    }
}

// Call the SemiFinish function









function GetZircons()
{
    include 'layouts/session.php';
    error_reporting(E_ALL);
    ini_set('display_errors', 1);
    require_once "layouts/config.php";

    $id = $_POST['id'];
    $vendor_id = $_POST['vendor_id'];
    $qry = "SELECT * FROM zircon WHERE product_id=:id AND vendor_id = :vendor_id";
    $qryStatement = $pdo->prepare($qry);

    $qryStatement->bindParam(':id', $id);
    $qryStatement->bindParam(':vendor_id', $vendor_id);
    $qryStatement->execute();

    $result = $qryStatement->fetchAll(PDO::FETCH_ASSOC);
    echo json_encode($result, true);
}

function GetStones()
{
    include 'layouts/session.php';
    error_reporting(E_ALL);
    ini_set('display_errors', 1);
    require_once "layouts/config.php";

    $id = $_POST['id'];
    $vendor_id = $_POST['vendor_id'];
    $qry = "SELECT * FROM stone WHERE product_id=:id AND vendor_id = :vendor_id";
    $qryStatement = $pdo->prepare($qry);

    $qryStatement->bindParam(':id', $id);
    $qryStatement->bindParam(':vendor_id', $vendor_id);
    $qryStatement->execute();

    $result = $qryStatement->fetchAll(PDO::FETCH_ASSOC);
    echo json_encode($result, true);
}

function GetReturnedData()
{
    include 'layouts/session.php';
    error_reporting(E_ALL);
    ini_set('display_errors', 1);
    require_once "layouts/config.php";

    $id = $_POST['id'];
    $vendor_id = $_POST['vendor_id'];
    $qry = "SELECT * FROM `returned_stone_step` WHERE product_id = :id AND vendor_id = :vendor_id";
    $qryStatement = $pdo->prepare($qry);
    $qryStatement->bindParam(':id', $id);
    $qryStatement->bindParam(':vendor_id', $vendor_id);
    $array = array();
    if ($qryStatement->execute()) {
        $result = $qryStatement->fetchAll(PDO::FETCH_ASSOC);
        echo json_encode($result, true);
    } else {
        echo json_encode($qryStatement->errorInfo(), true);
    }
}

function GetReturnedStoneData()
{
    include 'layouts/session.php';
    error_reporting(E_ALL);
    ini_set('display_errors', 1);
    require_once "layouts/config.php";

    $id = $_POST['id'];
    $vendor_id = $_POST['vendor_id'];
    $qry = "SELECT * FROM returned_item WHERE product_id = :id AND vendor_id = :vendor_id";
    $qryStatement = $pdo->prepare($qry);
    $qryStatement->bindParam(':id', $id);
    $qryStatement->bindParam(':vendor_id', $vendor_id);
    $array = array();
    if ($qryStatement->execute()) {
        $result = $qryStatement->fetchAll(PDO::FETCH_ASSOC);
        echo json_encode($result, true);
    } else {
        echo json_encode($qryStatement->errorInfo(), true);
    }
}

function GetAdditionalAccountData()
{
    include 'layouts/session.php';
    error_reporting(E_ALL);
    ini_set('display_errors', 1);
    require_once "layouts/config.php";
    $array = array();
    $getRecordQuery = "SELECT 
    v.`id`,
    v.`name`,
    a.`vendor_id`,
    a.`date`,
    a.`type`,
    a.`amount`,
    a.`product_id`,
    m.`product_id`,
    m.`barcode`
    FROM `vendor` v
    JOIN `additional_step` a ON v.`id` = a.`vendor_id`
    JOIN `manufacturing_step` m ON a.`product_id` =  m.`product_id`
    WHERE v.`id` = a.`vendor_id`";

    $getRecordStatement = $pdo->prepare($getRecordQuery);
    if ($getRecordStatement->execute()) {
        $array = $getRecordStatement->fetchAll(PDO::FETCH_ASSOC);
        echo json_encode($array, true);
    } else {
        echo json_encode($getRecordStatement->errorInfo(), true);
    }
}

function GetStoneSetterIssued()
{
    include 'layouts/session.php';
    error_reporting(E_ALL);
    ini_set('display_errors', 1);
    require_once "layouts/config.php";
    $array = array();
    $getRecordQuery = "SELECT 
    v.`id`,
    v.`name`,
    ss.`vendor_id`,
    ss.`date`,
    ss.`image`,
    ss.`Issued_weight`,
    ss.`s_total_weight`,
    ss.`grand_weight`,
    ss.`product_id`,
    sr.`vendor_id`,
    sr.`received_weight`,
    sr.`rate`,
    sr.`stone_quantity`,
    sr.`wastage`,
    sr.`grand_weight`,
    sr.`payable`,
    m.`product_id`,
    m.`barcode`
    FROM `vendor` v
    JOIN `stone_setter_step` ss ON v.`id` = ss.`vendor_id`
    JOIN `returned_stone_step` sr ON ss.`vendor_id` = sr.`vendor_id`
    JOIN `manufacturing_step` m ON ss.`product_id` =  m.`product_id`

    WHERE v.`id` = ss.`vendor_id`";

    $getRecordStatement = $pdo->prepare($getRecordQuery);
    if ($getRecordStatement->execute()) {
        $array = $getRecordStatement->fetchAll(PDO::FETCH_ASSOC);
        echo json_encode($array, true);
    } else {
        echo json_encode($getRecordStatement->errorInfo(), true);
    }
}

function GetVendorData()
{
    include 'layouts/session.php';
    error_reporting(E_ALL);
    ini_set('display_errors', 1);
    require_once "layouts/config.php";
    $array = array();
    $getRecordQuery = " SELECT * FROM `vendor` where type!='existing'";


    $getRecordStatement = $pdo->prepare($getRecordQuery);
    if ($getRecordStatement->execute()) {
        $array = $getRecordStatement->fetchAll(PDO::FETCH_ASSOC);
        echo json_encode($array, true);
    } else {
        echo json_encode($getRecordStatement->errorInfo(), true);
    }
}

function DeleteProduct()
{
    include 'layouts/session.php';
    error_reporting(E_ALL);
    ini_set('display_errors', 1);
    require_once "layouts/config.php";

    $id = $_POST['id'];
    $qry = "Update product SET status='Inactive' WHERE id=:id";
    $qryStatement = $pdo->prepare($qry);

    $qryStatement->bindParam(':id', $id);

    if ($qryStatement->execute()) {
        $result = array('status' => 'success');
    } else {
        $result = array('status' => 'error');
    }
    $qry1 = "UPDATE manufacturing_step SET status='Inactive' WHERE product_id=:id";
    $qryStatement1 = $pdo->prepare($qry1);
    $qryStatement1->bindParam(':id', $id);
    $qryStatement1->execute();

    echo json_encode($result, true);
}

function GetPolisherRate()
{
    include 'layouts/session.php';
    error_reporting(E_ALL);
    ini_set('display_errors', 1);
    require_once "layouts/config.php";

    $id = $_POST['id'];
    $column = $_POST['column'];
    $qry = "SELECT $column FROM  vendor WHERE id=:id";
    $qryStatement = $pdo->prepare($qry);

    $qryStatement->bindParam(':id', $id);
    $qryStatement->execute();

    $result = $qryStatement->fetchAll(PDO::FETCH_ASSOC);
    echo json_encode($result, true);
}

function GetStoneSetterRate()
{
    include 'layouts/session.php';
    error_reporting(E_ALL);
    ini_set('display_errors', 1);
    require_once "layouts/config.php";

    $id = $_POST['id'];
    $column = $_POST['column'];
    $qry = "SELECT $column FROM  vendor WHERE id=:id";
    $qryStatement = $pdo->prepare($qry);
    $array = array();

    $qryStatement->bindParam(':id', $id);
    if ($qryStatement->execute()) {
        $result = $qryStatement->fetchAll(PDO::FETCH_ASSOC);
        array_push($array, $result);
    } else {
        array_push($array, "error");
    }
    echo json_encode($result, true);
}

// -------------------Issue/Recieve Metal Page---------------------- //

function DeleteMetal()
{
    include 'layouts/session.php';
    error_reporting(E_ALL);
    ini_set('display_errors', 1);
    require_once "layouts/config.php";

    $id = $_POST['id'];
    $qry = "Update metal SET status='Inactive' WHERE id=:id";
    $qryStatement = $pdo->prepare($qry);

    $qryStatement->bindParam(':id', $id);

    if ($qryStatement->execute()) {
        $result = array('status' => 'success');
    } else {
        $result = array('status' => 'error');
    }
    echo json_encode($result, true);
}

function SelectMetal()
{
    include 'layouts/session.php';
    error_reporting(E_ALL);
    ini_set('display_errors', 1);
    require_once "layouts/config.php";
    $array = array();
    $getRecordQuery = "SELECT metal.id, metal.date, metal.vendor_id, vendor.name, metal.type, metal.details, metal.issued_weight, metal.purity, metal.pure_weight
        FROM metal
        JOIN vendor ON metal.vendor_id = vendor.id
        WHERE metal.type = 'recieved' AND metal.status='Active'";
    $getRecordStatement = $pdo->prepare($getRecordQuery);
    if ($getRecordStatement->execute()) {
        $array = $getRecordStatement->fetchAll(PDO::FETCH_ASSOC);
        $totalPureWeight = 0;
        foreach ($array as $row) {
            $totalPureWeight += $row['pure_weight'];
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

function SelectMetalVendor()
{
    include 'layouts/session.php';
    error_reporting(E_ALL);
    ini_set('display_errors', 1);
    require_once "layouts/config.php";
    $array = array();
    $getRecordQuery = "SELECT metal.id, metal.date, metal.vendor_id, vendor.name, metal.type, metal.details, metal.issued_weight, metal.purity, metal.pure_weight
        FROM metal
        JOIN vendor ON metal.vendor_id = vendor.id
        WHERE metal.type = 'recieved' AND metal.status='Active' AND metal.vendor_id=:vendor_id";
    $getRecordStatement = $pdo->prepare($getRecordQuery);
    $getRecordStatement->bindParam(':vendor_id', $_POST['id']);
    if ($getRecordStatement->execute()) {
        $array = $getRecordStatement->fetchAll(PDO::FETCH_ASSOC);
        $totalPureWeight = 0;
        foreach ($array as $row) {
            $totalPureWeight += $row['pure_weight'];
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

function SelectMetal2()
{
    include 'layouts/session.php';
    error_reporting(E_ALL);
    ini_set('display_errors', 1);
    require_once "layouts/config.php";
    $array = array();
    $getRecordQuery = "SELECT metal.id, metal.date, metal.vendor_id, vendor.name, metal.type, metal.details, metal.issued_weight, metal.purity, metal.pure_weight
        FROM metal
        JOIN vendor ON metal.vendor_id = vendor.id
        WHERE metal.type = 'issued' AND metal.status='Active'";
    $getRecordStatement = $pdo->prepare($getRecordQuery);
    if ($getRecordStatement->execute()) {
        $array = $getRecordStatement->fetchAll(PDO::FETCH_ASSOC);
        $totalPureWeight = 0;
        foreach ($array as $row) {
            $totalPureWeight += $row['pure_weight'];
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

function SelectMetalVendor2()
{
    include 'layouts/session.php';
    error_reporting(E_ALL);
    ini_set('display_errors', 1);
    require_once "layouts/config.php";
    $array = array();
    $getRecordQuery = "SELECT metal.id, metal.date, metal.vendor_id, vendor.name, metal.type, metal.details, metal.issued_weight, metal.purity, metal.pure_weight
        FROM metal
        JOIN vendor ON metal.vendor_id = vendor.id
        WHERE metal.type = 'issued' AND metal.status='Active' AND metal.vendor_id=:vendor_id";
    $getRecordStatement = $pdo->prepare($getRecordQuery);
    $getRecordStatement->bindParam(':vendor_id', $_POST['id']);
    if ($getRecordStatement->execute()) {
        $array = $getRecordStatement->fetchAll(PDO::FETCH_ASSOC);
        $totalPureWeight = 0;
        foreach ($array as $row) {
            $totalPureWeight += $row['pure_weight'];
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

function GetMetalVendors()
{
    include 'layouts/session.php';
    error_reporting(E_ALL);
    ini_set('display_errors', 1);
    require_once "layouts/config.php";
    $array = array();
    $getRecordQuery = "SELECT * FROM `vendor` WHERE `status` = 'Active' AND (`type` = 'manufacturer' OR `type` = 'stone setter' OR `type` = 'polisher')";
    $getRecordStatement = $pdo->prepare($getRecordQuery);
    if ($getRecordStatement->execute()) {
        $array = $getRecordStatement->fetchAll(PDO::FETCH_ASSOC);
        echo json_encode($array, true);
    } else {
        echo json_encode($getRecordStatement->errorInfo(), true);
    }
}

function MetalRecord()
{
    include 'layouts/session.php';
    error_reporting(E_ALL);
    ini_set('display_errors', 1);
    require_once "layouts/config.php";
    $array = array();
    if ($_POST['product_id'] == null) {
        $getRecordQuery = "INSERT INTO `metal`(`date`, `vendor_id`, `type`, `details`, `issued_weight`, `purity`, `pure_weight`,`status`) VALUES (:date, :vendor_id, :type, :details, :issued_weight, :purity, :pure_weight,'Active')";
    } else {
        $getRecordQuery = "UPDATE `metal` SET `date`=:date,`vendor_id`=:vendor_id,`type`=:type,`details`=:details,`issued_weight`=:issued_weight,`purity`=:purity,`pure_weight`=:pure_weight WHERE `id` = :id";
    }

    $getRecordStatement = $pdo->prepare($getRecordQuery);
    $getRecordStatement->bindParam(':date', $_POST['date']);
    $getRecordStatement->bindParam(':vendor_id', $_POST['vendor']);
    $getRecordStatement->bindParam(':type', $_POST['type']);
    $getRecordStatement->bindParam(':details', $_POST['detail']);
    $getRecordStatement->bindParam(':issued_weight', $_POST['issued_weight']);
    $getRecordStatement->bindParam(':purity', $_POST['purity']);
    $getRecordStatement->bindParam(':pure_weight', $_POST['pure_weight']);
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

// -------------------Purchasing Page---------------------- //

function  DeletePurchasing()
{
    include 'layouts/session.php';
    error_reporting(E_ALL);
    ini_set('display_errors', 1);
    require_once "layouts/config.php";

    $id = $_POST['id'];
    $qry = "Update purchasing SET status='Inactive' WHERE id=:id";
    $qryStatement = $pdo->prepare($qry);

    $qryStatement->bindParam(':id', $id);

    if ($qryStatement->execute()) {
        $result = array('status' => 'success');
    } else {
        $result = array('status' => 'error');
    }

    echo json_encode($result, true);
}

function GetPurchasingDetails()
{
    include 'layouts/session.php';
    error_reporting(E_ALL);
    ini_set('display_errors', 1);
    require_once "layouts/config.php";
    $array = array();
    $getRecordQuery = "SELECT `id`, `p_id`, `type`, `detail`, `price_per`, `quantity`, `remaining_quantity`, `weight`, `remaining_weight`, `rate`, `total_amount`, `remaining_total_amount`, `barcode` FROM `purchasing_details` WHERE `p_id` = :id";
    $getRecordStatement = $pdo->prepare($getRecordQuery);
    $getRecordStatement->bindParam(':id', $_POST['id']);
    if ($getRecordStatement->execute()) {
        $array = $getRecordStatement->fetchAll(PDO::FETCH_ASSOC);
        echo json_encode($array, true);
    } else {
        echo json_encode($getRecordStatement->errorInfo(), true);
    }
}

function GetModalInvoices()
{
    include 'layouts/session.php';
    error_reporting(E_ALL);
    ini_set('display_errors', 1);
    require_once "layouts/config.php";
    $array = array();
    $getRecordQuery = "SELECT p.id, p.vendor_id, p.total, p.date, p.status, v.type, v.name, v.`18k`, v.`21k`, v.`22k`, v.status AS vendor_status
    FROM purchasing p
    JOIN vendor v ON p.vendor_id = v.id where p.status = 'Active'
    ";
    $getRecordStatement = $pdo->prepare($getRecordQuery);
    if ($getRecordStatement->execute()) {
        $array = $getRecordStatement->fetchAll(PDO::FETCH_ASSOC);
        echo json_encode($array, true);
    } else {
        echo json_encode($getRecordStatement->errorInfo(), true);
    }
}

function GetPurchasingCount()
{
    include 'layouts/session.php';
    error_reporting(E_ALL);
    ini_set('display_errors', 1);
    require_once "layouts/config.php";
    $array = array();
    $getRecordQuery = "SELECT lpad(count(*)+1, 4, '0') FROM `purchasing`";
    $getRecordStatement = $pdo->prepare($getRecordQuery);
    if ($getRecordStatement->execute()) {
        $array = $getRecordStatement->fetchColumn();
        $array = "PI-" . $array;
        echo json_encode($array, true);
    } else {
        echo json_encode($getRecordStatement->errorInfo(), true);
    }
}

function AddPurchasing()
{
    include 'layouts/session.php';
    error_reporting(E_ALL);
    ini_set('display_errors', 1);
    require_once "layouts/config.php";
    $array = array();
    $getRecordQuery = "Select * from purchasing where id = :id";
    $getRecordStatement = $pdo->prepare($getRecordQuery);
    $getRecordStatement->bindParam(':id', $_POST['invoice']);
    if ($getRecordStatement->execute()) {
        $array1 = $getRecordStatement->fetchAll(PDO::FETCH_ASSOC);
        if (count($array1) == 0) {
            $getRecordQuery = "INSERT INTO `purchasing`(`id`, `vendor_id`, `total`, `status`) VALUES (:id, :vendor_id, :total, 'Active')";
            $getRecordStatement = $pdo->prepare($getRecordQuery);
            $getRecordStatement->bindParam(':id', $_POST['invoice']);
            $getRecordStatement->bindParam(':vendor_id', $_POST['vendor_id']);
            $getRecordStatement->bindParam(':total', $_POST['grand_total']);
            if ($getRecordStatement->execute()) {
                array_push($array, "success");
            } else {
                array_push($array, "error");
            }

            for ($i = 0; $i < count($_POST['total']); $i++) {
                if ($_POST['quantity'][$i] == null) {
                    $_POST['quantity'][$i] = 0;
                }
                if ($_POST['weight'][$i] == null) {

                    $_POST['weight'][$i] = 0;
                }
                $getRecordQuery2 = "INSERT INTO `purchasing_details`(`p_id`, `type`, `detail`, `price_per`, `remaining_quantity`, `remaining_weight`, `quantity`, `weight`, `rate`, `remaining_total_amount`, `total_amount`, `barcode`) VALUES (:p_id, :type, :detail, :price_per, :quantity, :weight, :quantity, :weight, :rate, :total, :total, :barcode)";
                $getRecordStatement2 = $pdo->prepare($getRecordQuery2);
                $getRecordStatement2->bindParam(':p_id', $_POST['invoice']);
                $getRecordStatement2->bindParam(':type', $_POST['type'][$i]);
                $getRecordStatement2->bindParam(':detail', $_POST['detail'][$i]);
                $getRecordStatement2->bindParam(':price_per', $_POST['price_per'][$i]);
                $getRecordStatement2->bindParam(':quantity', $_POST['quantity'][$i]);
                $getRecordStatement2->bindParam(':weight', $_POST['weight'][$i]);
                $getRecordStatement2->bindParam(':rate', $_POST['rate'][$i]);
                $getRecordStatement2->bindParam(':total', $_POST['total'][$i]);
                $getRecordStatement2->bindParam(':barcode', $_POST['barcode'][$i]);
                if ($getRecordStatement2->execute()) {
                    array_push($array, "success");
                } else {
                    array_push($array, "error");
                }
            }
        } else {
            for ($i = 0; $i < count($_POST['total']); $i++) {
                if ($_POST['total'][$i] != null) {
                    $getRecordQuery = "UPDATE `purchasing` SET `total`=:total,`vendor_id`=:vendor_id WHERE id = :id";
                    $getRecordStatement = $pdo->prepare($getRecordQuery);
                    $getRecordStatement->bindParam(':id', $_POST['invoice']);
                    $getRecordStatement->bindParam(':total', $_POST['grand_total']);
                    $getRecordStatement->bindParam(':vendor_id', $_POST['vendor_id']);
                    if ($getRecordStatement->execute()) {
                        array_push($array, "success");
                    } else {
                        array_push($array, "error");
                    }
                    if ($_POST['quantity'][$i] == null) {
                        $_POST['quantity'][$i] = 0;
                    }
                    if ($_POST['weight'][$i] == null) {
                        $_POST['weight'][$i] = 0;
                    }
                    $qry01 = "SELECT * FROM `purchasing_details` WHERE `p_id` = :id AND `type` = :type AND `detail` = :detail AND `price_per` = :price_per AND `barcode` = :barcode";
                    $qryStatement01 = $pdo->prepare($qry01);
                    $qryStatement01->bindParam(':id', $_POST['invoice']);
                    $qryStatement01->bindParam(':type', $_POST['type'][$i]);
                    $qryStatement01->bindParam(':detail', $_POST['detail'][$i]);
                    $qryStatement01->bindParam(':price_per', $_POST['price_per'][$i]);
                    $qryStatement01->bindParam(':barcode', $_POST['barcode'][$i]);
                    $qryStatement01->execute();
                    $result01 = $qryStatement01->fetchAll(PDO::FETCH_ASSOC);
                    $quantity_diff = $_POST['quantity'][$i] - $result01[0]['quantity'];
                    $weight_diff = $_POST['weight'][$i] - $result01[0]['weight'];
                    $total_diff = $_POST['total'][$i] - $result01[0]['total_amount'];

                    $getRecordQuery2 = "UPDATE `purchasing_details` SET `quantity`=`quantity`+:quantity,`weight`=`weight`+:weight,`total_amount`=`total_amount`+:total_amount,`remaining_quantity`=`remaining_quantity`+:remaining_quantity,`remaining_weight`=`remaining_weight`+:remaining_weight,`remaining_total_amount`=`remaining_total_amount`+:remaining_total_amount WHERE `p_id` = :p_id AND `type` = :type AND `detail` = :detail AND `price_per` = :price_per AND `barcode` = :barcode";
                    $getRecordStatement2 = $pdo->prepare($getRecordQuery2);
                    $getRecordStatement2->bindParam(':p_id', $_POST['invoice']);
                    $getRecordStatement2->bindParam(':type', $_POST['type'][$i]);
                    $getRecordStatement2->bindParam(':detail', $_POST['detail'][$i]);
                    $getRecordStatement2->bindParam(':price_per', $_POST['price_per'][$i]);
                    $getRecordStatement2->bindParam(':quantity', $quantity_diff);
                    $getRecordStatement2->bindParam(':weight', $weight_diff);
                    $getRecordStatement2->bindParam(':total_amount', $total_diff);
                    $getRecordStatement2->bindParam(':remaining_quantity', $quantity_diff);
                    $getRecordStatement2->bindParam(':remaining_weight', $weight_diff);
                    $getRecordStatement2->bindParam(':remaining_total_amount', $total_diff);
                    $getRecordStatement2->bindParam(':barcode', $_POST['barcode'][$i]);
                    if ($getRecordStatement2->execute()) {
                        array_push($array, "success");
                    } else {
                        array_push($array, "error");
                    }
                } else {
                    if ($_POST['quantity'][$i] == null) {
                        $_POST['quantity'][$i] = 0;
                    }
                    if ($_POST['weight'][$i] == null) {
                        $_POST['weight'][$i] = 0;
                    }
                    $getRecordQuery2 = "INSERT INTO `purchasing_details`(`p_id`, `type`, `detail`, `price_per`, `remaining_quantity`, `remaining_weight`, `quantity`, `weight`, `rate`, `remaining_total_amount`, `total_amount`, `barcode`) VALUES (:p_id, :type, :detail, :price_per, :quantity, :weight, :quantity, :weight, :rate, :total, :total, :barcode)";
                    $getRecordStatement2 = $pdo->prepare($getRecordQuery2);
                    $getRecordStatement2->bindParam(':p_id', $_POST['invoice']);
                    $getRecordStatement2->bindParam(':type', $_POST['type'][$i]);
                    $getRecordStatement2->bindParam(':detail', $_POST['detail'][$i]);
                    $getRecordStatement2->bindParam(':price_per', $_POST['price_per'][$i]);
                    $getRecordStatement2->bindParam(':quantity', $_POST['quantity'][$i]);
                    $getRecordStatement2->bindParam(':weight', $_POST['weight'][$i]);
                    $getRecordStatement2->bindParam(':rate', $_POST['rate'][$i]);
                    $getRecordStatement2->bindParam(':total', $_POST['total'][$i]);
                    $getRecordStatement2->bindParam(':barcode', $_POST['barcode'][$i]);
                    if ($getRecordStatement2->execute()) {
                        array_push($array, "success");
                    } else {
                        array_push($array, "error");
                    }
                }
            }
        }
    } else {
        echo json_encode($getRecordStatement->errorInfo(), true);
    }

    echo json_encode($array, true);
}

// -------------------Add Stock Page---------------------- //

function  GetInvoices()
{
    include 'layouts/session.php';
    error_reporting(E_ALL);
    ini_set('display_errors', 1);
    require_once "layouts/config.php";
    $array = array();
    $getRecordQuery = "
SELECT DISTINCT purchasing.id, purchasing.vendor_id, vendor.name, purchasing.total, purchasing.date, purchasing.status
FROM purchasing
JOIN vendor ON purchasing.vendor_id = vendor.id 
JOIN purchasing_details ON purchasing.id = purchasing_details.p_id
WHERE purchasing.status = 'Active' 
OR purchasing_details.remaining_quantity <> 0 
OR purchasing_details.remaining_weight <> 0 
AND purchasing_details.remaining_total_amount <> 0;
";
    $getRecordStatement = $pdo->prepare($getRecordQuery);
    if ($getRecordStatement->execute()) {
        $array = $getRecordStatement->fetchAll(PDO::FETCH_ASSOC);
        echo json_encode($array, true);
    } else {
        echo json_encode($getRecordStatement->errorInfo(), true);
    }
}

function GetProductDetails()
{
    include 'layouts/session.php';
    error_reporting(E_ALL);
    ini_set('display_errors', 1);
    require_once "layouts/config.php";
    $array = array();
    $getRecordQuery = "SELECT pd.id, pd.p_id, pd.type, pd.detail, pd.price_per, pd.quantity, pd.weight, pd.remaining_quantity, pd.remaining_weight, pd.remaining_total_amount, pd.rate, pd.total_amount, pd.barcode, p.vendor_id, p.date, p.total, p.status
    FROM purchasing_details pd
    JOIN purchasing p
    ON pd.p_id = p.id
    WHERE pd.p_id = :id AND p.status = 'Active'";
    $getRecordStatement = $pdo->prepare($getRecordQuery);
    $getRecordStatement->bindParam(':id', $_POST['id']);
    if ($getRecordStatement->execute()) {
        $array = $getRecordStatement->fetchAll(PDO::FETCH_ASSOC);
        echo json_encode($array, true);
    } else {
        echo json_encode($getRecordStatement->errorInfo(), true);
    }
}

function GetStockCount()
{
    include 'layouts/session.php';
    error_reporting(E_ALL);
    ini_set('display_errors', 1);
    require_once "layouts/config.php";
    $array = array();
    $getRecordQuery = "SELECT lpad(count(*)+1, 4, '0') FROM `stock`";
    $getRecordStatement = $pdo->prepare($getRecordQuery);
    if ($getRecordStatement->execute()) {
        $array = $getRecordStatement->fetchColumn();
        $array = "SI-" . $array;
        echo json_encode($array, true);
    } else {
        echo json_encode($getRecordStatement->errorInfo(), true);
    }
}

function AddStock()
{
    include 'layouts/session.php';
    error_reporting(E_ALL);
    ini_set('display_errors', 1);
    require_once "layouts/config.php";
    $array = array();
    $getRecordQuery = "INSERT INTO `stock`(`id`, `p_id`, `total`, `status`) VALUES (:id, :p_id, :total, 'Active')";
    $getRecordStatement = $pdo->prepare($getRecordQuery);
    $getRecordStatement->bindParam(':id', $_POST['s_invoice']);
    $getRecordStatement->bindParam(':p_id', $_POST['p_id']);
    $getRecordStatement->bindParam(':total', $_POST['total'][0]);
    if ($getRecordStatement->execute()) {
        array_push($array, "success");
    } else {
        array_push($array, "error");
    }
    $count = max(json_decode($_POST['checkbox_values'], true));
    $values = json_decode($_POST['checkbox_values'], true);
    for ($i = 0; $i <= $count; $i++) {
        if (in_array($i, $values)) {
            $getRecordQuery1 = "UPDATE purchasing_details
            SET
                `remaining_quantity` = `remaining_quantity` - :new_quantity,
                `remaining_weight` = `remaining_weight` - :new_weight,
                `remaining_total_amount` = `remaining_total_amount` - :new_total WHERE `id` = :id";
            $getRecordStatement1 = $pdo->prepare($getRecordQuery1);
            $getRecordStatement1->bindParam(':new_quantity', $_POST['quantity'][$i]);
            $getRecordStatement1->bindParam(':new_weight', $_POST['weight'][$i]);
            $getRecordStatement1->bindParam(':new_total', $_POST['total'][$i]);
            $getRecordStatement1->bindParam(':id', $_POST['pd_id'][$i]);
            if ($getRecordStatement1->execute()) {
                array_push($array, "success");
            } else {
                array_push($array, "error");
            }
            if ($_POST['quantity'][$i] == null) {
                $_POST['quantity'][$i] = 0;
            }
            if ($_POST['weight'][$i] == null) {

                $_POST['weight'][$i] = 0;
            }
            $getRecordQuery2 = "INSERT INTO `stock_details`(`s_id`, `type`, `detail`, `price_per`, `quantity`, `weight`, `rate`, `total_amount`, `barcode`) VALUES (:s_id, :type, :detail, :price_per, :quantity, :weight, :rate, :total, :barcode)";
            $getRecordStatement2 = $pdo->prepare($getRecordQuery2);
            $getRecordStatement2->bindParam(':s_id', $_POST['s_invoice']);
            $getRecordStatement2->bindParam(':type', $_POST['type'][$i]);
            $getRecordStatement2->bindParam(':detail', $_POST['detail'][$i]);
            $getRecordStatement2->bindParam(':price_per', $_POST['price_per'][$i]);
            $getRecordStatement2->bindParam(':quantity', $_POST['quantity'][$i]);
            $getRecordStatement2->bindParam(':weight', $_POST['weight'][$i]);
            $getRecordStatement2->bindParam(':rate', $_POST['rate'][$i]);
            $getRecordStatement2->bindParam(':total', $_POST['total'][$i]);
            $getRecordStatement2->bindParam(':barcode', $_POST['stock_barcode'][$i]);
            if ($getRecordStatement2->execute()) {
                array_push($array, "success");
            } else {
                array_push($array, "error");
            }
        }
    }

    echo json_encode($array, true);
}

function AddExistingStock()
{
    include 'layouts/session.php';
    error_reporting(E_ALL);
    ini_set('display_errors', 1);
    require_once "layouts/config.php";
    $array = array();
    $s_invoice = '';
    $getRecordQuery0 = "SELECT `id` FROM `stock` ORDER BY `id` DESC LIMIT 1";
    $getRecordStatement0 = $pdo->prepare($getRecordQuery0);

    if ($getRecordStatement0->execute()) {
        $lastRecord = $getRecordStatement0->fetchColumn();
        if ($lastRecord) {
            // Extract the numeric part of the ID. Assuming the ID format is "SI-0005".
            $lastIdNumber = intval(substr($lastRecord, 3));
            // Increment the ID.
            $newIdNumber = $lastIdNumber + 1;
            // Create the new ID with leading zeros.
            $s_invoice = "SI-" . str_pad($newIdNumber, 4, '0', STR_PAD_LEFT);
        } else {
            // This is the case when there are no records in the table.
            $s_invoice = "SI-0001";
        }
    }

    $getRecordQuery = "INSERT INTO `stock`(`id`, `p_id`, `total`, `status`) VALUES (:id, 'existing', :total, 'Active')";
    $getRecordStatement = $pdo->prepare($getRecordQuery);
    $getRecordStatement->bindParam(':id', $s_invoice);
    $getRecordStatement->bindParam(':total', $_POST['total'][0]);
    if ($getRecordStatement->execute()) {
        array_push($array, "success");
    } else {
        array_push($array, "error");
    }
    for ($i = 0; $i < count($_POST['rate']); $i++) {
        if ($_POST['quantity'][$i] == null) {
            $_POST['quantity'][$i] = 0;
        }
        if ($_POST['weight'][$i] == null) {
            $_POST['weight'][$i] = 0;
        }
        $getRecordQuery2 = "INSERT INTO `stock_details`(`s_id`, `type`, `detail`, `price_per`, `quantity`, `weight`, `rate`, `total_amount`, `barcode`) VALUES (:s_id, :type, :detail, :price_per, :quantity, :weight, :rate, :total, :barcode)";
        $getRecordStatement2 = $pdo->prepare($getRecordQuery2);
        $getRecordStatement2->bindParam(':s_id', $s_invoice);
        $getRecordStatement2->bindParam(':type', $_POST['type'][$i]);
        $getRecordStatement2->bindParam(':detail', $_POST['detail'][$i]);
        $getRecordStatement2->bindParam(':price_per', $_POST['price_per'][$i]);
        $getRecordStatement2->bindParam(':quantity', $_POST['quantity'][$i]);
        $getRecordStatement2->bindParam(':weight', $_POST['weight'][$i]);
        $getRecordStatement2->bindParam(':rate', $_POST['rate'][$i]);
        $getRecordStatement2->bindParam(':total', $_POST['total'][$i]);
        $getRecordStatement2->bindParam(':barcode', $_POST['barcode'][$i]);
        if ($getRecordStatement2->execute()) {
            array_push($array, "success");
        } else {
            array_push($array, "error");
        }
    }
    echo json_encode($array, true);
}

// -------------------Stock Page---------------------- //

function GetStockData()
{
    include 'layouts/session.php';
    error_reporting(E_ALL);
    ini_set('display_errors', 1);
    require_once "layouts/config.php";
    $array = array();
    $getRecordQuery = "SELECT 
    MAX(sd.id) AS id,
    MAX(s.date) AS stock_date,
    sd.barcode,
    MAX(s.p_id) AS p_id,
    MAX(v.name) AS name,
    MAX(sd.detail) AS detail,
    MAX(sd.type) AS type,
    MAX(sd.price_per) AS price_per,
    SUM(sd.quantity) AS total_quantity,
    SUM(sd.weight) AS total_weight,
    MAX(sd.rate) AS rate,
    SUM(sd.total_amount) AS total_amount
FROM
    stock s
    JOIN stock_details sd ON s.id = sd.s_id
    JOIN purchasing p ON s.p_id = p.id
    JOIN vendor v ON p.vendor_id = v.id
GROUP BY
    sd.barcode, sd.type
ORDER BY
    stock_date DESC;";
    $getRecordStatement = $pdo->prepare($getRecordQuery);
    if ($getRecordStatement->execute()) {
        $array = $getRecordStatement->fetchAll(PDO::FETCH_ASSOC);
        echo json_encode($array, true);
    } else {
        echo json_encode($getRecordStatement->errorInfo(), true);
    }
}

function GetProductData()
{
    include 'layouts/session.php';
    error_reporting(E_ALL);
    ini_set('display_errors', 1);
    require_once "layouts/config.php";
    $array = array();
    $getRecordQuery = "SELECT 
  p.`id` AS product_ids,
    p.`id`, 
    p.`name`,
    p.`weight`,
    p.`status`, 
    p.`date_created`,
    m.`vendor_id`,
    m.`product_id`, 
    m.`image`,  
    m.`barcode`,
    v.`id`,
    v.`name`,
    s.`product_id`,
    s.`Issued_weight`
    FROM `product` p
    LEFT JOIN `manufacturing_step` m ON p.`id` = m.`product_id`
    LEFT JOIN `vendor` v ON m.`vendor_id` = v.`id`
    LEFT JOIN `stone_setter_step` s ON m.`product_id` = s.`product_id`
    WHERE p.`status` = 'SemiFinished' OR p.`status` = 'SemiProduct'";
    $getRecordStatement = $pdo->prepare($getRecordQuery);
    if ($getRecordStatement->execute()) {
        $array = $getRecordStatement->fetchAll(PDO::FETCH_ASSOC);
        echo json_encode($array, true);
    } else {
        echo json_encode($getRecordStatement->errorInfo(), true);
    }
}

function GetAdditionalData()
{
    include 'layouts/session.php';
    error_reporting(E_ALL);
    ini_set('display_errors', 1);
    require_once "layouts/config.php";

    $id = $_POST['id'];
    $qry = "SELECT * FROM additional_step WHERE product_id = :id";
    $qryStatement = $pdo->prepare($qry);
    $qryStatement->bindParam(':id', $id);
    $array = array();
    if ($qryStatement->execute()) {
        $result = $qryStatement->fetchAll(PDO::FETCH_ASSOC);
        echo json_encode($result, true);
    } else {
        echo json_encode($qryStatement->errorInfo(), true);
    }
}

// -------------------Manufacturer Report Page---------------------- //

function GetManufacturerReportData()
{
    include 'layouts/session.php';
    error_reporting(E_ALL);
    ini_set('display_errors', 1);
    require_once "layouts/config.php";
    $array = array();
    $getRecordQuery = "SELECT 
    v.`id`, 
    v.`type`, 
    v.`name`, 
    m.`vendor_id`, 
    m.`product_id`, 
    m.`date`, 
    m.`image`, 
    m.`details`, 
    m.`type`, 
    m.`quantity`, 
    m.`purity`, 
    m.`unpolish_weight`, 
    m.`polish_weight`, 
    m.`rate`,
    m.`wastage`, 
    m.`unpure_weight`, 
    m.`pure_weight`, 
    m.`status`, 
    m.`tValues`, 
    m.`barcode`,
    NULL as `issued_weight`, 
    NULL as `metal_date`, 
    NULL as `metal_vendor_id`, 
    NULL as `metal_type`, 
    NULL as `metal_details`, 
    NULL as `metal_purity`, 
    NULL as `metal_pure_weight`
    FROM `vendor` v 
    JOIN `manufacturing_step` m ON v.`id` = m.`vendor_id`
    WHERE v.id=:id
    UNION ALL
    SELECT 
    NULL as `id`, 
    NULL as `type`, 
    `v`.`name` `name`, 
    `v`.`id` as `vendor_id`, 
    NULL as `product_id`, 
    `metal`.`date`, 
    NULL as `image`, 
    `metal`.`details`, 
    `metal`.`type`, 
    NULL as `quantity`, 
    `metal`.`purity`, 
    NULL as `unpolish_weight`, 
    NULL as `polish_weight`, 
    NULL as `rate`,
    NULL as `wastage`, 
    NULL as `unpure_weight`, 
    NULL as `pure_weight`, 
    NULL as `status`, 
    NULL as `tValues`, 
    NULL as `barcode`,
    `metal`.`issued_weight`, 
    `metal`.`date` as `metal_date`, 
    `metal`.`vendor_id` as `metal_vendor_id`, 
    `metal`.`type` as `metal_type`, 
    NULL as `metal_details`, 
    `metal`.`purity` as `metal_purity`, 
    `metal`.`pure_weight` as `metal_pure_weight`
    FROM `metal`
    JOIN `vendor` v ON `metal`.`vendor_id` = `v`.`id`
    WHERE v.id=:id
    ORDER BY `date` DESC";
    $getRecordStatement = $pdo->prepare($getRecordQuery);
    $getRecordStatement->bindParam(':id', $_POST['id']);
    if ($getRecordStatement->execute()) {
        $array = $getRecordStatement->fetchAll(PDO::FETCH_ASSOC);
        echo json_encode($array, true);
    } else {
        echo json_encode($getRecordStatement->errorInfo(), true);
    }
}


function GetManufacturerReportDataAll()
{
    include 'layouts/session.php';
    error_reporting(E_ALL);
    ini_set('display_errors', 1);
    require_once "layouts/config.php";
    $array = array();
    $getRecordQuery = "SELECT 
    v.`id`, 
    v.`type`, 
    v.`name`, 
    m.`vendor_id`, 
    m.`product_id`, 
    m.`date`, 
    m.`image`, 
    m.`details`, 
    m.`type`, 
    m.`quantity`, 
    m.`purity`, 
    m.`unpolish_weight`, 
    m.`polish_weight`, 
    m.`rate`,
    m.`wastage`, 
    m.`unpure_weight`, 
    m.`pure_weight`, 
    m.`status`, 
    m.`tValues`, 
    m.`barcode`,
    NULL as `issued_weight`, 
    NULL as `metal_date`, 
    NULL as `metal_vendor_id`, 
    NULL as `metal_type`, 
    NULL as `metal_details`, 
    NULL as `metal_purity`, 
    NULL as `metal_pure_weight`
    FROM `vendor` v 
    JOIN `manufacturing_step` m ON v.`id` = m.`vendor_id`
    UNION ALL
    SELECT 
    NULL as `id`, 
    NULL as `type`, 
    `v`.`name` `name`, 
    `v`.`id` as `vendor_id`, 
    NULL as `product_id`, 
    `metal`.`date`, 
    NULL as `image`, 
    `metal`.`details`, 
    `metal`.`type`, 
    NULL as `quantity`, 
    `metal`.`purity`, 
    NULL as `unpolish_weight`, 
    NULL as `polish_weight`, 
    NULL as `rate`,
    NULL as `wastage`, 
    NULL as `unpure_weight`, 
    NULL as `pure_weight`, 
    NULL as `status`, 
    NULL as `tValues`, 
    NULL as `barcode`,
    `metal`.`issued_weight`, 
    `metal`.`date` as `metal_date`, 
    `metal`.`vendor_id` as `metal_vendor_id`, 
    `metal`.`type` as `metal_type`, 
    NULL as `metal_details`, 
    `metal`.`purity` as `metal_purity`, 
    `metal`.`pure_weight` as `metal_pure_weight`
    FROM `metal`
    JOIN `vendor` v ON `metal`.`vendor_id` = `v`.`id`
    ORDER BY `date` DESC";
    $getRecordStatement = $pdo->prepare($getRecordQuery);
    if ($getRecordStatement->execute()) {
        $array = $getRecordStatement->fetchAll(PDO::FETCH_ASSOC);
        echo json_encode($array, true);
    } else {
        echo json_encode($getRecordStatement->errorInfo(), true);
    }
}

function GetPolisherReportData()
{
    include 'layouts/session.php';
    error_reporting(E_ALL);
    ini_set('display_errors', 1);
    require_once "layouts/config.php";
    $array = array();
    $getRecordQuery = "SELECT 
    v.`id`, 
    v.`type`, 
    v.`name`, 
    p.`vendor_id`, 
    p.`product_id`, 
    p.`date`, 
    p.`image`,  
    p.`rate`,
    p.`Wastage`, 
    p.`difference`, 
    p.`Payable`, 
    p.`status`,  
    p.`polisherbarcode`,
    m.`details` as `m_details`, 
    m.`type` as `m_type`, 
    m.`purity` as `m_purity`, 
    m.`quantity` as `m_quantity`, 
    NULL as `issued_weight`, 
    NULL as `metal_date`, 
    NULL as `metal_type`, 
    NULL as `metal_vendor_id`, 
    NULL as `metal_pure_weight`
FROM `vendor` v 
JOIN `polisher_step` p ON v.`id` = p.`vendor_id`
JOIN `manufacturing_step` m ON p.`product_id` = m.`product_id`
WHERE v.id=:id
UNION ALL
SELECT 
    NULL as `id`, 
    NULL as `type`, 
    `v`.`name` `name`, 
    `v`.`id` as `vendor_id`, 
    NULL as `product_id`, 
    `metal`.`date`, 
    NULL as `image`, 
    NULL as `rate`,
    NULL as `Wastage`, 
    NULL as `difference`, 
    NULL as `Payable`, 
    NULL as `status`,  
    NULL as `polisherbarcode`,
    `metal`.`details` as `m_details`, 
    NULL as `m_type`, 
    `metal`.`purity` as `m_purity`, 
    NULL as `m_quantity`, 
    `metal`.`issued_weight`, 
    `metal`.`date` as `metal_date`, 
    `metal`.`type` as `metal_type`,
    `metal`.`vendor_id` as `metal_vendor_id`,  
    `metal`.`pure_weight` as `metal_pure_weight`
    FROM `metal`
    JOIN `vendor` v ON `metal`.`vendor_id` = `v`.`id`
    WHERE v.id=:id
    ORDER BY `date` DESC";

    $getRecordStatement = $pdo->prepare($getRecordQuery);
    $getRecordStatement->bindParam(':id', $_POST['id']);
    if ($getRecordStatement->execute()) {
        $array = $getRecordStatement->fetchAll(PDO::FETCH_ASSOC);
        echo json_encode($array, true);
    } else {
        echo json_encode($getRecordStatement->errorInfo(), true);
    }
}

function GetPolisherReportDataAll()
{
    include 'layouts/session.php';
    error_reporting(E_ALL);
    ini_set('display_errors', 1);
    require_once "layouts/config.php";
    $array = array();
    $getRecordQuery = "SELECT 
    v.`id`, 
    v.`type`, 
    v.`name`, 
    p.`vendor_id`, 
    p.`product_id`, 
    p.`date`, 
    p.`image`,  
    p.`rate`,
    p.`Wastage`, 
    p.`difference`, 
    p.`Payable`, 
    p.`status`,  
    p.`polisherbarcode`,
    m.`details` as `m_details`, 
    m.`type` as `m_type`, 
    m.`purity` as `m_purity`, 
    m.`quantity` as `m_quantity`, 
    NULL as `issued_weight`, 
    NULL as `metal_date`, 
    NULL as `metal_type`, 
    NULL as `metal_vendor_id`, 
    NULL as `metal_pure_weight`
FROM `vendor` v 
JOIN `polisher_step` p ON v.`id` = p.`vendor_id`
JOIN `manufacturing_step` m ON p.`product_id` = m.`product_id`
UNION ALL
SELECT 
    NULL as `id`, 
    NULL as `type`, 
    `v`.`name` `name`, 
    `v`.`id` as `vendor_id`, 
    NULL as `product_id`, 
    `metal`.`date`, 
    NULL as `image`, 
    NULL as `rate`,
    NULL as `Wastage`, 
    NULL as `difference`, 
    NULL as `Payable`, 
    NULL as `status`,  
    NULL as `polisherbarcode`,
    `metal`.`details` as `m_details`, 
    NULL as `m_type`, 
    `metal`.`purity` as `m_purity`, 
    NULL as `m_quantity`, 
    `metal`.`issued_weight`, 
    `metal`.`date` as `metal_date`, 
    `metal`.`type` as `metal_type`,
    `metal`.`vendor_id` as `metal_vendor_id`,  
    `metal`.`pure_weight` as `metal_pure_weight`
    FROM `metal`
    JOIN `vendor` v ON `metal`.`vendor_id` = `v`.`id`
    ORDER BY `date` DESC";

    $getRecordStatement = $pdo->prepare($getRecordQuery);
    if ($getRecordStatement->execute()) {
        $array = $getRecordStatement->fetchAll(PDO::FETCH_ASSOC);
        echo json_encode($array, true);
    } else {
        echo json_encode($getRecordStatement->errorInfo(), true);
    }
}

// -------------------Cash Page---------------------- //

function CashRecord()
{
    include 'layouts/session.php';
    error_reporting(E_ALL);
    ini_set('display_errors', 1);
    require_once "layouts/config.php";
    $array = array();
    if ($_POST['product_id'] == null) {
        $getRecordQuery = "INSERT INTO `cash`(`date`, `vendor_id`, `type`, `amount`,`details`, `status`) VALUES (:date,:vendor_id,:type,:amount,:details,'Active')";
    } else {
        $getRecordQuery = "UPDATE `cash` SET `date`=:date,`vendor_id`=:vendor_id,`type`=:type,`amount`=:amount,`details`=:details WHERE `id`=:id";
    }

    $getRecordStatement = $pdo->prepare($getRecordQuery);
    $getRecordStatement->bindParam(':date', $_POST['date']);
    $getRecordStatement->bindParam(':vendor_id', $_POST['vendor']);
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

function GetCashVendors()
{
    include 'layouts/session.php';
    error_reporting(E_ALL);
    ini_set('display_errors', 1);
    require_once "layouts/config.php";
    $array = array();
    $getRecordQuery = "SELECT * FROM `vendor` WHERE `status` = 'Active'";
    $getRecordStatement = $pdo->prepare($getRecordQuery);
    if ($getRecordStatement->execute()) {
        $array = $getRecordStatement->fetchAll(PDO::FETCH_ASSOC);
        echo json_encode($array, true);
    } else {
        echo json_encode($getRecordStatement->errorInfo(), true);
    }
}

function DeleteCash()
{
    include 'layouts/session.php';
    error_reporting(E_ALL);
    ini_set('display_errors', 1);
    require_once "layouts/config.php";

    $id = $_POST['id'];
    $qry = "Update cash SET status='Inactive' WHERE id=:id";
    $qryStatement = $pdo->prepare($qry);

    $qryStatement->bindParam(':id', $id);

    if ($qryStatement->execute()) {
        $result = array('status' => 'success');
    } else {
        $result = array('status' => 'error');
    }
    echo json_encode($result, true);
}

function DeleteStock()
{
    include 'layouts/session.php';
    error_reporting(E_ALL);
    ini_set('display_errors', 1);
    require_once "layouts/config.php";

    $array = array();

    $id = $_POST['id'];
    $qry = "SELECT * FROM `stock_details` WHERE `id` = :id";
    $qryStatement = $pdo->prepare($qry);
    $qryStatement->bindParam(':id', $id);
    if ($qryStatement->execute()) {
        $result = $qryStatement->fetchAll(PDO::FETCH_ASSOC);
        $s_id = $result[0]['s_id'];
        $type = $result[0]['type'];
        $detail = $result[0]['detail'];
        $price_per = $result[0]['price_per'];
        $quantity = $result[0]['quantity'];
        $weight = $result[0]['weight'];
        $total_amount = $result[0]['total_amount'];
        $qry2 = "UPDATE `stock` SET `total` = `total` - :total WHERE `id` = :id";
        $qryStatement2 = $pdo->prepare($qry2);
        $qryStatement2->bindParam(':id', $s_id);
        $qryStatement2->bindParam(':total', $total_amount);
        if ($qryStatement2->execute()) {
            $qry3 = "Select * from stock where id=:id";
            $qryStatement3 = $pdo->prepare($qry3);
            $qryStatement3->bindParam(':id', $s_id);
            if ($qryStatement3->execute()) {
                $result3 = $qryStatement3->fetchAll(PDO::FETCH_ASSOC);
                $p_id = $result3[0]['p_id'];

                $qry5 = "UPDATE `purchasing_details` SET `remaining_quantity` = `remaining_quantity` + :quantity, `remaining_weight` = `remaining_weight` + :weight, `remaining_total_amount` = `remaining_total_amount` + :total WHERE `p_id` = :id AND `type` = :type AND `detail` = :detail AND `price_per` = :price_per";
                $qryStatement5 = $pdo->prepare($qry5);
                $qryStatement5->bindParam(':id', $p_id);
                $qryStatement5->bindParam(':type', $type);
                $qryStatement5->bindParam(':detail', $detail);
                $qryStatement5->bindParam(':price_per', $price_per);
                $qryStatement5->bindParam(':quantity', $quantity);
                $qryStatement5->bindParam(':weight', $weight);
                $qryStatement5->bindParam(':total', $total_amount);
                if ($qryStatement5->execute()) {
                    $qry6 = "DELETE FROM `stock_details` WHERE `id` = :id";
                    $qryStatement6 = $pdo->prepare($qry6);
                    $qryStatement6->bindParam(':id', $id);
                    $qryStatement6->execute();
                    if ($qryStatement6->execute() && $result3[0]['total'] == 0) {
                        $qry4 = "DELETE FROM `stock` WHERE `id` = :id";
                        $qryStatement4 = $pdo->prepare($qry4);
                        $qryStatement4->bindParam(':id', $s_id);
                        if ($qryStatement4->execute()) {
                            array_push($array, "success");
                        }
                    }
                }
            }
        }
    } else {
        echo json_encode($qryStatement->errorInfo(), true);
    }

    echo json_encode($array, true);
}


function SelectCash()
{
    include 'layouts/session.php';
    error_reporting(E_ALL);
    ini_set('display_errors', 1);
    require_once "layouts/config.php";
    $array = array();
    $getRecordQuery = "SELECT cash.id, cash.date, cash.vendor_id, vendor.name, cash.type, cash.details, cash.amount
        FROM cash
        JOIN vendor ON cash.vendor_id = vendor.id
        WHERE cash.type =:type AND cash.status='Active'";
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
