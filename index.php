<?php
session_start();
ini_set('max_execution_time', 0);
require_once __DIR__ . './search_repositories_github/csv.php';
require_once __DIR__ . './search_repositories_github/search.php';

$dir = __DIR__;

$token = "YOUR_TOKEN";

if (isset($argv[1])) {
    $token = $argv[1];
} else if (isset($_GET['token'])) {
    $token = $_GET['token'];
}


$data = searchRepositories($token);

if (count($data) > 0) {
    createCsv($data, $dir);
}
