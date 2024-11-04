<!doctype html>
<html lang="en" data-bs-theme="auto">
  <head>
  <?php
                     
                     $slug = $url[1] ?? null;
                    if($slug){
                        $query = "SELECT post.*, categories.category FROM post join categories on post.category_id = categories.id WHERE post.slug =:slug LIMIT 1";
                 
                        $row = query_row($query, ['slug'=> $slug]);
                    }
                    
                  if(!empty($row)){
  ?>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    
    <title><?=$row['title']?></title>

    <meta name="description" content="<?=$row['meta_description']?>">
    
    

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@docsearch/css@3">
    

<link href="<?=ROOT?>/assets/bootstrap/bootstrap.min.css" rel="stylesheet">

<link href="<?=ROOT?>/assets/css/style.css" rel="stylesheet">

    <style>
     .bi{
      vertical-align: -0.125em;
    margin-right: 3rem;
     }

    </style>

<?=$row['schema_markup']?>
    
  </head>
  <body>
   
  <?php  include('includes/header.php');?>


  <main>

  

  <section class="breadcrumbfsd">
    <div class="container">
        <h1 class="wedding-btilsd"><?=$row['h_one']?></h1>
        <ul>
          <li>Home  /</li>
          <li><a href="<?=ROOT?>/blog">Blog /</a></li>
          <li><?=$row['title']?></li>
        </ul>
    </div>
  </section>

   


  
   <section class="pt-5 pb-5">

          <div class="container">
          
          
          
              <div class="row mb-2 justify-content-center">
                    
                  
                  
                          

                      <div class="">
      <div class="row g-0 border rounded overflow-hidden mb-4 shadow-sm position-relative">

        <div class="p-4 d-flex flex-column position-static">
          <strong class="d-inline-block mb-2 text-primary-emphasis"><?=esc($row['category'] ?? 'Unknown');?></strong>
          <h2 class="mb-0"><?=esc($row['title']);?></h2>
          <div class="mb-1 text-body-secondary"><?=date("jS M, Y", strtotime($row['date']))?></div>
          <p class="card-text mb-auto"><?=$row['content'];?></p>
          
        </div>


        <div class=" d-lg-block p-4 mx-auto" >
          <img src="<?=ROOT?>/images/<?=esc($row['image']);?>" class="bd-placeholder-img w-md-auto "  style="object-fit:cover">
           </div>
      </div>
    </div>

                      <?php
                   
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
