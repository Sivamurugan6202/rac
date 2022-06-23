function dateFix(date){
    date=date.split('-');
    date=date[2]+'-'+date[1]+'-'+date[0];
}
function dashReplace(text){
    text=text.split('-');
    text=text.join(' ');
}