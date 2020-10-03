<?php

function createCsv($data, $dir)
{
  $header = array_keys($data[0]);

  $fileContent = '';
  $fileContent .= implode(',', $header);
  $fileContent .= "\r\n";

 
  foreach ($data as $d => $val) {

    $fileContent .= implode(',',array_values($val));
    $fileContent .= "\r\n";
    
  }

  $file = fopen($dir . '/repositorios.csv', 'w+');
  fwrite($file, $fileContent);
  fclose($file);

}
