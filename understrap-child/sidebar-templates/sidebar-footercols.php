<?php
/**
 * Sidebar setup for footer columns.
 *
 * @package understrap
 */

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}

?>

<?php
for ($i = 1; $i <= 4; $i++) {
    if (is_active_sidebar('footercol' . $i)) {
        $used = true;
        break;
    }
}
if ($used) :
    ?>

<!-- ******************* The Footer Columns Widget Areas ******************* -->

<div class="wrapper pt-4 pb-3" id="wrapper-footercols">

    <div class="container" id="footercols-content" tabindex="-1">

        <div class="row px-lg-0">

            <?php
                for ($i = 1; $i <= 5; $i++) {
                    if (is_active_sidebar('footercol' . $i)) {

                        switch ($i) {
                            case 1:
                            $footerClasses = 'col-sm-6 col-lg-3';
                            break;
                            case 2:
                            $footerClasses = 'col-sm-6 col-lg-4 col-xl-3 order-sm-3 order-lg-2 pt-5 pt-lg-0';
                            break;
                            case 3:
                            $footerClasses = 'col-sm-6 col-lg col-xl-3 ml-xl-3 pl-lg-0 pl-xl-4 order-sm-2';
                            break;
                            case 4:
                            $footerClasses = 'col-sm-6 col-lg offset-xl-1 pr-lg-0 order-sm-4 pt-sm-5 pt-lg-0 pl-lg-0';
                            break;
                            
                        }
                        ?>
            <div class="<?= $footerClasses; ?>">
                <?php dynamic_sidebar('footercol'.$i); ?>
            </div>
            <?php
                    }
                }
                ?>

        </div>

    </div>

</div><!-- #wrapper-footercols -->

<?php endif; ?>