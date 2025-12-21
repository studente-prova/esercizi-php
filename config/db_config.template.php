<?php
/**
 * Template di configurazione database
 * 
 * Copia questo file in db_config_local.php e modifica con le tue credenziali
 * db_config_local.php è nel .gitignore per sicurezza
 */

// Configurazione database
define('DB_HOST', 'localhost');
define('DB_USER', 'tuo_username');
define('DB_PASS', 'tua_password');
define('DB_NAME', 'esercizi_php');
define('DB_CHARSET', 'utf8mb4');

/**
 * Funzione per creare connessione al database
 * 
 * @return mysqli|false Oggetto mysqli o false in caso di errore
 */
function connetti_database() {
    // Crea connessione
    $conn = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);
    
    // Verifica connessione
    if (!$conn) {
        die("Errore di connessione: " . mysqli_connect_error());
    }
    
    // Imposta charset
    mysqli_set_charset($conn, DB_CHARSET);
    
    return $conn;
}

/**
 * Funzione per chiudere connessione al database
 * 
 * @param mysqli $conn Connessione da chiudere
 * @return void
 */
function chiudi_database($conn) {
    if ($conn) {
        mysqli_close($conn);
    }
}
?>
