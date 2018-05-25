<?php
/**
 * Part of the Joomla Framework Google Package
 *
 * @copyright  Copyright (C) 2005 - 2018 Open Source Matters, Inc. All rights reserved.
 * @license    GNU General Public License version 2 or later; see LICENSE
 */

namespace Joomla\Google;

use Joomla\Uri\Uri;

/**
 * Google API object class for the Joomla Framework.
 *
 * @since       1.0
 * @deprecated  The joomla/google package is deprecated
 */
abstract class Embed
{
	/**
	 * Options for the Google data object.
	 *
	 * @var    array
	 * @since  1.0
	 */
	protected $options;

	/**
	 * URI of the page being rendered.
	 *
	 * @var    Uri
	 * @since  1.0
	 */
	protected $uri;

	/**
	 * Constructor.
	 *
	 * @param   array|\ArrayAccess  $options  Google options object
	 * @param   Uri                 $uri      URL of the page being rendered
	 *
	 * @since   1.0
	 */
	public function __construct($options = array(), Uri $uri = null)
	{
		if (!is_array($options) && !($options instanceof \ArrayAccess))
		{
			throw new \InvalidArgumentException(
				'The options param must be an array or implement the ArrayAccess interface.'
			);
		}

		$this->options = $options;
		$this->uri = $uri ? $uri : new Uri;
	}

	/**
	 * Method to retrieve the javascript header for the embed API
	 *
	 * @return  string  The header
	 *
	 * @since   1.0
	 */
	public function isSecure()
	{
		return $this->uri->getScheme() == 'https';
	}

	/**
	 * Method to retrieve the header for the API
	 *
	 * @return  string  The header
	 *
	 * @since   1.0
	 */
	abstract public function getHeader();

	/**
	 * Method to retrieve the body for the API
	 *
	 * @return  string  The body
	 *
	 * @since   1.0
	 */
	abstract public function getBody();

	/**
	 * Method to output the javascript header for the embed API
	 *
	 * @return  void
	 *
	 * @since   1.0
	 */
	public function echoHeader()
	{
		echo $this->getHeader();
	}

	/**
	 * Method to output the body for the API
	 *
	 * @return  void
	 *
	 * @since   1.0
	 */
	public function echoBody()
	{
		echo $this->getBody();
	}

	/**
	 * Get an option from the Embed instance.
	 *
	 * @param   string  $key  The name of the option to get.
	 *
	 * @return  mixed  The option value.
	 *
	 * @since   1.0
	 */
	public function getOption($key)
	{
		return isset($this->options[$key]) ? $this->options[$key] : null;
	}

	/**
	 * Set an option for the Embed instance.
	 *
	 * @param   string  $key    The name of the option to set.
	 * @param   mixed   $value  The option value to set.
	 *
	 * @return  Embed  This object for method chaining.
	 *
	 * @since   1.0
	 */
	public function setOption($key, $value)
	{
		$this->options[$key] = $value;

		return $this;
	}
}
