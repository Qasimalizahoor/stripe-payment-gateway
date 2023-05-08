<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    {{-- <meta name="viewport" content="width=device-width, initial-scale=1.0"> --}}
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Stripe Payment Gateway V1.0</title>

    {{-- Bootstrap --}}
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

    {{-- Minified Javascript --}}
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

    <style>
        .submit-button {
        margin-top: 10px;
       }
        </style>
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-4"></div>
            <div class="col-md-4">
                <form action="{{route('stripe.post.v1')}}" class="form-horizontal" method="POST" id="Stripe-payment" role="form">
                    {{ csrf_field() }}

                    <div class="form-row">
                        <div class="col-xs-12 form-group card " required>
                            <label  class="control-lalbel">Card Number</label>
                            <input type="text" class="form-control card-number" size="20" name="card_no">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-xs-12 form-group card " required>
                            <label  class="control-lalbel">CVV</label>
                            <input type="text" class="form-control card-cvv" size="20" placeholder='ex. 311' name="cvvNumber" size='4'>
                        </div>
                    </div>
                    <div class="col-xs-6 form-group expiration" required>
                        <label for="" class="control-label">Expiration</label>
                        <input type="text" class="form-control card-expiry-month" placeholder="MM" size="4" name="ccExpiryMonth">
                    </div>
                    <div class="col-xs-7 form-group expiration" style="margin-top: 7px" required>
                        <label for="" class="control-label">  </label>
                        <input type="text" class="form-control card-expiry-year" placeholder="YYYY" size="4" name="ccExpiryYear">
                    </div>
                    <div class="col-xs-6 form-group expiration" required>
                        <label for="" class="control-label">Amount</label>
                        <input type="text" class="form-control amount" placeholder="200" name="amount">
                    </div>
                    <div class="form-row">
                        <div class="col-md-12 form-group">
                            <button class="form-control btn btn-success submit-button" type="submit">Pay</button>
                        </div>
                    </div>
                </form>

            </div>

        </div>

    </div>
    
</body>
</html>