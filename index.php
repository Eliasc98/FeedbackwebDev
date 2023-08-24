<?php include 'inc/header.php' ?>

<?php
$name = $email = $body = '';
$errName = $errEmail = $errBody = '';

if (isset($_POST['submit'])) {

  // For name:
  if (empty($_POST['name'])) {
    $errName = 'Please insert your name';
  } else {
    $name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_SPECIAL_CHARS);
  }

  // For email:
  if (empty($_POST['email'])) {
    $errEmail = 'Please insert your email';
  } else {
    $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_SPECIAL_CHARS);
  }

  //for body:

  if (empty($_POST['body'])) {
    $errBody = 'Please insert feedback';
  } else {
    $body = filter_input(INPUT_POST, 'body', FILTER_SANITIZE_SPECIAL_CHARS);
  }

  if (empty($errName) && empty($errBody)  &&  empty($errEmail)) {

    //Add to database
    $ins = "insert into `new feedback` (Name, Email, Body) values ('$name', '$email', '$body')";
    $message = '';
    if (mysqli_query($conn, $ins)) {
      $message = "Feedback Submitted Successfully!";
    } else {
      echo 'Error: ' . mysqli_error($conn);
    }
  }
}

?>
<img src="img/logo.png" class="w-25 mb-3" alt="">
<h2>Feedback</h2>

<p class="lead text-center">Leave feedback for Damilare</p>


<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method='post' class="mt-4 w-75">


  <?php if (!empty($message)) : ?>
    <div class="bg-success text-center text-white"><?php echo $message; ?></div>
  <?php endif; ?>

  <div class="mb-3">
    <label for="name" class="form-label">Name</label>
    <input type="text" class="form-control <?php echo $errName ? 'is-invalid' : null ?>" id="name" name="name" placeholder="Enter your name">
    <div class="invalid-feedback">
      <?php echo $errName; ?>
    </div>
  </div>
  <div class="mb-3">
    <label for="email" class="form-label">Email</label>
    <input type="email" class="form-control <?php echo $errEmail ? 'is-invalid' : null ?>" id="email" name="email" placeholder="Enter your email">
    <div class="invalid-feedback">
      <?php echo $errEmail; ?>
    </div>
  </div>
  <div class="mb-3">
    <label for="body" class="form-label">Feedback</label>
    <textarea class="form-control <?php echo !$errBody ?: 'is-invalid'; ?>" id="body" name="body" placeholder="Enter your feedback"></textarea>
    <div class="invalid-feedback">
      <?php echo $errBody; ?>
    </div>
  </div>
  <div class="mb-3">
    <input type="submit" name="submit" value="Send" class="btn btn-dark w-100">
  </div>
</form>
<?php include 'inc/footer.php' ?>