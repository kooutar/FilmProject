<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulaire d'Inscription</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 font-sans">
    <div class="min-h-screen flex items-center justify-center py-12 px-4 sm:px-6 lg:px-8">
        <div class="max-w-md w-full bg-white rounded-lg shadow-lg p-8">
            <div class="text-center">
                <h2 class="mt-2 text-3xl font-extrabold text-gray-900">
                    Créer un compte
                </h2>
                <p class="mt-2 text-sm text-gray-600">
                    Ou <a href="#" class="font-medium text-indigo-600 hover:text-indigo-500">
                        connectez-vous à votre compte existant
                    </a>
                </p>
            </div>
            
            <form id='registreRorm' class="mt-8 space-y-6" action="post">
                <div class="rounded-md shadow-sm space-y-4">
                    <div>
                        <label for="name" class="block text-sm font-medium text-gray-700">full name</label>
                        <input id="name" name="name" type="text" autocomplete="email" required 
                            class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500">
                    </div>
                    
                    <div>
                        <label for="email" class="block text-sm font-medium text-gray-700">Adresse email</label>
                        <input id="email" name="email" type="email" autocomplete="email" required 
                            class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500">
                    </div>
                    
                    <div>
                        <label for="password" class="block text-sm font-medium text-gray-700">Mot de passe</label>
                        <input id="password" name="password" type="password" required 
                            class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500">
                    </div>
                    
                    <div>
                        <label for="confirm-password" class="block text-sm font-medium text-gray-700">Confirmer le mot de passe</label>
                        <input id="confirm-password" name="confirmPassword" type="password" required 
                            class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500">
                    </div>
                </div>
                
                <div class="flex items-center">
                    <input id="terms" name="terms" type="checkbox" required
                        class="h-4 w-4 text-indigo-600 focus:ring-indigo-500 border-gray-300 rounded">
                    <label for="terms" class="ml-2 block text-sm text-gray-900">
                        J'accepte les <a href="#" class="font-medium text-indigo-600 hover:text-indigo-500">conditions d'utilisation</a> et la <a href="#" class="font-medium text-indigo-600 hover:text-indigo-500">politique de confidentialité</a>
                    </label>
                </div>
                
                <div>
                    <button type="submit" class="group relative w-full flex justify-center py-2 px-4 border border-transparent text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                        S'inscrire
                    </button>
                </div>
            </form>
        </div>
    </div>
    <script src="{{ asset('js/registre.js')}}"></script>
</body>
</html>