
//Get all Delete Btn
var DelBtns = document.getElementsByClassName("Delete");

// Add Onclick
function clicked(ele){
    //communicate

    //Xmlhttp (ajax)----
    var data = {
        name: "danny",
        age: 34
    }
    var Request = new XMLHttpRequest();
    Request.onload = ()=>{
        alert(Request.responseText);
    }
    data = JSON.stringify(data)
    Request.open("POST","Api/");
    Request.send(data);

    //Fetch
    //jquery
    
    
    //Refresh || Remove
}
