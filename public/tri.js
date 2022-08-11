function tri(value,etat) {
  if (value == 1 || value == 0)
    console.log(value, etat);
    var file = 'http://localhost/Projet%20(API%20Pays)/save/geeks_data.json.php';  
  //var url = 'http://localhost/Projet%20(API%20Pays)/save/geeks_data.json.php?etat=' + etat + '&=id=' + value;
  function classerSelonPositionDes(a, b) {
    return a.position < b.position;
  }
  function classerSelonPositionAsc(a, b) {
    return a.position > b.position;
  }

  fetch(file)
      .then(function (response) {
        let objetJson = response.json()
        console.log("response", objetJson);
        if (value == 1) 
          return objetJson.sort(classerSelonPositionDes()).json();    
        if (value == 0)
          return objetJson.sort(classerSelonPositionAsc()).json();      
    })
    .catch(function(error) {
      console.log(error)
    });
    }