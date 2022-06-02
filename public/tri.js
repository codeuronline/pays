function tri(value,etat) {
    var url = 'http://localhost/Projet%20(API%20Pays)/tri.php?etat=' + etat + '&=id=' + value;
    fetch(url)
    .then(function(response) {
      return response.json();
    })
    
    .catch(function(error) {
      console.log(error)
    });
    }