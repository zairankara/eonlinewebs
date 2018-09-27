/*
 * WP Quiz Plugin by MyThemeShop
 * https://mythemeshop.com/plugins/wp-quiz/
*/
// Universal
(function($, w){
	$(".wq_IsFlip").flip();
	
	$(document).on('click', '.wq_btn-continue', function(e){
		e.preventDefault();	
		
		var quizElem			= $(this).closest(".wq_quizCtr"),
			curQ				= parseInt(quizElem.data('current-question')),
			animation_in		= quizElem.data('transition_in'),
			animation_out		= quizElem.data('transition_out'),
			curQElem			= quizElem.find('.wq_questionsCtr > .wq_singleQuestionWrapper').eq(curQ),
			totalQuestionsNum	= parseInt(quizElem.data('questions')),
			questionsAnswered	= parseInt(quizElem.data('questions-answered')),
			questionPercent		= parseInt((questionsAnswered / totalQuestionsNum) * 100),
			quizTimer			= parseInt(quizElem.data('quiz-timer'));

		if(!curQElem.next().length){
			return;
		}

		curQElem.transition({
			animation: animation_out,
			onComplete : function() {
				curQElem.hide();
				curQElem.next().transition({
					animation: animation_in
				});
				quizElem.data('current-question', curQ+1);
			}
		});
		quizElem.find('.wq_quizProgressValue').animate({width: questionPercent + '%'}).text(questionPercent + '%');
		$('html, body').animate({scrollTop: quizElem.offset().top - 35}, 750 );
		
	});
	
	$(document).on('click', '.wq_shareFB', function(e){
		e.preventDefault();

		var quizElem	= $(this).closest(".wq_quizCtr"),
			shareURL	= quizElem.data('share-url'),
			resultElem	= quizElem.find('.wq_singleResultWrapper:visible'),
			description	= resultElem.find('.wq_resultDesc').text(),
			picture		= resultElem.find('.wq_resultImg').attr('src'),
			featured	= quizElem.data('featured-image'),
			excerpt		= quizElem.data('excerpt');
		
		if(resultElem.hasClass('wq_IsTrivia')){
			var correctAnswered		= parseInt(quizElem.data('correct-answered')),
				totalQuestionsNum	= parseInt(quizElem.data('questions')),
				shareText			= wq_l10n.captionTriviaFB.replace('%%score%%', correctAnswered).replace('%%total%%', totalQuestionsNum);
		}else if(resultElem.hasClass('wq_IsPersonality')){
			var shareText = resultElem.find('.wq_resultTitle').data('title');
		}else{
			var shareText = quizElem.data('post-title'); 
		}
		
		FB.ui({
            method: 'feed',
			link: shareURL,
            name: shareText,
			description: description ? description:excerpt,
			picture: picture ? picture:featured
		}, function(response){});

	});
	
	$(document).on('click', '.wq_shareTwitter', function(e){
		e.preventDefault();

		var quizElem	= $(this).closest(".wq_quizCtr"),
			shareURL	= quizElem.data('share-url'),
			resultElem	= quizElem.find('.wq_singleResultWrapper:visible');
		
		
		if(resultElem.hasClass('wq_IsTrivia')){
			var correctAnswered		= parseInt(quizElem.data('correct-answered')),
				totalQuestionsNum	= parseInt(quizElem.data('questions')),
				shareText			= wq_l10n.captionTriviaFB.replace('%%score%%', correctAnswered).replace('%%total%%', totalQuestionsNum);
		}else if(resultElem.hasClass('wq_IsPersonality')){
			var shareText = resultElem.find('.wq_resultTitle').data('title');
		}else{
			var shareText = quizElem.data('post-title'); 
		}
		window.open(
			"https://twitter.com/share?url=" + shareURL + '&text=' + encodeURI(shareText),
			"_blank",
			"width=500, height=300"
		);
	});

	$(document).on('click', '.wq_shareGP', function(e){
		e.preventDefault();

		var quizElem	= $(this).closest(".wq_quizCtr"),
			shareURL	= quizElem.data('share-url');

		window.open(
			"https://plus.google.com/share?url=" + shareURL,
			"_blank",
			"width=500, height=300"
		);
	});
	
	$(document).on('click', '.wq_shareVK', function(e){
        e.preventDefault();

        var quizElem	= $(this).closest(".wq_quizCtr"),
			shareURL	= quizElem.data('share-url');

        window.open(
            "http://vk.com/share.php?url=" + shareURL,
            "_blank",
            "width=500, height=300"
        );
    });
	
	$(document).on('click', '.wq_retakeQuizBtn', function(e){
        e.preventDefault();

        console.log('Retake start!');
		var quizElem		= $(this).closest(".wq_quizCtr"),
			animation_in	= quizElem.data('transition_in'),
			animation_out	= quizElem.data('transition_out'),
			questionLayout	= quizElem.data('question-layout');

        // Reset Quiz
        quizElem.data('current-question', 0);
        quizElem.data('questions-answered', 0);
        quizElem.data('correct-answered', 0);
        quizElem.find('.wq_quizProgressValue').animate({
            width: '0%'
        }).text('');
        //quizElem.find('.wq_questionsCtr').removeClass('transition hidden visible');

        // Reset All Questions
        quizElem.find('.wq_questionsCtr > .wq_singleQuestionWrapper').each(function(){
            $(this).find('.wq_triviaQuestionExplanation').removeClass('transition visible');
            $(this).find('.wq_triviaQuestionExplanation').hide();
            $(this).find('.wq_singleAnswerCtr').removeClass('wq_incorrectAnswer wq_correctAnswer chosen wq_answerSelected');
            $(this).find('.wq_ExplanationHead').removeClass('wq_correctExplanationHead wq_wrongExplanationHead');
			$(this).data('question-answered', 1);
			$(this).removeClass('wq_questionAnswered');
        });

        // Reset Results
        quizElem.find('.wq_singleResultWrapper, .wq_singleResultRow').data('points', 0);

        // Hide results and show first question 
        quizElem.find('.wq_questionsCtr').show();
        quizElem.find('.wq_singleResultWrapper.transition.visible').transition({
            animation: animation_out,
            onComplete : function() {
				quizElem.find('.wq_singleResultWrapper').hide();
				if(questionLayout == 'multiple'){	
					quizElem.find('.wq_questionsCtr > .wq_singleQuestionWrapper:last').transition({
						animation: animation_out,
						onComplete: function(){
							quizElem.find('.wq_questionsCtr > .wq_singleQuestionWrapper:eq(0)').transition({
								animation: animation_in
							});
						}
					});
				}
                // Reset Results
                quizElem.find('.wq_singleResultWrapper, .wq_resultsTable, .wq_shareResultCtr, .wq_resultsCtr, .wq_quizEmailCtr, .wq_quizForceShareCtr, .wq_retakeQuizBtn, .wq_retakeQuizCtr').removeClass('transition hidden visible');
                quizElem.find('.wq_resultExplanation, .wq_quizEmailCtr, .wq_quizForceShareCtr, .wq_retakeQuizBtn').hide();
            }
        });
		$('html, body').animate({scrollTop: quizElem.offset().top - 35}, 750 );
		$(this).removeClass('transition visible').hide();
    });
	
	$(document).ready(function(){
		function flip_desc_resize_and_ready(e){
			$('.wq_IsFlip .back').each(function(){
				var b_img = $(this).find('img').attr('src');
				var title_h = $(this).siblings('.item_top').height();
				$(this).css('top', title_h+'px');
				if(b_img == ""){
					var self = this
					$(this).siblings('.front').find('img').on('load',function(){
						$(self).find('.desc').height($(this).height());
					});
					if(e.type == 'resize'){
						var img_height = $(this).siblings('.front').find('img').height();
						$(this).find('.desc').height(img_height);
					}
				}
			
			})
		}
		$(window).on("resize", flip_desc_resize_and_ready);
		$(document).on("ready", flip_desc_resize_and_ready);
		$(window).trigger("resize");
	});
})(jQuery, window);

