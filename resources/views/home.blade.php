<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Document</title>
</head>
<body>
  <div id="film-container" style="display: flex; flex-wrap: wrap; gap: 20px;"></div>
</body>

</html>

<script>

document.addEventListener("DOMContentLoaded", async () => {
  const token = localStorage.getItem('token');
  console.log(token);

  const response = await fetch('http://127.0.0.1:8000/api/films', {
    method: 'GET',
    headers: {
      'Content-Type': 'application/json',
      'Authorization': 'Bearer ' + token
    }
  });

  if (response.ok) {
    const films = await response.json();
    const container = document.getElementById('film-container');
    console.log(films.Films);
    const tabOfFilms = films.Films; // 👈 accès au tableau
    
    tabOfFilms.forEach(film => {
      const card = document.createElement('div');
      card.style.border = '1px solid #ccc';
      card.style.padding = '15px';
      card.style.borderRadius = '8px';
      card.style.width = '250px';
      card.style.backgroundColor = '#f9f9f9';
      card.style.boxShadow = '0 2px 5px rgba(0,0,0,0.1)';

      // Si tu as un champ image, affiche-le
      if (film.image) {
        const img = document.createElement('img');
        img.src = film.image; // Assure-toi que le chemin est correct
        img.style.width = '100%';
        img.style.height = '150px';
        img.style.objectFit = 'cover';
        img.style.borderRadius = '5px';
        card.appendChild(img);
      }

      const title = document.createElement('h3');
      title.innerText = film.titre;
      card.appendChild(title);

      const desc = document.createElement('p');
      desc.innerText = film.description;
      card.appendChild(desc);

      container.appendChild(card);
    });

  } else {
    console.log('Erreur lors de la récupération des films');
  }
});



</script>