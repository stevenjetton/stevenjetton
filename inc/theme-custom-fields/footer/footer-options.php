<?php

use StoutLogic\AcfBuilder\FieldsBuilder;

$footer_options = new FieldsBuilder('footer_options');
$footer_options
	->addTab('footer_options')
	->addGroup('footer_options')
		->addFields($anchor_id)
		->addFields($background_color_buttons)
	->endGroup();