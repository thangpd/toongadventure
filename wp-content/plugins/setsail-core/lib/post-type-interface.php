<?php

namespace SetSailCore\Lib;

/**
 * interface PostTypeInterface
 * @package SetSailCore\Lib;
 */
interface PostTypeInterface {
	/**
	 * @return string
	 */
	public function getBase();
	
	/**
	 * Registers custom post type with WordPress
	 */
	public function register();
}