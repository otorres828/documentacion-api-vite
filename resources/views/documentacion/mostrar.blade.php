@extends('layouts.base')
@section('title', 'Documentacion')
@section('main')
    <div class="bg-white font-sans leading-normal">
        {{-- CUERPO --}}
        <div class=" text-gray-700 py-10">
            <div class="grid md:grid-flow-col  px-7 sm:px-16 md:px-10 lg:px-28 ">
                <div class=" md:w-1/4  ">
                    <div class="max-w-md md:float-left md:text-left leading-loose tracking-tight md:sticky md:top-0 ">
                        <p class="py-3  font-bold break-normal text-2xl md:text-4xl">Documentacion</p>
                        <ul class="flex flex-wrap justify-between flex-col ">
                            @foreach ($categorias as $documento)
                                <a href="{{ route('documentacion_show', $documento->slug) }}">
                                    <li class="hover:bg-cyan-500 hover:text-white rounded-lg ease-out duration-100">
                                        {{ $documento->name }}
                                    </li>
                                </a>
                            @endforeach
                        </ul>
                    </div>
                </div>
                <div class="md:ml-6 w-full md:w-3/4 ">
                    <blockquote>
                        <div
                            class=" bg-white mb-10 max-w-2xl mx-auto px-4 py-8 shadow-lg dark:bg-dark-600 lg:flex lg:items-center">
                            <div class="w-20 h-20 mb-6 flex items-center justify-center shrink-0 bg-orange-600 lg:mb-0">
                                <img src="https://laravel.com/img/callouts/exclamation.min.svg" alt="Icon"
                                    class="opacity-75">
                            </div>

                            <p class="mb-0 lg:ml-4">
                                <strong>Advertencia</strong> Estás navegando por la documentación de la Api del panel de
                                Recursos Humanos, te aconsejamos leer detalladamente para hacer un buen uso de la misma.
                            </p>
                        </div>
                    </blockquote>
                    <div class="prose">
                        Use <span class="font-bold">API_URL</span> en sus archivo <span class="font-bold">.env</span> y agreguele el link de conexion a la api <br>
                        <pre><code class="language-javascript">API_URL='http://localhost:8080/api/'&nbsp;</code></pre>

                    </div>
                    <div class=" leading-loose tracking-tight">
                        @foreach ($documentos as $documento)
                            <h1 class="py-3 font-bold break-normal text-3xl md:text-5xl text-orange-600">
                                {{ $documento->name }}</h1>
                            <div class="prose md:prose-lg lg:prose-xl text-justify">
                                {!! $documento->body !!}
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
<link rel="stylesheet" href="{{ asset('vendor/ckeditor/plugins/codesnippet/lib/highlight/styles/arta.css') }}">
<script src="{{ asset('vendor/ckeditor/plugins/codesnippet/lib/highlight/highlight.pack.js') }}"></script>

@endsection