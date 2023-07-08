<?php
use StoutLogic\AcfBuilder\FieldsBuilder;

/**
 * Add Partials
 */
require get_template_directory() . '/inc/theme-custom-fields/acf-field-partials.php';

/**
* Add all flex layouts
*/
require get_template_directory() . '/inc/theme-custom-fields/acf-flex-layouts/hero.php';
require get_template_directory() . '/inc/theme-custom-fields/acf-flex-layouts/cards.php';
require get_template_directory() . '/inc/theme-custom-fields/acf-flex-layouts/single-wysiwyg.php';
require get_template_directory() . '/inc/theme-custom-fields/acf-flex-layouts/fullwidth-copy-image.php';
require get_template_directory() . '/inc/theme-custom-fields/acf-flex-layouts/list-with-icons.php';

/**
 * Add Flex Layout Fields
 */

    $all_pages_content = new FieldsBuilder('all_pages_content',[
      'position' => 'acf_after_title',
    ]);
    $all_pages_content
      ->addFlexibleContent('sections',[ 'button_label' => 'Add Section', ])
        ->addLayout($hero)
        ->addLayout($cards)
        ->addLayout($fullwidth_copy_image)
        ->addLayout($single_wysiwyg)
        ->addLayout($list_with_icons)
        ->setLocation('post_type', '==', 'page');

    add_action('acf/init', function() use ($all_pages_content) {
      acf_add_local_field_group($all_pages_content->build());
    });


require get_template_directory() . '/inc/theme-custom-fields/footer/footer-options.php';


$site_settings = new FieldsBuilder('site_settings');
$site_settings
 ->addFields($footer_options)
 ->setLocation('options_page', '==', 'site-settings');

 add_action('acf/init', function () use ($site_settings){
  acf_add_local_field_group($site_settings->build());
 });
 

/**
 * Add Other Field Groups
 */

/*
   Example: 
    $field_group_name = new FieldsBuilder('all_pages_content',[
      'position' => 'acf_after_title',
    ]);
    $field_group_name
      ->addTrueFalse('is_enabled', [
        'label' => 'Field Group Name',
        'instructions' => 'some field instructions',
        'ui' => 1,
        'default_value' => 1,
        'ui_on_text' => 'Enabled',
        'ui_off_text' => 'Disabled'
      ])
      ->addGroup('content',[ 'label' => 'Some Content' ])
        ->addImage('hero_image', [
          'label' => 'Hero Image',
          'return_format' => 'url'
        ])
        ->addWysiwyg('form_description', ['label' => 'Form Description'])
        ->addFile('white_paper_pdf', [
          'label' => 'White Paper PDF',
          'required' => 1,
          'return_format' => 'url',
          'mime_types' => '.pdf'
          ])
      ->endGroup() 
      ->addFields($contact_info)
      ->setLocation('post_type', '==', 'post');
      
    add_action('acf/init', function() use ($field_group_name) {
      acf_add_local_field_group($field_group_name->build());
    });
*/

