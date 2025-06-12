<?php


/**
 * @file plugins/generic/jatsParser/JatsParserSettingsSubtitle1.inc.php
 *
 *  Realizado por el grupo 2 de la materia Taller de Sistemas de Gestión Editorial y Ciencia Abierta de la UNLa
 *
 * @class JatsParserSettingsSubtitle1
 * @ingroup plugins_generic_jatsParser
 *
 * @brief Form for journal managers to modify jatsParser article's subtitles
 */

import('lib.pkp.classes.form.Form');

class JatsParserSettingsSubtitle1 extends Form
{

	/** @var int */
	var $_journalId;

	/** @var object */
	var $_plugin;

	/**
	 * Constructor
	 * @param $plugin JATSParserPlugin
	 * @param $journalId int
	 */
	function __construct($plugin, $journalId)
	{
		$this->_journalId = $journalId;
		$this->_plugin = $plugin;

		parent::__construct($plugin->getTemplateResource('settingsSubtitle1.tpl'));

		$this->addCheck(new FormValidatorPost($this));
		$this->addCheck(new FormValidatorCSRF($this));
	}

	/**
	 * Initialize form data.
	 */
	function initData()
	{
		$contextId = $this->_journalId;
		$plugin = $this->_plugin;

		$this->setData('textColor', $plugin->getSetting($contextId, 'textColor'));
		$this->setData('fontSize', $plugin->getSetting($contextId, 'fontSize'));
		$this->setData('lineHeight', $plugin->getSetting($contextId, 'lineHeight'));
		$this->setData('fontFamily', $plugin->getSetting($contextId, 'fontFamily'));
		$this->setData('fontWeight', $plugin->getSetting($contextId, 'fontWeight'));

		//Sets the Font Family options
		$this->setData('fontFamilies', [
			"Open Sans,sans-serif" => "Open Sans",
			"Roboto Slab,serif" => "Roboto Slab",
			"Droid Serif,serif" => "Droid Serif",
			"Julius Sans One,sans-serif" => "Julius Sans One",
			"Lato,sans-serif" => "Lato",
			"Merriweather,serif" => "Merriweather",
			"Arial,Helvetica,sans-serif" => "Arial",
			"Verdana,Geneva,sans-serif" => "Verdana",
			"Tahoma,Geneva,sans-serif" => "Tahoma",
			"Times New Roman,Times,serif" => "Times New Roman",
			"Courier New,Courier,monospace" => "Courier New",
			"Georgia,serif" => "Georgia",
			"Comic Sans MS,cursive,sans-serif" => "Comic Sans MS"
		]);

		//Sets the font wheights options
		$this->setData('fontWeights', [
			"100" => "Light",
			"500" => "Normal",
			"700" => "Bold",
		]);
	}

	/**
	 * Assign form data to user-submitted data.
	 */
	function readInputData()
	{
		$this->readUserVars(array('textColor', 'fontSize', 'lineHeight', 'fontFamily', 'fontWeight'));
	}

	/**
	 * Fetch the form.
	 * @copydoc Form::fetch()
	 */
	function fetch($request, $template = null, $display = false)
	{
		$templateMgr = TemplateManager::getManager($request);
		$templateMgr->assign([
			'pluginName' => $this->_plugin->getName(),
		]);
		return parent::fetch($request, $template, $display);
	}

	/**
	 * Save settings.
	 */
	function execute(...$functionArgs)
	{
		$plugin = $this->_plugin;
		$contextId = $this->_journalId;

		$textColor = $this->getData('textColor');
		$plugin->updateSetting($contextId, 'textColor', $textColor);

		$fontSize = $this->getData('fontSize');
		$plugin->updateSetting($contextId, 'fontSize', $fontSize);

		$lineHeight = $this->getData('lineHeight');
		$plugin->updateSetting($contextId, 'lineHeight', $lineHeight);

		$fontFamily = $this->getData('fontFamily');
		$plugin->updateSetting($contextId, 'fontFamily', $fontFamily);

		$fontWeight = $this->getData('fontWeight');
		$plugin->updateSetting($contextId, 'fontWeight', $fontWeight);

		parent::execute(...$functionArgs);
	}
}
