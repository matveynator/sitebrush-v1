<?php

function PaginateReverse($PaginateTotal, $PagerAreaUri, $PageRequested = 'NOTSET')
{
  global $configuration, $smarty;
  // total ammount of pages +1:
  $PagerTotal = (floor($PaginateTotal / $configuration['PagerAmmountPerPage']) + 1);
  // if some certain page requested:
  if (($PageRequested != 'NOTSET') and ($PageRequested >= 0)) {
    if ($PageRequested >= $PagerTotal) {
      $PageRequested = ($PagerTotal - 1);
      $PagerStart = ($PagerTotal - $configuration['PagerMaxLinks']);
    } else {
      if ($PageRequested + (floor($configuration['PagerMaxLinks'] / 2)) >= $PagerTotal) {
        $PagerStart = ($PagerTotal - $configuration['PagerMaxLinks']);
      } else {
        $PagerStart = ($PageRequested - (floor($configuration['PagerMaxLinks'] / 2)));
      }
    }
  } elseif ($PageRequested == 'NOTSET') {
    $PageRequested = floor($PaginateTotal / $configuration['PagerAmmountPerPage']);
    if ($PageRequested + (floor($configuration['PagerMaxLinks'] / 2)) >= $PagerTotal) {
      $PagerStart = ($PagerTotal - $configuration['PagerMaxLinks']);
    } else {
      $PagerStart = ($PageRequested - (floor($configuration['PagerMaxLinks'] / 2)));
    }
  }
  
  if ($PagerTotal > $configuration['PagerMaxLinks']) {
    $PagerMaxLoopTime = $configuration['PagerMaxLinks'];
  } elseif ($configuration['PagerMaxLinks'] >= $PagerTotal) {
    $PagerMaxLoopTime = $PagerTotal;
  }
  if ($PagerStart <= 0) {
    $PagerStart = 0;
  }
  

  $smarty->assign('PagerPageRequested', $PageRequested);
  $smarty->assign('PagerStart', $PagerStart);
  $smarty->assign('PagerPerPage', $configuration['PagerAmmountPerPage']);
  $smarty->assign('PagerMaxLoopTime', $PagerMaxLoopTime);
  $smarty->assign('PagerTotal', $PagerTotal);
  $smarty->assign('PagerMaxLinks', $configuration['PagerMaxLinks']);
  $smarty->assign('PagerAmmountPerPage', $configuration['PagerAmmountPerPage']);
  $smarty->assign('PagerAreaUri', $PagerAreaUri);
}
?>
