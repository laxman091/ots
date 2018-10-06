
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="iso-8859-1" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Shopping Cart - Transparent Technologies, Inc.</title>

    <!-- Bootstrap -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="../css/font-awesome.min.css" rel="stylesheet">
  <link href="../css/style-billing.css" rel="stylesheet">
  <!-- Styling -->
<link href="/billing/templates/transparent_six/css/overrides.css" rel="stylesheet">
<link href="../css/styles-billing.css" rel="stylesheet">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
  <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->


    <script type="text/javascript" src="https://js.stripe.com/v2/"></script>
      <script type="text/javascript">
            Stripe.setPublishableKey('pk_live_DJoGxBmxTsCmmO0RROPDxNFq');
            var $customer_name = ' ';
            var $address_1 = '';
            var $address_2 = '';
            var $city = '';
            var $zip = '';
            var $county = 'US';
            var $state = '';
            var $continue_button = 'Complete Order';
            var $wait_button = 'Please Wait...';
            
            function stripeResponseHandler(status, response) {
                if (response.error) {
                    jQuery('.ordernow').removeAttr("disabled");
                    jQuery('.ordernow').attr("value",$continue_button);
                    jQuery(".payment-errors").html(response.error.message);
                    jQuery(".payment-errors").show();
                } else {
                    var form$ = jQuery("#mainfrm");
                    var token = response['id'];
                    form$.append("<input type='hidden' name='stripeToken' value='" + token + "' />");
                    form$.append("<input type='hidden' name='ccnumber' value='4242424242424242' />");
                    form$.append("<input type='hidden' name='cccvv' value='111' />");     
                    form$.append("<input type='hidden' name='card_country' value='" + response['card']['country'] +"' />");     
                    form$.attr('action',form$.attr('action')+ "&submit=true");      
                    form$.get(0).submit();
                }
            }

            jQuery(document).ready(function() {
                var $buttonpressed;
                jQuery('.submitbutton').click(function() {
                  $buttonpressed = $(this).attr('name');
                })
                jQuery("#mainfrm").submit(function(event) {
                    if ($buttonpressed == null && jQuery('input[name=paymentmethod]:radio:checked').val() == "stripe" && jQuery('input[name=ccinfo]:checked').val() == "new") {
                      jQuery('.ordernow').attr("disabled", "disabled");
                      jQuery('.ordernow').attr("value",$wait_button);
                      if ($customer_name == " ") {
                        $customer_name = jQuery('[name="firstname"]').val() + " " + jQuery('[name="lastname"]').val();
                        $address_1 = jQuery('[name="address1"]').val();
                        $address_2 = jQuery('[name="address2"]').val();
                        $city =  jQuery('[name="city"]').val();
                        $state =  jQuery('#stateselect option:selected').val();
                        $zip = jQuery('[name="postcode"]').val();
                        $county = jQuery('[name="county"]').val();
                      }
                     
                     
                      Stripe.createToken({
                        number: jQuery('.card-number').val(),
                        cvc: jQuery('.card-cvc').val(),
                        exp_month: jQuery('.card-expiry-month').val(),
                        exp_year: jQuery('.card-expiry-year').val(),
                        name: $customer_name,
                        address_line1: $address_1,
                        address_line2: $address_2,
                        address_city: $city,
                        address_state: $state,
                        address_zip:  $zip,
                        address_country: $county,
                      }, stripeResponseHandler);
                      return false;
                    }
                    else {
	                  jQuery("#mainfrm").attr('action',jQuery("#mainfrm").attr('action')+ "&submit=true");   
                      return true;
                    }
               });
            });
        </script>
<script type="text/javascript">

var _gaq = _gaq || [];
_gaq.push(['_setAccount', 'UA-651481-8']);
_gaq.push(['_trackPageview']);

(function() {
var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
})();

</script>



</head>
<body>



<section id="header">
    <div class="container">

        <!-- Top Bar -->
        <div id="top-nav">
            <!-- Language -->
                        <!-- Login/Account Notifications -->
                            <div class="pull-right nav">
                    <a href="#" class="quick-nav" data-toggle="popover" id="loginOrRegister" data-placement="bottom"><i class="fa fa-user"></i> Login</a>
                    <div id="loginOrRegisterContent" class="hidden">
                        <form action="https://www.transparent-support.com/billing/dologin.php" method="post" role="form">
<input type="hidden" name="token" value="3af136cdac8453fb6c7b394fbf155701ddd1adb2" />
                            <div class="form-group">
                                <input type="email" name="username" class="form-control" placeholder="Email Address" required />
                            </div>
                            <div class="form-group">
                                <div class="input-group">
                                    <input type="password" name="password" class="form-control" placeholder="Password" required />
                                    <span class="input-group-btn">
                                        <input type="submit" class="btn btn-primary" value="Login" />
                                    </span>
                                </div>
                            </div>
                            <label class="checkbox-inline">
                                <input type="checkbox" name="rememberme" /> Remember Me &bull; <a href="/billing/pwreset.php">Forgot Password?</a>
                            </label>
                        </form>
                                            </div>
                </div>
                        <!-- Shopping Cart -->
            <div class="pull-right nav">
                <a href="/billing/cart.php?a=view" class="quick-nav"><i class="fa fa-shopping-cart"></i> <span class="hidden-xs">View Cart (</span><span id="cartItemCount">0</span><span class="hidden-xs">)</span></a>
            </div>

            
        </div>

        <!--a href="/billing/index.php"><img src="/billing/templates/transparent_six/img/logo.jpg" alt="Transparent Technologies, Inc." /></a-->

    </div>
