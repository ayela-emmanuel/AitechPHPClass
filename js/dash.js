
//Get all Delete Btn
var DelBtns = document.getElementsByClassName("Delete");


// Add Onclick
function clicked(ele){
    //communicate

    //Xmlhttp (ajax)----
    var Request = new XMLHttpRequest();
    Request.onload = ()=>{
        data = JSON.parse(Request.responseText);
        console.log(data)
        if(data.status){
            document.getElementById("data").innerHTML = data.message
        }else{
            alert(data.message)
        }
        
    }
    //data = JSON.stringify(data)
    Request.open("GET","Api/");
    Request.send();

    //Fetch
    //jquery
    
    
    //Refresh || Remove
}
