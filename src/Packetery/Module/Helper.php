<?php
/**
 * Class Helper
 *
 * @package Packetery\Module
 */

declare( strict_types=1 );

namespace Packetery\Module;

use Automattic\WooCommerce\Utilities\OrderUtil;
use WC_Payment_Gateway;

/**
 * Class Helper
 *
 * @package Packetery\Module
 */
class Helper {

	/**
	 * Callback for array filter. Returns true if gateway is of correct type.
	 *
	 * @param object $gateway Gateway to check.
	 *
	 * @return bool
	 */
	protected static function filterValidGatewayClass( object $gateway ): bool {
		return $gateway instanceof WC_Payment_Gateway;
	}

	/**
	 * Get available gateways.
	 *
	 * @return WC_Payment_Gateway[]
	 */
	public static function getAvailablePaymentGateways(): array {
		$availableGateways = [];

		foreach ( WC()->payment_gateways()->payment_gateways() as $gateway ) {
			if ( 'yes' === $gateway->enabled ) {
				$availableGateways[ $gateway->id ] = $gateway;
			}
		}

		return array_filter( $availableGateways, [ __CLASS__, 'filterValidGatewayClass' ] );
	}

	/**
	 * Gets available payment gateway choices.
	 *
	 * @return array
	 */
	public static function getAvailablePaymentGatewayChoices(): array {
		$items = [];

		foreach ( self::getAvailablePaymentGateways() as $paymentGateway ) {
			$items[ $paymentGateway->id ] = $paymentGateway->get_method_title();
		}

		return $items;
	}

	/**
	 * Gets order detail url.
	 *
	 * @param int $orderId Order ID.
	 *
	 * @return string
	 */
	public static function getOrderDetailUrl( int $orderId ): string {
		$queryVars = [];

		if ( self::isHposEnabled() ) {
			$queryVars['page'] = 'wc-orders';
			$queryVars['id']   = $orderId;
			$path              = 'admin.php';
		} else {
			$queryVars['post_type'] = 'shop_order';
			$queryVars['post']      = $orderId;
			$path                   = 'post.php';
		}

		$queryVars['action'] = 'edit';

		return add_query_arg( $queryVars, admin_url( $path ) );
	}

	/**
	 * Gets order grid url.
	 *
	 * @param array $queryVars Query vars.
	 *
	 * @return string
	 */
	public static function getOrderGridUrl( array $queryVars = [] ): string {
		if ( self::isHposEnabled() ) {
			$queryVars['page'] = 'wc-orders';
			$path              = 'admin.php';
		} else {
			$queryVars['post_type'] = 'shop_order';
			$path                   = 'edit.php';
		}

		return add_query_arg( $queryVars, admin_url( $path ) );
	}

	/**
	 * Tells if plugin is active.
	 *
	 * @param string $pluginRelativePath Relative path of plugin bootstrap file.
	 *
	 * @return bool
	 */
	public static function isPluginActive( string $pluginRelativePath ): bool {
		if ( is_multisite() ) {
			$plugins = get_site_option( 'active_sitewide_plugins' );
			if ( isset( $plugins[ $pluginRelativePath ] ) ) {
				return true;
			}
		}

		if ( ! function_exists( 'get_mu_plugins' ) ) {
			require_once ABSPATH . 'wp-admin/includes/plugin.php';
		}

		$muPlugins = get_mu_plugins();
		if ( isset( $muPlugins[ $pluginRelativePath ] ) ) {
			return true;
		}

		return in_array( $pluginRelativePath, (array) get_option( 'active_plugins', [] ), true );
	}

	/**
	 * Introduced as ManageWP Worker plugin hack fix.
	 *
	 * @return void
	 */
	public static function transformGlobalCookies(): void {
		if ( empty( $_COOKIE ) ) {
			return;
		}
		foreach ( $_COOKIE as $key => $value ) {
			// @codingStandardsIgnoreStart
			if ( is_int( $value ) ) {
				$_COOKIE[ $key ] = (string) $value;
			}
			// @codingStandardsIgnoreEnd
		}
	}

	/**
	 * Gets WooCommerce version.
	 *
	 * @return string|null
	 */
	public static function getWooCommerceVersion(): ?string {
		if ( false === file_exists( WP_PLUGIN_DIR . '/woocommerce/woocommerce.php' ) ) {
			return null;
		}

		$version = get_file_data( WP_PLUGIN_DIR . '/woocommerce/woocommerce.php', [ 'Version' => 'Version' ], 'plugin' )['Version'];
		if ( ! $version ) {
			return null;
		}

		return $version;
	}

	/**
	 * Renders string.
	 *
	 * @param string $string String to render.
	 *
	 * @return void
	 */
	public static function renderString( string $string ): void {
		// phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
		echo $string;
	}

	/**
	 * Gets country from WC order.
	 *
	 * @param \WC_Order $wcOrder WC order.
	 *
	 * @return string May be empty.
	 */
	public static function getWcOrderCountry( \WC_Order $wcOrder ): string {
		$country = $wcOrder->get_shipping_country();
		if ( empty( $country ) ) {
			$country = $wcOrder->get_billing_country();
		}

		return strtolower( $country );
	}

	/**
	 * Tells if High Performance Order Storage is enabled.
	 *
	 * @return bool
	 */
	public static function isHposEnabled(): bool {
		if ( false === class_exists( 'Automattic\\WooCommerce\\Utilities\\OrderUtil' ) ) {
			return false;
		}

		if ( false === method_exists( OrderUtil::class, 'custom_orders_table_usage_is_enabled' ) ) {
			return false;
		}

		return OrderUtil::custom_orders_table_usage_is_enabled();
	}
}
