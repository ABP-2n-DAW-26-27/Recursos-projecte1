# Gestor d'enllaços: de PHP a JavaScript

Aquest exemple mostra com passar dades de PHP a JavaScript sense utilitzar `fetch` ni AJAX.

## Funcionament

1. `save.php` rep i valida les dades del formulari.
2. Converteix l'array PHP a JSON amb `json_encode()` i el desa a `dades.json`.
3. `index.php` llegeix el fitxer:

   ```php
   $json = file_get_contents("dades.json");
   ```

4. PHP insereix el text JSON dins de l'script abans d'enviar la pàgina al navegador:

   ```php
   app.dades = <?= $json ?>;
   ```

   Com que aquest JSON també és una expressió vàlida de JavaScript, el motor de JavaScript l'interpreta quan executa l'assignació. Així, `app.dades` queda definida amb les dades corresponents i es pot utilitzar des del codi JavaScript.

## Tractament de les dades a PHP

Abans de desar el formulari, `save.php` tracta els valors rebuts:

```php
$descripcio = htmlspecialchars(trim($_POST["descripcio"] ?? ""));
$url = trim($_POST["url"] ?? "");
```

- `$_POST["..."] ?? ""` obté el valor enviat o utilitza una cadena buida si no existeix.
- `trim()` elimina els espais sobrants del principi i del final.
- `htmlspecialchars()` converteix caràcters especials d'HTML, com `<` o `>`, en entitats. Normalment s'aplica en mostrar contingut dins d'HTML. En aquest exemple, JavaScript utilitza `textContent`, que ja mostra el text sense interpretar-lo com a HTML.
- `filter_var($url, FILTER_VALIDATE_URL)` comprova que el text tingui format d'URL. Si no és vàlid, es torna a l'índex amb `?error=1` i `exit()` atura l'execució.

## Per què funciona amb JSON?

JSON (*JavaScript Object Notation*) és un format de text per representar dades estructurades basat en la notació de JavaScript. Permet expressar objectes, arrays, cadenes de text, números, valors booleans i `null`. Per aquest motiu, quan inserim el JSON en una assignació com la d'aquest exemple, el motor de JavaScript el pot interpretar com un valor i assignar-lo directament a una variable. Per exemple:

```json
[{"descripcio": "PHP", "url": "https://php.net"}]
```

Les funcions PHP clau són `json_decode()`, que transforma JSON en dades PHP, i `json_encode()`, que transforma dades PHP en JSON. El segon paràmetre de `json_decode()` indica com s'han de convertir els objectes del JSON:

```php
$dades = json_decode($json, true);
```

Amb `true`, els objectes JSON es converteixen en arrays associatius de PHP i podem accedir als valors amb `$dada["url"]`. Si ometem el segon paràmetre o indiquem `false`, es converteixen en objectes `stdClass` i hi accedim amb `$dada->url`. Els arrays JSON es converteixen en arrays indexats de PHP en tots dos casos.
