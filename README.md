# System zarządzania magazynem
Aplikacja służy do zarządzania produktami oraz zamówieniami w magazynie.
Dostępne są dwie role:
- Użytkownik - ma możliwość przeglądania dostępnych przedmiotów oraz składania zamówień 
(oraz wyświetlania ich szczegółów wraz ze stanem).
- Administrator - może dodawać/usuwać produkty do magazynu, przeglądać zamówienia oraz aktualizować ich stan.

## Uruchomienie aplikacji lokalnie
### Wymagania:
- Zainstalowany i włączony [Docker](https://docs.docker.com/engine/install/)
- Zainstalowany system kontroli wersji [GIT](https://git-scm.com/downloads)

### Kroki do wykonania
1. Sklonowanie repozytorium `git clone https://github.com/michalmlynarczykk/warehouse.git`
2. Będąc w katalogu root projektu uruchamiamy kontenery z aplikacją, bazą danych oraz panelem do zarządzania bazą danych
`docker-compose up -d`

Po włączeniu kontenerów:
- Aplikacja jest dostępna pod adresem [http://0.0.0.0:8000/](http://0.0.0.0:8000/)
- Adminer jest dostępny po adresem [http://localhost:8080/](http://localhost:8080/) 
dane do logowania: username: "root" hasło: "password"

Po uruchomieniu aplikacji możemy zalogować się na dwa konta (dane zostały dodane przy uruchomieniu):
- login: "admin@test.pl" hasło: "admin"
- login: "user@test.pl" hasło: "user"

### Wyłączenie kontenerów
- `docker-compose down`
