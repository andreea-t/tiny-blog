<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Tiny Blog</title>

        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <script src="{{ asset('js/app.js') }}" defer></script>

        <style>
            header{
                width: 100%;
                height: 56.24vw;
            }
            header>img{
                width: 100%;
                height: 56.24vw;
                /* object-fit: cover; */
            }
            body{
                background: linear-gradient(to left, #f2f2f2, #ececec);
            }
            .overlay{
                width: 100%;
                height: 100%;
                position: relative;
                padding: 0 20% 0 20%;
                top: -100%;
                display: flex;
                justify-content: flex-end;
                align-items: center;
            }
            .effect-container{
                background: #111;
                width: 320px;
                height: 120px;
                color: #eee;
                display: flex;
                align-items: center;
                padding-left: 30px;
                font-size: 3rem;
            }
            .effect-container>p{
                margin: 0;
                padding-right: 25px;
                animation-name: text-bar;
                animation-duration: 1.2s;
                animation-iteration-count: infinite;
                border-right: none;
            }

            .cards-container{
                max-width: 1200px;
                margin: auto;
            }

            @keyframes text-bar{
                100%{
                    border-right: 3px solid #fff;
                }
            }
            .subtitle{
                font-size: 1.5rem;
                margin-top: 30px;
            }
            footer{
                height: 50px;
                width: 100%;
                background: #111;
                color: #eee;
                display: flex;
                justify-content: center;
                align-items: center;
            }
            @media screen and (max-width: 1024px){
                .overlay{
                    padding: 0 5% 0 5%;
                }
            }
            @media screen and (max-width: 768px){
                header{
                    width: 100%;
                    height: 100vh;
                }
                header>img{
                    width: 100%;
                    height: 100vh;
                    object-fit: cover;
                }
                .overlay,
                .overlay>div,
                .effect-container{
                    padding: 0;
                    margin: 0;
                    justify-content: center;
                    align-items: center;
                    text-align: center;
                }
                .effect-container{
                    font-size: 2rem;
                    width: 100%;
                }
                .effect-container>p{
                    animation: none;
                }
                footer{
                    font-size: .75rem;
                }
                .subtitle{
                    margin-top: 150px;
                }
            }
        </style>

    </head>
    <body>
        <header>
            <img src="{{ asset('/images/tiny-blog.jpg') }}" alt="Tinyblog cover photo" />
            <div class="overlay">
                <div>
                    <div class="effect-container">
                        <p>A tiny blog</p>
                    </div>
                    <p class="subtitle">Simplicity is the ultimate sophistication.</p>
                </div>
            </div>
        </header>
        <section name="aboutme">
            
        </section>
        <main class='cards-container'>
            @yield('content')
        </main>
        <footer>
            <span>Designed and implemented by <a href="http://trufan.ro/">trufan.ro</a> | Trufan Andreea.</span>
        </footer>
    </body>
</html>
