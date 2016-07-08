<?php
require_once 'config.php';
error_reporting(E_ALL);
ini_set('display_errors', 'on');

isset($_GET['action']) || exit('Doesn`t action');
$action = $_GET['action'];

$mysqli = new mysqli($dbHost, $dbUser, $dbPass, $dbName);
if ($mysqli->connect_errno) {
    printf("Не удалось подключиться: %s\n", $mysqli->connect_error);
    exit();
}
$mysqli->set_charset('utf8');

switch ($action) {
  case 'getCarriages':
    $result = $mysqli->query("SELECT * FROM carriages c LEFT JOIN owners o ON c.carriage_owner = o.id ORDER BY c.id DESC");
    if (!$result) {
      $response = array(
        "status" => "error",
        "error" => $mysqli->error
      );
      echo json_encode($response);
      exit();
    }
    while ($row = $result->fetch_assoc()) {
      $carriages[] = $row;
    }
    $response = array(
      "status" => "1",
      "carriages" => $carriages,
    );

    echo json_encode($response);
    exit();

    break;

  case 'getOwners':
    $result = $mysqli->query("SELECT * FROM owners");
    if (!$result) {
      $response = array(
        "status" => "0",
        "error" => $mysqli->error
      );
      echo json_encode($response);
      exit();
    }

    while ($row = $result->fetch_assoc()) {
      $owners[] = $row;
    }
    $response = array(
      "status" => "1",
      "owners" => $owners,
    );

    echo json_encode($response);
    exit();

    break;

  case 'addCarriage':

    $number = $_GET['number'];
    $kind =  $_GET['kind'];
    $owner = $_GET['owner'];
    $result = $mysqli->query("SELECT carriage_number FROM carriages WHERE carriage_number = '$number'");
    if ($result->num_rows) {
      $response = array(
        "status" => "2",
      );
      echo json_encode($response);
      exit();
    }
    $result = $mysqli->query("INSERT INTO carriages (carriage_number, carriage_kind, carriage_owner) VALUES ('$number', '$kind', '$owner')");
    if (!$result) {
      $response = array(
        "status" => "0",
        "error" => $mysqli->error
      );
      echo json_encode($response);
      exit();
    }
    $date = date("Y-m-d");
    $result = $mysqli->query("INSERT INTO carriages_owners (carriage_id, owner_id, date_from) VALUES ('$number', '$owner', '$date')");
    if (!$result) {
      $response = array(
        "status" => "0",
        "error" => $mysqli->error
      );
      echo json_encode($response);
      exit();
    }

    $response = array(
      'status'  => '1',
    );
    echo json_encode($response);
    break;

  case 'addOwner':

    $ownerName = $_GET['owner'];
    $result = $mysqli->query("INSERT INTO owners (name) VALUES ('$ownerName')");
    if (!$result) {
      $response = array(
        "status" => "0",
        "error" => $mysqli->error
      );
      echo json_encode($response);
      exit();
    }

    $response = array(
      'status'  => '1',
    );
    echo json_encode($response);

    break;

  case 'removeCarriage':
    $number = $_GET['number'];
    $result = $mysqli->query("DELETE FROM carriages WHERE carriage_number = '$number'");
    if (!$result) {
      $response = array(
        "status" => "0",
        "error" => $mysqli->error
      );
      echo json_encode($response);
      exit();
    }

    $response = array(
      'status'  => '1',
    );
    echo json_encode($response);
    break;

  case 'updateCarriage':
    $number = $_GET['number'];
    $owner = $_GET['owner'];
    $oldOwner = $_GET['oldOwner'];

    $result = $mysqli->query("UPDATE carriages SET carriage_owner = '$owner' WHERE carriage_number = $number");
    if (!$result) {
      $response = array(
        "status" => "0",
        "error" => $mysqli->error
      );
      echo json_encode($response);
      exit();
    }
    $date = date('Y-m-d');
    $result = $mysqli->query("UPDATE carriages_owners SET date_to = '$date' WHERE carriage_id = '$number' AND owner_id = '$oldOwner' AND date_to IS NULL ");
    if (!$result) {
      $response = array(
        "status" => "0",
        "error" => $mysqli->error
      );
      echo json_encode($response);
      exit();
    }

    $result = $mysqli->query("INSERT INTO carriages_owners (carriage_id, owner_id, date_from) VALUES ('$number', '$owner', '$date')");
    if (!$result) {
      $response = array(
        "status" => "0",
        "error" => $mysqli->error
      );
      echo json_encode($response);
      exit();
    }
    $response = array(
      'status'  => '1',
    );
    echo json_encode($response);

    break;
  default:
    # code...
    break;
}


// print_r($_GET);
// exit;
