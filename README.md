# Central de Serviços - Sistema de Gestão para Eletricistas

<div align="center">

[![Laravel](https://img.shields.io/badge/Laravel-12.x-FF2D20?style=flat&logo=laravel)](https://laravel.com)
[![PHP](https://img.shields.io/badge/PHP-8.3-777BB4?style=flat&logo=php)](https://www.php.net/)
[![Status](https://img.shields.io/badge/Status-Ativo-brightgreen.svg)](https://github.com/luizalvesot/central_servicos)

Um sistema web intuitivo e clean para eletricistas gerenciarem seus clientes, ordens de serviço e gerar ordem em PDF.

</div>

---

## Demonstração

Veja o sistema em ação:

<video width="100%" controls>
  <source src="https://drive.google.com/file/d/1mKW-Z2TdSjJ89_ZxU8VPH9fn5nH9YcCx/view?usp=sharing" type="video/x-matroska">
  Seu navegador não suporta a tag video.
</video>

**Nota:** Se o vídeo acima não funcionar, acesse diretamente: `demonstacao.mkv`

---

## Sobre o Projeto

Este é um projeto simples que demonstra como criei uma **aplicação web prática e user-friendly** para trabalhadores autônomos sem experiência técnica em informática.

O sistema foi desenvolvido para um eletricista que precisava de uma solução simples, clean e eficiente para:
- ✅ Gerenciar base de dados de clientes
- ✅ Criar e organizar ordens de serviço
- ✅ Gerar relatórios profissionais em PDF
- ✅ Acompanhar serviços e gerar insights com filtros customizáveis

**Foco:** Simplicidade, usabilidade e produtividade.

---

## Recursos

### 👤 Autenticação
- Login seguro com validação de credenciais
- Sessão persistente e logout

### 📋 Gestão de Clientes
- Cadastro completo de clientes (nome, telefone, endereço, etc.)
- Listagem com busca e filtros
- Edição e visualização de informações
- Exclusão segura com confirmação

### 📦 Ordens de Serviço
- Criação rápida de OS vinculadas a clientes
- Visualização organizada com status
- Filtros por cliente, período, status
- Edição e rastreamento de cada ordem
- Assinatura digital do cliente na ordem

### 📊 Relatórios & Insights
- Dashboard com números-chave (total de serviços, receita, clientes)
- Filtros dinâmicos por período
- Visualização de dados resumidos
- Exportação de dados em PDF

### 🖨️ Geração de PDF
- Ordens de serviço profissionais em PDF
- Dados customizáveis por cliente e período
- Design clean e pronto para impressão
- Espaço para assinatura do cliente

---

## Stack Técnico

### Backend
- **Laravel 12** - Framework PHP moderno e robusto
- **MySQL/MariaDB** - Banco de dados relacional
- **Livewire** - Componentes dinâmicos em tempo real (opcional)
- **DomPDF** - Geração de PDFs

### Frontend
- **Blade** - Template engine do Laravel
- **Bootstrap** - Styling utilitário e responsivo
- **Vite** - Build tool moderno

### DevOps
- **Docker** - Containerização
- **Docker Compose** - Orquestração de serviços

---

## 📋 Requisitos

- **PHP** 8.3 ou superior
- **Composer** para gerenciar dependências PHP
- **Node.js** 18+ e **npm** para assets frontend
- **MySQL** 8.0 ou **MariaDB** 10.4+
- **Docker & Docker Compose** (opcional, para ambiente containerizado)

---

## Instalação

### Opção 1: Com Docker (Recomendado)

```bash
# 1. Clonar o repositório
git clone https://github.com/luizalvesot/central_servicos.git
cd central_servicos

# 2. Iniciar containers
docker compose up -d

# 3. Entrar no container PHP
docker exec -it central_servicos /bin/bash

# 3.1 Acessar a pasta do apache2
cd /var/www/html

# 4. Instalar dependências do Laravel
composer install

# 5. Gerar chave de aplicação
php artisan key:generate

# 6. Executar migrações do banco de dados
php artisan migrate

# 7. Plantar dados iniciais (opcional)
php artisan db:seed

# 8. Instalar dependências Frontend
npm install && npm run build

# 9. Acessar a aplicação
# Abra seu navegador em http://seu_dominio:sua_porta
```

### Opção 2: Instalação Local

```bash
# 1. Clonar repositório
git clone https://github.com/luizalvesot/central_servicos.git
cd central_servicos

# 2. Instalar dependências
composer install
npm install

# 3. Configurar ambiente
cp .env.example .env
php artisan key:generate

# 4. Configurar banco de dados no .env
# Edite DB_HOST, DB_DATABASE, DB_USERNAME, DB_PASSWORD

# 5. Executar migrações
php artisan migrate

# 6. Compilar assets
npm run build

# 7. Iniciar servidor
php artisan serve
```

---

## Como Usar

### 1️⃣ Fazer Login
```
Acesse a URL do projeto instalado
Use suas credenciais configuradas
```

### 2️⃣ Cadastrar Clientes
```
Menu → Clientes → cadastrar Cliente
Preencha nome, telefone, documento, tipo de carteira, cep, endereço e observaçoes
Salve para aparecer na lista
```

### 3️⃣ Criar Ordem de Serviço
```
Menu → Pagina inicial → Cadastrar Serviço
Adicione o início e previsão de fim do serviço e o seu status
Selecione cliente, preencha o valor e a status do pagamento
Descreva serviço e coloque observações, se tiver
Salve e edite conforme necessário
```

### 4️⃣ Gerar Relatórios
```
Menu → Página inicial
Aplique filtros (período, cliente)
Visualize números e insights
```

### 5️⃣ Exportar para PDF
```
Menu → Página inicial
Aplique filtros (período, cliente)
PDF será baixado pronto para imprimir
```

---


## Autor

**Luiz Otavio Alves**

- GitHub: [@luizalvesot](https://github.com/luizalvesot)
- Portfólio: https://alvesluizotavio.tec.br
