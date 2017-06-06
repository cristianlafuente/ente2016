@extends('sitio.templates.interno')

<?php $titulo_pagina = $articulo->titulo;?>


@section('content')
   
    <div class="cabecera-interior"> 

        <div class="breadcrumbs">
            <span><a href="{{ route('home') }}">{{ trans('sitio.home') }}</a></span>
            <span>|</span>
            @foreach ($articulo->superiores() as $padre)
                @if ($padre->padre_id)
                    <span><a href="{{ $padre->link() }}">{{ $padre->titulo_model }}</a></span>
                @else
                    <span>{{ $padre->titulo_model }}</span>                    
                @endif
                <span>|</span>
            @endforeach
            <span class="label">{{ $articulo->titulo }}</span>
        </div>



        
<div class="titulos">

           <div class="titulo"><p class="texto_franja_verde">{{ $articulo->titulo }}</p></div>
            @if ($articulo->padre)
                <div class="clear"></div>
                <!--<div class="subtitulo">{{ $articulo->padre }}</div>-->

            @endif

        </div>
    </div>
    <div class="info">

        {{-- @if ($articulo->imagen_principal)
            <div class="logo">
                <img src="{{ asset('uploads/image/'.$articulo->imagen_principal) }}" />
            </div>
        @endif
 
       
            <div class="fecha">
                {{ $articulo->fecha_hora_publicacion }}
            </div> --}}

        @if ($articulo->copete)
            <div class="copete">
                {{ $articulo->copete }}
            </div>
        @endif


        @if (($gal = $articulo->galeria_model) && $articulo->tipo->id == 5)
            <div class="galleria">
                @foreach ($gal->imagenes as $imagen)
                    <img src="{{ asset('/uploads/image/'.$imagen->archivo) }}">
                @endforeach
            </div>
        @endif
        
        
        @if ($articulo->contenido)
            <div class="contenido">
                {{ $articulo->contenido }}
            </div>
        @endif
        <div class="extra">
            @if ($articulo->latlong)
            <h4>{{ trans('sitio.ubicacion') }}</h4>
            <div id="map" class="map">
            </div>
            @endif
        </div>
    </div>
    @if ($articulo->prestadores->count() > 0 && $articulo->tipo->id == 5)
        <?php $prestadores = $articulo->prestadores->all(); shuffle($prestadores); ?>
        <ul class="prestadores">
            <h3>{{ trans('sitio.prestadores') }}</h3>
            @foreach ($prestadores as $prestador)
                <li>
                    <h4>{{ $prestador->nombre }}</h4>
                    @if ($prestador->telefono)
                        <p>{{ trans('sitio.telefono') }}: {{ $prestador->telefono }}</p>
                    @endif
                    @if ($prestador->mail)
                        <p>{{ trans('sitio.email') }}: <a href="mailto:{{ $prestador->mail }}">{{ $prestador->mail }}</a></p>
                    @endif
                    @if ($prestador->direccion)
                        <p>{{ $prestador->direccion }}</p>
                    @endif
                    @if ($prestador->localidad_nombre)
                        <p>{{ $prestador->localidad_nombre }}</p>
                    @endif
                    @if ($prestador->web)
                        <p><a href="{{ $prestador->web }}" target="_blank">{{ trans('sitio.web') }}</a></p>
                    @endif
                </li>
            @endforeach
        </ul>
    @endif
    <div class="clear"></div>
    @if ($articulo->hijos->count() > 0)
        <ul class="articulos">
            @if ($articulo->con_imagenes == 1)
                @foreach ($articulo->hijos as $hijo)
                    <li>
                        <a href="{{ $hijo->link($articulo->slug) }}"><img src="{{ asset('uploads/image/'.$hijo->imagen_principal('thumb_normal')) }}" border="0" class="img_cuadros_tuc_act" /></a>
                        <!--<span class="fecha">{{ $hijo->fecha_publicacion }}</span>-->
                        <a href="{{ $hijo->link($articulo->slug) }}"><h4>{{ $hijo->titulo }}</h4></a>
                        {{-- $hijo->copete --}}
                    </li>
                @endforeach
            @else
                @foreach ($articulo->hijos as $hijo)
                <li>
                    <a href="{{ $hijo->link($articulo->slug) }}"><h4>{{ $hijo->titulo }}</h4></a>
                    {{-- $hijo->copete --}}
                </li>
                @endforeach
            @endif
        </ul>
        <div class="paginacion">
            <?php echo $articulo->getShowHijosPaginator()->links(); ?>
        </div>
    @endif
    @if (($articulo->video || $articulo->galeria || $articulo->folleto) && $articulo->tipo->id != 5)
    <?php $no_cuadros = true; ?>
    




<div class="graficos">
        @if ($articulo->video)
        <div>
            <h4>{{ trans('sitio.videos') }}</h4>
            <a href="{{ $articulo->video_url }}" class="zoombox"><img src="{{ $articulo->video_imagen }}" /></a>
            <h5>{{ $articulo->video_nombre }}</h5>
        </div>
        @endif
        @if ($articulo->galeria)
        <div>
            <h4>{{ trans('sitio.imagenes') }}</h4>
            <a href="{{ route(trans('ruta.idioma').'galeria', [$articulo->galeria, $articulo->galeria_slug]) }}"><img src="{{ asset('uploads/image/'.$articulo->galeria_imagen) }}" /></a>
            <h5>{{ $articulo->galeria_nombre }}</h5>
        </div>
        @endif
        @if ($articulo->folleto)
        <div>
            <h4>{{ trans('sitio.folletos') }}</h4>
            <a href="{{ $articulo->folleto_url }}" class="zoombox w800 h600"><img src="{{ asset('uploads/image/'.$articulo->folleto_imagen) }}" /></a>
            <h5>{{ $articulo->folleto_nombre }}</h5>
        </div>
        @endif
    </div>


    @endif
@stop

<?php $portada = $articulo->imagen_portada; ?>



<?php
    $links_idiomas = $articulo->links_idiomas($idiomas);
?>

@if ($articulo->latlong)
    <?php
        $latlong = $articulo->latlong;
        $marker_title = $articulo->titulo;
    ?>
    @include('sitio._partials.map')
@endif

@if ($articulo->localidad)
    <?php $localidad_id = $articulo->localidad; ?>
    <?php $localidad_nombre = $articulo->localidad_nombre; ?>
    @if ($articulo->tipo_id == Config::get('sitio.lugar_id'))
        <?php $articulo_id = $articulo->id; ?>
    @endif
    @include('sitio._partials.lugares_cercanos')
@endif






@section('scripts')
    @parent
    <script type="text/javascript" src="{{ asset('assets/zoombox/zoombox.js') }}"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('a.zoombox').zoombox();
        });
    </script>
    <script type="text/javascript" src="//e.issuu.com/embed.js" async="true"></script>

    @if ($articulo->tipo->id == 5)
        <script type="text/javascript" src="{{ asset('/assets/jquery-galleria/src/galleria.js') }}"></script>
        <script type="text/javascript">
            Galleria.loadTheme('/css/galleria-theme/galleria.classic.js');
            Galleria.run('.galleria');
        </script>
    @endif
@stop

@section('styles')
    <link href="{{ asset('assets/zoombox/zoombox.css') }}" rel="stylesheet">

    @if ($articulo->tipo->id == 5)
        <link href="{{ asset('/css/galleria-theme/galleria.classic.css') }}" rel="stylesheet">
    @endif

    @parent
@stop

