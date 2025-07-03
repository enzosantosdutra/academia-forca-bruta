document.addEventListener('DOMContentLoaded', function() {
    
    // Lógica para selecionar o objetivo
    document.querySelectorAll('.objetivo-card').forEach(card => {
        card.addEventListener('click', function() {
            // Remove a seleção de todos os outros cards
            document.querySelectorAll('.objetivo-card').forEach(c => c.classList.remove('selected'));
            
            // Adiciona a seleção ao card clicado
            this.classList.add('selected');
            
            // Pega o valor do objetivo e atualiza o campo escondido
            const objetivoSelecionado = this.getAttribute('data-objetivo');
            document.getElementById('objetivo').value = objetivoSelecionado;
            
            // PISTA DE DEBUG: Mostra no console o que foi selecionado
            console.log('Objetivo selecionado:', objetivoSelecionado);
            
            showMessage(`Objetivo "${this.querySelector('h3').textContent}" selecionado!`);
        });
    });

    // Lógica para o envio do formulário
    const form = document.getElementById('form-dados');
    if (form) {
        form.addEventListener('submit', function(event) {
            const objetivoInput = document.getElementById('objetivo');
            
            // PISTA DE DEBUG: Mostra o valor do objetivo no momento do envio
            console.log('Tentando enviar formulário com o objetivo:', objetivoInput.value);

            // Se o campo de objetivo estiver vazio, impede o envio
            if (!objetivoInput.value) {
                event.preventDefault(); // Impede o envio do formulário
                console.error('Envio bloqueado: Nenhum objetivo foi selecionado.');
                showMessage('Por favor, selecione um objetivo!', 'error');
                return;
            }
            
            // Se tudo estiver certo, mostra mensagem de carregamento
            showMessage('Salvando dados e gerando treinos...');
        });
    }

    // Scroll suave para a seção de treinos se ela existir na página
    const treinosSection = document.getElementById('treinos-section');
    if (treinosSection) {
        // Espera um pouco para a animação da página acontecer
        setTimeout(() => {
            treinosSection.scrollIntoView({ 
                behavior: 'smooth',
                block: 'start'
            });
        }, 300);
    }
});

// Função para mostrar mensagens temporárias na tela
function showMessage(message, type = 'success') {
    const messageDiv = document.getElementById('success-message');
    if (!messageDiv) return;

    messageDiv.textContent = message;
    messageDiv.className = `success-message ${type === 'error' ? 'error' : ''} show`;
    
    setTimeout(() => {
        messageDiv.classList.remove('show');
    }, 3000);
}