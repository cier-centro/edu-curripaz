<!--Enlaces de todas las páginas-->
<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
<link rel="stylesheet" href="http://52.37.84.217/edu-curripaz/css/condensed-fix.css">
<link rel="stylesheet" href="http://52.37.84.217/edu-curripaz/css/common-elements.css">
<link rel="stylesheet" href="http://52.37.84.217/edu-curripaz/css/curripazBaseStyle.css">

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>
<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>



<!--Scripts de todas las páginas-->
<script>
	var url = window.location.href;
	var topicViews = [93239, 93240, 93241, 93242, 93243, 93244];

	$( document ).ready(function() {
	    $( ".curripaz-panel .main-menu .pane-content > .menu > li:last-child > a" ).attr( "href", "javascript:void(0)" );
	    $( ".field-type-url a" ).attr( "target", "_blank" );
	    $( "a[type*='pdf']" ).attr( "target", "_blank" );
	    if (isViewShown(topicViews)) {
	       $( ".curripaz-panel .main-menu .pane-content > .menu > li:nth-child(5) a" ).addClass("active");
	    }
	    else {
	       $( ".curripaz-panel .main-menu .pane-content > .menu > li:nth-child(5) a" ).removeClass("active");
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

<!--Scripts para estructurar informacion completa de la propuesta-->
<script>
		const INFO_CONTAINER = ".curripaz-proposal-container";
		const FIELD_NAME = "field-name-field-";
		const SCHOOL_VIEW = "school-info";
		const TEACHER_VIEW = "teacher-info";
		const GRADE_TOPIC_VIEW = "grade-topic-info";
		const COMPETENCE_VIEW = "competence-info";
		const DESCRIPTION_VIEW = "description-info";
		const EXTRA_VIEW = "extra-info";
		const SCHOOL_DIV = '<div class="col-xs-12 col-sm-7 '+ SCHOOL_VIEW + '"></div>';
		const TEACHER_DIV = '<div class="col-xs-12 col-sm-5 '+ TEACHER_VIEW + '"><div class="field-label">Información del docente:</div></div>';
		const GRADE_TOPIC_DIV = '<div class="col-xs-12 '+ GRADE_TOPIC_VIEW + '"></div>';
		const COMPETENCE_DIV = '<div class="col-xs-12 '+ COMPETENCE_VIEW + '"></div>';
		const DESCRIPTION_DIV = '<div class="col-xs-12 col-sm-7 '+ DESCRIPTION_VIEW + '"></div>';
		const EXTRA_DIV = '<div class="col-xs-12 col-sm-5 '+ EXTRA_VIEW + '"><h3>Información adicional</h3></div>';

		if ($( INFO_CONTAINER )) {
				var infoStructure = '<div class="row first-info-row">' + SCHOOL_DIV + TEACHER_DIV + '</div>' + '<div class="row second-info-row">' + GRADE_TOPIC_DIV + COMPETENCE_DIV + '</div>' + '<div class="row third-info-row">' + DESCRIPTION_DIV + EXTRA_DIV + '</div>';
				$(infoStructure).insertAfter( $( INFO_CONTAINER + " ." + FIELD_NAME + 'calificacion-cpaz' ) );
				var infoArray = [
						[SCHOOL_VIEW, 'nombre-ie'],
						[SCHOOL_VIEW, 'nombre-sede'],
						[SCHOOL_VIEW, 'municipios-cp'],
						[TEACHER_VIEW, 'nombres-del-docente'],
						[TEACHER_VIEW, 'apellidos-del-docente'],
						[TEACHER_VIEW, 'correo-de-contacto-cpaz'],
						[TEACHER_VIEW, 'telefono-de-contacto'],
						[GRADE_TOPIC_VIEW, 'tema-de-la-propuesta'],
						[GRADE_TOPIC_VIEW, 'grado-de-la-propuesta'],
						[COMPETENCE_VIEW, 'competencia-ciudadana'],
						[COMPETENCE_VIEW, 'estandar-de-competencia'],
						[COMPETENCE_VIEW, 'desempeno-que-logra'],
						[DESCRIPTION_VIEW, 'descripcion-cpaz'],
						[EXTRA_VIEW, 'documento-de-la-propuesta'],
						[EXTRA_VIEW, 'videos-complementarios'],
						[EXTRA_VIEW, 'audio-complementario'],
						[EXTRA_VIEW, 'adjunto-complementario']
				];
				for (var i = 0; i < infoArray.length; i++) {
						putInfoInView(infoArray[i][0], infoArray[i][1]);
				}
				var accordionsBySession = getAccordionsBySession();
				$(accordionsBySession).insertAfter( $( '.third-info-row' ) );

		}

		function putInfoInView(view, info) {
				$( INFO_CONTAINER + " ." + view ).append ( $(INFO_CONTAINER + " ." + FIELD_NAME + info) );
		}

		function getAccordionsBySession() {
				var accordionsViewBegin = '<div class="panel-group col-xs-12" id="accordion">';
				var accordionBegin = '<div class="panel panel-default"><div class="panel-heading"><a data-toggle="collapse" data-parent="#accordion" href="#sesion';
				var accordionTitle = '">Sesión ';
				var accordionId = '</a></div><div id="sesion';
				var accordionBody = '" class="panel-collapse collapse"><div class="panel-body"> </div></div></div>';
				var accordionsViewFinal = '</div>';
				var accordions = "";
				var sessionsInView = $( "div[class*='sesion']" ).length;
				for (var sessionItem = 1; sessionItem < sessionsInView + 1; sessionItem++) {
						accordions += accordionBegin + sessionItem + accordionTitle + sessionItem + accordionId + sessionItem + accordionBody;
				}
				return accordionsViewBegin + accordions + accordionsViewFinal;
		}
</script>

<!--Scripts solo para gestor-->
<script>
       var unapprovedProposalButton = '<div class="unapproved-proposal-link"><a href="curriculospaz/93335" target="_blank">Ver secuencias sin publicadas</a>';
       $(unapprovedProposalButton).insertBefore( $( ".download-files" ) );
       var editButton = '<a class="edit-button" href="'+ getEditURL() +'">Editar propuesta</a>';
       $(editButton).insertAfter( $( '.third-info-row' ) );

       function getEditURL() {
           return window.location.href.replace("curriculospaz", "node")+"/edit";
     }
</script>
