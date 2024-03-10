<!-- 
    Ce fichier représente la page de résultats de recherche de pokémons du site.
-->
<?php
require_once("head.php");
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des Pokémon</title>
</head>

<body>

    <input type="text" id="searchInput" placeholder="Recherche par nom...">
    <button onclick="searchPokemon()">Rechercher</button>

    <table id="pokemonTable">
        <tbody id="tableBody">
        </tbody>
    </table>

    <div id="pokemonDetails" style="display: none;">
        <h2>Détails du Pokémon</h2>
        <img id="pokemonImage" alt="Pokémon Image">
        <div id="pokemonStats"></div>
    </div>

    <script>
        const pokemonData = [
    {"name": 'Bulbizarre', "image": 'https://www.pokepedia.fr/images/d/db/Miniature_0001_EV.png'},
    {"name": 'Herbizarre', "image": 'https://www.pokepedia.fr/images/6/61/Miniature_0002_EV.png'},
    {"name": 'Florizarre', "image": 'https://www.pokepedia.fr/images/2/21/Miniature_0003_EV.png'},
    {"name": 'Salamèche', "image": 'https://www.pokepedia.fr/images/c/c1/Miniature_0004_EV.png'},
    {"name": 'Reptincel', "image": 'https://www.pokepedia.fr/images/2/24/Miniature_0005_EV.png'},
    {"name": 'Dracaufeu', "image": 'https://www.pokepedia.fr/images/4/42/Miniature_0006_EV.png'},
    {"name": 'Carapuce', "image": 'https://www.pokepedia.fr/images/3/3a/Miniature_0007_EV.png'},
    {"name": 'Carabaffe', "image": 'https://www.pokepedia.fr/images/3/3f/Miniature_0008_EV.png'},
    {"name": 'Tortank', "image": 'https://www.pokepedia.fr/images/c/c2/Miniature_0009_EV.png'},
    {"name": 'Chenipan', "image": 'https://www.pokepedia.fr/images/a/a3/Miniature_0010_DEPS.png'},
    {"name": 'Chrysacier', "image": 'https://www.pokepedia.fr/images/2/29/Miniature_0011_DEPS.png'},
    {"name": 'Papilusion', "image": 'https://www.pokepedia.fr/images/c/c0/Miniature_0012_DEPS.png'},
    {"name": 'Aspicot', "image": 'https://www.pokepedia.fr/images/e/ea/Miniature_0013_DEPS.png'},
    {"name": 'Coconfort', "image": 'https://www.pokepedia.fr/images/2/29/Miniature_0014_DEPS.png'},
    {"name": 'Dardargnan', "image": 'https://www.pokepedia.fr/images/d/d9/Miniature_0015_DEPS.png'},
    {"name": 'Roucool', "image": 'https://www.pokepedia.fr/images/c/c2/Miniature_0016_DEPS.png'},
    {"name": 'Roucoups', "image": 'https://www.pokepedia.fr/images/0/07/Miniature_0017_DEPS.png'},
    {"name": 'Roucarnage', "image": 'https://www.pokepedia.fr/images/d/d3/Miniature_0018_DEPS.png'},
    {"name": 'Rattata', "image": 'https://www.pokepedia.fr/images/b/b1/Miniature_0019_DEPS.png'},
    {"name": 'Rattatac', "image": 'https://www.pokepedia.fr/images/c/cd/Miniature_0020_DEPS.png'},
    {"name": 'Piafabec', "image": 'https://www.pokepedia.fr/images/7/7f/Miniature_0021_DEPS.png'},
    {"name": 'Rapasdepic', "image": 'https://www.pokepedia.fr/images/e/e9/Miniature_0022_DEPS.png'},
    {"name": 'Abo', "image": 'https://www.pokepedia.fr/images/e/e8/Miniature_0023_DEPS.png'},
    {"name": 'Arbok', "image": 'https://www.pokepedia.fr/images/8/8d/Miniature_0024_DEPS.png'},
    {"name": 'Pikachu', "image": 'https://www.pokepedia.fr/images/7/70/Miniature_0025_DEPS.png'},
    {"name": 'Raichu', "image": 'https://www.pokepedia.fr/images/0/05/Miniature_0026_DEPS.png'},
    {"name": 'Sabelette', "image": 'https://www.pokepedia.fr/images/5/5d/Miniature_0027_DEPS.png'},
    {"name": 'Sablaireau', "image": 'https://www.pokepedia.fr/images/9/94/Miniature_0028_DEPS.png'},
    {"name": 'Nidoran♀', "image": 'https://www.pokepedia.fr/images/d/db/Miniature_0029_DEPS.png'},
    {"name": 'Nidorina', "image": 'https://www.pokepedia.fr/images/1/1c/Miniature_0030_DEPS.png'},
    {"name": 'Nidoqueen', "image": 'https://www.pokepedia.fr/images/f/f3/Miniature_0031_DEPS.png'},
    {"name": 'Nidoran♂', "image": 'https://www.pokepedia.fr/images/6/6b/Miniature_0032_DEPS.png'},
    {"name": 'Nidorino', "image": 'https://www.pokepedia.fr/images/e/e6/Miniature_0033_DEPS.png'},
    {"name": 'Nidoking', "image": 'https://www.pokepedia.fr/images/c/cb/Miniature_0034_DEPS.png'},
    {"name": 'Mélofée', "image": 'https://www.pokepedia.fr/images/a/af/Miniature_0035_DEPS.png'},
    {"name": 'Mélodelfe', "image": 'https://www.pokepedia.fr/images/9/9b/Miniature_0036_DEPS.png'},
    {"name": 'Goupix', "image": 'https://www.pokepedia.fr/images/e/ef/Miniature_0037_DEPS.png'},
    {"name": 'Feunard', "image": 'https://www.pokepedia.fr/images/e/e3/Miniature_0038_DEPS.png'},
    {"name": 'Rondoudou', "image": 'https://www.pokepedia.fr/images/2/26/Miniature_0039_DEPS.png'},
    {"name": 'Grodoudou', "image": 'https://www.pokepedia.fr/images/1/19/Miniature_0040_DEPS.png'},
    {"name": 'Nosferapti', "image": 'https://www.pokepedia.fr/images/4/45/Miniature_0041_DEPS.png'},
    {"name": 'Nosferalto', "image": 'https://www.pokepedia.fr/images/2/26/Miniature_0042_DEPS.png'},
    {"name": 'Mystherbe', "image": 'https://www.pokepedia.fr/images/c/cb/Miniature_0043_DEPS.png'},
    {"name": 'Ortide', "image": 'https://www.pokepedia.fr/images/1/19/Miniature_0044_DEPS.png'},
    {"name": 'Rafflesia', "image": 'https://www.pokepedia.fr/images/1/19/Miniature_0045_DEPS.png'},
    {"name": 'Paras', "image": 'https://www.pokepedia.fr/images/c/cf/Miniature_0046_DEPS.png'},
    {"name": 'Parasect', "image": 'https://www.pokepedia.fr/images/9/94/Miniature_0047_DEPS.png'},
    {"name": 'Mimitoss', "image": 'https://www.pokepedia.fr/images/e/e8/Miniature_0048_DEPS.png'},
    {"name": 'Aéromite', "image": 'https://www.pokepedia.fr/images/3/31/Miniature_0049_DEPS.png'},
    {"name": 'Taupiqueur', "image": 'https://www.pokepedia.fr/images/d/d2/Miniature_0050_DEPS.png'},
    {"name": 'Triopikeur', "image": 'https://www.pokepedia.fr/images/0/0d/Miniature_0051_DEPS.png'},
    {"name": 'Miaouss', "image": 'https://www.pokepedia.fr/images/7/78/Miniature_0052_DEPS.png'},
    {"name": 'Persian', "image": 'https://www.pokepedia.fr/images/c/cd/Miniature_0053_DEPS.png'},
    {"name": 'Psykokwak', "image": 'https://www.pokepedia.fr/images/0/0b/Miniature_0054_DEPS.png'},
    {"name": 'Akwakwak', "image": 'https://www.pokepedia.fr/images/5/57/Miniature_0055_DEPS.png'},
    {"name": 'Férosinge', "image": 'https://www.pokepedia.fr/images/f/f2/Miniature_0056_DEPS.png'},
    {"name": 'Colossinge', "image": 'https://www.pokepedia.fr/images/8/8f/Miniature_0057_DEPS.png'},
    {"name": 'Caninos', "image": 'https://www.pokepedia.fr/images/3/3c/Miniature_0058_DEPS.png'},
    {"name": 'Arcanin', "image": 'https://www.pokepedia.fr/images/9/93/Miniature_0059_DEPS.png'},
    {"name": 'Ptitard', "image": 'https://www.pokepedia.fr/images/e/e5/Miniature_0060_DEPS.png'},
    {"name": 'Têtarte', "image": 'https://www.pokepedia.fr/images/3/3e/Miniature_0061_DEPS.png'},
    {"name": 'Tartard', "image": 'https://www.pokepedia.fr/images/8/8a/Miniature_0062_DEPS.png'},
    {"name": 'Abra', "image": 'https://www.pokepedia.fr/images/1/12/Miniature_0063_DEPS.png'},
    {"name": 'Kadabra', "image": 'https://www.pokepedia.fr/images/d/dc/Miniature_0064_DEPS.png'},
    {"name": 'Alakazam', "image": 'https://www.pokepedia.fr/images/f/fb/Miniature_0065_DEPS.png'},
    {"name": 'Machoc', "image": 'https://www.pokepedia.fr/images/d/da/Miniature_0066_DEPS.png'},
    {"name": 'Machopeur', "image": 'https://www.pokepedia.fr/images/1/1d/Miniature_0067_DEPS.png'},
    {"name": 'Mackogneur', "image": 'https://www.pokepedia.fr/images/8/8b/Miniature_0068_DEPS.png'},
    {"name": 'Chétiflor', "image": 'https://www.pokepedia.fr/images/7/78/Miniature_0069_DEPS.png'},
    {"name": 'Boustiflor', "image": 'https://www.pokepedia.fr/images/d/dc/Miniature_0070_DEPS.png'},
    {"name": 'Empiflor', "image": 'https://www.pokepedia.fr/images/9/94/Miniature_0071_DEPS.png'},
    {"name": 'Tentacool', "image": 'https://www.pokepedia.fr/images/4/4d/Miniature_0072_DEPS.png'},
    {"name": 'Tentacruel', "image": 'https://www.pokepedia.fr/images/4/48/Miniature_0073_DEPS.png'},
    {"name": 'Racaillou', "image": 'https://www.pokepedia.fr/images/e/e1/Miniature_0074_DEPS.png'},
    {"name": 'Gravalanch', "image": 'https://www.pokepedia.fr/images/9/9f/Miniature_0075_DEPS.png'},
    {"name": 'Grolem', "image": 'https://www.pokepedia.fr/images/c/c7/Miniature_0076_DEPS.png'},
    {"name": "Ponyta", "image": "https://www.pokepedia.fr/images/f/f3/Miniature_0077_DEPS.png"},
    {"name": "Galopa", "image": "https://www.pokepedia.fr/images/0/0c/Miniature_0078_DEPS.png"},
    {"name": "Ramoloss", "image": "https://www.pokepedia.fr/images/3/38/Miniature_0079_EV.png"},
    {"name": "Flagadoss", "image": "https://www.pokepedia.fr/images/4/4a/Miniature_0080_EV.png"},
    {"name": "Magnéti", "image": "https://www.pokepedia.fr/images/c/c3/Miniature_0081_EV.png"},
    {"name": "Magnéton", "image": "https://www.pokepedia.fr/images/a/a3/Miniature_0082_EV.png"},
    {"name": "Canarticho", "image": "https://www.pokepedia.fr/images/e/e8/Miniature_0083_DEPS.png"},
    {"name": "Doduo", "image": "https://www.pokepedia.fr/images/8/83/Miniature_0084_EV.png"},
    {"name": "Dodrio", "image": "https://www.pokepedia.fr/images/5/5e/Miniature_0085_EV.png"},
    {"name": "Otaria", "image": "https://www.pokepedia.fr/images/f/fe/Miniature_0086_EV.png"},
    {"name": "Lamantine", "image": "https://www.pokepedia.fr/images/f/ff/Miniature_0087_EV.png"},
    {"name": "Tadmorv", "image": "https://www.pokepedia.fr/images/f/f1/Miniature_0088_EV.png"},
    {"name": "Grotadmorv", "image": "https://www.pokepedia.fr/images/a/a6/Miniature_0089_EV.png"},
    {"name": "Kokiyas", "image": "https://www.pokepedia.fr/images/9/9c/Miniature_0090_EV.png"},
    {"name": "Crustabri", "image": "https://www.pokepedia.fr/images/8/8a/Miniature_0091_EV.png"},
    {"name": "Fantominus", "image": "https://www.pokepedia.fr/images/c/cf/Miniature_0092_EV.png"},
    {"name": "Spectrum", "image": "https://www.pokepedia.fr/images/9/95/Miniature_0093_EV.png"},
    {"name": "Ectoplasma", "image": "https://www.pokepedia.fr/images/1/13/Miniature_0094_EV.png"},
    {"name": "Onix", "image": "https://www.pokepedia.fr/images/4/4e/Miniature_0095_DEPS.png"},
    {"name": "Soporifik", "image": "https://www.pokepedia.fr/images/a/ac/Miniature_0096_EV.png"},
    {"name": "Hypnomade", "image": "https://www.pokepedia.fr/images/1/10/Miniature_0097_EV.png"},
    {"name": "Krabby", "image": "https://www.pokepedia.fr/images/8/87/Miniature_0098_DEPS.png"},
    {"name": "Krabboss", "image": "https://www.pokepedia.fr/images/6/67/Miniature_0099_DEPS.png"},
    {"name": "Voltorbe", "image": "https://www.pokepedia.fr/images/b/bb/Miniature_0100_EV.png"},
    {"name": "Electrode", "image": "https://www.pokepedia.fr/images/c/c4/Miniature_0101_EV.png"},
    {"name": "Noeunoeuf", "image": "https://www.pokepedia.fr/images/2/26/Miniature_0102_EV.png"},
    {"name": "Noadkoko", "image": "https://www.pokepedia.fr/images/8/8d/Miniature_0103_EV.png"},
    {"name": "Osselait", "image": "https://www.pokepedia.fr/images/1/16/Miniature_0104_DEPS.png"},
    {"name": "Ossatueur", "image": "https://www.pokepedia.fr/images/3/35/Miniature_0105_DEPS.png"},
    {"name": "Kicklee", "image": "https://www.pokepedia.fr/images/5/56/Miniature_0106_EV.png"},
    {"name": "Tygnon", "image": "https://www.pokepedia.fr/images/8/82/Miniature_0107_EV.png"},
    {"name": "Excelangue", "image": "https://www.pokepedia.fr/images/e/e6/Miniature_0108_DEPS.png"},
    {"name": "Smogo", "image": "https://www.pokepedia.fr/images/7/72/Miniature_0109_EV.png"},
    {"name": "Smogogo", "image": "https://www.pokepedia.fr/images/2/2a/Miniature_0110_EV.png"},
    {"name": "Rhinocorne", "image": "https://www.pokepedia.fr/images/7/71/Miniature_0111_EV.png"},
    {"name": "Rhinoféros", "image": "https://www.pokepedia.fr/images/e/e7/Miniature_0112_EV.png"},
    {"name": "Leveinard", "image": "https://www.pokepedia.fr/images/e/e0/Miniature_0113_EV.png"},
    {"name": "Saquedeneu", "image": "https://www.pokepedia.fr/images/2/28/Miniature_0114_DEPS.png"},
    {"name": "Kangourex", "image": "https://www.pokepedia.fr/images/8/87/Miniature_0115_EV.png"},
    {"name": "Hypotrempe", "image": "https://www.pokepedia.fr/images/5/5e/Miniature_0116_EV.png"},
    {"name": "Hypocean", "image": "https://www.pokepedia.fr/images/0/06/Miniature_0117_EV.png"},
    {"name": "Poissirène", "image": "https://www.pokepedia.fr/images/2/23/Miniature_0118_EV.png"},
    {"name": "Poissoroy", "image": "https://www.pokepedia.fr/images/d/db/Miniature_0119_EV.png"},
    {"name": "Stari", "image": "https://www.pokepedia.fr/images/9/93/Miniature_0120_EV.png"},
    {"name": "Staross", "image": "https://www.pokepedia.fr/images/d/dc/Miniature_0121_EV.png"},
    {"name": "M. Mime", "image": "https://www.pokepedia.fr/images/1/1d/Miniature_0122_EV.png"},
    {"name": "Insécateur", "image": "https://www.pokepedia.fr/images/1/12/Miniature_0123_EV.png"},
    {"name": "Lippoutou", "image": "https://www.pokepedia.fr/images/d/d1/Miniature_0124_EV.png"},
    {"name": "Élektek", "image": "https://www.pokepedia.fr/images/1/1d/Miniature_0125_EV.png"},
    {"name": "Magmar", "image": "https://www.pokepedia.fr/images/0/06/Miniature_0126_EV.png"},
    {"name": "Scarabrute", "image": "https://www.pokepedia.fr/images/f/f7/Miniature_0127_EV.png"},
    {"name": "Tauros", "image": "https://www.pokepedia.fr/images/1/1a/Miniature_0128_EV.png"},
    {"name": "Magicarpe", "image": "https://www.pokepedia.fr/images/5/50/Miniature_0129_DEPS.png"},
    {"name": "Léviator", "image": "https://www.pokepedia.fr/images/c/cb/Miniature_0130_EV.png"},
    {"name": "Lokhlass", "image": "https://www.pokepedia.fr/images/e/e9/Miniature_0131_EV.png"},
    {"name": "Métamorph", "image": "https://www.pokepedia.fr/images/4/4d/Miniature_0132_EV.png"},
    {"name": "Évoli", "image": "https://www.pokepedia.fr/images/1/1f/Miniature_0133_EV.png"},
    {"name": "Aquali", "image": "https://www.pokepedia.fr/images/c/c8/Miniature_0134_EV.png"},
    {"name": "Voltali", "image": "https://www.pokepedia.fr/images/9/95/Miniature_0135_EV.png"},
    {"name": "Pyroli", "image": "https://www.pokepedia.fr/images/0/0d/Miniature_0136_EV.png"},
    {"name": "Porygon", "image": "https://www.pokepedia.fr/images/5/57/Miniature_0137_EV.png"},
    {"name": "Amonita", "image": "https://www.pokepedia.fr/images/9/9d/Miniature_0138_EV.png"},
    {"name": "Amonistar", "image": "https://www.pokepedia.fr/images/2/25/Miniature_0139_EV.png"},
    {"name": "Kabuto", "image": "https://www.pokepedia.fr/images/2/2a/Miniature_0140_EV.png"},
    {"name": "Kabutops", "image": "https://www.pokepedia.fr/images/1/18/Miniature_0141_EV.png"},
    {"name": "Ptéra", "image": "https://www.pokepedia.fr/images/f/f2/Miniature_0142_EV.png"},
    {"name": "Ronflex", "image": "https://www.pokepedia.fr/images/3/3c/Miniature_0143_EV.png"},
    {"name": "Artikodin", "image": "https://www.pokepedia.fr/images/e/e5/Miniature_0144_EV.png"},
    {"name": "Électhor", "image": "https://www.pokepedia.fr/images/c/c9/Miniature_0145_EV.png"},
    {"name": "Sulfura", "image": "https://www.pokepedia.fr/images/e/e5/Miniature_0146_EV.png"},
    {"name": "Minidraco", "image": "https://www.pokepedia.fr/images/4/4f/Miniature_0147_EV.png"},
    {"name": "Draco", "image": "https://www.pokepedia.fr/images/7/78/Miniature_0148_EV.png"},
    {"name": "Dracolosse", "image": "https://www.pokepedia.fr/images/7/70/Miniature_0149_EV.png"},
    {"name": "Mewtwo", "image": "https://www.pokepedia.fr/images/d/d5/Miniature_0150_EV.png"},
    {"name": "Mew", "image": "https://www.pokepedia.fr/images/1/16/Miniature_0151_EV.png"},
    ];

        function displayPokemonDetails(pokemon) {
            document.getElementById('pokemonImage').src = pokemon.image;
            document.getElementById('pokemonStats').innerText = pokemon.stats;
            document.getElementById('pokemonDetails').style.display = 'block';
        }

        function searchPokemon() {
            const searchTerm = document.getElementById('searchInput').value.toLowerCase();
            const filteredPokemon = pokemonData.filter(pokemon => pokemon.name.toLowerCase().includes(searchTerm));

            const tableBody = document.getElementById('tableBody');
            tableBody.innerHTML = '';

            filteredPokemon.sort((a, b) => a.name.localeCompare(b.name));

            filteredPokemon.forEach(pokemon => {
                const row = tableBody.insertRow();
                const nameCell = row.insertCell(0);
                const imageCell = row.insertCell(1);

                nameCell.textContent = pokemon.name;

                const image = document.createElement('img');
                image.src = pokemon.image;
                image.alt = `${pokemon.name} Image`;
                image.addEventListener('click', () => displayPokemonDetails(pokemon));

                imageCell.appendChild(image);
            });
        }
    </script>

</body>

</html>