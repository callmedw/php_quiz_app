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

// reset the score and the toasts
if(!isset($_SESSION['score'])) {
  $_SESSION['score'] = 0;
}

if(!isset($_SESSION['toast'])) {
  $_SESSION['toast'] = NULL;
}

// once all questions are asked redirect to gameover page
if ($page > 10) {
  header("location:gameover.php");
  exit;
}


//take input
$input = trim(filter_input(INPUT_POST, 'input', FILTER_SANITIZE_NUMBER_INT));
