function Confirm(){
    const password=document.querySelector('input[name=password]');
    const password_r=document.querySelector('input[name=password_r]');

    if(password_r.value === password.value ){
        password_r.setCustomValidity('');
    }
    else 
    {
        password_r.setCustomValidity('Passwords do not match!');
    }
    
    if(password.value.length<7){
        password.setCustomValidity('Password needs to be at least 7 characters long');
    }
    else{
        password.setCustomValidity('');
    }

}

function Lgth(){
    const username=document.querySelector('input[name=username]');
    
    if(username.value.length<5){
        username.setCustomValidity('Username needs to be at least 5 characters long');
    }
    else{
        username.setCustomValidity('');
    }

}

function f(id,counter){
   document.getElementById('customers').style.margin = "11% 5%";
   var i,j=0;
   var count = counter;
   for(i=0;i<counter;i++){
       switch(id){
           case 'u_image'+i:
               while(j<count){
                    document.getElementById('c-card'+j).style.display="none";
                    document.getElementById('uc-card'+j).style.display="none";
                    document.getElementById('u_edit'+j).style.display="none";
                    j++;
               }
               document.getElementById('c-card'+i).style.display="block";
               document.getElementById('uc-card'+i).style.display="block";
            }
   }

}

function admin_f(id,counter){
    document.getElementById('customers').style.margin = "11% 5%"; 
    var i,j=0;
    var count = counter;
    for(i=0;i<counter;i++){
        switch(id){
            case 'u_change'+i:
                while(j<count){
                     document.getElementById('u_edit'+j).style.display="none";
                     document.getElementById('c-card'+j).style.display="none";
                     document.getElementById('uc-card'+j).style.display="none";
                     j++;
                }
                document.getElementById('u_edit'+i).style.display="block";
             }
    }
 
 }









function del(counter)
{
    document.getElementById('customers').style.margin = "11% 30%"; 
    var i,j=0;;
    var count = counter;
    for(i=0;i<counter;i++)
    {
        while(j<count){
            document.getElementById('c-card'+j).style.display="none";
            document.getElementById('uc-card'+j).style.display="none";
            document.getElementById('u_edit'+j).style.display="none";
            j++;
        }
    }
}
