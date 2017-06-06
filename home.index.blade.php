
@section('contenedor')
<div class="home">
    <div class="articulos">
        @foreach ($articulos as $articulo)
            <div class="articulo">
                {{-- <h3>{{ $articulo->articulo->padre_titulo }}</h3> --}}
                    <a href="{{ $articulo->articulo->link() }}"><img src="{{ asset('uploads/image/'.$articulo->articulo->imagen_principal('thumb_normal')) }}" /></a>
                <h4>{{ $articulo->articulo->titulo }}</h4>
            </div>
        @endforeach
    </div>
    <div class="eventos_videos">
        @if ($idioma)
            <div class="eventos">
                <h3>{{ trans('sitio.eventos') }}</h3>
                <span><a href="{{ route(trans('ruta.idioma').'eventos') }}">{{ trans('sitio.mas_eventos') }}</a></span>
                <ul>
                    @foreach ($eventos as $evento)
                    <li>
                        <div class="fecha tipo{{ $evento->tipo_id }}">
                            <div class="dia">
                                {{ $evento->dia }}
                            </div>
                            <div class="mes">
                                {{ $evento->mes }}
                            </div>
                        </div>
                        <div class="info">
                            <h4><a href="{{ route(trans('ruta.idioma').'evento', [$evento->id, $evento->slug]) }}">{{ $evento->titulo }}</a></h4>
                            <div class="fecha">
                                @if ($evento->fecha_inicio == $evento->fecha_fin)
                                    <p>{{ trans('sitio.fecha') }}: {{ $evento->fecha_inicio }}</p>
                                @else
                                    <p>{{ trans('sitio.desde') }}: {{ $evento->fecha_inicio }}<br />{{ trans('sitio.hasta') }}: {{ $evento->fecha_fin }}</p>
                                @endif
                            </div>
                            <p>{{ $evento->subtipo }}</p>
                        </div>
                    </li>
                    @endforeach
                </ul>
            </div>
        @endif
        {{-- <ul class="videos">
            <h3>{{ trans('sitio.videos') }}</h3>
            @foreach ($videos as $video)
                <li>
                    <a href="{{ $video->video->link }}" class="zoombox"><img src="{{ $video->video->imagen }}" /></a>
                    <h4>{{ $video->video->nombre }}</h4>
                </li>
            @endforeach
        </ul>--}}
        @include('sitio._partials.graficos')
    </div>
    <div class="redes_sociales">
  //      @include('sitio._partials.redes')
    </div>
    <div class="clear"></div>
</div>
@stop



@section('header')
    @include('sitio._partials.cabecera_home')
@stop

@section('scripts')
    @parent
    <script type="text/javascript" src="{{ asset('assets/zoombox/zoombox.js') }}"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('a.zoombox').zoombox();
        });
    </script>
@stop




@section('styles')
    <link href="{{ asset('assets/zoombox/zoombox.css') }}" rel="stylesheet">
    @parent
@stop