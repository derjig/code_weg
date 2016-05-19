<?php
if (!defined('TYPO3_MODE')) {
	die ('Access denied.');
}


$TCA['tt_content']['types']['list']['subtypes_excludelist'][$_EXTKEY.'_pi1']='';


\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_codeweg_data');

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPlugin(array(
	'LLL:EXT:code_weg/locallang_db.xml:tt_content.list_type_pi1',
	$_EXTKEY . '_pi1',
	\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extRelPath($_EXTKEY) . 'ext_icon.gif'
),'list_type');

$TCA['tx_codeweg_data'] = array (
	'ctrl' => array (
		'title'     => 'LLL:EXT:code_weg/locallang_db.xml:tx_codeweg_data',		
		'label'     => 'uid',	
		'tstamp'    => 'tstamp',
		'crdate'    => 'crdate',
		'cruser_id' => 'cruser_id',
		'versioningWS' => TRUE, 
		'origUid' => 't3_origuid',
		'languageField'            => 'sys_language_uid',	
		'transOrigPointerField'    => 'l10n_parent',	
		'transOrigDiffSourceField' => 'l10n_diffsource',	
		'sortby' => 'sorting',	
		'delete' => 'deleted',	
		'enablecolumns' => array (		
			'disabled' => 'hidden',
		),
		'dynamicConfigFile' => \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extPath($_EXTKEY).'tca.php',
		'iconfile'          => \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extRelPath($_EXTKEY).'icon_tx_codeweg_data.gif',
	),
);
?>