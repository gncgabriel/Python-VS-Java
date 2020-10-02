<?php
function formatNode($nodesPython, $nodesJava)
{
  $nodesPython = $nodesPython['data']['search']['nodes'];
  $nodesJava = $nodesJava['data']['search']['nodes'];
 
  $formated = array();
  
  for($i = 0; $i <= 100; $i++){
    $formated[$i]['Nome do Repositório Python'] = $nodesPython[$i]['nameWithOwner'];
    $formated[$i]['Estrelas Python'] = $nodesPython[$i]['stargazerCount'];
    $formated[$i]['Watchers Python'] = $nodesPython[$i]['watchers']['totalCount'];
    $formated[$i]['Forks Python'] = $nodesPython[$i]['forks']['totalCount'];
    $formated[$i]['Data de Criação Python'] = formatDate($nodesPython[$i]['createdAt']);
    $formated[$i]['Releases Python'] = $nodesPython[$i]['releases']['totalCount'];
    $formated[$i]['Anos de Vida Python'] = (intval(date('Y')) - intval(formatDate($nodesPython[$i]['createdAt'], 'Y')));

    $formated[$i]['Nome do Repositório Java'] = $nodesJava[$i]['nameWithOwner'];
    $formated[$i]['Estrelas Java'] = $nodesJava[$i]['stargazerCount'];
    $formated[$i]['Watchers Java'] = $nodesJava[$i]['watchers']['totalCount'];
    $formated[$i]['Forks Java'] = $nodesJava[$i]['forks']['totalCount'];
    $formated[$i]['Data de Criação Java'] = formatDate($nodesJava[$i]['createdAt']);
    $formated[$i]['Releases Java'] = $nodesJava[$i]['releases']['totalCount'];
    $formated[$i]['Anos de Vida Java'] = (intval(date('Y')) - intval(formatDate($nodesJava[$i]['createdAt'], 'Y')));
  }

  return $formated;
}


function formatDate($date, $format = 'd/m/Y')
{
  $oldDate = new DateTime($date);
  $newDate = $oldDate->format($format);
  return $newDate;
}
