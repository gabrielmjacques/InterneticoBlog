# Internético Blog

Este projeto é uma plataforma de blogs construída com o framework Laravel, permitindo que os usuários publiquem, compartilhem e gerenciem conteúdos de forma fácil e eficiente. Ele oferece recursos como autenticação de usuários, criação e edição de posts e uma interface intuitiva para navegar pelos diferentes posts e conteúdos disponíveis.

<p align="center">
    <img width=80% src="https://github.com/gabrielmjacques/InterneticoBlog/assets/107326349/6fc1a8c5-9713-4850-8aef-08750d7f9188"/>
</p>

<hr>

<img width=49.9% src="https://github.com/gabrielmjacques/InterneticoBlog/assets/107326349/ea76a19e-b05f-453e-bc25-fc8ebb7034c7"/>

<img width=49% src="https://github.com/gabrielmjacques/InterneticoBlog/assets/107326349/bea6189d-6f24-48c5-bdcf-88efcbb73e89"/>

<hr>

<img width=49% src="https://github.com/gabrielmjacques/InterneticoBlog/assets/107326349/32a6b67b-d4df-4426-a399-85fb73fada5c"/>

<img width=49.9% src="https://github.com/gabrielmjacques/InterneticoBlog/assets/107326349/2e7bb74b-2c22-406b-b728-8755e0fef280"/>

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
