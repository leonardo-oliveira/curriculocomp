$(document).ready(function(){
    $('#fullpage').fullpage({
      	sectionsIds: ['#home', '#about', '#hab', '#footer01'],
        anchors: ['firstPage', 'secondPage', 'thirdPage', ' fourthPage'],
        menu: '#navbar',
        fitToSection: true,
        continuousVertical: true,
        paddingTop: '3em'
    });
});
