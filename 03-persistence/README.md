# 03 First steps on persistence

In this session, we will explore how to **store data across multiple requests** using PHP.  
You will learn about sessions, cookies, and files as techniques for persistence.

---

## What We Will Do

1. **Personalized Greetings with Sessions**  
   - Keep a list of all greeted names.  
   - Maintain a counter of greetings using **sessions**.  

2. **Personalized Greetings with Cookies**  
   - Repeat the same example but using **cookies** to store the data.  

3. **Link Manager**  
   - Implement three different versions of the link manager:  
     - Using **sessions**.  
     - Using **cookies**.  
     - Using **files**. 

---

## Persistence

### 1. Sessions
- A **session** stores data on the server for each user.
- PHP uses a session identifier (session ID) to connect the user to their session.

```php
<?php
session_start();

if (!isset($_SESSION["name"])) {
    $_SESSION["name"] = "Guest";
}

echo "Hello, " . $_SESSION["name"];
```

---

### 2. Cookies
- A **cookie** is a small piece of data stored in the user’s browser.
- Useful for remembering preferences across visits.

```php
<?php
// Set a cookie for 1 hour
setcookie("username", "Alice", time() + 3600);

if (isset($_COOKIE["username"])) {
    echo "Welcome back, " . $_COOKIE["username"];
}
```

---

### 3. Files
- We can save data to a file for persistence.
- Basic functions:
  - `file_put_contents("file.txt", $data);`
  - `file_get_contents("file.txt");`

Example:
```php
<?php
$link = "https://example.com";
file_put_contents("links.txt", $link . "\n", FILE_APPEND);

$links = file("links.txt");
foreach ($links as $l) {
    echo $l . "<br>";
}
```

---

## Summary
- **Sessions** → store temporary user data on the server.
- **Cookies** → store small pieces of data on the client side.
- **Files** → allow persistence of larger or structured data between executions.

👉 In the exercises, we will:
1. Add a session-based personalized greeting.  
2. Use cookies to remember a user’s preference.  
3. Modify the link manager to read and write links from a file.


## PHP Arrays and Strings Basics

In this guide, we will review some useful functions to work with **arrays** and **strings** in PHP.

---

### Arrays

#### 1. `array_splice`
The function `array_splice` allows you to **remove or replace** a portion of an array.

```php
<?php
$fruits = ["apple", "banana", "cherry", "date"];

// Remove 2 elements starting from index 1
array_splice($fruits, 1, 2);

print_r($fruits); // ["apple", "date"]
```

---

#### 2. Add Elements to an Array
You can add elements at the **end**, the **beginning**, or directly with the `[]` operator.

```php
<?php
$numbers = [2, 3, 4];

// Add element at the end
array_push($numbers, 5); // [2, 3, 4, 5]

// Add element at the beginning
array_unshift($numbers, 1); // [1, 2, 3, 4, 5]

// Add element directly
$numbers[] = 6; // [1, 2, 3, 4, 5, 6]
```

#### 3. Remove Elements from an Associative Array
To remove elements, you can use the `unset` function.

```php
<?php
$data = ["apple" => 10, "banana" => 15, "Kiwi" => 3];

// Remove element with key "banana"
unset($data["banana"]);

print_r($data); // ["apple" => 10,  "Kiwi" => 3]

// Remove element with key "apple"
unset($data["apple"]);

print_r($data); // ["Kiwi" => 3]
```

---

### Strings

#### 1. Concatenation
Strings can be concatenated with the `.` operator.

```php
<?php
$first = "Hello";
$second = "World";

echo $first . " " . $second; // Hello World
```

---

#### 2. Search in a String
The function `strpos` returns the position of the first occurrence of a substring.  
If the substring is not found, it returns `false`.

```php
<?php
$sentence = "PHP is fun!";

$pos = strpos($sentence, "fun");
if ($pos !== false) {
    echo "Found at position $pos"; // Found at position 7
}
```

---

#### 3. Other Useful String Functions

- **`strlen($str)`** → Returns the length of the string.
- **`strtoupper($str)`** → Converts the string to uppercase.
- **`strtolower($str)`** → Converts the string to lowercase.
- **`substr($str, $start, $length)`** → Extracts part of a string.
- **`trim($str)`** → Removes whitespace (or other characters) from the beginning and end of a string.
- **`explode($delimiter, $str)`** → Splits a string into an array using a delimiter.

```php
<?php
$text = "   Hello World   ";

echo strlen($text);        // 15
echo trim($text);          // "Hello World"
echo strtoupper($text);    // "   HELLO WORLD   "
echo strtolower($text);    // "   hello world   "
echo substr($text, 0, 5);  // "   He"

// Using explode
$csv = "apple,banana,cherry";
$fruits = explode(",", $csv);
print_r($fruits); // ["apple", "banana", "cherry"]
```

---

### Summary
- **Arrays**: Use `array_splice` to modify arrays, `array_push` to add at the end, `array_unshift` to add at the beginning, and `$a[] = value` to add quickly and `unset` to remove elements. 
- **Strings**: Concatenate with `.`, search using `strpos`, and transform or extract using functions like `strlen`, `strtoupper`, `substr`, `trim`, and `explode`.
