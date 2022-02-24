//pegar a altura e a largura da div plantas
plantsHeight = document.getElementById('game').clientHeight
plantsWidth = document.getElementById('game').clientWidth

//variável de configuração do phaser com openGL
var config = {
    type: Phaser.WEBGL,
    parent: 'game',
    width: plantsWidth,
    height: plantsHeight,
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
    var image = this.add.sprite(200, 300, 'card').setInteractive();

    this.input.setDraggable(image);

    //  The pointer has to move 16 pixels before it's considered as a drag
    this.input.dragDistanceThreshold = 16;

    this.input.on('dragstart', function (pointer, gameObject) {

        gameObject.setTint(0x12312f);

    });

    this.input.on('drag', function (pointer, gameObject, dragX, dragY) {

        gameObject.x = dragX;
        gameObject.y = dragY;

    });

    this.input.on('dragend', function (pointer, gameObject) {

        gameObject.clearTint();

    });
}