from flask import Flask, render_template, request
import os
import subprocess
import urllib.request
from bs4 import BeautifulSoup  # Biblioteca para extrair informações da web

app = Flask(__name__)

@app.route("/", methods=["GET", "POST"])
def index():
    if request.method == "POST":
        # Obter instruções do usuário
        instructions = request.form["instructions"]

        # Gerar código Python
        generated_code = generate_code(instructions)

        # Buscar informações na web
        web_results = search_web(instructions)

        # Renderizar o template HTML com as informações
        return render_template("index.html", code=generated_code, results=web_results)

    else:
        # Renderizar o template HTML inicial
        return render_template("index.html")

# Função para gerar código Python (implementação básica)
def generate_code(instructions):
    # Exemplo: gerar código para imprimir as instruções do usuário
    return f'print("{instructions}")'

# Função para buscar informações na web (implementação básica)
def search_web(instructions):
    # Fazer uma requisição HTTP para um mecanismo de busca (por exemplo, Google)
    query = urllib.request.quote(instructions)
    url = f"https://www.google.com/search?q={query}"
    response = urllib.request.urlopen(url)

    # Extrair informações relevantes da página HTML usando BeautifulSoup
    soup = BeautifulSoup(response.read(), 'html.parser')
    results = []
    for snippet in soup.find_all('snippet'):
        title = snippet.find('h2').text
        description = snippet.find('p').text
        results.append((title, description))

    return results

if __name__ == "__main__":
    app.run(debug=True)
