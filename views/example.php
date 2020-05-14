<?php
/**
 * An example view.
 *
 * Layout: layouts/example.php
 *
 * @package MyApp
 */

?>
<div class="my_app__view">
	<?php \MyApp::render( 'partials/example', [ 'message' => __( 'Hello World!', 'my_app' ) ] ); ?>
</div>
