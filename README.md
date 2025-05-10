<p align="center"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></p>

# Personal Library

Sistema de gerenciamento de biblioteca pessoal desenvolvido com Laravel e Blade, permitindo organizar e gerenciar sua coleção de livros de forma eficiente.

## Funcionalidades

- **Autenticação completa**
  - Cadastro de usuários
  - Login seguro
  - Recuperação de senha
  
- **Gerenciamento de Livros**
  - Cadastro de novos livros
  - Edição de informações
  - Exclusão de registros
  - Visualização detalhada
  
- **Catálogo de Autores**
  - Adicionar novos autores
  - Editar informações de autores
  - Excluir autores
  - Associar autores a livros
  
- **Organização por Categorias**
  - Criar categorias personalizadas
  - Editar categorias existentes
  - Excluir categorias
  - Classificar livros por categoria
  
- **Dashboard Intuitivo**
  - Visualização rápida da biblioteca
  - Estatísticas de acervo
  - Interface responsiva e amigável

## Requisitos do Sistema

- PHP >= 8.1
- Composer
- MySQL ou outro banco de dados compatível
- Node.js e NPM

## Instalação

1. Clone o repositório
   ```
   git clone https://github.com/seu-usuario/personal-library.git
   ```

2. Instale as dependências do PHP
   ```
   composer install
   ```

3. Instale as dependências do JavaScript
   ```
   npm install && npm run dev
   ```

4. Copie o arquivo de ambiente
   ```
   cp .env.example .env
   ```

5. Configure seu banco de dados no arquivo `.env`

6. Gere a chave da aplicação
   ```
   php artisan key:generate
   ```

7. Execute as migrações
   ```
   php artisan migrate --seed
   ```

8. Inicie o servidor de desenvolvimento
   ```
   php artisan serve
   ```

## Uso

Após a instalação, acesse o sistema através do navegador em `http://localhost:8000`. Você poderá criar uma conta ou fazer login com as seguintes credenciais de demonstração:

- **Email**: admin@example.com
- **Senha**: password

## Tecnologias Utilizadas

- [Laravel](https://laravel.com) - Framework PHP
- [Blade](https://laravel.com/docs/blade) - Template Engine
- [Laravel Breeze](https://laravel.com/docs/starter-kits#laravel-breeze) - Autenticação
- [MySQL](https://www.mysql.com/) - Banco de Dados
- [Tailwind CSS](https://tailwindcss.com) - Framework CSS

## Estrutura do Projeto

O sistema segue a estrutura padrão do Laravel, com alguns diretórios específicos:

- `app/Models` - Modelos de dados (Livro, Autor, Categoria)
- `app/Http/Controllers` - Controladores para gerenciar as requisições
- `resources/views` - Templates Blade para a interface do usuário
- `database/migrations` - Migrações para criação do banco de dados
- `routes` - Definição das rotas da aplicação

## Contribuição

Contribuições são bem-vindas! Sinta-se à vontade para abrir issues ou enviar pull requests com melhorias.

1. Faça um fork do projeto
2. Crie sua branch de feature (`git checkout -b feature/nova-funcionalidade`)
3. Commit suas mudanças (`git commit -m 'Adiciona nova funcionalidade'`)
4. Push para a branch (`git push origin feature/nova-funcionalidade`)
5. Abra um Pull Request

## Licença

Este projeto está licenciado sob a [Licença MIT](https://opensource.org/licenses/MIT).
