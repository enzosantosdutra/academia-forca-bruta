/**
 * Função corrigida para expandir apenas um card por vez.
 * @param {HTMLElement} button - O botão que foi clicado.
 */
function toggleMaisInfo(button) {
    const clickedCard = button.closest('.unidade-card');

    // Percorre todos os cards da página
    document.querySelectorAll('.unidade-card').forEach(card => {
        // Verifica se o card atual do loop é o que foi clicado
        if (card === clickedCard) {
            // Se for o card clicado, ele inverte o seu estado (abre ou fecha)
            card.classList.toggle('expanded');
        } else {
            // Para todos os outros cards, remove a classe 'expanded' para garantir que estejam fechados
            card.classList.remove('expanded');
        }

        // Atualiza o texto do botão de cada card de acordo com seu estado
        if (card.classList.contains('expanded')) {
            card.querySelector('.btn-secondary').innerHTML = '⬆️ Ver menos';
        } else {
            card.querySelector('.btn-secondary').innerHTML = '📋 Ver mais';
        }
    });
}


function showNotification(message, type = 'info') {
    const existingNotification = document.querySelector('.notification');
    if (existingNotification) {
        existingNotification.remove();
    }

    const notification = document.createElement('div');
    notification.className = `notification ${type}`;
    notification.textContent = message;

    notification.style.cssText = `
        position: fixed;
        top: 20px;
        right: 20px;
        background: ${type === 'success' ? 'linear-gradient(135deg, #28a745, #20c997)' :
                    type === 'error' ? 'linear-gradient(135deg, #dc3545, #c82333)' :
                    'linear-gradient(135deg, #ff6b35, #ff8e35)'};
        color: white;
        padding: 1rem 2rem;
        border-radius: 12px;
        font-weight: 600;
        z-index: 1000;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.3);
        transform: translateX(100%);
        transition: transform 0.3s ease;
    `;

    document.body.appendChild(notification);

    setTimeout(() => {
        notification.style.transform = 'translateX(0)';
    }, 100);

    setTimeout(() => {
        notification.style.transform = 'translateX(100%)';
        setTimeout(() => {
            notification.remove();
        }, 300);
    }, 3000);
}

// Animação de entrada dos cards
function animateCards() {
    const cards = document.querySelectorAll('.unidade-card');
    cards.forEach((card, index) => {
        card.style.animationDelay = `${index * 0.2}s`;
    });
}

// Inicializar animações quando a página carregar
document.addEventListener('DOMContentLoaded', function() {
    animateCards();

    setTimeout(() => {
        showNotification('Bem-vindo! Explore nossas unidades.', 'info');
    }, 1000);
});

// Efeito de parallax suave no scroll
window.addEventListener('scroll', function() {
    const scrolled = window.pageYOffset;
    const particles = document.querySelectorAll('.particle');

    particles.forEach((particle, index) => {
        const speed = (index + 1) * 0.5;
        particle.style.transform = `translateY(${scrolled * speed}px)`;
    });
});