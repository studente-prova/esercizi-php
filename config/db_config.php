<?php
/**
 * Caricatore configurazione database
 * 
 * Questo file cerca prima db_config_local.php (con credenziali reali)
 * e se non esiste, carica db_config.template.php (per scopi didattici)
 */

// Percorso base della configurazione
$config_dir = __DIR__;

// Prova a caricare la configurazione locale (preferita)
if (file_exists($config_dir . '/db_config_local.php')) {
    require_once $config_dir . '/db_config_local.php';
} else {
    // Fallback al template per scopi didattici/test
    require_once $config_dir . '/db_config.template.php';
    
    // Mostra avviso se si sta usando il template
    if (!defined('SUPPRESS_CONFIG_WARNING')) {
        trigger_error(
            'AVVISO: Si sta usando db_config.template.php. ' .
            'Per l\'uso in produzione, copia questo file in db_config_local.php ' .
            'e configura le tue credenziali database.',
            E_USER_NOTICE
        );
    }
}
?>
