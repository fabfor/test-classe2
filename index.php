<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>

    <!-- <form action="add-stanza.php" method="post">
      Room: <input type="text" name="room_number" >
      Floor: <input type="text" name="floor" >
      <input type="submit">
    </form> -->
    <h1> Lista di Prenotazioni</h1>
    <?php

    $connection = new mysqli("localhost","root","asd","hotel_booleana");

    if ($connection->connect_error){
      echo "ERRORE";
      die();
    }
    // conn è attivo

    $sql = "SELECT prenotazioni.id, stanze.room_number, prenotazioni.created_at FROM prenotazioni JOIN stanze ON prenotazioni.stanza_id = stanze.id";
    $result = $connection->query($sql);

    if ($result->num_rows > 0){
      // fin tanto che ci sono righe da leggere
      while($row = $result->fetch_assoc()) {
        $data = new DateTime($row['created_at']);

        echo '<a href="dettaglio-prenotazione.php?id='.$row['id'].'"><div class="prenotazione">';
        echo '<span class="id_prenotazione">'.$row['id'].'</span> - <span class="room_number">'.$row['room_number'].
        '</span> - <span class="created_a">'.$data->format('D, d F Y');
        echo '</div></a>';
      }

    }

    ?>

  </body>
</html>
