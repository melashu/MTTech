
var serverRequest;
if (window.XMLHttpRequest) {
    serverRequest = new XMLHttpRequest();
} else {
    serverRequest = new ActiveXObject('Microsoft.XMLHTTP');
}
/*
for registering users 
*/
var regForm = document.getElementById('mt-reg-form');

function getValueById(id) {
    return document.getElementById(id).value;
}
if (regForm != null) {
    regForm.addEventListener('submit', (e) => {
        e.preventDefault();

        var formData = new FormData();
        formData.append('fullName', getValueById('mt-full'));
        formData.append('email', getValueById('mt-email'));
        formData.append('sex', getValueById('mt-sex'));
        formData.append('phone', getValueById('mt-phone'));
        formData.append('username', getValueById('mt-un'));
        formData.append('password', getValueById('mt-pass'));
        serverRequest.open('POST', 'mt-register.php', true);
        serverRequest.onreadystatechange = function () {
            if (serverRequest.readyState === 4 && serverRequest.status === 200) {

                var message = document.getElementById('mt-reg-mess');
                if (serverRequest.responseText === 'ok') {
                    message.innerText = "You welcome from this time you are the memeber of MTTech.com ";
                    message.style.color = "green";
                    document.getElementById('mt-reg-link').style.display = "inline";
                    regForm.reset();
                } else {
                    message.innerText = "Failed, there may be error try again please and ";
                    message.style.color = "orange";
                    message.style.fontFamily = "'Times New Roman', Times, serif";
                }
            }
        }
        serverRequest.send(formData);
    });
}


var catRegForm = document.getElementById("mt-admin-reg-cat");
if (catRegForm != null) {
    catRegForm.addEventListener("submit", (e) => {
        e.preventDefault();
        var formData = new FormData();
        formData.append('categorie', getValueById('mt-cat'));
        serverRequest.open('POST', 'mt-categorie.php', true);
        serverRequest.onreadystatechange = function () {
            if (serverRequest.readyState === 4 && serverRequest.status === 200) {
                var message = document.getElementById('mt-reg-mess');
                if (serverRequest.responseText === 'ok') {
                    message.innerText = "Successfuly add post categorie ";
                    message.style.color = "green";
                    setTimeout(() => {
                        location = "categorie.php";//to reload the page
                    }, 2000);
                    catRegForm.reset();
                } else {
                    message.innerText = "Failed, to add post categorie try again please ";
                    message.style.color = "red";
                }
            }
        }
        serverRequest.send(formData);

    });

}
// CKEDITOR.instances['mt-content'].setData("WYSWGY");

var addPost = document.getElementById("mt-add-blogpost");

if (addPost != null) {
    addPost.addEventListener("submit", (e) => {
        e.preventDefault();
        // console.log(getValueById('mt-content'));
        var data = $('#mt-insert-update').val();
        var photo = document.getElementById('mt-photo').files[0];
        var formData = new FormData();
        formData.append('title', getValueById('mt-title'));
        formData.append('cat', getValueById('mt-cat'));
        formData.append('status', getValueById('mt-status'));
        // formData.append('content', getValueById('mt-content'));
        formData.append('username', getValueById('mt-username'));
        if (!photo) {
        } else {
            formData.append('photo', photo);
        }
        var content = CKEDITOR.instances['mt-content'].getData();
        formData.append('content', content);
        serverRequest.open('POST', 'mt-blogpost.php', true);
        if (data === 'insert') {
            formData.append('blog', 'insert');
            serverRequest.onreadystatechange = () => {
                if (serverRequest.readyState === 4 && serverRequest.status === 200) {
                    var message = document.getElementById('mt-upload-mess');
                    if (serverRequest.responseText === 'ok') {
                        message.innerText = "Successfuly add blog post  ";
                        message.style.color = "green";
                        message.style.display = "block";
                        setTimeout(() => {
                            location = "blogpost.php";
                        }, 2500);

                    } else if (serverRequest.responseText === 'image') {
                        message.innerText = "Please add only jpg, png, gif image type try... again ";
                        message.style.display = "block";
                        message.style.color = "red";
                        document.getElementById('mt-photo').style.border = "1px solid rgb(219, 76, 76)";

                    } else {
                        message.innerText = "Failed, " + serverRequest.responseText;
                        message.style.color = "red";
                        message.style.display = "block";

                    }
                }
            }
            serverRequest.send(formData);

        } else if (data === 'update') {
            formData.append('blog', 'update');
            formData.append('pid', getValueById('mt-pid'));
            serverRequest.onreadystatechange = () => {
                if (serverRequest.readyState === 4 && serverRequest.status === 200) {
                    var message = document.getElementById('mt-upload-mess');
                    if (serverRequest.responseText === 'ok') {
                        message.innerText = "Successfuly update blog post  ";
                        message.style.color = "green";
                        message.style.display = "block";
                        setTimeout(() => {
                            location = "blogpost.php";
                        }, 2500);

                    } else if (serverRequest.responseText === 'image') {
                        message.innerText = "Please add only jpg, png, gif image type try... again ";
                        message.style.display = "block";
                        message.style.color = "red";
                        document.getElementById('mt-photo').style.border = "1px solid rgb(219, 76, 76)";

                    } else {
                        message.innerText = "Failed, " + serverRequest.responseText;
                        message.style.color = "red";
                        message.style.display = "block";

                    }
                }
            }
            serverRequest.send(formData);

        }

    });
}


