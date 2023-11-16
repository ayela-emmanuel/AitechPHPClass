
//Get all Delete Btn
var DelBtns = document.getElementsByClassName("Delete");


// Add Onclick
function Delete(user){
    Request("POST", "Api/delete.php",
    (data)=>{
        alert(data.message);
        if(data.status){
            //refresh
            location.reload()
        }
    },
    JSON.stringify({user:user})
    )
}


function Edit(user){
    newName = prompt("Enter New Username For "+user);
    if(newName){
        Request("POST", "Api/update.php",
        (data)=>{
            alert(data.message);
            if(data.status){
                //refresh
                location.reload()
            }
        },
        JSON.stringify({
            user:user,
            new:newName
        })
        )
        return;
    }
    alert("Invalid Username");
}  















function Request(Method, Url,Callback = (d)=>{}, Data = null){
    var Request = new XMLHttpRequest();
    Request.onload = ()=>{
        console.log(Request.responseText)
        if(Request.status){
            data = JSON.parse(Request.responseText);
            Callback(data)
        } 
    }
    //data = JSON.stringify(data)
    Request.open(Method,Url);
    Request.send(Data);
}


