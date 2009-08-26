<?php

function user_alterSortTabs( &$param, $conf) {
$fN =  $param['fN'];
$table = $param['table'];
$sortTab = $param['sortTab'];
$sortAux = $param['sortAux'];

//echo '<br />--yes:'.$fN;

if ($param['forceEmptyOption']){
  foreach ($sortTab as $key => $value) {
    $res = $GLOBALS['TYPO3_DB']->exec_SELECTquery('COUNT(uid)',
    $table, 'FIND_IN_SET('.$value['uid'].','.$fN.') AND NOT deleted '.
    ($conf['list.']['whereString'] ? ' AND '.$conf['list.']['whereString'] : '')
    ,'','')    ;
    if ($resRow = $GLOBALS['TYPO3_DB']->sql_fetch_assoc($res)) {
      $sortTab[$key]['metafeedit_count'] = $resRow['COUNT(uid)'];
      //echo $resRow['COUNT(uid)'];
      $sortTab[$key]['tx_metafeedit_resLabel'] = $sortTab[$key]['tx_metafeedit_resLabel']. ' ('.$sortTab[$key]['metafeedit_count'].')';
    }
    if ($sortTab[$key]['metafeedit_count'] ==0)   {
    unset($sortTab[$key]);
    unset($sortAux[$key]);
    }
 }

$param['sortTab'] =$sortTab ;
$param['sortAux'] =$sortAux ;
}
return ;

}

?>