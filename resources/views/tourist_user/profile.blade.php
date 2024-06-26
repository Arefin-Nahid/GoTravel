@extends('layouts.frontend')

@section('title', 'Tourist Profile')

@section('content')
<style>
    .page-content {
        background: url('frontend/assets/img/profile.jpg') no-repeat center center;
        background-size: cover;
        padding: 7.5rem 1rem; /* Adjusted padding for better responsiveness */
    }
    
    .user-card-full {
        overflow: hidden;
        display: flex;
        flex-direction: column;
        background-color: #ffffff;
        height: 100%;
    }
    @media (min-width: 768px) {
        .user-card-full {
            flex-direction: row;
        }
    }
    .card {
        border-radius: 5px;
        box-shadow: 0 1px 20px 0 rgba(69, 90, 100, 0.08);
        border: none;
        margin-bottom: 30px;
        width: 100%;
    }
    .user-profile {
        border-radius: 5px 5px 0 0;
        background: linear-gradient(to right, #ee5a6f, #f29263);
        color: white;
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: space-between;
        padding: 20px;
        height: auto;
    }
    @media (min-width: 768px) {
        .user-profile {
            border-radius: 5px 0 0 5px;
            height: 100%;
        }
    }
    .user-profile img {
        border-radius: 50%;
    }
    .card-block {
        padding: 1.25rem;
        position: relative;
        display: flex;
        flex-direction: column;
        justify-content: space-between;
        height: auto;
    }
    @media (min-width: 768px) {
        .card-block {
            height: 100%;
        }
    }
    .col-half {
        flex: 0 0 100%;
        max-width: 100%;
    }
    @media (min-width: 768px) {
        .col-half {
            flex: 0 0 50%;
            max-width: 50%;
        }
    }
    .scrollable-list {
        max-height: 200px; 
        overflow-y: auto;
    }
    .btn-icon {
        background: none;
        border: none;
        color: #dc3545;
        font-size: 1rem;
        cursor: pointer;
    }
    .btn-icon:hover {
        color: #c82333;
    }
</style>

<div class="page-content page-container" id="page-content">
    <div class="padding">
        <div class="row container d-flex justify-content-center">
            <div class="col-xl-10 col-md-12">
                <div class="card user-card-full">
                    <div class="col-half user-profile">
                        <div class="card-block text-center text-white">
                            <div>
                                <div class="m-b-25">
                                    <img src="https://img.icons8.com/bubbles/100/000000/user.png" class="img-radius" alt="User-Profile-Image">
                                </div>
                                <h4 class="f-w-600">{{ Auth::user()->name }}</h4>
                                <i class="mdi mdi-square-edit-outline feather icon-edit m-t-10 f-16"></i>
                            </div>
                            <div class="button-container">
                                <form action="{{ route('touristlogout') }}" method="POST">
                                    @csrf
                                    <button type="submit" class="button nav__button">Sign Out</button>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="col-half">
                        <div class="card-block">
                            <h4 class="m-b-20 p-b-5 b-b-default f-w-600">Information</h4>
                            <div class="row">
                                <div class="col-sm-6">
                                    <p class="m-b-10 f-w-600">Email</p>
                                    <h6 class="text-muted f-w-400">{{ Auth::user()->email }}</h6>
                                </div>
                                <div class="col-sm-6">
                                    <p class="m-b-10 f-w-600">Phone</p>
                                    <h6 class="text-muted f-w-400">{{ Auth::user()->phone }}</h6>
                                </div>
                            </div>
                            <h4 class="m-b-20 m-t-40 p-b-5 b-b-default f-w-600">Booking Packages</h4>
                            <div class="row">
                                <div class="col-12 scrollable-list">
                                    <ul class="list-group">
                                        @foreach($bookings as $booking)
                                        <li class="list-group-item d-flex justify-content-between align-items-center">
                                                <div>
                                                    <strong>Booking ID:</strong> {{ $booking->id }}<br>
                                                    <strong>Location:</strong> {{ $booking->location }}<br>
                                                    <strong>Date:</strong> {{ $booking->date }}
                                                </div>

                                                <form onclick="return confirm('Are you sure to delete your booking packages?');" class="d-inline-block" action="{{ route('booking.destroy', $booking->id) }}" method="post">
                                                @csrf 
                                                @method('delete')
                                                <button type="submit" class="btn-icon">
                                                    <i class="fas fa-trash-alt"></i>
                                                </button>
                                                </form>

                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection