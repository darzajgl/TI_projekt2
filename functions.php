<?php
function component($product_name, $product_price, $product_description, $product_image, $product_id)
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

function cartItem($product_name, $product_price, $product_image)
{
    $item = '
    <form action="cart.php" method="get" class="cart-items">
      <div class="border-rounded">
        <div class="row">
          <div class="col-md-3">
            <img src=' . $product_image . ' alt="image1" class="img-fluid">
          </div>
          <div class="col-md-6">
            <h5 class="pt-2">' . $product_name . '</h5>
            <small class="text-secondary">' . $product_price . '</small>
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