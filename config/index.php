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
const GITHUB_CLIENT_ID = "your_client_id";
const GITHUB_CLIENT_SECRET = "your_client_secret";
const GITHUB_CLIENT_CALLBACK_URI = BASE_PATH."github-callback.php";

