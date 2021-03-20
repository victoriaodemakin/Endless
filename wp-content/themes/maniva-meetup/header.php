<!DOCTYPE html>
<!--[if IE 7]>
<html class="ie ie7" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 8]>
<html class="ie ie8" <?php language_attributes(); ?>>
<![endif]-->
<!--[if !(IE 7) | !(IE 8)  ]><!-->
<html <?php language_attributes(); ?>>
<!--<![endif]-->
<head>
    <meta charset="<?php bloginfo('charset'); ?>"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!--[if IE 8]>
    <link href="<?php echo get_template_directory_uri();?>/css/ie8.css" rel="stylesheet" type="text/css">
    <![endif]-->


    <!--[if  IE 9]>
    <link media="all" rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri();?>/css/ie9.css">
    <link media="all" rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri();?>/css/color.css">
    <![endif]-->

    <?php wp_head(); ?>
</head>
<body id="bd" <?php body_class(''); ?>>
<?php wp_body_open(); ?>
<!--Include Loading Template-->
<?php get_template_part('template_inc/inc','loading'); ?>
<!--End Loading Template-->

<?php
//get_template_part('demo/demo', 'toolbox');
//?>

<?php

if (!is_page_template('template-homepage.php')) :

    get_template_part('template_inc/inc', 'menu');

endif;

?>

