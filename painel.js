document.addEventListener('DOMContentLoaded', function() {
    
    // Lógica para selecionar o objetivo
    document.querySelectorAll('.objetivo-card').forEach(card => {
        card.addEventListener('click', function() {
            document.querySelectorAll('.objetivo-card').forEach(c => c.classList.remove('selected'));
            this.classList.add('selected');
            document.getElementById('objetivo').value = this.getAttribute('data-objetivo');
            showMessage(`Objetivo "${this.querySelector('h3').textContent}" selecionado!`);
        });
    });

    // Lógica para o envio do formulário
    const form = document.getElementById('form-dados');
    if (form) {
        form.addEventListener('submit', function(event) {
            const objetivoInput = document.getElementById('objetivo');
            if (!objetivoInput.value) {
                event.preventDefault();
                showMessage('Por favor, selecione um objetivo!', 'error');
                return;
            }
            showMessage('Salvando dados e gerando treinos...');
        });
    }

    // Animação de entrada dos cards de treino
    const treinosSection = document.getElementById('treinos-section');
    if (treinosSection) {
        const cards = treinosSection.querySelectorAll('.treino-card');
        cards.forEach((card, index) => {
            card.style.opacity = '0';
            card.style.transform = 'translateY(20px)';
            card.style.transition = 'opacity 0.5s ease, transform 0.5s ease';
            setTimeout(() => {
                card.style.opacity = '1';
                card.style.transform = 'translateY(0)';
            }, index * 100);
        });
        
        // Scroll suave para a seção de treinos após o carregamento da página
        setTimeout(() => {
            treinosSection.scrollIntoView({ behavior: 'smooth', block: 'center' });
        }, 300);
    }
    
    // Feedback interativo nos inputs
    document.querySelectorAll('input[type="number"]').forEach(input => {
        input.addEventListener('input', function() {
            if (this.value) {
                this.style.borderColor = '#28a745';
            } else {
                this.style.borderColor = '#2d1810';
            }
        });
    });

    // Validação em tempo real (Massa Magra vs Peso)
    const massaMagraInput = document.getElementById('massa_magra');
    if(massaMagraInput) {
        massaMagraInput.addEventListener('input', function() {
            const peso = parseFloat(document.getElementById('peso').value);
            const massaMagra = parseFloat(this.value);
            if (peso && massaMagra && massaMagra > peso) {
                showMessage('Massa magra não pode ser maior que o peso total!', 'error');
                this.style.borderColor = '#dc3545';
            }
        });
    }

    // Calcular IMC automaticamente
    const pesoInput = document.getElementById('peso');
    const alturaInput = document.getElementById('altura');

    function calcularIMC() {
        const peso = parseFloat(pesoInput.value);
        const altura = parseFloat(alturaInput.value);
        
        if (peso && altura && altura > 0) {
            const alturaMetros = altura / 100;
            const imc = peso / (alturaMetros * alturaMetros);
            
            let categoria = '';
            if (imc < 18.5) categoria = 'Abaixo do peso';
            else if (imc < 25) categoria = 'Peso normal';
            else if (imc < 30) categoria = 'Sobrepeso';
            else categoria = 'Obesidade';
            
            showMessage(`Seu IMC: ${imc.toFixed(1)} (${categoria})`);
        }
    }
    
    if(pesoInput) pesoInput.addEventListener('change', calcularIMC);
    if(alturaInput) alturaInput.addEventListener('change', calcularIMC);
});

// Função para mostrar mensagens
function showMessage(message, type = 'success') {
    const messageDiv = document.getElementById('success-message');
    if (!messageDiv) return;

    messageDiv.textContent = message;
    messageDiv.className = `success-message ${type === 'error' ? 'error' : ''} show`;
    
    setTimeout(() => {
        messageDiv.classList.remove('show');
    }, 4000);
}