function pageBtnToggle(pageNumber){
    parseInt(pageNumber);
    if(pageNumber==1){
        $(`.prev`).addClass(`disabled`);
    }
    else{
        $(`.prev`).removeClass(`disabled`);
    }
}
function searchPost(){
    let value = $(`#navbar-search-input`).val();
    if(value!=''){
        let xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function(){
            if(this.readyState==4&&this.status===200){
                if(this.responseText!="0"){
                    let json = JSON.parse(this.responseText);
                    for(let key in json){
                        let anchor = $(`<a class="dropdown-item" href="post.php?url=${json[key]['TITLE_SLAG']}">${json[key]['TITLE']}</a>`);
                        $(`#search-result`).append(anchor);
                    }
                    $(`#search-result`).show();
                }
                else{
                    let anchor = $(`<a class="dropdown-item">Nothing found!</a>`);
                    $(`#search-result`).append(anchor);
                    $(`#search-result`).show();
                }
            }
        };
        xhttp.open(`POST`,'../../search-post.php',true);
        xhttp.setRequestHeader(`Content-Type`,`application/x-www-form-urlencoded`);
        xhttp.send(`val=${value}`);
    }
    else{
        $(`#search-result`).empty();
        $(`#search-result`).hide();
    }
}
$(document).ready(function(){
    console.clear();
    $(`#navbar-search-input`).on(`input`,searchPost);
});