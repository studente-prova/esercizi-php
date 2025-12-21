# Best Practices - PHP/MySQLi Procedurale

## 🔒 Sicurezza

### 1. Prepared Statements
**SEMPRE** utilizzare prepared statements per prevenire SQL injection:

```php
// ❌ NON FARE MAI COSÌ (vulnerabile a SQL injection)
$id = $_GET['id'];
$query = "SELECT * FROM studenti WHERE id = $id";
$result = mysqli_query($conn, $query);

// ✅ CORRETTO - Usa prepared statement
$id = $_GET['id'];
$stmt = mysqli_prepare($conn, "SELECT * FROM studenti WHERE id = ?");
mysqli_stmt_bind_param($stmt, "i", $id);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);
```

### 2. Validazione e Sanitizzazione Input

```php
// Sanitizza sempre l'input
$nome = pulisci_input($_POST['nome']);

// Valida specificamente per il tipo di dato
if (!valida_email($email)) {
    $errore = "Email non valida";
}

// Usa filter_var per ulteriore validazione
$email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
```

### 3. Password Hashing

```php
// ✅ Salva password in modo sicuro
$password_hash = password_hash($password, PASSWORD_DEFAULT);

// ✅ Verifica password
if (password_verify($password_inserita, $password_hash)) {
    // Login riuscito
}
```

### 4. Protezione XSS

```php
// Sempre escape output HTML
echo htmlspecialchars($variabile, ENT_QUOTES, 'UTF-8');

// Usa la funzione pulisci_input() fornita in utils
echo pulisci_input($input_utente);
```

### 5. Gestione Sessioni Sicure

```php
// Inizia sessione in modo sicuro
session_start([
    'cookie_httponly' => true,
    'cookie_secure' => true, // Solo se usi HTTPS
    'cookie_samesite' => 'Strict'
]);

// Rigenera ID sessione dopo login
session_regenerate_id(true);
```

## 📝 Codice Pulito

### 1. Indentazione e Formattazione

```php
// ✅ Indentazione consistente (4 spazi)
if ($condizione) {
    foreach ($array as $elemento) {
        echo $elemento;
    }
}

// ✅ Spazi attorno agli operatori
$somma = $a + $b;
$risultato = ($x > 0) ? 'positivo' : 'negativo';
```

### 2. Nomi Variabili Descrittivi

```php
// ❌ Evita
$d = date('Y-m-d');
$n = count($arr);

// ✅ Usa nomi descrittivi
$data_corrente = date('Y-m-d');
$numero_studenti = count($studenti);
```

### 3. Commenti Utili

```php
// ✅ Commenta il perché, non il cosa
// Verifica età minima perché il corso richiede 18 anni
if ($eta < 18) {
    $errore = "Età minima non raggiunta";
}

// ✅ Commenta funzioni complesse
/**
 * Calcola la media ponderata dei voti dello studente
 * considerando i crediti di ciascun corso
 * 
 * @param int $studente_id ID dello studente
 * @return float Media ponderata
 */
function calcola_media_ponderata($studente_id) {
    // ...
}
```

### 4. Separazione delle Responsabilità

```php
// ✅ Separa logica da presentazione
// File: logica.php
function ottieni_studenti($conn) {
    $query = "SELECT * FROM studenti";
    return esegui_query($conn, $query);
}

// File: vista.php
<?php
require_once 'logica.php';
$studenti = ottieni_studenti($conn);
?>
<table>
    <?php foreach ($studenti as $studente): ?>
        <tr><td><?= htmlspecialchars($studente['nome']) ?></td></tr>
    <?php endforeach; ?>
</table>
```

## 🗄️ Database

### 1. Gestione Connessioni

```php
// ✅ Apri connessione solo quando necessario
$conn = connetti_database();

// Esegui operazioni
$result = mysqli_query($conn, $query);

// ✅ Chiudi sempre la connessione
chiudi_database($conn);
```

### 2. Gestione Errori

