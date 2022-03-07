//pegar a altura e a largura da div plantas
plantsHeight = document.getElementById('game').clientHeight
plantsWidth = document.getElementById('game').clientWidth

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
function preload ()
{
    this.load.image('card', '../../../resources/view/pages/img/bgImage.jpg');
}

//cria o sprite do jogo
function create ()
{
    //cria o objeto dragable da carta
    var image = this.add.sprite(200, plantsHeight, 'card').setInteractive();

    //remodela  a imágem pra ela ficar na forma da carta
    image.setScale(0.2, 0.5)
    this.input.setDraggable(image);

    //  The pointer has to move 16 pixels before it's considered as a drag
    this.input.dragDistanceThreshold = 16;

    //cria uma luz
    var spotlight = this.lights.addLight(-1, 300, 280).setIntensity(3);

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

        if(!dropped){
            gameObject.x = gameObject.input.dragStartX;
            gameObject.y = gameObject.input.dragStartY;
        }
        graphics.clear();
        graphics.lineStyle(2, 0xffff00);
        graphics.strokeRect(zone.x - zone.input.hitArea.width / 2, zone.y - zone.input.hitArea.height / 2, zone.input.hitArea.width, zone.input.hitArea.height);
        gameObject.clearTint()
        if(dropped){
            gameObject.setActive(false).setVisible(false);
        }

    });

    //cria uma zona para dropar o objeto
    var zone = this.add.zone(500, 300, 300, 300).setRectangleDropZone(300, 300);

    //  Just a visual display of the drop zone
    var graphics = this.add.graphics();
    graphics.lineStyle(2, 0xffff00);
    graphics.strokeRect(zone.x - zone.input.hitArea.width / 2, zone.y - zone.input.hitArea.height / 2, zone.input.hitArea.width, zone.input.hitArea.height);
}