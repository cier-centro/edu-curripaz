<!--Enlaces de todas las páginas-->
<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
<link rel="stylesheet" href="http://52.37.84.217/edu-curripaz/css/condensed-fix.css">
<link rel="stylesheet" href="http://52.37.84.217/edu-curripaz/css/common-elements.css">
<link rel="stylesheet" href="http://52.37.84.217/edu-curripaz/css/curripazBaseStyle.css">

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>
<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>

<!--Botones panel izquiero de inicio-->
<div class="quick-access-links">
	<div class="activa-link">
			<a href="http://aprende.colombiaaprende.edu.co/es/activatuciudadania" target="_blank">
			</a>
	</div>
	<div class="send-proposal-link">
			<a href="http://aprende.colombiaaprende.edu.co/es/node/add/formulario-de-curriculos-para-la" target="_blank">
					Enviar propuesta de secuencia didáctica
			</a>
	</div>
	<div class="proposal-link">
			<a href="curriculospaz/93331" target="_blank">
					Ver propuestas
			</a>
	</div>
	<div class="unapproved-proposal-link">
			<a href="http://aprende.colombiaaprende.edu.co/es/node/add/formulario-de-curriculos-para-la" target="_blank">
					Ver propuestas no aprobadas
			</a>
	</div>
	<div class="download-files">
	    <h1>Información por temas</h1>
	    <div class="download-button">
	        <a href="#">Convivencia pacifica</a>
	    </div>
	    <div class="download-button">
					<a href="#">Diversidad e identidad</a>
	    </div>
	    <div class="download-button">
					<a href="#">Memoria historica y reconciliación</a>
	    </div>
	    <div class="download-button">
					<a href="#">Participación ciudadana</a>
	    </div>
	    <div class="download-button">
	        <a href="#">Desarrollo sostenible</a>
	    </div>
	    <div class="download-button">
	        <a href="#">Ética cuidado y decisiones</a>
	    </div>
	</div>
</div>


<!--Scripts de todas las páginas-->
<script>
	var url = window.location.href;
	var topicViews = [93239, 93240, 93241, 93242, 93243, 93244];

	$( document ).ready(function() {
	    if (isViewShown(topicViews)) {
	       $( ".curripaz-panel .main-menu .pane-content > .menu > li:nth-child(4) a" ).addClass("active");
	    }
	    else {
	       $( ".curripaz-panel .main-menu .pane-content > .menu > li:nth-child(4) a" ).removeClass("active");
			}
			if (isUrlEndsWithCurriculospaz("/curriculospaz")) {
				 $( ".curripaz-panel .main-menu .pane-content > .menu li a" ).first().addClass("active");
			}
			else {
				 $( ".curripaz-panel .main-menu .pane-content > .menu li a" ).first().removeClass("active");
			}
	});

	function isViewShown(views) {
	    for (i = 0; i < views.length; i++) {
	         if (url.includes(views[i])) {
	             return true;
	         }
	    }
	}

	function isUrlEndsWithCurriculospaz(finalWord) {
			return url.endsWith(finalWord);
	}
</script>
