<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nueva nota</title>
    <link href="https://fonts.googleapis.com/css2?family=Caveat:wght@600&family=Inter:wght@400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="Notitas.css">
</head>
<body>

    <nav class="menu">
        <span class="menu-logo">NOTITAS</span>
        <div class="menu-links">
            <a href="Index.php">Ver tablón</a>
            <a href="#">Más pronto</a>
        </div>
    </nav>

    <main class="contenedor">
        <div class="tarjeta">
            <h1>Escribe tu nota</h1>
            <textarea id="texto" maxlength="45" placeholder="¿Qué quieres dejar en el tablón?"></textarea>
            <button id="btnGuardar">Pegar en el tablón</button>
        </div>
    </main>

    <script src="ScriptNot.js"></script>
</body>
</html>