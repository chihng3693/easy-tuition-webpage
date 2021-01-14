<!DOCTYPE html>
<html>

<head>
    <title>Assignment 2 CPT211</title>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <link rel="stylesheet" href="paymentStyle.css?v=<?php echo time(); ?>">
</head>

<body>

    <div id="navbar" class="row">

        <!--header-->
        <header>
            <nav>
                <ul>
                    <li><img src="../images/tuition-logo.png" alt="tuition-logo" class="logo"></li>
                    <li> <a href="../userhome/userhome.php">Home</a> </li>
                    <li> <a href="../announcement/announcement.php">Announcement</a> </li>
                    <li> <a href="payment.php">Payment</a> </li>
                    <li> <a href="../userprofile/profile.php">Profile</a> </li>
                </ul>
            </nav>
        </header>

    </div>

    <!-- payment body-->
    <section id="payment">
        <h3>Easy Tuition Payment System</h3>
        <p>Please double check your booking details before make any payment.</p>
            
        <div class="row">
        <div class="col-75">
            <div class="container", style="margin-top: 25px;">
            <div class="col-50">
                <table style="width:100%">
                <tr>
                    <td>1.</td>
                    <td>01/11/2020</td>
                    <td>Gemilang Center</td>
                    <td>Maths</td>
                    <td>100.00</td>
                    <td>
                    <div class="openBtn">
                        <button class="openButton" style="vertical-align:middle" onclick="openForm()"><span>Pay</span></button>
                    </div>

                    <div class="loginPopup">
                        <div class="formPopup" id="popupForm">
                        <form action="/action_page.php" class="formContainer">
                            <h2>Easy Tuition Payment Form</h2>

                            <div class="amount">
                            <p>Total to pay</p>
                            <h2>RM 100</h2>
                            </div>

                            <form method="post" action="#">
                            <div class="paymethod">
                                <p>How would you like to pay ?</p>
                                <div>
                                <input type="radio" id="card" name="formContainer" value="card">
                                <label for="card">Credit Cards 
                                    <div class="icon-container">
                                    <i class="fa fa-cc-visa" style="color:navy;"></i>
                                    <i class="fa fa-cc-amex" style="color:blue;"></i>
                                    <i class="fa fa-cc-mastercard" style="color:red;"></i>
                                    <i class="fa fa-cc-discover" style="color:orange;"></i>
                                    </div>
                                </label>
                                <div class="reveal-if-active">
                                    <label for="name">Name on Card: </label>
                                    <input type="text" id="name" name="name" placeholder="John Doe" class="require-if-active" data-require-pair="#pay-creditcard">
                                    <label for="cardNo">Card Number:          </label>
                                    <input type="text" id="cardNo" name="cardNo" placeholder="1001 0000 0000 0000" class="require-if-active" data-require-pair="#pay-creditcard">
                                    <label for="expdate">Expired Date:      </label>
                                    <input type="text" id="expdate" name="expdate" placeholder="MM/YY" class="require-if-active" data-require-pair="#pay-creditcard">
                                    <label for="CV-code">CV Code:         </label>
                                    <input type="text" id="CV-code" name="CV-code" placeholder="CVC" class="require-if-active" data-require-pair="#pay-creditcard">
                                </div>
                                </div>

                                <div>
                                <input type="radio" id="onlinebank" name="formContainer" value="onlinebank">
                                <label for="onlinebank">FPX</label>
                                <div class="reveal-if-active">
                                    <label for="email">Email: </label>
                                    <input type="email" id="email" name="email" placeholder="example@address.com" class="require-if-active" data-require-pair="#pay-fpx">
                                    <label for="username">User Name: </label>
                                    <input type="username" id="username" name="username" placeholder="admin" class="require-if-active" data-require-pair="#pay-fpx">
                                </div>
                                </div>
                            </div>
                            <button type="submit" class="btn" onclick="paymessage()">Pay Now</button>
                            <button type="button" class="btn cancel" onclick="closeForm()">Cancel</button>
                            </form>
                        </form>
                        </div>
                    </div>
                    </td>
                </tr>
                </table>
            </div>
            </div>
        </div>
        </div>

    </section>
    
    <!--footer-->
    <div class="row">
        <footer>
            <p>Copyright © 2019 - Universiti Sains Malaysia</p>
        </footer>
    </div>

    <script src="paymentFunc.js"></script>
</body>
</html>