#Novaturo avirutė

## Konfiguracija
public_html/index.php - nusakoma aplinka.
application/config/ - konfigūracijos
application/config/production - konfigūracijos production'ui

## HTML+CSS+JS instrukcijos
CSS
public_html/css/main.css - pagrindinis dydelis css'o failas, visi mūsų nusakyti stiliai
public_html/css/normalize.css - stilių suderinimas cross-browseriam + boilerplate'o default'ai

JS
public_html/css/main.js
    kiekvienam template'e įkraunamas kodas. čia randasi visi 
    $(window).resize() ir panašūs dalykai
public_html/css/<<template-name>>.js
    konkrečiai tame faile naudojamas javascript'as
    <script> tag'as pačiam faile

HTML Templates
application/views/templates/header.php - <html><head></head><body>
application/views/templates/footer.php - </body></html>
application/views/templates/nav.php    - viršutinis meniu su step'ais, volume ir kt.
application/views/<vaizdas>/main.php - vaizdo template'as sumaunamas tokiu principu:
    templates/header.php
    <vaizdas>/main.php
    templates/footer.php


Etc
    #overlay - overlay'us
   .popup - popupam skirta klasė viską editint reikia per main.css failą
        css/javascript tiuningas popup'o išvaizdai:
        .with-overlay - parodant popup'ą rodyt ir overlay'ų
        .show-at-once - rodyti tik užkrovus puslapį