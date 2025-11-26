<?php
/**
 *
 * @Packge      Bame 
 * @Author      Themeholy
 * @Author URL  https://themeforest.net/user/themeholy 
 * @version     1.0
 *
 */

/**
 * Enqueue style of child theme 
 */
function bame_child_enqueue_styles() {
    wp_enqueue_style( 'bame-style', get_template_directory_uri() . '/style.css' );
    wp_enqueue_style( 'bame-child-style', get_stylesheet_directory_uri() . '/style.css', array( 'bame-style' ), wp_get_theme()->get('Version') );
}
add_action( 'wp_enqueue_scripts', 'bame_child_enqueue_styles', 100000 );


function adicionar_chat_n8n_rodape() {
    ?>
    <style>
        /* --- CORES GLOBAIS --- */
        :root {
            --n8n-chat-primary-color: #00D64F !important;
            --n8n-chat-secondary-color: #1a1a1a !important;
            --chat--color-primary: #00D64F !important;
        }

        /* --- BOTÃO FLUTUANTE (CORREÇÃO DO ÍCONE) --- */
        .chat-window-toggle svg {
            display: none !important;
        }
        .chat-window-toggle {
            /* SEU LOGO AQUI (Verifique se o link está correto) */
            background-image: url('http://playdex.local/wp-content/uploads/2025/11/logo-1.png') !important;
            background-size: 60% !important;
            background-position: center !important;
            background-repeat: no-repeat !important;
            background-color: #00D64F !important; 
        }
    </style>

    <link href="https://cdn.jsdelivr.net/npm/@n8n/chat/dist/style.css" rel="stylesheet" />
    <script type="module">
        import { createChat } from 'https://cdn.jsdelivr.net/npm/@n8n/chat/dist/chat.bundle.es.js';

        createChat({
            webhookUrl: 'http://localhost:5678/webhook/4c80d3b6-5ecb-489f-9c4c-d882fa5cdaff/chat',
            mode: 'window',
            
            // --- AQUI ESTÁ A CORREÇÃO DA MENSAGEM ---
            initialMessages: [
                'Oi, eu sou o Dexter, como posso te ajudar? 👋'
            ],
            // -----------------------------------------

            style: {
                width: '380px',
                height: '600px',
                position: 'right',
                backgroundColor: '#1a1a1a',
                fontFamily: 'Roboto, sans-serif',
                accentColor: '#00D64F',
            },
            i18n: {
                en: {
                    title: 'Dexter', // Mudei o título para Dexter
                    subtitle: 'Seu assistente de jogos',
                    getStarted: 'Nova Conversa',
                    inputPlaceholder: 'Digite sua mensagem...',
                    footer: '', // Remove o 'Powered by n8n'
                },
            },
        });
    </script>
    <?php
}
add_action( 'wp_footer', 'adicionar_chat_n8n_rodape' );