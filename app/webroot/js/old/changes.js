$(function(){

	$('#yellow-bonus').on('mouseover',ShowBonus);
	$('#green-base').on('mouseover',ShowBase);

	function ShowBonus(){
		$('#base-graphic-1').animate({'left':0},function(){
			$('#base-graphic-2').animate({'top':0});
			$('#bonus-graphic').animate({'left':0});
		});
	}

	function ShowBase(){
		$('#base-graphic-1').animate({'left':0},function(){
			$('#base-graphic-2').animate({'top':0});
			$('#bonus-graphic').animate({'left':0});
		});
	}

	$('#yellow-bonus-dd').on('mouseover',ShowBonusDD);
	$('#green-base-dd').on('mouseover',ShowBaseDD);

	function ShowBonusDD(){
		$('#base-graphic-dd-1').animate({'left':0},function(){
			$('#base-graphic-dd-2').animate({'top':0});
			$('#bonus-graphic-dd').animate({'left':0});
		});
	}

	function ShowBaseDD(){
		$('#base-graphic-dd-1').animate({'left':0},function(){
			$('#base-graphic-dd-2').animate({'top':0});
			$('#bonus-graphic-dd').animate({'left':0});
		});
	}

	$('#base-t2').on('mouseover',ShowBaseT2);

	function ShowBaseT2(){
		$('#base-graphic-t2-1').animate({'left':0},function(){
		});
	}
	
	//info button teva one
	
	$('#base-info1').on('mouseover',ShowBaseinfo1);
	$('#base-info1').on('mouseleave',HideBaseinfo1);
	
	function ShowBaseinfo1(){
		$('#base-graphic-info-1').animate({'left':0},function(){
			$('#base-graphic-info-2').animate({'top':0});
		});
	}	
	function HideBaseinfo1(){
		$('#base-graphic-info-1').animate({'left':-600},function(){
		$("#base-graphic-info-1").stop( true, true );
		});
	}

	//info button teva two
	$('#base-info2').on('mouseover',ShowBaseinfo2);
	$('#base-info2').on('mouseleave',HideBaseinfo2);
	
	function ShowBaseinfo2(){
		$('#base-graphic-info-12').animate({'left':0},function(){
		});
	}	
	function HideBaseinfo2(){
		$('#base-graphic-info-12').animate({'left':-600},function(){
		$("#base-graphic-info-12").stop( true, true );
		});
	}	
	
	//info button teva three
	$('#base-info3').on('mouseover',ShowBaseinfo3);
	$('#base-info3').on('mouseleave',HideBaseinfo3);
	
	function ShowBaseinfo3(){
		$('#base-graphic-info-13').animate({'left':0},function(){
		});
	}	
	function HideBaseinfo3(){
		$('#base-graphic-info-13').animate({'left':-600},function(){
		$("#base-graphic-info-13").stop( true, true );
		});
	}		

});