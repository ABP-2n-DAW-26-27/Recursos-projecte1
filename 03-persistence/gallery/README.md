# Galeria de fotografies amb PHP

## Què volem construir?

Farem una aplicació petita amb dues pàgines:

- **Galeria:** mostra les fotografies que hi ha a la carpeta `uploads/`.
- **Afegir fotografia:** conté un formulari per seleccionar i pujar una imatge.

Les maquetes HTML i el full d'estils són a `design/`. L'objectiu és convertir-les en pàgines PHP i implementar-ne el backend pas a pas. La navegació principal comença per la galeria i porta després al formulari.

## Formulari d'upload

Un formulari que envia un fitxer necessita tres atributs:

```html
<form action="upload.php" method="post" enctype="multipart/form-data">
    <label for="attachment">Fitxer</label>
    <input type="file" id="attachment" name="attachment" required>
    <button type="submit">Enviar</button>
</form>
```

- `action` indica quin programa rebrà la petició.
- `method="post"` envia les dades dins del cos de la petició HTTP.
- `enctype="multipart/form-data"` permet separar i enviar dades binàries. Sense aquest valor, el fitxer no arriba correctament.
- `name="attachment"` és la clau que PHP trobarà a `$_FILES['attachment']`.

### Què viatja per HTTP?

Quan premem el botó, el navegador envia una petició semblant a aquesta:

```http
POST /upload.php HTTP/1.1
Content-Type: multipart/form-data; boundary=----abc123

------abc123
Content-Disposition: form-data; name="attachment"; filename="apunts.pdf"
Content-Type: application/pdf

[bytes del fitxer]
------abc123--
```

El `boundary` separa les parts del formulari. Cada fitxer inclou el nom del camp, el nom original, el tipus declarat i el contingut binari. El servidor desa primer el fitxer en una ubicació temporal.

## Gestionar l'upload amb PHP

PHP exposa els fitxers rebuts mitjançant la superglobal `$_FILES`:

```php
$_FILES['attachment']['name'];      // nom original
$_FILES['attachment']['type'];      // tipus declarat pel navegador
$_FILES['attachment']['tmp_name'];  // fitxer temporal del servidor
$_FILES['attachment']['error'];     // codi d'error de l'upload
$_FILES['attachment']['size'];      // mida en bytes
```

### 1. Upload bàsic

En el cas més simple, recuperem el fitxer temporal i el movem a una carpeta del projecte:

```php
<?php
$file = $_FILES['attachment'];
$filename = basename($file['name']);
$destination = __DIR__ . '/uploads/' . $filename;

move_uploaded_file($file['tmp_name'], $destination);
```

`move_uploaded_file()` comprova que l'origen provingui d'un upload HTTP i el mou a la destinació indicada. La carpeta de destinació ha d'existir i PHP hi ha de poder escriure.

Aquest primer exemple serveix per entendre el recorregut del fitxer, però **no és suficient per a una aplicació real**: encara confia en el nom original i no comprova ni els errors ni el contingut.

#### Carpeta de destinació i permisos

Abans de fer l'upload cal crear la carpeta, per exemple amb `mkdir uploads`. El procés que executa PHP ha de tenir-hi permís d'escriptura. Ho podem comprovar des del codi:

```php
<?php
$uploadDirectory = __DIR__ . '/uploads';

if (!is_dir($uploadDirectory) || !is_writable($uploadDirectory)) {
    exit('La carpeta de destinació no existeix o no s\'hi pot escriure.');
}
```

No és recomanable donar permisos totals amb `chmod 777`; cal assignar la carpeta a l'usuari o grup que executa el servidor web i concedir només els permisos necessaris.

### 2. Comprovar que l'upload ha arribat bé

Abans de moure'l, comprovem que el camp existeix i que PHP no ha detectat cap error:

```php
<?php
$file = $_FILES['attachment'] ?? null;

if ($file === null || $file['error'] !== UPLOAD_ERR_OK) {
    exit('No s\'ha pogut rebre el fitxer.');
}
```

`UPLOAD_ERR_OK` val `0` i indica que l'upload s'ha completat. La resta de valors representen errors com un fitxer massa gran o una pujada incompleta.

Hi ha un cas especial: si tota la petició supera `post_max_size`, PHP descarta el cos abans de processar-lo i tant `$_POST` com `$_FILES` poden arribar buits. Per detectar-ho de manera senzilla:

```php
<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST' && empty($_FILES)) {
    exit('No ha arribat cap fitxer. La petició podria ser massa gran.');
}
```

`post_max_size` ha de ser superior a `upload_max_filesize`, ja que limita la petició completa i no només el fitxer.

### 3. Validar el format

