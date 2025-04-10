<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter un Film</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-50 font-sans text-gray-800">
    <div class="min-h-screen flex flex-col">
        <!-- En-tête -->
        <header class="bg-indigo-700 text-white shadow-lg">
            <div class="container mx-auto px-4 py-4 flex justify-between items-center">
                <h1 class="text-2xl font-bold">CinéBase</h1>
                <nav>
                    <ul class="flex space-x-4">
                        <li><a href="#" class="hover:text-indigo-200">Accueil</a></li>
                        <li><a href="#" class="hover:text-indigo-200">Films</a></li>
                        <li><a href="#" class="font-bold underline">Ajouter un film</a></li>
                    </ul>
                </nav>
            </div>
        </header>

        <!-- Contenu principal -->
        <main class="container mx-auto px-4 py-8 flex-grow">
            <div class="max-w-4xl mx-auto bg-white rounded-lg shadow-md p-8">
                <h2 class="text-2xl font-bold mb-6 text-center">Ajouter un nouveau film</h2>
                
                <form id="FormAddFilm" method="POST" class="space-y-6">
                    <!-- Titre -->
                    <div>
                        <label for="titre" class="block text-sm font-medium text-gray-700">Titre du film <span class="text-red-600">*</span></label>
                        <input type="text" id="titre" name="titre" required
                            class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500">
                    </div>
                    
                    <!-- Description -->
                    <div>
                        <label for="description" class="block text-sm font-medium text-gray-700">Description <span class="text-red-600">*</span></label>
                        <textarea id="description" name="description" rows="4" required
                            class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500"></textarea>
                    </div>
                    
                    <!-- Image -->
                    <div>
                        <label for="image" class="block text-sm font-medium text-gray-700">Image / Affiche du film</label>
                        <div class="mt-1 flex items-center">
                            <span class="inline-block h-32 w-24 rounded-md overflow-hidden bg-gray-100 border border-gray-300">
                                <img src="/api/placeholder/240/320" alt="Prévisualisation" class="h-full w-full object-cover" />
                            </span>
                            <input type="file" id="image" name="image" accept="image/*" 
                                class="ml-5 py-2 px-3 border border-gray-300 rounded-md shadow-sm text-sm leading-4 font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                        </div>
                    </div>
                    
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                        <!-- Durée -->
                        <div>
                            <label for="duree" class="block text-sm font-medium text-gray-700">Durée (minutes) <span class="text-red-600">*</span></label>
                            <input type="number" id="duree" name="duree" min="1" required
                                class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500">
                        </div>
                        
                        <!-- Genre -->
                        <div>
                            <label for="genre" class="block text-sm font-medium text-gray-700">Genre <span class="text-red-600">*</span></label>
                            <select id="genre" name="genre" required
                                class="mt-1 block w-full pl-3 pr-10 py-2 text-base border border-gray-300 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 rounded-md">
                                <option value="">Sélectionner un genre</option>
                                <option value="action">Action</option>
                                <option value="comedie">Comédie</option>
                                <option value="drame">Drame</option>
                                <option value="fantastique">Fantastique</option>
                                <option value="horreur">Horreur</option>
                                <option value="science-fiction">Science-fiction</option>
                                <option value="thriller">Thriller</option>
                                <option value="animation">Animation</option>
                                <option value="documentaire">Documentaire</option>
                            </select>
                        </div>
                        
                        <!-- Âge minimum -->
                        <div>
                            <label for="age_minimum" class="block text-sm font-medium text-gray-700">Âge minimum</label>
                            <select id="age_minimum" name="ageMin" 
                                class="mt-1 block w-full pl-3 pr-10 py-2 text-base border border-gray-300 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 rounded-md">
                                <option value="tous">Tous publics</option>
                                <option value="10">10+</option>
                                <option value="12">12+</option>
                                <option value="16">16+</option>
                                <option value="18">18+</option>
                            </select>
                        </div>
                    </div>
                    
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <!-- Réalisateur -->
                        <div>
                            <label for="realisateur" class="block text-sm font-medium text-gray-700">Réalisateur</label>
                            <input type="text" id="realisateur" name="realisateur"
                                class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500">
                        </div>
                        
                        <!-- Date de sortie -->
                        <div>
                            <label for="date_sortie" class="block text-sm font-medium text-gray-700">Date de sortie</label>
                            <input type="date" id="date_sortie" name="date_sortie"
                                class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500">
                        </div>
                    </div>
                    
                    <!-- Acteurs principaux -->
                    <div>
                        <label for="acteurs" class="block text-sm font-medium text-gray-700">Acteurs principaux</label>
                        <input type="text" id="acteurs" name="acteurs" placeholder="Nom des acteurs séparés par des virgules"
                            class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500">
                    </div>
                    
                    <!-- Options supplémentaires -->
                    <div class="flex flex-wrap gap-4">
                        <div class="flex items-start">
                            <input id="est_3d" name="est_3d" type="checkbox" class="h-4 w-4 text-indigo-600 focus:ring-indigo-500 border-gray-300 rounded">
                            <label for="est_3d" class="ml-2 block text-sm text-gray-700">Disponible en 3D</label>
                        </div>
                        <div class="flex items-start">
                            <input id="est_vf" name="est_vf" type="checkbox" class="h-4 w-4 text-indigo-600 focus:ring-indigo-500 border-gray-300 rounded">
                            <label for="est_vf" class="ml-2 block text-sm text-gray-700">Version française</label>
                        </div>
                        <div class="flex items-start">
                            <input id="est_vo" name="est_vo" type="checkbox" class="h-4 w-4 text-indigo-600 focus:ring-indigo-500 border-gray-300 rounded">
                            <label for="est_vo" class="ml-2 block text-sm text-gray-700">Version originale</label>
                        </div>
                    </div>
                    
                    <div class="pt-5 flex justify-end space-x-3">
                        <button type="button" 
                            class="bg-white py-2 px-4 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                            Annuler
                        </button>
                        <button type="submit" 
                            class="bg-indigo-600 py-2 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                            Ajouter le film
                        </button>
                    </div>
                </form>
            </div>
        </main>
        
        <!-- Pied de page -->
        <footer class="bg-gray-800 text-white py-6">
            <div class="container mx-auto px-4 text-center">
                <p>&copy; 2025 CinéBase - Tous droits réservés</p>
            </div>
        </footer>
    </div>
    <script src="{{ asset('js/addfilm.js')}}"></script>
</body>
</html>