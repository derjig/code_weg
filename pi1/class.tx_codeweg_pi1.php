<?php
/***************************************************************
*  Copyright notice
*
*  (c) 2016  <>
*  All rights reserved
*
*  This script is part of the TYPO3 project. The TYPO3 project is
*  free software; you can redistribute it and/or modify
*  it under the terms of the GNU General Public License as published by
*  the Free Software Foundation; either version 2 of the License, or
*  (at your option) any later version.
*
*  The GNU General Public License can be found at
*  http://www.gnu.org/copyleft/gpl.html.
*
*  This script is distributed in the hope that it will be useful,
*  but WITHOUT ANY WARRANTY; without even the implied warranty of
*  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
*  GNU General Public License for more details.
*
*  This copyright notice MUST APPEAR in all copies of the script!
***************************************************************/
/**
 * [CLASS/FUNCTION INDEX of SCRIPT]
 *
 * Hint: use extdeveval to insert/update function index above.
 */

//require_once(PATH_tslib.'class.tslib_pibase.php');


/**
 * Plugin 'weg' for the 'code_weg' extension.
 *
 * @author	 <>
 * @package	TYPO3
 * @subpackage	tx_codeweg
 */
class tx_codeweg_pi1 extends \TYPO3\CMS\Frontend\Plugin\AbstractPlugin {
	var $prefixId      = 'tx_codeweg_pi1';		// Same as class name
	var $scriptRelPath = 'pi1/class.tx_codeweg_pi1.php';	// Path to this script relative to the extension dir.
	var $extKey        = 'code_weg';	// The extension key.
	var $pi_checkCHash = true;
	
	/**
	 * The main method of the PlugIn
	 *
	 * @param	string		$content: The PlugIn content
	 * @param	array		$conf: The PlugIn configuration
	 * @return	The content that is displayed on the website
	 */
	function main($content, $conf) {
		$this->conf = $conf;
		$this->pi_setPiVarDefaults();
		$this->pi_loadLL();
        
        $uid = $this->cObj->data['pages'] ? $this->cObj->data['pages'] : $GLOBALS['TSFE']->id;
        
        $content = '<h2>Test Git 1</h2>';
        
        $linkConf ['parameter'] = $uid;
        $linkConf ['additionalParams'] = '&'.$this->prefixId.'[param]=xcv';  
        $linkConf ['ATagParams'] = 'class="paramLink"';
        $linkText = 'Linktext';
        $link = $this->cObj->typolink($linkText, $linkConf);
        
        $content .= $link;

        $table = 'tx_codeweg_data';
        $fields = 'uid, title, description';
        $where = 'pid = '.$uid.$this->cObj->enableFields($table);

        $res = $GLOBALS['TYPO3_DB']->exec_SELECTquery ($fields, $table, $where, '', 'sorting', '');

        $count = $GLOBALS['TYPO3_DB']->sql_num_rows($res);

        while ($row = $GLOBALS['TYPO3_DB']->sql_fetch_assoc($res)) {
            $content .= '<div>'.$row['title'].'</div><div>'.$row['description'].'</div>';
        }
	
		return $this->pi_wrapInBaseClass($content);
	}
}



if (defined('TYPO3_MODE') && $TYPO3_CONF_VARS[TYPO3_MODE]['XCLASS']['ext/code_weg/pi1/class.tx_codeweg_pi1.php'])	{
	include_once($TYPO3_CONF_VARS[TYPO3_MODE]['XCLASS']['ext/code_weg/pi1/class.tx_codeweg_pi1.php']);
}

?>