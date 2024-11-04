<?php
if(!empty($_POST)) {


  $errors = [];

  if(empty($_POST['username'])) {
      $errors['username'] = "A username is required";
  } elseif(!preg_match("/^[a-zA-Z]+$/", $_POST['username'])) {
      $errors['username'] = 'Username can only have letters and no space';
  }
   
  if (empty($_POST['email'])) {
    $errors['email'] = "An email is required";
} else {
    // Validate email format
    if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
        $errors['email'] = "Invalid email format";
    } else {
        // Proceed to check for existing email
        $query = "SELECT id FROM users WHERE email = :email";
        $params = ['email' => $_POST['email']];
        $emailResult = query($query, $params); // Execute query

        if ($emailResult) {
            $errors['email'] = 'That email is already in use';
        }
    }
}


  if(empty($_POST['password'])) {
      $errors['password'] = "A password is required";
  } elseif(strlen($_POST['password']) < 8) {
      $errors['password'] = 'Password must be 8 characters or more';
  }elseif($_POST['password'] !== $_POST['retype_password']) {
    $errors['password'] = 'passwords do not match to retype password';
  }
  
  if(empty($_POST['terms'])) {
    $errors['terms'] = "Please accept terms & condtiions";
   } 

  if(empty($errors)) {
      // Save to database
      $data = [
          'username' => $_POST['username'],
          'email'    => $_POST['email'],
          'password' => password_hash($_POST['password'], PASSWORD_DEFAULT),
          'role'     => "user"
      ];

      $query = "INSERT INTO users(username, email, password, role) VALUES(:username, :email, :password, :role)";
      query($query, $data);
      
      redirect('login');
  }
}

?>

<!doctype html>
<html lang="en" data-bs-theme="auto">
  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    
    <title> Signup <?=APP_NMAE?></title>

    

   

<link href="<?=ROOT?>/assets/bootstrap/bootstrap.min.css" rel="stylesheet">

    
    
    <!-- Custom styles for this template -->
    <link href="<?=ROOT?>/assets/css/sign-in.css" rel="stylesheet">
  </head>
  <body class="d-flex align-items-center py-4 bg-body-tertiary">
    

   
    
<main class="form-signin w-100 m-auto">
  <form method="post" action="">
    <a href="home">
        <img class="mb-2" src="<?=ROOT?>/assets/images/pranaya-weddings.jfif" alt="" width="98" height="110">
    </a>

    <h1 class="h3 mb-3 fw-normal">Create An Account</h1>
    <?php if(!empty($errors)): ?>
        <div class="alert alert-danger">Please fix the errors below</div>
    <?php endif; ?>
    
    <div class="form-floating">
        <input name="username" value="<?=old_value('username')?>" type="text" class="form-control mb-2" id="floatingUsername" placeholder="Username">
        <label for="floatingUsername">Username</label>
    </div>
    <?php if(!empty($errors["username"])): ?>
        <div class="text-danger"><?=$errors["username"]?></div>
    <?php endif; ?>

    <div class="form-floating">
        <input name="email" value="<?=old_value('email')?>" type="email" class="form-control mb-2" id="floatingEmail" placeholder="name@example.com">
        <label for="floatingEmail">Email address</label>
    </div>
    <?php if(!empty($errors["email"])): ?>
        <div class="text-danger"><?=$errors["email"]?></div>
    <?php endif; ?>

    <div class="form-floating">
        <input name="password" type="password" value="<?=old_value('password')?>"  class="form-control mb-2" id="floatingPassword" placeholder="Password">
        <label for="floatingPassword">Password</label>
    </div>
    <?php if(!empty($errors["password"])): ?>
        <div class="text-danger"><?=$errors["password"]?></div>
    <?php endif; ?>

    <div class="form-floating">
        <input name="retype_password" value="<?=old_value('retype_password')?>"  type="password" class="form-control mb-2" id="floatingRetypePassword" placeholder="Retype Password">
        <label for="floatingRetypePassword">Retype Password</label>
    </div>

    <div class="my-2">Already have an account? <a href="<?=ROOT?>/login">Login Here</a></div>

    <div class="form-check text-start my-3">
        <input name="terms" <?=old_checked('terms')?> class="form-check-input" type="checkbox" id="flexCheckDefault">
        <label class="form-check-label" for="flexCheckDefault">
            Accept Terms & Conditions
        </label>
        <?php if(!empty($errors["terms"])): ?>
            <div class="text-danger"><?=$errors["terms"]?></div>
        <?php endif; ?>
    </div>

    <button class="btn btn-primary w-100 py-2" type="submit">Create An Account</button>
    <p class="mt-5 mb-3 text-body-secondary">&copy; <?php echo date("Y");?> Pranaya Weddings</p>
</form>

</main>
<script src="<?=ROOT?>/assets/boootstrap/bootstrap.min.js"></script>

    </body>
</html>
