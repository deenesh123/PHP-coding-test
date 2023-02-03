<?php

function getShippingDate() {
  $holidays = getConfig('holidays');
  $cutOffTime = getConfig('cutOffTime');
  $now = new DateTime();

  if ($now->format('H') < $cutOffTime) {
    return $now->format('Y-m-d');
  } else {
    $tomorrow = new DateTime('tomorrow');
    while (in_array($tomorrow->format('w'), $holidays)) {
      $tomorrow->modify('tomorrow');
    }
    return $tomorrow->format('Y-m-d');
  }
}

function getConfig($name) {
  // retrieve the config value from config.php based on the name
}

?>

