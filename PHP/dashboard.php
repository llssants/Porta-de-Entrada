<?php
session_start();

if (!isset($_SESSION['usuario']) || !isset($_SESSION['perfil'])) {
    header("Location: index.php");
    exit;
}

$nome = $_SESSION['usuario'];
$perfil = $_SESSION['perfil'];

// Sistema de pontos
if (!isset($_SESSION['pontos'])) $_SESSION['pontos'] = 0;
if (!isset($_SESSION['ultimo_estudo'])) $_SESSION['ultimo_estudo'] = "";

if (isset($_POST['estudar'])) {
    $hoje = date("Y-m-d");
    if ($_SESSION['ultimo_estudo'] != $hoje) {
        $_SESSION['pontos'] += 10;
        $_SESSION['ultimo_estudo'] = $hoje;
        $msg = "🔥 Parabéns! Você estudou hoje e ganhou +10 pontos!";
    } else {
        $msg = "⚠️ Você já marcou estudo hoje! Volte amanhã 😉";
    }
}

if ($perfil === 'professor') {
    $linkPerfil = 'perfil_professor.php';
} elseif ($perfil === 'coordenador') {
    $linkPerfil = 'perfil_coordenador.php';
} else {
    $linkPerfil = 'perfil_aluno.php'; // padrão para aluno
}

?>


<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Game start</title>
    <link rel="stylesheet" href="../CSS/dashboard.css">
</head>
<body>

    <header>
        <h2>Porta de entrada</h2>
        <nav>
            <a href="../HTML/metodos.html">Métodos de Estudo</a>
            <a href="#">Universidades</a>
            <a href="#">Estudos</a>
            <a href="<?php echo $linkPerfil; ?>" class="btn">Perfil</a>
            <a href="logout.php">Sair</a>
        </nav>
    </header>
    <div class="container">
            <h1>Bem-vindo, <?php echo htmlspecialchars($nome); ?>! </h1>

            <p style="text-align:center;">
    Querido estudante, seja muito bem-vindo à nossa plataforma! <br><br>
    Esperamos que sua experiência aqui seja incrível e que você leve boas lembranças desse espaço. 
    Criamos este projeto como parte do nosso Projeto Integrador, com o objetivo de apoiar ainda mais os alunos da nossa instituição a 
    conquistarem seus sonhos. Se você é estudante do IF Sul de Minas, saiba que já estivemos no mesmo lugar que você. 
    Talvez não na mesma sala ou curso, mas com certeza compartilhamos desafios e experiências em comum. <br><br>

    Para facilitar sua jornada, aqui estão as regras do jogo: <br><br>

    <strong>1°</strong> Explore todas as páginas da plataforma — cada uma delas será essencial para você organizar sua rotina de estudos. <br>
    <strong>2°</strong> Na aba <em>Perfil</em>, você terá acesso à análise do seu desempenho: lá estarão as regras detalhadas e a 
    contabilização dos pontos. <br>
    <strong>3°</strong> Nunca se esqueça: este é um jogo, mas seus pontos não definem quem você é. Se em algum momento você se sentir mal, 
    acesse o bot na área de <em>Perfil</em> e converse conosco. Estamos aqui para ajudar! <br>
    <strong>4°</strong> Compartilhe experiências com seus colegas, seja pelo chat ou pelas postagens de conteúdos. <br>
    <strong>5°</strong> Aproveite ao máximo seus 3 anos de IF! Sim, serão desafiadores, mas também inesquecíveis e marcantes para a sua vida. <br><br>

    🚀 Estamos juntos nessa jornada. Agora é com você: estude, participe e divirta-se!
</p>



            <div class="pontos">
                <h3>Seus pontos: <?php echo $_SESSION['pontos']; ?> ⭐</h3>
                <form method="post">
                    <button class="btn" type="submit" name="estudar">Estudei hoje!</button>
                </form>
            </div>

            <?php if (!empty($msg)): ?>
                <p class="msg"><?php echo $msg; ?></p>
            <?php endif; ?>

        </div>

    <div class="container">
        <h1>Bem-vindo, <?php echo htmlspecialchars($nome); ?>! 👋</h1>

        <!-- <p>Seu perfil: <strong><?php echo ucfirst($perfil); ?></strong></p> -->


        <div class="pontos">
            <h3>Seus pontos: <?php echo $_SESSION['pontos']; ?> ⭐</h3>
            <form method="post">
                <button class="btn" type="submit" name="estudar">Estudei hoje!</button>
            </form>
        </div>

        <?php if (!empty($msg)): ?>
            <p class="msg"><?php echo $msg; ?></p>
        <?php endif; ?>

        <p style="text-align:center;">Estude todos os dias para acumular pontos e desbloquear conquistas! </p>
    </div>

</body>
</html>
