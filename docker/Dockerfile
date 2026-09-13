# Utilitzem una imatge base de PHP 8.3 amb Apache.
FROM php:8.4-apache

RUN apt-get update && \
    # && Significa que la comanda següent només s'executarà si la comanda anterior ha finalitzat amb èxit
    apt-get install -y \
        libsqlite3-dev \
    # Aquí pots afegir altres extensions si cal
    # docker-php-ext-install: Aquest és un script que ve inclòs amb les imatges oficials de PHP de Docker.
    # La seva funció és simplificar la compilació i instal·lació d'extensions de PHP.
    # -j$(nproc): Aquesta és una opció de l'script docker-php-ext-install que indica quants processos s'han d'utilitzar per compilar les extensions.
    # $(nproc) és una comanda de shell que retorna el nombre de nuclis de CPU disponibles a la màquina.
    # En combinar-los, el script utilitza tants nuclis de CPU com sigui possible per a la compilació, cosa que fa que el procés sigui més ràpid.
    # mysqli pdo pdo_mysql: Aquests són els noms de les extensions de PHP que es volen instal·lar.
    && docker-php-ext-install -j$(nproc) mysqli pdo pdo_mysql  pdo_sqlite \
    # Netejem la caché de l'APT per reduir la mida de la imatge
    && apt-get clean \
    # Eliminar els fitxers temporals de l'APT per reduir encara més la mida de la imatge
    && rm -rf /var/lib/apt/lists/*

# Activem el mòdul de reescriptura d'Apache (mod_rewrite) Necessari per les rutes amigables (Router HTTP)
RUN a2enmod rewrite

# Copiem el fitxer de configuració de virtual host per a Apache.
COPY ./apache/vhost.conf /etc/apache2/sites-available/000-default.conf

EXPOSE 80