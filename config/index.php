<?php
ob_start();
session_start();

require dirname(__FILE__).'/../vendor/autoload.php';

CONST BASE_PATH = 'http://localhost/mai/';

const DB_HOST = 'localhost';
const DB_USER = 'root';
const DB_PASSWORD = '';
const DB_NAME = 'mai';

/**
 * Github Client
 */
const GITHUB_CLIENT_ID = "cd56ae8a18c5a7c6f8f1";
const GITHUB_CLIENT_SECRET = "8ed897f31ec3d20133ca92beba57bee1c2364242";
const GITHUB_CLIENT_CALLBACK_URI = BASE_PATH."github-callback.php";

