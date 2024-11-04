<!doctype html>
<html lang="en" data-bs-theme="auto">
  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    
    <title>Headers · <?=APP_NMAE?></title>


    
    

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@docsearch/css@3">
    

<link href="<?=ROOT?>/assets/bootstrap/bootstrap.min.css" rel="stylesheet">

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


  
   <section class="pt-5 pb-5">

          <div class="container">
          <h1 class="pb-3">Search</h1>

          
              <div class="row mb-2 justify-content-center">
                    
                  
                  <?php


                    $limit = 10;
                    $offset = ($page['page_number'] - 1) * $limit;

                    $find = $_GET['find'] ?? null;

                    if($find){
                         
                        $find = "%$find%";
                        $query = "SELECT post.*, categories.category FROM post join categories on post.category_id = categories.id  WHERE post.title like :find ORDER BY id DESC LIMIT $limit OFFSET $offset";
                 
                        $rows = query($query, ['find' => $find]);

                    }

                    
                  if(!empty($rows)){
                    foreach($rows as $row){
                      include('includes/post-card.php');
                    }
                    
                  }
                  else{
                    echo "No posts found";
                  }
                  
                  
                  ?>



              </div>

              <div class="col-md-12 mb-4">
        <a class="btn btn-primary" href="<?= $page['first_link'] ?>">First Page</a>
        <a class="btn btn-primary" href="<?= $page['prev_link'] ?>">Prev Page</a>
       

        <a class="btn btn-danger float-end " href="<?=ROOT?>/blog">Back To Blog</a>
        <a class="btn btn-primary float-end me-1" href="<?= $page['next_link'] ?>">Next Page</a>
    </div>
          </div>
  

   </section>
  

   
  
  </main>

  
  <?php include('includes/footer.php') ?>
  

  

<script src="<?=ROOT?>/assets/bootstrap/bootstrap.bundle.min.js"></script>

    </body>
</html>
