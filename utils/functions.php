<?php
/**
 * Utility e funzioni comuni per gli esercizi
 */

/**
 * Sanitizza input HTML per prevenire XSS
 * 
 * @param string $data Input da sanitizzare
 * @return string Input sanitizzato
 */
function pulisci_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data, ENT_QUOTES, 'UTF-8');
    return $data;
}

/**
 * Valida indirizzo email
 * 
 * @param string $email Email da validare
 * @return bool True se valida, false altrimenti
 */
function valida_email($email) {
    return filter_var($email, FILTER_VALIDATE_EMAIL) !== false;
}

/**
 * Valida data nel formato YYYY-MM-DD
 * 
 * @param string $data Data da validare
 * @return bool True se valida, false altrimenti
 */
function valida_data($data) {
    $d = DateTime::createFromFormat('Y-m-d', $data);
    return $d && $d->format('Y-m-d') === $data;
}

/**
 * Formatta data da YYYY-MM-DD a formato italiano DD/MM/YYYY
 * 
 * @param string $data Data in formato YYYY-MM-DD
 * @return string Data in formato DD/MM/YYYY
 */
function formatta_data_italiana($data) {
    if (!$data) return '';
    $d = DateTime::createFromFormat('Y-m-d', $data);
    return $d ? $d->format('d/m/Y') : $data;
}

/**
 * Genera messaggio di errore formattato
 * 
 * @param string $messaggio Messaggio di errore
 * @return string HTML del messaggio di errore
 */
function mostra_errore($messaggio) {
    return '<div class="alert alert-danger">' . pulisci_input($messaggio) . '</div>';
}

/**
 * Genera messaggio di successo formattato
 * 
 * @param string $messaggio Messaggio di successo
 * @return string HTML del messaggio di successo
 */
function mostra_successo($messaggio) {
    return '<div class="alert alert-success">' . pulisci_input($messaggio) . '</div>';
}

/**
 * Debug: stampa array o oggetto in modo leggibile
 * 
 * @param mixed $var Variabile da visualizzare
 * @return void
 */
function debug($var) {
    echo '<pre>';
    print_r($var);
    echo '</pre>';
}

/**
 * Esegue query SELECT e ritorna array associativo
 * 
 * ⚠️ ATTENZIONE: Questa funzione NON usa prepared statements.
 * Usare SOLO con query statiche senza input utente.
 * Per query con parametri utente, usare sempre mysqli_prepare().
 * 
 * @param mysqli $conn Connessione database
 * @param string $query Query SQL STATICA (senza input utente)
 * @return array Array di risultati
 * 
 * @example
 * // ✅ OK - Query statica
 * $studenti = esegui_query($conn, "SELECT * FROM studenti");
 * 
 * // ❌ MAI fare così - Rischio SQL injection
 * // $id = $_GET['id'];
 * // $studenti = esegui_query($conn, "SELECT * FROM studenti WHERE id = $id");
 */
function esegui_query($conn, $query) {
    $risultato = mysqli_query($conn, $query);
    
    if (!$risultato) {
        // In produzione, loggare l'errore invece di mostrarlo
        error_log("Errore query: " . mysqli_error($conn));
        die("Si è verificato un errore nel recupero dei dati.");
    }
    
    $dati = array();
    while ($riga = mysqli_fetch_assoc($risultato)) {
        $dati[] = $riga;
    }
    
    return $dati;
}

/**
 * Esegue query SELECT con prepared statement in modo sicuro
 * 
 * @param mysqli $conn Connessione database
 * @param string $query Query SQL con placeholder (?)
 * @param string $types Stringa dei tipi parametri (i=integer, s=string, d=double, b=blob)
 * @param array $params Array dei parametri
 * @return array Array di risultati
 * 
 * @example
 * // Query con un parametro
 * $result = esegui_query_sicura($conn, 
 *     "SELECT * FROM studenti WHERE id = ?", 
 *     "i", 
 *     [$id]
 * );
 * 
 * // Query con multipli parametri
 * $result = esegui_query_sicura($conn,
 *     "SELECT * FROM studenti WHERE nome = ? AND citta = ?",
 *     "ss",
 *     [$nome, $citta]
 * );
 */
function esegui_query_sicura($conn, $query, $types, $params) {
    $stmt = mysqli_prepare($conn, $query);
    
    if (!$stmt) {
        error_log("Errore preparazione query: " . mysqli_error($conn));
        die("Si è verificato un errore nel recupero dei dati.");
    }
    
    // Bind dei parametri usando riferimenti
    $bind_params = array($types);
    for ($i = 0; $i < count($params); $i++) {
        $bind_params[] = &$params[$i];
    }
    call_user_func_array(array($stmt, 'bind_param'), $bind_params);
    
    // Esegui query
    mysqli_stmt_execute($stmt);
    
    // Ottieni risultato
    $result = mysqli_stmt_get_result($stmt);
    
    $dati = array();
    while ($riga = mysqli_fetch_assoc($result)) {
        $dati[] = $riga;
    }
    
    mysqli_stmt_close($stmt);
    
    return $dati;
}

/**
 * Redirect a un'altra pagina
 * 
 * @param string $url URL di destinazione
 * @return void
 */
function redirect($url) {
    header("Location: $url");
    exit();
}
?>
