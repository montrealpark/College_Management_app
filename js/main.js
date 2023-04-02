document.addEventListener('DOMContentLoaded', ()=>{
	alert("test");
    var myType = document.querySelector("#abc");
    var myList1 = document.querySelectorAll(".AEC");
    var myList2 = document.querySelectorAll(".DEC");
    var myList3 = document.querySelectorAll(".DEP");
    var myList4 = document.querySelectorAll(".ASP");
    
    myType.addEventListener('click', (e)=>{
        if (myType.value=='AEC'){
            myList1.forEach(element => element.removeAttribute("hidden"));
            myList2.forEach(element => element.setAttribute("hidden", "hidden"));
            myList3.forEach(element => element.setAttribute("hidden", "hidden"));
            myList4.forEach(element => element.setAttribute("hidden", "hidden"));
        }
        else if(myType.value=='DEC'){
            myList2.forEach(element => element.removeAttribute("hidden"));
            myList1.forEach(element => element.setAttribute("hidden", "hidden"));
            myList3.forEach(element => element.setAttribute("hidden", "hidden"));
            myList4.forEach(element => element.setAttribute("hidden", "hidden"));
        }
        else if(myType.value=='DEP'){
            myList3.forEach(element => element.removeAttribute("hidden"));
            myList2.forEach(element => element.setAttribute("hidden", "hidden"));
            myList1.forEach(element => element.setAttribute("hidden", "hidden"));
            myList4.forEach(element => element.setAttribute("hidden", "hidden"));
        }else if(myType.value=='ASP'){
            myList4.forEach(element => element.removeAttribute("hidden"));
            myList3.forEach(element => element.setAttribute("hidden", "hidden"));
            myList2.forEach(element => element.setAttribute("hidden", "hidden"));
            myList1.forEach(element => element.setAttribute("hidden", "hidden"));
        }
            
    })	

       


})		
