const puppeteer = require('puppeteer');
const fs = require('fs');

async function publishToDevto() {
  const content = fs.readFileSync('content.txt', 'utf8');
  const browser = await puppeteer.launch();
  const page = await browser.newPage();
  await page.goto('https://dev.to/new');

  // Preencher o formulário de publicação (adaptar para o layout atual do Dev.to)
  await page.type('#post_title', 'Meu novo artigo');
  await page.type('#post_body', content);

  // Clicar no botão de publicar
  await page.click('#publish_button');

  await browser.close();
}

publishToDevto();