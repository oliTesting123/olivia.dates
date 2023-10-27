<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="{{ asset('css/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="{{ asset('js/script.js') }}"></script>

</head>
<body>
    @include('header')
    <div class="first-found init">
        <div class="row mb-2 mt-0">
            <div class="col my-margin-card">
                <div class="card" style="border-radius: 0; border-top: none;">
                    <div class="card-title">
                        <div class="text-center" style="color: rgb(1, 93, 177);">
                            <h2 class="initial-title">Campañas activas de vacunación</h2>
                            <h2 class="initial-title">contra Covid-19 (ZMG)</h2>
                        </div>
                    </div>
                    <div class="card-body m-3">
                            <div id="cardCarousel" class="carousel slide"data-bs-ride="carousel" data-bs-touch="true">
                                <div class="carousel-inner">
                                    <div class="carousel-item active">
                                        <div class="row pb-4 pt-4">
                                            <div class="col-4" style="margin-left: 5rem">
                                                <div class="card custom-shadow border-0" style="width: 300px; height: 180px;">
                                                    <div class="card-body">
                                                        <div class="row">
                                                            <img class="groups" src="{{ asset('images/group-1.svg') }}" alt="">
                                                        </div>
                                                        <div class="row">
                                                            <p class="initial-color not-m">Personas de 18 y más</p>
                                                            <p class="p-second not-m"> Primera dosis</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-4" style="margin-left: 4rem">
                                                <div class="card custom-shadow border-0" style="width: 300px; height: 180px;">
                                                    <div class="card-body">
                                                        <div class="row">
                                                            <img class="groups"src="{{ asset('images/group-1.svg') }}" alt="">
                                                        </div>
                                                        <div class="row">
                                                            <p class="initial-color not-m">Personas de 18 y más</p>
                                                            <p class="p-second not-m"> Segunda dosis</p>
                                                            <p class="az not-m">AZTRA ZENECA</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="carousel-buttons-container">
                                    <button class="carousel-control-prev" type="button" data-bs-target="#cardCarousel" data-bs-slide="prev">
                                        <span class="carousel-control-prev-icon custom-carousel-control-prev" aria-hidden="true"></span>
                                        <span class="visually-hidden">Previous</span>
                                    </button>
                                    <button class="carousel-control-next custom-carousel-control-prev" type="button" data-bs-target="#cardCarousel" data-bs-slide="next">
                                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                        <span class="visually-hidden">Next</span>
                                    </button>
                                </div>
                            </div>
                            <div style="margin-left: 5rem; margin-right: 4rem;">
                                <hr>
                            </div>
                            <div style="margin-left: 6rem; margin-right: 6rem;">
                                <div class="row mb-2">
                                    <div class="col-5">
                                        <hp class="subtitle">Comenzar ahora</p>
                                    </div>
                                </div>
                                <div class="row mb-2">
                                    <div class="col-8">
                                        <p class="text-gray">Ingresa tu CURP para agendar una cita o para <a class="p-second">cancelar una cita</a> ya registrada.</p>
                                    </div>
                                </div>
                                
                                
                                <form methot="POST" action="{{ route('created')}}">
                                    <div class="row">
                                        <div class="col-8">
                                            @csrf
                                            <div class="input-group" style="height: 58px;">
                                                <span class="input-group-text" style="border-right: 0;">
                                                    <img src="{{ asset('images/person-1.svg') }}" alt="">
                                                </span>
                                                <input name="curp" id="curp" for="curp" type="text" class="form-control input-curp"placeholder="Introduce tu CURP">
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <button type="submit" class="btn btn-primary float-right b-btn">Continuar</button>
                                        </div>
                                    </div>
                                    <div>
                                        @error('curp')
                                            <p style="color: red">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </form>
                                
                            </div>
                    </div>

                </div>
            </div>
            
        </div>
        
    <!-- </div> -->
    </div>

    @include('footer')
</body>
</html>