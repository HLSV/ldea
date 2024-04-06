const express = require('express');
const app = express();

// Defina o caminho para o arquivo HTML
const htmlFilePath = './Gerador_de_senha.html';

app.get('/', (req, res) => {
  // Envie o arquivo HTML em resposta à requisição /
  res.sendFile(htmlFilePath, (err) => {
    if (err) {
      console.error(err);
      res.status(500).send('Erro ao enviar arquivo HTML');
    } else {
      console.log('Arquivo HTML enviado com sucesso!');
    }
  });
});

// Utilize a porta da Vercel se disponível, senão a 3000
const port = process.env.PORT || 3000;

app.listen(port, () => {
  console.log(`Servidor iniciado em http://0.0.0.0:${port}`);
});