// Trivia
(function($, w){
	$(document).on('click', '.wq_singleQuestionWrapper:not(.wq_questionAnswered) .wq_singleAnswerCtr.wq_IsTrivia', function(e){
		e.preventDefault();
		
		var isCorrect			= parseInt($(this).data('crt')),
			questionElem		= $(this).closest('.wq_singleQuestionWrapper'),
			quizElem			= $(this).closest(".wq_quizCtr"),
			animation_in		= quizElem.data('transition_in'),
			animation_out		= quizElem.data('transition_out'),
			totalQuestionsNum	= parseInt(quizElem.data('questions')),
			questionsAnswered	= parseInt(quizElem.data('questions-answered')) + 1,
			questionPercent		= parseInt((questionsAnswered / totalQuestionsNum) * 100),
			correctAnswered		= parseInt(quizElem.data('correct-answered')),
			curQ				= parseInt(quizElem.data('current-question')),
			curQElem			= $('.wq_questionsCtr > .wq_singleQuestionWrapper').eq(curQ),
			questionTimer		= parseInt(quizElem.data('quiz-timer')),
			questionLayout		= quizElem.data('question-layout'),
			autoScroll			= parseInt(quizElem.data('auto-scroll'));
		//var displayExplanation=   parseInt( quizElem.data( 'display-answers' ) );
		
		questionElem.addClass('wq_questionAnswered');
		
		// Process Correct Answer
		if(isCorrect === 1){
			$(this).addClass('wq_correctAnswer chosen');
			questionElem.find('.wq_triviaQuestionExplanation .wq_ExplanationHead').text(wq_l10n.correct).addClass('wq_correctExplanationHead');
			correctAnswered++;
			quizElem.data('correct-answered', correctAnswered);
		}else{
			questionElem.find('.wq_singleAnswerCtr').each(function(){
				if( $(this).data('crt') == 1){
					$(this).addClass('wq_correctAnswer');
				}
			});
			$(this).addClass('wq_incorrectAnswer chosen');
			questionElem.find('.wq_triviaQuestionExplanation .wq_ExplanationHead').text(wq_l10n.wrong).addClass('wq_wrongExplanationHead');
			
		}
		
		if(questionLayout == 'single'){
			var curQ = parseInt(quizElem.data('current-question'));
			quizElem.data('current-question', curQ+1);
		}else{
			questionElem.find('.wq_continue').show();
		}
		
		quizElem.data('questions-answered', questionsAnswered);
		questionElem.find('.wq_triviaQuestionExplanation').show();
		if ( autoScroll === 1 ) {
			$('html, body').animate({scrollTop: questionElem.find('.wq_triviaQuestionExplanation').offset().top - 35}, 750 );
		}
		
		if(totalQuestionsNum === questionsAnswered){
			quizElem.find('.wq_quizProgressValue').animate({width: '100%'}).text('100%');
			processResults(quizElem, curQElem);
            return;
        }
	});
	
	function processResults(quizElem, curQElem){
		var animation_in		= quizElem.data('transition_in'),
			animation_out		= quizElem.data('transition_out'),
			correctAnswered		= parseInt(quizElem.data('correct-answered')),
			totalQuestionsNum 	= parseInt(quizElem.data('questions') ),
			displayExplanation	= parseInt(quizElem.data( 'display-answers' )),
			pid               	= parseInt(quizElem.data( 'quiz-pid' )),
			ajaxurl				= quizElem.data('ajax-url'),
			isRetakeable		= parseInt(quizElem.data('retake-quiz'));
		
		quizElem.find('.wq_continue').hide();
		
		var resultFound = false;

		quizElem.find('.wq_singleResultWrapper').each(function(){
			var min		= parseInt($(this).data('min')),
				max		= parseInt($(this).data('max')),
				_self	= this;

			if(correctAnswered >= min && correctAnswered <= max && !resultFound){
				resultFound	= true;
				var title = wq_l10n.captionTrivia.replace('%%score%%', correctAnswered).replace('%%total%%', totalQuestionsNum);
				$(this).find('.wq_resultScoreCtr').text(title);
				$(this).transition({ animation: animation_in});
				return;
			}
		});
		
		if(isRetakeable){
			quizElem.find('.wq_retakeQuizBtn').transition({animation: animation_in});
		}
	}
	
})(jQuery, window);

