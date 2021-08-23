// This file is not added as part of the compiled and minimized js, as it is specific to adding custom block styles to the editor

wp.domReady( function() {

    wp.blocks.unregisterBlockStyle('core/button', 'default');
    wp.blocks.unregisterBlockStyle('core/button', 'outline');
    wp.blocks.unregisterBlockStyle('core/button', 'squared');

    wp.blocks.registerBlockStyle('core/button', {
        name: 'default',
        label: 'Default',
    })

    
});