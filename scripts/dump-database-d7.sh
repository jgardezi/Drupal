#!/usr/bin/env php
<?php

/**
 * @file
 * Dumps a Drupal 7 database into a PHP script to test the upgrade process.
 *
 * Run this script at the root of an existing Drupal 7 installation.
 *
 * The output of this script is a PHP script that can be run inside Drupal 7
 * and recreates the Drupal 7 database as dumped. Transient data from cache,
 * session, and watchdog tables are not recorded.
 */

// Define default settings.
define('DRUPAL_ROOT', getcwd());
$cmd = 'index.php';
$_SERVER['HTTP_HOST']       = 'default';
$_SERVER['REMOTE_ADDR']     = '127.0.0.1';
$_SERVER['SERVER_SOFTWARE'] = NULL;
$_SERVER['REQUEST_METHOD']  = 'GET';
$_SERVER['QUERY_STRING']    = '';
$_SERVER['PHP_SELF']        = $_SERVER['REQUEST_URI'] = '/';
$_SERVER['HTTP_USER_AGENT'] = 'console';

// Bootstrap Drupal.
include_once './includes/bootstrap.inc';
drupal_bootstrap(DRUPAL_BOOTSTRAP_FULL);

// Include the utility drupal_var_export() function.
include_once dirname(__FILE__) . '/../includes/utility.inc';

// Output the PHP header.
$output = <<<ENDOFHEADER
<?php

/**
 * @file
 * Filled installation of Drupal 7.0, for test purposes.
 *
 * This file was generated by the dump-database-d7.sh tool, from an
 * installation of Drupal 7, filled with data using the generate-d7-content.sh
 * tool. It has the following modules installed:

ENDOFHEADER;

foreach (module_list() as $module) {
  $output .= " *  - $module\n";
}
$output .= " */\n\n";

// Get the current schema, order it by table name.
$schema = drupal_get_schema();
ksort($schema);

// Export all the tables in the schema.
foreach ($schema as $table => $data) {
  // Remove descriptions to save time and code.
  unset($data['description']);
  foreach ($data['fields'] as &$field) {
    unset($field['description']);
  }

  // Dump the table structure.
  $output .= "db_create_table('" . $table . "', " . drupal_var_export($data) . ");\n";

  // Don't output values for those tables.
  if (substr($table, 0, 5) == 'cache' || $table == 'sessions' || $table == 'watchdog') {
    $output .= "\n";
    continue;
  }

  // Prepare the export of values.
  $result = db_query('SELECT * FROM {'. $table .'}', array(), array('fetch' => PDO::FETCH_ASSOC));
  $insert = '';
  foreach ($result as $record) {
    $insert .= '->values('. drupal_var_export($record) .")\n";
  }

  // Dump the values if there are some.
  if ($insert) {
    $output .= "db_insert('". $table . "')->fields(". drupal_var_export(array_keys($data['fields'])) .")\n";
    $output .= $insert;
    $output .= "->execute();\n";
  }

  $output .= "\n";
}

print $output;
