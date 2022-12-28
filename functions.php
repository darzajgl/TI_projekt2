<?php
function component($product_name, $product_price, $product_image)
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
                        Rower miejski - template
                    </p>
                    <h5>
                        <span class="cena">' . $product_price . ' PLN</span>
                    </h5>
                    <button type="submit" class="btn btn-danger my-3" name="add">do koszyka</button>
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