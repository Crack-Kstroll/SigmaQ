document.addEventListener('DOMContentLoaded', function() {
    
    var elems = document.querySelectorAll('.sidenav');
    var instances = M.Sidenav.init(elems);

    var elems = document.querySelectorAll('.slider');
    var instances = M.Slider.init(elems);

    var elems = document.querySelectorAll('.modal');
    var instances = M.Modal.init(elems);

    var elems = document.querySelectorAll('.carousel');
    var instances = M.Carousel.init(elems,{duration: 500});

    var elems = document.querySelectorAll('.collapsible');
    var instances = M.Collapsible.init(elems);
    
    var elems = document.querySelectorAll('.select');
    var instances = M.FormSelect.init(elems);

    var elems = document.querySelectorAll('.dropdown-trigger');
    var instances = M.Dropdown.init(elems);

    var instance = M.Carousel.init({
        fullWidth: true,
        indicators: true
      });

     
      
    
      
});



