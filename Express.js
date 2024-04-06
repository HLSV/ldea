const express = require('express');

const app = express();

app.get('/', (req, res) => {
  res.status(200).send(`
    <!DOCTYPE html>
    <html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <title>Servidor Node.js funcionando!</title>
    </head>
    <body>
        <h1>Seu servidor Node.js está funcionando com Express!</h1>
    </body>
    </html>
  `);
});

const port = process.env.PORT || 3000; // Utilize a porta fornecida pela Vercel

app.listen(port, () => {
  console.log(`Servidor iniciado em http://localhost:${port}`);
});
