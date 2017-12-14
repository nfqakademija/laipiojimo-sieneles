![](https://avatars0.githubusercontent.com/u/4995607?v=3&s=100)

NFQ Akademija
============

# Intro

Sveiki! Tai yra Mato Domino NFQ akademijos projektas. 
Šioje repositorijoje rasite Symfony `~3.2` projekto paketą su jau paruoštais 
visais reikalingais failais ir įrankiais darbui:
 
- Lokalaus development'o aplinka (docker) (PHP 7.0, Maria DB, Nginx)
- Įdiegtas bootstrap
- Asset'ų buildinimas (npm, gulp, sass)
- Travis CI template


# Paleidimo instrukcija

### Reikia dokerio

#### Versijų reikalavimai
* docker: `>=17.x-ce`
* docker-compose: `>=1.8.1`


### Projekto paleidimas

**SVARBU:**

Susikuriate projekto viduje `.env` failą. Failą užpildote turiniu pateiktu iš `env.dist`.

Atkreipkite dėmęsį į `LOCAL_USER_ID` ir `LOCAL_GROUP_ID`, įvykdžius nurodytas komandas, ar sutampa `id`su jūsų nurodytais.

Toliau leidžiame komandas esančias žemiau:

```bash

docker-compose up -d
docker-compose exec fpm composer install --prefer-dist -n
docker-compose run npm npm install
docker-compose run npm gulp
docker-compose exec fpm bin/console d:m:m

```

### Kaip teisingai išjungti docker konteinerius?

Išjungiama su komanda:
```
docker-compose kill
```

Galima išjungti ir po vieną:
```
docker-compose kill <container name>
```


### Kaip pamatyti kas atsitiko?

Atsidarote naršyklę ir einate į `http://127.0.0.1:8000`


Admin login:
/admin/list
user: administratorius
pass: labaislaptas
