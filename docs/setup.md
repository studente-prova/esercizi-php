# Setup e Installazione

## Requisiti di Sistema

### Software Necessario
- **PHP**: versione 7.4 o superiore
- **MySQL/MariaDB**: versione 5.7 o superiore
- **Server Web**: Apache, Nginx o PHP built-in server

### Verifica Installazione PHP

```bash
php -v
```

Verifica che MySQLi sia abilitato:
```bash
php -m | grep mysqli
```

## Installazione Passo-Passo

### 1. Clona il Repository

```bash
git clone https://github.com/studente-prova/esercizi-php.git
cd esercizi-php
```

### 2. Configura MySQL

Accedi a MySQL:
```bash
mysql -u root -p
```

Crea il database:
```sql
CREATE DATABASE esercizi_php CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
```

Crea un utente (opzionale ma consigliato):
```sql
CREATE USER 'esercizi_user'@'localhost' IDENTIFIED BY 'password_sicura';
GRANT ALL PRIVILEGES ON esercizi_php.* TO 'esercizi_user'@'localhost';
FLUSH PRIVILEGES;
EXIT;
```

### 3. Importa lo Schema Database

```bash
mysql -u esercizi_user -p esercizi_php < database/schema.sql
```

### 4. Configura la Connessione Database

Copia il template di configurazione:
```bash
cp config/db_config.template.php config/db_config_local.php
```

Modifica `config/db_config_local.php` con un editor:
```bash
nano config/db_config_local.php
# oppure
vim config/db_config_local.php
```

Inserisci le credenziali corrette:
```php
define('DB_HOST', 'localhost');
define('DB_USER', 'esercizi_user');
define('DB_PASS', 'password_sicura');
define('DB_NAME', 'esercizi_php');
```

### 5. Testa la Configurazione

Puoi creare un file di test per verificare la connessione:

```php
<?php
require_once 'config/db_config_local.php';

$conn = connetti_database();
if ($conn) {
    echo "Connessione al database riuscita!";
    chiudi_database($conn);
} else {
    echo "Errore di connessione!";
}
?>
```

## Esecuzione degli Esercizi

### Metodo 1: PHP Built-in Server (Raccomandato per sviluppo)

```bash
# Avvia il server nella cartella dell'esercizio
cd giorno-01/esercizio-01
php -S localhost:8000
```

Apri il browser a: `http://localhost:8000`

### Metodo 2: Apache/Nginx

Configura il document root del tuo server web per puntare alla cartella del repository.

**Apache** - Esempio di configurazione VirtualHost:
```apache
<VirtualHost *:80>
    ServerName esercizi-php.local
    DocumentRoot "/path/to/esercizi-php"
    <Directory "/path/to/esercizi-php">
        AllowOverride All
        Require all granted
    </Directory>
</VirtualHost>
```

**Nginx** - Esempio di configurazione:
```nginx
server {
    listen 80;
    server_name esercizi-php.local;
    root /path/to/esercizi-php;
    index index.php index.html;

    location ~ \.php$ {
        fastcgi_pass unix:/var/run/php/php7.4-fpm.sock;
        fastcgi_index index.php;
        include fastcgi_params;
        fastcgi_param SCRIPT_FILENAME $document_root$fastcgi_script_name;
    }
}
```

## Troubleshooting

### Errore: "mysqli extension not found"

**Soluzione**: Installa l'estensione MySQLi

Ubuntu/Debian:
```bash
sudo apt-get install php-mysqli
sudo service apache2 restart
```

CentOS/RHEL:
```bash
sudo yum install php-mysqli
sudo systemctl restart httpd
```

### Errore: "Access denied for user"

**Soluzione**: Verifica le credenziali in `config/db_config_local.php`

### Errore: "Unknown database"

**Soluzione**: Crea il database e importa lo schema come descritto al punto 2 e 3.

### Errore di charset/encoding

**Soluzione**: Verifica che il database usi utf8mb4:
```sql
ALTER DATABASE esercizi_php CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
```

## Configurazione php.ini Consigliata

```ini
display_errors = On
error_reporting = E_ALL
mysqli.default_socket = /var/run/mysqld/mysqld.sock
date.timezone = Europe/Rome
```

## Risorse Aggiuntive

- [Documentazione PHP](https://www.php.net/manual/it/)
- [Documentazione MySQLi](https://www.php.net/manual/it/book.mysqli.php)
- [MySQL Documentation](https://dev.mysql.com/doc/)
