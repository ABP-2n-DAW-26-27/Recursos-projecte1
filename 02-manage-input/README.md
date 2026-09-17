# 02 Manage input

In this session, we will extend the previous examples by adding **user input management**.
You will learn how to read data from forms and links, and how to use conditions to control the program flow.

---

## What We Will Do

1. **Personalized Hello World**

   * We will update the Hello World example so it greets the user by their name.
   * The name will be passed using a form or a link (query string).

2. **Adding Links**

   * We will extend the link manager so new links can be added through a form.
   * These links will be displayed in the list along with the existing ones.

---

## 1. Conditional Statements – `if`

With conditions, we can execute different code depending on a logical test.

```php
<?php
$name = "Alice";

if ($name == "Alice") {
    echo "Hello Alice!";
} else {
    echo "Hello stranger!";
}
```

---

## 2. PHP Superglobals: `$_GET` and `$_POST`

* **`$_GET`** → collects data sent through the URL (query string).
  Example: `http://localhost:8080/hello.php?name=Alice`

  ```php
  echo $_GET["name"]; // Alice
  ```

* **`$_POST`** → collects data sent through a form with method="post".
  Example form:

  ```html
  <form method="post">
      <input type="text" name="name">
      <button type="submit">Send</button>
  </form>
  ```

  ```php
  echo $_POST["name"];
  ```

---

## 3. Checking if a Variable Exists

When working with user input, we should first check if the variable exists.

* **`isset($var)`** → returns `true` if the variable is defined and not `null`.
* **`is_null($var)`** → returns `true` if the variable is explicitly `null`.

```php
if (isset($_GET["name"])) {
    echo "Hello, " . $_GET["name"];
} else {
    echo "Hello, guest!";
}
```

---

## 4. Basic Sanitization

Never trust user input directly. Always sanitize it before displaying or storing it.

* **`htmlspecialchars()`** → converts HTML special characters to prevent injection.

  ```php
  $name = htmlspecialchars($_GET["name"]);
  echo "Hello, $name"; // Safe output
  ```

* **`trim()`** → removes extra spaces.

* **`strip_tags()`** → removes HTML tags.

Example:

```php
$name = trim($_POST["name"]);
$name = strip_tags($name);
$name = htmlspecialchars($name);
```

---

## Summary

* Use **`if` statements** to control program flow.
* Use **`$_GET` and `$_POST`** to read user input from URLs and forms.
* Use **`isset()` and `is_null()`** to check variables safely.
* Always **sanitize user input** before using it.

👉 In the examples, we will:

1. Make the Hello World example greet the user by name.
2. Add a form to insert new links into our link manager.
