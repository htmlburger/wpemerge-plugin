<?php
/**
 * An example view.
 *
 * Layout: layouts/example.php
 *
 * @package MyApp
 */

?>
<div class="myapp__view">
	<?php \MyApp::render( 'partials/example', [ 'message' => __( 'Hello World!', 'myapp' ) ] ); ?>
</div>
