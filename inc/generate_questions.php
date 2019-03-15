<?php

// Get random numbers to add
function getRandomNumbers() {
  return array(random_int(0,132), random_int(0,132));
}

// Calculate correct answer
function getCorrectAnswer($randomNumbers) {
  return array_sum($randomNumbers);
}

// Generate random questions
// Loop for required number of questions
// Get incorrect answers within 10 numbers either way of correct answer
// Make sure it is a unique answer
// Add question and answer to questions array
