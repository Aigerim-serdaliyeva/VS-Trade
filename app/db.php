<?php

  $file = "db.json";

  if (isset($_GET["cartridge"])) {
    $data = getData();
    $count = 28;
  
    $now = time();
    $len = count($data);
  
    for ($i = 0; $i < $len; $i++) {
      if ($i + 1 == $len) {
        $count = $data[$i]["count"];
        break;
      }
  
      $cur = strtotime($data[$i]["dateFrom"]);
      $next = strtotime($data[$i+1]["dateFrom"]);
  
      if ($now < $cur) {
        break;
      }
  
      if ($now >= $cur && $now < $next) {
        $count = $data[$i]["count"];
        break;
      }
    }
  
    echo $count;
  }  

  function getData() {
    global $file;
    $db = json_decode(file_get_contents($file), true);
    return $db["cartridges"];
  }
?>
