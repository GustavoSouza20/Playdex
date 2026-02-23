# 🎮 Playdex

![88eac8e8-a919-4e00-be91-1c6d11adc29a](https://github.com/user-attachments/assets/6bc2f2c8-67e1-4678-9732-632a2ac4584b)



O **Playdex** é uma plataforma centralizada para a comunidade gamer, desenvolvida para simplificar, organizar e potencializar a experiência dos jogadores. O projeto funciona como um hub que une catálogo de jogos, notícias, eventos e interação via Inteligência Artificial, culminando em um funil de comunidade no Discord.

## 🚀 Funcionalidades Atuais

- **Catálogo Dinâmico de Jogos:** Integração direta com a API do **RAWG** via PHP (Code Snippets), trazendo os jogos mais bem avaliados, lançamentos e sistema de busca com filtros por gênero e plataforma.
- **Páginas de Detalhes:** Geração automática de páginas individuais para cada jogo com sinopse, capa, nota, desenvolvedora e plataformas.
- **Assistente Virtual (Dexter):** Um chatbot inteligente alimentado por IA (Gemini), integrado nativamente ao site através do **n8n**. O Dexter atua como um concierge, tirando dúvidas sobre sagas, recomendando jogos e guiando os usuários.
- **Gestão de Eventos:** Sistema de calendário integrado para acompanhar eventos do mundo dos games.
- **Interface Dark/Neon:** Design responsivo e moderno focado no público gamer (Tema Escuro com detalhes em Verde Neon), construído com Elementor e CSS personalizado.

## 🛠️ Tecnologias Utilizadas

- **Front-end / CMS:** WordPress, Elementor, CSS3.
- **Back-end / Lógica:** PHP (Code Snippets para consumo de API).
- **APIs Externas:** RAWG Video Games Database API.
- **Automação e IA:** n8n (Self-hosted via Podman) + Google Gemini API.
- **Ambiente de Desenvolvimento:** Fedora Atomic, Podman (Containers).

## 🗺️ Roadmap e Atualizações Futuras

O ciclo de vida do Playdex foi desenhado para retenção de usuários e monetização inteligente. As próximas etapas incluem:

- [ ] **Bot de Ofertas no Discord:** Criação de um bot no servidor oficial do Playdex para rastrear promoções de jogos e enviar links de afiliados (Amazon, Nuuvem, GOG).
- [ ] **Migração de Hospedagem:** Transferir o WordPress e o n8n do ambiente local (localhost) para uma VPS em nuvem (ex: Oracle Cloud).
- [ ] **Automação de Notícias:** Fluxo no n8n que lê feeds RSS de grandes portais de jogos, utiliza IA para resumir e reescrever o conteúdo para o público brasileiro, e posta automaticamente no WordPress.

## 👨‍💻 Autor

Desenvolvido por **Gustavo**.
