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
  do {
    $random = random_int($correctAnswer - 10, $correctAnswer + 10);
    if ($random != $correctAnswer) {
      $answersArray[] = $random;
    }
  } while (count($answersArray) <= 2);
  return $answersArray;
}

// Generate random questions
function buildFullQuestion() {
  $randomNumbers = getRandomNumbers();
  $correctAnswer = getCorrectAnswer($randomNumbers);
  $answers = getRandomAnswers($correctAnswer);
  $fullQuestion[] = [
    "leftAdder" => $randomNumbers[0],
    "rightAdder" => $randomNumbers[1],
    "correctAnswer" => $correctAnswer,
    "firstIncorrectAnswer" => $answers[0],
    "secondIncorrectAnswer" => $answers[1],
  ];
  return $fullQuestion;
}

// Add question and answer to questions array
// Loop for required number of questions
function buildQuiz() {
  $quiz = [];
  for ($i = 0; $i <= 9; $i++) {
    $quiz[] = buildFullQuestion();
  }
  return $quiz;
}
