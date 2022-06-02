function tri(value,etat) {
    fetch('http://localhost/Projet%20(API%20Pays)/tri.php?etat='+etat+'&=id='+value)
        .then(function (response) {
            console.log(reponse)
            //console.log('http://localhost/Projet%20(API%20Pays)/tri.php?=id=' + value);
      
        })
        .then(function (value) {
            console.log(value);
            //console.log('http://localhost/Projet%20(API%20Pays)/tri.php?=id=' + value);
           
        
        
        })
    }