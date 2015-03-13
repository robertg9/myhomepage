https://github.com/robertg9/myhomepage

System ma na celu umo¿liwienie u¿ytkownikowi dostêp do spisu ulubionych stron z ka¿dego urz¹dzenia tak aby nie trzeba by³o przepisywaæ linków sk³adaj¹cych siê z kilkuset znaków na telefon komórkowy b¹dŸ inne urz¹dzenia przenoœne.

Projekt oparty jest o php w wersji 5.3, mysql  w wersji 5.6.21 oraz server apache.

Aby uruchomiæ aplikacjê  trzeba pobraæ aplikacjê z podanego wczeœniej linku github do folderu htdocs b¹dŸ w pliku httpd.conf zmieniæ œcie¿ki

DocumentRoot "C:/Users/X/Documents/NetBeansProjects/MyHomePage"
<Directory "C:/Users/X/Documents/NetBeansProjects/MyHomePage">

na  miejsce w które pobraliœmy projekt w moim przypadku to : "C:/Users/X/Documents/NetBeansProjects/MyHomePage".
Nastêpnie utworzyæ bazê danych o nazwie myhomepage, w pliku konfiguracyjnym "config/DbConfig.php" wpisujemy nazwê u¿ytkownika bazy oraz has³o je¿eli zosta³o ustawione
 po utworzeniu bazy danych  uruchamiamy z konsoli plik databaseini.php który utworzy tabele w naszej bazie.

Zastosowana architektura to MVC
System szablonów : Smarty



