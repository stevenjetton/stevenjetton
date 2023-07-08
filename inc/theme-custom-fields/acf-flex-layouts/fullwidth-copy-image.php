<?php

use StoutLogic\AcfBuilder\FieldsBuilder;

$fullwidth_copy_image = new FieldsBuilder('fullwidth_copy_image');
$fullwidth_copy_image
->addGroup('fullwidth_copy_image')
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
	->addWysiwyg('copy')
	->addImage('image',[
		'return_format' => 'id',
	])
->endGroup();