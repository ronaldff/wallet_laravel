<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>Document</title>
</head>
<body>

  <div>payment is processing...</div>
  
  <button id="rzp-button1" style="display:none;">Pay</button>
  <script
  src="https://code.jquery.com/jquery-3.6.0.min.js"
  integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4="
  crossorigin="anonymous"></script>
  <script src="https://checkout.razorpay.com/v1/checkout.js"></script>
  <script>
    // let key = "<?php echo $order['id']; ?>";
    // console.log(key);
    // throw new Error('df');
    var options = {
      "key": "<?php echo $key; ?>",
      "amount": "<?php echo $order['amount']; ?>",
      "currency": "INR",
      "name": "Paise De Mujhe Pagal",
      "description": "Test Transaction",
      "image": "https://cdn.razorpay.com/logos/J51A0eZxb8Yt1F_medium.png",
      "order_id": "<?php echo $order['id']; ?>",
      "handler": function (response){
        // console.log(response);
        alert('Money added in the wallet successfully');
        window.location.href = "{{ route('wallet') }}";
        // alert(response.razorpay_payment_id);
        // alert(response.razorpay_order_id);
        // alert(response.razorpay_signature)
      },
      "prefill": {
        "name": "piyush",
        "email": "piyush@datalogysoftware.com",
        "contact": "1234567898"
      },
      "notes": {
        "address": "KT Corporate Office"
      },
      "theme": {
        "color": "#3399cc"
      }
    };

    var rzp1 = new Razorpay(options);
    document.getElementById('rzp-button1').onclick = function(e){
        rzp1.open();
        e.preventDefault();
    }
    document.getElementById('rzp-button1').click();
  </script>
  </body>
</html>