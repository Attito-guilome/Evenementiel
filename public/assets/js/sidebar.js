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

			var left=document.querySelectorAll('[class="bx bx-arrow-to-left"]')[0];
			left.addEventListener('click',function(e){
				var sidebar=document.querySelector('#sidebar');
					var side=sidebar.getAttribute('class');
					document.cookie = 'sidebar='+side;

				// alert(side);
			},false);
			window.onload=function(){
				var sidebar=document.querySelector('#sidebar');
				let sidebarr = getCookie("sidebar");
				var classs='wrapper toggled';
				if(sidebarr=='wrapper sidebar-hovered')
				{
					classs='wrapper toggled';
				}
				else if(sidebarr=='wrapper toggled sidebar-hovered')
				{
					classs='wrapper';
				}
				sidebar.setAttribute('class',classs);
				
			}
			var leftt=document.querySelectorAll('[class="sidebar-wrapper"]')[0];
			leftt.addEventListener('mouseover',function(e){
				// alert();
				var sid=document.querySelector('#sidebar');
					var side=sid.getAttribute('class');
				var sidebar=document.querySelector('#sidebar');
				if(side=='wrapper')
				{
					sidebar.setAttribute('class','wrapper sidebar-hovered');
				}
				else if(side=='wrapper toggled')
				{
					sidebar.setAttribute('class','wrapper toggled sidebar-hovered');
				}
			},false);

			var leftleave=document.querySelectorAll('[class="sidebar-wrapper"]')[0];
			leftleave.addEventListener('mouseleave',function(e){
				var sid=document.querySelector('#sidebar');
					var side=sid.getAttribute('class');
					if(side=='wrapper toggled sidebar-hovered')
					{
						sidebar.setAttribute('class','wrapper toggled');
					}
					else if(side=='wrapper sidebar-hovered')
					{
						sidebar.setAttribute('class','wrapper');

					}
			},false);
		})();