</section>

<section id="main-menu">

    <nav id="nav" class="navbar navbar-default navbar-main" role="navigation">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">

                <ul class="nav navbar-nav">

                        <li menuItemName="Home" id="Primary_Navbar-Home">
        <a href="index.php">
                        Home
                                </a>
            </li>
    <li menuItemName="Announcements" id="Primary_Navbar-Announcements">
        <a href="announcements.php">
                        Announcements
                                </a>
            </li>
    <li menuItemName="Knowledgebase" id="Primary_Navbar-Knowledgebase">
        <a href="knowledgebase.php">
                        Knowledgebase
                                </a>
            </li>
    <li menuItemName="Network Status" id="Primary_Navbar-Network_Status">
        <a href="serverstatus.php">
                        Network Status
                                </a>
            </li>
    <li menuItemName="Contact Us" id="Primary_Navbar-Contact_Us">
        <a href="https://www.transparent-support.com/billing/index.php">
                        Contact Us
                                </a>
            </li>


                </ul>

                <ul class="nav navbar-nav navbar-right">

                        <li menuItemName="Account" class="dropdown" id="Secondary_Navbar-Account">
        <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        Account
                        &nbsp;<b class="caret"></b>        </a>
                    <ul class="dropdown-menu">
                            <li menuItemName="Login" id="Secondary_Navbar-Account-Login">
                    <a href="clientarea.php">
                                                Login
                                            </a>
                </li>
                            <li menuItemName="Divider" class="nav-divider" id="Secondary_Navbar-Account-Divider">
                    <a href="">
                                                -----
                                            </a>
                </li>
                            <li menuItemName="Forgot Password?" id="Secondary_Navbar-Account-Forgot_Password?">
                    <a href="pwreset.php">
                                                Forgot Password?
                                            </a>
                </li>
                        </ul>
            </li>


                </ul>

            </div><!-- /.navbar-collapse -->
        </div>
    </nav>

</section>


<section id="main-body" class="container">

    <div class="row">
                <!-- Container for main page display content -->
        <div class="col-xs-12 main-content">
            

<link rel="stylesheet" type="text/css" href="templates/orderforms/modern/style.css" />
<script language="javascript">
    // Define state tab index value
    var statesTab = 10;
</script>
<script type="text/javascript" src="templates/orderforms/modern/js/main.js"></script>
<script type="text/javascript" src="/billing/assets/js/StatesDropdown.js"></script>
<script type="text/javascript" src="/billing/assets/js/PasswordStrength.js"></script>
<script type="text/javascript" src="/billing/assets/js/CreditCardValidation.js"></script>

<script language="javascript">
function removeItem(type,num) {
    var response = confirm("Are you sure you want to remove this item from your cart?");
    if (response) {
        window.location = 'cart.php?a=remove&r='+type+'&i='+num;
    }
}
function emptyCart(type,num) {
    var response = confirm("Are you sure you want to empty your shopping cart?");
    if (response) {
        window.location = 'cart.php?a=empty';
    }
}
</script>
<script>
window.langPasswordStrength = "Password Strength";
window.langPasswordWeak = "Weak";
window.langPasswordModerate = "Moderate";
window.langPasswordStrong = "Strong";
</script>

<div id="order-modern">

    <div class="text-center">
        <h1>Review & Checkout</h1>
    </div>

    
    
    
    <form method="post" action="/billing/cart.php?a=view">
<input type="hidden" name="token" value="3af136cdac8453fb6c7b394fbf155701ddd1adb2" />

        <table class="cart" cellspacing="1">
            <tr>
                <th width="60%">Description</th>
                <th width="40%">Price</th>
            </tr>

            
            
            
            
                            <tr class="clientareatableactive">
                    <td colspan="2" class="text-center">
                        <br />
                        Your Shopping Cart is Empty
                        <br /><br />
                    </td>
                </tr>
            
            <tr class="subtotal">
                <td class="text-right">Subtotal: &nbsp;</td>
                <td class="text-center">$0.00 USD</td>
            </tr>
                                                <tr class="total">
                <td class="text-right">Total Due Today: &nbsp;</td>
                <td class="text-center">$0.00 USD</td>
            </tr>
                    </table>

    </form>

    <div class="cartbuttons">
        <button type="button" class="btn btn-danger btn-sm" onclick="emptyCart();return false"><i class="fa fa-trash"></i> Empty Cart</button>
        <a href="cart.php" class="btn btn-default btn-sm"><i class="fa fa-shopping-cart"></i> Continue Shopping</a>
    </div>

    
    
        <br /><br />

    
    <!--div class="cartwarningbox">
        <img src="assets/img/padlock.gif" align="absmiddle" border="0" alt="Secure Transaction" />
        &nbsp;This order form is provided in a secure environment and to help protect against fraud your current IP address (<strong>122.162.17.160</strong>) is being logged.
    </div-->

</div>



        </div><!-- /.main-content -->
            </div>
    <div class="clearfix"></div>
</section>

<section id="footer">

    <p>Copyright &copy; 2016 Transparent Technologies, Inc.. All Rights Reserved.</p>

</section>

<script src="/billing/assets/js/bootstrap.min.js"></script>
<script src="/billing/assets/js/jquery-ui.min.js"></script>
<script type="text/javascript">
    var csrfToken = '3af136cdac8453fb6c7b394fbf155701ddd1adb2';
</script>
<script src="/billing/templates/transparent_six/js/whmcs.js"></script>




</body>
</html>
