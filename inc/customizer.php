<?php

function ocwuned_customize_register( $wp_customize ) {

  // Add Settings
  $wp_customize->add_setting('customizer_setting_one', array(
      'transport'         => 'refresh',
      'height'         => 325,
  ));
  $wp_customize->add_setting('customizer_setting_two', array(
      'transport'         => 'refresh',
      'height'         => 325,
  ));

  // Add Section
  $wp_customize->add_section('portada', array(
      'title'             => __('Imagen de portada', 'name-theme'), 
      'priority'          => 70,
  ));    

  // Add Controls
  $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'customizer_setting_one_control', array(
      'label'             => __('Imagen para portada', 'name-theme'),
      'section'           => 'portada',
      'settings'          => 'customizer_setting_one',    
  )));
     
}
add_action('customize_register', 'ocwuned_customize_register');