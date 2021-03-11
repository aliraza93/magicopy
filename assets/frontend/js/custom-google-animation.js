var clicked = '';
var ph = $('#name').attr('dataValue')
var ph1 = $('#title').attr('dataValue')
var ph2 = $('#textarea').attr('dataValue')
	inputItem = $('#name')
	inputItem1 = $('#title')
	inputItem2 = $('#textarea')
	phCount = 0;

function randDelay(min, max) {
	return Math.floor(Math.random() * (max-min+1)+min);
}

function printLetter(string, el) {
	var arr = string.split(''),
		input = el,
		origString = string,
		curPlace = $(input).attr("value"),
		Value = curPlace + arr[phCount];
		
	setTimeout(function(){
		$(input).attr("value", Value);
		phCount++;
		if (phCount < arr.length) {
			printLetter(origString, input);
		}
	}, randDelay(20, 20));
}  

// function to init animation
function Value() {
	$(inputItem).attr("value", "");
	printLetter(ph, inputItem);
}

function Value1() {
	$(inputItem1).attr("value", "");
	printLetter(ph1, inputItem1);
}
function Value2() {
	$(inputItem2).attr("value", "");
	printLetter(ph2, inputItem2);
    var textareahtml = setInterval(() => {
        $(inputItem2).html($(inputItem2).attr('value'));
    }, 1);
    $('#reset').click(function(){
        clearInterval(textareahtml);
    })
    setTimeout(() => {
        clearInterval(textareahtml);
    }, 3000);
    
}


$('.main-wrap, .card-top').click(function(e){
    if (clicked == '') {
        clicked = "generated";
    	phCount = 0;
    	e.preventDefault();
    	Value();

        setTimeout(function(){phCount = 0; Value1(); }, 600);
        setTimeout(function(){phCount = 0; Value2(); }, 1400);
        setTimeout(() => {
            $('.keywords').addClass('shown');
        }, 2300);

        $('.playDemo').addClass('hide');
        $('#reset').removeClass('show');
        setTimeout(() => {
            $('#reset').addClass('show');
            $('.hit-generate').addClass('shown');
            $('.generate').addClass('active');
        }, 2400);
    }
});

$('#reset').click(function(e){
    phCount = 0;
    clicked = "";
    setTimeout(() => {
        phCount = 0;
    }, 10);
    e.preventDefault();
    $('#name').attr('value', '');
    $('#title').attr('value', '');
    $('#textarea').text('');
    $('.keywords').removeClass('shown');
    $('.playDemo').removeClass('hide');
    $('.hit-generate').removeClass('shown');
    $(this).removeClass('show');
    $('.content-box').removeClass('show');
    $('.generate').removeClass('active');
});

$('.hit-generate').click(function(){
    $('.content-box').addClass('show');
    $('.hit-generate').removeClass('shown');
});

$('.generate').click(function(){
    clicked = "generated";
if($('.generate').hasClass('active')){
        $('.content-box').addClass('show');
        $('.hit-generate').removeClass('shown');
    }
});