<?php
  require '../config/database.php';
  $message = ' ';
  $day_ini=date_create($_POST['day_ini']);
  $day_end=date_create($_POST['day_end']);
  $hour_ini=date_create($_POST['hour_ini']);
  $hour_end=date_create($_POST['hour_end']);
  date_sub($hour_end,date_interval_create_from_date_string($_POST['interval']));
  $hour_agendar=$hour_ini;
  try {
    $a=0;
    while ($a<1) {
      $j=0;
      $stringDay=$day_ini->format('Y-m-d');
      // echo "</br> Dia : ". $stringDay . "</br>";
      while ($j<1){
        $stringHour= $hour_agendar->format('H:i');
        // echo "$stringHour" . "</br>";
        $sql = "INSERT INTO agenda (esp_id, doc_id, day, hour) VALUES (:esp_id, :doc_id, :day, :hour)";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':esp_id', $_POST['esp_id']);
        $stmt->bindParam(':doc_id', $_POST['doc_id']);
        $stmt->bindParam(':day', $stringDay);
        $stmt->bindParam(':hour', $stringHour);
        $stmt->execute();
        date_add($hour_agendar,date_interval_create_from_date_string($_POST['interval']));
        if ($hour_agendar > $hour_end) {
          $j++;
        }
      }
      unset($hour_agendar);
      $hour_agendar=date_create($_POST['hour_ini']);
      date_add($day_ini,date_interval_create_from_date_string('1 day'));
      if ($day_ini >= $day_end) {
          $a++;
      }
    }
    if ($stmt->execute()) {
        $stmt->closeCursor();
        $message = "La agenda ha sido creado exitosamente" . "</br>";
    }
  }catch (PDOException $e) {
  $message = 'Lo sentimos, ha ocurrido un error intentelo nuevamemnte';
}
  $_POST = array();
  $stmt = null;
  $pdo = null;
  echo "<script>window.location= '../view/agendar.php' </script>";
?>