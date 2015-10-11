# Praca s `git`-om v terminali (aj vo Window$e)

## Instalacia

Okrem Linuxu a terminalu potrebujete mat nainstalovany program `git`.

V Debian-like systemoch staci v terminali spustit nasledovny prikaz:

```bash
$ sudo apt-get -yq update && sudo apt-get -yq install git
```

V Arch Linuxe zase nasledovny prikaz:

```bash
$ sudo pacman -Syyu --noconfirm && sudo pacman -S --noconfirm git
```

Windowsaci si mozu nainstalovat [Git for Windows](https://git-for-windows.github.io/).

:exclamation: Symboly `$` a `#` na zaciatku prikazov nie su sucastou prikazov; ony len naznacuju, ze ich treba spustit ako bezny pouzivatel (`$`) alebo ako root (`#`).

## Nastavenie `git`-u

Nasledovne tri prikazy je nutne spustit pre spravne pouzivanie programu `git`.

```bash
$ git config --global user.name "prezyvka"  # prezyvka na github-e, napr "tukusejssirs"
$ git config --global user.email "you@example.com"      # bud je to email, ktory ste zadali
                                                        # pri registracii (to je predvolene)
                                                        # alebo prezyvka@github.com (podla
                                                        # nastaveni na github-e
$ git config --global push.default simple
```
[Tu](https://github.com/settings/emails) sa daju prezriet, prip prestavit nastavania ohladom emailu/-ov.
### Nastavenie `ssh` pre `git`

Hoci tuto cast je mozne vynechat a dalej pracovat s HTTPS linkami (napr https://github.com/tukusejssirs/Konpoz.git)

### Vygenerovanie verejneho/sukromneho rsa klucoveho paru

Je potrebne mat vytvoreny nejaky `ssh` kluc. Ak taky nemate, mozete si ho jednoducho vygenerovat:

```bash
ssh-keygen -f ~/.ssh/id_rsa -P ""
cat ~/.ssh/id_rsa                  # zobrazi ssh-rsa kluc, ktory treba skopirovat
                                   # (pravdepodobne to nepojde pomocou klavesovej
                                   # skratky `crl+c`, ale iba pomocou `ctrl+shift+c`,
                                   # pretoze ta prva/bezna je prednastavena
                                   # na ukoncenie programu)
```

### Priradenie ssh kluca pre git

Skopirovany kluc treba ulozit do nastaveni svojho uctu na [github-e](https://github.com/settings/ssh) (treba kliknut na `Add SSH key` vybrat lubovolny nazov/Title pre ssh kluc, vlozit prave skopirovany kluc do textoveho pola Key a nakoniec pridat kluc / Add key).


## Praca s `git`-om

Aby sme mohli pracovat, najskor si treba ‘sklonovat’ (rozumej skopirovat/stiahnut) repository (repozitar, zdroj, skrysa) daneho projektu z github.com.

```bash
$ git clone url_adresa_repositaru /cesta/kde/sa/ma/sklonovat/repozitar  # vseobecny zapis
$ git clone https://github.com/tukusejssirs/Konpoz.git ~/konpoz  # konkretny prikaz
```

:star2: Podobne sa daju sklonovat aj ine repository z github-u.<br/>
:star2: Cielovy adresar, kde sa ma sklonovat repozitar, nemusi byt vytvoreni (prikaz `git` ho vytvori, ak neexistuje), avsak ak existuje, musi byt prazdny.<br/>
:star2: V Linuxe vlnka (tilde, ~) znaci domovsky priecinok aktualne prihlaseneho pouzivatela (napr /home/meno)<br/>
:star2: Odteraz dalej budem predpokladat, ze ste si sklonovat `konpoz` do priecinku `~/konpoz`.




```bash
$ git remote set-url origin git@github.com:nickname/Konpoz.git  # `origin` moze byt cokolvek
```

:exclamation: Ak si nenstavite `ssh`, odteraz dalej si v prikazoch prepiste linky `git@github.com:nickname/Konpoz.git` na 'https://github.com/tukusejssirs/Konpoz.git`.	

# mkdir databaza && mv databaza_skica.md databaza

[3:52pm]0 root@lnv:~/mega.d/.prgs/konpoz
# git add databaza

[3:52pm]0 root@lnv:~/mega.d/.prgs/konpoz
# git add databaza/*

[3:53pm]0 root@lnv:~/mega.d/.prgs/konpoz
# git commit -am "vytvorenie priecinku databaza"
[master 9d756c7] vytvorenie priecinku databaza
 1 file changed, 0 insertions(+), 0 deletions(-)
 rename databaza_skica.md => databaza/databaza_skica.md (100%)

[3:53pm]0 root@lnv:~/mega.d/.prgs/konpoz
# git push
warning: push.default is unset; its implicit value has changed in
Git 2.0 from 'matching' to 'simple'. To squelch this message
and maintain the traditional behavior, use:

  git config --global push.default matching

To squelch this message and adopt the new behavior now, use:

  git config --global push.default simple

When push.default is set to 'matching', git will push local branches
to the remote branches that already exist with the same name.

Since Git 2.0, Git defaults to the more conservative 'simple'
behavior, which only pushes the current branch to the corresponding
remote branch that 'git pull' uses to update the current branch.

See 'git help config' and search for 'push.default' for further information.
(the 'simple' mode was introduced in Git 1.7.11. Use the similar mode
'current' instead of 'simple' if you sometimes use older versions of Git)

Username for 'https://github.com': tukusejssirs
Password for 'https://tukusejssirs@github.com': 
Counting objects: 3, done.
Delta compression using up to 4 threads.
Compressing objects: 100% (2/2), done.
Writing objects: 100% (3/3), 328 bytes | 0 bytes/s, done.
Total 3 (delta 1), reused 0 (delta 0)
To https://github.com/tukusejssirs/Konpoz.git
   dc7cca6..9d756c7  master -> master

[3:54pm]0 root@lnv:~/mega.d/.prgs/konpoz
# ll
total 56
drwxr-xr-x 2 root root  4096  11 Oct 2015,  3.52 pm CEST	 databaza/
-rw-r--r-- 1 root root  2044  11 Oct 2015,  3.00 pm CEST	 diskusia_webhosting.md
drwxr-xr-x 8 root root  4096  11 Oct 2015,  3.53 pm CEST	 .git/
-rw-r--r-- 1 root root 35142   9 Oct 2015,  9.02 pm CEST	 licence
-rw-r--r-- 1 root root  2328  11 Oct 2015,  3.00 pm CEST	 readme.md
drwxr-xr-x 3 root root  4096  11 Oct 2015,  3.06 pm CEST	 webstranka/



## Zdroje

[Git Basics Working with Remotes](http://git-scm.com/book/en/v2/Git-Basics-Working-with-Remotes)
[Emoji Cheat Sheet](http://www.emoji-cheat-sheet.com/)
[Git Push Requires username and password](http://stackoverflow.com/questions/6565357/git-push-requires-username-and-password)
[Mastering	 MarkDown](https://guides.github.com/features/mastering-markdown/)
