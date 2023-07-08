<?php

use StoutLogic\AcfBuilder\FieldsBuilder;

$cards = new FieldsBuilder('cards');
$cards
	->addFields($anchor_id)
	->addFields($background_color_buttons)
	->addFields($card_group);