<?php include 'inc/header.php'; ?>
<?php include 'inc/quiz.php'; ?>

  <?php if ($toast == "correct") { ?>
    <div class='correct-toast'>
      <h2>Nice Job! That's correct!</h2>
    </div>
  <?php } ?>
  <?php if ($toast == "incorrect") { ?>
    <div class='incorrect-toast'>
      <h2>Dang! That's the wrong answer. Keep trying! You got this!</h2>
    </div>
  <?php } ?>

  <div class="scoreboard">
    <h1> SCORE: <?php echo $score; ?> / <?php echo $total; ?> </h1>
  </div>

  <div id="quiz-box">
    <p class='breadcrumbs'>Question <?php echo $page; ?> of <?php echo $total; ?></p>
    <p class='quiz'>What is <?php echo $firstNumber; ?> + <?php echo $secondNumber; ?></p>
    <form method="post" action="index.php?p=<?php echo ($page + 1); ?>">
      <input type='hidden' name='id' value='0' />
      <?php foreach ($answers as $answer) { ?>
        <input type='submit' class='btn' name='input' value='<?php echo $answer; ?>' />
      <?php } ?>
    </form>
  </div>

<?php include 'inc/footer.php'; ?>