El valor `$_FILES['attachment']['type']` l'envia el navegador i no és fiable. Per comprovar el contingut real podem utilitzar `mime_content_type()` i una llista de tipus admesos:

```php
<?php
$allowedTypes = [
    'application/pdf' => 'pdf',
    'text/plain' => 'txt',
];

$mimeType = mime_content_type($file['tmp_name']);

if (!isset($allowedTypes[$mimeType])) {
    exit('Format no admès.');
}
```

També podem limitar la mida indicada a `$file['size']`:

```php
<?php
$maximumSize = 2 * 1024 * 1024; // 2 MiB

if ($file['size'] > $maximumSize) {
    exit('El fitxer és massa gran.');
}
```

Els límits del codi han de ser compatibles amb `upload_max_filesize` i `post_max_size` de `php.ini`.

### 4. Generar un nom únic

No convé reutilitzar directament el nom original: es podria repetir o contenir caràcters problemàtics. Podem generar un identificador aleatori i afegir-hi l'extensió associada al tipus que ja hem validat:

```php
<?php
$extension = $allowedTypes[$mimeType];
$uniqueName = bin2hex(random_bytes(16)) . '.' . $extension;
$destination = __DIR__ . '/uploads/' . $uniqueName;

if (!move_uploaded_file($file['tmp_name'], $destination)) {
    exit('No s\'ha pogut desar el fitxer.');
}
```

`random_bytes()` genera bytes aleatoris i `bin2hex()` els converteix en un text segur per utilitzar com a nom de fitxer.

Les funcions que hem fet servir són:

- `isset()` comprova que el camp existeix.
- `mime_content_type()` detecta el tipus real del contingut.
- `move_uploaded_file()` mou el temporal a la destinació definitiva.
- `random_bytes()` genera dades aleatòries adequades per crear identificadors.
- `bin2hex()` converteix bytes en una cadena hexadecimal.

## Obtenir els fitxers d'una carpeta

`glob()` retorna les rutes que coincideixen amb un patró. Per exemple, podem obtenir tots els fitxers de text d'una carpeta:

```php
<?php
$files = glob(__DIR__ . '/documents/*.txt');

foreach ($files as $file) {
    echo basename($file) . '<br>';
}
```

`basename()` deixa només el nom del fitxer. Amb `GLOB_BRACE` es poden cercar diverses extensions: `*.{txt,md}`. Una alternativa és `scandir()`, que retorna totes les entrades de la carpeta, incloses `.` i `..`, i obliga a filtrar-les.

## Escriure i llegir un fitxer de text

Per a un fitxer complet, les funcions més directes són `file_put_contents()` i `file_get_contents()`:

```php
<?php
$text = "Primera línia\nSegona línia\n";
file_put_contents('notes.txt', $text, LOCK_EX);

$contents = file_get_contents('notes.txt');
echo nl2br(htmlspecialchars($contents, ENT_QUOTES, 'UTF-8'));
```

`LOCK_EX` demana un bloqueig exclusiu mentre s'escriu. Per afegir contingut sense esborrar l'anterior s'utilitza `FILE_APPEND | LOCK_EX`. Per processar el fitxer línia a línia es pot obrir amb `fopen()`, llegir amb `fgets()` i tancar amb `fclose()`.

```php
<?php
$file = fopen('notes.txt', 'r');

while (($line = fgets($file)) !== false) {
    echo htmlspecialchars($line, ENT_QUOTES, 'UTF-8') . '<br>';
}

fclose($file);
```

Els modes més habituals de `fopen()` són `r` (llegir), `w` (escriure esborrant el contingut) i `a` (afegir al final).

## Escriure i llegir un CSV

Un CSV representa una taula: cada línia és una fila i els camps estan separats habitualment per comes. `fputcsv()` s'encarrega d'escapar els camps quan escrivim:

```php
<?php
$rows = [
    ['nom', 'edat'],
    ['Aina', 21],
    ['Biel', 19],
];

$file = fopen('people.csv', 'w');

foreach ($rows as $row) {
    fputcsv($file, $row, ',', '"', '');
}

fclose($file);
```

`fgetcsv()` fa el procés invers i retorna un array per cada fila:

```php
<?php
$file = fopen('people.csv', 'r');

while (($row = fgetcsv($file, null, ',', '"', '')) !== false) {
    [$name, $age] = $row;
    echo htmlspecialchars("$name: $age", ENT_QUOTES, 'UTF-8') . '<br>';
}

fclose($file);
```

Cal usar sempre `fputcsv()` i `fgetcsv()` en lloc de concatenar o separar les comes manualment: un camp pot contenir comes, cometes o salts de línia.
