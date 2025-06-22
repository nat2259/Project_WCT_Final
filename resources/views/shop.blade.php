<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Vegefoods - Free Bootstrap 4 Template by Colorlib</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <link href="https://fonts.googleapis.com/css?family=Poppins:200,300,400,500,600,700,800&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Lora:400,400i,700,700i&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Amatic+SC:400,700&display=swap" rel="stylesheet">
<!-- In the <head> section -->
<link rel="stylesheet" href="{{ asset('css/open-iconic-bootstrap.min.css') }}">
<link rel="stylesheet" href="{{ asset('css/animate.css') }}">
<link rel="stylesheet" href="{{ asset('css/owl.carousel.min.css') }}">
<link rel="stylesheet" href="{{ asset('css/owl.theme.default.min.css') }}">
<link rel="stylesheet" href="{{ asset('css/magnific-popup.css') }}">
<link rel="stylesheet" href="{{ asset('css/aos.css') }}">
<link rel="stylesheet" href="{{ asset('css/ionicons.min.css') }}">
<link rel="stylesheet" href="{{ asset('css/bootstrap-datepicker.css') }}">
<link rel="stylesheet" href="{{ asset('css/jquery.timepicker.css') }}">
<link rel="stylesheet" href="{{ asset('css/flaticon.css') }}">
<link rel="stylesheet" href="{{ asset('css/icomoon.css') }}">
<link rel="stylesheet" href="{{ asset('css/style.css') }}">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

  </head>
  <body class="goto-here">
		<div class="py-1 bg-primary">
    	<div class="container">
    		<div class="row no-gutters d-flex align-items-start align-items-center px-md-0">
	    		<div class="col-lg-12 d-block">
		    		<div class="row d-flex">
		    			<div class="col-md pr-4 d-flex topper align-items-center">
					    	<div class="icon mr-2 d-flex justify-content-center align-items-center"><span class="icon-phone2"></span></div>
						    <span class="text">+ 1235 2355 98</span>
					    </div>
					    <div class="col-md pr-4 d-flex topper align-items-center">
					    	<div class="icon mr-2 d-flex justify-content-center align-items-center"><span class="icon-paper-plane"></span></div>
						    <span class="text">youremail@email.com</span>
					    </div>
					    <div class="col-md-5 pr-4 d-flex topper align-items-center text-lg-right">
						    <span class="text">3-5 Business days delivery &amp; Free Returns</span>
					    </div>
				    </div>
			    </div>
		    </div>
		  </div>
    </div>
<nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
	    <div class="container">
	      <a class="navbar-brand" href="{{ url('/dashboard') }}">Vegefoods</a>
	      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
	        <span class="oi oi-menu"></span> Menu
	      </button>

	      <div class="collapse navbar-collapse" id="ftco-nav">
	        <ul class="navbar-nav ml-auto">
	          <li class="nav-item active"><a href="{{ url('/dashboard') }}" class="nav-link">Home</a></li>
	          <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="dropdown04" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Shop</a>
              <div class="dropdown-menu" aria-labelledby="dropdown04">
              	<a class="dropdown-item" href="{{ url('/shop') }}">Shop</a>
              	<a class="dropdown-item" href="{{ url('/wishlist') }}">Wishlist</a>
                {{-- <a class="dropdown-item" href="{{ url('/product_single') }}">Single Product</a> --}}
                <a class="dropdown-item" href="{{ url('/cart') }}">Cart</a>
                <a class="dropdown-item" href="{{ url('/checkout') }}" >Checkout</a>
              </div>
            </li>
	          <li class="nav-item"><a href="{{ url('/about') }}" class="nav-link">About</a></li>
	          <li class="nav-item"><a href="{{ url('/blog') }}" class="nav-link">Blog</a></li>
	          <li class="nav-item"><a href="{{ url('/contact') }}"class="nav-link">Contact</a></li>
	          <li class="nav-item cta cta-colored"><a href="{{ url('/cart') }}"class="nav-link"><span class="icon-shopping_cart"></span>[0]</a></li>

            <div class="user-actions ml-8 mt-[10px]">
                <!-- Profile Button -->
                <a href="{{ route('profile.edit') }}" class="btn btn-sm t mr-2">
                    <i class="fas fa-user-circle mr-1"></i> {{ __('Profile') }}
                </a>
                
                <!-- Logout Button -->
                <form method="POST" action="{{ route('logout') }}" class="d-inline">
                    @csrf
                    <button type="submit" class="btn btn-sm " 
                            onclick="return confirm('Are you sure you want to log out?')">
                        <i class="fas fa-sign-out-alt mr-1"></i> {{ __('Log Out') }}
                    </button>
                </form>
            </div>
	        </ul>
	      </div>
	    </div>
	  </nav>
    <!-- END nav -->

    <!-- Background image in hero section -->
