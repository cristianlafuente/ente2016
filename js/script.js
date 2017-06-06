 var ajax_arry=[];
 var ajax_index =0;
 var sctp = 100;
 $(function(){
   $('#loading').show();
 $.ajax({
	     url:"pages-hoteles2.php",
                  type:"POST",
                  data:"actionfunction=showData&pagina=1",
        cache: false,
        success: function(response){
		   $('#loading').hide();
		  $('#contenido').html(response);
		   
		}
		
	   });
	$(window).scroll(function(){
       
	   var height = $('#contenido').height();
	   var scroll_top = $(this).scrollTop();
	   if(ajax_arry.length>0){
	   $('#loading').hide();
	   for(var i=0;i<ajax_arry.length;i++){
	     ajax_arry[i].abort();
	   }
	}
	   var pagina = $('#contenido').find('.nextpage').val();
	   var isload = $('#contenido').find('.isload').val();
	   
	     if ((($(window).scrollTop()+document.body.clientHeight)==$(window).height()) && isload=='true'){
		   $('#loading').show();
	   var ajaxreq = $.ajax({
	     url:"pages-hoteles2.php",
                  type:"POST",
                  data:"actionfunction=showData&pagina="+pagina,
        cache: false,
        success: function(response){
		   $('#contenido').find('.nextpage').remove();
		   $('#contenido').find('.isload').remove();
		   $('#loading').hide();
		   
		  $('#contenido').append(response);
		 
		}
		
	   });
	   ajax_arry[ajax_index++]= ajaxreq;
	   
	   }
	return false;
	
 if($(window).scrollTop() == $(window).height()) {
       alert("bottom!");
   }
	});

});
	  