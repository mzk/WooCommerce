<?php
/**
 * Class Latte_Engine_Factory
 *
 * @package Packetery
 */

declare( strict_types=1 );


namespace Packetery;

/**
 * Class Latte_Engine_Factory
 *
 * @package Packetery
 */
class Latte_Engine_Factory {

	/**
	 * Creates latte engine factory
	 *
	 * @param string $temp_dir Temporary folder.
	 *
	 * @return \Latte\Engine
	 */
	public function create( string $temp_dir ) {
		$engine = new \Latte\Engine();
		$engine->setTempDirectory( $temp_dir );
		return $engine;
	}
}
