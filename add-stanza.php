<?php
  $rn = $_POST['room_number'];
  $fl = $_POST['floor'];

  $connection = new mysqli("localhost","root","asd","hotel_booleana");

  if ($connection->connect_error){
    echo "ERRORE";
    die();
  }
  // conn è attivo

  // prepare and bind
  $stmt = $connection->prepare("INSERT INTO stanze (id, room_number, floor, beds , created_at, updated_at) VALUES (NULL, ?, ?, 2, NOW(), NOW())");
  $stmt->bind_param("ii", $rn, $fl);

  $stmt->execute();

  echo "OK";

?>
