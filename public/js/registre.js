const registreRorm=document.querySelector('#registreRorm');

registreRorm.addEventListener('submit', async function(e){
    e.preventDefault();
    const formData = new FormData(this); 
    const donnee={};

    formData.forEach((value, key) => {
        donnee[key] = value;
    });
    
    try {
        const response = await fetch('http://127.0.0.1:8000/api/registre',{
           method:'POST',
           headers:{
               'Content-Type': 'application/json',
           },
           body:JSON.stringify(donnee)
        })

        const data = await response.json();

        if (response.ok) {
            alert('Inscription réussie : ' + data.message);
        } else {
            alert('Erreur : ' + (data.message || 'Erreur lors de l\'inscription'));
        }
    } catch (error) {
        console.error('Erreur:', error);
    }

  console.log(donnee);
})