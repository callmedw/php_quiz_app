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
  $answersArray = [];
  do {
    $random = random_int($correctAnswer - 10, $correctAnswer + 10);
    if ($random != $correctAnswer && !in_array($random, $answersArray)) {
      $answersArray[] = $random;
    }
  } while (count($answersArray) <= 2);
  return $answersArray;
}

// Generate random questions
// Loop for required number of questions
function buildQuiz() {
  for ($i = 0; $i <= 9; $i++) {
    $randomNumbers = getRandomNumbers();
    $correctAnswer = getCorrectAnswer($randomNumbers);
    $answers = getRandomAnswers($correctAnswer);
    $quiz[] = [
      "leftAdder" => $randomNumbers[0],
      "rightAdder" => $randomNumbers[1],
      "correctAnswer" => $correctAnswer,
      "firstIncorrectAnswer" => $answers[0],
      "secondIncorrectAnswer" => $answers[1],
    ];
  }
  return $quiz;
}

// Add question and answer to questions array
// Write quiz to JSON file (inc/questions.json)
function writeQuiz() {
  $jsonQuiz = json_encode(buildQuiz(), JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES);
  try {
    file_put_contents ('inc/questions.json', $jsonQuiz);
  }
  catch(Exception $e) {
    echo "Error: " . $e->getMessage();
  }
}