<div class="hero-wrap hero-bread" style="background-image: url('{{ asset('images/bg_1.jpg') }}');">
      <div class="container">
        <div class="row no-gutters slider-text align-items-center justify-content-center">
          <div class="col-md-9 ftco-animate text-center">
          	<p class="breadcrumbs"><span class="mr-2"><a href="index.html">Home</a></span> <span>Products</span></p>
            <h1 class="mb-0 bread">Products</h1>
          </div>
        </div>
      </div>
    </div>

<section class="ftco-section">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10 mb-5 text-center">
                <ul class="product-category">
                    <li><a href="{{ route('shop.index') }}" class="{{ !request()->has('category') ? 'active' : '' }}">All</a></li>
                    @foreach($categories as $category)
                    <li><a href="{{ route('shop.filter', $category->id) }}" class="{{ request('category') == $category->id ? 'active' : '' }}">{{ $category->name_category }}</a></li>
                    @endforeach
                </ul>
            </div>
        </div>
        <div class="row">
            @foreach($products as $product)
            <div class="col-md-6 col-lg-3 ftco-animate">
                <div class="product">
                    <a href="#" class="img-prod">
                        <img class="img-fluid" src="{{ asset($product->image) }}" alt="{{ $product->product_name }}">
                        @if($product->discount > 0)
                        <span class="status">{{ $product->discount }}%</span>
                        @endif
                        <div class="overlay"></div>
                    </a>
                    <div class="text py-3 pb-4 px-3 text-center">
                        <h3><a href="#">{{ $product->product_name }}</a></h3>
                        <div class="d-flex">
                            <div class="pricing">
                                @if($product->discount > 0)
                                <p class="price">
                                    <span class="mr-2 price-dc">${{ number_format($product->cost / (1 - $product->discount/100), 2) }}</span>
                                    <span class="price-sale">${{ number_format($product->cost, 2) }}</span>
                                </p>
                                @else
                                <p class="price"><span>${{ number_format($product->cost, 2) }}</span></p>
                                @endif
                            </div>
                        </div>
                        <div class="bottom-area d-flex px-3">
 <div class="m-auto d-flex">
                                  <button>
                                    <a href="{{ route('checkout') }}" class="add-to-cart d-flex justify-content-center align-items-center text-center">
                                       <span> <i class="ion-ios-menu"></i></span>
                                    </a>
                                  </button>
                                    <form method="POST" action="{{ route('cart.add') }}" style="display: inline;">
                                        @csrf
                                        <input type="hidden" name="product_id" value="{{ $product->id }}">
                                        <button type="submit"  >
                                            <a href="#" class="buy-now d-flex justify-content-center align-items-center text-center">
                                         <span><i class="ion-ios-cart"></i></span>
                                            </a>
                                        </button>
                                    </form>

                                    <form method="POST" action="{{ route('wishlist.add') }}" style="display: inline; ">
                                        @csrf
                                        <input type="hidden" name="product_id" value="{{ $product->id }}">
                                        <button type="submit" class="heart d-flex justify-content-center align-items-center text-center" >
                                          <a href= "#" class="heart d-flex justify-content-center align-items-center text-center">
                                            <span><i class="ion-ios-heart"></i></span>
                                          </a>
                                        </button>
                                    </form>

                                </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        <div class="row mt-5">
            <div class="col text-center">
                <div class="block-27">
                    <ul>
                        <li><a href="#">&lt;</a></li>
                        
                        <li><a href="#">&gt;</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>

		<section class="ftco-section ftco-no-pt ftco-no-pb py-5 bg-light">
      <div class="container py-4">
        <div class="row d-flex justify-content-center py-5">
          <div class="col-md-6">
          	<h2 style="font-size: 22px;" class="mb-0">Subcribe to our Newsletter</h2>
          	<span>Get e-mail updates about our latest shops and special offers</span>
          </div>
          <div class="col-md-6 d-flex align-items-center">
            <form action="#" class="subscribe-form">
              <div class="form-group d-flex">
                <input type="text" class="form-control" placeholder="Enter email address">
                <input type="submit" value="Subscribe" class="submit px-3">
              </div>
            </form>
          </div>
        </div>
      </div>
    </section>
    <footer class="ftco-footer ftco-section">
      <div class="container">
      	<div class="row">
      		<div class="mouse">
						<a href="#" class="mouse-icon">
							<div class="mouse-wheel"><span class="ion-ios-arrow-up"></span></div>
						</a>
					</div>
      	</div>
        <div class="row mb-5">
          <div class="col-md">
            <div class="ftco-footer-widget mb-4">
              <h2 class="ftco-heading-2">Vegefoods</h2>
              <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia.</p>
              <ul class="ftco-footer-social list-unstyled float-md-left float-lft mt-5">
                <li class="ftco-animate"><a href="#"><span class="icon-twitter"></span></a></li>
                <li class="ftco-animate"><a href="#"><span class="icon-facebook"></span></a></li>
                <li class="ftco-animate"><a href="#"><span class="icon-instagram"></span></a></li>
              </ul>
            </div>
          </div>
          <div class="col-md">
            <div class="ftco-footer-widget mb-4 ml-md-5">
              <h2 class="ftco-heading-2">Menu</h2>
              <ul class="list-unstyled">
                <li><a href="#" class="py-2 d-block">Shop</a></li>
                <li><a href="#" class="py-2 d-block">About</a></li>
                <li><a href="#" class="py-2 d-block">Journal</a></li>
                <li><a href="#" class="py-2 d-block">Contact Us</a></li>
              </ul>
            </div>
          </div>
          <div class="col-md-4">
             <div class="ftco-footer-widget mb-4">
              <h2 class="ftco-heading-2">Help</h2>
              <div class="d-flex">
	              <ul class="list-unstyled mr-l-5 pr-l-3 mr-4">
	                <li><a href="#" class="py-2 d-block">Shipping Information</a></li>
	                <li><a href="#" class="py-2 d-block">Returns &amp; Exchange</a></li>
	                <li><a href="#" class="py-2 d-block">Terms &amp; Conditions</a></li>
	                <li><a href="#" class="py-2 d-block">Privacy Policy</a></li>
	              </ul>
	              <ul class="list-unstyled">
	                <li><a href="#" class="py-2 d-block">FAQs</a></li>
	                <li><a href="#" class="py-2 d-block">Contact</a></li>
	              </ul>
	            </div>
            </div>
          </div>
          <div class="col-md">
            <div class="ftco-footer-widget mb-4">
            	<h2 class="ftco-heading-2">Have a Questions?</h2>
            	<div class="block-23 mb-3">
	              <ul>
	                <li><span class="icon icon-map-marker"></span><span class="text">203 Fake St. Mountain View, San Francisco, California, USA</span></li>
	                <li><a href="#"><span class="icon icon-phone"></span><span class="text">+2 392 3929 210</span></a></li>
	                <li><a href="#"><span class="icon icon-envelope"></span><span class="text">info@yourdomain.com</span></a></li>
	              </ul>
	            </div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12 text-center">

            <p><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
						  Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="icon-heart color-danger" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
						  <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
						</p>
          </div>
        </div>
      </div>
    </footer>
    
  

  <!-- loader -->
  <div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"/></svg></div>


