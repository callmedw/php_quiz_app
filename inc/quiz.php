<?php
/*
 * PHP Techdegree Project 2: Build a Quiz App in PHP
 */

// Include questions
include("generate_questions.php");
session_start();

// Show which question they are on
$page = filter_input(INPUT_GET, 'p', FILTER_SANITIZE_NUMBER_INT);

// end last session and build a new quiz
if (empty($page)) {
  session_destroy();
  $page = 1;
  writeQuiz();
}
