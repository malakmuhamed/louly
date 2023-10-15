<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="signup.css">
    <link href="https://fonts.googleapis.com/css2?family=Overpass+Mono:wght@300&amp;family=Space+Grotesk:wght@300&amp;display=swap" rel="stylesheet">
    <title>Register</title>
</head>
<body>
    <script src="Validation.js"></script>
    <div class="createAndBenefits">
        <div class="regForm">
            <form action="" method="post" onsubmit="return validate(this)">
                <h2>Create Account</h2>
                <p>Save your shipping information for faster checkout.
                     Opt-in for our email list to receive early access to new products &amp; exclusive offers.</p> 
                 <div>
                    <input type="text" name="Fname" placeholder="First Name">
                    <input type="text" name="Lname" placeholder="Last Name">
                 </div> 
                 <div class="err"><span id="FnameERR"></span> <span id="LnameERR"></span></div>
                 <input type="email" name="email" placeholder="Email Address"> 
                 <span id="eErr" class="err"></span>
                 <input type="email" name="emailConfirm" placeholder="Confirm Email Address"> 
                 <span id="ecErr" class="err"></span>
                 <p>
                    <!-- "="">Terms of Use & Privacy Policy. California residents: Please also 
                    see our Financial Incentive Terms"ref=""@change="onInputChange"description="true"> By
                    subscribing to Sophistiqué beauty and skin you consent to receive 
                    recurring automated promotional and personalized marketing 
                    messages (e.g. cart reminders) via email and text messages. 
                    Consent is not a condition of any purchase. View Terms of Use & 
                    Privacy Policy. -->
                 </p>
                 <input type="password" name="pass" placeholder="Password">
                 <span id="pErr" class="err"></span>
                 <input type="password" name="passConfirm" placeholder="Confirm Password">
                 <span id="pcErr" class="err"></span>
                 <br>
                 <select name="months" required="">
                    <option value=""> Months</option>
                    <option value="january">January</option>
                    <option value="february">February</option>
                    <option value="march">March</option>
                    <option value="april">April</option>
                    <option value="may">May</option>
                    <option value="june">June</option>
                    <option value="july">July</option>
                    <option value="august">August</option>
                    <option value="september">September</option>
                    <option value="october">October</option>
                    <option value="november">November</option>
                    <option value="december">December</option>

                  </select>
                  <select name="Days" required="">
                    <option value="">Day</option>
                    <option value="1"> 1</option>
                    <option value="2"> 2</option>
                    <option value="3"> 3</option>
                    <option value="4"> 4</option>
                    <option value="5"> 5</option>
                    <option value="6"> 6</option>
                    <option value="7"> 7</option>
                    <option value="8"> 8</option>
                    <option value="9"> 9</option>
                    <option value="10"> 10</option>
                    <option value="11"> 11</option>
                    <option value="12"> 12</option>
                    <option value="13"> 13</option>
                    <option value="14"> 14</option>
                    <option value="15"> 15</option>
                    <option value="16"> 16</option>
                    <option value="17"> 17</option>
                    <option value="18"> 18</option>
                    <option value="19"> 19</option>
                    <option value="20"> 20</option>
                    <option value="21"> 21</option>
                    <option value="22"> 22</option>
                    <option value="23"> 23</option>
                    <option value="24"> 24</option>
                    <option value="25"> 25</option>
                    <option value="26"> 26</option>
                    <option value="27"> 27</option>
                    <option value="28"> 28</option>
                    <option value="29"> 29</option>
                    <option value="30"> 30</option>
                    <option value="31"> 31</option>
                  </select>
                  <input type="submit" name="submit" value="Create Account">
            </form>
        </div>
        <div class="benefits">
            <h2>Account Benefits</h2>
            <p>
               </p><h4>GET YOUR FAVES FASTER</h4>
                Save your order information to
                make checkout a breeze.
            <p></p>
            <p>
               </p><h4>EXCLUSIVE OFFERS + INFO</h4> 
                Sign up to stay posted on hyper-
                limited offers, online-only 
                product drops, in-store events.
            <p></p>
            <p>
               </p><h4>ORDER DETAILS</h4>
                Receive important updates about 
                your order, and track it every 
                step of the way.
            <p></p>
        </div>
    </div>

</body>
</html>