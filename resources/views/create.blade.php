<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create</title>
    <link rel="stylesheet" href="{{ asset('css/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
</head>
<body>
    @include('header')
    <div class="init">
        <div class="row mb-2 mt-1">
            <div class="col my-margin-card">
                <div class="row mt-2 mb-2 pb-2 pt-2">
                    <div class="col-6" style="display: flex;">
                            <img src="{{ asset('images/ico_check.svg') }}" alt="" class="img-check">
                            <p class="initial-color" style="margin: 10px 5px; font-size: 22px">Regsitro concluido</p>
                    </div>
                    <div class="col-6 cont-rigth">
                        <button class="btn btn-danger icon-button"  style="margin: 10px 0px;">
                            <i><img src="{{ asset('images/ico_cancel.svg') }}"></i> Quiero cancelar mi cita
                        </button>
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="card custom-shadow border-0">
                        <div class="row">
                            <div class="col-6" style="display: flex;">
                                <div class="center-left">
                                    <p> CURP: {{ $userData['curp'] }}</p>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="card border-0">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-3">
                                                <img class="groups"src="{{ asset('images/group-1.svg') }}" alt="">
                                            </div>
                                            <div class="col-8">
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
                </div>

                <div class="row mt-3">
                    <div class="card custom-shadow border-0">
                        <div class="row mt-5">
                            <div class="col-4">
                                <p class="p-gray" style="font-size: 18px">Módulo</p>
                                <p class="p-description">{{ $dateData['module'] }}</p>
                            </div>
                            <div class="col-4">
                                <p class="p-gray">Dirección</p>
                                <p class="p-description">{{ $dateData['address'] }}</p>
                            </div>
                            <div class="col-4">
                                <p class="p-gray">Fecha y hora</p>
                                <div style="border-radius: 5px; background-color: #37AEFC" style="display: flex; text-align: center;">
                                    <p class="p-date">{{ date('l, j F Y h:i A', strtotime($dateData['date_at'])) }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row mt-3" style="display: flex;">
                    <div>
                        <p class="p-recomendations not-m">Ya tienes asegurado el lugar y hora para tu vacunación, ahora para asegurar tu dosis es muy importante
                            que también te registres en la plataforma federel. Ingresa a <a href="">https://mivacuna.salud.gob.mx/</a> para 
                            ontener tu expediente de vacunacón.        
                        </p>
                        <p class="p-recomendations not-m">Recomendaciones para el día de tu vacunación:</p>
                    </div>
                   
                </div>
            </div>
        </div>
    </div>

    @include('footer')

</body>
</html>