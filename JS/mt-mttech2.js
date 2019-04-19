/* from header.php*/

var menu = document.getElementById('menu');
var nav = document.getElementById('mt-nav');
if (menu != null && nav != null) {
    menu.addEventListener('click', () => {
        if (nav.style.display === 'none') {
            nav.style.display = 'block';
        } else {
            nav.style.display = 'none';
        }
    });
}
/**for admin.php pages */
var btnCat = document.getElementById('mt-btn-add-cat');
if (btnCat != null) {
    btnCat.addEventListener('click', () => {
        location = "categorie.php"
    });
}


var videoType = document.getElementById('mt-type');
var videoPrice = document.getElementById('mt-price');

if (videoPrice != null && videoType != null) {

    videoType.addEventListener('input', (e) => {
        if (e.target.value === 'Pro') {
            videoPrice.disabled = false;
        } else {
            videoPrice.value = "0";
            videoPrice.disabled = true;

        }
    });
}

var search = document.getElementById('mt-search');
var blogRow = document.getElementsByClassName('mt-blog-row');
var videoRow = document.getElementsByClassName('mt-video-row');
// console.log(blogRow);
// console.log(videoRow);

if (search != null) {
    search.addEventListener('keyup', () => {
        var key1 = search.value;
        key1 = key1.toUpperCase();
        if (blogRow != null) {
            for (let i = 0; i < blogRow.length; i++) {
                var val1 = blogRow[i].getElementsByTagName('td')[1];
                val1 = val1.textContent.toUpperCase();
                var val2 = blogRow[i].getElementsByTagName('td')[2];
                val2 = val2.textContent.toUpperCase();
                if ((val1.indexOf(key1) > -1) || (val2.indexOf(key1) > -1)) {
                    blogRow[i].style.display = "";
                } else {
                    blogRow[i].style.display = "none";
                }

            }
        }

        if (videoRow != null) {
            for (let i = 0; i < videoRow.length; i++) {
                var val1 = videoRow[i].getElementsByTagName('td')[1];
                val1 = val1.textContent.toUpperCase();
                var val2 = videoRow[i].getElementsByTagName('td')[2];
                val2 = val2.textContent.toUpperCase();
                if ((val1.indexOf(key1) > -1) || (val2.indexOf(key1) > -1)) {
                    videoRow[i].style.display = "";
                } else {
                    videoRow[i].style.display = "none";
                }

            }
        }
    });
}

var checked1 = document.getElementById('mt-1-checked');
var viewChekbox = document.getElementsByClassName('mt-view-checkbox');
var box = document.getElementsByClassName('mt-view-box');

var checked2 = document.getElementById('mt-2-checked');

if (checked1 != null && box != null) {
    checked1.addEventListener('change', () => {

        if (checked1.checked === true) {
            for (let i = 0; i < box.length; i++) {
                box[i].checked = true;
            }
        } else {
            for (let i = 0; i < box.length; i++) {
                box[i].checked = false;
            }
        }
    })
}

if (checked2 != null && viewChekbox != null) {
    checked2.addEventListener('change', () => {

        if (checked2.checked === true) {
            for (let i = 0; i < viewChekbox.length; i++) {
                viewChekbox[i].checked = true;
            }
        } else {
            for (let i = 0; i < viewChekbox.length; i++) {
                viewChekbox[i].checked = false;
            }
        }
    })
}

/***This is for admin side slid animation  */

var slideMenu = $('.mt-dropdown');
// console.log(slideMenu);
if (slideMenu != null) {
    slideMenu.click(function () {
        $(this).next().slideToggle(500);
    });
}