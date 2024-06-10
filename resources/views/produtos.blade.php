<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

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

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }

            .table-produtos{
                margin: 0 auto;
                width: 80%;
            }
        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        <a href="{{ route('login') }}">Login</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}">Register</a>
                        @endif
                    @endauth
                </div>
            @endif

            <div class="content">
                <div class="title m-b-md">
                    {{ $nome }}
                </div>

                <h1>Lista de Produtos</h1>
                <label for="produto">Escolha um produto:</label>
                <select id="produto">
                    @php
                        $materiaisExibidos = []; // Array para armazenar os materiais já exibidos
                    @endphp
                    @foreach ($produtos as $product)
                        @if (!in_array($product->material, $materiaisExibidos)) {{-- Verifica se o material já foi exibido --}}
                            <option value="{{ $product->id }}" data-preco="{{ $product->preco }}">{{ $product->material }}</option>
                            @php
                                $materiaisExibidos[] = $product->material; // Adiciona o material ao array de materiais exibidos
                            @endphp
                        @endif
                    @endforeach
                </select>

                <label for="acabamento">Escolha o acabamento:</label>
                <select id="acabamento"></select>

                <label for="altura">Altura (em cm):</label>
                <input type="number" id="altura" step="0.01">
                <label for="largura">Largura (em cm):</label>
                <input type="number" id="largura" step="0.01">
                <label for="quantidade">quantidade :</label>
                <input type="number" id="quantidade" step="0.01">

                <div id="area"></div>
                <div id="preco"></div>
                <button id="calcularBtn">Calcular Preço</button>

                <div id="precoFinal"></div>
                
                
              
            </div>
        </div>
    </body>

    <?php
        // Definir a variável $produtos em JavaScript
        echo "<script>";
        echo "const produtos = " . json_encode($produtos) . ";"; // Converter $produtos para JSON e atribuir à variável produtos
        
        // Mapear materiais e acabamentos
        $materiaisAcabamentos = [];
        foreach ($produtos as $product) {
            $material = $product->material;
            $acabamento = $product->acabamento;
            if (!isset($materiaisAcabamentos[$material])) {
                $materiaisAcabamentos[$material] = [];
            }
            $materiaisAcabamentos[$material][] = $acabamento;
        }
        echo "const materiaisAcabamentos = " . json_encode($materiaisAcabamentos) . ";"; // Mapeamento de materiais e acabamentos
        echo "</script>";
    ?>
    
    <script >
        const produtoDropdown = document.getElementById('produto');
        const precoDiv = document.getElementById('preco');
        const alturaInput = document.getElementById('altura');
        const larguraInput = document.getElementById('largura');
        const quantidadeInput = document.getElementById('quantidade');
        const areaDiv = document.getElementById('area');
        const precoFinalDiv = document.getElementById('precoFinal');
        const acabamentoDropdown = document.getElementById('acabamento');

        // Evento de mudança para o primeiro select
        produtoDropdown.addEventListener('change', function() {
            const selectedOption = this.options[this.selectedIndex];
            const material = selectedOption.textContent; // Obtém o material selecionado
            const preco = parseFloat(selectedOption.getAttribute('data-preco'));
            precoDiv.innerText = `Preço por m²: R$ ${preco.toFixed(2)}`;
            updateAcabamentosDropdown(material);
        });

        // Evento de mudança para o segundo select
        acabamentoDropdown.addEventListener('change', function() {
            const selectedMaterial = produtoDropdown.options[produtoDropdown.selectedIndex].textContent;
            const selectedAcabamento = this.options[this.selectedIndex].value;
            const produto = produtos.find(p => p.material === selectedMaterial && p.acabamento === selectedAcabamento);
            const preco = produto ? parseFloat(produto.preco) : 0;
            precoDiv.innerText = `Preço por m²: R$ ${preco.toFixed(2)}`;
        });

        // Função para atualizar as opções do segundo select
        function updateAcabamentosDropdown(material) {
            const acabamentoDropdown = document.getElementById('acabamento');
            acabamentoDropdown.innerHTML = ''; // Limpa as opções existentes

            // Filtra os acabamentos pelo material selecionado
            const acabamentos = materiaisAcabamentos[material] || [];

            // Cria as novas opções de acabamento baseadas nos acabamentos filtrados
            acabamentos.forEach(acabamento => {
                const option = document.createElement('option');
                option.value = acabamento;
                option.textContent = acabamento;
                acabamentoDropdown.appendChild(option);
            });
        }

        const calcularBtn = document.getElementById('calcularBtn');

        calcularBtn.addEventListener('click', function() {
            const quantidade = parseInt(quantidadeInput.value);
            const largura = parseFloat(larguraInput.value);
            const altura = parseFloat(alturaInput.value);

            calcularPrecoPHP(quantidade, largura, altura);
        });

        function calcularPrecoPHP(quantidade, largura, altura) {
            const materialSelecionado = produtoDropdown.options[produtoDropdown.selectedIndex].textContent;
            const acabamentoSelecionado = acabamentoDropdown.options[acabamentoDropdown.selectedIndex].textContent;
            const produtoId = produtos.find(p => p.material === materialSelecionado && p.acabamento === acabamentoSelecionado)?.id;

            if (isNaN(quantidade) || isNaN(largura) || isNaN(altura) || isNaN(produtoId)) {
                alert('Por favor, insira valores numéricos válidos.');
            } else {
                const xhr = new XMLHttpRequest();
                xhr.open('POST', '/calcular-preco', true); // Rota para calcular o preço
                xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
                xhr.setRequestHeader('X-CSRF-TOKEN', '{{ csrf_token() }}');
                xhr.onreadystatechange = function () {
                    if (xhr.readyState === 4 && xhr.status === 200) {
                        const resposta = JSON.parse(xhr.responseText);
                        const precoFinal = parseFloat(resposta.precoTotal);
                        if(resposta.precoTotal<15){
                            document.getElementById('precoFinal').innerText = `Preço Final: R$ ${15.00}`;

                        }
                        else{
                            document.getElementById('precoFinal').innerText = `Preço Final: R$ ${precoFinal.toFixed(2)}`;

                        }
                    }
                };
                const params = `quantidade=${quantidade}&largura=${largura}&altura=${altura}&produtoId=${produtoId}`;
                xhr.send(params);
            }
        }
    </script>
</html>
