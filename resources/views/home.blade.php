<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Materiais</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@200;600&display=swap" rel="stylesheet">

    <!-- Styles -->
    <style>
        html, body {
            background-color: #fff;
            color: #636b6f;
            font-family: 'Nunito', sans-serif;
            font-weight: 200;
            height: 100vh;
            margin: 0;
        }

        .content {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            text-align: center;
        }

        .title {
            font-size: 24px;
            margin-bottom: 20px;
        }

        .list {
            list-style-type: none;
            padding: 0;
        }

        .list-item {
            font-size: 18px;
            margin-bottom: 10px;
        }
    </style>
</head>
<body>
    <div class="content">
        <div>
            <div class="title">Materiais</div>
            <ul class="list">
                <table border="1" style="margin-top: 3200px">
                    @foreach ($materiais as $material)
                        <tr>
                            <td>
                                {{ $material->nome }}
                            </td>
                        </tr>
                        @if($material->acabamentos->count() >0)
                        <tr>
                            <td>
                                <table >
                                    <h3>Acabamento</h3>
                                    @foreach ($material->acabamentos as $acabamento)
                                    <tr>
                                        <td>
                                            {{ $acabamento->nome }};
                                        </td>
                                        
                                    </tr>
                                    
                                    @endforeach
                                </table>
                            </td>
                        </tr>
                        @endif
                        @if($material->medidas->count() >0)
                        <tr>
                            <td>
                                <table >
                                    <h3>Medida</h3>
                                    @foreach ($material->medidas as $medida)
                                    <tr>
                                        <td>
                                            {{ $medida->medida }};
                                        </td>
                                        
                                    </tr>
                                    
                                    @endforeach
                                </table>
                            </td>
                        </tr>
                        @endif
                        @if($material->quantidades->count() >0)
                            <tr>
                                <td>
                                    <table >
                                        <h3>Quantidade</h3>
                                        @foreach ($material->quantidades as $quantidade)
                                        <tr>
                                            <td>
                                                {{ $quantidade->quantidade }};
                                            </td>
                                            
                                        </tr>
                                        
                                        @endforeach
                                    </table>
                                </td>
                            </tr>
                        @endif

                        @if($material->precos->count() > 0)
                            <tr>
                                <td>
                                    <table >
                                        <h3>Precos</h3>
                                        @foreach ($material->precos as $preco)
                                        <tr>
                                            <td>
                                                {{ $preco->preco }};
                                            </td>
                                            
                                        </tr>
                                        
                                        @endforeach
                                    </table>
                                </td>
                            </tr>
                        @endif
                    @endforeach
                </table>
            </ul>
        </div>
    </div>
</body>
</html>
