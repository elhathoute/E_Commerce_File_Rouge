$(document).ready(function(){
    // get all links in navbar
    const nav_links = $('#my-nav li.link');
    // add event
    nav_links.on('click',function(){
// remove active from all links
        // nav_links.removeClass('active');
// add active to current link
        // $(this).removeClass('link');
        console.log($(this))
    });



});// fin jquery
