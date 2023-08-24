<?php include 'inc/header.php' ?>
<?php
$sql = 'SELECT * FROM `new feedback`';
$result = mysqli_query($conn, $sql);
$feedback = mysqli_fetch_all($result, MYSQLI_ASSOC);
?>
<h2>Feedback</h2>
<?php if (empty($feedback)) : ?>

  <p class="lead mt3">No feedback</p>

<?php endif; ?>

<?php foreach ($feedback as $item) : ?>
  <div class="card my-3 w-75">
    <div class="card-body text-center">
      <?php echo $item['Body']; ?>
      <div class="text-secondary mt-2">
        by <?php echo $item['Name'] . " with the email adress: " . $item['Email'] . ' on ' . $item['Date'] ?>
      </div>
    </div>
  </div>
<?php endforeach; ?>

<?php include 'inc/footer.php' ?>