<?php
require_once __DIR__ . './query.php';
require_once __DIR__ . './conection.php';
require_once __DIR__ . './formats.php';

function searchRepositories($token)
{

  set_error_handler(
    function ($errno, $errstr, $errfile, $errline) {
      throw new ErrorException($errstr, $errno, 0, $errfile, $errline);
    }
  );

  $query = new Query();
  $nodes = array();


  $resultPython = executaQuery(array('query' => $query->mountQuery('Python')), $token);
  $resultJava = executaQuery(array('query' => $query->mountQuery('Java')), $token);

  $nodes = formatNode($resultPython, $resultJava);




  return $nodes;
}