!-- Scripts at the bottom -->
<script src="{{ asset('js/jquery.min.js') }}"></script>
<script src="{{ asset('js/jquery-migrate-3.0.1.min.js') }}"></script>
<script src="{{ asset('js/popper.min.js') }}"></script>
<script src="{{ asset('js/bootstrap.min.js') }}"></script>
<script src="{{ asset('js/jquery.easing.1.3.js') }}"></script>
<script src="{{ asset('js/jquery.waypoints.min.js') }}"></script>
<script src="{{ asset('js/jquery.stellar.min.js') }}"></script>
<script src="{{ asset('js/owl.carousel.min.js') }}"></script>
<script src="{{ asset('js/jquery.magnific-popup.min.js') }}"></script>
<script src="{{ asset('js/aos.js') }}"></script>
<script src="{{ asset('js/jquery.animateNumber.min.js') }}"></script>
<script src="{{ asset('js/bootstrap-datepicker.js') }}"></script>
<script src="{{ asset('js/scrollax.min.js') }}"></script>
<script src="{{ asset('js/main.js') }}"></script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script>
<script src="js/google-map.js"></script>
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Store all category products upfront for instant switching
    const categoryProducts = {
        all: document.querySelector('.ftco-section').outerHTML,
        // This assumes you have server-side rendered all categories
        // If not, we'll use the AJAX fallback
    };
    
    const categoryLinks = document.querySelectorAll('.product-category a');
    const productsContainer = document.querySelector('.ftco-section');
    
    categoryLinks.forEach(link => {
        link.addEventListener('click', function(e) {
            if (e.button !== 0) return; // Only left clicks
            e.preventDefault();
            
            const categoryId = this.dataset.category || 'all';
            const url = this.getAttribute('href');
            
            // Instant UI update
            updateActiveLink(url);
            
            // Check if we have cached HTML
            if (categoryProducts[categoryId]) {
                productsContainer.outerHTML = categoryProducts[categoryId];
                return;
            }
            
            // Fallback AJAX (will still be fast without loading animation)
            fetch(url)
                .then(response => response.text())
                .then(html => {
                    const parser = new DOMParser();
                    const newDoc = parser.parseFromString(html, 'text/html');
                    const newProducts = newDoc.querySelector('.ftco-section');
                    
                    if (newProducts) {
                        // Cache for next time
                        categoryProducts[categoryId] = newProducts.outerHTML;
                        productsContainer.replaceWith(newProducts);
                    }
                })
                .catch(() => window.location.href = url);
        });
    });

    function updateActiveLink(currentUrl) {
        categoryLinks.forEach(link => {
            link.classList.toggle('active', 
                link.getAttribute('href') === currentUrl ||
                (currentUrl.endsWith('/shop') && link.getAttribute('href').endsWith('/shop'))
            );
        });
    }
    
    // Initialize active state
    updateActiveLink(window.location.pathname);
});

</script>


    
  </body>
</html>