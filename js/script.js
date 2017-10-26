function disableBtnVote(btn){
	
	//Fonction JQuery (obligatoire)
	jQuery.fn.extend({
		disable: function(state) {
			return this.each(function() {
				this.disabled = state;
			});
		}
	});
	
	//Ma fonction
	$(btn).on('mouseover', function(){
		$(this).css({ opacity: 1 });
		$(this).disable(true);
	});

}


