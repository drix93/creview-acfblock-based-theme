<?php

// Header Banner

class Header_Banner
{
    public function print_section( $args = array() )
    {
        $this->set_props( array_filter( $args ) );
        $this->create_banner();
    }

    public function set_props($args)
    {
        $this->args = array(
            'title' => get_field( 'hbanner' )['title'] ? get_field( 'hbanner' )['title'] : 'Lorem',
            'copy' => get_field( 'hbanner' )['copy'] ? get_field( 'hbanner' )['copy'] : 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc varius nisi eu quam iaculis, quis suscipit ante convallis. Aliquam varius urna ac nibh convallis sollicitudin. Donec ut ipsum eget turpis. ',
            'bg' => get_field( 'hbanner' )['bg'] ? get_field( 'hbanner' )['bg'] : 'https://via.placeholder.com/1280x270',
        );
    }

    public function create_banner()
    { ?>

<div class="section header-banner">
    <div class="container">
        <div class="row"></div>
    </div>
</div>

<?php
    }
}

function header_banner( $args = array() )
{
    $relateSection = new Header_Banner();
    $relateSection->print_section($args);
}