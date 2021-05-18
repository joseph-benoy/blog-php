function pageBtnToggle(pageNumber){
    parseInt(pageNumber);
    if(pageNumber==1){
        $(`.prev`).addClass(`disabled`);
    }
    else{
        $(`.prev`).removeClass(`disabled`);
    }
}