<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <title>Wallet page</title>
    <style>
        .in{
            color: green;
        }

        .out{
            color : red;
        }
    </style>
  </head>
  <body>
    
    <div class="container mt-5">
        <div class="row">
            <div class="card">
                <div class="text-center card-header text-uppercase text-secondary"><h2>Wallet page created by piyush shyam</h2></div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-3 text-primary">Current Wallet Amount :
                
                            @if ($getWalletAmt > 0)
                                {{ "₹" . $getWalletAmt }}
                            @else
                                {{ "₹0" }}
                            @endif
                            
                            {{-- user details --}}
                            <div class="card text-dark" style="width: 16rem;">
                                <div class="card-header text-uppercase text-center">
                                  User Details
                                </div>
                                <ul class="list-group list-group-flush ">
                                    <li class="list-group-item pl-1">Name: {{ $userDetails[0]->name }}</li>
                                    <li class="list-group-item pl-1">Email: {{ $userDetails[0]->email }}</li>
                                </ul>
                            </div>
                        </div>

                        <div class="col-md-3">
                            Add Money to Wallet : 
                            <form action="{{ route('addmoney_wallet') }}" method="post" class="mt-1">
                                @csrf
                                <div>
                                    <input class="form-control" type="number" name="amount" required placeholder="Enter Money">
                                </div>
                        
                                <div class="text-danger">
                                    {{ $errors->first('amount') }}
                                </div>
            
                                <div class="mt-2 text-center">
                                    <input type="submit" value="Submit" class="btn btn-success">
                                </div>
                            </form>
                            <div class="text-center mt-2">
                                <a href="{{ url('google-v3-recaptcha') }}" class="btn btn-dark text-center">Contact Us</a>
                            </div>

                            <div class="text-center mt-2">
                                <a href="{{ url('auth/google') }}" class="btn btn-dark text-center">
                                    <strong>Google Login</strong>
                                  </a>
                               
                            </div>

                           
                        </div>

                        <div class="col-md-6">
                            <table class="table table-bordered">
                                <thead>
                                <tr>
                                    <th scope="col">Amount</th>
                                    <th scope="col">Message</th>
                                    <th scope="col">Type</th>
                                    <th scope="col">Razorpay Order Id</th>
                                    <th scope="col">Date</th>
                                </tr>
                                </thead>
                                <tbody>
                                    @if (count($getWalletList) > 0)
            
                                        @foreach ($getWalletList as $item)
                                            <tr>
                                                <td>{{ $item->amt }}</td>
                                                <td @if ($item->type == 'in') class="in"
                                                    @else
                                                    class="out"
                                                @endif>{{ $item->msg }}</td>
                                                <td class="text-uppercase">{{ $item->type }}</td>
                                                <td>
                                                    {{ $item->razorpay_order_id ? $item->razorpay_order_id : '-' }}
                                                </td>
                                                <td>{{ $item->added_on }}</td>
                                            </tr>
                                        @endforeach
                                    @else
                                        <tr class="text-center text-info">
                                            <td colspan="5">No Wallet List Found</td>
                                        </tr>
                                    @endif
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>

</html>