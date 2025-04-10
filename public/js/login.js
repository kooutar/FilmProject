const FormLogin = document.querySelector('#FormLogin');

FormLogin.addEventListener('submit', async function(e) {
    // e.preventDefault();

    const formData = new FormData(this);
    const donnees = {};
    localStorage.setItem('test', 'Hello');

    formData.forEach((value, key) => {
        donnees[key] = value;
    });

    try {
        const response = await fetch('http://127.0.0.1:8000/api/login', {
         method:'POST',
            headers: {
                'Content-Type': 'application/json',
                'Accept': 'application/json'
            },
            body: JSON.stringify(donnees)
        });

        const data = await response.json();

        console.log('Réponse API :', data); 
        localStorage.setItem('test', 'Hello');
        
        if (response.ok) {
            document.getElementById('result').innerText = 'Connexion réussie !';
            localStorage.setItem('token', data.token);
            console.log('Token stocké :', data.token);
            
                window.location.href = 'http://127.0.0.1:8000/home';
          
        } else {
            console.log('Erreur côté API');
            alert('Erreur : ' + (data.message || 'Erreur lors de la connexion'));
        }

        console.log('Données envoyées :', donnees);

    } catch (error) {
        console.error('Erreur attrapée :', error); // Affiche toute erreur réseau ou JS
    }
});
