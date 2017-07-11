<?php

// Database Constants

$environment_testing = false;

if($environment_testing)
{
    defined('DB_SERVER') ? null : define("DB_SERVER", "db560859270.db.1and1.com");
    defined('DB_USER')   ? null : define("DB_USER", "dbo560859270");
    defined('DB_PASS')   ? null : define("DB_PASS", "alphateam01");
    defined('DB_NAME')   ? null : define("DB_NAME", "db560859270");
}
else
{
    defined('DB_SERVER') ? null : define("DB_SERVER", "db560859270.db.1and1.com");
    defined('DB_USER')   ? null : define("DB_USER", "dbo560859270");
    defined('DB_PASS')   ? null : define("DB_PASS", "alphateam01");
    defined('DB_NAME')   ? null : define("DB_NAME", "db560859270");
}

?>