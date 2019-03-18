<?php
/*
 * PHP Techdegree Project 2: Build a Quiz App in PHP
 */

// Include questions
include("generate_questions.php");

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
if ($page > 11) {
  header("location:gameover.php");
  exit;
}

//take input
$input = trim(filter_input(INPUT_POST, 'input', FILTER_SANITIZE_NUMBER_INT));

// set session variables for use in index and to track the index(set) of questions
$set = $page - 1;
$_SESSION['set'] = $set;
$_SESSION['quiz'] = json_decode(file_get_contents('inc/questions.json'),true);
$score =  $_SESSION['score'];
$toast =  $_SESSION['toast'];
$total = count($_SESSION['quiz']);
$firstNumber = $_SESSION['quiz'][$set]['leftAdder'];
$secondNumber = $_SESSION['quiz'][$set]['rightAdder'];
$correctAnswer = $_SESSION['quiz'][$set]['correctAnswer'];
$answers = [
  $_SESSION['quiz'][$set]['correctAnswer'],
  $_SESSION['quiz'][$set]['firstIncorrectAnswer'],
  $_SESSION['quiz'][$set]['secondIncorrectAnswer']
];
//shuffle answers
shuffle($answers);

// check input against correct answer set toast accordingly
if((!empty($input)) && ($_SESSION['set'] < $total)) {
  if ($_SESSION['quiz'][$set - 1]['correctAnswer'] == $input) {
    $_SESSION['score']++;
    $toast = "correct";
  } else {
    $toast = "incorrect";
  }
}
