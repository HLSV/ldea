from flask import Flask, request, jsonify
import os
import json
from pylint import epylint as lint
import flake8

app = Flask(__name__)

def analyze_code(repo_url):
    repo_name = repo_url.split('/')[-1].replace('.git', '')
    repo_dir = os.path.join(os.getcwd(), repo_name)

    # Análise com flake8
    flake8_style_guide = flake8.get_style_guide()
    flake8_report = flake8_style_guide.check_files([repo_dir])
    flake8_output = flake8_report.get_statistics()

    # Análise com pylint
    pylint_output, _ = lint.py_run(f'{repo_dir} --output-format=json', return_std=True)
    pylint_results = json.loads(pylint_output.read())

    analysis_result = {
        'flake8': '\n'.join(flake8_output),
        'pylint': pylint_results
    }
    return json.dumps(analysis_result, indent=2)

def generate_complex_code(repo_url):
    generated_code = f"Gerando código baseado no repositório: {repo_url}...\nCódigo Gerado: class ComplexCode()..."
    return generated_code

@app.route('/analyze', methods=['POST'])
def analyze():
    data = request.json
    repo_url = data.get('repo_url')
    if not repo_url:
        return jsonify({"error": "URL do repositório não fornecida"}), 400
    result = analyze_code(repo_url)
    return jsonify({"result": result})

@app.route('/generate', methods=['POST'])
def generate():
    data = request.json
    repo_url = data.get('repo_url')
    if not repo_url:
        return jsonify({"error": "URL do repositório não fornecida"}), 400
    result = generate_complex_code(repo_url)
    return jsonify({"result": result})

if __name__ == '__main__':
    app.run(debug=True)

