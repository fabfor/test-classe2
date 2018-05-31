<?php
  $ospite_id = $_POST['ospite'];

  $prenotazione_id = $_GET['id'];

  $connection = new mysqli("localhost","root","asd","hotel_booleana");

  if ($connection->connect_error){
    echo "ERRORE";
    die();
  }
  // conn è attivo
  $stmt = $connection->prepare("INSERT INTO `prenotazioni_has_ospiti`(`id`, `prenotazione_id`, `ospite_id`, `created_at`, `updated_at`) VALUES (NULL,?,?,NOW(),NOW())");
  $stmt->bind_param("ii", $prenotazione_id, $ospite_id);
  $stmt->execute();
  $stmt->close()
?>
