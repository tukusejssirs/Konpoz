#Mame spojazdneny server!

Formular na vkladanie pozvanok (insert.php) sa nachadza [tu](http://195.140.252.48/insert.php) a aktualna tabulka s pozvankami (odpoved.php) [tu](http://195.140.252.48/odpoved.php).

Pre editaciu kodov sa musite pripojit pomocou Putty, Totalcomanc, alebo Midnajt komandera,
ci podobnej srandy zatial napriklad cez SFTP ako: " aiex@195.140.252.48 " a zadate heslo: `maslo`,
(neskor doriesime ssh kluce) zdrojaky su umiestnene v zlozke: /var/www/

prihlasit na server cez ssh sa da: ssh aiex@195.140.252.48
prikazom " mc " sa spusti "midnajt komanč"  

Edit (@tukusejssirs): Na server sa da pripojit cez akykolvek ftp klient: pouzitim SFTP
- host: `195.140.252.48`,
- user: `aiex`,
- pass: `maslo`,

vo windowse v TotalCommander-i je potrebne doinstalovat plugin " SFTP " 
jednoduchy navod je napriklad na " http://megatron.sk/total-commander-sftp-navod-na-kopirovanie-nastaveni-tc/ "
                         alebo:  " http://www.miroslavnovak.com/ftps-total-commander-openssl-dll_cz.php  "
                                 " http://tlukas.eu/tipy-amp-triky/total-commander-a-pripojeni-k-sftp  "
                                   atd