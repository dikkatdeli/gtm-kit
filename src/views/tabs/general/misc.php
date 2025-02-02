<?php
/**
 * GTM Kit plugin file.
 *
 * @package GTM Kit
 */

namespace TLA_Media\GTM_Kit;

use TLA_Media\GTM_Kit\Admin\OptionsForm;

/** @var OptionsForm $form */ // phpcs:ignore
/** @var array $tab_data */ // phpcs:ignore

if ( ! defined( 'GTMKIT_VERSION' ) ) {
	header( 'Status: 403 Forbidden' );
	header( 'HTTP/1.1 403 Forbidden' );
	exit();
}

$site_data = $tab_data['site_data']
?>
<div class="gtmkit-setting-row gtmkit-setting-row-heading gtmkit-clear">
	<h2>
		<?php esc_html_e( 'Misc', 'gtm-kit' ); ?>
	</h2>
</div>

<div class="gtmkit_section_message">
	<div class="stuffbox">
		<h3 class="hndle"><?php esc_html_e( 'Help improve GTM Kit', 'gtm-kit' ); ?></h3>
		<div class="inside">
			<p>
				<?php esc_html_e( 'GTM Kit is used together with a wide variety of server configurations and plugins. It is very helpful for us to know what some of these configurations are so we can test the most common configurations.', 'gtm-kit' ); ?>
			</p>
			<p>
				<?php esc_html_e( 'You can help by sharing anonymous data with us.', 'gtm-kit' ); ?>
				<?php esc_html_e( 'Below is a detailed view of all data GTM Kit will collect if granted permission:', 'gtm-kit' ); ?>
			</p>
			<?php if ( $site_data ) : ?>
				<table class="gtmkit-data-table widefat striped">
					<tbody>
					<tr>
						<td class="column-primary"><?php printf( '<strong>%s</strong>', esc_html__( 'Server type:', 'gtm-kit' ) ); ?></td>
						<td><?php printf( '<code>%s</code>', esc_html( $site_data['web_server'] ) ); ?></td>
					</tr>
					<tr>
						<td class="column-primary"><?php printf( '<strong>%s</strong>', esc_html__( 'PHP version number:', 'gtm-kit' ) ); ?></td>
						<td><?php printf( '<code>%s</code>', esc_html( $site_data['php_version'] ) ); ?></td>
					</tr>
					<tr>
						<td class="column-primary"><?php printf( '<strong>%s</strong>', esc_html__( 'WordPress version number:', 'gtm-kit' ) ); ?></td>
						<td><?php printf( '<code>%s</code>', esc_html( $site_data['wordpress_version'] ) ); ?></td>
					</tr>
					<?php if ( isset( $site_data['woocommerce_version'] ) ) : ?>
						<tr>
							<td class="column-primary"><?php printf( '<strong>%s</strong>', esc_html__( 'WooCommerce version number:', 'gtm-kit' ) ); ?></td>
							<td><?php printf( '<code>%s</code>', esc_html( $site_data['woocommerce_version'] ) ); ?></td>
						</tr>
					<?php endif; ?>
					<?php if ( isset( $site_data['edd_version'] ) ) : ?>
						<tr>
							<td class="column-primary"><?php printf( '<strong>%s</strong>', esc_html__( 'Easy Digital Downloads version number:', 'gtm-kit' ) ); ?></td>
							<td><?php printf( '<code>%s</code>', esc_html( $site_data['edd_version'] ) ); ?></td>
						</tr>
					<?php endif; ?>
					<tr>
						<td class="column-primary"><?php printf( '<strong>%s</strong>', esc_html__( 'WordPress multisite:', 'gtm-kit' ) ); ?></td>
						<td><?php printf( '<code>%s</code>', esc_html( $site_data['multisite'] ? 'true' : 'false' ) ); ?></td>
					</tr>
					<tr>
						<td class="column-primary"><?php printf( '<strong>%s</strong>', esc_html__( 'Current theme:', 'gtm-kit' ) ); ?></td>
						<td><?php printf( '<code>%s</code>', esc_html( $site_data['current_theme'] ) ); ?></td>
					</tr>
					<tr>
						<td class="column-primary"><?php printf( '<strong>%s</strong>', esc_html__( 'Current site language:', 'gtm-kit' ) ); ?></td>
						<td><?php printf( '<code>%s</code>', esc_html( $site_data['locale'] ) ); ?></td>
					</tr>
					<tr>
						<td class="column-primary"><?php printf( '<strong>%s</strong>', esc_html__( 'Active plugins:', 'gtm-kit' ) ); ?></td>
						<td><?php printf( '<em>%s</em>', esc_html__( 'Plugin names of all active plugins', 'gtm-kit' ) ); ?></td>
					</tr>
					<tr>
						<td class="column-primary"><?php printf( '<strong>%s</strong>', esc_html__( 'Anonymized GTM Kit settings:', 'gtm-kit' ) ); ?></td>
						<td><?php printf( '<em>%s</em>', esc_html__( 'Which GTM Kit settings are active', 'gtm-kit' ) ); ?></td>
					</tr>
					</tbody>
				</table>
			<?php endif; ?>
			<p>
				<?php esc_html_e( "GTM Kit will never transmit any domain names or container ID's.", 'gtm-kit' ); ?>
			</p>

		</div>
	</div>
</div>
<?php
$form->setting_row(
	'checkbox-toggle',
	'analytics_active',
	__( 'Share anonymous data', 'gtm-kit' ),
	[],
	__( 'I agree to share anonymous data with the development team to help improve GTM Kit.', 'gtm-kit' )
);
?>

<?php
$form->setting_row(
	'checkbox-toggle',
	'console_log',
	__( 'Console log', 'gtm-kit' ),
	[],
	__( 'Log helpful messages and warnings to the browser log.', 'gtm-kit' )
);
?>