// Personality
(function($, w){
	$(document).on('click', '.wq_singleQuestionWrapper:not(.wq_questionAnswered) .wq_singleAnswerCtr.wq_IsPersonality', function(e){
		e.preventDefault();
		
		var quizElem			= $(this).closest('.wq_quizCtr'),
			resultsInfo			= JSON.parse( $(this).find('.wq_singleAnswerResultCtr').val() ),
			curQElem			= $(this).closest('.wq_singleQuestionWrapper'),
			isAnswered			= parseInt(curQElem.data('question-answered')),
			questionsAnswered	= parseInt(quizElem.data('questions-answered')),
			totalQuestionsNum	= parseInt(quizElem.data('questions')),
			animation_in		= quizElem.data('transition_in'),
			animation_out		= quizElem.data('transition_out'),
			pid					= parseInt(quizElem.data( 'quiz-pid' )),
			isRetakeable		= parseInt(quizElem.data('retake-quiz')),
			questionLayout		= quizElem.data('question-layout'),
			ajaxurl				= quizElem.data('ajax-url'),
			autoScroll			= parseInt(quizElem.data('auto-scroll'));
		
        curQElem.addClass('wq_questionAnswered');
		
		// Remove Any Points from Previous Selected Result if Any
		curQElem.find('.wq_singleAnswerCtr.wq_answerSelected').each(function(){
			var oldResInfo = JSON.parse($(this).find('.wq_singleAnswerResultCtr').val());

			if(oldResInfo !== "" )	{	
				oldResInfo.forEach(function(ele,ind,arr){
					var resultElem		= quizElem.find('.wq_singleResultWrapper[data-rid="' + ind + '"]');
					var resultPoints	= parseInt(resultElem.data('points')) - parseInt(ele.points);
					resultElem.data('points', resultPoints);
				});
			}
		});

		// Add new Points
		if(resultsInfo !== "") {
			resultsInfo.forEach(function(ele,ind,arr){
				var resultElem		= quizElem.find('.wq_singleResultWrapper[data-rid="' + ind + '"]'),
					resultPoints	= parseInt(resultElem.data('points')) + parseInt(ele.points);
				resultElem.data('points', resultPoints);
			});
		}

        // Increment Questions Answered
		if(isAnswered === 1){
			questionsAnswered++;
			curQElem.data( 'question-answered', 2 );
			quizElem.data('questions-answered', questionsAnswered);
		}

		//curQElem.find('.wq_singleAnswerCtr.wq_IsPersonality').removeClass('wq_answerSelected');
		$(this).addClass('wq_answerSelected');
		
		if(questionLayout == 'single'){
			var curQ = parseInt(quizElem.data('current-question'));
			quizElem.data('current-question', curQ+1);
			if(curQElem.next().length && autoScroll === 1){	
				$('html, body').animate({scrollTop: curQElem.next().offset().top - 75}, 750);
			}
		}else{
			curQElem.find('.wq_btn-continue').trigger('click');
			//$('html, body').animate({scrollTop: curQElem.find('.wq_continue').offset().top - 75}, 750 );
		}
		
		if(totalQuestionsNum !== questionsAnswered){
			return;
		}

		//quizElem.find('.wq_continue').hide();
		quizElem.find('.wq_quizProgressValue').animate({width: '100%'}).text('100%');
		$('html, body').animate({scrollTop: quizElem.find('.wq_resultsCtr').offset().top - 75}, 750);
		
		var resultElem	= null,
			maxPoints	= 0;

		quizElem.find('.wq_singleResultWrapper').each(function(){
			var resultPoints = parseInt($(this).data('points'));
			if(resultPoints > maxPoints){
				maxPoints	= resultPoints;
				resultElem	= this;
			}
		});

		var title = $(resultElem).find('.wq_resultTitle').data('title');
		$(resultElem).find('.wq_resultTitle').text(title);
		
		$(resultElem).transition({animation: animation_in});
		
		if( isRetakeable ){
			quizElem.find('.wq_retakeQuizBtn').transition({animation: animation_in});
		}
	});
})(jQuery, window);
