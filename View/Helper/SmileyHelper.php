<?php

class SmileyHelper extends AppHelper {

	public $helpers = array(
		'Html',
		);

	protected $_templates = array(
		'smiley' => '<span class="emoji smile"></span>',
		'disappointed' => '<span class="emoji disappointed"> </span>',
		);

	public function beforeRender($viewFile) {
		$this->Html->css('Smiley.smiley', null, array('inline' => false));
	}

	function beforeLayout($viewFile) {
		$content = str_replace(
			array(
				':smile:',
				':)',
				':disappointed:',
				':(',
				),
			array(
				$this->_templates['smiley'],
				$this->_templates['smiley'],
				$this->_templates['disappointed'],
				$this->_templates['disappointed'],
				),
			$this->_View->Blocks->get('content')
			);
		$this->_View->Blocks->set('content', $content);
	}

}
