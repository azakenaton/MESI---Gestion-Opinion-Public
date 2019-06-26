<?php
/**
 * Singleton wrapper for Doctrine\ORM\EntityManager
 */

namespace App\Entity;


class EntityManager {
	private static $instance;

	private function __construct($entityManager) {
		self::$instance = $entityManager;
	}

	public static function getInstance() {
		if (!isset(self::$instance)) {
			$entityManager = require join(DIRECTORY_SEPARATOR, [__DIR__, '..', '..', 'config', 'bootstrap.php']);
			new self($entityManager);
		}

		return self::$instance;
	}
}