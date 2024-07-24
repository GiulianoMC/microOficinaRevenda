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

        select, input[type="text"] {
            font-size: 18px;
            padding: 5px;
            margin: 10px 0;
        }
    </style>
</head>
<body>
    <div class="content">
        <div>
            <div class="title">Materiais</div>
            <div>
                <select id="materialSelect" onchange="showAcabamentos()">
                    <option value="">Selecione um material</option>
                    @foreach ($materiais as $material)
                        <option value="{{ $material->id }}">{{ $material->nome }}</option>
                    @endforeach
                </select>
            </div>
            <div>
                <select id="acabamentoSelect" style="display:none;" onchange="showMedidas()">
                    <option value="">Selecione um acabamento</option>
                </select>
            </div>
            <div>
                <select id="medidaSelect" style="display:none;" onchange="showQuantidades()">
                    <option value="">Selecione uma medida</option>
                </select>
                <input type="text" id="medidaInput" style="display:none;" placeholder="Digite a medida">
            </div>
            <div>
                <select id="quantidadeSelect" style="display:none;">
                    <option value="">Selecione uma quantidade</option>
                </select>
                <input type="text" id="quantidadeInput" style="display:none;" placeholder="Digite a quantidade">
            </div>
        </div>
    </div>

    <script>
        const materiais = @json($materiais);

        function showAcabamentos() {
            const materialSelect = document.getElementById('materialSelect');
            const acabamentoSelect = document.getElementById('acabamentoSelect');
            const medidaSelect = document.getElementById('medidaSelect');
            const medidaInput = document.getElementById('medidaInput');
            const quantidadeSelect = document.getElementById('quantidadeSelect');
            const quantidadeInput = document.getElementById('quantidadeInput');
            const selectedMaterial = materiais.find(material => material.id == materialSelect.value);

            if (selectedMaterial) {
                // Populate acabamentoSelect
                acabamentoSelect.style.display = 'block';
                acabamentoSelect.innerHTML = `<option value="">Selecione um acabamento</option>` + 
                    selectedMaterial.acabamentos.map(acabamento => `<option value="${acabamento.id}">${acabamento.nome}</option>`).join('');

                // Hide medidaSelect, medidaInput, quantidadeSelect, and quantidadeInput until appropriate options are selected
                medidaSelect.style.display = 'none';
                medidaInput.style.display = 'none';
                medidaSelect.innerHTML = '';
                quantidadeSelect.style.display = 'none';
                quantidadeInput.style.display = 'none';
                quantidadeSelect.innerHTML = '';
            } else {
                acabamentoSelect.style.display = 'none';
                medidaSelect.style.display = 'none';
                medidaInput.style.display = 'none';
                quantidadeSelect.style.display = 'none';
                quantidadeInput.style.display = 'none';
            }
        }

        function showMedidas() {
            const materialSelect = document.getElementById('materialSelect');
            const medidaSelect = document.getElementById('medidaSelect');
            const medidaInput = document.getElementById('medidaInput');
            const selectedMaterial = materiais.find(material => material.id == materialSelect.value);

            if (selectedMaterial) {
                if (selectedMaterial.medidas.length > 0) {
                    // Populate medidaSelect
                    medidaSelect.style.display = 'block';
                    medidaInput.style.display = 'none';
                    medidaSelect.innerHTML = `<option value="">Selecione uma medida</option>` + 
                        selectedMaterial.medidas.map(medida => `<option value="${medida.id}">${medida.medida}</option>`).join('');
                } else {
                    // Show input field for medida
                    medidaSelect.style.display = 'none';
                    medidaInput.style.display = 'block';
                }
            } else {
                medidaSelect.style.display = 'none';
                medidaInput.style.display = 'none';
            }
        }

        function showQuantidades() {
            const materialSelect = document.getElementById('materialSelect');
            const quantidadeSelect = document.getElementById('quantidadeSelect');
            const quantidadeInput = document.getElementById('quantidadeInput');
            const selectedMaterial = materiais.find(material => material.id == materialSelect.value);

            if (selectedMaterial) {
                if (selectedMaterial.quantidades.length > 0) {
                    // Populate quantidadeSelect
                    quantidadeSelect.style.display = 'block';
                    quantidadeInput.style.display = 'none';
                    quantidadeSelect.innerHTML = `<option value="">Selecione uma quantidade</option>` + 
                        selectedMaterial.quantidades.map(quantidade => `<option value="${quantidade.id}">${quantidade.quantidade}</option>`).join('');
                } else {
                    // Show input field for quantidade
                    quantidadeSelect.style.display = 'none';
                    quantidadeInput.style.display = 'block';
                }
            } else {
                quantidadeSelect.style.display = 'none';
                quantidadeInput.style.display = 'none';
            }
        }
    </script>
</body>
</html>
