MyAnimeLite
CS 165 WVW

Alvaro, Justine Paul
Gacutan, Alyanna
Santos, Kenneth

INSTALLATION:
1. Download and install XAMPP (select Apache, PHP, and MySQL).
2. Download/clone the repository: https://github.com/justinealvaro15/my-anime-lite.git
3. Move your local file of the repository to C:\xampp\htdocs.
4. Turn on XAMPP’s Apache and MySQL.
5. Click MySQL’s Admin button and it will redirect you to http://localhost/phpmyadmin/
6. Create a new database named “myanimelite”, and select utf8_general_ci as its collation property.
7. Select the myanimelite database and import the SQL file located in myanimelite/SQL/my-anime-lite.sql.
8. Finally, go to http://localhost/my-anime-lite/ and the app should redirect you to a login page.


HISTORY:
[11/12] Added entity tables -- anime, genre, studio, licensor, airing
[11/13] Added genre descriptions (excluding Rated R genres)
[11/14] Added relationship tables -- relationship, classification, created, licensed, aired
[11/14] Deleted all Rated R-animes. Revised the following tables -- anime, genre, relationship, classification, created, licensed, aired. 
[11/24] Revised all SQL files suited for MYSQL.
[11/24] Added an exported SQL file (project.sql) from phpMyAdmin that contains all the SQL files for easier importation.
[12/01] Added registration and login; Implemented info display on Anime Page.
[12/02] Added update anime and create anime feature.
[12/02] Added delete feature and sidenav+link redirection; fixed minor bugs
[12/02] Added logout in sidenav, genres in Anime Page
[12/02] Added an exported MySQL file to populate database (SQL/my-anime-lite.sql)
