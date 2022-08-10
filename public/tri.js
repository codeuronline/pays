function tri(value,etat) {
  var file = 'http://localhost/Projet%20(API%20Pays)/save/geeks_data.json.php';  
  //var url = 'http://localhost/Projet%20(API%20Pays)/save/geeks_data.json.php?etat=' + etat + '&=id=' + value;
  
  fetch(file)
      .then(function (response) {
        console.log("response",response);
      return response.json();
    })
    
    .catch(function(error) {
      console.log(error)
    });
    }