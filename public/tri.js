var value;
function tri(value) {
    fetch('https://restcountries.com/v3.1/all')
        .then(function (response) {
            console.log(response);
      
        })
        .then(function (value) {
            
            if (value = 0) {
                value = 1;
                return response.sort()
            } else {
                value = 0;
                return response.reverse();
            }
        
        })
    }