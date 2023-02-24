<!DOCTYPE html>
<html>
<head>
    <title>Laravel 9 Stripe Payment Gateway Integration Example - LaravelTuts.com</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</head>
<style type="text/css">
    h2{
        margin:80px auto;
    }    
</style>
<body>
<div class="container">
    <div class="card" style="">
        <div class="card-body text-center">
          <h5 class="card-title">Oarder Detail</h5>
          @if($status == 200)
          <h6 class="card-subtitle mb-2 text-muted">Your order place successfully.</h6>
          <p class="card-text">Your Order ID: {{ $orderId}} </p>
          <a href="/" class="btn btn-primary">Continue shopping</a>
          @else
          <p class="card-text ">Something went woring, Please try again</p>
          @endif
        </div>
      </div>
</div>
</body>
</html>