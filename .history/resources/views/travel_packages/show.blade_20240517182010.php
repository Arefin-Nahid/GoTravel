@extends('layouts.frontend')

@section('content')
 <!--==================== HOME ====================-->
 <section>
        <div class="swiper-container gallery-top">
          <div class="swiper-wrapper">
          @foreach($travel_package->galleries as $gallery)
            <section class="islands swiper-slide">
              <img src="{{ Storage::url($gallery->images) }}" alt="" class="islands__bg" />

              <div class="islands__container container">
                <div class="islands__data">
                  <h2 class="islands__subtitle">Explore</h2>
                  <h1 class="islands__title">{{ $gallery->name }}</h1>
                </div>
              </div>
            </section>
          @endforeach
          </div>
        </div>

        <!--========== CONTROLS ==========-->
        <div class="controls gallery-thumbs">
          <div class="controls__container swiper-wrapper">
           @foreach($travel_package->galleries as $gallery)
            <img
              src="{{ Storage::url($gallery->images) }}"
              alt=""
              class="controls__img swiper-slide"
            />
           @endforeach
          </div>
        </div>
      </section>

      <section class="blog section" id="blog">
        <div class="blog__container container">
          <div class="content__container">
            <div class="blog__detail">
            {!! $travel_package->description !!}
            </div>
            <div class="package-travel">
              <h3>Booking Now</h3>
              <div class="card">
                <form action="{{ route('booking.store') }}" method="post">
                  @csrf 
                  <input type="hidden" name="travel_package_id" value="{{ $travel_package->id }}">
                  <input type="text" name="name" placeholder="Your Name" />
                  <input type="email" name="email" placeholder="Your Email" />
                  <input type="number" name="number_phone" placeholder="Your Number" />
                  <input
                    placeholder="Pick Your Date"
                    class="textbox-n"
                    type="text"
                    name="date"
                    onfocus="(this.type='date')"
                    id="date"
                  />

                  @if(Auth::guard('travel_user')->check())
                  <form action="{{ route('booking.store') }}" method="POST">
                      @csrf
                      <!-- Form fields here -->
                      <button type="submit" class="btn btn-primary">Send</button>
                  </form>
                  @else
                      <p>Please <a href="#" data-toggle="modal" data-target="#loginModal"> Login</a> first to add the package.</p>
                  @endif

                </form>
              </div>
            </div>
          </div>
        </div>
      </section>

      <section class="section" id="popular">
        <div class="container">
          <span class="section__subtitle" style="text-align: center"
            >Package Travel</span
          >
          <h2 class="section__title" style="text-align: center">
            The Best Tour For You
          </h2>

          <div class="popular__all">
            @foreach($travel_packages as $travel_package)
            <article class="popular__card">
              <a href="{{ route('travel_package.show', $travel_package->slug) }}">
                <img
                  src="{{ Storage::url($travel_package->galleries->first()->images) }}"
                  alt=""
                  class="popular__img"
                />
                <div class="popular__data">
                  <h2 class="popular__price"><span>$</span>{{ number_format($travel_package->price,2) }}</h2>
                  <h3 class="popular__title">{{ $travel_package->location }}</h3>
                  <p class="popular__description">{{ $travel_package->type }}</p>
                </div>
              </a>
            </article>
            @endforeach
          </div>
        </div>
      </section>

    @if(session()->has('message'))
      <div id="alert" class="alert">
        {{ session()->get('message') }}
        <i class='bx bx-x alert-close' id="close"></i>
      </div>
    @endif
@endsection

@push('style-alt')
<style>
  .alert {
    position:absolute;
    top: 120px;
    left:0;
    right:0;
    background-color: var(--second-color);
    color: white;
    padding: 1rem;
    width: 70%;
    z-index: 99;
    margin: auto;
    border-radius: .25rem;
    text-align: center;
  }

  .alert-close {
    font-size: 1.5rem;
    color: #090909;
    position: absolute;
    top: .25rem;
    right: .5rem;
    cursor: pointer;
  }

  .button-container {
    text-align: center;
  }

  blockquote {
    border-left: 8px solid #b4b4b4;
    padding-left: 1rem;
  }

  .blog__detail ul li {
    list-style: initial;
  }
  .btn {
    display: block;
    width: 100%;  /* Makes the button take the full width of its container */
    padding: 1rem;  /* Adds padding to the button */
    margin-top: 1rem;  /* Adds margin to the top of the button */
    text-align: center;
    background-color: var(--primary-color);  /* Example background color */
    color: white;  /* Text color */
    border: none;  /* Removes default border */
    border-radius: .25rem;  /* Adds border radius */
    font-size: 1rem;  /* Sets font size */
    cursor: pointer;  /* Adds pointer cursor on hover */
  }

  .btn:hover {
    background-color: var(--primary-dark-color);  /* Example background color on hover */
  }
</style>
@endpush

@push('script-alt')
<script>
      let galleryThumbs = new Swiper('.gallery-thumbs', {
        spaceBetween: 0,
        slidesPerView: 0,
      });

      let galleryTop = new Swiper('.gallery-top', {
        effect: 'fade',
        loop: true,

        thumbs: {
          swiper: galleryThumbs,
        },
      });

      const close = document.getElementById('close');
      const alert = document.getElementById('alert');
      if(close) {
        close.addEventListener('click', function() {
          alert.style.display = 'none';
        })
      }
    </script>
@endpush