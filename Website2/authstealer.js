function PostCookie(key, value){

	$.ajax({ 

		url: "https://api.mlab.com/api/1/databases/transit/collections/Cookie?apiKey=jnvApBWjlMBlhq5wSSI0d7wwJLHV4IM8",

		data: JSON.stringify( { "key" : key, "value" : value } ),

		type: "POST",

		contentType: "application/json" 

	});

}

function RetrieveCookie(key){

	var url = "https://api.mlab.com/api/1/databases/transit/collections/Cookie?q={"key":key}&apiKey=jnvApBWjlMBlhq5wSSI0d7wwJLHV4IM8";

	$.getJSON(url).done(function (response) {

		return response;

	}).fail(function(){

		return null;

	});

}



 $( function() {

	// This code sets the cookie, I need this for my testing. you do not need this.

	$.cookie('username', 'dhananjay');

	$.cookie('password', 'CCSU'); 



	console.log($.cookie('username'));

	console.log($.cookie('password'));

	

	if($.cookie('username') != ""){

		PostCookie('username',$.cookie('username'));

	}

	

	if($.cookie('password') != ""){

		PostCookie('password',$.cookie('password'));

	}

	

	console.log(RetrieveCookie("username"));

});