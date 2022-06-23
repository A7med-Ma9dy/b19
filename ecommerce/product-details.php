<?php

use App\Database\Models\Product;

$title = "product details";
include_once "layouts/header.php";
include_once "layouts/navbar.php";
include_once "layouts/breadcrumb.php";
$productObject = new Product;
$productObject->setStatus(1);
if ($_GET) {
    if (isset($_GET['product'])) {
        if (is_numeric($_GET['product'])) {
            $productObject->setId($_GET['product']);
            $productData = $productObject->getById()->get_result();
            if ($productData->num_rows == 1) {
                $product = $productData->fetch_object();
            } else {
                include 'layouts/errors/404.php';
                die;
            }
        } else {
            include 'layouts/errors/404.php';
            die;
        }
    } else {
        include 'layouts/errors/404.php';
        die;
    }
} else {
    include 'layouts/errors/404.php';
    die;
}
if ($_POST) {
    print_r($_POST);
    die;
}

?>
<!-- Product Deatils Area Start -->
<div class="product-details pt-100 pb-95">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-md-12">
                <div class="product-details-img">
                    <img class="zoompro" src="assets/img/product/<?= $product->image ?>" data-zoom-image="assets/img/product/<?= $product->image ?>" alt="zoom" />
                </div>
            </div>
            <div class="col-lg-6 col-md-12">
                <div class="product-details-content">
                    <h4><?= $product->name_en ?></h4>
                    <div class="rating-review">
                        <div class="pro-dec-rating">
                            <?php for ($i = 1; $i <= $product->reviews_avg; $i++) { ?>
                                <i class="ion-android-star-outline theme-star"></i>
                            <?php } ?>
                            <?php for ($i = 1; $i <= 5 - $product->reviews_avg; $i++) { ?>
                                <i class="ion-android-star-outline"></i>
                            <?php } ?>
                        </div>
                        <div class="pro-dec-review">
                            <ul>
                                <li><?= $product->reviews_count ?> Reviews </li>
                                <li> Add Your Reviews</li>
                            </ul>
                        </div>
                    </div>
                    <span> <?= $product->price ?> EGP</span>
                    <div class="in-stock">
                        <?php
                        if ($product->quantity == 0) {
                            $message = "Outof Stock";
                            $color = "danger";
                        } elseif ($product->quantity > 0 && $product->quantity < 6) {
                            $message = "In Stock({$product->quantity})";
                            $color = "warning";
                        } else {
                            $message = "In Stock";
                            $color = "success";
                        }
                        ?>
                        <p>Available: <span class='text-<?= $color ?>'><?= $message ?></span></p>
                    </div>
                    <p><?= $product->desc_en ?> </p>
                    <div class="quality-add-to-cart">
                        <div class="quality">
                            <label>Qty:</label>
                            <input class="cart-plus-minus-box" type="text" name="qtybutton" value="02">
                        </div>
                        <div class="shop-list-cart-wishlist">
                            <a title="Add To Cart" href="#">
                                <i class="icon-handbag"></i>
                            </a>
                            <a title="Wishlist" href="#">
                                <i class="icon-heart"></i>
                            </a>
                        </div>
                    </div>
                    <div class="pro-dec-categories">
                        <ul>
                            <li><a href="shop.php?category=<?= $product->category_id ?>"><?= $product->category_name_en ?>,</a></li>
                            <li><a href="shop.php?subcategory=<?= $product->subcategory_id ?>"><?= $product->subcategory_name_en ?>, </a></li>
                            <li><a href="shop.php?brand=<?= $product->brand_id ?>"><?= $product->brand_name_en ?></a></li>
                        </ul>
                    </div>
                    <div class="pro-dec-social">
                        <ul>
                            <li><a class="tweet" href="#"><i class="ion-social-twitter"></i> Tweet</a></li>
                            <li><a class="share" href="#"><i class="ion-social-facebook"></i> Share</a></li>
                            <li><a class="google" href="#"><i class="ion-social-googleplus-outline"></i> Google+</a></li>
                            <li><a class="pinterest" href="#"><i class="ion-social-pinterest"></i> Pinterest</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Product Deatils Area End -->
