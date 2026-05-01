<?php
add_action('admin_notices', 'check_required_plugins');

function check_required_plugins() {
    // Daftar plugin + dokumentasi
    $required_plugins = [
        'secure-custom-fields/secure-custom-fields.php' => 'https://downloads.wordpress.org/plugin/secure-custom-fields.6.8.3.zip',
        'regenerate-thumbnails/regenerate-thumbnails.php' => 'https://downloads.wordpress.org/plugin/regenerate-thumbnails.3.1.4.zip',
    ];

    $inactive_plugins = [];

    foreach ($required_plugins as $plugin => $doc_url) {
        $plugin_path = WP_PLUGIN_DIR . '/' . $plugin;

        if (!file_exists($plugin_path)) {
            // Jika file tidak ada, tampilkan nama file + link dokumentasi
            $inactive_plugins[] = basename($plugin, '.php') . ' (tidak terpasang) - <a href="' . esc_url($doc_url) . '" target="_blank">Download</a>';
        } elseif (!is_plugin_active($plugin)) {
            // Ambil metadata plugin untuk nama asli
            if (!function_exists('get_plugin_data')) {
                require_once(ABSPATH . 'wp-admin/includes/plugin.php');
            }
            $plugin_data = get_plugin_data($plugin_path);
            $plugin_name = $plugin_data['Name'] ?: basename($plugin, '.php');

            $inactive_plugins[] = $plugin_name . ' (tidak aktif) - <a href="' . esc_url($doc_url) . '" target="_blank">Download</a>';
        }
    }

    if (!empty($inactive_plugins)) {
        $plugins_url = admin_url('plugins.php');
        echo '<div class="notice notice-error"><p><strong>Peringatan:</strong> Plugin berikut wajib diaktifkan/diinstal: <br>' 
            . implode('<br>', $inactive_plugins) 
            . '<br><br><a href="' . esc_url($plugins_url) . '" class="button button-primary">Kelola Plugins</a>'
            . '</p></div>';
    }
}



