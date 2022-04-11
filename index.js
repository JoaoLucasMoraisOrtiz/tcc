//const express recebe o arquivo express
const express = require('express')

//const app recebe uma instância do express
const app = express()

//determina a porta para escutar
const port = 3000

//quando der uma requisição de get em / retorna hello word
app.get('/', (req, res) => {
    res.send('Hello World!')
})

app.get('/teste', (req, res) => {
    text = 'here is teste?'
    res.send(text)
})

//quando receber uma requisição na porta, retorna que está ouvindo
app.listen(port, () => {
    console.log(`Example app listening on port ${port}`)
})