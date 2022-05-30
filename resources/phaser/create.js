/**
 * Função que cria os sprites do jogo
 */
function create(){

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

    //  The pointer has to move 1 pixels before it's considered as a drag
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
        
        gameObject.clearTint()

        if (dropped) {
            gameObject.setActive(true).setVisible(false);
            window.alert('wow')
            /* gameObject.x = gameObject.input.dragStartX;
            gameObject.y = gameObject.input.dragStartY;
            gameObject.setActive(true).setVisible(true); */
        }
    });

};