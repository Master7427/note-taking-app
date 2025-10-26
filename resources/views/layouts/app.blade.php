@php $locale = session()->get('locale'); @endphp
<!doctype html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
  

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <!-- JQuery -->
    {{-- <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script> --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script> 

    <style>
        .footer {
            position: fixed;
            left: 0;
            bottom: 0;
            width: 100%;
            background-color: #2769b0;
            color: rgb(255, 255, 255);
            text-align: center;
        }

        body {
            background-color: hsl(0, 0%, 96%)
        }

    </style>
</head>
<body>

    <div id="app">
    
            <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm"> 
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name') }}
                </a>
                {{-- Barre de recherche autocomplétion --}}
                <div class="car-body">
                    <form>
                        @csrf
                        <div class="form-group">
                            <input type="text" class="typeahead form-control"  id = "article_search" placeholder = "Rechercher..." > 
                        </div>
                    </form>
                    <script type="text/javascript">
                      var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
                      $(document ).ready(function(){
                        $('#article_search').autocomplete({  
                          source:function( request, response ) {
                            $.ajax({
                            url:"{{route('autocomplete')}}",
                            type: 'POST',
                            dataType: "json",
                             data: {
                                _token: CSRF_TOKEN,
                                 search: request.term
                              },
                              success: function( data ) {
                                    response( data );
                              }    
                             }); 
                            },
                            select: function (event, ui) {
                            $('#article_search').val(ui.item.label);
                        
                        return false;
                         }
                        });
                         });
                    </script>
                </div>
                {{-- fin du bloc autocomplétion --}}
                 {{-- Bloc multilingue --}}
                <ul class="navbar-nav ms-auto">
                @php $locale = session()->get('applocale'); @endphp
                        <li class="nav-item dropdown">
                             {{--  <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                             @switch($locale) 
                             @case('en')  
                             <img src="{{asset('/images/en.png')}}" width="30px" height="20px">English
                              @break  
                             @case('fr')  
                             <img src="{{asset('/images/fr.png')}}" width="30px" height="20px">Francais
                             @break   
                             @default     
                             <img src="{{asset('/images/fr.png')}}" width="30px" height="20px">Francais
                             @endswitch
                             <span class="caret"></span>
                            </a>  --}}   
                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                               <li> <a class="dropdown-item" href="lang/en"><img src="{{asset('/images/en.png')}}" width="30px" height="20px">    English</a>   </li>
                                <li>  <a class="dropdown-item" href="lang/fr"><img src="{{asset('/images/fr.png')}}" width="30px" height="20px">    Francais</a>   </li> 
                            </div>
                        </li>
                         {{-- fin du bloc multilingue--}}

                <a class= "navbar-brand" href="{{url('/apropos')}}" >@lang("A propos")</a>
            </div>
        </nav>
    </ul>
        <main class="py-4">
            @yield('content')
        </main>
    </div>
    {{-- <script src="{{ asset('vendor/jquery-ui/jquery-ui.js') }}"></script> --}}


    <div class="text-center footer">
        <h7>Note Taking App</h7>
        <h7>Cours: Applications Web transactionnelles</h7>
        <h7>Crée par: Huriel Georges Pierre</h7>
    </div>

</body>
</html>

