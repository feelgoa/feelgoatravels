
Website to manage tours and travels

## Setup

Few changes have to be done inside xamp

Add this line to the bottom of the file

```bash
127.0.0.1/feelgoatravels	feelgoatravels.dev
```

Navigate to path C:\\xampp\apache\conf\extra\httpd-vhosts

Add the below code at the bottom of the file

```bash
<VirtualHost *:80>
DocumentRoot "C:/xampp/htdocs/feelgoatravels/public"
ServerName feelgoatravels.dev
</VirtualHost>
```

## Restart Apache.

## Done!
