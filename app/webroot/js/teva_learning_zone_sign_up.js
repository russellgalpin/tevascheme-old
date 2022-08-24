$(function(){
	/*add user fields when button clicked*/
	var addUser    = $('#add-user');
	var userHolder = $('.users');
	var userNumber = 0;
	addUser.click(function(){
		//console.log('click');
		userNumber ++;
		userHolder.append(
			//'<div class="user"><p class="margin-bottom"><label for="full-name-user-'+userNumber+'" class="block">Full Name</label><input type="text" name="full-name-user-'+userNumber+'" id="full-name-user-'+userNumber+'" class="block"></p><p class="margin-bottom"><label for="email-address-user-'+userNumber+'" class="block">Email Address</label><input type="text" name="email-address-user-'+userNumber+'" id="email-address-user-'+userNumber+'" class="block"></p></div>'
                        '<div class="user"><p class="margin-bottom"><label for="full-name-user-'+userNumber+'" class="block">Full Name</label><input type="text" name="full-name-user[]" id="full-name-user-'+userNumber+'" class="block"></p><p class="margin-bottom"><label for="email-address-user-'+userNumber+'" class="block">Email Address</label><input type="text" name="email-address-user[]" id="email-address-user-'+userNumber+'" class="block"></p></div>'
			);
	});
});