# ⚡ Central de Serviços - Sistema de Gestão para Eletricistas

<div align="center">

[![Laravel](https://img.shields.io/badge/Laravel-12.x-FF2D20?style=flat&logo=laravel)](https://laravel.com)
[![PHP](https://img.shields.io/badge/PHP-8.3-777BB4?style=flat&logo=php)](https://www.php.net/)
[![License](https://img.shields.io/badge/License-MIT-green.svg)](LICENSE)
[![Status](https://img.shields.io/badge/Status-Ativo-brightgreen.svg)](https://github.com/luizalvesot/central_servicos)

Um sistema web intuitivo e clean para eletricistas gerenciarem seus clientes, ordens de serviço e gerar documentation profissional em PDF.

[Demo em Vídeo](#-demonstração) • [Recursos](#-recursos) • [Instalação](#-instalação) • [Stack Técnico](#-stack-técnico)

</div>

---

## 📹 Demonstração

Veja o sistema em ação:

<video width="100%" controls>
  <source src="./demonstacao.mkv" type="video/x-matroska">
  Seu navegador não suporta a tag video.
</video>

**Nota:** Se o vídeo acima não funcionar, acesse diretamente: `demonstacao.mkv`

---

## 🎯 Sobre o Projeto

Este é um projeto de portfólio que demonstra como criar uma **aplicação web prática e user-friendly** para profissionais autônomos sem experiência técnica.

O sistema foi desenvolvido para um eletricista que precisava de uma solução simples, clean e eficiente para:
- ✅ Gerenciar base de dados de clientes
- ✅ Criar e organizar ordens de serviço
- ✅ Gerar relatórios profissionais em PDF
- ✅ Acompanhar serviços e gerar insights com filtros customizáveis

**Foco:** Simplicidade, usabilidade e produtividade.

---

## 🚀 Recursos

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

## 🛠️ Stack Técnico

### Backend
- **Laravel 12** - Framework PHP moderno e robusto
- **MySQL/MariaDB** - Banco de dados relacional
- **Livewire** - Componentes dinâmicos em tempo real (opcional)
- **DomPDF** - Geração de PDFs

### Frontend
- **Blade** - Template engine do Laravel
- **Tailwind CSS** - Styling utilitário e responsivo
- **Alpine.js** - Interatividade leve no frontend
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

## ⚙️ Instalação

### Opção 1: Com Docker (Recomendado)

```bash
# 1. Clonar o repositório
git clone https://github.com/luizalvesot/central_servicos.git
cd central_servicos/apps/central_servicos

# 2. Iniciar containers
docker compose up -d

# 3. Entrar no container PHP
docker compose exec app bash

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
# Abra seu navegador em http://localhost:8000
```

### Opção 2: Instalação Local

```bash
# 1. Clonar repositório
git clone https://github.com/luizalvesot/central_servicos.git
cd central_servicos/apps/central_servicos/src/central_servicos

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

## 🎮 Como Usar

### 1️⃣ Fazer Login
```
Acesse: http://localhost:8000/login
Use suas credenciais configuradas
```

### 2️⃣ Cadastrar Clientes
```
Menu → Clientes → Novo Cliente
Preencha nome, telefone, endereço, email
Salve para aparecer na lista
```

### 3️⃣ Criar Ordem de Serviço
```
Menu → Ordens de Serviço → Nova OS
Selecione cliente
Descreva serviço, valor e data
Salve e acompanhe o status
```

### 4️⃣ Gerar Relatórios
```
Menu → Relatórios
Aplique filtros (período, cliente)
Visualize números e insights
```

### 5️⃣ Exportar para PDF
```
Na listagem de OS → Gerar PDF
Escolha período/cliente
PDF será baixado pronto para imprimir
```

---

## 📁 Estrutura do Projeto

```
central_servicos/
├── app/
│   ├── Actions/          # Ações reutilizáveis
│   ├── Http/
│   │   ├── Controllers/  # Controladores
│   │   └── Requests/     # Validação de entrada
│   ├── Livewire/         # Componentes Livewire
│   ├── Models/           # Modelos Eloquent
│   └── Policies/         # Autorização
├── routes/
│   ├── web.php          # Rotas web
│   └── api.php          # Rotas API (se houver)
├── resources/
│   ├── views/           # Templates Blade
│   ├── css/             # Estilos Tailwind
│   └── js/              # Scripts frontend
├── database/
│   ├── migrations/       # Migrações do BD
│   └── seeders/         # Seeders para dados iniciais
├── storage/             # Cache, logs, uploads
├── docker-compose.yml   # Configuração Docker
├── tailwind.config.js   # Config Tailwind
└── vite.config.js       # Config Vite
```

---

## 🧪 Testes

```bash
# Executar testes unitários
php artisan test

# Com cobertura de código
php artisan test --coverage
```

---

## 🤝 Contribuições

Sugestões e melhorias são bem-vindas! Sinta-se à vontade para:
- Abrir uma [Issue](https://github.com/luizalvesot/central_servicos/issues)
- Fazer um [Pull Request](https://github.com/luizalvesot/central_servicos/pulls)

---

## 📝 Licença

Este projeto é licenciado sob a Licença MIT - veja [LICENSE](LICENSE) para detalhes.

---

## 👨‍💻 Autor

**Luiz Alves**

- GitHub: [@luizalvesot](https://github.com/luizalvesot)
- Portfólio: [Seu site aqui]

---

## 🙏 Agradecimentos

- [Laravel](https://laravel.com) - Framework incrível
- [Tailwind CSS](https://tailwindcss.com) - Styling elegante
- [DomPDF](https://dompdf.github.io/) - Geração de PDFs

---

<div align="center">

**[⬆ Voltar ao topo](#-central-de-serviços---sistema-de-gestão-para-eletricistas)**

Feito com ❤️ por Luiz Alves

</div>
