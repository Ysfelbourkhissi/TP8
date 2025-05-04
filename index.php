<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $utilisateur = $_POST['utilisateur'] ?? '';
    $motdepasse = $_POST['motdepasse'] ?? '';

    if ($utilisateur === 'AZIZA' && $motdepasse === 'AZIZA') {
        $_SESSION['utilisateur'] = $utilisateur;
        header('Location: bienvenue.php');
        exit();
    } else {
        $erreur = "Nom d'utilisateur ou mot de passe incorrect.";
    }
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <title>Connexion</title>
  <style>
    body {
      margin: 0;
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
      background: linear-gradient(to right, #00b4db, #0083b0);
      height: 100vh;
      display: flex;
      justify-content: center;
      align-items: center;
    }
    .login-box {
      background: white;
      padding: 50px 40px;
      border-radius: 15px;
      box-shadow: 0 10px 25px rgba(0, 0, 0, 0.2);
      width: 100%;
      max-width: 360px;
      animation: fadeIn 0.8s ease-in-out;
    }
    @keyframes fadeIn {
      from { opacity: 0; transform: translateY(-20px); }
      to { opacity: 1; transform: translateY(0); }
    }
    h2 {
      text-align: center;
      margin-bottom: 25px;
      color: #0083b0;
    }
    input[type="text"], input[type="password"] {
      width: 100%;
      padding: 12px;
      margin-bottom: 20px;
      border: 1px solid #ccc;
      border-radius: 8px;
      font-size: 16px;
      transition: border-color 0.3s;
    }
    input[type="text"]:focus, input[type="password"]:focus {
      border-color: #0083b0;
      outline: none;
    }
    button {
      width: 100%;
      padding: 12px;
      background-color: #0083b0;
      color: white;
      font-size: 16px;
      font-weight: bold;
      border: none;
      border-radius: 8px;
      cursor: pointer;
      transition: background-color 0.3s;
    }
    button:hover {
      background-color: #005f7f;
    }
    .error {
      color: red;
      text-align: center;
      margin-bottom: 15px;
      font-weight: bold;
    }
  </style>
</head>
<body>
  <div class="login-box">
    <h2>Connexion</h2>
    <?php if (isset($erreur)) : ?>
      <div class="error"><?php echo htmlspecialchars($erreur); ?></div>
    <?php endif; ?>
    <form method="post" action="">
      <input type="text" name="utilisateur" placeholder="Nom d'utilisateur" required>
      <input type="password" name="motdepasse" placeholder="Mot de passe" required>
      <button type="submit">Se connecter</button>
    </form>
  </div>
</body>
</html>
