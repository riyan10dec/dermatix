

$( document ).ready(function() {
   $( "#play").click(function() {
	  $( "#quizzie .step1" ).addClass("current");
	  $("#play_start").hide();
	});
	
	setTimeout(function(){
		$('body').addClass('loaded');
		$('h1').css('color','#FFFFFF');
	}, 3000);
	
	$(".box_next").css("opacity","0");
	
	
	
});

var Answer_quiz=[
	{
		"answer":0,
		"desc":"",
	},
	{
		"answer":0,
		"desc":"",
	},
	{ 
		"answer":2,
		"desc":"Kamu sudah memahami kalau waktu terbaik untuk mulai mengobati bekas luka adalah segera setelah luka kamu kering dan sembuh",
	},
	{
	  "answer":3,
		"desc":"Kamu sudah memahami kalau sebelum melakukan terapi terhadap bekas luka, hal pertama yang harus kamu lakukan adalah membersihkan bekas luka dan mengeringkannya"
	},
	{
	  "answer":3,
		"desc":"Kamu sudah memahami bawah ukuran yang tepat untuk menggunakan gel Dermatix adalah sebesar biji jagung"
	},
	{
		"answer":1,
		"desc":"Kamu sudah memahami kalau cara terbaik mengoleskan Dermatix adalah tipis dan merata sepanjang bekas luka"
	},
	{
		"answer":2,
		"desc":"Kamu pun sudah memahami kalau Dermatix digunakan dua kali sehari"
	},
	{
		"answer":3,
		"desc":"Kamu sudah memahami kalau gel Dermatix akan kering dan boleh digunakan bersama kosmetik dalam waktu 2-3 menit"
	},
	{
		"answer":2,
		"desc":"Kamu sudah memahami bahwa bekas luka akan pudar dalam waktu 8 minggu sejak menggunakan Dermatix"
	},
	{
		"answer":1,
		"desc":"Kamu sudah memahami bahwa bekas luka yang bisa diterapi oleh Dermatix adalah bekas luka hipertrofik"
	},
	{
		"answer":4,
		"desc":"Kamu sudah memahami bahwa maksimal bekas luka yang dapat diterapi dengan Dermatix adalah bekas luka yang telah terjadi selama 2 tahun"
	},
	{
		"answer":2,
		"desc":"Kamu sudah memahami bahwa Dermatix boleh digunakan pada anak usia di atas 2 tahun"
	}
];


var Answer_quiz_False=[
	{
		"answer":0,
		"desc":"",
	},
	{
		"answer":0,
		"desc":"",
	},
	{ 
		"answer":"",
		"desc":"Sekarang, kamu belum tepat dalam menjawab pertanyaan ini. Sebab, waktu terbaik untuk mulai mengobati bekas luka adalah segera setelah luka kamu kering dan sembuh. ",
	},
	{
		"answer":"",
		"desc":"Sekarang, kamu belum tepat dalam menjawab pertanyaan ini. Sebab, hal pertama yang harus kamu lakukan adalah membersihkan bekas luka dan mengeringkannya"
	},
	{
	   "answer":"",
		"desc":"Sekarang, kamu belum tepat dalam menjawab pertanyaan ini. Sebab, ukuran yang tepat untuk menggunakan gel Dermatix adalah sebesar biji jagung"
	},
	{
		"answer":"",
		"desc":"Sekarang, kamu belum tepat dalam menjawab pertanyaan ini. Sebab, cara terbaik mengoleskan Dermatix adalah tipis dan merata sepanjang bekas luka"
	},
	{
		"answer":"",
		"desc":"Sekarang, kamu belum tepat dalam menjawab pertanyaan ini. Sebab, penggunaan Dermatix yang tepat adalah dua kali sehari"
	},
	{
		"answer":"",
		"desc":"Sekarang, kamu belum tepat dalam menjawab pertanyaan ini. Sebab, Dermatix akan kering dan boleh digunakan bersama kosmetik dalam waktu 2-3 menit"
	},
	{
		"answer":"",
		"desc":"Sekarang, kamu belum tepat dalam menjawab pertanyaan ini. Sebab, bekas luka akan pudar dalam waktu 8 minggu sejak menggunakan Dermatix"
	},
	{
		"answer":"",
		"desc":"Sekarang, kamu belum tepat dalam menjawab pertanyaan ini. Sebab, luka yang bisa diterapi oleh Dermatix adalah bekas luka hipertrofik"
	},
	{
		"answer":"",
		"desc":"Sekarang, kamu belum tepat dalam menjawab pertanyaan ini. Sebab, usia maksimal bekas luka yang dapat diterapi menggunakan Dermatix adalah 2 tahun"
	},
	{
		"answer":"",
		"desc":"Sekarang, kamu belum tepat dalam menjawab pertanyaan ini. Sebab, Dermatix baru boleh digunakan ketika seorang anak berusia di atas 2 tahun"
	}
];




    
// global variables
var quizSteps = $('#quizzie .quiz-step'),
    totalScore = 0,
	ArrAnswer=[];	

