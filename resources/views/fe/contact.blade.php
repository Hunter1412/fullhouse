@extends('fe.layout.master')
@section('title', 'Contact us')
@section('content')
<main id="main" class="main-site left-sidebar home-page home-01 ">

    <div class="container">

        <div class="wrap-breadcrumb">
            <ul>
                <li class="item-link"><a href="{{ route('home')}}" class="link">home</a></li>
                <li class="item-link"><span>Contact us</span></li>
            </ul>
        </div>
        <div class="row">
            <div class="main-content-area">
                <div class="wrap-contacts row">
                    <div class="col-md-6">
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3919.2661906798976!2d106.68023691483658!3d10.790912961876739!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x317528d4a7c59c09%3A0x8e2f7cbc924be1db!2zMzkxYSDEkC4gTmFtIEvhu7MgS2jhu59pIE5naMSpYSwgUGjGsOG7nW5nIDE0LCBRdeG6rW4gMywgVGjDoG5oIHBo4buRIEjhu5MgQ2jDrSBNaW5oLCBWaeG7h3QgTmFt!5e0!3m2!1svi!2s!4v1681308498484!5m2!1svi!2s" width="600" height="300" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                    </div>
                    <div class="col-md-6" style="padding: 0 40px;">
                        <h2 class="box-title">Contact Detail</h2>
                        <div class="wrap-icon-box">
                            <div class="icon-box-item">
                                <i class="fa fa-envelope" aria-hidden="true"></i>
                                <div class="right-info">
                                    <b>Email</b>
                                    <p>fullhouseteam01@gmail.com</p>
                                </div>
                            </div>
                            <div class="icon-box-item">
                                <i class="fa fa-phone" aria-hidden="true"></i>
                                <div class="right-info">
                                    <b>Phone</b>
                                    <p>0123-465-789-111</p>
                                </div>
                            </div>
                            <div class="icon-box-item">
                                <i class="fa fa-map-marker" aria-hidden="true"></i>
                                <div class="right-info">
                                    <b>Mail Office</b>
                                    <p>No 391A, Nam Ky Khoi Nghia Street, District 3, HCM City</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- right column end-->

            </div><!--end main products area-->

        </div><!--end row-->

    </div><!--end container-->

</main>
@endsection