<?php

use StoutLogic\AcfBuilder\FieldsBuilder;

$list_with_icons = new FieldsBuilder('list_with_icons');
$list_with_icons

->addGroup('list_with_icons')
	->addFields($anchor_id)
	->addFields($background_color_buttons)
	->addRadio('layout_choices', [
		'label' => 'Radio Field',
		'instructions' => '',
		'required' => 0,
		'conditional_logic' => [],
		'wrapper' => [
				'width' => '',
				'class' => '',
				'id' => '',
		],
		'choices' => ['normal', 'reverse'],
		'allow_null' => 0,
		'other_choice' => 0,
		'save_other_choice' => 0,
		'default_value' => 'normal',
		'layout' => 'vertical',
		'return_format' => 'value',
])
	->addWysiwyg('heading')
	->addRepeater('list_with_icons')
	->addText('copy')
	->addImage('icon',[
		'return_format' => 'id',
	])
	->endRepeater()
	->addImage('image',[
		'return_format' => 'id',
		])
		->addFields($cta)
->endGroup();