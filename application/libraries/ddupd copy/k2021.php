<?php
define("AUS_ROOT_URL", "https://upd.mashen.id");
define("AUS_PRODUCT_ID", 1);
define("AUS_PRODUCT_KEY", "fbW3NMXAwhmoneX8");
define("AUS_CONNECTION_TIMEOUT", 60);
define("AUS_NOTIFICATION_NO_CONNECTION", "11");
define("AUS_NOTIFICATION_ZIPARCHIVE_CLASS_MISSING", "ZipArchive class harus diinstall di server");
define("AUS_NOTIFICATION_ZIP_EXTRACT_ERROR", "Tidak bisa mencopy file update");
define("AUS_NOTIFICATION_ZIP_DELETE_ERROR", "Ada Error menghapus update");
define("AUS_DELETE_EXTRACTED", "YES");
define("AUS_CORE_NOTIFICATION_INVALID_ROOT_URL", "Configuration error: invalid root URL of PHP Auto Update Script installation");
define("AUS_CORE_NOTIFICATION_INVALID_PRODUCT_ID", "Configuration error: invalid product ID");
define("AUS_CORE_NOTIFICATION_INVALID_PRODUCT_KEY", "Configuration error: invalid product key");
define("APL_CORE_NOTIFICATION_INVALID_PERMISSIONS", "Configuration error: invalid root directory permissions");
define("AUS_CORE_NOTIFICATION_INACCESSIBLE_ROOT_URL", "Server error: impossible to establish connection to your PHP Auto Update Script installation");

$dir=getcwd();
define("AUS_DIRECTORY",$dir);

