<?php
if (!defined ("TYPO3_MODE")) 	die ("Access denied.");


$GLOBALS ['TYPO3_CONF_VARS']['SC_OPTIONS']['t3lib/class.t3lib_tcemain.php']['userFunc_alterSortTabs'][] = 'tx_metaextras_tcemainprocdm->userFunc_alterSortTabs';

?>
