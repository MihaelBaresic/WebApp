function validate(){
    var username=document.getElementById("username").value
    var password=document.getElementById("password").value

    if(username=="admin" && password =="user"){
        alert("Login succesfull!");
        window.location.href="C:\Users\Miho\VS CODE\WebApp\Index.html";
        return;
    }
    else
    {
        alert("Login failed!");
    }
}