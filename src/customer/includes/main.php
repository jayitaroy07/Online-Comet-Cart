<body>
  <header class="page-header">
    <div class="page-header__bottomline">
      <div class="container clearfix">
        <div class="logo">
          <a class="logo__link" href="../index.php">
            <img class="logo__img" src="../images/logo.png" width="237" height="19">
          </a>
        </div>
        <nav class="main-nav">
          <ul class="categories">
            <li class="categories__item">
              <a class="categories__link categories__link--active" href="../shop.php">
                Shop
              </a>
            </li>
            <li class="categories__item">
              <a class="categories__link" href="../cart.php">
                Cart
              </a>
            </li>
            <li class="categories__item">
                <a class="categories__link" href="my_account.php?my_orders">
                  My Orders
                </a>
            </li>
            <?php
              if(isset($_SESSION['customer_email'])){
                echo "
                  <li class=\"categories__item\">
                    <a class=\"categories__link\" href=\"../logout.php\">
                      Logout
                    </a>
                </li>"; 
              }
              else
              { 
                echo "
                <li class=\"categories__item\">
                  <a class=\"categories__link\" href=\"../customer_login.php\">
                    Sign in
                  </a>
              </li>"; 
              }
            ?>
          </ul>
        </nav>
      </div>
    </div>
  </header>