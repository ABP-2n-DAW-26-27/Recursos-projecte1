# 01 Start

## Examples Overview

### Hello World
This folder contains a simple "Hello World" example in two versions:
- **Pure PHP** — implemented only with PHP.
- **HTML + PHP** — using HTML with embedded PHP.


### Variables and Link Manager
Next, there are an example that introduce the use of variables. These example also serve as the starting point for building a simple **link manager**.


---

## PHP Tags (quick intro)

In the examples you will find different ways of writing PHP code inside HTML or PHP files:

- `<?php ... ?>` — The standard way to open and close a PHP block in a mixed HTML file. Close with `?>` when returning to HTML.
- `<?php` (without a closing tag) — In PHP-only files the closing `?>` is optional and is often omitted to avoid accidental output (for example, trailing whitespace).
- `<?= ... ?>` — Shorthand for `<?php echo ... ?>`, useful for quickly printing variables or values.

---

## PHP Variables – A Beginner's Guide

This short guide introduces the basics of using **variables in PHP**: how to declare them, what types exist, how to use operators, and how to work with strings.

---

### 1. Declaring Variables
In PHP, all variables begin with the **`$`** symbol, followed by a name.

```php
<?php
$name = "Alice";   // a string variable
$age = 20;         // an integer variable
$isStudent = true; // a boolean variable

```

👉 Notice that you don’t declare the type explicitly — PHP decides it for you based on the value.

---

### 2. Variable Types
The most common types you will use are:

- **String** → text, written inside quotes: `"Hello World"`  
- **Integer** → whole numbers: `42`  
- **Float** → decimal numbers: `3.14`  
- **Boolean** → true/false values: `true` or `false`  
- **Array** → a collection of values: `["HTML", "CSS", "PHP", "JavaScript", "Apache", "Nginx", "MySQL"]`  
- **Null** → a variable with no value: `null`  

```php
<?php
$message = "Welcome"; // string
$year = 2025;         // integer
$price = 19.99;       // float
$active = false;      // boolean
$fruits = ["HTML", "CSS", "PHP", "JavaScript", "Apache", "Nginx", "MySQL"]; // array
$nothing = null;      // null
```

---

### 3. Basic Operators

#### Arithmetic
```php
$sum = 5 + 3;   // 8
$diff = 5 - 3;  // 2
$prod = 5 * 3;  // 15
$div = 10 / 2;  // 5
$mod = 10 % 3;  // 1
```

#### Assignment
```php
$x = 10;
$x += 5; // 15 (same as $x = $x + 5)
$x -= 2; // 13 (same as $x = $x - 2)
```

#### Comparison
```php
var_dump(5 == "5");   // true (same value, PHP converts types)
var_dump(5 === "5");  // false (different types: int vs string)
var_dump(5 > 3);      // true
```

#### Logical
```php
$a = true;
$b = false;

var_dump($a && $b); // false (AND)
var_dump($a || $b); // true  (OR)
```

---

### 4. String Interpolation
Interpolation means inserting variable values inside strings.

- With **double quotes** → variables are replaced by their values:
```php
$name = "Alice";
echo "Hello, $name!"; // Output: Hello, Alice!
```

- With **single quotes** → variables are **not** expanded:
```php
echo 'Hello, $name!'; // Output: Hello, $name!
```

- Use curly braces `{}` to avoid ambiguity:
```php
echo "Hello, {$name}!"; // Output: Hello, Alice!
```

---

✅ **Tip for beginners:** Always try your examples by running them in the PHP server to see what happens. Experiment with changing the values of variables!


## Iterating Over Arrays in PHP

This guide explains how to **loop through arrays** in PHP using different techniques.  
Arrays are very common in PHP, so understanding how to process them is essential.

---

### 1. The `foreach` Loop
The easiest and most common way to loop through arrays.

```php
<?php
$fruits = ["apple", "banana", "cherry"];

foreach ($fruits as $fruit) {
    echo $fruit . "<br>";
}
```
✅ Output:
```
apple
banana
cherry
```

---

### 2. `foreach` with Key and Value
You can also access both the **key** (index) and the **value**.

```php
<?php
$prices = [
    "apple" => 1.2,
    "banana" => 0.8,
    "cherry" => 2.5
];

foreach ($prices as $fruit => $price) {
    echo "$fruit costs $price €<br>";
}
```
✅ Output:
```
apple costs 1.2 €
banana costs 0.8 €
cherry costs 2.5 €
```

---

### 3. The `for` Loop
Useful when you need to work with **numeric indexes**.

```php
<?php
$numbers = [10, 20, 30, 40];

for ($i = 0; $i < count($numbers); $i++) {
    echo "Index $i: " . $numbers[$i] . "<br>";
}
```

---

### 4. The `while` Loop
Can also be used, but less common for arrays. Usually combined with a **counter**.

```php
<?php
$colors = ["red", "green", "blue"];
$i = 0;

while ($i < count($colors)) {
    echo $colors[$i] . "<br>";
    $i++;
}
```

---

### Summary
- Use **`foreach`** for simple iteration.  
- Use **`foreach ($array as $key => $value)`** when you need both keys and values.  
- Use **`for`** or **`while`** when working with numeric indexes.  

👉 Practice by creating an array of your favorite things (movies, games, cities, etc.) and loop through them using all these methods!