var updateCat = document.getElementById('mt-admin-update-cat');
if (updateCat != null) {
    updateCat.addEventListener('submit', (e) => {

        e.preventDefault();
        var formData = new FormData();
        formData.append('cname', getValueById('mt-cat-update'));
        formData.append('cid', getValueById('mt-hidden'));
        serverRequest.open('POST', 'mt-categorie.php', true);
        // console.log(getValueById('mt-cat-update'));
        // console.log(getValueById('mt-hidden'));

        serverRequest.onreadystatechange = () => {
            if (serverRequest.readyState === 4 && serverRequest.status === 200) {
                var message = document.getElementById('mt-up-mess');
                if (serverRequest.responseText === 'ok') {
                    message.innerText = "Successfuly update post categorie ";
                    message.style.color = "green";
                    location = "categorie.php";//to reload the page
                    updateCat.reset();
                } else {
                    message.innerText = "Failed, to update post categorie try again please ";
                    message.style.color = "red";

                }
            }
        }

        serverRequest.send(formData);

    });
}


/***videopost.php***/
function getFile(id) {
    return document.getElementById(id).files[0];
}
var videoPost = document.getElementById('mt-add-videopost');

if (videoPost != null) {
    videoPost.addEventListener('submit', (e) => {
        e.preventDefault();
        var formData = new FormData();
        formData.append('title', getValueById('mt-title'));
        formData.append('cat', getValueById('mt-cat'));
        formData.append('status', getValueById('mt-status'));
        formData.append('type', getValueById('mt-type'));
        formData.append('username', getValueById('mt-username'));
        formData.append('upload', getValueById('mt-btn-upload'));
        formData.append("photo", getFile('mt-photo'));
        formData.append("video", getFile('mt-video'));

        var content = CKEDITOR.instances['mt-content'].getData();
        formData.append('content', content);
        formData.append('price', getValueById('mt-price'));

        serverRequest.open('POST', 'mt-videopost.php', true);
        serverRequest.onreadystatechange = () => {
            if (serverRequest.readyState === 4 && serverRequest.status === 200) {
                var message = document.getElementById('mt-upload-mess');
                if (serverRequest.responseText === 'ok') {
                    message.innerText = "Successfuly add post categorie ";
                    message.style.color = "green";
                    message.style.display = "block";
                    setTimeout(() => {
                        //updateCat.reset();
                        location = "videopost.php";//to reload the page
                    }, 2500);
                }
                else if (serverRequest.responseText === 'image') {
                    message.innerText = "Please add only jpg, png, gif image type try... again ";
                    message.style.display = "block";
                    message.style.color = "red";
                    document.getElementById('mt-photo').style.border = "1px solid rgb(219, 76, 76)";
                } else if (serverRequest.responseText === 'video') {
                    message.innerText = "Please add only Mp4, webm,video type, try again ";
                    message.style.color = "red";
                    message.style.display = "block";
                    document.getElementById('mt-video').style.border = "1px solid rgb(219, 76, 76)";

                } else {
                    message.innerText = "Failed, to update post categorie try again please " + serverRequest.responseText;
                    message.style.color = "red";
                    message.style.display = "block";
                    // setTimeout(() => {
                    //     location = "videopost.php";//to reload the page
                    // }, 2500);
                }
            }
        }
        serverRequest.send(formData);
    });
}


