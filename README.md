# feelgoatravels
Website to manage tours and travels

Few changes have to be done inside xamp

Add this line to the bottom of the file
<i>127.0.0.1/feelgoatravels	feelgoatravels.dev</i>

Navigate to path <i>C:\\xampp\apache\conf\extra\httpd-vhosts</i>

Add the below code at the bottom of the file

<VirtualHost *:80>
  DocumentRoot "C:/xampp/htdocs/feelgoatravels/public"
  ServerName feelgoatravels.dev
</VirtualHost>

Restart Apache.

Done!
