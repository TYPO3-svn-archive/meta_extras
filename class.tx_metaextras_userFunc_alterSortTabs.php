<?php


function userFunc_alterSortTabs($fN, $table, &$sortTab, $conf) {

//if ($conf) {

     foreach ($sortTab as $key => $value) {

       $res = $GLOBALS['TYPO3_DB']->exec_SELECTquery('COUNT(uid)',$table,

       'FIND_IN_SET('.$value['uid'].','.$fN.') AND NOT deleted '.($conf['list.']['whereString'] ? ' AND '.$conf['list.']['whereString'] : ''),

       '','')    ;

       if ($resRow = $GLOBALS['TYPO3_DB']->sql_fetch_assoc($res)) {

       $sortTab[$key]['metafeedit_count'] = $resRow['COUNT(uid)'];
      $sortTab[$key]['tx_metafeedit_resLabel'] = $sortTab[$key]['tx_metafeedit_resLabel']. ' ('.$sortTab[$key]['metafeedit_count'].')';
      
} else {
unset($sortTab[$key]);
}


     }
//}


}



?>
