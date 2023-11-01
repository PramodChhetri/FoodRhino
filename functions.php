<?php

session_start();



/**
 * 
 * Database Connectivity
 *
 */

function pdo()
{
    $dbhost = "localhost"; // 127.0.0.1
    $dbname = "foodrhino";
    $dbuser = "root";
    $dbpass = "";

    $options = [
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
    ];

    $dsn = "mysql:host=" . $dbhost . ";dbname=" . $dbname;

    try {
        $pdo = new PDO($dsn, $dbuser, $dbpass, $options);
    } catch (PDOException $e) {
        die("Cannot Connect to Database: " . $e->getMessage());
    }

    return $pdo;
}

/**
 * Get Item from $_GET or $_POST with key
 *
 * @param string $key Key of Item to Fetch
 *
 * @return string|null
 */
function request($key)
{
    return $_REQUEST[$key] ?? null;
}



/**
 * Run Arbitary SQL Code
 *
 * @param string $sql SQL Code
 * @param bool $all use fetchAll() or fetch()
 * @return array|false
 */
function query($sql, $all = true)
{
    $pdo = pdo();
    $stmt = $pdo->prepare($sql);
    $stmt->execute();

    if ($all) {
        return $stmt->fetchAll();
    }

    return $stmt->fetch();
}


/**
 * Use SELECT * FROM TABLE WHERE `sth` = 'val'
 *
 * @param string $table Table Name
 * @param string $col Column Name
 * @param string $opr Operator (=, !=, >, <,...)
 * @param string $val Value to Compare
 * @param bool $all Use fetchAll() or fetch()
 *
 * @return array|false
 */
function where($table, $col, $opr, $val, $all = true)
{
    $pdo = pdo();
    $stmt = $pdo->prepare("SELECT * FROM $table WHERE $col $opr ?");
    $stmt->execute([$val]);

    if ($all) {
        return $stmt->fetchAll();
    }

    return $stmt->fetch();
}


function where2($table, $col, $opr, $val, $currentid,  $all = true)
{
    $pdo = pdo();
    $stmt = $pdo->prepare("SELECT * FROM $table WHERE $col $opr ? AND ID != $currentid");
    $stmt->execute([$val]);

    if ($all) {
        return $stmt->fetchAll();
    }

    return $stmt->fetch();
}

/**
 * Find ITEM on $table by their $ID
 *
 * @param string $table Table Name
 * @param int $ID ID of the Item in table
 *
 * @return array|false
 */
function find($table, $ID)
{
    return where($table, 'ID', '=', $ID, false);
}

/**
 * Get all Items in Table
 *
 * @param string $table
 *
 * @return array|false
 */
function all($table)
{
    $pdo = pdo();

    $stmt = $pdo->prepare("SELECT * FROM $table");
    $stmt->execute();

    return $stmt->fetchAll();
}

/**
 * Count Number of Rows in Table
 *
 * @param string $table Table Name
 * @return int
 */
function count_item($table)
{
    $pdo = pdo();

    $stmt = $pdo->prepare("SELECT count(*) FROM $table");
    $stmt->execute();

    return $stmt->fetchColumn();
}

function count_item2($table, $col, $opr, $val)
{
    $pdo = pdo();

    $stmt = $pdo->prepare("SELECT count(*) FROM $table WHERE $col $opr $val");
    $stmt->execute();

    return $stmt->fetchColumn();
}

/**
 * Create Data from Associative Array
 *
 * @param string $table Table to Create Item
 * @param array $data Associative array of data to insert.
 *
 * @return true
 */
function create($table, $data)
{
    $keys = array_keys($data);
    $values = array_values($data);
    $length = count($keys);

    $sql = "INSERT INTO $table (";

    $i = 1;
    foreach ($keys as $k) {
        $sql = $sql . $k;
        if ($i != $length) {
            $sql = $sql . ", ";
        }
        $i++;
    }

    $sql = $sql . ") VALUES (";
    $i = 1;
    foreach ($keys as $k) {
        $sql = $sql . "?";
        if ($i != $length) {
            $sql = $sql . ", ";
        }
        $i++;
    }

    $sql = $sql . ")";

    $pdo = pdo();
    $stmt = $pdo->prepare($sql);
    $stmt->execute($values);

    return true;
}

