Cum se execută proiectul de gestiune a unei clinici veterinare - Clinica My Med Vet

Se va folosi programul XAMPP, ce poate fi instalat dupa descarcarea acestuia de pe pagina https://www.apachefriends.org/download.html.

Dupa instalarea si configurarea programului XAMPP, se va folosi PHP si MySQL.

1. Descărcați fișierul zip
2. Extrageți fișierul și copiați dosarul Clinica-MyMedVet
3. Lipiți în directorul rădăcină (pentru xampp xampp/htdocs, pentru wamp wamp/www, pentru lampa var/www /html)
4. Deschideți PHPMyAdmin (http://localhost/phpmyadmin)
5. Creați o bază de date cu numele clinica_mymedvet_db
6. Importați clinica_mymedvet_db.sql fișier (dat în interiorul pachetului zip în folderul de fișiere SQL)
7. Rulați scriptul http://localhost/Clinica-MyMedVet (frontend)
   
Partea de frontend a aplicatiei poate fi vizualizata fara a ne autentifica, deoarece este interfata pentru toti utilizatorii 
   
Detalii de conectare pentru autentificare:

***Admin Panel : localhost/Clinica-MyMedVet/mymedvet/admin/

admin : admin / Admin*123

***Vetdoc Panel : localhost/Clinica-MyMedVet/mymedvet/doctor/ sau din aplicatia web de la sectiunea Logare

vetdoc: gruia.mymedvet@gmail.com / Gruia*963

din aplicatia web de la sectiunea Logare

user: ioana.marinescu@gmail.com / Ioana*123
