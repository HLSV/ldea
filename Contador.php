<?php
session_start();

define('TEMPO_ATIVO', 120); // 2 minutos
$arquivo_sessoes = 'usuarios_ativos.json';

// Verifica se a função existe antes de declarar
if (!function_exists('lerSessoes')) {
    function lerSessoes() {
        global $arquivo_sessoes;
        if (file_exists($arquivo_sessoes)) {
            $dados = file_get_contents($arquivo_sessoes);
            return json_decode($dados, true) ?? [];
        }
        return [];
    }
}

if (!function_exists('salvarSessoes')) {
    function salvarSessoes($sessoes) {
        global $arquivo_sessoes;
        file_put_contents($arquivo_sessoes, json_encode($sessoes));
    }
}

// ID único para cada sessão
$id_sessao = session_id();

// Carrega as sessões
$sessoes = lerSessoes();
$sessoes[$id_sessao] = time(); // Atualiza o tempo da sessão atual

// Remove sessões inativas
foreach ($sessoes as $sessao => $tempo) {
    if ($tempo < time() - TEMPO_ATIVO) {
        unset($sessoes[$sessao]);
    }
}

// Salva o estado atualizado das sessões
salvarSessoes($sessoes);
$usuarios_ativos = count($sessoes);

// Se chamado com `contar` via AJAX, retorna o JSON
if (isset($_GET['contar'])) {
    header('Content-Type: application/json');
    echo json_encode(['usuarios_ativos' => $usuarios_ativos]);
    exit;
}
?>