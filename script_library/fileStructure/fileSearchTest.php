<?php
/**
 * Created by PhpStorm.
 * User: Recreational
 * Date: 2/5/2017
 * Time: 11:07 AM
 */

require_once ("fileSearch.php");

use FileStructure\FileSearch;

$fileSearch = new FileSearch();

$fileArray = FileSearch::SearchForExtension($_SERVER['DOCUMENT_ROOT'] . "/videos", "mp4");

