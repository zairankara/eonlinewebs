$(function(){
            $('#datetimepicker').datetimepicker({
                locale: 'pt-br',
                viewMode: 'days',
                format: 'YYYY-MM-DD',
                widgetPositioning: {
		            horizontal: 'auto',
		            vertical: 'bottom'
		         }
            });
            $('#datetimepicker2').datetimepicker({
                locale: 'pt-br',
                viewMode: 'days',
                format: 'YYYY-MM-DD',
                widgetPositioning: {
		            horizontal: 'auto',
		            vertical: 'bottom'
		         }
            });
            $('#fecha').focusout(function(){
            	$('#formb').submit();
            	console.log($('#fecha').val());
            });
            $('#fecha2').focusout(function(){
            	$('#formb2').submit();
            	console.log($('#fecha2').val());
            });
            $('#t1').click(function(){    
            	localStorage.setItem('tab','t1'); 
            });
            $('#t2').click(function(){    
            	localStorage.setItem('tab','t2'); 
            });
            $('#t3').click(function(){
            	localStorage.setItem('tab','t3'); 
            });
            $('#pagination').twbsPagination({
		        totalPages: <?php echo $total_paginas; ?>,
		        visiblePages: 7,
		        href: '?pagina={{number}}',
		        first:'Primeiro',
		        prev:'Anterior',
		        next:'Próximo',
		        last:'Último'
		    });
		    $('#pagination_s2').twbsPagination({
		        totalPages: <?php echo $total_pags_s2; ?>,
		        visiblePages: 7,
		        href: '?pag_s2={{number}}',
		        first:'Primeiro',
		        prev:'Anterior',
		        next:'Próximo',
		        last:'Último'
		    });
		    $('#pagination_s3').twbsPagination({
		        totalPages: <?php echo $total_pags_s3; ?>,
		        visiblePages: 7,
		        href: '?pag_s3={{number}}',
		        first:'Primeiro',
		        prev:'Anterior',
		        next:'Próximo',
		        last:'Último'
		    });
        });