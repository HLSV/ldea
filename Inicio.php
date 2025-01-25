<?php
session_start();

// Inicializa o contador de visitas se não existir na sessão
if (!isset($_SESSION['visit_count'])) {
    $_SESSION['visit_count'] = 1;
} else {
    $_SESSION['visit_count'] += 1;
}

// Salva o valor do contador para uso no React
$visitCount = $_SESSION['visit_count'];
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="author" content="igor">
    <meta name="robots" content="index, follow">
    <link rel="canonical" href="https://ldea.wuaze.com/" />
    <link rel="icon" href="favicon321.ico" type="image/x-icon" class="icone">
    <title>Site Oficial da LDEA - Contador de Visitantes</title>

<!---anuncio ads site: adcash--->
<script type="text/javascript">
    aclib.runAutoTag({
        zoneId: 'jhur6agysh',
    });
</script>

    <script id="aclib" type="text/javascript" src="//acscdn.com/script/aclib.js"></script>
<script type="text/javascript">
    aclib.runAutoTag({
        zoneId: 'xep7qbhdsg',
    });
</script>

    <!--- anúncio finalizado--->

<!---anuncio de site ads: monetag--->
    <!--- anúncio finalizado--->

    
    <!-- Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-CM1W7N6PPL"></script>
    <script>
      window.dataLayer = window.dataLayer || [];
      function gtag(){dataLayer.push(arguments);}
      gtag('js', new Date());
      gtag('config', 'G-CM1W7N6PPL');
    </script>

    <!-- Tags adicionais -->
    <script src="https://alwingulla.com/88/tag.min.js" data-zone="112284" async data-cfasync="false"></script>
    <script src="//acscdn.com/script/aclib.js" id="aclib" type="text/javascript"></script>
    <script>
        aclib.runAutoTag({ zoneId: 'wax59ptcpd' });
    </script>

    <!-- Estilos -->
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; font-family: Arial, sans-serif; }
        body { display: flex; align-items: center; justify-content: center; height: 100vh; background-color: #282c34; color: #61dafb; overflow: hidden; }
        #loader { display: flex; flex-direction: column; align-items: center; position: absolute; animation: fadeOut 0.5s ease-in-out forwards; animation-delay: 5s; }
        @keyframes fadeOut { to { opacity: 0; visibility: hidden; } }
        #content { display: none; text-align: center; }
        .security-message { font-size: 14px; color: #ccc; }
    </style>
</head>
<body>
    <!-- Tela de carregamento -->
    <div id="loader">
        <h2>Carregando...</h2>
        <img src="https://via.placeholder.com/150x50.png?text=Minha+Fonte" alt="Fonte Imagem">
    </div>

    <!-- Conteúdo principal -->
    <div id="content">
        <h1>Bem-vindo ao site da LDEA</h1>
        <div id="visit-counter"></div>
        <div class="security-message">
            <p>Seu IP é confidencial e importante para sua segurança online.</p>
      
            <p>Navegue com segurança e anonimato. Novidades em breve:  cursos e ferramentas gratuitas, e muito mais!</p>
        </div>

        <!-- Novidades e links adicionais -->
        <div class="novidades">
            <p>Novidade (28/03/2024): Gerador de senha forte. <a href="Gerador_de_senha.html">Acesse aqui</a></p>
            <p>Novidade (03/08/2024): Treinamento de segurança digital. <a href="security-training-app/Index.html">Acesse aqui</a></p>
            <p>Novidade (05/04/2024): Plataforma de músicas. <a href="Musicas/Musicas.html">Acesse aqui</a></p>
            <p>
Novidade (05/04/2024)  plataforma de Boletim de segurança digital  <a href="Boletim de segurança digital/Boletim.html">click aqui</a>
            </p>
           <p>
Novidade (07/11/2024)  Comande o site com sua voz e explore temas e funcionalidades!  <a href="Site por voz.html">click aqui</a>
            </p>
  <p>
Novidade (07/11/2024) pix postPix_postagem_fã   <a href="Pix_postagem_fã.html">click aqui</a>
            </p>
              <p>
Novidade (25/01/2026) Blog :<a href="Blog.html">click aqui</a>
            </p>
        </div>
    </div>

    <!-- jQuery e React -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/react/17.0.2/umd/react.production.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/react-dom/17.0.2/umd/react-dom.production.min.js"></script>
    
    <!-- Script de carregamento e contador de visitas -->
    <script>
        $(document).ready(function () {
            // Exibe o conteúdo após 5 segundos
            setTimeout(function() {
                $('#loader').fadeOut();
                $('#content').fadeIn();
            }, 5000);

            // Componente React para exibir o contador
            function VisitCounter() {
                const [count, setCount] = React.useState(<?php echo $visitCount; ?>);
                return React.createElement('h2', null, `Visitantes: ${count}`);
            }

            ReactDOM.render(
                React.createElement(VisitCounter),
                document.getElementById('visit-counter')
            );
        });
    </script>
</body>
</html>
