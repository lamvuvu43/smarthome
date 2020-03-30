@extends('welcome')
@section('control_led')
    <div class="row">
        <div class="col-sm-12 col-md-6 col-lg-6">
            <div class="row mt-3 mr-2 led">
                <div class="col-sm-12 col-md-6 col-lg-6 ">
                    Đèn trần trái
                </div>
                <div class="col-sm-12 col-md-6 col-lg-6 button-led">
                    <input id="cT3" class="switch switch-round-success" type="checkbox">
                    <label for="cT3"></label>
                </div>
            </div>
        </div>
        <div class="col-sm-12 col-md-6 col-lg-6">
            <div class="row mt-3  mr-2 led">
                <div class="col-sm-12 col-md-6 col-lg-6 ">
                    Đèn trần phải
                </div>
                <div class="col-sm-12 col-md-6 col-lg-6 button-led ">
                    <input id="cT4" class="switch switch-round-success" type="checkbox">
                    <label for="cT4"></label>
                </div>
            </div>
        </div>
        <div class="col-sm-12 col-md-6 col-lg-6">
            <div class="row mt-3  mr-2 led">
                <div class="col-sm-12 col-md-6 col-lg-6 ">
                    Đèn bàn
                </div>
                <div class="col-sm-12 col-md-6 col-lg-6 button-led ">
                    <input id="cT5" class="switch switch-round-success" type="checkbox">
                    <label for="cT5"></label>
                </div>
            </div>
        </div>
        <div class="col-sm-12 col-md-6 col-lg-6">
            <div class="row mt-3  mr-2 led">
                <div class="col-sm-12 col-md-6 col-lg-6 ">
                    Đèn chùm
                </div>
                <div class="col-sm-12 col-md-6 col-lg-6 button-led ">
                    <input id="cT6" class="switch switch-round-success" type="checkbox">
                    <label for="cT6"></label>
                </div>
            </div>
        </div>
    </div>
@endsection

