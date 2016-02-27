<?php require_once("./config.php");
    if ($_POST['save'] == true){
        $post = $_POST;
        $data_payment = array();
        if(isset($post['category']) && !empty($post['category'])) {
           foreach($post['category'] as $category => $params)
            {
                foreach($params as $description_id => $content)
                {
                    if(!empty($content['check'])){
                        if($content['check'] == 'on'){
                            $data_description = $content["description"];
                            $data_product_id = $post['product_id'];
                            $data_description_id = $description_id;
                            $query = "INSERT INTO product_description VALUES ('$data_product_id', '$data_description_id', 0, '$data_description' );";
                            if(mysql_query($query))
                            {}
                        }
                    }
                }
            }
            foreach($post['category'] as $category => $params)
            {
                foreach($params as $description_id => $content) {
                    print_r($content);
                }
            }
        }
    }
?>
<!DOCTYPE html>
<html lang="ru">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">   
    <title>Многомерные массивы в input и checkbox</title>
    <link href="bootstrap3/css/bootstrap.min.css" rel="stylesheet">
	<style>
	body {
	  padding-top: 50px;
	}
	.starter-template {
	  padding: 40px 15px;
	  text-align: center;
	}
	</style>
    <script type="text/javascript" src="js/jquery-1.10.2.min.js"></script>
	<script >
	$(document).ready(function() {
      $('#categories .checkbox').change( function(){
          var id = $(this).children('input').val();
          if (!$(this).children('input').is(':checked')) {
              $(this).children('.price-block').fadeOut();
          }
          else{
              $(this).children('.price-block').fadeIn();
          }
      });
  });
	</script>
  </head>

  <body>

    <div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">Polyakov.co.ua</a>
        </div>
        <div class="collapse navbar-collapse">
          <ul class="nav navbar-nav">
            <li class="active"><a href="#">Home</a></li>            
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </div>

    <div class="container">

      <div class="starter-template">
        <h1>Дополнительное описание для каждой категории</h1>
      </div>
	<div class="row">
		<div class="col-lg-12">
          <div id="categories">
              <form role="form" method="post" action="./index.php">
                <p class="category">Категории</p>
                  <input type="hidden" name="save" value="true">
                  <input type="hidden" name="product_id" value="1">

                  <?php
                  $query = mysql_query("SELECT * FROM description ORDER BY id DESC");

                  for($product = 1; $product<=5; $product++){
                      echo 'Товар № '.$product;
                      while($row = mysql_fetch_array($query))
                      { ?>
                          <div class="checkbox"><input id="checkbox-<?php echo $row['id'] ?>" type="checkbox" name="category[Params][<?php echo $row['id'] ?>][check]"><label
                                  for="checkbox-<?php echo $row['id'] ?>"><?php echo $row['name'] ?></label>

                              <div class="price-block" style="display:none;">Доплата, коментарий <input type="text" class="form-controll" name="category[Params][<?php echo $row['id'] ?>][description]">
                              </div>
                          </div>
                      <?php }
                  }
                  ?>
                  <input type="submit" value="Сохранить">
              </form>
          </div>
		</div>

	</div>	

    </div><!-- /.container -->

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <script src="bootstrap3/js/bootstrap.min.js"></script>
  </body>
</html>