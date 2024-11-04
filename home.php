<!doctype html>
<html lang="en" data-bs-theme="auto">
  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    
    <title>Headers · <?=APP_NMAE?></title>


    
    

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@docsearch/css@3">
    

<link href="<?=ROOT?>/assets/bootstrap/bootstrap.min.css" rel="stylesheet">
<link href="<?=ROOT?>/assets/css/style.css" rel="stylesheet">

    <style>
     .bi{
      vertical-align: -0.125em;
    margin-right: 3rem;
     }

    </style>

    
    
  </head>
  <body>
   
  <?php  include('includes/header.php');?>


  <main>


  <?php  include('includes/slider.php');?>

  
   <section class="pt-5 pb-5">

          <div class="container">
          <h1 class="pb-3">Best Wedding Blogs</h1>

          
              <div class="row mb-2 justify-content-center">
                    
                  
                  <?php

                  $query = 'SELECT post.*, categories.category FROM post join categories on post.category_id = categories.id ORDER BY id DESC limit 6';
                  $rows = query($query);
                  if($rows){
                    foreach($rows as $row){
                      include('includes/post-card.php');
                    }
                    
                  }
                  else{
                    echo "No posts found";
                  }
                  
                  
                  ?>

              </div>
          </div>
  

   </section>
  

   
  
  </main>

  
  <?php include('includes/footer.php') ?>
  

 
  

<script src="<?=ROOT?>/assets/bootstrap/bootstrap.bundle.min.js"></script>

    </body>
</html>
