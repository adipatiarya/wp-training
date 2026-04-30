<?php

/*
 * Plugin Name: Word Count
 * Description: A simple plugin to count the number of words in a post.
 * Version: 1.0 
 */

class WordCountPlugin {

    private $register_settings = [
        'wcp_location' => [
            'sanitize_callback' => 'sanitize_text_field',
            'default' => '0'
        ],
        'wcp_headline' => [
            'sanitize_callback' => 'sanitize_text_field',
            'default' => 'Word Count'
        ],
        'wcp_wordcount' => [
            'sanitize_callback' => 'sanitize_text_field',
            'default' => '1'
        ],
        'wcp_charactercount' => [
            'sanitize_callback' => 'sanitize_text_field',
            'default' => '1'
        ],
        'wcp_readtime' => [
            'sanitize_callback' => 'sanitize_text_field',
            'default' => '1'
        ]
    ];
    private $locations = [
        [ 'value' => '0', 'label' => 'Beginning of the post' ],
        [ 'value' => '1', 'label' => 'End of the post' ]
    ];

    public function __construct() {
        add_action('admin_menu', array($this, 'add_admin_menu'));
        add_action('admin_init', array($this, 'initialize_settings'));
    }

    public function initialize_settings() {
        add_settings_section('wcp_first_section', null, null, 'word-count');
         
        foreach ($this->register_settings as $setting_name => $args) {
            register_setting('wordcountplugin', $setting_name, $args);
            add_settings_field($setting_name, ucwords(str_replace('wcp_', '', $setting_name)), array($this, $setting_name . '_html'), 'word-count', 'wcp_first_section');
          
        }
    }

    public function wcp_location_html() { ?>
        <select name="wcp_location">
            <?php foreach ($this->locations as $location) { ?>
                <option value="<?php echo esc_attr($location['value']); ?>" <?php selected(get_option('wcp_location'), $location['value']); ?>>
                    <?php echo esc_html($location['label']); ?>
                </option>
            <?php } ?>
        </select>
    <?php }


    public function wcp_headline_html() { ?>    
        <input type="text" name="wcp_headline" value="<?php echo esc_attr(get_option('wcp_headline')); ?>" />
    <?php }

    public function wcp_wordcount_html() { ?>    
        <input type="checkbox" name="wcp_wordcount" value="1" <?php checked(get_option('wcp_wordcount'), '1'); ?> />
        
    <?php }
    public function wcp_charactercount_html() { ?>    
        <input type="checkbox" name="wcp_charactercount" value="1" <?php checked(get_option('wcp_charactercount'), '1'); ?> />
        
    <?php }
    public function wcp_readtime_html() { ?>    
        <input type="checkbox" name="wcp_readtime" value="1" <?php checked(get_option('wcp_readtime'), '1'); ?> />
        
    <?php }

    public function add_admin_menu() {
        add_options_page(
            'Word Count',
            'Word Count',
            'manage_options',
            'word-count',
            array($this, 'display_word_count')
        );
    }

    public function display_word_count() { ?>
        <div class="wrap">
            <h1>Word Count Settings</h1>
            <form method="post" action="options.php">
            <?php
                settings_fields('wordcountplugin');
                do_settings_sections('word-count');
                submit_button();
            ?>
            </form>
        </div>
    <?php }
}

new WordCountPlugin();
