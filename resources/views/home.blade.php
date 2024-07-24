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
                    <!-- Outros acabamentos aqui -->
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
            <div id="priceDisplay"></div>
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
            const frenteVersoSelect = document.getElementById('frenteVersoSelect');
            const selectedMaterial = materiais.find(material => material.id == materialSelect.value);

            if (selectedMaterial) {
                acabamentoSelect.style.display = 'block';
                acabamentoSelect.innerHTML = `<option value="">Selecione um acabamento</option>` + 
                    selectedMaterial.acabamentos.map(acabamento => `<option value="${acabamento.id}">${acabamento.nome}</option>`).join('');
                medidaSelect.style.display = 'none';
                medidaInput.style.display = 'none';
                medidaSelect.innerHTML = '';
                quantidadeSelect.style.display = 'none';
                quantidadeInput.style.display = 'none';
                quantidadeSelect.innerHTML = '';
                frenteVersoSelect.style.display = (selectedMaterial.id === 10 || selectedMaterial.id === 11 || selectedMaterial.id === 12) ? 'block' : 'none';
            } else {
                acabamentoSelect.style.display = 'none';
                medidaSelect.style.display = 'none';
                medidaInput.style.display = 'none';
                quantidadeSelect.style.display = 'none';
                quantidadeInput.style.display = 'none';
                frenteVersoSelect.style.display = 'none';
            }
        }

        function showMedidas() {
            const materialSelect = document.getElementById('materialSelect');
            const medidaSelect = document.getElementById('medidaSelect');
            const medidaInput = document.getElementById('medidaInput');
            const selectedMaterial = materiais.find(material => material.id == materialSelect.value);

            if (selectedMaterial) {
                if (selectedMaterial.medidas.length > 0) {
                    medidaSelect.style.display = 'block';
                    medidaInput.style.display = 'none';
                    medidaSelect.innerHTML = `<option value="">Selecione uma medida</option>` + 
                        selectedMaterial.medidas.map(medida => `<option value="${medida.id}">${medida.medida}</option>`).join('');
                } else {
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
                        const quantidadeId = quantidadeSelect.value;
                        const priceDisplay = document.getElementById('priceDisplay');
                        
                        // Define `tem_acabamento` based on the selected acabamento text
                        const temAcabamento = (selectedAcabamento === 'Sem Acabamento') ? 'N' : 'S';

                        try {
                            const response = await fetch(`/preco?material_id=${selectedMaterial.id}&medida_id=${selectedMedida}&quantidade_id=${quantidadeId}&tem_acabamento=${temAcabamento}`);
                            
                            if (!response.ok) {
                                throw new Error(`HTTP error! Status: ${response.status}`);
                            }
                            
                            const data = await response.json();
                            
                            if (data.preco) {
                                priceDisplay.textContent = `Preço: R$ ${data.preco}`;
                            } else {
                                priceDisplay.textContent = 'Preço não encontrado';
                            }
                        } catch (error) {
                            console.error('Fetch error:', error);
                            priceDisplay.textContent = 'Erro ao buscar preço';
                        }
                    };

                } else {
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
