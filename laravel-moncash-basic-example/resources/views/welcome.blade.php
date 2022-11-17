<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="h-100">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ config('app.name', 'MonCash-Laravel Basic') }}</title>


    <link rel="shortcut icon" href="{{asset('favicon.ico')}}" type="image/x-icon">
    <link rel="icon" href="{{asset('favicon.ico')}}" type="image/x-icon">


    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    @vite(['resources/sass/app.scss','resources/js/app.js'])

</head>

<body class="d-flex h-100 text-dark bg-light">

<div class="container d-flex w-100 h-100 p-3 mx-auto flex-column">
    <header class="mb-2">
        <div>
            <h3 class="float-md-start mb-0">🍋 <kbd>>_SSH</kbd></h3>
            <nav class="nav nav-masthead justify-content-center float-md-end">
                <a class="nav-link" href="#akèy">Akèy</a>
                <a class="nav-link" href="#ede-nou">Ede Nou</a>
                <a class="nav-link" href="#kiyès-nou-ye">Kiyès nou ye</a>
            </nav>
        </div>
    </header>

    @if( session()->has('monCash.error'))
        <div class="alert alert-danger d-flex align-items-center shadow" role="alert">
            <svg width="24" height="24" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                 xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                      d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"></path>
            </svg>
            <div style="margin-left: 12px; text-align: left; flex-grow: 1">
                <strong>Error</strong>
                <span style="margin-left: 12px">{{{ session('monCash.error') }}}</span>
            </div>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    @if( session()->has('monCash.success'))
        <div class="alert alert-success d-flex align-items-center shadow" role="alert">
            <svg width="24" height="24" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                 xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
            </svg>
            <div style="margin-left: 12px; text-align: left; flex-grow: 1">
                <strong>Siksè</strong>
                <span style="margin-left: 12px">{{{ session('monCash.success') }}}</span>
            </div>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    <main class="mt-2">

        <section id="akèy" class="row p-4 pb-0 pe-lg-0 pt-lg-5 align-items-center rounded-3 border shadow-lg">
            <div class="col-lg-7 p-3 p-lg-5 pt-lg-3">
                <h1 class="display-4 fw-bold lh-1 d-flex" style="align-items: center">
                    <img style="height: 60px" class="d-block me-2" src="{{asset('img/sitwon.png')}}" alt="">
                    Sove Sitwon Haïti
                </h1>

                <div>
                    <span class="badge bg-success mr-1">Sandbox</span>
                    <span class="badge bg-success mr-1">MonCash</span>
                    <span class="badge bg-success mr-1">Test</span>
                    <span class="badge bg-success">Basic</span>
                </div>

                <p class="lead">
                    In porttitor dignissim nisl eu placerat. Etiam lacinia non ligula at dapibus. Ut eget tempor neque.
                    Nulla hendrerit diam at dui rutrum, sed porttitor mauris pellentesque. Ut bibendum massa vitae lorem
                    placerat interdum.
                </p>
                <div class="d-grid gap-2 d-md-flex justify-content-md-start mb-4 mb-lg-3">
                    <a href="#ede-nou" class="btn btn-primary btn-lg px-4 me-md-2 fw-bold">Bay sa ou kapab</a>
                    <a href="#kiyès-nou-ye" type="button" class="btn btn-outline-secondary btn-lg px-4">Kiyès nou ye</a>
                </div>
            </div>
            <div class="col-lg-4 offset-lg-1 p-0">
                <div class="overflow-hidden shadow-lg me-4 rounded-3">
                    <img class="rounded-lg-3 block" style="width: 100%"
                         src="{{ asset('img/sitwon-made-in-haiti.jpg') }}" alt="" width="720">
                </div>

            </div>
            <p class="text-end mt-2 pe-4">
                <small>Photo by <a href="https://www.pexels.com/photo/woman-holding-lemons-4495732/" target="_blank">Alina
                        Schelkanova</a></small>
            </p>
        </section>

        <section style="margin-top: 48px" id="kiyès-nou-ye">
            <h2>Kiyès nou ye?</h2>

            <div class="row">
                <div class="col">
                    <p>
                        Inisyativ <b>Sove Sitwon Haïti (SSH)</b>, se yon projè kila pou remanbre kilti sitwon nan peyi
                        a.Nullam
                        elementum eget diam in sollicitudin. Phasellus quis suscipit arcu, et finibus lacus. Sed luctus
                        nunc
                        efficitur fermentum tincidunt. Nulla rutrum augue at mauris varius hendrerit id ut dui. Duis et
                        mattis
                        neque. Quisque at faucibus nisl. PVivamus quis blandit leo, sit amet laoreet diam. Duis mollis
                        aliquam
                        lacinia. Cras
                        tincidunt sollicitudin erat eu ornare.
                    </p>
                </div>
                <div class="col">
                    <img style="margin:auto" class="d-block mt-4 mb-4" src="{{ asset('img/lime.jpg') }}" alt="">
                    <p>
                        Photo by <a
                            href="https://unsplash.com/es/@sepoys?utm_source=unsplash&utm_medium=referral&utm_content=creditCopyText">Rohit
                            Tandon</a> on <a
                            href="https://unsplash.com/s/photos/lime-trees?utm_source=unsplash&utm_medium=referral&utm_content=creditCopyText">Unsplash</a>
                    </p>

                </div>
            </div>

            <div class="row">
                <div class="col">
                    <img style="margin:auto" class="d-block mt-4 mb-4" src="{{ asset('img/citrons.jpg' )}}" alt="">
                </div>
                <div class="col">
                    <p>
                        Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas.
                        Nullam sit
                        amet nisl ex. Morbi eleifend mattis velit in scelerisque. Duis lobortis, justo id tincidunt
                        posuere,
                        velit felis finibus magna, nec viverra sem elit non tortor. Integer tincidunt sapien ex, quis
                        pulvinar
                        dui mattis et. Vestibulum luctus augue neque, sit amet venenatis ipsum
                        pellentesque nec. Cras pharetra enim vel odio gravida, ut pharetra nibh luctus. Vivamus sit amet
                        nunc at
                        lacus euismod vehicula. Sed eu lacinia orci. Nullam ac laoreet purus, vitae vestibulum massa.
                    </p>
                </div>
            </div>
        </section>

        <section id="ede-nou" class="mb-3 text-center" style="margin-top: 48px">
            <div class="row row-cols-1 row-cols-md-3 m-auto" style="max-width: 1000px" id="#ede">
                <div class="col">
                    <div class="card mb-4 rounded-3 shadow-sm border-primary">
                        <div class="card-header py-3 text-white bg-primary border-primary">
                            <h4 class="my-0 fw-normal">Pouse</h4>
                        </div>
                        <div class="card-body">
                            <h1 class="card-title pricing-card-title">HTG 100<sup class="text-muted fw-light">/mwa</sup>
                            </h1>
                            <p style="height: 100px">Kòb sa a pral ede jwenn plantil ak kreye nouvo varyete sitwon.</p>
                            <x-payment.button amount="100"/>

                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card mb-4 rounded-3 shadow-sm border-primary">
                        <div class="card-header py-3 text-white bg-primary border-primary">
                            <h4 class="my-0 fw-normal">Plante</h4>
                        </div>
                        <div class="card-body">
                            <h1 class="card-title pricing-card-title">HTG 500<sup class="text-muted fw-light">/mwa</sup>
                            </h1>
                            <p style="height: 100px">Kòb sa a pral ede jwenn kote pou plante pye yo epi fouye twou pou
                                mete
                                yo.</p>
                            <x-payment.button amount="500"/>

                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card mb-4 rounded-3 shadow-sm border-primary">
                        <div class="card-header py-3 text-white bg-primary border-primary">
                            <h4 class="my-0 fw-normal">Donnen</h4>
                        </div>
                        <div class="card-body">
                            <h1 class="card-title pricing-card-title">HTG 1.000<sup
                                    class="text-muted fw-light">/mwa</sup>
                            </h1>
                            <p style="height: 100px">Kòb sa a pral ede pran swen pye yo pandan yon lane.</p>
                            <x-payment.button amount="1000"/>

                        </div>
                    </div>
                </div>
            </div>

            @if(session()->has('monCash.error'))
                <div class="alert alert-danger d-flex align-items-center shadow" role="alert" id="error"
                     style="max-width: 800px; margin: 0px auto 48px">
                    <svg width="24" height="24" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                         xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"></path>
                    </svg>
                    <div style="margin-left: 12px; text-align: left; flex-grow: 1">
                        <strong>Error</strong>
                        <span style="margin-left: 12px">{{{ session('monCash.error') }}}</span>
                    </div>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            @if(session()->has('monCash.success'))
                <div class="alert alert-success d-flex align-items-center shadow" role="alert" id="success"
                     style="max-width: 800px; margin: 0px auto 48px">
                    <svg width="24" height="24" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                         xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                    </svg>
                    <div style="margin-left: 12px; text-align: left; flex-grow: 1">
                        <strong>Siksè</strong>
                        <span style="margin-left: 12px">{{{ session('monCash.success') }}}</span>
                    </div>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
        </section>

    </main>

    <div class="buffer mt-6 mb-4 d-flex align-items-center justify-content-start rounded-3 shadow-lg"
         style="background-image: url('{{asset('img/jus.jpg')}}')">
        <div class="d-flex align-items-center ps-4 display-3" style=" height: 300px; color: #21bb00">
            Byen fre!
        </div>
    </div>

    <footer class="mt-auto text-dark-50">
        <p>Sitwon , by <a href="fruitsbytes.com" class="text-dark">@fruitsbytes</a>.</p>
    </footer>
</div>


</body>
</html>
