function tri(value) {
    fetch('http://localhost/Projet%20(API%20Pays)/tri.php?=id='+value)
        .then(function (response) {
            console.log()
            console.log('http://localhost/Projet%20(API%20Pays)/tri.php?=id=' + value);
      
        })
        .then(function (value) {
            console.log(value);
            console.log('http://localhost/Projet%20(API%20Pays)/tri.php?=id=' + value);
           
        
        
        })
    }