<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Materiais</title>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@200;600&display=swap" rel="stylesheet">
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
        #priceDisplay {
            margin-top: 20px;
            font-size: 20px;
        }
        .dimension-inputs {
            display: none;
            margin-top: 10px;
        }
        .dimension-inputs input {
            margin: 5px;
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
                <select id="frenteVersoSelect" style="display:none;">
                    <option value="">Selecione Frente ou Frente e Verso</option>
                    <option value="F">Só Frente</option>
                    <option value="FV">Frente e Verso</option>
                </select>
            </div>

            <div>
                <select id="acabamentoSelect" style="display:none;" onchange="showMedidas()">
                    <option value="">Selecione um acabamento</option>
                    <option value="N">Sem Acabamento</option>
                    
                </select>
            </div>
            
            <div id="dimensionInputs" class="dimension-inputs">
                <input type="text" id="alturaInput" placeholder="Altura (cm)">
                <input type="text" id="larguraInput" placeholder="Largura (cm)">
            </div>

            <div>
                <select id="medidaSelect" style="display:none;" onchange="showQuantidades()">
                    <option value="">Selecione uma medida</option>
                </select>
            </div>

            <div>
                <select id="quantidadeSelect" style="display:none;">
                    <option value="">Selecione uma quantidade</option>
                </select>
                <input type="text" id="quantidadeInput" style="display:none;" placeholder="Digite a quantidade">
            </div>

            <div id="priceDisplay"></div>
        </div>
    </div>

    <script>
        const materiais = @json($materiais);

        function showAcabamentos() {
            const materialSelect = document.getElementById('materialSelect');
            const acabamentoSelect = document.getElementById('acabamentoSelect');
            const medidaSelect = document.getElementById('medidaSelect');
            const dimensionInputs = document.getElementById('dimensionInputs');
            const quantidadeSelect = document.getElementById('quantidadeSelect');
            const quantidadeInput = document.getElementById('quantidadeInput');
            const frenteVersoSelect = document.getElementById('frenteVersoSelect');
            const selectedMaterial = materiais.find(material => material.id == materialSelect.value);

            if (selectedMaterial) {
                acabamentoSelect.style.display = 'block';
                acabamentoSelect.innerHTML = `<option value="">Selecione um acabamento</option>` + 
                    selectedMaterial.acabamentos.map(acabamento => `<option value="${acabamento.id}">${acabamento.nome}</option>`).join('');
                medidaSelect.style.display = 'none';
                medidaSelect.innerHTML = '';
                quantidadeSelect.style.display = 'none';
                quantidadeInput.style.display = 'none';
                quantidadeSelect.innerHTML = '';
                frenteVersoSelect.style.display = (selectedMaterial.id === 10 || selectedMaterial.id === 11 || selectedMaterial.id === 12) ? 'block' : 'none';
                dimensionInputs.style.display = 'none'; 
            } else {
                acabamentoSelect.style.display = 'none';
                medidaSelect.style.display = 'none';
                quantidadeSelect.style.display = 'none';
                quantidadeInput.style.display = 'none';
                frenteVersoSelect.style.display = 'none';
                dimensionInputs.style.display = 'none'; 
            }
        }

        function showMedidas() {
            const materialSelect = document.getElementById('materialSelect');
            const medidaSelect = document.getElementById('medidaSelect');
            const dimensionInputs = document.getElementById('dimensionInputs');
            const selectedMaterial = materiais.find(material => material.id == materialSelect.value);

            if (selectedMaterial) {
                if (selectedMaterial.medidas.length > 0) {
                    medidaSelect.style.display = 'block';
                    dimensionInputs.style.display = 'none';
                    medidaSelect.innerHTML = `<option value="">Selecione uma medida</option>` + 
                        selectedMaterial.medidas.map(medida => `<option value="${medida.id}">${medida.medida}</option>`).join('');
                } else {
                    medidaSelect.style.display = 'none';
                    dimensionInputs.style.display = 'block';
                }

                dimensionInputs.querySelector('#alturaInput').addEventListener('keydown', function(event) {
                    if (event.key === 'Enter') {
                        showQuantidades();
                    }
                });
                dimensionInputs.querySelector('#larguraInput').addEventListener('keydown', function(event) {
                    if (event.key === 'Enter') {
                        showQuantidades();
                    }
                });
            } else {
                medidaSelect.style.display = 'none';
                dimensionInputs.style.display = 'none';
            }
        }
        
        function showQuantidades() {
            const materialSelect = document.getElementById('materialSelect');
            const quantidadeSelect = document.getElementById('quantidadeSelect');
            const quantidadeInput = document.getElementById('quantidadeInput');
            const medidaSelect = document.getElementById('medidaSelect');
            const acabamentoSelect = document.getElementById('acabamentoSelect');
            const selectedMaterial = materiais.find(material => material.id == materialSelect.value);
            const selectedMedida = medidaSelect.value;
            const selectedAcabamento = acabamentoSelect.options[acabamentoSelect.selectedIndex].text;

            if (selectedMaterial) {
                if (selectedMaterial.quantidades.length > 0) {
                    quantidadeSelect.style.display = 'block';
                    quantidadeInput.style.display = 'none';
                    quantidadeSelect.innerHTML = `<option value="">Selecione uma quantidade</option>` + 
                        selectedMaterial.quantidades.map(quantidade => `<option value="${quantidade.id}">${quantidade.quantidade}</option>`).join('');
                    
                    quantidadeSelect.onchange = async function() {
                        await getPreco();
                    };

                } else {
                    quantidadeSelect.style.display = 'none';
                    quantidadeInput.style.display = 'block';
                }

                quantidadeInput.addEventListener('keydown', function(event) {
                    if (event.key === 'Enter') {
                        getPreco();
                    }
                });

            } else {
                quantidadeSelect.style.display = 'none';
                quantidadeInput.style.display = 'none';
            }
        }

        function getPreco() {
            const materialSelect = document.getElementById('materialSelect');
            const medidaSelect = document.getElementById('medidaSelect');
            const quantidadeSelect = document.getElementById('quantidadeSelect');
            const quantidadeInput = document.getElementById('quantidadeInput');
            const acabamentoSelect = document.getElementById('acabamentoSelect');
            const frenteVersoSelect = document.getElementById('frenteVersoSelect');
            const heightInput = document.getElementById('alturaInput');
            const widthInput = document.getElementById('larguraInput');
            const priceDisplay = document.getElementById('priceDisplay');
            const selectedMaterial = materiais.find(material => material.id == materialSelect.value);
            const selectedMedida = selectedMaterial.id === 1 || selectedMaterial.id === 2 || selectedMaterial.id === 10 || selectedMaterial.id === 11 || selectedMaterial.id === 12 ? medidaSelect.value : (heightInput.value && widthInput.value) ? heightInput.value + 'x' + widthInput.value : null;
            const quantidadeId = quantidadeSelect.value || quantidadeInput.value;
            const selectedAcabamento = acabamentoSelect.options[acabamentoSelect.selectedIndex].text;
            const temAcabamento = (selectedAcabamento === 'Sem Acabamento') ? 'N' : 'S';
            const frenteVersoValue = frenteVersoSelect.value;

            if (selectedMaterial) {
                let preco = null;

                if (selectedMaterial.id === 1) {
                    preco = selectedMaterial.precos.find(preco => preco.medida_id == selectedMedida && preco.quantidade_id == quantidadeId);
                } else if (selectedMaterial.id === 2) {
                    preco = selectedMaterial.precos.find(preco => preco.medida_id == selectedMedida);
                } else if ([3, 4, 6, 7, 8, 9].includes(selectedMaterial.id)) {
                    preco = selectedMaterial.precos.find(preco => preco.tem_acabamento == temAcabamento);
                } else if (selectedMaterial.id === 5) {
                    preco = selectedMaterial.precos.find(preco => preco.tem_acabamento);
                } else if ([10, 11, 12].includes(selectedMaterial.id)) {
                    preco = selectedMaterial.precos.find(preco => preco.tem_acabamento == temAcabamento && preco.medida_id == selectedMedida && preco.impressao == frenteVersoValue);
                    console.log(preco);
                }

                if (preco) {
                    let totalPreco = preco.preco;

                    if ([3, 4, 5, 6, 7, 8, 9].includes(selectedMaterial.id)) {
                        const height = parseFloat(heightInput.value) || 0;
                        const width = parseFloat(widthInput.value) || 0;
                        const area = (height * width) / 10000; // Convertendo cm² para m²

                        if (!isNaN(area) && area > 0) {
                            totalPreco *= area;
                        }
                    }

                    if (!quantidadeSelect.value) { // Se não há quantidade selecionada
                        const quantity = parseFloat(quantidadeInput.value);
                        if (!isNaN(quantity) && quantity > 0) {
                            totalPreco *= quantity;
                        }
                    }

                    priceDisplay.textContent = `Preço: R$ ${totalPreco.toFixed(2)}`;
                } else {
                    priceDisplay.textContent = 'Preço não encontrado';
                }
            } else {
                priceDisplay.textContent = 'Selecione um material';
            }
        }




    </script>
</body>
</html>
