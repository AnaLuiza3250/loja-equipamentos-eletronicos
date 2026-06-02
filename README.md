
# Sistema de Controle de Estoque para Equipamentos Eletrônicos

[![Laravel Version](https://img.shields.io/badge/Laravel-12.x-red.svg)](https://laravel.com)
[![PHP Version](https://img.shields.io/badge/PHP-8.2+-blue.svg)](https://php.net)
[![License](https://img.shields.io/badge/License-MIT-green.svg)](LICENSE)

## Descrição do Projeto
Este projeto foi desenvolvido como parte da **Avaliação 2 da disciplina de Programação Back-End**. A aplicação consiste em um sistema web robusto para a gestão e controle de estoque em tempo real de uma loja de eletrônicos (smartphones, tablets, notebooks, smart TVs e acessórios), substituindo o controle antigo feito por planilhas e eliminando falhas operacionais.

O sistema categoriza os produtos por tipos, gerencia as especificações técnicas detalhadas de hardware e emite alertas visuais dinâmicos para produtos com estoque baixo.

---

##  Funcionalidades Implementadas

* **Autenticação Segura (Breeze):** Sistema de Login, Registro e Logout totalmente funcional utilizando o ecossistema oficial `Laravel Breeze`.
* **Rotas Protegidas:** Painel administrativo e telas de cadastro/edição completamente blindados através do Middleware `auth`.
* **Banco de Dados Relacional:** Estrutura baseada em MySQL contendo chaves estrangeiras (`Foreign Keys`) e relacionamentos de integridade.
* **CRUD Completo - Tabela 1 (Tipos):** Controle absoluto (Inserção, Listagem, Edição e Exclusão) das categorias de classificação de hardware.
* **CRUD Completo - Tabela 2 (Equipamentos):** Controle absoluto do portfólio de produtos eletrônicos.
* **Relacionamento nas Views:** Exibição dinâmica do nome do Tipo e do Fabricante ao renderizar os dados do equipamento.
* **+5 Campos de Características:** Mapeamento técnico detalhado para eletrônicos, incluindo: *Processador, Memória RAM, Armazenamento, Tamanho de Tela, Resolução de Câmera e Sistema Operacional*.
* **Upload de Imagens:** Upload integrado de fotos dos produtos salvando os arquivos diretamente no Storage público e renderizando-os nos cards/tabelas da interface.
* **Alerta Visual de Estoque Baixo:** Sistema inteligente que compara a quantidade atual com o estoque mínimo configurado e dispara um badge visual de atenção na listagem.

---

## Tecnologias Utilizadas

* **Framework:** Laravel 12.x
* **Linguagem:** PHP 8.2+
* **Banco de Dados:** MySQL 8.0
* **Autenticação:** Laravel Breeze (Blade/Tailwind)
* **Estilização:** Tailwind CSS (Suporte nativo a Light/Dark Mode)

---

## Tutorial de Instalação e Configuração

Siga os passos abaixo para clonar o repositório e rodar o projeto localmente em sua máquina de desenvolvimento:

---

### 1. Clonar o Repositório

```bash
git clone [https://github.com/AnaLuiza3250/loja-equipamentos-eletronicos.git](https://github.com/AnaLuiza3250/loja-equipamentos-eletronicos.git)
cd loja-equipamentos-eletronicos

```

### 2. Instalar as Dependências do PHP (Composer)

```bash
composer install

```

### 3. Instalar as Dependências do Front-end (NPM)

```bash
npm install

```

### 4. Configurar o Arquivo de Ambiente `.env`

Copie o arquivo de exemplo do ambiente:

```bash
cp .env.example .env

```

Abra o arquivo `.env` recém-criado em seu editor de código e configure as credenciais do seu banco de dados MySQL local:

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=loja-equipamentos-eletronicos
DB_USERNAME=seu_usuario_do_banco
DB_PASSWORD=sua_senha_do_banco

```

### 5. Gerar a Chave da Aplicação

```bash
php artisan key:generate

```

### 6. Executar as Migrations (Criar as Tabelas)

Certifique-se de que o seu servidor MySQL (XAMPP, Wamp, Docker, etc.) está ativo e execute:

```bash
php artisan migrate

```

### 7. Criar o Link Simbólico do Storage (Para o Upload de Imagens)

Essencial para que as fotos dos equipamentos salvas no servidor fiquem visíveis na interface do usuário:

```bash
php artisan storage:link

```

### 8. Compilar os Ativos do Front-end (Tailwind CSS)

Mantenha este comando rodando em um terminal separado ou compile em modo de produção:

```bash
# Para desenvolvimento em tempo real:
npm run dev

# OU build para produção:
npm run build

```

### 9. Iniciar o Servidor Embutido do Laravel

```bash
php artisan serve

```

A aplicação estará disponível no seu navegador através do endereço: **`http://127.0.0.1:8000`**

---

## Como Testar o Sistema

1. Acesse a página inicial e clique em **Register** no canto superior direito para criar seu usuário de testes.
2. Após o login, você será redirecionado ao Dashboard protegido por segurança.
3. Navegue até a seção de **Tipos** e cadastre categorias como `Smartphone`, `Notebook` ou `Tablet`.
4. Navegue até a seção de **Fabricantes** e adicione marcas informando o nome e o país de origem.
5. Vá para a seção de **Equipamentos**, clique em Criar e preencha o formulário anexando uma imagem válida.
6. **Teste de Alerta:** Cadastre um item com `Estoque: 2` e `Estoque Mínimo: 5`. Ao salvar, note a badge vermelha de **Estoque Baixo** brilhando no painel de listagem!

---

## Autor

* **Estudante:** Ana Luiza Ferreira Antonio
* **Avaliação:** Prova 2 - Programação Back-End (Laravel 12)
* **Data de Entrega:** 02/06/2026

```