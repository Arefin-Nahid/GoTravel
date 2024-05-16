<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
    <style>
        body {
            background-color: #f9f9fa;
        }
        .padding {
            padding: 3rem !important;
        }
        .user-card-full {
            overflow: hidden;
        }
        .card {
            border-radius: 5px;
            box-shadow: 0 1px 20px 0 rgba(69,90,100,0.08);
            border: none;
            margin-bottom: 30px;
        }
        .user-profile {
            border-radius: 5px 0 0 5px;
            background: linear-gradient(to right, #ee5a6f, #f29263);
        }
        .card-block {
            padding: 1.25rem;
        }
        .img-radius {
            border-radius: 5px;
        }
        h6 {
            font-size: 14px;
        }
        .card .card-block p {
            line-height: 25px;
        }
        .b-b-default {
            border-bottom: 1px solid #e0e0e0;
        }
        .f-w-600 {
            font-weight: 600;
        }
        .m-b-20 {
            margin-bottom: 20px;
        }
        .m-t-40 {
            margin-top: 20px;
        }
        .user-card-full .social-link li {
            display: inline-block;
        }
        .user-card-full .social-link li a {
            font-size: 20px;
            margin: 0 10px 0 0;
            transition: all 0.3s ease-in-out;
        }
    </style>
</head>
<body>
<div class="page-content page-container" id="page-content">
    <div class="padding">
        <div class="row container d-flex justify-content-center">
            <div class="col-xl-6 col-md-12">
                <div class="card user-card-full">
                    <div class="row m-l-0 m-r-0">
                        <div class="col-sm-4 bg-c-lite-green user-profile">
                            <div class="card-block text-center text-white">
                                <div class="m-b-25">
                                    <img src="https://img.icons8.com/bubbles/100/000000/user.png" class="img-radius" alt="User-Profile-Image">
                                </div>
                                <h6 class="f-w-600">{{ Auth::user()->name }}</h6>
                                <p>Web Designer</p>
                                <i class="mdi mdi-square-edit-outline feather icon-edit m-t-10 f-16"></i>
                            </div>
                        </div>
                        <div class="col-sm-8">
                            <div class="card-block">
                                <h6 class="m-b-20 p-b-5 b-b-default f-w-600">Information</h6>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <p class="m-b-10 f-w-600">Email</p>
                                        <h6 class="text-muted f-w-400">{{ Auth::user()->email }}</h6>
                                    </div>
                                    <div class="col-sm-6">
                                        <p class="m-b-10 f-w-600">Phone</p>
                                        <h6 class="text-muted f-w-400">Not Available</h6>
                                    </div>
                                </div>
                                <h6 class="m-b-20 m-t-40 p-b-5 b-b-default f-w-600">Projects</h6>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <p class="m-b-10 f-w-600">Recent</p>
                                        <h6 class="text-muted f-w-400">Not Available</h6>
                                    </div>
                                    <div class="col-sm-6">
                                        <p class="m-b-10 f-w-600">Most Viewed</p>
                                        <h6 class="text-muted f-w-400">Not Available</h6>
                                    </div>
                                </div>
                                <ul class="social-link list-unstyled m-t-40 m-b-10">
                                    <li><a href="#" data-toggle="tooltip" data-placement="bottom" title="facebook"><i class="mdi mdi-facebook feather icon-facebook facebook"></i></a></li>
                                    <li><a href="#" data-toggle="tooltip" data-placement="bottom" title="twitter"><i class="mdi mdi-twitter feather icon-twitter twitter"></i></a></li>
                                    <li><a href="#" data-toggle="tooltip" data-placement="bottom" title="instagram"><i class="mdi mdi-instagram feather icon-instagram instagram"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="d-flex justify-content-between">
                    <a href="{{ route('homepage') }}" class="btn btn-primary">Home</a>
                    <form action="{{ route('touristlogout') }}" method="POST">
                        @csrf
                        <button type="submit" class="btn btn-danger">Sign Out</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>
