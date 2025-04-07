const FormLogin=document.querySelector('#FormLogin');
FormLogin.addEventListener('submit', async function(e){
    e.preventDefault();
   const formData = new FormData(this);
   const donnees={};

   formData.forEach((value, key)=>{
      donnees[key]=value;
   });
    try {
        const response=  await fetch('http://127.0.0.1:8000/api/login',{
            method:'POST',
            headers:{
                'Content-Type': 'application/json',
            },
            body:{donnees},
           })
           const data = await response.json();

           if (response.ok) {
               alert('connexion réussie : ' + data.message);
           } else {
               alert('Erreur : ' + (data.message || 'Erreur lors de l\'inscription'));
           }
           console.log(donnees)
    } catch (error) {
        
    }
  


})