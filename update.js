var div = document.getElementById('hide');
var display = 0;
var button = document.getElementById('btn');

// hide container by button
function hideShow() {
    if (display == 1) {
        div.style.display = 'block';
        display = 0;
        button.style.width= '20%';
        button.style.backgroundColor='red';
        button.style.display='white';
    } else {
        div.style.display = 'none'; 
        display = 1;
        button.style.width= '20%';
        button.style.backgroundColor='red';
        button.style.display='white';
    }
}
