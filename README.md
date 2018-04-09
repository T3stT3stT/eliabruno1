# eliabruno1
<h1> Apache und MySQL mit einem PHP-Login Script</h1>

<h2>1 Projektbeschreib</h2>

Im Verlaufe des Projektes soll ein Vagrantfile entstehen, welches eine Umgebung mit einem Webserver und einem SQL-Server aufbaut. Ebenfalls wird eine PHP Loginmaske erstellt, welche mit der SQL Datenbank kommuniziert. Die Eingaben müssen mit den SQL Einträgen abgeglichen werden. Bei einem korrekten Login wird der Enduser auf eine Willkommensmaske geleitet.Im Falle eines fehlgeschlagenen Logins, wird der User gebeten das Passwort erneut einzugeben.

<h2>2 Planung</h2>

2.1 Berechtigung MySQL

Damit der Apache Server auf den SQL Sever Zugreifen kann, braucht es einen Zugang. Damit keine Verwirrungen mit den Usernamen entstehen, wird der User mit den nötigen Rechten Web01 genannt. Ebenfalls soll er alle Rechte erhalten.

2.2 IP Adressen

Die IP Adressen sollen in dem Range 192.168.55.0-255 sein. Ich entschied mich deshalb für die IP's 192.168.55.100 (DB) und 192.168.55.101 (Webserver). Die IP sind sehr ei9nfach zum merken und vereinfachen deshalb die Verwaltung.

<h2>3 Realisation</h2>

3.1 Apache

3.1.1 Sicherheit

Aus sicherheitsgründen wurde nicht der Standard-Port 8080 genutz, sondern 8990. Ebenfalls wurde die Firewall aktiviert und eine Regel erstellt, welche nur Traffic auf Port 8990 und 80 erlaubt.

3.1.2 Konfiguration

Auf dem Server wurde Apache installiert, sowie auch MySQL-Client. Mit MySQL-CLient kann sich der Server auf die Datanebank connecten.

3.1.3 PHP

Es wurde zusätzlich ein PHP Login-Script erstellt, welches prüft, ob der User auf der DB existiert oder nicht. Falls fragen zum PHP-Script entstehen seteh ich für Fragen gerne zur verfügung.


3.2 MySQL Datenbank

3.2.1 Berechtigungen setzen
Um mit dem Apache Server auf den MySQL Server zuzugreifen, musste ich einen User erstellen. Mit diesem SQL Befehl kann der User erstellt werden und die Rechte werden zugleich gesetzt.

CREATE USER 'web01'@'%' IDENTIFIED BY 'passpass';
grant all privileges on *.* to 'web01'@'%' with grant option;
FLUSH PRIVILEGES;

3.2.2 Datanbank samt Inhalt erstellen
Um die Datenbank zu erstellen, musst ich diese SQL-Transaktionen durchführen. 
Mit CREATE Database erstellte ich eine Datenbank. Sie wurde "database1" benannt

CREATE DATABASE database1;

Diese Zeile erstellt eine Tabelle mit den Spalten und den Werten. Ebenfalls wird die Engine für die SQL Datenbank definiert, sowie der Charakter-Satz.

CREATE TABLE `users` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `passwort` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
   PRIMARY KEY (`id`), UNIQUE (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
 

Inhalte werden mit diesem Befehl in die Datenbank eingetragen.
INSERT INTO  users (email, passwort)  VALUES ("elia@bluewin.ch","12345678");

3.2.3 Dump erstellen

Damit die Datensätze der DB bei einer neuen Installation wieder vorhanden sind, wurde ein SQL-Dump erstellt. Dieser wird mit der Zeile in der inline Shell eingespielt:
sudo mysql -u root -p 1234Qwer < mysqldump.dump


<h2>4 Fazit</h2>

Das Gesamte Projekt ist leider überhaupt nicht nach Plan verlaufen. Mein Ziel war es, mit der Arbeit inner der ersten 10 Lektionen fertig zu werden. Leider machte mir mein Unwissen einen Stricht durch die Rechnung. Da ich nicht viel Erfahrung mit PHP  und sehr wenig mit SQL zu tun hatte, wurde die Aufgabe zu einer echten Herausforderung. Der Zeitrahmen wurde masslos überschritten und ich investierte gute 30 Stunden. Doch den Durchhaltewillen verlor ich nie. Mein Ziel war es mit dieser Aufgabe fertig zu werden. Das Problem am ganzen war, dass ich sehr viel Troubleshooten musste. In das Troubleshooting wurden circa 15 Stunden investiert. Was mir jedoch gefiehl, war der erwähnte Durchhaltewille und den Reiz etwas neues zu lernen. Diese zwei Dinge trieben mit an meine Grenzen. Trotz dem Stress konnte ich im Bereich PHP und SQL viel lernen. Vorallem im SQL Bereich.