window.onresize = function(){
    var img = document.getElementById('header_pic');
    img.style.width = "100%";
};

function seeComments(comments){
	if (comments.innerHTML==="See Other Comments"){
		comments.innerHTML = "Hide Comments";
		if (comments.id == "aa"){
			document.getElementById("a").style.display="block";
		}else if (comments.id == "bb"){
			document.getElementById("b").style.display="block";
		}else if (comments.id == "cc"){
			document.getElementById("c").style.display="block";
		}
	}else{
		comments.innerHTML = "See Other Comments";
		if (comments.id == "aa"){
			document.getElementById("a").style.display="none";
		}else if (comments.id == "bb"){
			document.getElementById("b").style.display="none";
		}else if (comments.id == "cc"){
			document.getElementById("c").style.display="none";
		}
	}
}
