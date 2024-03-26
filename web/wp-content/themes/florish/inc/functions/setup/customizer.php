<?php

/////////////CUSTOMIZER REGISTER START////////////////
function sorciere_social_share_customize_register($wp_customize)
{

	$wp_customize->add_section(
		'sorciere_social_share',
		array(
			'title' => __('Social Links', 'sorciere'),
			'description' => '',
			'priority' => 120,
		)
	);



	////////////Facebook///////////////
	$wp_customize->add_setting(
		'sorciere_facebook_links',
		array(
			'default' => '',
			'capability' => 'edit_theme_options',
			'type' => 'theme_mod',

		)
	);

	$wp_customize->add_control(
		'sorciere_facebook_links',
		array(
			'label' => __('Facebook', 'sorciere'),
			'section' => 'sorciere_social_share',
			'settings' => 'sorciere_facebook_links',
		)
	);

	////////////Instagram///////////////
	$wp_customize->add_setting(
		'sorciere_instagram_links',
		array(
			'default' => '',
			'capability' => 'edit_theme_options',
			'type' => 'theme_mod',

		)
	);

	$wp_customize->add_control(
		'sorciere_instagram_links',
		array(
			'label' => __('Instagram', 'sorciere'),
			'section' => 'sorciere_social_share',
			'settings' => 'sorciere_instagram_links',
		)
	);


	////////////Twitter///////////////
	$wp_customize->add_setting(
		'sorciere_twitter_links',
		array(
			'default' => '',
			'capability' => 'edit_theme_options',
			'type' => 'theme_mod',

		)
	);

	$wp_customize->add_control(
		'sorciere_twitter_links',
		array(
			'label' => __('Twitter', 'sorciere'),
			'section' => 'sorciere_social_share',
			'settings' => 'sorciere_twitter_links',
		)
	);


	////////////Youtube///////////////
	$wp_customize->add_setting(
		'sorciere_youtube_links',
		array(
			'default' => '',
			'capability' => 'edit_theme_options',
			'type' => 'theme_mod',

		)
	);

	$wp_customize->add_control(
		'sorciere_youtube_links',
		array(
			'label' => __('Youtube', 'sorciere'),
			'section' => 'sorciere_social_share',
			'settings' => 'sorciere_youtube_links',
		)
	);

}


function change_role_name()
{
	global $wp_roles;

	if (!isset($wp_roles))
		$wp_roles = new WP_Roles();

	//You can replace "administrator" with any other role "editor", "author", "contributor" or "subscriber"...
	$wp_roles->roles['nursery']['name'] = 'Vendor';
	$wp_roles->role_names['nursery'] = 'Vendor';
}

function remove_admin_bar()
{
	if (!current_user_can('administrator') && !is_admin()) {
		show_admin_bar(false);
	}

}
/////////////CUSTOMIZER REGISTER END////////////////
