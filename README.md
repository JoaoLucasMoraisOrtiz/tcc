# tcc

<!-- nome do projeto -->
<h1>TIME FARMER</h1>

<!-- descrição e objetivo do projeto -->
<p>Tentaremos criar um jogo P2E para navegador, utilizando o PHP no backend, MySQL no Banco de Dados, além de HTML, CSS e JS no frontend.</p>
<br>
<hr>

<!-- objetivos listados do projeto -->
<h1>Lista dos Objetivos do Projeto</h1>
- []Estrutura do projeto em MVC<br>
- []Criação do CRUD para Usuários<br>
- []Criação do CRUD para as plantas<br>
- []Criação do CRUD para os itens<br>
- []Criação do CRUD para os pets<br>
- []Adicionar as mecânicas climáticas<br>
- []Adicionar a mecânica das plantas - crescimento, reprodução, morte*<br>
- []Adicionar a mecânica dos itens do jogo - aumentar a taxa de crescimento, reduzir ou anular os efeitos climáticos, aumentar a reprodução, etc...<br>
- []Adicionar as mecânicas das mudanças climáticas<br>
- []Criação da interface gráfica - Main Page, Store, User, etc...<br>
- []Criação gráfica das plantas, dos itens e dos pets<br>
- []Revisão do projeto<br>
<br>
<p><small>morte da planta não é exatamente que ela se destrua, mecanica sendo desenvolvida</small></p>
<hr>

<h1>Estrutura do Projeto</h1>

/ (nossa raiz)<br>
|<br>
|--<b>.test</b> (páginas ou partes do projeto que estão passando por testes)<br>
|<br>
|--<b>app</b><br>
|   |<br>
|   |-<b>Controller</b><br>
|   |     |<br>
|   |     |-<b>Pages</b> (diretório que armazena todas as páginas do projeto)<br>
|   |<br>
|   |-<b>Http</b> (diretório que guarda as classes Request, Response, Rotes, etc...)<br>
|   |   <br>
|   |-<b>Model</b><br>
|   |   |<br>
|   |   |--<b>Entity</b><br>
|   |         |<br>
|   |         |-<b>Organization</b> (diretório que guarda nossas conecções com o banco de <br>
|   |                                dados)<br>
|   |<br>
|   |-<b>Utils</b> (Guarda nossa classe responsável pela renderização das páginas)<br>
|<br>
|<br>
|--<b>resource</b><br>
|     |<br>
|     |-<b>view</b><br>
|         |<br>
|         |-<b>pages</b> (diretório que guarda nossas páginas html)<br>
|<br>
|--<b>routes</b> (diretório que guarda nosso arquivo de rotas)<br>
|<br>
|--<b>vendor</b> (diretório criado pelo composer com o autoload.php)<br>
|<br>
|--<b>.gitgnore</b> (páginas que não vao entrar no repositório do gitbhub)<br>
|<br>
|--<b>.htaccess</b> (configuração do Apache para a reescrita de rotas)<br>
|<br>
|--<b>composer.json</b> (configuração do composer)<br>
|<br>
|--<b>composer.lock</b> (lock do composer)<br>
|<br>
|--<b>index.php</b> (inicia o nosso jogo)<br>
|<br>
|--<b>README.md</b> (este arquivo)<br>

