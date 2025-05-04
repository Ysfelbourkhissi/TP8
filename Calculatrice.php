<?php
$resultat = null;

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Récupération des valeurs du formulaire
    $nombre1 = isset($_POST['nombre1']) ? $_POST['nombre1'] : 0;
    $nombre2 = isset($_POST['nombre2']) ? $_POST['nombre2'] : 0;
    $operation = $_POST['operation'];

    // Traitement des opérations
    switch ($operation) {
        case 'addition':
            $resultat = $nombre1 + $nombre2;
            break;
        case 'soustraction':
            $resultat = $nombre1 - $nombre2;
            break;
        case 'multiplication':
            $resultat = $nombre1 * $nombre2;
            break;
        case 'division':
            if ($nombre2 != 0) {
                $resultat = $nombre1 / $nombre2;
            } else {
                $resultat = "Erreur : Division par zéro";
            }
            break;
        default:
            $resultat = "Opération non valide";
            break;
    }
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <title>Calculatrice PHP</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gradient-to-r from-blue-500 via-purple-500 to-pink-500 h-screen flex items-center justify-center font-sans leading-normal tracking-normal">
  <div class="container mx-auto p-6 bg-white shadow-lg rounded-lg max-w-lg w-full transform transition duration-500 ease-in-out hover:scale-105">
    <h2 class="text-3xl font-extrabold text-center text-gray-800 mb-8 drop-shadow-lg">Calculatrice PHP</h2>
    
    <!-- Formulaire de calcul -->
    <form action="" method="POST" class="space-y-6">
      <div class="mb-4">
        <label for="nombre1" class="block text-gray-700 text-lg">Premier Nombre :</label>
        <input type="number" name="nombre1" class="w-full p-4 mt-2 border-2 border-gray-300 rounded-lg focus:outline-none focus:ring-4 focus:ring-blue-300 transition duration-200" required>
      </div>
      
      <div class="mb-4">
        <label for="nombre2" class="block text-gray-700 text-lg">Deuxième Nombre :</label>
        <input type="number" name="nombre2" class="w-full p-4 mt-2 border-2 border-gray-300 rounded-lg focus:outline-none focus:ring-4 focus:ring-blue-300 transition duration-200" required>
      </div>

      <div class="mb-4">
        <label for="operation" class="block text-gray-700 text-lg">Choisir l'opération :</label>
        <select name="operation" class="w-full p-4 mt-2 border-2 border-gray-300 rounded-lg focus:outline-none focus:ring-4 focus:ring-blue-300 transition duration-200" required>
          <option value="addition">Addition</option>
          <option value="soustraction">Soustraction</option>
          <option value="multiplication">Multiplication</option>
          <option value="division">Division</option>
        </select>
      </div>

      <button type="submit" class="w-full bg-indigo-600 text-white p-4 rounded-lg shadow-md hover:bg-indigo-700 transition duration-300 ease-in-out transform hover:scale-105">Calculer</button>
    </form>

    <!-- Affichage du résultat -->
    <?php if ($resultat !== null): ?>
      <div class="mt-6 p-4 bg-green-500 text-white rounded-lg text-center text-xl font-semibold shadow-lg">
        <strong>Résultat :</strong> <?php echo htmlspecialchars($resultat); ?>
      </div>
    <?php endif; ?>
  </div>
</body>
</html>
