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
                    console.log('Result = '+this.responseText);
                }
                else{
                    console.log('Nothing found');
                }
            }
        };
        xhttp.open(`POST`,'../../search-post.php',true);
        xhttp.setRequestHeader(`Content-Type`,`application/x-www-form-urlencoded`);
        xhttp.send(`val=${value}`);
    }
}
$(document).ready(function(){
    $(`#navbar-search-input`).on(`input`,searchPost);
});