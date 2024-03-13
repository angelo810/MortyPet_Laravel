@extends('layouts.app')

@section('title', __('Animal Welfare'))

@section('content')

<div class="container">
    <div class="row">
        <div class="col-12">
            <div class="card border-success mb-3">
                <div class="card-header bg-success text-white">
                    <h3 class="card-title">Petmatch</h3>
                </div>/
                <div class="card-body">
                    @guest
                    <h4>
                        {{ __('Bienvenido a') }} {{ config('app.name', 'Petmatch') }}!!!
                        <br>
                        Inicia Sesion para comenzar con esta experiencia !!
                    </h4>
                    @else
                    <h4>
                        ¡Hola {{ Auth::user()->name }}, Bienvenido a PetMatch!
                    </h4>
                    <div class="alert alert-success" role="alert">
                        Recuerda siempre brindar amor, atención y cuidado a tus mascotas. ¡Son parte de tu familia!
                    </div>
                    <div class="alert alert-info" role="alert">
                        No olvides alimentar a tus mascotas de manera adecuada y mantener su higiene en buen estado.
                    </div>
                    <div class="alert alert-warning" role="alert">
                        Es importante brindarle atención médica a tus mascotas y mantener al día sus vacunas.
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12 col-md-6">
            <div class="card border-primary">
                <div class="card-body">
                    <h4 class="card-title">Consejos de alimentación</h4>
                    <p>- Ajusta las porciones de alimento según la edad y tamaño de tu mascota para evitar la obesidad o desnutrición.<br>
                        - Suministra alimentos completos y balanceados de buena calidad para cubrir sus necesidades nutricionales.<br>
                        - Establece horarios fijos para las comidas evitando excesos.<br>
                        - Siempre ten a disposición agua limpia y fresca para tu mascota.
                    </p>
                </div>
            </div>
        </div>
        <div class="col-12 col-md-6">
            <div class="card border-danger">
                <div class="card-body">
                    <h4 class="card-title">Cuidados de salud</h4>
                    <p>- Lleva a tu mascota al veterinario anualmente para chequeos y vacunación.<br>
                        - Revisa periódicamente sus ojos, oídos, patas, piel para detectar anomalías.<br>
                        - Desparasita a tu mascota cada 6 meses internamente y externamente.<br>
                        - Cepilla el pelaje de tu mascota con regularidad para eliminar pelos sueltos. </p>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    .background-image {
        background-image: url('/public/mascotas.jpg'); /* Reemplaza '/ruta/a/la/imagen/mascotas.jpg' con la ruta real de tu imagen de fondo */
        background-size: cover;
        background-position: center;
        color: white;
        text-align: center;
        padding: 100px 0;
        margin-bottom: 0;
        position: relative;
    }

    .adopt-message {
        font-size: 36px;
        font-weight: bold;
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
    }
</style>

<div class="background-image">
    <p class="adopt-message">No compres, adopta</p>
</div>

@endsection
