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
    <link href="{{asset('css/home_page.css')}}" rel="stylesheet">
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
        <div class="col-sm-12 col-md-6 col-lg-3 location loc-1 ">
            <div class="location-content ">Phòng khách</div>
        </div>
        <div class="col-sm-12 col-md-6 col-lg-3 location loc-2">
            <div class="location-content "> Phòng ngủ 1</div>
        </div>
        <div class="col-sm-12 col-md-6 col-lg-3 location loc-3">
            <div class="location-content ">Phòng ngủ 2</div>
        </div>
        <div class="col-sm-12 col-md-6 col-lg-3 location loc-4">
            <div class="location-content "> Phòng tắm</div>
        </div>
        <div class="col-sm-12 col-md-6 col-lg-3 location ">
            <div class="location-content "> Phòng tắm</div>
        </div>
        <div class="col-sm-12 col-md-6 col-lg-3 location loc-diff">
            <div class="location-content "> Phòng tắm</div>
        </div>
        <div class="col-sm-12 col-md-6 col-lg-3 location loc-diff">
            <div class="location-content "> Phòng tắm</div>
        </div>
        <div class="col-sm-12 col-md-6 col-lg-3 location loc-diff">
            <div class="location-content "> Phòng tắm</div>
        </div>
        <div class="col-sm-12 col-md-6 col-lg-3 location loc-diff">
            <div class="location-content "> Phòng tắm</div>
        </div>
        {{--        <div class="col-sm-12 col-md-6 col-lg-3 location-content loc-5">--}}
        {{--            Các đèn khác--}}
        {{--        </div>--}}
    </div>
</div>

</body>
</html>