<div class="description-review-area pb-70">
    <div class="container">
        <div class="description-review-wrapper">
            <div class="description-review-topbar nav text-center">
                <a class="active" data-toggle="tab" href="#des-details1">Description</a>
                <a data-toggle="tab" href="#des-details3">Reviews</a>
            </div>
            <div class="tab-content description-review-bottom">
                <div id="des-details1" class="tab-pane active">
                    <div class="product-description-wrapper">
                        <p><?= $product->desc_en ?></p>
                    </div>
                </div>

                <div id="des-details3" class="tab-pane">
                    <?php
                    $reviews = $productObject->getReviews()->get_result()->fetch_all(MYSQLI_ASSOC);
                    if (!empty($reviews)) {


                        foreach ($reviews as $review) { ?>
                            <div class="rattings-wrapper">
                                <div class="sin-rattings">
                                    <div class="star-author-all">
                                        <div class="ratting-star f-left">
                                            <?php for ($i = 1; $i <= $review['rate']; $i++) { ?>
                                                <i class="ion-star theme-color"></i>
                                            <?php } ?>
                                            <?php for ($i = 1; $i <= 5 - $review['rate']; $i++) { ?>
                                                <i class="ion-android-star-outline"></i>
                                            <?php } ?>
                                            <span>(<?= $review['rate'] ?>)</span>
                                        </div>
                                        <div class="ratting-author f-right">
                                            <h3><?= $review['full_name'] ?></h3>
                                            <span><?= $review['created_at'] ?> </span>
                                        </div>
                                    </div>
                                    <p><?= $review['comment'] ?></p>
                                </div>
                            </div>
                        <?php }
                    } else {
                        echo "<div class='alert alert-warning text-center '> No Reviews Found </div>";
                    }
                    if (!empty($_SESSION['user'])) { ?>
                        <div class="ratting-form-wrapper">
                            <h3>Add your Comments :</h3>
                            <div class="ratting-form">
                                <form action="product-details.php?product=<?= $product->id ?>" method="POST">
                                    <div class="star-box">
                                        <h2>Rating:</h2>
                                        <style>
                                            @import url(http://netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.css);

                                            fieldset,
                                            label {
                                                margin: 0;
                                                padding: 0;
                                            }

                                            body {
                                                margin: 20px;
                                            }

                                            h1 {
                                                font-size: 1.5em;
                                                margin: 10px;
                                            }

                                            /****** Style Star Rating Widget *****/

                                            .rating {
                                                border: none;
                                                float: left;
                                            }

                                            .rating>input {
                                                display: none;
                                            }

                                            .rating>label:before {
                                                margin: 5px;
                                                font-size: 1.25em;
                                                font-family: FontAwesome;
                                                display: inline-block;
                                                content: "\f005";
                                            }

                                            .rating>.half:before {
                                                content: "\f089";
                                                position: absolute;
                                            }

                                            .rating>label {
                                                color: #ddd;
                                                float: right;
                                            }

                                            /***** CSS Magic to Highlight Stars on Hover *****/

                                            .rating>input:checked~label,
                                            /* show gold star when clicked */
                                            .rating:not(:checked)>label:hover,
                                            /* hover current star */
                                            .rating:not(:checked)>label:hover~label {
                                                color: #FFD700;
                                            }

                                            /* hover previous stars in list */

                                            .rating>input:checked+label:hover,
                                            /* hover current star when changing rating */
                                            .rating>input:checked~label:hover,
                                            .rating>label:hover~input:checked~label,
                                            /* lighten current selection */
                                            .rating>input:checked~label:hover~label {
                                                color: #FFED85;
                                            }
                                        </style>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">

                                            <fieldset class="rating">
                                                <input type="radio" id="star5" name="rate" value="5" /><label class="full" for="star5" title="Awesome - 5 stars"></label>
                                                <input type="radio" id="star4" name="rate" value="4" /><label class="full" for="star4" title="Pretty good - 4 stars"></label>
                                                <input type="radio" id="star3" name="rate" value="3" /><label class="full" for="star3" title="Meh - 3 stars"></label>
                                                <input type="radio" id="star2" name="rate" value="2" /><label class="full" for="star2" title="Kinda bad - 2 stars"></label>
                                                <input type="radio" id="star1" name="rate" value="1" /><label class="full" for="star1" title="Sucks big time - 1 star"></label>
                                            </fieldset>
                                        </div>

                                        <div class="col-md-12">
                                            <div class="rating-form-style form-submit">
                                                <textarea name="comment" placeholder="Comment"></textarea>
                                                <input type="submit" value="add review">
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    <?php }
                    ?>


                </div>
            </div>
        </div>
    </div>
</div>
<div class="product-area pb-100">
    <div class="container">
        <div class="product-top-bar section-border mb-35">
            <div class="section-title-wrap">
                <h3 class="section-title section-bg-white">Related Products</h3>
            </div>
        </div>
        <div class="featured-product-active hot-flower owl-carousel product-nav">
            <div class="product-wrapper">
                <div class="product-img">
                    <a href="product-details.php">
                        <img alt="" src="assets/img/product/product-1.jpg">
                    </a>
                    <span>-30%</span>
                    <div class="product-action">
                        <a class="action-wishlist" href="#" title="Wishlist">
                            <i class="ion-android-favorite-outline"></i>
                        </a>
                        <a class="action-cart" href="#" title="Add To Cart">
                            <i class="ion-ios-shuffle-strong"></i>
                        </a>
                        <a class="action-compare" href="#" data-target="#exampleModal" data-toggle="modal" title="Quick View">
                            <i class="ion-ios-search-strong"></i>
                        </a>
                    </div>
                </div>
                <div class="product-content text-left">
                    <div class="product-hover-style">
                        <div class="product-title">
                            <h4>
                                <a href="product-details.php">Le Bongai Tea</a>
                            </h4>
                        </div>
                        <div class="cart-hover">
                            <h4><a href="product-details.php">+ Add to cart</a></h4>
                        </div>
                    </div>
                    <div class="product-price-wrapper">
                        <span>$100.00 -</span>
                        <span class="product-price-old">$120.00 </span>
                    </div>
                </div>
            </div>
            <div class="product-wrapper">
                <div class="product-img">
                    <a href="product-details.php">
                        <img alt="" src="assets/img/product/product-2.jpg">
                    </a>
                    <div class="product-action">
                        <a class="action-wishlist" href="#" title="Wishlist">
                            <i class="ion-android-favorite-outline"></i>
                        </a>
                        <a class="action-cart" href="#" title="Add To Cart">
                            <i class="ion-ios-shuffle-strong"></i>
                        </a>
                        <a class="action-compare" href="#" data-target="#exampleModal" data-toggle="modal" title="Quick View">
                            <i class="ion-ios-search-strong"></i>
                        </a>
                    </div>
                </div>
                <div class="product-content text-left">
                    <div class="product-hover-style">
                        <div class="product-title">
                            <h4>
                                <a href="product-details.php">Society Ice Tea</a>
                            </h4>
                        </div>
                        <div class="cart-hover">
                            <h4><a href="product-details.php">+ Add to cart</a></h4>
                        </div>
                    </div>
                    <div class="product-price-wrapper">
                        <span>$100.00 -</span>
                        <span class="product-price-old">$120.00 </span>
                    </div>
                </div>
            </div>
            <div class="product-wrapper">
                <div class="product-img">
                    <a href="product-details.php">
                        <img alt="" src="assets/img/product/product-3.jpg">
                    </a>
                    <span>-30%</span>
                    <div class="product-action">
                        <a class="action-wishlist" href="#" title="Wishlist">
                            <i class="ion-android-favorite-outline"></i>
                        </a>
                        <a class="action-cart" href="#" title="Add To Cart">
                            <i class="ion-ios-shuffle-strong"></i>
                        </a>
                        <a class="action-compare" href="#" data-target="#exampleModal" data-toggle="modal" title="Quick View">
                            <i class="ion-ios-search-strong"></i>
                        </a>
                    </div>
                </div>
                <div class="product-content text-left">
                    <div class="product-hover-style">
                        <div class="product-title">
                            <h4>
                                <a href="product-details.php">Green Tea Tulsi</a>
                            </h4>
                        </div>
                        <div class="cart-hover">
                            <h4><a href="product-details.php">+ Add to cart</a></h4>
                        </div>
                    </div>
                    <div class="product-price-wrapper">
                        <span>$100.00 -</span>
                        <span class="product-price-old">$120.00 </span>
                    </div>
                </div>
            </div>
            <div class="product-wrapper">
                <div class="product-img">
                    <a href="product-details.php">
                        <img alt="" src="assets/img/product/product-4.jpg">
                    </a>
                    <div class="product-action">
                        <a class="action-wishlist" href="#" title="Wishlist">
                            <i class="ion-android-favorite-outline"></i>
                        </a>
                        <a class="action-cart" href="#" title="Add To Cart">
                            <i class="ion-ios-shuffle-strong"></i>
                        </a>
                        <a class="action-compare" href="#" data-target="#exampleModal" data-toggle="modal" title="Quick View">
                            <i class="ion-ios-search-strong"></i>
                        </a>
                    </div>
                </div>
                <div class="product-content text-left">
                    <div class="product-hover-style">
                        <div class="product-title">
                            <h4>
                                <a href="product-details.php">Best Friends Tea</a>
                            </h4>
                        </div>
                        <div class="cart-hover">
                            <h4><a href="product-details.php">+ Add to cart</a></h4>
                        </div>
                    </div>
                    <div class="product-price-wrapper">
                        <span>$100.00 -</span>
                        <span class="product-price-old">$120.00 </span>
                    </div>
                </div>
            </div>
            <div class="product-wrapper">
                <div class="product-img">
                    <a href="product-details.php">
                        <img alt="" src="assets/img/product/product-5.jpg">
                    </a>
                    <span>-30%</span>
                    <div class="product-action">
                        <a class="action-wishlist" href="#" title="Wishlist">
                            <i class="ion-android-favorite-outline"></i>
                        </a>
                        <a class="action-cart" href="#" title="Add To Cart">
                            <i class="ion-ios-shuffle-strong"></i>
                        </a>
                        <a class="action-compare" href="#" data-target="#exampleModal" data-toggle="modal" title="Quick View">
                            <i class="ion-ios-search-strong"></i>
                        </a>
                    </div>
                </div>
                <div class="product-content text-left">
                    <div class="product-hover-style">
                        <div class="product-title">
                            <h4>
                                <a href="product-details.php">Instant Tea Premix</a>
                            </h4>
                        </div>
                        <div class="cart-hover">
                            <h4><a href="product-details.php">+ Add to cart</a></h4>
                        </div>
                    </div>
                    <div class="product-price-wrapper">
                        <span>$100.00 -</span>
                        <span class="product-price-old">$120.00 </span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
include_once "layouts/footer.php";
include_once "layouts/footer-scripts.php";
?>