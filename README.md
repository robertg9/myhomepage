https://github.com/robertg9/myhomepage

System ma na celu umo�liwienie u�ytkownikowi dost�p do spisu ulubionych stron z ka�dego urz�dzenia tak aby nie trzeba by�o przepisywa� link�w sk�adaj�cych si� z kilkuset znak�w na telefon kom�rkowy b�d� inne urz�dzenia przeno�ne.

Projekt oparty jest o php w wersji 5.3, mysql  w wersji 5.6.21 oraz server apache.

Aby uruchomi� aplikacj�  trzeba pobra� aplikacj� z podanego wcze�niej linku github do folderu htdocs b�d� w pliku httpd.conf zmieni� �cie�ki

DocumentRoot "C:/Users/X/Documents/NetBeansProjects/MyHomePage"
<Directory "C:/Users/X/Documents/NetBeansProjects/MyHomePage">

na  miejsce w kt�re pobrali�my projekt w moim przypadku to : "C:/Users/X/Documents/NetBeansProjects/MyHomePage".
Nast�pnie utworzy� baz� danych o nazwie myhomepage, w pliku konfiguracyjnym "config/DbConfig.php" wpisujemy nazw� u�ytkownika bazy oraz has�o je�eli zosta�o ustawione
 po utworzeniu bazy danych  uruchamiamy z konsoli plik databaseini.php kt�ry utworzy tabele w naszej bazie.

Zastosowana architektura to MVC
System szablon�w : Smarty



