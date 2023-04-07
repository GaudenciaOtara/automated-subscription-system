<?php
session_start();
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

function mpesa(){
    $phone_number = htmlspecialchars($_POST["mpesanumber"]);
    $amount = htmlspecialchars($_POST["amount"]);

    $consumer_key = '4zoOGSweQY5hmA0TJ6rMAQd0P5qoHZ2D';
    $consumer_secret = 'QfcXyARBH6QkP0fQ';

    $Business_Code = '174379';
    $Passkey = 'bfb279f9aa9bdbcf158e97dd71a467cd2e0c893059b10f78e6b72ada1ed2c919';
    $Type_of_Transaction = 'CustomerPayBillOnline';
    $Token_URL = 'https://sandbox.safaricom.co.ke/oauth/v1/generate?grant_type=client_credentials';
    $OnlinePayment = 'https://sandbox.safaricom.co.ke/mpesa/stkpush/v1/processrequest';
    $CallBackURL = 'https://2974-154-s159-237-136.in.ngrok.io/transactions/callback.php';
    // $CallBackURL = "http://callback.php";
    $Time_Stamp = date("Ymdhis");
    $password = base64_encode($Business_Code . $Passkey . $Time_Stamp);

    $curl_request = curl_init();
    curl_setopt($curl_request, CURLOPT_URL, $Token_URL);
    $credentials = base64_encode($consumer_key . ':' . $consumer_secret);
    curl_setopt($curl_request, CURLOPT_HTTPHEADER, array('Authorization: Basic ' . $credentials));
    curl_setopt($curl_request, CURLOPT_HEADER, false);
    curl_setopt($curl_request, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($curl_request, CURLOPT_SSL_VERIFYPEER, false);
    $curl_request_response = curl_exec($curl_request);

    $token = json_decode($curl_request_response)->access_token;

    $curl_Tranfer2 = curl_init();
    curl_setopt($curl_Tranfer2, CURLOPT_URL, $OnlinePayment);
    curl_setopt($curl_Tranfer2, CURLOPT_HTTPHEADER, array('Content-Type:application/json', 'Authorization:Bearer ' . $token));

    $curl_Tranfer2_post_data = [
        'BusinessShortCode' => $Business_Code,
        'Password' => $password,
        'Timestamp' => $Time_Stamp,
        'TransactionType' => $Type_of_Transaction,
        'Amount' => $amount,
        'PartyA' => $phone_number,
        'PartyB' => $Business_Code,
        'PhoneNumber' => $phone_number,
        'CallBackURL' => $CallBackURL,
        'AccountReference' => 'Subscription System',
        'TransactionDesc' => 'Test transaction',
    ];

    $data2_string = json_encode($curl_Tranfer2_post_data);

    curl_setopt($curl_Tranfer2, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($curl_Tranfer2, CURLOPT_POST, true);
    curl_setopt($curl_Tranfer2, CURLOPT_POSTFIELDS, $data2_string);
    curl_setopt($curl_Tranfer2, CURLOPT_HEADER, false);
    curl_setopt($curl_Tranfer2, CURLOPT_SSL_VERIFYPEER, 0);
    curl_setopt($curl_Tranfer2, CURLOPT_SSL_VERIFYHOST, 0);
    $curl_Tranfer2_response = json_decode(curl_exec($curl_Tranfer2));

    echo json_encode($curl_Tranfer2_response, JSON_PRETTY_PRINT);
    echo $_SESSION['user'];
    $curl_Tranfer2_response_json = json_encode($curl_Tranfer2_response, JSON_PRETTY_PRINT);


    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        // First, establish a database connection
        $servername = "localhost";
        $username = "root";
        $password = "1234";
        $dbname = "sub_system";

        $conn = new mysqli($servername, $username, $password, $dbname);
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // Retrieve the phone number from the form
        $phone_number = $_POST['mpesanumber'];

        $var_session = $_SESSION['user'];
        // Insert the phone number into the user_registrations table
        $sql = "UPDATE user_registrations SET mpesanumber='$phone_number' WHERE email='$var_session'";

        if ($conn->query($sql) === TRUE) {
            // Redirect the user to the success page
            header("Location: ./add.php");
            echo "success";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }

        $conn->close();
    }

}

function paypall(){}

function creditcard(){
    header("Location: ./add.php");
}



   $amount = $_POST['amount'];
    // check direction
    $paymentMethod = $_POST['payment_method'];

    if ($paymentMethod == "mpesa") {
        # code...
        echo "hello mpesa";
        mpesa();
    }
    elseif ($paymentMethod == "paypal") {
    
        # code...
        echo "paypal hello";
        echo'
        <div class="col text-end">
        <div id="paypal-button-container">
        </div>
        <script src="https://www.paypal.com/sdk/js?client-id=AS34gEWoCCQdJS5aBUkaKRS-jLuClbRL_TEbmpaMMergp9XDYUZIVtFbcVgDGnGVlnvJHEkPCUhpSEMX&disable-funding=credit,card"></script>

<script src="https://cdn.jsdelivr.net/npm/@paypal/paypal-js@1.0.4/dist/paypal-buttons.min.js"></script>

        ';
        echo"
        <script>
paypal.Buttons({
    createOrder: function(data, actions) {
        // This function sets up the details of the transaction, including the amount and line item details.
        return actions.order.create({
            purchase_units: [{
                amount: {
                    value: '0.01'
                }
            }]
        });
    },
    onApprove: function(data, actions) {
        // This function captures the funds from the transaction.
        return actions.order.capture().then(function(details) {
            // This function shows a transaction success message to your buyer.
            alert('Transaction completed by ' + details.payer.name.given_name + '!');
        });
    }
}).render('#paypal-button-container');

 

</script>
        ";
        
    }
    elseif ($paymentMethod == "credit-card") {
 
  echo'
  <!-- FontAwesome JS-->
    <script defer src="assets/plugins/fontawesome/js/all.min.js"></script>
    
    <!-- App CSS -->  
    <link id="theme-style" rel="stylesheet" href="assets/css/portal.css">
	<link rel="stylesheet" href="../css/modal.css">
	<!-- PayPal Connection -->
	<!-- <script src="https://www.paypal.com/sdk/js?client-id=YOUR_CLIENT_ID&currency=USD"></script> -->
	<!-- Bootstrap CSS -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css">

<!-- Bootstrap JavaScript -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/js/bootstrap.min.js"></script>


  <script src="https://js.stripe.com/v3/"></script>

<!-- Create a button to open the payment modal -->
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#payment-modal" style="width:15vw; color:white; margin-top:6%;margin-left:3%;";>
Make Payment
</button>

<!-- Create the payment modal -->
<div class="modal fade" id="payment-modal" tabindex="-1" aria-labelledby="payment-modal-label" aria-hidden="true">
<div class="modal-dialog modal-dialog-centered">
<div class="modal-content">
<div class="modal-header">
<h5 class="modal-title" id="payment-modal-label">Make Payment</h5>
<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
</div>
<div class="modal-body">
<form id="payment-form">
<div class="form-row">
  <label for="card-element">
    Credit or debit card
  </label>
  <div id="card-element">
    <!-- A Stripe Element will be inserted here. -->
  </div>

  <!-- Used to display form errors. -->
  <div id="card-errors" role="alert"></div>
</div>
</form>
</div>
<div class="modal-footer">
<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
<button type="button" class="btn btn-primary" id="submit-payment">Submit Payment</button>
</div>
</div>
</div>
</div>';
   
echo "

<script>
// Set up Stripe.js with your publishable API key
var stripe = Stripe('pk_test_12345');

// Create a Stripe Element for the card form
var elements = stripe.elements();
var cardElement = elements.create('card');

// Mount the Stripe Element in the form
cardElement.mount('#card-element');

// Handle form submission
var form = document.getElementById('payment-form');
var submitButton = document.getElementById('submit-payment');
submitButton.addEventListener('click', function(event) {
  event.preventDefault();

  // Disable the submit button to prevent multiple submissions
  submitButton.disabled = true;

  // Collect the user's payment information and send it to Stripe
  stripe.createToken(cardElement).then(function(result) {
    if (result.error) {
      // Display error message if there was a problem
      var errorElement = document.getElementById('card-errors');
      errorElement.textContent = result.error.message;
    } else {
      // Send the token ID to your server to complete the transaction
      fetch('/charge', {
        method: 'POST',
        headers: {'Content-Type': 'application/json'},
        body: JSON.stringify({token: result.token.id})
      }).then(function(response) {
        return response.json();
      }).then(function(data) {
        // Display a success message to the user
        alert('Payment successful!');
        // Close the modal
        var paymentModal = document.getElementById('payment-modal');
        var modal = bootstrap.Modal.getInstance(paymentModal);
        modal.hide();
      });
    }
  });
});
</script>
";
echo'
<script src="assets/plugins/popper.min.js"></script>
<script src="assets/plugins/bootstrap/js/bootstrap.min.js"></script>  

<!-- Page Specific JS -->
<script src="assets/js/app.js"></script> ';
 
    }
    if (isset($_SESSION['user'])){
 
    // First, establish a database connection
    $servername = "localhost";
    $username = "root";
    $password = "1234";
    $dbname = "sub_system";

    $conn = new mysqli($servername, $username, $password, $dbname);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Prepare the SQL statement
    // $user_id = $_SESSION['id'];
// assign new subscription to the user's array
    // $user_subscriptions[$user_id][] = $new_subscription;


    // Retrieve the phone number from the form
    $subscriptiontype = $_POST['subscription_type'];
    $reference_id = $_POST['reference_id'];
    $amount = $_POST['amount'];
    $paymentmethod = $_POST['payment_method'];
    $duration = $_POST['subscription_duration'];
    $daystarted = $_POST['day_time_started'];
    $dayend = $_POST['subscription_date_end'];
    $autorenew = $_POST['subscription_autorenew'];

    // Prepare the SQL statement
    $stmt = $conn->prepare("INSERT INTO transactions (user_id,id, subscription_type, amount, payment_method, subscription_duration, day_time_started, subscription_date_end, subscription_autorenew) VALUES (?,?, ?, ?, ?, ?, ?, ?, ?)" ) ;

    // Bind the parameters to the SQL statement
    $stmt->bind_param("iisisissi", $reference_id,$user_id, $subscriptiontype, $amount, $paymentmethod, $duration, $daystarted, $dayend, $autorenew);


    // Execute the prepared statement
    if ($stmt->execute()) {
        // Redirect the user to the success page
        // header("Location: ./add.php");
        exit();
    } else {
        echo "Error: " . $stmt->error;
    }

    // Close the statement and database connection
    $stmt->close();
    $conn->close();
}
 
}
else {
    echo "<script>
            location.replace('../login.php');
        </script>";
}


?>