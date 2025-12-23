<?php
/**
 * ============================================================================
 * CONFIGURAZIONE DATABASE - Esercizi PHP
 * ============================================================================
 * 
 * ISTRUZIONI RAPIDE:
 * 
 * 1. XAMPP su Windows (laboratorio/casa):
 *    - DB_USER: 'root'
 *    - DB_PASS: '' (vuoto)
 *    - DB_NAME: 'esercizi_php'
 * 
 * 2. Altervista:
 *    - DB_USER: 'tuousername' (il tuo username Altervista)
 *    - DB_PASS: 'tuapassword' (la tua password database)
 *    - DB_NAME: 'my_tuousername' (my_ seguito dal tuo username)
 * 
 * 3. Linux/Mac (LAMP/MAMP):
 *    - Configura secondo la tua installazione
 * 
 * IMPORTANTE: Questo file contiene credenziali. NON condividerlo pubblicamente!
 * ============================================================================
 */

// ===== CONFIGURAZIONE DATABASE =====
// Modifica SOLO questi valori con le tue credenziali

define('DB_HOST', 'localhost');
define('DB_USER', 'root');              // Cambia con il tuo username
define('DB_PASS', '');                  // Cambia con la tua password
define('DB_NAME', 'esercizi_php');      // Cambia con il nome del tuo database
define('DB_CHARSET', 'utf8mb4');

// ===== FUNZIONI DATABASE (NON MODIFICARE) =====

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
