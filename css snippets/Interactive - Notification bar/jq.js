var trigger = document.getElementById('trigger'),
    flash   = document.getElementById('flash');

var toggle = function () {
    flash.classList.toggle('active');
};

trigger.addEventListener('click', toggle);
flash.addEventListener('click', toggle);