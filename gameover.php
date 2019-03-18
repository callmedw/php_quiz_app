<?php include 'inc/header.php'; ?>
<?php include 'inc/quiz.php'; ?>

  <div class="end-page-layout">
    <div class="gameover-score">
      <h1> FINAL SCORE: <?php echo $score; ?> / <?php echo $total; ?> </h1>
    </div>

    <div class="action-div">
      <a class='btn end-btn' href='index.php'>Play Again</a>
      <a class='btn end-btn' target="_blank" href='https://www.boredpanda.com/cute-kittens/'>Look at Cats</a>
    </div>
  </div>

<?php include 'inc/footer.php'; ?>
