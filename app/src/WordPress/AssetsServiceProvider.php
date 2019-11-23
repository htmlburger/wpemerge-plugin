<?php

namespace MyApp\WordPress;

use WPEmerge\ServiceProviders\ServiceProviderInterface;

/**
 * Register and enqueues assets.
 */
class AssetsServiceProvider implements ServiceProviderInterface
{
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
		add_action( 'wp_enqueue_scripts', [$this, 'enqueueFrontendAssets'] );
		add_action( 'admin_enqueue_scripts', [$this, 'enqueueAdminAssets'] );
	}

	/**
	 * Enqueue frontend assets.
	 *
	 * @return void
	 */
	public function enqueueFrontendAssets() {
		// Enqueue the built-in comment-reply script for singular pages.
		if ( is_singular() ) {
			wp_enqueue_script( 'comment-reply' );
		}

		// Enqueue scripts.
		\MyApp::core()->assets()->enqueueScript(
			'theme-js-bundle',
			\MyApp::core()->assets()->getBundleUrl( 'frontend', '.js' ),
			[ 'jquery' ],
			true
		);

		// Enqueue styles.
		$style = \MyApp::core()->assets()->getBundleUrl( 'frontend', '.css' );

		if ( $style ) {
			\MyApp::core()->assets()->enqueueStyle(
				'theme-css-bundle',
				$style
			);
		}
	}

	/**
	 * Enqueue admin assets.
	 *
	 * @return void
	 */
	public function enqueueAdminAssets() {
		// Enqueue scripts.
		\MyApp::core()->assets()->enqueueScript(
			'theme-admin-js-bundle',
			\MyApp::core()->assets()->getBundleUrl( 'admin', '.js' ),
			[ 'jquery' ],
			true
		);

		// Enqueue styles.
		$style = \MyApp::core()->assets()->getBundleUrl( 'admin', '.css' );

		if ( $style ) {
			\MyApp::core()->assets()->enqueueStyle(
				'theme-admin-css-bundle',
				$style
			);
		}
	}
}
