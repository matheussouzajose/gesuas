<?php
declare(strict_types=1);

/**
 * DATABASE
 */
define("CONF_DB_HOST", getenv("DB_HOST"));
define("CONF_DB_USER", getenv("DB_USERNAME"));
define("CONF_DB_PASS", getenv("DB_PASSWORD"));
define("CONF_DB_NAME", getenv("DB_DATABASE"));

/**
 * PROJECT URLs
 */
define("CONF_URL_BASE", getenv("URL_BASE"));
define("CONF_URL_TEST", getenv("URL_TEST"));