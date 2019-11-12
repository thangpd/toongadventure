<?php
namespace SetSailTours\Lib;

/**
 * interface PostTypeInterface
 * @package SetSailTours\Lib;
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