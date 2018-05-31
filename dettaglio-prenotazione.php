<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>
    <script
  src="https://code.jquery.com/jquery-3.3.1.js"
  integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60="
  crossorigin="anonymous"></script>
  </head>
  <body>

    <h1> dettaglio prenotazione</h1>
    <?php
    $id_prenotazione = $_GET['id'];

    $connection = new mysqli("localhost","root","asd","hotel_booleana");

    if ($connection->connect_error){
      echo "ERRORE";
      die();
    }
    // conn è attivo
    $stmt = $connection->prepare("SELECT ospiti.name,ospiti.lastname FROM `prenotazioni_has_ospiti` JOIN ospiti ON prenotazioni_has_ospiti.ospite_id = ospiti.id WHERE prenotazioni_has_ospiti.prenotazione_id = ?");
    $stmt->bind_param("i", $id_prenotazione);
    $stmt->execute();
    // estrazione del resultset
    $result = $stmt->get_result();
    while ($row = $result->fetch_array(MYSQLI_ASSOC)) {
        echo $row['name']." - ".$row['lastname'];
    }
    $stmt->close()
    ?>

    <h2>Aggiungi nuovo ospite</h2>

    <form action="" method="post">
      <select name="ospite">
        <?php
          $id_prenotazione = $_GET['id'];

          $connection = new mysqli("localhost","root","asd","hotel_booleana");

          if ($connection->connect_error){
            echo "ERRORE";
            die();
          }
          // conn è attivo
          $sql = "SELECT ospiti.id, ospiti.name, ospiti.lastname FROM ospiti";
          $result = $connection->query($sql);
          while ($row = $result->fetch_assoc()) {
              echo "<option value='".$row['id']."'>".$row['lastname']." ".$row['name']."</option>";
          }
          $stmt->close()
        ?>
      </select>
      <input type="submit" name="" value="ASSEGNA">
    </form>

  <script type="text/javascript">
    $('form').submit(function(e){
      e.preventDefault();
      $.ajax({
        url: 'aggiungi-ospite.php?id=<?php echo $id_prenotazione?>',
        method: 'POST',
        data: {'ospite': $('option:selected').val()},
        success: function(){
          alert("DONE");
        }
      });
    });
  </script>
  </body>
</html>
