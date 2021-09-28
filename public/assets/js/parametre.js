(function(){

	function getCookie(cname) {
			  let name = cname + "=";
			  let decodedCookie = decodeURIComponent(document.cookie);
			  let ca = decodedCookie.split(';');
			  for(let i = 0; i < ca.length; i++) {
			    let c = ca[i];
			    while (c.charAt(0) == ' ') {
			      c = c.substring(1);
			    }
			    if (c.indexOf(name) == 0) {
			      return c.substring(name.length, c.length);
			    }
			  }
			  return "";
			}

	var styles=document.querySelectorAll('[data-value="preso"]');
	var longueur=styles.length;
	for(var j=0;j<longueur;j++)
	{
		styles[j].addEventListener('click',function(e){
			var check=this.querySelector('[type="radio"]');
			// creation une variable de cookie
			document.cookie="theme="+this.dataset.couleur;
		},false);
	}

	window.addEventListener('load',function(){
		let them=getCookie('theme');
	var htm=document.querySelectorAll('html')[0];
		htm.setAttribute('class',them);
		// alert(htm.nodeName);
		var styles=document.querySelectorAll('[data-value="preso"]');
	var longueur=styles.length;
	for(var j=0;j<longueur;j++)
	{
		if(styles[j].dataset.couleur==them)
		{
			var select=styles[j].querySelector('[type="radio"]');
			select.checked=true;
		}
	}

	},false)
})();