<?php

function component($product_name, $product_price, $product_description, $product_image, $product_id)
{
    $element = ' 
  <form action="index.php" method="POST">
 <hr>
 <div class="box">
   

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
                        <p class="box-price">' . $product_price . ' PLN</p>
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


?>