    const password = document.getElementById("password");
    const eyeButtun = document.querySelector(".eye");
    let hide =true;


    eyeButtun.addEventListener("click", function(){
        if(hide){
            password.type="text";
            hide=false;
            console.log("ok");
            
        } else {
             password.type="password";
             hide=true;
             console.log("non");
        }
    
        
     })