// for each step in the quiz, add the selected answer value to the total score
// if an answer has already been selected, subtract the previous value and update total score with the new selected answer value
// toggle a visual active state to show which option has been selected
quizSteps.each(function () {
    var currentStep = $(this),
        //ansOpts = currentStep.children('.quiz-answer');
        ansOpts = currentStep.find('.quiz-answer');
    // for each option per step, add a click listener
    // apply active class and calculate the total score
    ansOpts.each(function () {
		
        var eachOpt = $(this);
        eachOpt[0].addEventListener('click', check, false);
			
        function check() {
			
            var $this = $(this),
                value = $this.attr('data-quizIndex'),
                answerScore = parseInt(value),
				StepScore="",
				StepValue=$this.attr('data-step');
				
				if (StepValue !="intro"){
					$(".box_next").animate({'opacity': 1}, 500); 
				}
				
				
				
			
			if (currentStep.find('.active').length > 0) {
			
                var wasActive = currentStep.find('.active'),
                    oldScoreValue = wasActive.attr('data-quizIndex'),
                    oldScore = parseInt(oldScoreValue);
                // handle visual active state
                currentStep.find('.active').removeClass('active');
                $this.addClass('active');
                // handle the score calculation
                totalScore -= oldScoreValue;
                totalScore += answerScore;
                //calcResults(totalScore);
				
            } else {
				
				StepScore=answerScore;
                // handle visual active state
                $this.addClass('active');
                // handle score calculation
                totalScore += answerScore;
                
                // handle current step
				
				if (StepValue=="intro"){
				
					ArrAnswerNow=[
						{   
							"step": StepValue,
							"answer": StepScore
						}] ;
						
					ArrAnswer.push.apply(ArrAnswer, ArrAnswerNow);
					
					calcResults(totalScore,ArrAnswer);
					
					$(".box_next").css("opacity","0");

				
					updateStep(currentStep);
					
				}else{
					
					currentStep.find(".box_next").click(function(){
					
						ArrAnswerNow=[
							{   
								"step": StepValue,
								"answer": StepScore
							}] ;
							
						ArrAnswer.push.apply(ArrAnswer, ArrAnswerNow);
						
						calcResults(totalScore,ArrAnswer);
						
						$(".box_next").css("opacity","0");
						updateStep(currentStep);

						
					});
					
				}
				
				
            }
			

        }
    });
});

// show current step/hide other steps
function updateStep(currentStep) {
    if(currentStep.hasClass('current')){
       currentStep.removeClass('current');
       currentStep.next().addClass('current');
    }
}

// display scoring results
function calcResults(totalScore,ArrAnswer) {
    // only update the results div if all questions have been answered
    if (quizSteps.find('.active').length == quizSteps.length){
        var resultsTitle = $('#results .number_percentage'),
            resultsDesc = $('#results .teks_info'),
			True_number=0;
		
		ArrAnswer.forEach(function(entry,value) {
			//  !isnan berarti angka
			if (!isNaN(ArrAnswer[value].step)){
				if (ArrAnswer[value].answer==Answer_quiz[value].answer){
					window.desc_content=window.desc_content+"<li><div class='box_img'><img src='assets/images/layout/global/result/true.png'></div><span>"+Answer_quiz[value].desc+"</span></li>";
							
					True_number=True_number+1;
					title="";
					
				}else{
					window.desc_content=window.desc_content+"<li><div class='box_img'><img src='assets/images/layout/global/result/false.png'></div><span>"+Answer_quiz_False[value].desc+"</span></li>";
				}
			}
		});	
		
		percentage_true=True_number*100/10;
		
		if (percentage_true==100){
			window.title_result="Selamat jawaban kamu benar semua, kamu sudah memahami penanganan luka dengan menggunakan Dermatix sesuai anjuran pemakaian";
		}else{
			window.title_result="Bekas lukamu baru bisa memudar sekitar "+percentage_true+"%. Ini karena kamu kurang maksimal mengikuti anjuran pemakaian Dermatix ";
		}
			
		resultsTitle.html(percentage_true+"%");
        resultsDesc.html(title_result);
		
		
		
		
		$.ajax ( {
			type: "POST",
			url: "log_quiz_dermatix.php",
			data: {ArrAnswer:ArrAnswer},
			success: function (data) {
				
			},
			error: function (jqXHR, textSatus, err) {
				alert ('status:'+textSatus);
			}
		} );
		
		$("#result_end").show("slow");
	
		
		//$(".list_desc_result").html("<li>asd</li>");
		//console.log(desc);
		
    }
}