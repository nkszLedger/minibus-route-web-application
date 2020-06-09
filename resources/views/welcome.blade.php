<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <!-- Styles -->
        <style>
            html, body {
                background-image: linear-gradient(to right top, #050e5e, #321783, #5d1da7, #8a1dca, #bc12eb);
                color: #ffffff;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .bottomleft {
                position: absolute;
                bottom: 8px;
                left: 16px;
                font-size: 18px;
            }

            .bottomright {
                position: absolute;
                bottom: 8px;
                right: 16px;
                font-size: 18px;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #ffffff;
                padding: 0 25px;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <form action="{{ route('logout') }}" method="post">
                            @csrf
                            <a href="{{ url('/home') }}">Home</a>
                            <input type="submit" value="Logout"/>
                        </form>
                    @else
                        <a href="{{ route('login') }}">Login</a>

                        {{-- @if (Route::has('register'))
                            <a href="{{ route('register') }}">Register</a>
                        @endif --}}
                    @endauth
                </div>
            @endif

            <div class="content">
                 
                <div class="logo">
                    <img src="/minibus/images/emblem.png" alt="minibus"  width="250" height="200">
                </div>

                <div class="title m-b-md">
                    Minibus Taxi Registration
                </div>

                <div class="links">
                    <a href="https://www.dot.gov.za">Gauteng Department of Roads and Transport</a>
                </div>

                <div class="footer">
                    <div class="bottomleft">
                        <img src="/minibus/images/minibus.png" alt="minibus"  width="275" height="200">
                    </div>
                    <div class="bottomright">
                        <img src="/minibus/images/roadmap.png" alt="minibus"  width="250" height="200">
                    </div>
                </div>

            </div>
            
        </div>

        <!-- jQuery 3 -->
        <script src="/minibus/assets/vendor_components/jquery-3.3.1/jquery-3.3.1.js"></script>

        <!-- Bootstrap 4.0-->
        <script src="/minibus/assets/vendor_components/bootstrap/dist/js/bootstrap.min.js"></script>

    </body>
</html>