/**
 * Update data of Item ID from Associative Array
 *
 * @param string $table Table to Update Item
 * @param int $ID ID of Item to Update
 * @param array $data Associative array of data to update.
 *
 * @return true
 */
function update($table, $ID, $data)
{

    $keys = array_keys($data);
    $values = array_values($data);
    $length = count($keys);

    $sql = "UPDATE $table SET ";
    $i = 1;
    foreach ($keys as $k) {
        $sql = $sql . " $k = ? ";
        if ($i != $length) {
            $sql = $sql . ", ";
        }
        $i++;
    }

    $sql = $sql . " WHERE ID = ?";

    $values[] = $ID;

    $pdo = pdo();
    $stmt = $pdo->prepare($sql);
    $stmt->execute($values);

    return true;
}

/**
 * Delete data from table
 *
 * @param string $table Table Name
 * @param int $ID ID of Item to Delete
 *
 * @return true
 */
function delete($table, $ID)
{
    $pdo = pdo();
    $stmt = $pdo->prepare("DELETE FROM $table WHERE ID = ?");
    $stmt->execute([$ID]);

    return true;
}



/**
 * 
 * Redirect 
 *
 */

function redirect($url)
{
    header("Location: /foodrhino/$url");
    die;
}


/**
 * 
 * Session Functions
 *
 */

function setSuccess($text)
{
    $_SESSION['success'] = $text;
}

function hasSuccess()
{
    return !empty($_SESSION['success']);
}

function getSuccess()
{
    $msg = $_SESSION['success'] ?? '';
    unset($_SESSION['success']);
    return $msg;
}

function setPassError($error)
{
    $_SESSION['passerror'] = $error;
}

function hasPassError()
{
    return !empty($_SESSION['passerror']);
}

function getPassError()
{
    $err = $_SESSION['passerror'] ?? '';
    unset($_SESSION['passerror']);

    return $err;
}

function setError($error)
{
    $_SESSION['error'] = $error;
}

function hasError()
{
    return !empty($_SESSION['error']);
}

function getError()
{
    $err = $_SESSION['error'] ?? '';
    unset($_SESSION['error']);

    return $err;
}

/**
 * 
 * For Admin Validation
 *
 */

function is_logged()
{
    if (empty($_SESSION['user_ID'])) {
        return false;
    }
    return true;
}


function user()
{
    if (is_logged()) {
        return find('users', $_SESSION['user_ID']);
    }
    return false;
}


function is_admin()
{

    $user = user();

    if (empty($user)) {
        return false;
    }

    if ($user['Role'] != "Admin") {
        return false;
    }

    return true;
}


function check_admin()
{
    if (!is_admin()) {
        die("You do not have permission to view this page!");
    }
}


/**
 * 
 * For User Validation
 *
 */

function is_user()
{

    $user = user();

    if (empty($user)) {
        return false;
    }

    if ($user['Role'] != "User") {
        return false;
    }

    return true;
}


function check_user()
{
    if (!is_user()) {
        die("You do not have permission to view this page!");
    }
}


/**
 * 
 * For Restaurant Validation
 *
 */

function is_logged_restaurant()
{
    if (empty($_SESSION['restaurant_ID'])) {
        return false;
    }
    return true;
}


function restaurant()
{
    if (is_logged_restaurant()) {
        return find('restaurant', $_SESSION['restaurant_ID']);
    }
    return false;
}


function is_restaurant()
{

    $restaurant = restaurant();

    if (empty($restaurant)) {
        return false;
    }
    return true;
}


function check_restaurant()
{
    if (!is_restaurant()) {
        die("You do not have permission to view this page!");
    }
}
