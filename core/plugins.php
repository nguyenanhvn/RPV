<?php
function destination_plugin_activation() {
 
        // Declare required plugin
        $plugins = array(
                array(
                        'name' => 'Redux Framework',
                        'slug' => 'redux-framework',
                        'required' => true
                )
        );
 
        // Config TGM
        $configs = array(
                'menu' => 'tp_plugin_install',
                'has_notice' => true,
                'dismissable' => false,
                'is_automatic' => true
        );
        tgmpa( $plugins, $configs );
 
}
add_action('tgmpa_register', 'destination_plugin_activation');
?>