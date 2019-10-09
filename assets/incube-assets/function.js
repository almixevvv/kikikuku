/*
  INCUBE JAVASCRIPT


  1. Login Sliding Page

*/


/*
  1. Login Sliding Page
*/

function openLogin() {
  console.log('open the window now');
  $("#mobile-login-page").animate({right: '0px'}, 'slow');
}

function closeLogin() {
  console.log('close the window');
  $("#mobile-login-page").animate({left: '-430px'}, 'slow');

}
