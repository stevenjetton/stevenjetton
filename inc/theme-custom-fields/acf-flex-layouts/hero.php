<?php

use StoutLogic\AcfBuilder\FieldsBuilder;

$hero = new FieldsBuilder('hero');
$hero
->addFields($anchor_id)
->addFields($background_color_buttons)
->addFields($media_options);