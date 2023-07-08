<?php

use StoutLogic\AcfBuilder\FieldsBuilder;

$single_wysiwyg = new FieldsBuilder('single_wysiwyg');
$single_wysiwyg

->addGroup('single_wysiwyg')
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
        'choices' => ['stacked','normal', 'reverse'],
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
	->addFields($cta)
->endGroup();