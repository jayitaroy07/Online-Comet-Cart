<body>
  <header class="page-header">
    <!-- topline -->
    <!--<div class="page-header__topline">
      <div class="container clearfix">
        <div class="currency">
          <a class="currency__change" href="customer/my_account.php?my_orders">
          <?php
          if(!isset($_SESSION['customer_email'])){
          echo "Welcome :Guest"; 
          }
          else
          { 
              echo "Welcome : " . $_SESSION['customer_email'] . "";
            }
          ?>
          </a>
        </div>
        <div class="basket">
          <a href="cart.php" class="btn btn--basket">
            <i class="icon-basket"></i>
            <?php items(); ?> items
          </a>
        </div>
        <ul class="login">
          <li class="login__item">
          <?php
          if(!isset($_SESSION['customer_email'])){
            echo '<a href="customer_register.php" class="login__link">Register</a>';
          } 
            else
            { 
                echo '<a href="my_account.php?my_orders" class="login__link">My Account</a>';
            }   
          ?>  
          </li>
          <li class="login__item">
            <?php
            if(!isset($_SESSION['customer_email'])){
              echo '<a href="checkout.php" class="login__link">Sign In</a>';
            }
              else
              { 
                  echo '<a href="../logout.php" class="login__link">Log out</a>';
              }
            ?>  
          </li>
       </ul>
      </div>
    </div> -->
    <!-- bottomline -->
    <div class="page-header__bottomline">
      <div class="container clearfix">
        <div class="logo">
          <a class="logo__link" href="index.php">
            <img class="logo__img" src="images/logo.png" width="237" height="19">
          </a>
        </div>
        <nav class="main-nav">
          <ul class="categories">
            <li class="categories__item">
              <a class="categories__link categories__link--active" href="shop.php">
                Shop
              </a>
            </li>
            <li class="categories__item">
              <a class="categories__link" href="cart.php">
                Cart
              </a>
            </li>
            <li class="categories__item">
                <a class="categories__link" href="customer/my_account.php?my_orders">
                  My Orders
                </a>
            </li>
            <?php
              if(isset($_SESSION['customer_email'])){
                echo "
                  <li class=\"categories__item\">
                    <a class=\"categories__link\" href=\"logout.php\">
                      Logout
                    </a>
                </li>"; 
              }
              else
              { 
                echo "
                <li class=\"categories__item\">
                  <a class=\"categories__link\" href=\"checkout.php\">
                    Sign in
                  </a>
              </li>"; 
              }
            ?>
            <?php
            if($_SESSION['customer_email']=="admin@cometcart.com")
            { ?>
              <li class="categories__item">
                  <a class="categories__link" href="./admin">
                    Admin panel
                  </a>
              </li>
            <?php } ?>
          </ul>
        </nav>
      </div>
    </div>
  </header>