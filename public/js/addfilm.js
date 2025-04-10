const FormAddFilm=document.getElementById('FormAddFilm');

FormAddFilm.addEventListener('submit', async function(e){
    e.preventDefault();
    const formData= new FormData(this);
    const donnees={};
    formData.forEach((value,key)=>{
      donnees[key]=value;
    });
    try {
            const response= await fetch('http://127.0.0.1:8000/api/addfilm',{
            method:'POST',
            headers:{
                'Content-Type': 'application/json',
            },
            body:JSON.stringify(donnees)
            })
            
            // const data =  response.json();
            if(response.ok){
                console.log('daz kolchi mzzzzzzzzzzzzn');
            } 
    } catch (error) {
         console.log(error);
    }
    



})