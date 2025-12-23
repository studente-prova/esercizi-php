# Esercizi PHP/MySQLi Procedurale

Repository di esercizi giornalieri di PHP con MySQLi procedurale, organizzati per difficoltà crescente.

## 🚀 Setup Rapido

### Per XAMPP Windows (Laboratorio/Casa)

1. **Installa XAMPP** e copia il progetto in `C:\xampp\htdocs\esercizi-php\`
2. **Avvia Apache e MySQL** dal XAMPP Control Panel
3. **Crea database** `esercizi_php` su phpMyAdmin (`http://localhost/phpmyadmin`)
4. **Importa schema** dal file `database/schema.sql`
5. **Configura** `config/db_config.php`:
   ```php
   define('DB_USER', 'root');
   define('DB_PASS', '');  // vuoto per XAMPP
   ```
6. **Testa**: Apri `http://localhost/esercizi-php/`

### Per Altervista (Online)

1. **Crea database** dal pannello Altervista
2. **Configura** `config/db_config.php`:
   ```php
   define('DB_USER', 'tuousername');
   define('DB_PASS', 'tuapassword');
   define('DB_NAME', 'my_tuousername');  // my_ + username
   ```
3. **Carica file via FTP** con VSCode + estensione FTP
4. **Testa**: Apri `http://tuousername.altervista.org/esercizi-php/`

## 📖 Documentazione Completa

**👉 [Apri la Guida Completa (HTML)](docs/index.html) 👈**

La documentazione interattiva include:
- Setup dettagliato per XAMPP Windows
- Setup per Altervista con FTP
- Configurazione database
- Risoluzione problemi comuni

## 📁 Struttura del Repository

```
esercizi-php/
├── index.html          # Home con link alla documentazione
├── docs/
│   └── index.html      # Guida setup interattiva
├── config/
│   └── db_config.php   # Configurazione database (UNICO FILE)
├── database/
│   └── schema.sql      # Schema database
├── giorno-01/          # Esercizi giorno 1
├── giorno-02/          # Esercizi giorno 2
└── utils/              # Utility comuni
```

## ⚙️ Configurazione Database

**File unico**: `config/db_config.php`

Modifica le prime righe con le tue credenziali:
```php
define('DB_HOST', 'localhost');
define('DB_USER', 'root');              // tuo username
define('DB_PASS', '');                  // tua password
define('DB_NAME', 'esercizi_php');      // nome database
```

## 📚 Come Usare gli Esercizi

1. Configura il database (vedi sopra)
2. Apri `http://localhost/esercizi-php/` nel browser
3. Vai agli esercizi:
   - `giorno-01/esercizio-01/` - Test connessione
   - `giorno-01/esercizio-02/` - Query base
   - `giorno-02/esercizio-01/` - CRUD operations

## 🔧 Problemi?

Consulta la [Guida Troubleshooting](docs/index.html#troubleshooting) per risolvere i problemi più comuni:
- Apache/MySQL non si avvia
- Errori di connessione database
- Caratteri strani (encoding)
- Problemi FTP con Altervista

## 📝 Convenzioni

- **Lingua**: Commenti e documentazione in italiano
- **Encoding**: UTF-8
- **Indentazione**: 4 spazi
- **Nomi file**: snake_case (es. `db_config.php`)

## 🔗 Risorse Utili

- [PHP Manual](https://www.php.net/manual/it/)
- [MySQLi Documentation](https://www.php.net/manual/it/book.mysqli.php)
- [XAMPP Download](https://www.apachefriends.org/it/index.html)
- [Altervista](https://it.altervista.org/)

## 📄 Licenza

Repository a scopo didattico.
