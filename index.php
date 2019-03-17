<?php include 'inc/header.php'; ?>
<?php include 'inc/quiz.php'; ?>

  <div id="quiz-box">
    <form method="post" action="index.php?p=<?php echo ($page+1); ?>">
    <p class='breadcrumbs'>Question <?php echo $page; ?> of <?php echo $total; ?></p>
    <p class='quiz'>What is <?php echo $firstNumber; ?> + <?php echo $secondNumber; ?></p>
    <form method='post'>
      <input type='hidden' name='id' value='0' />
      <?php foreach ($answers as $answer) { ?>
        <input type='submit' class='btn' name='input' value='<?php echo $answer; ?>' />
      <?php } ?>
    </form>
  </div>

<?php include 'inc/footer.php'; ?>
