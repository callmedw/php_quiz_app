<?php

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
function getFullQuestion() {
  $randomNumbers = getRandomNumbers();
  $question = getQuestion($randomNumbers);
  $correctAnswer = getCorrectAnswer($randomNumbers);
  $answers = getRandomAnswers($correctAnswer);
  $fullQuestion = [];
  $fullQuestion[$question] = $answers;
  return $fullQuestion;
}

// Loop for required number of questions
function buildQuiz() {
  $quiz = [];
  for ($i = 0; $i <= 9; $i++) {
    $quiz[] = getFullQuestion();
  }
  return $quiz;
}

print_r(buildQuiz());
