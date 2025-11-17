    const password = document.getElementById("password");
    const eyeButtun = document.querySelector(".eye");
    let hide =true;


    eyeButtun.addEventListener("click", function(){
        if(hide){
            password.type="text";
            hide=false;
            eyeButtun.src="assets/cacher.png"
                      
        } else {
             password.type="password";
             hide=true;
             eyeButtun.src="assets/oeil.png"
    
        }
    
        
     })