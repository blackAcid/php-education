<?php
error_reporting(E_ALL | E_STRICT);
ini_set('display_errors', 1);

function shutdown() {
    $error = error_get_last();
    if (
        is_array($error) &&
        in_array($error['type'], array(E_ERROR, E_PARSE, E_CORE_ERROR, E_COMPILE_ERROR))) {
        // fatal error has occurred
        while (ob_get_level()) {
            ob_end_clean();
        }
        echo "Sorry, we meet the error:<br/><pre>";
        var_dump($error);
        echo "</pre>";
    }
}

register_shutdown_function('shutdown');

require_once 'error.php';
 