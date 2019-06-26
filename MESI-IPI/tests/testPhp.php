<?php
require ("../vendor/doctrine/orm/lib/Doctrine/ORM/Tools/SchemaValidator.php");
use Doctrine\ORM\Tools\SchemaValidator;
$validator = new SchemaValidator($entityManager);
$errors = $validator->validateMapping();
if (count($errors) > 0) {
    echo implode("\n\n", $errors);
}