<?php
session_start();

// Get random numbers to add
function getRandomNumbers() {
  return array(random_int(0,132), random_int(0,132));
}

// Calculate correct answer
function getCorrectAnswer($randomNumbers) {
  return array_sum($randomNumbers);
}

// Get incorrect answers within 10 numbers either way of correct answer
// Make sure it is a unique answer
function getRandomAnswers($correctAnswer) {
  $answersArray[] = $correctAnswer;
  do {
    $random = random_int($correctAnswer - 10, $correctAnswer + 10);
    if ($random != $correctAnswer) {
      $answersArray[] = $random;
    }
  } while (count($answersArray) <= 2);
  shuffle($answersArray);
  return $answersArray;
}

// Generate random questions
function getQuestion($randomNumbers) {
  $question = "What is $randomNumbers[0] + $randomNumbers[1]?";
  return $question;
}

// Add question and answer to questions array
function buildQuiz() {
  $randomNumbers = getRandomNumbers();
  $question = getQuestion($randomNumbers);
  $correctAnswer = getCorrectAnswer($randomNumbers);
  $answers = getRandomAnswers($correctAnswer);
  $quiz = [];
  $quiz[$question] = $answers;
  return $quiz;
}

// Loop for required number of questions
print_r(buildQuiz());
