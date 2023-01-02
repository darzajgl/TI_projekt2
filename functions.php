<?php
function componenta($product_name, $product_price, $product_description, $product_image, $product_id)
{
    $element = '
    <div class="col-md-3 col-sm-6 my-3-md-0">
        <form action="index.php" method="POST">
            <div class="card shadow">
                <div>
                    <img src="' . $product_image . '" alt="' . $product_name . '" class="img-fluid card-img-top">
                </div>
                <div class="card-body">
                    <h5 class="card-title">' . $product_name . '</h5>
                    <p class="card-text">
                        ' . $product_description . '
                    </p>
                    <h5>
                        <span class="cena">' . $product_price . ' PLN</span>
                    </h5>
                    <button type="submit" class="btn btn-danger my-3" name="add">do koszyka</button>
                    <input type="hidden" name="product_id" value=' . $product_id . ' >
                    
                </div>
                <div class="col-md-3 col-sm-6 my-3-md-0 " >
                </div >
                <div class="col-md-3 col-sm-6 my-3-md-0 " >
                </div >
                <div class="col-md-3 col-sm-6 my-3-md-0 " >
                </div >
            </div >
        </form >
    </div >';
    echo $element;
}

function componentsa($product_name, $product_price, $product_description, $product_image, $product_id)
{
    $element = '
           <div class="box" >
        <form action="index.php" method="POST">

        <div class="box-left">
                <div>
                    <img src="' . $product_image . '" alt="' . $product_name . '" class="img-fluid card-img-top">
                </div>
                <div class="card-body">
                    <h5 class="card-title">' . $product_name . '</h5>
                    <p class="card-text">
                        ' . $product_description . '
                    </p>
                    <h5>
                        <span class="cena">' . $product_price . ' PLN</span>
                    </h5>
                    <button type="submit" class="btn btn-danger my-3" name="add">do koszyka</button>
                    <input type="hidden" name="product_id" value=' . $product_id . ' >
                    
                </div>
                <div class="col-md-3 col-sm-6 my-3-md-0 " >
                </div >
                <div class="col-md-3 col-sm-6 my-3-md-0 " >
                </div >
                <div class="col-md-3 col-sm-6 my-3-md-0 " >
                </div >
            </div >
        </form >
    </div >';
    echo $element;
}


function component($product_name, $product_price, $product_description, $product_image, $product_id)
{
    $element = ' 
 <hr>
 <div class="box">
    <form action="index.php" method="POST">

        <div class="box-left">
            <img src="' . $product_image . '" alt="Zdjęcie" class="box-image">
        </div>
        <div class="box-center">
            <h3 class="box-name">' . $product_name . '</h3>
            <p class="box-description">' . $product_description . '</p>
        </div>
        <div class="box-right">
            <p class="box-price">' . $product_price . ' PLN</p>
            <button type="submit" class="btn btn-danger" name="add">Dodaj do koszyka</button>
            <input type="hidden" name="product_id" value=' . $product_id . '>
        </div>
    </form>
</div>
  ';

    echo $element;
}


function cartItems($product_name, $product_price, $product_image, $product_id)
{
    $item = '
  
<form action="cart.php?action=remove&id=' . $product_id . '" method="post" class="cart-items">
      <div class="border-rounded">
        <div class="row">
          <div class="col-md-3">
            <img src=' . $product_image . ' alt="image1" class="img-fluid">
          </div>
          <div class="col-md-6">
            <h5 class="pt-2">' . $product_name . '</h5>
            <div class="text-secondary">' . $product_price . '</div>
            <br>
            <button type="submit" class="btn btn-danger mx-2" name="remove">Usuń z koszyka</button>
          </div>
          <div class="col-md-3">
  <button type="button" style="width: 40px; display: inline-block;" class="btn btn-warning rounded circle">-</button>
<input type="text" value="1" style="width: 40px; text-align: center; display: inline-block;" class="form-control">
<button type="button" style="width: 40px; display: inline-block;" class="btn btn-warning rounded circle">+</button>
          </div>
        </div>
      </div>
    </form>';
    echo $item;
}


function cartItem($product_name, $product_price, $product_image, $product_id)
{
    $item = '
<hr>
<form action="cart.php?action=remove&id=' . $product_id . '" method="post" class="cart-items">
    <div class="border-rounded">
        <div class="row">
            <div class="box">
                <div class="box-left">
                    <img src="' . $product_image . '" alt="image1" class="box-image">
                    <div class="box-center">
                        <h3 class="box-name">' . $product_name . '</h3>
                    </div>
                    <div class="box-right">
                        <p class="box-price">' . $product_price . ' PLN/dzień</p>
                        <button type="submit" class="btn btn-danger " name="remove">Usuń z koszyka</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <form>
    <hr>
';
    echo $item;
}


function cartItema($product_name, $product_price, $product_image, $product_id)
{
    $item = '
  
<form action="cart.php?action=remove&id=' . $product_id . '" method="post" class="cart-items">
      <div class="border-rounded">
        <div class="row">
          <div class="col-md-3">
            <img src=' . $product_image . ' alt="image1" class="img-fluid">
          </div>
          <div class="col-md-6">
            <h5 class="pt-2">' . $product_name . '</h5>
            <div class="text-secondary">' . $product_price . '</div>
            <br>
            <button type="submit" class="btn btn-danger mx-2" name="remove">Usuń z koszyka</button>
          </div>
          <div class="col-md-3">
  <button type="button" style="width: 40px; display: inline-block;" class="btn btn-warning rounded circle">-</button>
<input type="text" value="1" style="width: 40px; text-align: center; display: inline-block;" class="form-control">
<button type="button" style="width: 40px; display: inline-block;" class="btn btn-warning rounded circle">+</button>
          </div>
        </div>
      </div>
    </form>';
    echo $item;
}

?>