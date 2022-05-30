//pegar a altura e a largura da div plantas
plantsHeight = document.getElementById('game').clientHeight
plantsWidth = document.getElementById('game').clientWidth

var load = { //numero de cartas
             "card": 2, 

             //imagem das cartas
             "locationsCards": ['../../../resources/view/pages/img/bgImage.jpg', '../../../resources/view/pages/img/bgImage.jpg', '../../../resources/view/pages/img/bgImage.jpg'],
             
             //função de cada carta, determinada por um objeto que estabelece exatamente o que a carta causa de benefício e de 'dano'
             "functionsCards": [{pulgão: '-0.25', cochonilha : '+0', braquiaria : '-1'}, {pulgão: '0', cochonilha : '-0.25', braquiaria : '+0,15'}, {pulgão: '-1', cochonilha : '-0.15', braquiaria : '0'}],

             //imagem das plantas
             "images": [['../../../resources/view/pages/img/botao.png', '../../../resources/view/pages/img/Tronco.png', '../../../resources/view/pages/img/Fe.png', '../../../resources/view/pages/img/Fd.png'], ['../../../resources/view/pages/img/botao.png', '../../../resources/view/pages/img/Tronco.png', '../../../resources/view/pages/img/Fe.png', '../../../resources/view/pages/img/Fd.png'], ['../../../resources/view/pages/img/botao.png', '../../../resources/view/pages/img/Tronco.png', '../../../resources/view/pages/img/Fe.png', '../../../resources/view/pages/img/Fd.png'], ['../../../resources/view/pages/img/botao.png', '../../../resources/view/pages/img/Tronco.png', '../../../resources/view/pages/img/Fe.png', '../../../resources/view/pages/img/Fd.png'], ['../../../resources/view/pages/img/botao.png', '../../../resources/view/pages/img/Tronco.png', '../../../resources/view/pages/img/Fe.png', '../../../resources/view/pages/img/Fd.png'], ['../../../resources/view/pages/img/botao.png', '../../../resources/view/pages/img/Tronco.png', '../../../resources/view/pages/img/Fe.png', '../../../resources/view/pages/img/Fd.png'], ['../../../resources/view/pages/img/botao.png', '../../../resources/view/pages/img/Tronco.png', '../../../resources/view/pages/img/Fe.png', '../../../resources/view/pages/img/Fd.png'], ['../../../resources/view/pages/img/botao.png', '../../../resources/view/pages/img/Tronco.png', '../../../resources/view/pages/img/Fe.png', '../../../resources/view/pages/img/Fd.png'], ['../../../resources/view/pages/img/botao.png', '../../../resources/view/pages/img/Tronco.png', '../../../resources/view/pages/img/Fe.png', '../../../resources/view/pages/img/Fd.png']]
}

//variável de configuração do phaser com openGL
var config = {
    type: Phaser.WEBGL,
    parent: 'game',
    width: plantsWidth,
    height: plantsHeight,
    transparent: true,
    scene: {
        //determina a função de preload
        preload: preload,

        //determina a função de create
        create: create,

        update: update
    }
}

//executa a config do jogo
var game = new Phaser.Game(config)

efects = [];
//pré carrega os assets do jogo
function preload() {
    for (let index = 0; index <= load.card; index++) {

        this.load.image('card' + index, load.locationsCards[index]);
        efects.push(['card'+index, load.functionsCards[index]]);

    }

    for (let index = 0; index <= 8; index++) {
        
        this.load.image('button'+index, load.images[index][0]);
    }

    this.load.image('teste', '../../../resources/view/pages/img/Tronco.png')
}

//cria o sprite do jogo
{{create}};

//variáveis para a func. update
var countCards = 0
var duration = []
var data = new Date();
//função de update que roda a todo momento
function update(){

    try {
        var cards = this.children.list[countCards];
        if(cards == undefined){
            countCards = 0;
            return;
        }
    } catch (error) {
        console.log(error)
        return;
    }

    if(!cards.visible){
    //precisa colocar a carta dentro do  duration, para depois somar sua % a conta de summon a partir do efects[]
        key = cards.texture.key
        
    }

    countCards = countCards + 1;
    console.log('fim')
    
}