/***
 * This is for any admin post view <b>script </b>
 * 
 */
var viewPost = document.getElementById('mt-view-post');
var tbodyBlog = document.getElementById('mt-tbody-blog');
var tbodyVideo = document.getElementById('mt-tbody-video');
var blogTable = document.getElementById('mt-blog-table');
var videoTable = document.getElementById('mt-video-table');
if (viewPost !== null) {
    viewPost.addEventListener('change', (e) => {
        if (e.target.value === 'blog') {
            showBlogPost();
        } else if (e.target.value == 'video') {
            showVideoPost();
        }
    })

}


/**
 * 
 * function defintion for showBlogPost and showVideoPost
 * 
 */

var showBlogPost = () => {
    //hide display area 
//  $('#mt-display').html(" ");
    // $('#mt-review-video').fadeOut();
    
    if (blogTable.style.display === 'none') {
        blogTable.style.display = 'block';
    }
    videoTable.style.display = "none";
    tbodyBlog.innerHTML = '';

    var formData = new FormData();
    formData.append('viewBlog', 'viewBlog');
    serverRequest.open('POST', 'mt-blogpost.php', true);
    serverRequest.onreadystatechange = () => {
        if (serverRequest.readyState === 4 && serverRequest.status === 200) {
            if (tbodyBlog !== null) {
                var result = JSON.parse(serverRequest.responseText);
                result.forEach((row) => {
                    var tbRow = "<tr class=mt-blog-row>" +
                        "<td>  <input  type='checkbox' class='mt-view-box' value=" + row['pid'] + "> =>" + row['pid'] + "</td>" +
                        "<td> " + row['title'] + "</td>" +
                        "<td>" + row['categorie'] + "</td>" +
                        "<td>" + row['postdate'] + "</td>" +
                        "<td>" + row['poststatus'] + "</td>" +
                        "<td><button class='mt-view-btn mt-preview-btn'>View</button></td>" +
                        "<td><button class='mt-edit-btn mt-view-btn'>Edit</button></td>" +
                        "<td><button class='mt-view-btn mt-del-btn' id='delete'>Delete</button> </td>" +
                        "<td>" + row['viewstatus'] + "</td>"
                        + "</tr>";
                    tbodyBlog.innerHTML = tbodyBlog.innerHTML + tbRow;
                });
            }
        }
    }
    serverRequest.send(formData);
}
var showVideoPost = () => {
    // $('#mt-review-blog').fadeOut();

    if (videoTable.style.display === 'none') {
        videoTable.style.display = 'block';
    }
    blogTable.style.display = "none";
    tbodyVideo.innerHTML = '';

    var formData = new FormData();
    formData.append('viewVideo', 'viewVideo');
    serverRequest.open('POST', 'mt-videopost.php', true);
    serverRequest.onreadystatechange = () => {
        if (serverRequest.readyState === 4 && serverRequest.status === 200) {

            if (tbodyVideo !== null) {
                var result = JSON.parse(serverRequest.responseText);
                //  console.log(result);
                result.forEach((row) => {
                    var tbRow = "<tr class=mt-video-row>" +
                        "<td> <input type='checkbox' class='mt-view-checkbox' value=" + row['vid'] + "> =>" + row['vid'] + "</td>" +
                        "<td> " + row['title'] + "</td>" +
                        "<td>" + row['categorie'] + "</td>" +
                        "<td>" + row['postdate'] + "</td>" +
                        "<td>" + row['poststatus'] + "</td>" +
                        "<td><button class='mt-view-btn mt-video-view'>View</button></td>" +
                        "<td><button class='mt-view-btn mt-edit-video' style='background-color:red'>Edit</button></td>" +
                        "<td><button class='mt-view-btn mt-del-video'>Delete </button></td>" +
                        "<td> " + row['viewstatus']+" </td>" + 
                        "<td>" + row['prices'] + " Birr</td>" +
                        "<td>" + row['viewstatus'] + "</td>"
                        + "</tr>";
                    tbodyVideo.innerHTML = tbodyVideo.innerHTML + tbRow;
                });
            }
        }
    }
    serverRequest.send(formData);
    //showVideoPost();
}
showBlogPost();


