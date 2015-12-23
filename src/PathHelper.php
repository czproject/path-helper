<?php
	/**
	 * @author  Jan Pecha, <janpecha@email.cz>
	 * @license BSD-3 (see license.md file)
	 */

	namespace CzProject;

	class PathHelper
	{
		/**
		 * @param  string
		 * @param  string
		 * @return string  relative path
		 */
		public static function createRelativePath($source, $destination)
		{
			$source = ltrim($source, '/');
			$destination = ltrim($destination, '/');

			$source = explode('/', $source);
			$sourceCount = count($source);
			$destination = explode('/', $destination);

			// remove first same parts
			$iter = 0;
			foreach ($source as $index => $part) {
				if (isset($destination[$index - $iter]) && $destination[$index - $iter] === $source[$index]) {
					array_shift($destination);
					$sourceCount--;
					$iter++;
					continue;
				}
				break;
			}

			$destinationCount = count($destination);
			$padLeft = $sourceCount - 1;

			if ($padLeft < 0) {
				array_unshift($destination, end($source));
			} else {
				$padLeft += (!$destinationCount) ? 1 : 0;

				if ($destinationCount === 1 && $destination[0] === '') { // remove empty '' (prevents '../', gets '..')
					$destination = array();
					$destinationCount = 0;
				} elseif ($destinationCount === 0) {
					end($source);
					$k = $sourceCount - $destinationCount;
					while ($k) {
						$part = prev($source);
						$k--;
					}
					$destination = array($part);
					$padLeft++;
				}

				$destination = array_pad($destination, ($destinationCount + $padLeft) * -1, '..');
			}

			$destination = implode('/', $destination);
			return $destination !== '' ? $destination : '.';
		}


		/**
		 * @param  string
		 * @param  string
		 * @return boolean
		 */
		public static function isPathCurrent($currentPath, $mask)
		{
			// $path muze obsahovat wildcard (*)
			// Priklady:
			// */contact.html => about/contact.html, ale ne en/about/contact.html
			// en/*/index.html => en/about/index.html, ale ne en/about/references/index.html
			// (tj. nematchuje '/')
			// ALE!
			// about/* => about/index.html i about/references/index.html
			// (tj. wildcard na konci matchuje i '/')

			$currentPath = ltrim($currentPath, '/');
			$mask = ltrim(trim($mask), '/');

			if ($mask === '*') {
				return TRUE;
			}

			// build pattern
			$pattern = strtr(preg_quote($mask, '#'), array(
				'\*\*' => '.*',
				'\*' => '[^/]*',
			));

			// match
			return (bool) preg_match('#^' . $pattern . '\z#i', $currentPath);
		}


		/**
		 * Generates absolute path (resolves '..' and '.' parts)
		 * @param  string
		 * @return string
		 */
		public static function absolutizePath($path, $prefix = '/')
		{
			$path = explode('/', $path);
			$buffer = array();

			foreach ($path as $part) {
				if ($part === '' || $part === '.') { // // || /./
					continue;
				} elseif ($part === '..') { // /../
					array_pop($buffer);
				} else {
					$buffer[] = $part;
				}
			}

			return $prefix . implode('/', $buffer);
		}
	}
