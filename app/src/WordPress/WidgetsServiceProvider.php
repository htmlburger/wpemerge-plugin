<?php

namespace MyApp\WordPress;

use WPEmerge\ServiceProviders\ServiceProviderInterface;

/**
 * Register widgets.
 */
class WidgetsServiceProvider implements ServiceProviderInterface {
	/**
	 * {@inheritDoc}
	 */
	public function register( $container ) {
		// Nothing to register.
	}

	/**
	 * {@inheritDoc}
	 */
	public function bootstrap( $container ) {
		add_action( 'widgets_init', [$this, 'registerWidgets'] );
	}

	/**
	 * Register widgets.
	 *
	 * @return void
	 */
	public function registerWidgets() {
		// phpcs:ignore
		// register_widget( MyWidgetClass::class );
	}
}
