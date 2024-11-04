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
   

  <section class="breadcrumbfsd">
    <div class="container">
        <h1 class="wedding-btilsd">Best Wedding Blogs</h1>
        <ul>
          <li>Home  /</li>
          <li><a href="<?=ROOT?>/blog">Blog</a></li>
        </ul>
    </div>
  </section>

  
   <section class="pb-5">

          <div class="container">
          
          <div class="d-flex flex-wrap align-items-center justify-content-between my-5">
          <h1 class="pb-3">Blog</h1>
          <form action="<?=ROOT?>/search" class=" col-12 col-lg-auto mb-3 mb-lg-0 me-lg-3" role="search">
          <div class="input-group">
          <input name="find" value="<?=$_GET['find'] ?? ''?>" type="search" class="form-control" placeholder="Search..." aria-label="Search" required>
          <button type="submit" class="btn btn-primary">Find</button>
          </div>
          
        </form>
          </div>
          
              <div class="row mb-2 justify-content-center">
                    

              <div class="col-md-9">

                <div class="row">
                <?php


                $limit = 10;
                $offset = ($page['page_number'] - 1) * $limit;
                $query = "SELECT post.*, categories.category FROM post join categories on post.category_id = categories.id WHERE post.disabled = 0 ORDER BY id DESC LIMIT $limit OFFSET $offset";

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
              
              <div class="col-md-3">
                   <?php

                   $query = "SELECT * FROM categories";
                   $rows = query($query);
                   if($rows){
                   foreach($rows as $row){
                     
                      ?>
                      <a class="btn btn-success my-1" href="<?=ROOT?>/category/<?=$row['slug']?>"><?=$row['category']?></a>

                    <?php
                   }
   
                   }
                   else{
                   echo "No posts found";
                   }
                   ?>
              </div>
                  
              </div>

              <div class="col-md-12 mb-4">
        <a class="btn btn-primary" href="<?= $page['first_link'] ?>">First Page</a>
        <a class="btn btn-primary" href="<?= $page['prev_link'] ?>">Prev Page</a>
        <a class="btn btn-primary float-end" href="<?= $page['next_link'] ?>">Next Page</a>
    </div>
          </div>
  

   </section>
  

   
  
  </main>

  
  <?php include('includes/footer.php') ?>
  

  

<script src="<?=ROOT?>/assets/bootstrap/bootstrap.bundle.min.js"></script>

    </body>
</html>
