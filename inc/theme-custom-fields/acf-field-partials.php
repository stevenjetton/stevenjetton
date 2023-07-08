<?php

use StoutLogic\AcfBuilder\FieldsBuilder;


// Partial for Anchor IDs
$anchor_id = new FieldsBuilder('anchor_id'); // the string passed to FieldsBuilder() is used to namespace the fields
$anchor_id
  ->addText('anchor_id',[  // the string passed to 1st param of addText() is the field name used to access field content in a template
    'label' => 'Anchor Link ID',
		'wrapper'=>[
			'width'=>'20',
		]
  ]);

define('THEME_COLOR_KEYS', array(
	'color_1' => 'primary',
	'color_2' => 'secondary',
	'color_3' => 'alt 1',
	'color_4' => 'alt 2',
	'color_5' => 'alt 3',
	'color_6' => 'alt 4',
	'color_7' => 'alt 5',
	'color_w' => 'white'
));

$background_color_buttons = new FieldsBuilder('bg_color_buttons');
$background_color_buttons
	->addButtonGroup('bg_color_numbers',[
		'label' => 'Background Color',
		'wrapper' => [ 'class'=>'admin-bg-color-num-buttons', 'width'=> '50'],
		'allow_null' => 1,
		'return_format' => 'value',
		'choices' => THEME_COLOR_KEYS,
	]);

// Parital for Background Color
$background_color = new FieldsBuilder('background_color');
$background_color
	->addColorPicker('background_color', [
		'label' => 'Background Color',
	]);

// Partial for Background Position for Images
$bg_image_position = new FieldsBuilder('bg_position');
$bg_image_position
	->addGroup('background_position',[
		'instructions' => 'Add percentages (ex. 15%) to adjust which part of the image displays.',
	])
		->addText('horizontal')
		->addText('vertical')
	->endGroup();

// Partial for CTAs
$cta = new FieldsBuilder('cta');
$cta
	->addGroup('cta',[
		'label' => 'Call to Action',
	])
		->addLink('cta_link', [
			'label' => 'CTA Link',
			'return_format' => 'array',
		])
		->addText('accessibility_text',[
			'label' => 'Optional for accessibility text',
		])
		->endGroup();	

// Partial for URLs
$external_url = new FieldsBuilder('external_url');
$external_url
	->addGroup('external_url',[
		'label' => 'External Link',
	])
		->addUrl('url')
		->addText('accessibility_text',[
			'label' => 'Optional for accessibility text',
		]);		

// Partial for Page Link
$page_link = new FieldsBuilder('page_link');
$page_link
	->addGroup('page_link')
		->addPageLink('link')
		->addText('accessibility_text',[
			'label' => 'Optional for accessibility text',
		]);				

// Partial for Hero Backround Images
$hero_image = new FieldsBuilder('hero_image');
$hero_image
	->addGroup('hero_content')
		->addImage('hero_image', [
			'label' => 'Background Image',
			'return_format' => "id",
		])
		->addFields($bg_image_position)
		->addText('hero_text')
	->endGroup();

  
  // Partial for Hero Media Options
$media_options = new FieldsBuilder('media_options');
$media_options
	->addGroup('media_options')
		->addRadio('media_type')
			->addChoices('intro_words','split','image', 'embed', 'video')
				
				->addGroup('intro_words')
					->conditional('media_type', '==', 'intro_words')
					->addTextarea('copy')
					->addFields($cta)
				->endGroup()	

				->addGroup('split')
					->conditional('media_type', '==', 'split')
					->addText('copy')
					->addFields($cta)
					->addImage('image', [
						'return_format' => "id",
					])
				->endGroup()
			
				->addGroup('background_image')
					->conditional('media_type', '==', 'image')
					->addImage('hero_image', [
						'label' => 'Background Image',
						'return_format' => "id",
					])
					->addFields($bg_image_position)
					->addWysiwyg('hero_text')
					->addFields($cta)
				->endGroup()
			
			->addOembed('embed_video')
				->conditional('media_type', '==', 'embed')

			->addGroup('video')
				->conditional('media_type', '==', 'video')
				->addRadio('layout',[
					'instructions' => 'Choose whether it is an autoplay background video or a normal video player with a play button'
				])
					->addChoices(['background' => 'Background Video'], ['inline' => 'Video Player'])
					->addFile('mp4',[
						'return_format' => 'url',
						'mime_types' => '.mp4',
					])
					->addFile('webm',[
						'return_format' => 'url',
						'mime_types' => '.webm',
					])
					->addWysiwyg('hero_text')
					->addFields($cta)
			->endGroup()
			
	->endGroup();

// Partial for Card Repeater
$card_group = new FieldsBuilder('card_group');
$card_group
	->addGroup('card_group')
		->addRepeater('cards')
    ->addTrueFalse('show_hide', [
        'label' => 'Show / Hide',
        'instructions' => '',
        'required' => 0,
        'conditional_logic' => [],
        'wrapper' => [
            'width' => '',
            'class' => '',
            'id' => '',
        ],
        'message' => '',
        'default_value' => 0,
        'ui' => 1,
        'ui_on_text' => 'show',
        'ui_off_text' => 'hide',
    ])
			->addWysiwyg('copy',[
				'label' => 'Body Content',
			])
			->addImage('icon',[
				'return_format' => 'id',
				'wrapper' => [
					'width' => '30',
				]
			])
			->addFields($cta)
		->endRepeater()
	->endGroup();

