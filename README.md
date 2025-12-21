# Esercizi PHP/MySQLi Procedurale

Repository di esercizi giornalieri di PHP con MySQLi procedurale, organizzati per difficoltà crescente.

## 📁 Struttura del Repository

```
esercizi-php/
├── giorno-01/          # Primo giorno - Esercizi base
│   ├── esercizio-01/
│   ├── esercizio-02/
│   ├── esercizio-03/
│   └── README.md
├── giorno-02/          # Secondo giorno - Difficoltà crescente
│   ├── esercizio-01/
│   ├── esercizio-02/
│   └── README.md
├── config/             # File di configurazione
│   └── db_config.template.php
├── database/           # Script SQL e schema
│   └── schema.sql
├── docs/               # Documentazione aggiuntiva
│   ├── setup.md
│   └── best-practices.md
└── utils/              # Utility e funzioni comuni
    └── functions.php
```

## 🚀 Setup Iniziale

### Prerequisiti
- PHP 7.4 o superiore
- MySQL/MariaDB 5.7 o superiore
- Server web (Apache/Nginx) o PHP built-in server

### Configurazione Database

1. Crea un database MySQL:
```sql
CREATE DATABASE esercizi_php CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
```

2. Copia il file di configurazione template:
```bash
cp config/db_config.template.php config/db_config_local.php
```

3. Modifica `config/db_config_local.php` con le tue credenziali:
```php
<?php
define('DB_HOST', 'localhost');
define('DB_USER', 'tuo_username');
define('DB_PASS', 'tua_password');
define('DB_NAME', 'esercizi_php');
?>
```

4. Importa lo schema base:
```bash
mysql -u tuo_username -p esercizi_php < database/schema.sql
```

## 📚 Come Utilizzare gli Esercizi

### Struttura di Ogni Esercizio

Ogni esercizio contiene:
- `README.md` - Descrizione dell'esercizio e requisiti
- `index.php` - File principale dell'esercizio
- `soluzione.php` (opzionale) - Soluzione proposta
- Altri file necessari per l'esercizio

### Eseguire un Esercizio

1. Naviga nella cartella dell'esercizio
2. Avvia il server PHP:
```bash
cd giorno-01/esercizio-01
php -S localhost:8000
```
3. Apri il browser a `http://localhost:8000`

## 📖 Progressione degli Esercizi

### Giorno 1: Fondamenti PHP e MySQLi
- Connessione al database
- Query SELECT base
- Visualizzazione dati in HTML

### Giorno 2: CRUD Operations
- INSERT: Inserimento dati
- UPDATE: Modifica dati
- DELETE: Cancellazione dati

### Giorno 3: Form e Validazione
- Gestione form POST/GET
- Validazione input
- Prepared statements

### Giorno 4: Operazioni Avanzate
- JOIN tra tabelle
- Ricerca e filtri
- Paginazione

### Giorno 5: Sessioni e Autenticazione
- Gestione sessioni
- Login/Logout
- Sistema di autenticazione base

## 🎯 Best Practices

1. **Sicurezza**
   - Usa sempre prepared statements
   - Valida e sanitizza input utente
   - Non esporre mai credenziali nel codice

2. **Codice Pulito**
   - Indentazione consistente
   - Commenti in italiano
   - Nomi variabili descrittivi

3. **Gestione Errori**
   - Controlla sempre il risultato delle query
   - Gestisci gli errori appropriatamente
   - Usa `mysqli_error()` per il debug

## 📝 Convenzioni

- **Lingua**: Commenti e documentazione in italiano
- **Encoding**: UTF-8
- **Indentazione**: 4 spazi
- **Nomi file**: snake_case (es. `db_config.php`)
- **Nomi variabili**: camelCase o snake_case

## 🔗 Risorse Utili

- [PHP Manual](https://www.php.net/manual/it/)
- [MySQLi Documentation](https://www.php.net/manual/it/book.mysqli.php)
- [SQL Tutorial](https://www.w3schools.com/sql/)

## 📄 Licenza

Repository a scopo didattico.
