# Internético Blog

Este projeto é uma plataforma de blogs construída com o framework Laravel, permitindo que os usuários publiquem, compartilhem e gerenciem conteúdos de forma fácil e eficiente. Ele oferece recursos como autenticação de usuários, criação e edição de posts e uma interface intuitiva para navegar pelos diferentes posts e conteúdos disponíveis.

<div style=display: flex>
  <img width=100% src="https://github.com/gabrielmjacques/y-social-network/assets/107326349/77802904-a9c9-49a7-bb0b-045460d67443"/>
  <hr>
  
  <img width=49.9% src="https://github.com/gabrielmjacques/y-social-network/assets/107326349/4fbee469-2f13-46b7-bd6c-4fe74bbf52cd"/>
  <img width=49% src="https://github.com/gabrielmjacques/y-social-network/assets/107326349/140d9a44-0f99-4b92-abbb-13a182e22783"/>
</div>

## Tecnologias Usadas

- [PHP](https://www.php.net/)
- [Laravel](https://laravel.com/) 
- [Composer](https://getcomposer.org/)
- [Tailwind](https://tailwindcss.com/)
- [MySQL](https://www.mysql.com/)
- [Git](https://git-scm.com/)
- [Javascript](https://developer.mozilla.org/pt-BR/docs/Web/JavaScript/)
- [HTML](https://developer.mozilla.org/pt-BR/docs/Web/HTML/)
- [CSS](https://developer.mozilla.org/pt-BR/docs/Web/CSS/)

## Requisitos para execução
- [Laravel Herd](https://laravel.com/docs/8.x/sail) - Utilizado para criar um ambiente de desenvolvimento local para o Laravel.
- [MySQL](https://www.mysql.com/) - Banco de dados utilizado no projeto.
- [Node.js](https://nodejs.org/en/) - Ambiente de execução Javascript.

## Instalação

1. Clone o repositório:
```bash
git clone https://github.com/gabrielmjacques/InterneticoBlog.git
```

---

2. Configure o Herd:
- Vá na aba **General**
- Clique em **Add path**
- Adicione o caminho da pasta superior ao diretório do projeto.
- O link do projeto deve estar disponível na aba **Sites**.

---

3. Configure as variáveis de ambiente:
- Crie um arquivo `.env` na raiz do projeto.
- Copie o conteúdo do arquivo `.env.example` e cole no arquivo `.env`.
- Altere as variáveis de ambiente conforme necessário.

---

4. Instale as dependências:
- Abra um terminal na pasta do projeto.
- Execute o comando:
```bash
composer install
```
- Agora instale as dependências do NPM:
```bash
npm install
```

---

5. Execute as migrations
- Execute o comando:
```bash
php artisan migrate
```
---

6. Gere a chave de aplicação:
- Execute o comando:
```bash
php artisan key:generate
```

---

## Execução

1. Inicie o servidor:
- Execute o comando:
```bash
npm run dev
```
  - Abra o link do projeto pela aba **Sites** do Herd.
