# Project 1 – Example Code

This repository contains example files to help you with the first project in the professional module **P0613: Desenvolupament web en entorn servidor**.

## Repository Structure

### 01-start
- This folder contains:
  - Basic "Hello World" in PHP
  - Embedding PHP inside HTML
  - Introduction to variables
  - Iterating arrays
- Focus: Getting comfortable with PHP syntax and basic operations.

### 02-manage-input
- This folder contains:
  - Handling **user input** via forms and links
  - Using **conditional statements (`if`)**
  - PHP **superglobals** `$_GET` and `$_POST`
  - Checking variables with `isset()` and `is_null()`
  - Basic **data sanitization** techniques
- Examples:
  - Personalizing the "Hello World" message
  - Adding links to a list dynamically

### 03-persistence
- This folder contains:
  - Storing data using **sessions** and **cookies**
  - Managing data in **files**
  - Combining sessions/cookies/files with the link manager
- Examples:
  - Count and track greeted names with sessions and cookies
  - Three versions of the link manager: using sessions, cookies, and files

### docker
- Contains a **Dockerfile** to create a container with **Apache and PHP**.
- Use this container with `dphp` script to run and test the examples safely in a consistent environment.

### mockup
- Contains the **mockup of the link manager application**.
- This can be used as a reference in the examples across sessions.


## Running the Examples

You have two options to run the examples locally: a quick and easy way, or a more advanced method using Docker that's closer to a production environment.

### Option 1: Quick Web Server (PHP Only)

This option is perfect if you just need to quickly test a single PHP file.

1.  Open your terminal.
2.  Navigate to the example folder you want to run.
3.  Execute the following command:

```sh
php -S localhost:8080
```

Now you can open your browser and access `http://localhost:8080`.

-----

### Option 2: Docker Development Environment 

It allows you to run the examples in an isolated and consistent environment, similar to a real-world project.

**Requirements:**

  - You must have **Docker** installed on your system.

#### How to Use It

The repository includes a script named **`dphp`** that allows you to easily interact with the Docker environment. You can **download it here**.

1.  **Start a Web Server**
    If you don't specify a file or folder name, `dphp` will start a web server for the current directory.

    ```sh
    ./dphp
    ```

    Open your browser and access **`http://localhost:8080`**.

2.  **Start a Web Server for a Specific Folder**
    If you want to run a specific example folder that's not the current one, you can specify it as an argument.

    ```sh
    ./dphp folder_name
    ```

    The web server will start at `http://localhost:8080`, but it will serve the files from the `folder_name` directory.

3.  **Execute a PHP File**
    If you only want to run a PHP file from the command line, as you would a regular script, do the following:

    ```sh
    ./dphp file_name.php
    ```

4.  **Rebuild the Docker Image**
    If you have made changes to the Docker configuration (for example, if you've modified the `Dockerfile`), you can force a rebuild of the image with the `-r` option.

    ```sh
    ./dphp -r
    ```