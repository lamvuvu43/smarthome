<!DOCTYPE html>
<html lang="en">
<head>
    <title>Bootstrap Example</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
    <link rel="{{asset('public/css/home_page.css')}}">
</head>
<body>

{{--<div class="jumbotron text-center">--}}
{{--    <h1>My First Bootstrap Page</h1>--}}
{{--    <p>Resize this responsive page to see the effect!</p>--}}
{{--</div>--}}

<div class="container">
    <div class="row">
        <div class="col- col-sm-12 col-md-12 col-lg-12 header">
            <h2 class="text-center">Welcomee to Smart Home</h2>
            <p>Nơi đỡ cực nhất</p>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12 col-md-3 col-lg-3 location loc-1">
            Phòng khách
        </div>
        <div class="col-sm-12 col-md-3 col-lg-3 location col-2">
            Phòng ngủ 1
        </div>
        <div class="col-sm-12 col-md-3 col-lg-3 location loc-3">
            Phòng ngủ 2
        </div>
        <div class="col-sm-12 col-md-3 col-lg-3 location loc-4">
            Phòng tắm
        </div>
        <div class="col-sm-12 col-md-3 col-lg-3 location loc-5">
            Các đèn khác
        </div>
    </div>
</div>

</body>
</html>
