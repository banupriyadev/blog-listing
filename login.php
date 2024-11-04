<?php
if (!empty($_POST)) {
  $errors = [];

  // Prepare the SQL query to prevent SQL injection
  $query = "SELECT * FROM users WHERE email = :email LIMIT 1";
  $row = query($query, ['email' => $_POST['email']]);

  if ($row) {
      // Check if the password matches
      if (password_verify($_POST['password'], $row[0]['password'])) {
          // Grant access by authenticating the user
          authenticate($row[0]);
          redirect('admin');
      } else {
          // Add an error if the password is incorrect
          $errors['comd'] = "Incorrect password";
      }
  } else {
      // Add an error if the email does not exist
      $errors['comd'] = "Incorrect email";
  }

  // Optionally, you can handle errors here, e.g., displaying them to the user
}


?>

<!doctype html>
<html lang="en" data-bs-theme="auto">
  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    
    <title>Signin - <?=APP_NMAE?></title>

    

<link href="<?=ROOT?>/assets/bootstrap/bootstrap.min.css" rel="stylesheet">

    
    
    <!-- Custom styles for this template -->
    <link href="<?=ROOT?>/assets/css/sign-in.css" rel="stylesheet">
  </head>
  <body class="d-flex align-items-center py-4 bg-body-tertiary">
    

   
    
<main class="form-signin w-100 m-auto">
  <form method="post">
    <a href="home">
    <img class="mb-2" src="<?=ROOT?>/assets/images/logo.png" alt="" width="148" height="110">
    </a>
    
    <h1 class="h3 mb-3 fw-normal">Please sign in</h1>
    
    <?php if(!empty($errors['comd'])):?>
   <div class="alert alert-danger"><?=$errors['comd']?></div>
    <?php endif;?>
    <div class="form-floating">
      <input name="email" value="<?=old_value('email')?>" type="email" class="form-control mb-2" id="floatingInput" placeholder="name@example.com">
      <label for="floatingInput">Email address</label>
    </div>
    <div class="form-floating">
    <input name="password" value="<?=old_value('password')?>" type="password" class="form-control mb-2" id="floatingPassword" placeholder="Password">
    <label for="floatingPassword">Password</label>
    <span id="togglePassword" class="eye-icon">👁️</span>
</div>

    <div class="my-2">Don't have an account? <a href="<?=ROOT?>/signup">SignUp Here</a></div>
    <div class="form-check text-start my-3">
      <input name="remember" class="form-check-input" type="checkbox" value="remember-me" id="flexCheckDefault">
      <label class="form-check-label" for="flexCheckDefault">
        Remember me
      </label>
    </div>
    <button class="btn btn-primary w-100 py-2" type="submit">Sign in</button>
    <p class="mt-5 mb-3 text-body-secondary">&copy; <?php echo date("Y");?> Pranaya Weddings</p>
  </form>
</main>
<script src="<?=ROOT?>/assets/boootstrap/bootstrap.min.js"></script>

<script>
  const togglePassword = document.getElementById('togglePassword');
const passwordInput = document.getElementById('floatingPassword');

togglePassword.addEventListener('click', () => {
    const type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
    passwordInput.setAttribute('type', type);
    togglePassword.textContent = type === 'password' ? '👁️' : '🙈';
});


</script>

    </body>
</html>
