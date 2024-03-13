@extends('layouts.app')

@section('content')
    <style>
        .custom-card {
            background-color: #322b52;
            /* Rojizo */
            color: #fff;
            /* Texto blanco */
        }

        .custom-card-title {
            color: #fff;
            /* Texto blanco */
        }

        .custom-card-text {
            color: #fff;
            /* Texto blanco */
        }

        .pet-image {
            height: 250px;
            /* Establecer altura fija para todas las imágenes */
            width: 100%;
            /* Asegurar que la imagen ocupe todo el ancho del contenedor */
            object-fit: cover;
            /* Ajustar la imagen para cubrir el contenedor */
        }
        .negrita{
            font-weight: 800;
            font-size: 30px;
        }
        .custom-letra{
            font-weight: 600;
            font-size: 15px;
        }
    </style>

<div class="container">
    <div class="row">
        @foreach($pets as $pet)
        <div class="col-md-4 mb-4">
            <div class="card h-100 custom-card">
                <img src="{{ asset('storage/' . $pet->image_url) }}" class="card-img-top img-fluid pet-image custom-letra" alt="Pet Image">
                <div class="card-body custom-card-body">
                    <h5 class="card-title text-center custom-card-title negrita ">{{ $pet->name }}</h5>
                    <p class="card-text custom-card-text custom-letra card-title">ID: {{ $pet->id }}</p>
                    <p class="card-text custom-card-text custom-letra card-title">Edad: {{ $pet->age }}</p>
                    <p class="card-text custom-card-text custom-letra card-title">Descripción: {{ $pet->description }}</p>
                    <p class="card-text custom-card-text custom-letra card-title">Raza: {{ $pet->breed->name }}</p>
                    <p class="card-text custom-card-text custom-letra card-title">Disponibilidad: <span class="{{ $pet->available ? 'text-success' : 'text-danger' }}">{{ $pet->available ? 'Disponible' : 'No Disponible' }}</span></p>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection
