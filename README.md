# tcc

<!-- nome do projeto -->
<h1>TIME FARMER</h1>

<!-- descrição e objetivo do projeto -->
<p>Tentaremos criar um jogo P2E para navegador, utilizando o PHP no backend, MySQL no Banco de Dados, além de HTML, CSS e JS no frontend.</p>
<br>
<hr>

<!-- objetivos listados do projeto -->
<h1>Lista dos Objetivos do Projeto</h1>
- []Estrutura do projeto em MVC
- []Criação do CRUD para Usuários
- []Criação do CRUD para as plantas
- []Criação do CRUD para os itens
- []Criação do CRUD para os pets
- []Adicionar as mecânicas climáticas
- []Adicionar a mecânica das plantas - crescimento, reprodução, morte*
- []Adicionar a mecânica dos itens do jogo - aumentar a taxa de crescimento, reduzir ou anular os efeitos climáticos, aumentar a reprodução, etc...
- []Adicionar as mecânicas das mudanças climáticas
- []Criação da interface gráfica - Main Page, Store, User, etc...
- []Criação gráfica das plantas, dos itens e dos pets
- []Revisão do projeto
<br>
<hr>

<h1>Estrutura do Projeto</h1>

/ (nossa raiz)
|
|--<b>.test</b> (páginas ou partes do projeto que estão passando por testes)
|
|--<b>app</b>
|   |
|   |-<b>Controller</b>
|   |     |
|   |     |-<b>Pages</b> (diretório que armazena todas as páginas do projeto)
|   |
|   |-<b>Http</b> (diretório que guarda as classes Request, Response, Rotes, etc...)
|   |   
|   |-<b>Model</b>
|   |   |
|   |   |--<b>Entity</b>
|   |         |
|   |         |-<b>Organization</b> (diretório que guarda nossas conecções com o banco de 
|   |                                dados)
|   |
|   |-<b>Utils</b> (Guarda nossa classe responsável pela renderização das páginas)
|
|
|--<b>resource</b>
|     |
|     |-<b>view</b>
|         |
|         |-<b>pages</b> (diretório que guarda nossas páginas html)
|
|--<b>routes</b> (diretório que guarda nosso arquivo de rotas)
|
|--<b>vendor</b> (diretório criado pelo composer com o autoload.php)
|
|--<b>.gitgnore</b> (páginas que não vao entrar no repositório do gitbhub)
|
|--<b>.htaccess</b> (configuração do Apache para a reescrita de rotas)
|
|--<b>composer.json</b> (configuração do composer)
|
|--<b>composer.lock</b> (lock do composer)
|
|--<b>index.php</b> (inicia o nosso jogo)
|
|--<b>README.md</b> (este arquivo)

