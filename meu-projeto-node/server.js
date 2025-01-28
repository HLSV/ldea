const express = require('express');
const dotenv = require('dotenv');
const config = require('./config.json');

dotenv.config();

const app = express();
const port = process.env.PORT || 3000;

// Configure seu roteamento e lógica de servidor aqui
app.get('/', (req, res) => {
  res.send('<h1>'+config.appName+'</h1>');
});

app.listen(port, () => {
  console.log(`Servidor escutando na porta ${port}`);
});
