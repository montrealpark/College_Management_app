document.addEventListener('DOMContentLoaded', ()=>{
	
    var myDel = document.querySelector("#del");
	
    var myDelArea = document.querySelector("#deleteArea");
    
    myDel.addEventListener('click', (e)=>{
		myDelArea.removeAttribute("hidden");           
    })	
	
	var myAdd = document.querySelector("#addProgram");
	console.log(myAdd)
    var myAddArea = document.querySelector("#addArea");
    console.log(myAddArea)
    myAdd.addEventListener('click', (e)=>{
		myAddArea.removeAttribute("hidden"); 
		
    })
	
	
})		

