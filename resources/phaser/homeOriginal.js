//pegar a altura e a largura da div plantas
plantsHeight = document.getElementById('game').clientHeight
plantsWidth = document.getElementById('game').clientWidth

var load = { "card": 2, 
             "locationsCards": ['../../../resources/view/pages/img/bgImage.jpg', '../../../resources/view/pages/img/bgImage.jpg', '../../../resources/view/pages/img/bgImage.jpg'],
             "images": [['../../../resources/view/pages/img/botao.png', '../../../resources/view/pages/img/Tronco.png', '../../../resources/view/pages/img/Fe.png', '../../../resources/view/pages/img/Fd.png'], ['../../../resources/view/pages/img/botao.png', '../../../resources/view/pages/img/Tronco.png', '../../../resources/view/pages/img/Fe.png', '../../../resources/view/pages/img/Fd.png'], ['../../../resources/view/pages/img/botao.png', '../../../resources/view/pages/img/Tronco.png', '../../../resources/view/pages/img/Fe.png', '../../../resources/view/pages/img/Fd.png'], ['../../../resources/view/pages/img/botao.png', '../../../resources/view/pages/img/Tronco.png', '../../../resources/view/pages/img/Fe.png', '../../../resources/view/pages/img/Fd.png'], ['../../../resources/view/pages/img/botao.png', '../../../resources/view/pages/img/Tronco.png', '../../../resources/view/pages/img/Fe.png', '../../../resources/view/pages/img/Fd.png'], ['../../../resources/view/pages/img/botao.png', '../../../resources/view/pages/img/Tronco.png', '../../../resources/view/pages/img/Fe.png', '../../../resources/view/pages/img/Fd.png'], ['../../../resources/view/pages/img/botao.png', '../../../resources/view/pages/img/Tronco.png', '../../../resources/view/pages/img/Fe.png', '../../../resources/view/pages/img/Fd.png'], ['../../../resources/view/pages/img/botao.png', '../../../resources/view/pages/img/Tronco.png', '../../../resources/view/pages/img/Fe.png', '../../../resources/view/pages/img/Fd.png'], ['../../../resources/view/pages/img/botao.png', '../../../resources/view/pages/img/Tronco.png', '../../../resources/view/pages/img/Fe.png', '../../../resources/view/pages/img/Fd.png']]}

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
        create: create
    }
}

//executa a config do jogo
var game = new Phaser.Game(config)


//pré carrega os assets do jogo
function preload() {
    for (let index = 0; index <= load.card; index++) {

        this.load.image('card' + index, load.locationsCards[index]);

    }

    for (let index = 0; index <= 8; index++) {
        
        this.load.image('button'+index, load.images[index][0]);
    }
}

//cria o sprite do jogo
function create() {


    //cria as cartas de ação
    for (let index = 0; index <= load.card; index++) {

        if (load.card < 7) {
            //cria o objeto dragable da carta
            var cards = this.add.sprite(200 + (200 * index * 0.7), plantsHeight, 'card' + index).setInteractive();

        } else {
            //cria o objeto dragable da carta
            var cards = this.add.sprite(200 + (200 * index * 0.3), plantsHeight, 'card' + index).setInteractive();

        }
        //remodela  a imagem pra ela ficar na forma da carta
        cards.setScale(0.2, 0.5)
        this.input.setDraggable(cards);
    }

    //cria as plantas
    li = 0;
    x = 250;
    y = 150;
    for (let index = 0; index <= 8; index++) {

        if(li > 2){
            x = 250;
            y = y + 100;
            li = 0;
        }
        var button = this.add.image(x, y, 'button'+index).setInteractive();
        button.input.dropZone = true;
        button.setName('plant'+index);
        x = x + 100;
        li = li + 1;
    }

    //  The pointer has to move 16 pixels before it's considered as a drag
    this.input.dragDistanceThreshold = 1;

    //função que efetivamente arrasta o objeto, pegando sua posição X e Y
    this.input.on('drag', function (pointer, gameObject, dragX, dragY) {

        //modendo o objeto para X e Y
        gameObject.x = dragX;
        gameObject.y = dragY;

        gameObject.alpha = 0.8
        gameObject.setTint(0x5DDEB3 + dragX + dragY)

    });


    //determina que quando o objeto parar de ser arrastado, ele irá voltar a cor padrão
    this.input.on('dragend', function (pointer, gameObject, dropped) {

        if (!dropped) {
            gameObject.x = gameObject.input.dragStartX;
            gameObject.y = gameObject.input.dragStartY;
        }

        if (dropped) {
            console.log();
            gameObject.setActive(false).setVisible(false);
            gameObject.x = gameObject.input.dragStartX;
            gameObject.y = gameObject.input.dragStartY;
            gameObject.setActive(true).setVisible(true);
        }
        gameObject.clearTint()
        gameObject.alpha = 1;
    });

    planta = this.children.getByName('plant8');

    

}