```php
// ✅ Controlla sempre il risultato
$result = mysqli_query($conn, $query);
if (!$result) {
    error_log("Errore query: " . mysqli_error($conn));
    die("Si è verificato un errore. Riprova più tardi.");
}

// ✅ Usa transazioni per operazioni multiple
mysqli_begin_transaction($conn);
try {
    mysqli_query($conn, $query1);
    mysqli_query($conn, $query2);
    mysqli_commit($conn);
} catch (Exception $e) {
    mysqli_rollback($conn);
    error_log("Errore transazione: " . $e->getMessage());
}
```

### 3. Query Ottimizzate

```php
// ❌ Evita query in loop (N+1 problem)
foreach ($studenti as $studente) {
    $query = "SELECT * FROM corsi WHERE studente_id = " . $studente['id'];
    // ...
}

// ✅ Usa JOIN
$query = "SELECT s.*, c.nome as nome_corso 
          FROM studenti s 
          LEFT JOIN iscrizioni i ON s.id = i.studente_id
          LEFT JOIN corsi c ON i.corso_id = c.id";
```

## 🎯 Gestione Form

### 1. Validazione Completa

```php
$errori = array();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Validazione nome
    if (empty($_POST['nome'])) {
        $errori[] = "Il nome è obbligatorio";
    }
    
    // Validazione email
    if (!valida_email($_POST['email'])) {
        $errori[] = "Email non valida";
    }
    
    // Procedi solo se non ci sono errori
    if (empty($errori)) {
        // Salva nel database
    }
}
```

### 2. Token CSRF (opzionale ma consigliato)

```php
// Genera token
session_start();
$_SESSION['csrf_token'] = bin2hex(random_bytes(32));

// Nel form
<input type="hidden" name="csrf_token" value="<?= $_SESSION['csrf_token'] ?>">

// Verifica token
if (!hash_equals($_SESSION['csrf_token'], $_POST['csrf_token'])) {
    die("Token CSRF non valido");
}
```

## 🔄 Convenzioni di Naming

```php
// File: snake_case
// db_config.php, esegui_query.php

// Variabili: snake_case o camelCase (scegli uno e mantieni consistenza)
$nome_studente = "Mario";
$nomeStudente = "Mario";

// Costanti: UPPER_SNAKE_CASE
define('MAX_TENTATIVI', 3);

// Funzioni: snake_case
function calcola_media($voti) {
    // ...
}

// Tabelle database: snake_case, plurale
// studenti, corsi, iscrizioni
```

## ⚡ Performance

### 1. Limita Risultati Query

```php
// ✅ Usa LIMIT per evitare caricamento dati eccessivi
$query = "SELECT * FROM studenti LIMIT 50";

// ✅ Implementa paginazione
$per_pagina = 20;
$pagina = isset($_GET['pagina']) ? (int)$_GET['pagina'] : 1;
$offset = ($pagina - 1) * $per_pagina;
$query = "SELECT * FROM studenti LIMIT $per_pagina OFFSET $offset";
```

### 2. Indici Database

```sql
-- Crea indici su colonne usate spesso in WHERE, JOIN
CREATE INDEX idx_email ON studenti(email);
CREATE INDEX idx_studente_corso ON iscrizioni(studente_id, corso_id);
```

## 📐 Struttura File

```php
// ✅ Struttura file raccomandata
esercizio-XX/
├── index.php          # Entry point
├── config.php         # Include configurazione
├── functions.php      # Funzioni specifiche esercizio
├── process.php        # Elaborazione form
├── style.css          # Stili (opzionale)
└── README.md          # Descrizione esercizio
```

## 🧪 Debug

```php
// ✅ In sviluppo, abilita errori
ini_set('display_errors', 1);
error_reporting(E_ALL);

// ✅ In produzione, disabilita display e logga
ini_set('display_errors', 0);
ini_set('log_errors', 1);
ini_set('error_log', '/path/to/php-errors.log');

// ✅ Usa var_dump/print_r per debug
echo '<pre>';
var_dump($variabile);
echo '</pre>';
```
